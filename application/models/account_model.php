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
    public $UserName;
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

    function get_all_accounts(Account_model $account)
    {
        $this->db->where('AccountType',$account->AccountType);

        $query = $this->db->get('account');

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Account_model');

        return $result;
    }

    function get_account(Account_model $account)
    {
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

    function get_account_by_name(Account_model $account)
    {
        $this->db->where('UserName', $account->UserName);

        $result =$this->db->get('account');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Account_model');
    }

    function is_exist_account(Account_model $account)
    {
        $this->db->where('AccountId', $account->AccountId);

        $result =$this->db->get('account');

        return $result && $result->num_rows()> 0;
    }

    function is_exist_account_number(Account_model $account)
    {
        $this->db->where('AccountType', $account->AccountType);
        $this->db->where('AccountNumber', $account->AccountNumber);
        $this->db->where('AccountId !=', $account->AccountId);

        $result =$this->db->get('account');

        return $result && $result->num_rows()> 0;
    }

    function is_exist_user_name(Account_model $account)
    {
        $this->db->where('UserName', $account->UserName);
        $this->db->where('AccountId !=', $account->AccountId);

        $result =$this->db->get('account');

        return $result && $result->num_rows()> 0;
    }

    function add_account(Account_model $account)
    {
        if($account->AccountType == 'Depositor' && (!isset($account->UserName) || $this->is_exist_account_number($account))) return false;
        if(!isset($account->UserName) || $this->is_exist_user_name($account)) return false;

        $account->Password = Model_base::encrypt_password($account->Password);

        $result=$this->db->insert('account', $account);

        return $result;
    }

    function update_account(Account_model $account)
    {
        if($account->AccountType == 'Depositor' && (!isset($account->UserName) || $this->is_exist_account_number($account))) return false;
        if(!isset($account->UserName) || $this->is_exist_user_name($account)) return false;

        $this->db->where('AccountId', $account->AccountId);

        //if(isset($account->Password)) unset($account->Password);

        $result = $this->db->update('account', $account);

        return $result;
    }

    function delete_account(Account_model $account)
    {
        $result = $this->get_account($account);
        if(!$result || !$result->AllowDelete) return false;


        $this->db->where('AccountId', $account->AccountId);

        $result=$this->db->delete('account');

        return $result;
    }

    function activate_account(Account_model $account)
    {
        if(!$this->is_exist_account($account)) return false;

        $this->db->where('AccountId', $account->AccountId);

        $result = $this->db->update('account', array('IsActive'=>$account->IsActive));

        return $result;
    }

    function reset_password(Account_model $account)
    {
        if(!$this->is_exist_account($account)) return false;

        $this->db->where('AccountId', $account->AccountId);

        $result = $this->db->update('account', array('Password'=> Model_base::encrypt_password('123456')));

        return $result;
    }

    function change_password(Account_model $account)
    {
        if(!$this->is_exist_account($account)) return false;

        $this->db->where('AccountId', $account->AccountId);

        $result = $this->db->update('account', array('Password'=> Model_base::encrypt_password($account->Password)));

        return $result;
    }

    function login(Account_model $account)
    {
        $this->db->where('UserName', $account->UserName);
        $this->db->where('Password', Model_base::encrypt_password($account->Password));

        $result = $this->db->get('account');

        if($result->num_rows()== 0) return false;

        return $result->first_row('Account_model');
    }


}