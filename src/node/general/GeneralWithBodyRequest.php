<?php

/**
 * Tiktok General With Body Request
 * @author Adhi Prayoga
 * @since 28-11-2022
 */

namespace Adi\TiktokshopApiClient\node\general;

use Adi\TiktokshopApiClient\client\TiktokApiConfig;
use GuzzleHttp\Client;
use Exception;

class GeneralWithBodyRequest
{
    /**
     * @param $httpMethod
     * @param $apiPath
     * @param $params
     * @param $body
     * @param TiktokApiConfig $TiktokApiConfig
     */
    public static function makeMethod($httpMethod, $baseUrl, $apiPath, $params, $body, TiktokApiConfig $apiConfig)
    {
        // Validate Input
        /** @var TiktokApiConfig $apiConfig */
        if ($apiConfig->getAppKey() == "") throw new Exception("Input of [app_key] is empty");
        if ($apiConfig->getAppSecret() == "") throw new Exception("Input of [app_secret] is empty");
        if ($apiConfig->getAccessToken() == "") throw new Exception("Input of [access_token] is empty");
        if ($apiConfig->getShopId() == "") throw new Exception("Input of [shop_id] is empty");

        $timeStamp = time();
        $baseString = $apiConfig->getAppSecret() . $apiPath . "app_key" . $apiConfig->getAppKey() . "shop_id" . $apiConfig->getShopId() . "timestamp" . $timeStamp . $apiConfig->getAppSecret();
        $sign = hash_hmac('sha256', $baseString, $apiConfig->getAppSecret());

        $apiPath .= "?";

        if ($params != null) {
            foreach ($params as $key => $value) {
                $apiPath .= "&" . $key . "=" . urlencode($value);
            }
        }

        $requestUrl = $baseUrl . $apiPath . "&" . "timestamp=" . $timeStamp . "&" . "sign=" . $sign;

        $guzzleClient = new Client([
            'base_uri' => $baseUrl,
            'timeout' => 3.0
        ]);

        $response = null;

        try {
            $response = json_decode($guzzleClient->request($httpMethod, $requestUrl, ['json' => $body])->getBody()->getContents());
        } catch (ClientException $e) {
            $response = json_decode($e->getResponse()->getBody()->getContents());
        } catch (Exception $e) {
            $response = (object) array("error" => "GUZZLE_ERROR", "message" => $e->getMessage());
        }

        return $response;
    }
}
