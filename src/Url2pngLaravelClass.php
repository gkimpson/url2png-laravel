<?php

namespace Gkimpson\Url2pngLaravel;

class Url2pngLaravelClass
{
    private string $apiKey;

    private string $secret;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        if ( ! empty($config)) {
            foreach ($config as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @param string $url
     * @param array|null $args - options: 'include|fullpage|thumbnail_max_width|viewport'
     * $options['unique']  = round(time()/60/60,0);         # Limit capture to once per hour
     * $options['fullpage']  = 'false';                     # [true,false] Default: false
     * $options['thumbnail_max_width'] = '500' (pixels)     # scaled image width in pixels; Default no-scaling.
     * $options['viewport']  = '1280x1024';                 # Max 5000x5000; Default 1280x1024
     * more info here - https://www.url2png.com/docs
     * @return string url2png generated url with screenshot
     */
    public function generate(string $url, ?array $args): string
    {
        # urlencode request target
        $options['url'] = urlencode($url);
        $options += $args;

        //TODO - use laravel built in feature for querystring generation
        # create the query string based on the options
        foreach ($options as $key => $value) {
            $_parts[] = "$key=$value";
        }

        # create a token from the ENTIRE query string
        $query_string = implode("&", $_parts);
        $TOKEN = md5($query_string . $this->secret);

        return "https://api.url2png.com/v6/{$this->apiKey}/$TOKEN/png/?$query_string";
    }

    // TODO
    public function saveImage(string $url, string $size = '1024x768', string $file = 'screengrab.jpg')
    {

    }

    // TODO
    private function logToDatabase(string $file)
    {

    }
}
