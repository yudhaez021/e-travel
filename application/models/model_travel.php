<?php
class model_travel extends CI_Model {
    
    //  CONSTRUCT

    public function __construct()
    {
        $this->load->database();
    }

    // GET
    
    public function get_city()
    { 
        $query = $this->db->get('ci-travel-bus-city');
        return $query->result_array();
    }

    public function get_terminal_list()
    { 
        $query = $this->db->get('ci-travel-bus-terminal-list');
        return $query->result_array();
    }

    public function get_top_6_destinations()
    { 
        $query = $this->db->get('ci-travel-bus-top-6-destination');
        return $query->result_array();
    }

    public function get_company_info()
    {
        $query = $this->db->get('ci-travel-bus-company-info');
        return $query->row_array();
    }

    public function get_route_bus($from, $to)
    {
        #region mapping from name
        // $f_p_name = $this->db->where('province_code', $from);
        // $f_p_query = $this->db->get('ci-travel-bus-province');
        // $from_province_name = $f_p_query->row_array();

        // $f_c_name = $this->db->where('city_code', $from);
        // $f_c_query = $this->db->get('ci-travel-bus-city');
        // $from_city_name = $f_c_query->row_array();

        $f_t_name = $this->db->where('id', $from);
        $f_t_query = $this->db->get('ci-travel-bus-terminal-list');
        $from_terminal_name = $f_t_query->row_array();
        #endregion

        #region mapping to name
        // $t_p_name = $this->db->where('province_code', $to);
        // $t_p_query = $this->db->get('ci-travel-bus-province');
        // $to_province_name = $t_p_query->row_array();

        // $t_c_name = $this->db->where('city_code', $to);
        // $t_c_query = $this->db->get('ci-travel-bus-city');
        // $to_city_name = $t_c_query->row_array();

        $t_t_name = $this->db->where('id', $to);
        $t_t_query = $this->db->get('ci-travel-bus-terminal-list');
        $to_terminal_name = $t_t_query->row_array();
        #endregion

        // if ($from_province_name || $from_city_name) {
               $_SESSION['from_name'] = $from_terminal_name['nama_terminal'];
        //     $_SESSION['from_name'] = !empty($from_province_name) ? $from_province_name['province_name'] : $from_city_name['city_name'];
        // }

        // if ($to_province_name || $to_city_name) {
               $_SESSION['to_name'] = $to_terminal_name['nama_terminal'];
        //     $_SESSION['to_name'] = !empty($to_province_name) ? $to_province_name['province_name'] : $to_city_name['city_name'];
        // }

        if (!empty($_SESSION['choose_bus']['pulang_'])) {
            $_SESSION['choose_bus']['pergi'] = $_SESSION['choose_bus']['pulang_'];
        }

        $this->db->join('ci-travel-bus-list','ci-travel-bus-list.bus_id=ci-travel-bus-price.bus_id');
        
        if (!empty($_SESSION['choose_bus']['pulang_'])) {
            $where = "jadwal_berangkat LIKE '%".$_SESSION['choose_bus']['pergi']."%' AND asal_tempat = ".$to." AND tujuan_tempat = ".$from." AND sisa_kursi >= ".$_SESSION['choose_bus']['jumlah_kursi']." ";
        }

        else {
            $where = "jadwal_berangkat LIKE '%".$_SESSION['choose_bus']['pergi']."%' AND asal_tempat = ".$from." AND tujuan_tempat = ".$to." AND sisa_kursi >= ".$_SESSION['choose_bus']['jumlah_kursi']." ";
        }

        $this->db->where($where);

        $query = $this->db->get('ci-travel-bus-price');
        $res = $query->result_array();

        foreach ($res as $key => $item) {
            
            #region from
            $ff = $this->db->select('nama_terminal');
            $f__ = $this->db->where('id', $item['asal_tempat']);
            $f = $this->db->get('ci-travel-bus-terminal-list');
            #endregion
            
            #region to
            $tt = $this->db->select('nama_terminal');
            $t__ = $this->db->where('id', $item['tujuan_tempat']);
            $t = $this->db->get('ci-travel-bus-terminal-list');
            #endregion

            #region bus brand
            $bb = $this->db->select('bus_brand');
            $b_ = $this->db->where('id', $item['bus_brand']);
            $b = $this->db->get('ci-travel-bus-brand');
            #endregion

            $res[$key]['from_terminal'] = $f->row_array('nama_terminal');
            $res[$key]['to_terminal'] = $t->row_array('nama_terminal');
            $res[$key]['bus_brand'] = $b->row_array('bus_brand');
        }

        return $res;
    }

    public function get_bus_info_selected($id)
    {
        $this->db->where('id', $id);

        $query = $this->db->get('ci-travel-bus-price');
        return $query->row_array();
    }

    public function get_bank_info()
    {
        $query = $this->db->get('ci-travel-bus-transfer-bank');
        return $query->result_array();
    }

    public function get_voucher_info($val)
    {
        $this->db->where('discount_voucher', $val);

        $query = $this->db->get('ci-travel-bus-discount');
        return $query->row_array();
    }

    public function get_customer_info_from_facebook($email)
    {
        $this->db->where('email', $email);

        $query = $this->db->get('ci-travel-bus-customers');
        return $query->row_array();       
    }

    public function get_customer_info_from_login($id, $password)
    {
        $where_email = $this->db->where('email', $id);
        $where_or = $this->db->or_where('username', $id);
        $where_password = $this->db->where('password', $password);

        $query = $this->db->get('ci-travel-bus-customers');
        
        if ($query->row_array()) {
            $where_update = $this->db->where('email', $id);
            $where_or_update = $this->db->or_where('username', $id);
            $update = $this->db->update('ci-travel-bus-customers', array('last_login' => date("m/d/Y")));
        }
        return $query->row_array();       
    }

    public function get_biodata_customer($id)
    {
        $this->db->where('id_parent', $id);  
        $this->db->where('status', 'P');   
        $query = $this->db->get('ci-travel-bus-customers');

        return $query->result_array();
    }

    public function get_order_history_customer($id)
    {
        $this->db->where('user_id', $id);  
        $query = $this->db->get('ci-travel-bus-orders');

        return $query->result_array();
    }

    public function get_order_history_customer_id($id)
    {
        $this->db->where('id', $id);  
        $query = $this->db->get('ci-travel-bus-orders');

        return $query->row_array();
    }

    // UPDATE

    public function update_place_order($data)
    {
        return $this->db->insert('ci-travel-bus-orders', $data);
    }

    public function update_voucher_list($voucher_code)
    {
        $where = $this->db->where('discount_voucher', $voucher_code);
        $query_get = $this->db->get('ci-travel-bus-discount');
        $list_voucher = $query_get->row_array();

        $qty_voucher = $list_voucher['qty'] - 1;

        $where_update = $this->db->where('qty', '1');
        return $this->db->update('ci-travel-bus-discount', array('qty' => $qty_voucher));
    }

    public function update_login_user($data)
    {
        if ($data['from'] == 'facebook') {
            $where_user = $this->db->where('email', $data['email']);
            $query_user = $this->db->get('ci-travel-bus-customers');
            $get_user = $query_user->row_array();

            if ($get_user) {
                // UPDATE ONLY LAST LOGIN IF USER EXIST
                date_default_timezone_set("Asia/Jakarta");

                $where_update = $this->db->where('email', $data['email']);
                $update = $this->db->update('ci-travel-bus-customers', array('last_login' => date("m/d/Y")));
                return $update;
            }
            
            // STATUS A MEANING FOR USER NOT FOR PROFILE SHIPPING OR BILLING ADDRESS, 
            // P IS MEANING FOR PROFILE SHIPPING OR BILLING ADDRESS BUT DOESN'T SHOW UP FOR USER
            else {
                date_default_timezone_set("Asia/Jakarta");
                $send = array(
                    'id_parent' => 0,
                    'username' => $data['oauth_uid'],
                    'email' => $data['email'],
                    'password' => rand(9999,999999),
                    'phone_number' => '',
                    'b_first_name' => '',
                    'b_last_name' => '',
                    'b_phone_number' => '',
                    'b_no_identity' => '',
                    's_first_name' => '',
                    's_last_name' => '',
                    's_phone_number' => '',
                    's_no_identity' => '',
                    'foto_profile' => $data['picture'],
                    'created_at' => date("m/d/Y"),
                    'last_login' => date("m/d/Y"),
                    'status' => 'A'
                );
                $insert = $this->db->insert('ci-travel-bus-customers', $send);
                return $insert;
            }
        }
    }

    public function update_stock_kursi_bus($data)
    {
        $ids = $data['bus_status_perjalanan'] == 'Pulang' ? $_SESSION['choose_bus']['bus_pulang_id'] : $_SESSION['choose_bus']['bus_pergi_id'];
        
        #region get list bus sisa kursi
        $where_list_bus = $this->db->where('id', $ids);
        $query_list_bus = $this->db->get('ci-travel-bus-price');
        $get_list_bus = $query_list_bus->row_array();
        #endregion

        $this->db->where('id', $ids);
        return $this->db->update('ci-travel-bus-price', array('sisa_kursi' => $get_list_bus['sisa_kursi'] - $data['qty']));
    }

    public function update_biodata($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        
        if ($data['validation']) {
            $update = array(
                'username' => $data['username'],
                'email' => $data['email'],
                'password' => $data['password'],
                'phone_number' => $data['phone_number'],
                'last_login' => date("m/d/Y")
            );

            unset($_SESSION['customer']['username'], $_SESSION['customer']['email'], $_SESSION['customer']['password'], $_SESSION['customer']['phone_number']);
            
            $_SESSION['customer']['username'] = $data['username'];
            $_SESSION['customer']['email'] = $data['email'];
            $_SESSION['customer']['password'] = $data['password'];
            $_SESSION['customer']['phone_number'] = $data['phone_number'];
        }
        
        else {
            $update = array(
                'b_first_name' => $data['first_name'],
                'b_last_name' => $data['last_name'],
                'b_phone_number' => $data['phone_number'],
                'b_no_identity' => $data['no_identity'],
                's_first_name' => $data['first_name'],
                's_last_name' => $data['last_name'],
                's_phone_number' => $data['phone_number'],
                's_no_identity' => $data['no_identity'],
                'created_at' => date("m/d/Y"),
            );
        }      

        $this->db->where('id', $data['id']);
        return $this->db->update('ci-travel-bus-customers', $update);
    }

    // INSERT

    public function insert_login_user($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $send = array(
            'id_parent' => 0,
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone_number' => $data['phone_number'],
            'b_first_name' => '',
            'b_last_name' => '',
            'b_phone_number' => '',
            'b_no_identity' => '',
            's_first_name' => '',
            's_last_name' => '',
            's_phone_number' => '',
            's_no_identity' => '',
            'foto_profile' => '',
            'created_at' => date("m/d/Y"),
            'last_login' => date("m/d/Y"),
            'status' => 'A'
        );
        $insert = $this->db->insert('ci-travel-bus-customers', $send);

        return $insert;
    }

    public function insert_login_parent_id($id)
    {
        $this->db->where('id', $id);   
        $this->db->update('ci-travel-bus-customers', array('id_parent' => $id));
    }

    public function insert_biodata_new($data)
    {
        date_default_timezone_set("Asia/Jakarta");
        $send = array(
            'id_parent' => $_SESSION['customer']['id'],
            'username' => '',
            'email' => '',
            'password' => '',
            'phone_number' => '',
            'b_first_name' => $data['first_name'],
            'b_last_name' => $data['last_name'],
            'b_phone_number' => $data['phone_number'],
            'b_no_identity' => $data['no_identity'],
            's_first_name' => $data['first_name'],
            's_last_name' => $data['last_name'],
            's_phone_number' => $data['phone_number'],
            's_no_identity' => $data['no_identity'],
            'foto_profile' => '',
            'created_at' => date("m/d/Y"),
            'last_login' => '',
            'status' => 'P'
        );
        $insert = $this->db->insert('ci-travel-bus-customers', $send);
        return $insert;
    }

    // DELETE

    public function delete_biodata($id)
    {
        $this->db->where('id', $id);  
        return $this->db->delete('ci-travel-bus-customers');
    }
}