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

    function get_all_deposits(Deposit_model $model)
    {
        $result =$this->db->get('deposit');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->result('Deposit_model');
    }

    function get_deposits_by_account(Deposit_model $model)
    {
        $this->db->where('AccountId', $model->AccountId);

        $result =$this->db->get('deposit');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->result('Deposit_model');
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

        return $result->num_rows()> 0;
    }

    function is_exist_deposit_number(Deposit_model $model)
    {
        $this->db->where('DepositNumber', $model->DepositNumber);
        $this->db->where('DepositId !=', $model->DepositId);

        $result =$this->db->get('deposit');

        return $result->num_rows()> 0;
    }

    function add_deposit(Deposit_model $model)
    {
        $this->generate_deposit_number($model);

        if($this->is_exist_deposit_number($model)) return false;

        $result=$this->db->insert('deposit', $model);
        return $result;
    }

    function update_account(Deposit_model $model)
    {
        $this->generate_deposit_number($model);

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

    private function generate_deposit_number(Deposit_model $model)
    {
        if(isset($model->DepositNumber)) return $model->DepositNumber;

        $sql = "select DepositNumber from deposit order by DepositNumber desc limit 1";

        $result = $this->db->query($sql);

        $deposit_number = "00001";
        if($result && $result->num_rows()>0)
        {
            $number = (int) $result->first_row()->DepositNumber;
            $number ++;

            $deposit_number = str_pad($number, 5, "0", 0);
        }

        $model->DepositNumber = $deposit_number;

        return $deposit_number;
    }
}