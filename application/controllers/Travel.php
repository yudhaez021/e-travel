<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        // require_once APPPATH.'third_party/PHPExcel.php';
        
        // $this->excel = new PHPExcel(); 
        $this->load->model('model_travel');
        $this->load->library('facebook');

        // if ($_SESSION['data_user']['status'] != "login") {
        //     $_SESSION['res_'] = 'Silahkan login terlebih dahulu untuk melanjutkan!';
		// 	redirect(base_url("index.php/login"));
        // }
        
        error_reporting(0);
    }

    function index()
    {
        $data['city'] = $this->model_travel->get_city();
        $data['terminal_list'] = $this->model_travel->get_terminal_list();
        $data['top_6'] = $this->model_travel->get_top_6_destinations();
        $data['company_info'] = $this->model_travel->get_company_info();

        unset($_SESSION['choose_bus']);
        unset($_SESSION['unique_code']);
        unset($_SESSION['selected_bus']);
        unset($_SESSION['voucher_discount']);
        unset($_SESSION['voucher_discount_value']);

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_index', $data);
        $this->load->view('frontend/template/footer', $data);
    }

    function choose_bus()
    {
        $_SESSION['choose_bus'] = $_POST['data'];
        
        $from_destination = $_SESSION['choose_bus']['from'];
        $to_destination = $_SESSION['choose_bus']['to'];
    
        $data['company_info'] = $this->model_travel->get_company_info();
        $data['route_bus'] = $this->model_travel->get_route_bus($from_destination, $to_destination);

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_list_bus', $data);
        $this->load->view('frontend/template/footer', $data);

    }

    function choose_bus_pulang()
    {
        $_SESSION['choose_bus']['from'] = $_REQUEST['from'];
        $_SESSION['choose_bus']['to'] = $_REQUEST['to'];
        $_SESSION['choose_bus']['jumlah_kursi'] = $_REQUEST['total_kursi'];
        $_SESSION['choose_bus']['pulang_'] = $_REQUEST['pulang'];

        $_SESSION['choose_bus']['bus_pergi_id'] = $_REQUEST['id'];
        
        $from_destination = $_SESSION['choose_bus']['from'];
        $to_destination = $_SESSION['choose_bus']['to'];
    
        $data['company_info'] = $this->model_travel->get_company_info();
        $data['route_bus'] = $this->model_travel->get_route_bus($from_destination, $to_destination);

        unset($_SESSION['choose_bus']['pulang']);

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_list_bus', $data);
        $this->load->view('frontend/template/footer', $data);

    }

    function choose_route()
    {
        $id = $_REQUEST['id'];
        $_SESSION['choose_bus']['from'] = $_REQUEST['from'];
        $_SESSION['choose_bus']['to'] = $_REQUEST['to'];
        $_SESSION['choose_bus']['jumlah_kursi'] = $_REQUEST['total_kursi'];
        $_SESSION['choose_bus']['pergi'] = $_REQUEST['pergi'];

        if ($_SESSION['choose_bus']['bus_pergi_id']) {
            $_SESSION['choose_bus']['bus_pulang_id'] = $_REQUEST['id'];
        }

        else {
            $_SESSION['choose_bus']['bus_pergi_id'] = $_REQUEST['id'];
        }

        $from_destination = $_SESSION['choose_bus']['from'];
        $to_destination = $_SESSION['choose_bus']['to'];

        $data['company_info'] = $this->model_travel->get_company_info();
        $data['route_bus_'] = $this->model_travel->get_route_bus($from_destination, $to_destination);
        $data['route_bus__'] = $this->model_travel->get_route_bus($from_destination, $to_destination);

        $data['route_bus'] = !empty($_SESSION['choose_bus']['bus_pulang_id']) ? array_merge($data['route_bus_'], $data['route_bus__']) : $this->model_travel->get_route_bus($from_destination, $to_destination);
        $data['bus_pergi_selected'] = $this->model_travel->get_bus_info_selected($_SESSION['choose_bus']['bus_pergi_id']);
        
        if ($_SESSION['choose_bus']['bus_pulang_id']) {
            $data['bus_pulang_selected'] = $this->model_travel->get_bus_info_selected($_SESSION['choose_bus']['bus_pulang_id']);
        }

        // if ($data['bus_selected']) {
            foreach ($data['route_bus'] as $key => $item) {
                if ($item['id'] == $data['bus_pergi_selected']['id']) {
                    $_SESSION['selected_bus'][$key] = $item;
                }

                if ($item['id'] == $data['bus_pulang_selected']['id']) {
                    $_SESSION['selected_bus'][$key] = $item;
                }
            }
        // }

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_biodata', $data);
        $this->load->view('frontend/template/footer', $data);

    }

    function choose_payment()
    {
        $biodata_pulang = $_GET['biodata_pulang'];
        $biodata_pergi = $_GET['biodata_pergi'];
        $bis_data = $_GET['bis_data'];

        $total_harga = array_sum($_GET['harga']);

        // json
        $json_1 = json_encode($biodata_pulang);
        $json_2 = json_encode($biodata_pergi);

        $customer_information = array(
            'biodata_pulang' => $json_1,
            'biodata_pergi' => $json_2
        );
        
        // final json ready to store session
        $__bus_information = json_encode($bis_data);
        $__customer_information = json_encode($customer_information);

        if (empty($_SESSION['fin_']['total_harga'])) {
            $_SESSION['fin_']['total_harga'] = $total_harga;
        }

        if ($_SESSION['fin_']['total_harga']) {
            $data['total_harga'] = $_SESSION['fin_']['total_harga'];
        }
        else {
            $data['total_harga'] = $total_harga;
        }
        
        $data['company_info'] = $this->model_travel->get_company_info();
        
        if (empty($_SESSION['unique_code'])) {
            $_SESSION['unique_code'] = rand(100,999);
        }

        if (empty($_SESSION['final']['customer_information']) && empty($_SESSION['final']['bus_information'])) {
            $_SESSION['final']['customer_information'] = $__customer_information;
            $_SESSION['final']['bus_information'] = $__bus_information;
        }

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_payment', $data);
        $this->load->view('frontend/template/footer', $data);
    }

    function apply_coupon()
    {
        $voucher_code = $_POST['voucher_discount'];
        $validation_voucher = $this->model_travel->get_voucher_info($voucher_code);

        if ($validation_voucher) {
            $_SESSION['voucher_discount'] = $voucher_code;
            $_SESSION['voucher_discount_value'] = $validation_voucher['discount_value'];
        }

        else {
            $_SESSION['notification_temp'] = 'Failed, apply discount because voucher is invalid/inactive!';

            unset($_SESSION['voucher_discount']);
            unset($_SESSION['voucher_discount_value']);
        }

        redirect(base_url('index.php/travel/choose_payment'));
    }

    function place_order()
    {
        date_default_timezone_set("Asia/Jakarta");
        $data = array(
            'date' => date("m/d/Y"),
            'pergi' => $_SESSION['choose_bus']['pergi'],
            'pulang' => !empty($_SESSION['choose_bus']['pulang_']) ? $_SESSION['choose_bus']['pulang_'] : 0,
            'discount_name' => !empty($_SESSION['voucher_discount']) ? $_SESSION['voucher_discount'] : 0,
            'discount_value' => !empty($_SESSION['voucher_discount_value']) ? $_SESSION['voucher_discount_value'] : 0,
            'bus_total_qty' => $_POST['bus_total_qty'],
            'user_id' => $_SESSION['customer']['id'],
            'customer_information' => $_SESSION['final']['customer_information'],
            'bus_information' => $_SESSION['final']['bus_information'],
            'total_harga' => $_POST['total_harga'],
            'status' => 0
        );

        $_SESSION['total_harga'] = $_POST['total_harga'];

        // mengurangi stok voucher discount
        if ($_SESSION['voucher_discount'] && $_SESSION['voucher_discount_value']) {
            $this->model_travel->update_voucher_list($_SESSION['voucher_discount']);
        }

        $data_bus = json_decode($_SESSION['final']['bus_information'], true);

        // mengurangi stok sisa kursi
        foreach ($data_bus as $key => $item) {
            $this->model_travel->update_stock_kursi_bus($item['total_kursi']);
        }

        $this->model_travel->update_place_order($data);
        redirect(base_url('index.php/travel/transfer_bank'));
    }

    function transfer_bank()
    {
        unset($_SESSION['choose_bus']);
        unset($_SESSION['unique_code']);
        unset($_SESSION['selected_bus']);
        unset($_SESSION['voucher_discount']);
        unset($_SESSION['voucher_discount_value']);
        
        $data['company_info'] = $this->model_travel->get_company_info();
        $data['bank_info'] = $this->model_travel->get_bank_info();
        $data['total_harga'] = $_SESSION['total_harga'];

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_transfer_bank', $data);
        $this->load->view('frontend/template/footer', $data);
    }

    function list_biodata()
    {
        $data['company_info'] = $this->model_travel->get_company_info();
        $data['biodata'] = $this->model_travel->get_biodata_customer($_SESSION['customer']['id']);

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_list_biodata', $data);
        $this->load->view('frontend/template/footer', $data);       
    }

    function add_biodata()
    {
        $data = $_POST['datas'];
        $current_url = $_POST['current_url'];
        
        if ($data['id']) {
            $update = $this->model_travel->update_biodata($data);
            if ($update) {
                header('location:'.$current_url.'');
            }

            else {
                $_SESSION['error'] = 'There s something wrong when update data, please try again later.';
                header('location:'.$current_url.'');
            }
        }

        else {
            $insert = $this->model_travel->insert_biodata_new($data);
            if ($insert) {
                header('location:'.$current_url.'');
            }

            else {
                $_SESSION['error'] = 'There s something wrong when insert data, please try again later.';
                header('location:'.$current_url.'');
            }
        }
    }

    function delete_biodata()
    {
        $id = $_REQUEST['id'];
        $current_url = $_REQUEST['current_url'];

        $delete = $this->model_travel->delete_biodata($id);
        if ($delete) {
            header('location:'.$current_url.'');
        }

        else {
            $_SESSION['error'] = 'There s something wrong when delete data, please try again later.';
            header('location:'.$current_url.'');
        }
    }

    function order_history()
    {
        $data['company_info'] = $this->model_travel->get_company_info();
        $data['order_history'] = $this->model_travel->get_order_history_customer($_SESSION['customer']['id']);

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_order_history', $data);
        $this->load->view('frontend/template/footer', $data);    
    }

    function order_history_detail()
    {
        // final json ready to store session
        // $__bus_information = json_encode($bis_data);
        // $__customer_information = json_encode($customer_information);
        
        $data['company_info'] = $this->model_travel->get_company_info();
        $data['order_detail'] = $this->model_travel->get_order_history_customer_id($_REQUEST['id']);
        $data['order_detail']['_bus_information'] = json_decode($data['order_detail']['bus_information'], true);

        $this->load->view('frontend/template/header', $data);
        $this->load->view('frontend/v_order_history_detail', $data);
        $this->load->view('frontend/template/footer', $data);
    }

    function logout()
    {
        $this->session->sess_destroy();
		redirect(base_url());
    }
}
