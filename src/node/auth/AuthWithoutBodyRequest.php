<?php

/**
 * Tiktok Auth Request
 * @author Adhi Prayoga
 * @since 28-11-2022
 */

namespace Adi\TiktokshopApiClient\node\auth;

use Adi\TiktokshopApiClient\client\TiktokApiConfig;
use GuzzleHttp\Client;
use Exception;

class AuthWithoutBodyRequest
{
    /**
     * @param $httpMethod
     * @param $baseUrl
     * @param $apiPath
     * @param $params
     * @param TiktokApiConfig $apiConfig
     * @return mixed|string
     * @throws Exception
     */
    public static function makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, TiktokApiConfig $apiConfig)
    {
        // Validate Input
        if ($apiConfig->getAppKey() == "") throw new Exception("Input of [app_key] is empty");
        if ($apiConfig->getAppSecret() == "") throw new Exception("Input of [app_secret] is empty");

        $apiPath .= "?";

        if ($params != null) {
            foreach ($params as $key => $value) {
                $apiPath .= "&" . $key . "=" . urlencode($value);
            }
        }

        $requestUrl = $baseUrl . $apiPath;

        $guzzleClient = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 3.0
        ]);

        $response = null;

        try {
            $response = json_decode($guzzleClient->request($httpMethod, $requestUrl)->getBody()->getContents());
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        } catch (Exception $e) {
            $response = (object) array("error" => "GUZZLE_ERROR", "message" => $e->getMessage());
        }

        return $response;
    }
} // End Of Class