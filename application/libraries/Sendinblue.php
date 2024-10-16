<?php
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Sendinblue_api {

    protected $client;

    public function __construct() {
        // Initialize Guzzle HTTP client with CA bundle path
        $this->client = new Client([
            'base_uri' => 'https://api.sendinblue.com',
            'curl' => [
                CURLOPT_CAINFO => 'C:/cacert.pem', // Specify the path to CA bundle
            ],
            // 'verify' => 'C:/cacert.pem', // Specify the path to CA bundle
        ]);
    }

    public function sendSMS($to, $message) {
        try {
            $response = $this->client->post('/v3/transactionalSMS/sms', [
                'json' => [
                    'sender' => 'BTP',
                    'recipient' => $to,
                    'content' => $message,
                    'type' => 'transactional',
                    'webUrl' => 'https://example.com/notifyUrl',
                ],
                'headers' => [
                    'api-key' => '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',
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                ],
            ]);

            return $response->getBody()->getContents();
        } catch (RequestException $e) {
            return 'Request exception: ' . $e->getMessage();
        }
    }
}

// application/libraries/Sendinblue.php

// defined('BASEPATH') OR exit('No direct script access allowed');

// use SendinBlue\Client\Configuration;
// use SendinBlue\Client\Api\TransactionalSMSApi;
// use SendinBlue\Client\Model\SendSms;
// use GuzzleHttp\Client;

// class Sendinblue {

//     protected $CI;

//     public function __construct() {
//         $this->CI =& get_instance();
//         $this->CI->load->config('sendinblue'); // Load Sendinblue API settings from config file
        
//     }

//     public function sendSMS($to, $message) {
//         $apiKey = $this->CI->config->item('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');
//         // print_r($apiKey);die('2222');
//         // Configure API key authorization: api-key
//         $config = SendinBlue\Client\Configuration::getDefaultConfiguration()->setApiKey('smskey', $apiKey);

//         // Create an instance of the API class
//         $apiInstance = new SendinBlue\Client\Api\TransactionalSMSApi(
//             new GuzzleHttp\Client(),
//             $config
//         );

//         // Prepare SMS payload
//         $sms = new SendinBlue\Client\Model\SendSms();
//         $sms['sender'] = 'BTP';
//         $sms['recipient'] = $to;
//         $sms['content'] = $message;

//         try {
//             // Send SMS
//             $result = $apiInstance->sendTransacSms($sms);
//             return $result;
//         } catch (Exception $e) {
//             // Handle exception
//             return $e->getMessage();
//         }
//     }

// }
