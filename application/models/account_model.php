<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class objclass
{

}

class Account_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_all_users()
    {
        
        $query = $this->db->query("select * from account");

        $result= $query->result();

        return $result;
    }

    function delete_user($user)
    {
        $query = $this->db->query("delete from account where AccountID = " + $user.AccountID);
        return $query->result();

        $this->db->query("delete from account where AccountID = " + $user.AccountID);
    }
}