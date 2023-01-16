<?php

namespace Adi\TiktokshopApiClient\request\package;

use Adi\TiktokshopApiClient\client\TiktokApiConfig;
use Adi\TiktokshopApiClient\node\package\PackageWithoutBodyRequest;

class PackageApiClient
{
    /**
     * GET Request
     * @throws \Exception
     */
    public function httpCallGet($baseUrl, $apiPath, $params, TiktokApiConfig $apiConfig)
    {
        $httpMethod = "GET";
        return PackageWithoutBodyRequest::makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, $apiConfig);
    }
}
