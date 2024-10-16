
<?php
// require_once('vendor/autoload.php');
require_once FCPATH .'vendor\autoload.php';
// print_r(FCPATH);die(1);

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

use GuzzleHttp\Exception\RequestException;


class Brevo {

    protected $api_key;
    protected $api_secret;
    protected $base_url = 'https://api.brevo.com/v3/transactionalSMS/btpapi';

    public function __construct() {
        // Load API credentials from configuration
        $this->api_key = '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'; // Replace with your actual API key
        $this->api_secret = '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'; // Replace with your actual API secret
    }


    public function sendSMS($to, $message) {
        $client = new \GuzzleHttp\Client();
    
        $body = json_encode([
            'type' => 'transactional',
            'unicodeEnabled' => false,
            'recipient' => $to,
            'content' => 'This is your Login Otp ' . $message, // Adjusted message format
            'tag' => 'validation',
            'sender' => 'ByThePeople'
        ]);
        // print_r($body);die;
    
        $response = $client->request('POST', 'https://api.brevo.com/v3/transactionalSMS/sms', [
            'body' => $body,
            'headers' => [
                'accept' => 'application/json',
                'api-key' => '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',
                'content-type' => 'application/json',
            ],
            'curl' => [
                CURLOPT_CAINFO => 'C:/cacert.pem', // Specify the path to CA bundle
            ],
        ]);
        // print_r($response);die;
        return $response->getBody();
    }
     
    
}
