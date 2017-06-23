<?php

/**
 * Library for http://instalike.me API
 *
 * @author Andrey Revkov <andre.revkov@gmail.com>
 */
class InstaLikeMe
{
    private $apiKey;
    private $url;

    /**
     * @author Andrey Revkov <andre.revkov@gmail.com>
     */
    function __construct ($apiKey = 'YOUR-API-KEY', $version = 1)
    {
        $this->apiKey = $apiKey;
        $this->url = "http://instalike.me/api/v{$version}/";
    }

    /**
     * Call API methods
     * 
     * @param string $method Method name
     * @param array $params POST data
     * @param string $format Default: 'json'
     * 
     * @return array
     * 
     * @author Andrey Revkov <andre.revkov@gmail.com>
     */
    public function api ($method = 'ping', array $params = [], $format = 'json')
    {
        $params['apiKey'] = $this->apiKey;
        $curl = curl_init();
        curl_setopt_array(
            $curl,
            [
                CURLOPT_URL => $this->url . $method . '.' . $format,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => http_build_query($params)
            ]
        );
        $response = curl_exec($curl);
        curl_close($curl);

        $data = json_decode($response, true);

        return $data;
    }
}