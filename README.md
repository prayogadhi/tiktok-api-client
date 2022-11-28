# tiktok-api-client
Unofficial TikTok Shop API Client build in PHP

### How To Install

`composer require adi/tiktok-api-client`

### How To Use

```
$tiktokClient = new GeneralApiClient();
$tiktokConfig = new TiktokApiConfig();
$tiktokConfig->setAppKey($appKey);
$tiktokConfig->setAccessToken($accessToken);
$tiktokConfig->setShopId($shopId);
$tiktokConfig->setSecretKey($partnerSecret);

$baseUrl = $_ENV["TIKTOK_API_HOST"];
$apiPath = "/api/logistics/get_warehouse_list";

$params = array(
  'app_key' => $appKey,
  'access_token' => $accessToken,
  'shop_id' => $shopId
);

$resultLocation = $tiktokClient->httpCallGet($baseUrl, $apiPath, $params, $tiktokConfig);
```
