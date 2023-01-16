<?php

namespace Adi\TiktokshopApiClient\request\product;

use Adi\TiktokshopApiClient\client\TiktokApiConfig;
use Adi\TiktokshopApiClient\node\product\ProductWithoutBodyRequest;

class ProductApiClient
{
    /**
     * GET Request
     * @throws \Exception
     */
    public function httpCallGet($baseUrl, $apiPath, $params, TiktokApiConfig $apiConfig)
    {
        $httpMethod = "GET";
        return ProductWithoutBodyRequest::makeGetMethod($httpMethod, $baseUrl, $apiPath, $params, $apiConfig);
    }
}
