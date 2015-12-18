<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Withdraw_model extends Model_base {

    function __construct()
    {
        parent::__construct();
    }

    public $WithdrawId;
    public $WithdrawCode;
    public $Principle;
    public $Interest;
    public $WithdrawDate;
	public $DepositId;
    public $RepaymentFeeRate;
    public $RepaymentFee;
    public $CreatedBy;
    public $CreatedDate;


    function get_withdraws(Withdraw_model $model)
    {
        $query_string = "select (select count(*) from withdraw) as 'RecordCounts', d.* ".
                        "from withdraw d and ($model->DepositId = 0 or d.Deposit = $model->DepositId) ".
                        "limit $model->CurrentRecord, $model->RecordPerPage";

        $query = $this->db->query($query_string);

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Withdraw_model');

        return $result;
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

        if($result->num_rows()== 0) return false;

        return true;
    }

    function is_exist_withdraw_code(Withdraw_model $model)
    {
        $this->db->where('WithdrawCode', $model->WithdrawCode);
        $this->db->where('WithdrawId !=', $model->WithdrawId);

        $result =$this->db->get('withdraw');

        if($result->num_rows()== 0) return false;

        return true;
    }

    function add_withdraw(Withdraw_model $model)
    {
        if($this->is_exist_withdraw_code($model)) return false;

        $result=$this->db->insert('withdraw', $model);
        return $result;
    }

    function update_account(Withdraw_model $model)
    {
        if($this->is_exist_withdraw_code($model)) return false;

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


}