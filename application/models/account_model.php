<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account_model extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }

    function get_all_users()
    {
        
        $query = $this->db->query("select * from account");
        return $query->result();
    }
}