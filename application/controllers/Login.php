<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    function __construct(){
		parent::__construct();		
        $this->load->model('model_travel');
        $this->load->library('facebook');

        error_reporting(0);
    }
    
	function index()
	{
        if ($this->facebook->is_authenticated()){
            // Get user facebook profile details
            $fbUser = $this->facebook->request('get', '/me?fields=id,first_name,last_name,email,link,gender,picture');

            // Preparing data for database insertion
            $userData = array(
                'from' => 'facebook',
                'oauth_uid' => !empty($fbUser['id'])?$fbUser['id']:'',
                'email' => !empty($fbUser['email'])?$fbUser['email']:'',
                'picture' => !empty($fbUser['picture']['data']['url'])?$fbUser['picture']['data']['url']:''
            );
            
            // $userData['first_name']    = !empty($fbUser['first_name'])?$fbUser['first_name']:'';
            // $userData['last_name']    = !empty($fbUser['last_name'])?$fbUser['last_name']:'';
            // $userData['gender']        = !empty($fbUser['gender'])?$fbUser['gender']:'';
            // $userData['link']        = !empty($fbUser['link'])?$fbUser['link']:'';

            $send_fb = $this->model_travel->update_login_user($userData);
            if (!empty($send_fb)) {
                $customer_data = $this->model_travel->get_customer_info_from_facebook($userData['email']);
                $_SESSION['customer'] = $customer_data;

                if ($_SESSION['customer']['id_parent'] == 0) {
                    $insert_parent_id = $this->model_travel->insert_login_parent_id($_SESSION['customer']['id']);
                }
            }
            
            else {
                $_SESSION['error'] = 'There s something wrong when login using facebook, please try another method.';
            }

            // $current_url = $_GET['current_url'];
            echo '<a href="'.base_url().'" id="continue">If this page doesnt do anything, please click here.</a>';
            echo '<script>window.location = "'.base_url().'";</script>';
            
            // SET LOGOUT URL (still idk for the purpose what it is)
            $_SESSION['logout_facebook_URL'] = $this->facebook->logout_url();
        }

        else {
            $login_user = $_POST['datas'];
            $current_url = $_POST['current_url'];
            $validation = $this->model_travel->get_customer_info_from_login($login_user['id'], $login_user['password']);

            if ($validation) {
                $_SESSION['customer'] = $validation;
                if ($_SESSION['customer']['id_parent'] == 0) {
                    $insert_parent_id = $this->model_travel->insert_login_parent_id($_SESSION['customer']['id']);
                }
                
                $validation_url = base_url().'index.php/travel/choose_bus/';
                if ($current_url == $validation_url) {
                    unset($current_url);
                    $current_url = base_url();
                }
                
                header('location:'.$current_url.'');
            }

            else {
                $_SESSION['error'] = 'Your login cridential is wrong or invalid, please try again!';
                $validation_url = base_url().'index.php/travel/choose_bus/';
                if ($current_url == $validation_url) {
                    unset($current_url);
                    $current_url = base_url();
                }

                header('location:'.$current_url.'');
            }
        }
    }

    function register()
    {
        $regis = $_POST['datas'];
        $current_url = $_POST['current_url'];
        $insert = $this->model_travel->insert_login_user($regis);

        if ($insert) {
            $customer_data = $this->model_travel->get_customer_info_from_login($regis['email'], $regis['password']);

            $_SESSION['customer'] = $customer_data;
            $insert_parent_id = $this->model_travel->insert_login_parent_id($_SESSION['customer']['id']);
            $validation_url = base_url().'index.php/travel/choose_bus/';
            if ($current_url == $validation_url) {
                unset($current_url);
                $current_url = base_url();
            }

            header('location:'.$current_url.'');
        }

        else {
            $_SESSION['error'] = 'There s something wrong when register, please try again later. Or try using another method.';
            $validation_url = base_url().'index.php/travel/choose_bus';
            if ($current_url == $validation_url) {
                unset($current_url);
                $current_url = base_url();
            }

            header('location:'.$current_url.'');
        }
    }
}
