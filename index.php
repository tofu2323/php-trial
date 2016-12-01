<?php
require_once __DIR__ . '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Request;

$app = new Silex\Application();

$app->get('/', function () {
    return "Hello World!!!!";
});

$app->post('/callback', function (Request $request) {
    $message = $request->get('message');
    fwrite($message, "hello world to message\n");
    return new Response('Thank you for your feedback!', 201);
});

//$app->post('/callback', function (Request $request) use ($app) {
//    error_log($request);
////    $client = new GuzzleHttp\Client();
////
////    $body = json_decode($request->getContent(), true);
////    foreach ($body['result'] as $msg) {
////        if (!preg_match('/(ぬるぽ|ヌルポ|ﾇﾙﾎﾟ|nullpo)/i', $msg['content']['text'])) {
////            continue;
////        }
////
////        $resContent = $msg['content'];
////        $resContent['text'] = 'ｶﾞｯ';
////
////        $requestOptions = [
////            'body' => json_encode([
////                'to' => [$msg['content']['from']],
////                'toChannel' => 1383378250, # Fixed value
////                'eventType' => '138311608800106203', # Fixed value
////                'content' => $resContent,
////            ]),
////            'headers' => [
////                'Content-Type' => 'application/json; charset=UTF-8',
////                'X-Line-ChannelID' => getenv('LINE_CHANNEL_ID'),
////                'X-Line-ChannelSecret' => getenv('LINE_CHANNEL_SECRET'),
////                'X-Line-Trusted-User-With-ACL' => getenv('LINE_CHANNEL_MID'),
////            ],
////            'proxy' => [
////                'https' => getenv('FIXIE_URL'),
////            ],
////        ];
////
////        try {
////            $client->request('post', 'https://trialbot-api.line.me/v1/events', $requestOptions);
////        } catch (Exception $e) {
////            error_log($e->getMessage());
////        }
////    }
//
//    return 'OK';
//});

$app->run();
