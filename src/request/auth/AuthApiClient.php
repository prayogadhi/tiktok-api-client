<?php

namespace Adi\TiktokshopApiClient\request\auth;

use Adi\TiktokshopApiClient\client\TiktokApiConfig;
use Adi\TiktokshopApiClient\node\auth\AuthWithoutBodyRequest;

class AuthApiClient
{
    // GET Request
    /**
     * @throws \Exception
     */
    public function httpCallGet($baseUrl, $apiPath, $params, TiktokApiConfig $apiConfig)
    {
        $httpMethod = "GET";
        return AuthWithoutBodyRequest::makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, $apiConfig);
    }

}