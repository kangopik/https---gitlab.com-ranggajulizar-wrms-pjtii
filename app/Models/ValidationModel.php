<?php

namespace App\Models;

use CodeIgniter\Model;
use DateTime;
use DateTimeZone;

class ValidationModel extends Model
{
    public function _make_sure_is_login()
    {
        $usr_id = $this->_get_usr_id();

        if (empty($user_id)) {
            redirect('Dashboard');
        }
    }

    function _get_usr_id()
    {
        $usr_id = "";
        if (isset(session()->userdata['wrms'])) {
            $usr_id = session()->userdata['wrms']['usr_sid'];
        }

        return $usr_id;
    }

    function authenticate($tbl, $email, $password)
    {
        $qry = $this->db->table($tbl);
        $qry->where('usr_email', $email);
        $qry->where('usr_password', $this->hash($password));
        $qry->where('usr_status', 'Active');
        $result = $qry->get();

        if ($result->getNumRows() == 1) {
            return $result->getRow();
        } else {
            return false;
        }
    }

    function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    function is_email_exists($email)
    {
        $result = $this->db->get_where('m_user', array("user_email" => $email));
        if ($result->num_rows() && $result->row()->user_id != '') {
            return true;
        } else {
            return false;
        }
    }

    public function check_session()
    {
        $CI = &get_instance();
        $session = "";
        if (isset($CI->session->userdata['wrms'])) {
            $session = $CI->session->userdata['wrms']['ap_status_login'];
        }
        return $session;
    }

    public function check_session_login()
    {
        $CI = &get_instance();
        $session = "";
        if (isset($CI->session->userdata['wrms'])) {
            $session = $CI->session->userdata['wrms']['ap_status_login'];
        }
        return $session;
    }

    function istokenvalid($token)
    {
        $now = new DateTime(NULL, new DateTimeZone('Asia/Jakarta'));
        $tkn = substr($token, 0, 30);
        $uid = substr($token, 30);

        $query = $this->db->get_where(
            't_token',
            array(
                't_token.tokens_no' => $tkn,
                't_token.user_id' => $uid
            ),
            1
        );

        if ($this->db->affected_rows() > 0) {
            $row = $query->row();

            $created = date('Y-m-d', strtotime($row->created_date));
            $createdTS = strtotime($created);
            $today = $now->format('Y-m-d');
            $todayTS = strtotime($today);

            if ($createdTS != $todayTS) {
                return false;
            }

            $user_info = $this->M_crud->getuserinfo($row->user_id);
            return $user_info;
        } else {
            return false;
        }
    }

    function _check_menu()
    {
        $is_admin = $this->session->userdata['tukubee_backend']['ap_is_admin'];
        $menus = $this->M_crud->get_select_to_array('m.menu_id', 'm_access_role as a', 'm_menu as m', 'a.access_menu = m.menu_id', 'a.access_role', $this->session->userdata['flashsale_backend']['ap_role'], 'a.access_retrive', '1', 'm.menu_id');
        $listmenu = "";

        if (!empty($menus)) {
            foreach ($menus as $item) {
                $listmenu .= $item->id_menu . ",";
            }
            $listmenu = rtrim($listmenu, ",");

            $mysql_query = "select * from m_menu where menu_id in(" . $listmenu . ") order by menu_order asc";

            $query = $this->M_crud->_custom_query($mysql_query);
            $num_rows = $query->num_rows();

            if ($num_rows < 1) {
                if ($is_admin == 1) {
                    return TRUE;
                } else {
                    redirect('Admin');
                }
            } else {
                return TRUE;
            }
        } else {
            if ($is_admin == 1) {
                return TRUE;
            } else {
                redirect('Admin');
            }
        }
    }
}
