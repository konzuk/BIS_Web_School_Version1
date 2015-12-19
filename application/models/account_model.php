<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Account_model extends Model_base
{

    function __construct()
    {
        parent::__construct();
    }

    public $AccountId;
    public $AccountNumber;
    public $LastName;
    public $FirstName;
    public $Email;
    public $PhoneNumber;
    public $PhotoPath;
    public $Password;
    public $WithdrawMethod;
    public $WithdrawMethodName;
    public $IsActive;
    public $RegisterDate;
    public $AccountType;


    function get_accounts(Account_model $account)
    {
        $query_string = "select (select count(*) from account) as 'RecordCounts', a.* from account a ".
                        "where AccountType='$account->AccountType' ".
                        "limit $account->CurrentRecord, $account->RecordPerPage";

        $query = $this->db->query($query_string);

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Account_model');

        return $result;
    }

    function get_account(Account_model $account)
    {
        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountId', $account->AccountId);

        $result =$this->db->get('account');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Account_model');
    }

    function get_account_by_account_number(Account_model $account)
    {
        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountNumber', $account->AccountNumber);

        $result =$this->db->get('account');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Account_model');
    }

    function is_exist_account(Account_model $account)
    {
        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountId', $account->AccountId);

        $result =$this->db->get('account');

        if($result->num_rows()== 0) return false;

        return true;
    }

    function is_exist_account_number(Account_model $account)
    {
        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountNumber', $account->AccountNumber);
        $this->db->where('AccountId !=', $account->AccountId);

        $result =$this->db->get('account');

        if($result->num_rows()== 0) return false;

        return true;
    }

    function add_account(Account_model $account)
    {
        if($this->is_exist_account_number($account)) return false;

        $result=$this->db->insert('account', $account);

        return $result;
    }

    function update_account(Account_model $account)
    {
        if($this->is_exist_account_number($account)) return false;

        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountId', $account->AccountId);

        $result = $this->db->update('account', $account);

        return $result;
    }

    function delete_account(Account_model $account)
    {
        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountId', $account->AccountId);



        $result=$this->db->delete('account');


        return $result;
    }

    function activate_account(Account_model $account)
    {
        if(!$this->is_exist_account($account)) return false;

        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountId', $account->AccountId);

        $result = $this->db->update('account', array('IsActive'=>$account->IsActive));

        return $result;
    }


}