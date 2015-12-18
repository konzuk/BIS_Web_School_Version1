<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Deposit_model extends Model_base {

    function __construct()
    {
        parent::__construct();
    }

    public $DepositId;
    public $DepositNumber;
    public $DepositAmount;
    public $InterestRate;
    public $DepositDate;
    public $Duration;
    public $DurationMode;
    public $Description;
    public $AccountId;
    public $AccountNumber;
    public $AccountModel;


    function get_deposits(Deposit_model $model)
    {
        $query_string = "select (select count(*) from deposit) as 'RecordCounts', d.*, a.AccountNumber ".
                        "from deposit d  join account a on a.AccountId=d.AccountId  ".
                        "limit $model->CurrentRecord, $model->RecordPerPage";

        $query = $this->db->query($query_string);

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Deposit_model');

        return $result;
    }

    function get_deposit(Deposit_model $model)
    {
        $this->db->where('DepositId', $model->DepositId);

        $result =$this->db->get('deposit');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Deposit_model');
    }

    function get_deposit_by_deposit_number(Deposit_model $model)
    {
        $this->db->where('DepositNumber', $model->DepositNumber);

        $result =$this->db->get('deposit');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Deposit_model');
    }

    function is_exist_deposit(Deposit_model $model)
    {
        $this->db->where('DepositId', $model->DepositId);

        $result =$this->db->get('deposit');

        if($result->num_rows()== 0) return false;

        return true;
    }

    function is_exist_deposit_number(Deposit_model $model)
    {
        $this->db->where('DepositNumber', $model->DepositNumber);
        $this->db->where('DepositId !=', $model->DepositId);

        $result =$this->db->get('deposit');

        if($result->num_rows()== 0) return false;

        return true;
    }

    function add_deposit(Deposit_model $model)
    {
        if($this->is_exist_deposit_number($model)) return false;

        $result=$this->db->insert('deposit', $model);
        return $result;
    }

    function update_account(Deposit_model $model)
    {
        if($this->is_exist_deposit_number($model)) return false;

        $this->db->where('DepositId', $model->DepositId);

        $result = $this->db->update('deposit', $model);

        return $result;
    }

    function delete_deposit(Deposit_model $model)
    {
        $this->db->where('DepositId', $model->DepositId);

        $result=$this->db->delete('deposit');

        return $result;
    }


}