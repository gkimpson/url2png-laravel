<?php

namespace Gkimpson\Url2pngLaravel;

class Url2pngLaravelClass
{
    public function __construct()
    {
    }

    /**
     * @param string $url
     * @param array|null $args - options: 'include|fullpage|thumbnail_max_width|viewport'
     * $options['unique']     = round(time()/60/60,0);      # Limit capture to once per hour
     * $options['fullpage']  = 'false';      # [true,false] Default: false
     * $options['thumbnail_max_width'] = 'false';      # scaled image width in pixels; Default no-scaling.
     * $options['viewport']  = "1280x1024";  # Max 5000x5000; Default 1280x1024
     * @return string
     */
    public function generate(string $url, ?array $args) {
        $URL2PNG_APIKEY = "P5023B683F2532";
        $URL2PNG_SECRET = "S5F9C03ABC2EB6";

        # urlencode request target
        $options['url'] = urlencode($url);
        $options += $args;

        # create the query string based on the options
        foreach($options as $key => $value) { $_parts[] = "$key=$value"; }

        # create a token from the ENTIRE query string
        $query_string = implode("&", $_parts);
        $TOKEN = md5($query_string . $URL2PNG_SECRET);

        return "https://api.url2png.com/v6/$URL2PNG_APIKEY/$TOKEN/png/?$query_string";

    }
}
