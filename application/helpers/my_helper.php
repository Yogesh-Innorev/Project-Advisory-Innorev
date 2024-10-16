<?php
defined('BASEPATH') or exit('No direct script access allowed');

if(!function_exists('limited_str')) {
    function limited_str($ur_str,$count='40')
    {
        return  (strlen($ur_str) > $count) ? substr($ur_str,0,$count).'...' :$ur_str;
    }
}
if (!function_exists('get_user_name')) {
	function get_user_name()
	{
		$ci =& get_instance();
        $adminData=$ci->session->userdata('isAdmin');
        
        return !empty($adminData)?getValueByColumn('tbl_admin','name',['id'=>$adminData->id]):'';
	}
}
if (!function_exists('get_user_image')) {
	function get_user_image()
	{
		$ci =& get_instance();
        $adminData=$ci->session->userdata('isAdmin');
        return  is_images('profile',!empty($adminData)?getValueByColumn('tbl_admin','image',['id'=>$adminData->id]):'');
	}
}
if (!function_exists('is_home')) {
	function is_home()
	{
		$CI = &get_instance();
		return (!$CI->uri->segment(1)) ? TRUE : FALSE;
	}
}

if(!function_exists('is_login'))
{
    function is_login()
    {   $ci =& get_instance();
        $adminData=$ci->session->userdata('isAdmin');
        if(empty($adminData))
        {
            return redirect(base_url('admin'));
        }
    }
}

if(!function_exists('is_user_login'))
{
    function is_user_login()
    {   $ci =& get_instance();
        $adminData=$ci->session->userdata('isUser');
        if(empty($adminData))
        {
            return redirect(base_url('home'));
        }
    }
}

if(!function_exists('check_user_login'))
{
    function check_user_login()
    {   $ci =& get_instance();
        $adminData=$ci->session->userdata('isUser');
        if(empty($adminData))
        {
            return false;
        }else{
            return true;
        }
    }
}

if(!function_exists('excerpt'))
{
    function excerpt($paragraph, $limit)
    {   
        $text = '';
        $words = 0;
        $paragraph = preg_replace('/(?:<|&lt;)\/?([a-zA-Z]+) *[^<\/]*?(?:>|&gt;)/', '', $paragraph);
        $total_words = count(explode(" ", trim($paragraph)));
        if($total_words) {
            $tok = strtok($paragraph, " ");
            while ($tok !== false) {
                $text .= " ".$tok;
                $words++;
                if (($words >= $limit) || ($words>=$total_words)/*&& ((substr($tok, -1) == "!") || (substr($tok, -1) == ".") || (substr($tok, -1) == "?"))*/) {
                    if($words >= $limit) {
                        $text .= '...';
                    }
                    break;
                }
                $tok = strtok(" ");
            }
        }
        return ltrim($text);
    }
}

if(!function_exists('getValueByColumn'))
{
    function getValueByColumn($table,$field,$where)
    {   $ci =& get_instance();
        $ci->load->database();
        $ci->db->select($field);
        $row=$ci->db->get_where($table,$where)->row_array();
        if(!empty($row))
        {
            return $row[$field];
        }else{
            return '';
        }
    }
}



if(!function_exists('encryptor'))
{
    function encryptor($action, $string) {
        $output = false;
        $encrypt_method = "AES-256-CBC";
        //pls set your unique hashing key
        $secret_key = 'SSAK';
        $secret_iv = 'MNG';
        // hash
        $key = hash('sha256', $secret_key);
        // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
        $iv = substr(hash('sha256', $secret_iv), 0, 16);
        //do the encyption given text/string/number
        if( $action == 'encrypt' ) {
            $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
            $output = base64_encode($output);
        }
        else if( $action == 'decrypt' ){
            //decrypt the given text/string/number
            $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
        }
        return $output;
    }
}

if(!function_exists('is_images'))
{
    function is_images($path,$file_name)
    {
        $paths='uploads/'.$path.'/'.$file_name;
        if(file_exists($paths)&&!empty($file_name)) 
        {
           return base_url($paths);
        }else{
            return base_url('uploads/no_image.png');
        }
    }
}

if(!function_exists('slug'))
{
    function slug($string, $spaceRepl = "-")
    {
        $string = str_replace("&", "and", $string);

        $string = preg_replace("/[^a-zA-Z0-9 _-]/", "", $string);

        $string = strtolower($string);

        $string = preg_replace("/[ ]+/", " ", $string);

        $string = str_replace(" ", $spaceRepl, $string);

        return $string;
    }
}

if(!function_exists('get_client_ip'))
{
    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}

if(!function_exists('timeAgo'))
{
    function timeAgo( $time )
    {
        $time_difference = time() - $time;
        // echo "<pre>";print_r(date("d-m-Y H:i:s",time()));exit();
        // echo "<pre>";print_r($time);exit();
        if( $time_difference < 1 ) { return 'less than 1 second ago'; }
        $condition = array( 12 * 30 * 24 * 60 * 60 =>  'year',
                    30 * 24 * 60 * 60       =>  'month',
                    24 * 60 * 60            =>  'day',
                    60 * 60                 =>  'hour',
                    60                      =>  'minute',
                    1                       =>  'second'
        );
    
        foreach( $condition as $secs => $str )
        {
            $d = $time_difference / $secs;
    
            if( $d >= 1 )
            {
                $t = round( $d );
                return 'about ' . $t . ' ' . $str . ( $t > 1 ? 's' : '' ) . ' ago';
            }
        }
    }
    
    // function timeAgo($datetime)
    // {
    //     $time1 = new DateTime($datetime);
    //     $now = new DateTime();
    //     $interval = $time1->diff($now,true);
    //     if ($interval->y)
    //     $value = $interval->y . ' years';
    //     elseif ($interval->m) 
    //     $value = $interval->m . ' months';
    //     elseif ($interval->d) 
    //     $value = $interval->d . ' days';
    //     elseif ($interval->h) 
    //     $value = $interval->h . ' hours';
    //     elseif ($interval->i) 
    //     $value = $interval->i . ' minutes';
    //     else 
    //     $value = "less than 1 minute";
    //     return $value;
    // }
    
    // function timeAgo($timestamp)
    // {
    //     $strTime = ["second", "minute", "hour", "day", "week", "month", "year", "decade"];
    //     $length = [60, 60, 24, 30, 12, 10, 10];
    //     $currentTime = time();
    //     if ($currentTime >= $timestamp) {
    //         $diff = time() - $timestamp;
    //         for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
    //             $diff /= $length[$i];
    //         }
    //         $diff = round($diff);
    //         if ($strTime[$i] === 'day') {
    //             if ($diff > 7) {
    //                 $diff = round($diff / 7);
    //                 return $diff . " " . "week" . ($diff > 1 ? "s" : "");
    //             }
    //         }
    //         return $diff . " " . $strTime[$i] . ($diff > 1 ? "s" : "");
    //     }
    // }
    // function timeAgo($datetime, $full = false) {
    //     $now = new DateTime;
    //     $ago = new DateTime($datetime);
    //     $diff = $now->diff($ago);
    
    //     $diff->w = floor($diff->d / 7);
    //     $diff->d -= $diff->w * 7;
    
    //     $string = array(
    //         'y' => 'year',
    //         'm' => 'month',
    //         'w' => 'week',
    //         'd' => 'day',
    //         'h' => 'hour',
    //         'i' => 'minute',
    //         's' => 'second',
    //     );
    //     foreach ($string as $k => &$v) {
    //         if ($diff->$k) {
    //             $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
    //         } else {
    //             unset($string[$k]);
    //         }
    //     }
    
    //     if (!$full) $string = array_slice($string, 0, 1);
    //     return $string ? implode(', ', $string) . ' ago' : 'just now';
    // }
}


if(!function_exists('sendSMS'))
{
    function sendSMS($mobile,$otp)
    {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            // CURLOPT_URL => 'https://2factor.in/API/V1/ea51d1f5-bec7-11ee-8cbb-0200cd936042/SMS/'.$mobile.'/'.$otp,
            CURLOPT_URL => 'https://2factor.in/API/V1/ea51d1f5-bec7-11ee-8cbb-0200cd936042/VOICE/'.$mobile.'/'.$otp,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        // return $response;exit();
        return 1;
    }
}

if(!function_exists('sendEmail'))
{
    function sendEmail($to, $message, $subject)
    {
        $ci =& get_instance();
        
        $ci->load->library('email');
        $ci->email->initialize(array(
            'protocol'  => SMTP_PROTOCOL,
            'smtp_host' => SMTP_HOST,
            'smtp_user' => SMTP_USER,
            'smtp_pass' => SMTP_PASSWORD,
            'mailtype' => 'html',
            'wordwrap' => TRUE,
            // 'smtp_timeout' => 600,
            'smtp_crypto' => 'tls',
            'smtp_port' => SMTP_PORT,
            'mailtype'  => 'html', 
            'crlf'      => "\r\n", 
            'newline'   => "\r\n"
        ));
        

        $ci->email->from('support@misoftwaresolutions.com',' - '.APP_NAME);
		$ci->email->to($to);
		// $ci->email->cc('another@another-example.com');
		// $ci->email->bcc('them@their-example.com');
		$ci->email->subject($subject);
		$ci->email->message($message);
		$ci->email->send();
// 		echo $ci->email->print_debugger();die;
		return 1;
    }
}

if(!function_exists('makeLoginLogHistory'))
{
    function makeLoginLogHistory($type,$user_id)
    {   $ci =& get_instance();
        $ci->load->database();
        $row=$ci->db->insert('tbl_users_log',['user_id'=>$user_id,'activity_type'=>$type]);
        // echo "<pre>";print_r($ci->db->last_query());exit();
        return true;
    }
}

if(!function_exists('generateRandomString'))
{
    function generateRandomString($length) {
      $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';
      for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
      }
      return $randomString;
    }
}

if(!function_exists('isProfileComplete'))
{
    function isProfileComplete($user_id)
    {   $ci =& get_instance();
        $ci->load->database();
        
        $userData=$ci->db->get_where('tbl_users',['id'=>$user_id])->row();
        
        $isProfileCompleted = (!empty($userData->name) && !empty($userData->phone) &&!empty($userData->email) &&!empty($userData->gender) &&!empty($userData->image) &&!empty($userData->age) &&!empty($userData->qualification) &&!empty($userData->profession) &&!empty($userData->city) &&!empty($userData->district) &&!empty($userData->facebook_url)) &&!empty($userData->linkedin_url)?true:false;
        
        return $isProfileCompleted;
    }
}

if(!function_exists('limitWords'))
{
    function limitWords($string, $limit) {
        $wordCount = str_word_count($string);
        if ($wordCount > $limit) {
            $words = str_word_count($string, 2);
            $words = array_slice($words, 0, $limit);
            $string = implode(' ', $words) . '...'; // Append ellipsis for indication
        }
        return $string;
    }
}


?>

