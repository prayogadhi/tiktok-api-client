<?php

/**
 * Tiktok Package Without Body Request
 * @author Adhi Prayoga
 * @since 14-01-2023
 */

namespace Adi\TiktokshopApiClient\node\package;

use Adi\TiktokshopApiClient\client\TiktokApiConfig;
use GuzzleHttp\Client;
use Exception;

class PackageWithoutBodyRequest
{
    /**
     * @param $httpMethod
     * @param $baseUrl
     * @param $apiPath
     * @param $params
     * @param TiktokApiConfig $TiktokApiConfig
     */
    public static function makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, TiktokApiConfig $apiConfig)
    {
        // Validate Input
        /** @var TiktokApiConfig $apiConfig */
        if ($apiConfig->getAppKey() == "") throw new Exception("Input of [app_key] is empty");
        if ($apiConfig->getAppSecret() == "") throw new Exception("Input of [app_secret] is empty");
        if ($apiConfig->getAccessToken() == "") throw new Exception("Input of [access_token] is empty");
        if ($apiConfig->getShopId() == "") throw new Exception("Input of [shop_id] is empty");

        $timeStamp = time();
        $baseString = $apiConfig->getAppSecret() . $apiPath . "app_key" . $apiConfig->getAppKey() . "package_id" . $params["package_id"] . "shop_id" . $apiConfig->getShopId() . "timestamp" . $timeStamp . $apiConfig->getAppSecret();
        $sign = hash_hmac('sha256', $baseString, $apiConfig->getAppSecret());

        $apiPath .= "?";

        if ($params != null) {
            foreach ($params as $key => $value) {
                $apiPath .= "&" . $key . "=" . urlencode($value);
            }
        }

        $requestUrl = $baseUrl . $apiPath . "&sign=" . $sign . "&timestamp=" . $timeStamp;

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
}
