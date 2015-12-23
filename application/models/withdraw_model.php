<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Withdraw_model extends Model_base {

    function __construct()
    {
        parent::__construct();
    }

    public $WithdrawId;
    public $WithdrawNumber;
    public $Principle;
    public $Interest;
    public $WithdrawDate;
	public $DepositId;
    public $RepaymentFeeRate;
    public $RepaymentFee;
    public $CreatedBy;
    public $CreatedDate;


    function get_all_withdraws(Withdraw_model $model)
    {
        $result = $this->db->get('withdraw');

        if(!$result || $result->num_rows()== 0) return false;

        return  $result->result('Withdraw_model');
    }

    function get_withdraws_by_deposit(Withdraw_model $model)
    {
        $this->db->where('DepositId' , $model->DepositId);

        $result = $this->db->get('withdraw');

        if(!$result || $result->num_rows()== 0) return false;

        return  $result->result('Withdraw_model');
    }

    function get_withdraw(Withdraw_model $model)
    {
        $this->db->where('WithdrawId', $model->WithdrawId);

        $result =$this->db->get('withdraw');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Withdraw_model');
    }

    function is_exist_withdraw(Withdraw_model $model)
    {
        $this->db->where('WithdrawId', $model->WithdrawId);

        $result =$this->db->get('withdraw');

        return $result->num_rows()> 0;
    }

    function is_exist_withdraw_number(Withdraw_model $model)
    {
        $this->db->where('WithdrawNumber', $model->WithdrawNumber);
        $this->db->where('WithdrawId !=', $model->WithdrawId);

        $result =$this->db->get('withdraw');

        return $result->num_rows()> 0;
    }

    function add_withdraw(Withdraw_model $model)
    {
        $this->generate_withdraw_number($model);

        if($this->is_exist_withdraw_number($model)) return false;

        $result=$this->db->insert('withdraw', $model);

        return $result;
    }

    function update_account(Withdraw_model $model)
    {
        $this->generate_withdraw_number($model);

        if($this->is_exist_withdraw_number($model)) return false;

        $this->db->where('WithdrawId', $model->WithdrawId);

        $result = $this->db->update('withdraw', $model);

        return $result;
    }

    function delete_withdraw(Withdraw_model $model)
    {
        $this->db->where('WithdrawId', $model->WithdrawId);

        $result=$this->db->delete('withdraw');

        return $result;
    }

    private function generate_withdraw_number(Withdraw_model $model)
    {
        if(isset($model->WithdrawNumber)) return $model->WithdrawNumber;

        $prefix = date("ym");

        $sql = "select WithdrawNumber from withdraw where WithdrawNumber like '$prefix%' order by WithdrawNumber desc limit 1";

        $result = $this->db->query($sql);

        $withdraw_number = $prefix."001";
        if($result && $result->num_rows()>0)
        {
            $number = $result->first_row()->WithdrawNumber;
            $number = (int) substr($number, 4);
            $number ++;

            $withdraw_number = $prefix.str_pad($number, 3, "0", 0);
        }

        $model->WithdrawNumber = $withdraw_number;

        return $withdraw_number;
    }

}