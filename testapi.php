<?php 
//$url = "http://dummy.restapiexample.com/api/v1/employees";
$url="http://49.205.143.238:4010/common/categories";
//$url="http://49.205.143.238:4010/quotation/quotation/numberlist";
$curl = curl_init($url);
// curl_setopt_array($curl, [
    // CURLOPT_RETURNTRANSFER => 0,
    // CURLOPT_URL => $url,
    // CURLOPT_USERAGENT => 'Codular Sample cURL Request'
// ]);
$resp = curl_exec($curl);

curl_close($curl);
print_r($resp);
//$arr = json_decode($resp, true);
//$resultCategory = $arr;
?>