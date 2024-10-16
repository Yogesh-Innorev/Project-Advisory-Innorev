<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function send_sms($to, $message) {
    $ci =& get_instance();
    $ci->config->load('brevo', TRUE);
    $brevo_config = $ci->config->item('brevo');

    $api_key = $brevo_config['brevo_api_key'];
    // $secret_key = $brevo_config['brevo_secret_key'];

    $url = 'https://api.brevo.com/v3/transactionalSMS/sms';

    $client = new GuzzleHttp\Client();

    try {
        $response = $client->post($url, [
            'headers' => [
                'Authorization' => 'Bearer ' . base64_encode("$api_key"),
                'Content-Type' => 'application/json',
            ],
            'curl' => [
                CURLOPT_CAINFO => 'C:/cacert.pem', // Specify the path to CA bundle
            ],
            'json' => [
                'to' => $to,
                'message' => $message,
            ]
        ]);

        $response_body = $response->getBody()->getContents();
        $response_data = json_decode($response_body, TRUE);

        return $response_data;
    } catch (Exception $e) {
        return ['error' => $e->getMessage()];
    }
}
