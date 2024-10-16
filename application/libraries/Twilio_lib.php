<?php
// application/libraries/Twilio_lib.php
// require APPPATH.'/libraries/Twilio/autoload.php';

use Twilio\Rest\Client;

class Twilio_lib {

    protected $CI;
    protected $twilio;

    public function __construct() {
        $this->CI =& get_instance();

        // Load Twilio configuration from CodeIgniter config
        $this->CI->config->load('twilio');
        $twilio_account_sid = $this->CI->config->item('AC2e61772116b5d27fe541c9f96ca9f93a');
        $twilio_auth_token = $this->CI->config->item('2fbaab009f7041ed0f285a38da2fa4c4');

        // Initialize Twilio client
        // $this->twilio = new Client($twilio_account_sid, $twilio_auth_token);
    }

    public function sendSMS($to, $message) {
        $twilio_phone_number = $this->CI->config->item('+16467366545');

        try {
            $message = $this->twilio->messages->create(
                $to,
                [
                    'from' => $twilio_phone_number,
                    'body' => $message
                ]
            );
            return $message->sid; // Return message SID if needed
        } catch (Exception $e) {
            log_message('error', 'Twilio error: ' . $e->getMessage());
            return false;
        }
    }
}
?>
