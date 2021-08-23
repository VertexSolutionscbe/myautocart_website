<?php
use SparkPostSparkPost;
use GuzzleHttpClient;
use HttpAdapterGuzzle6Client as GuzzleAdapter;

$httpClient = new GuzzleAdapter(new Client());
$sparky = new SparkPost($httpClient, ['key' => '<YOUR API KEY>']);

$sparky->setOptions(['async' => false]);
$results = $sparky->transmissions->post([
  'options' => [
    'sandbox' => true
  ],
  'content' => [
    'from' => 'testing@sparkpostbox.com',
    'subject' => 'Oh hey',
    'html' => '<html><body><p>Testing SparkPost - the most awesomest email service!</p></body></html>'
  ],
  'recipients' => [
    ['address' => ['email'=>'developers+php@sparkpost.com']]
  ]
]);
?>