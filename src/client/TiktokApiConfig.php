<?php

/**
 * @see https://developers.tiktok-shops.com/documents/document/
 * Tiktok Client Constructor
 * @author Adhi Prayoga
 * @since 28-11-2022
 */

namespace Adi\TiktokshopApiClient\client;

class TiktokApiConfig
{
    private $appKey;
    private $accessToken;
    private $refreshToken;
    private $shopId;
    private $appSecret;

    /** 
     * TiktokApiConfig constructor.
     * @param string $appKey
     * @param string $accessToken
     * @param string $shopId
     * @param string $appSecret
     */
    public function __construct($appKey = "", $accessToken = "", $refreshToken = "", $shopId = "", $appSecret = "")
    {
        $this->appKey = $appKey;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->shopId = $shopId;
        $this->appSecret = $appSecret;        
    }

    /**
     * @return mixed
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param mixed $appKey
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
    }

    /**
     * @return mixed
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * @param mixed $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * @return mixed|string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param mixed|string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }


    /**
     * @return mixed
     */
    public function getShopId()
    {
        return $this->shopId;
    }

    /**
     * @param mixed $shopId
     */
    public function setShopId($shopId)
    {
        $this->shopId = $shopId;
    }

    /**
     * @return string
     */
    public function getAppSecret()
    {
        return $this->appSecret;
    }

    /**
     * @param string $appSecret
     */
    public function setAppSecret($appSecret)
    {
        $this->appSecret = $appSecret;
    }
}
