<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Account extends My_controller
{

    function index()
	{
        //foreach($_SERVER as $key=>$val) echo $key."=>".$val."<br>";

//        echo $_SERVER['DOCUMENT_ROOT'];
//
//        echo BASEPATH."<br>";
//        echo base_url("controller")."<br>";
//        echo  site_url('controller');

        //$this->get_all_accounts('User');
	}

    /*
     *  Manage User
     * */

    function initialize_account($account_type)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model');

        $result = new Account_model();
        $result->AccountType = $account_type;

        echo json_encode($result);
    }

    function initialize_user()
    {
        return $this->initialize_account('User');
    }

    function initialize_depositor()
    {
        return $this->initialize_account('Depositor');
    }

    function initialize_student()
    {
        return $this->initialize_account('Student');
    }

    private function is_valid_account_type($account_type)
    {
        $valid_account_types = array(
            'User' => 'User',
            'Depositor' => 'Depositor',
            'Student' => 'Student'
        );

        return array_key_exists($account_type, $valid_account_types);
    }

    function is_exist_account($account_id)
    {
        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountId = $account_id;

        $result = $this->Account_model->is_exist_account($account);

        return $result;
    }

    function is_exist_account_number($account_type, $account_number, $account_id=0)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountType = $account_type;
        $account->AccountNumber = $account_number;
        $account->AccountId = $account_id;

        $result = $this->Account_model->is_exist_account_number($account);

        return $result;
    }

    function is_exist_user_name($account_type, $user_name, $account_id=0)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountType = $account_type;
        $account->UserName = $user_name;
        $account->AccountId = $account_id;

        $result = $this->Account_model->is_exist_user_name($account);

        return $result;
    }

    function get_accounts($account_type, $current_page=1, $record_per_page= 20)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $input = new Account_model();
        $input->CurrentPage = $current_page > 0 ? $current_page : 1;
        $input->RecordPerPage = $record_per_page > 0?  $record_per_page : 20;
        $input->CurrentRecord = ($input->CurrentPage - 1) * $input->RecordPerPage;
        $input->AccountType = $account_type;

        $data = $this->Account_model->get_accounts($input);


        $result = new Message_result();

        if($data)
        {
            $result->set_success_message($input, $data);
        }
        else
        {
            $result->set_error_message('Search not found');
        }

        echo json_encode($result);
    }

    function get_all_accounts($account_type)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $input = new Account_model();
        $input->AccountType = $account_type;

        $result = $this->Account_model->get_all_accounts($input);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);

    }

    function get_account($account_id)
    {
        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountId = $account_id;

        $result = $this->Account_model->get_account($account);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);

    }

    function get_account_by_account_number($account_type, $account_number)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountType = $account_type;
        $account->AccountNumber = $account_number;

        $result = $this->Account_model->get_account_by_account_number($account);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);

    }

    function add_account()
    {

        $data = $this->get_json_object();

        if(!isset($data))
        {
            return false;
        }

        if(!$this->is_valid_account_type($data->AccountType)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();

        Model_base::map_objects($account, $data);

        if($account->AccountType == 'Student') $account->IsActive = false;

        $result = $this->Account_model->add_account($account);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

    function update_account()
    {
        $data = $this->get_json_object();

        if(!isset($data))
        {
            return false;
        }

        if(!$this->is_valid_account_type($data->AccountType)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();

        Model_base::map_objects($account, $data);

        $result = $this->Account_model->update_account($account);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

    function delete_account()
    {
        $data = $this->get_json_object();

        if(!isset($data))
        {
            return false;
        }

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountId = $data->AccountId;

        $result = $this->Account_model->delete_account($account);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

    function activate_account()
    {
        $data = $this->get_json_object();

        if(!isset($data))
        {
            //echo json_encode('Invalid account');
            echo json_encode(false);
            return false;
        }

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountId = $data->AccountId;
        $account->IsActive = $data->IsActive;

        $result = $this->Account_model->activate_account($account);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

    function reset_password()
    {
        $data = $this->get_json_object();

        if(!isset($data))
        {
            return false;
        }

        $this->load->model('Account_model', '', true);

        $account = new Account_model();

        $account->AccountId = $data->AccountId;

        $result = $this->Account_model->reset_password($account);

        if(!$result)
        {
            return false;
        }

        echo true;
        return true;
    }

    function change_password()
    {
        $data = $this->get_json_object();

        if(!isset($data))
        {
            return false;
        }

        $this->load->model('Account_model', '', true);

        $account = new Account_model();

        $account->AccountId = $data->AccountId;
        $account->Password = $data->Password;

        $result = $this->Account_model->change_password($account);

        if(!$result)
        {
            return false;
        }


        echo true;
        return true;
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */