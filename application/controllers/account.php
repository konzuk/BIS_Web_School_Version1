<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller
{

	function index()
	{
        //$this->load->helper('url');
        $this->manage_user();
	}



    /*
     *  Manage User
     * */
    function get_json_object()
    {
        $json = file_get_contents('php://input');
        return json_decode($json);
    }


    function initialize_account()
    {

        $this->load->model('Account_model', '');

        $result = new Account_model();

        echo json_encode($result);
    }

    function is_valid_account_type($account_type)
    {
        if(!isset($account_type) || ($account_type != 'User' && $account_type != 'Depositor' && $account_type != 'Student'))
        {
            //$result = false;

            $result = new Message_result('Invalid account type.');

            echo json_encode($result);

            return false;
        }

        return true;
    }

    function manage_account($account_type, $current_page=1, $record_per_page= 20)
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

    function is_exist_account($account_type, $account_id)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountType = $account_type;
        $account->AccountId = $account_id;

        $result = $this->Account_model->is_exist_account($account);

        echo json_encode($result);
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

        echo json_encode($result);
    }

    function get_account($account_type, $account_id)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountType = $account_type;
        $account->AccountId = $account_id;

        $data = $this->Account_model->get_account($account);

        $result = new Message_result();
        if($data)
        {
            $result->set_success_message($data, null);
        }
        else
        {
            $result->set_error_message($account->AccountType.' is not exist.');
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

        echo json_encode($result);

    }

    function delete_account($account_type, $account_id)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountType = $account_type;
        $account->AccountId = $account_id;

        $result = $this->Account_model->delete_account($account);

        echo json_encode($account_type, $result);
    }

    function add_account($account_type)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $data = $this->get_json_object();

        if(!isset($data))
        {
            echo json_encode(false);
            return false;
        }

        $account = new Account_model();

        Model_base::map_objects($account, $data);

        $account->AccountType = $account_type;
        $account->Password = Model_base::encrypt_password($account->Password);


        $result = $this->Account_model->add_account($account);

        echo json_encode($result);
    }

    function update_account($account_type)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = $this->get_json_object();

        if(!isset($account))
        {
            //echo json_encode('Invalid account');
            echo json_encode(false);
            return false;
        }

        $result = $this->Account_model->udpate_account($account);

        echo json_encode($result);
    }

    function activate_account($account_type, $account_id, $is_active=true)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->AccountType = $account_type;
        $account->AccountId = $account_id;
        $account->IsActive = $is_active;

        $result = $this->Account_model->activate_account($account);

        echo json_encode($result);
    }


    /*
     *  Manage User
     * */
    function manage_user($current_page = 1, $record_per_page = 20)
    {
        return $this->manage_account('User', $current_page, $record_per_page);
    }

    function is_exist_user($account_id)
    {
        return $this->is_exist_account('User', $account_id);
    }

    function is_exist_user_name($account_number, $account_id = 0)
    {
        return $this->is_exist_account_number('User', $account_number, $account_id);
    }

    function get_user($account_id)
    {
        return $this->get_account('User', $account_id);
    }

    function get_user_by_account_number($account_number)
    {
        return $this->get_account_by_account_number('User', $account_number);
    }

    function delete_user($account_id)
    {
        return $this->delete_account('User', $account_id);
    }

    function add_user()
    {
        return $this->add_account('User');
    }

    function update_user()
    {
        return $this->update_account('User');
    }

    function activate_user($account_id, $is_active=true)
    {
        return $this->activate_account('User', $account_id, $is_active);
    }


    /*
     *  Manage Depositor
     * */
    function manage_depositor($current_page = 1, $record_per_page = 20)
    {
        return $this->manage_account('Depositor', $current_page, $record_per_page);
    }

    function is_exist_depositor($account_id=0)
    {
        return $this->is_exist_account('Depositor', $account_id);
    }

    function is_exist_depositor_name($account_number, $account_id=0)
    {
        return $this->is_exist_account_number('Depositor', $account_number, $account_id);
    }

    function get_depositor($account_id)
    {
        return $this->get_account('Depositor', $account_id);
    }

    function get_depositor_by_account_number($account_number)
    {
        return $this->get_account_by_account_number('Depositor', $account_number);
    }

    function delete_depositor($account_id)
    {
        return $this->delete_account('Depositor', $account_id);
    }

    function add_depositor()
    {
        return $this->add_account('Depositor');
    }

    function update_depositor()
    {
        return $this->update_account('Depositor');
    }

    function activate_depositor($account_id, $is_active=true)
    {
        return $this->activate_account('Depositor', $account_id, $is_active);
    }



    /*
     *  Manage Student
     * */
    function manage_student($current_page = 0, $record_per_page = 20)
    {
        return $this->manage_account('Student', $current_page, $record_per_page);
    }

    function is_exist_student($account_id=0)
    {
        return $this->is_exist_account('Student', $account_id);
    }

    function is_exist_student_name($account_id=0)
    {
        return $this->is_exist_account('Student', $account_id);
    }

    function get_student($account_id)
    {
        return $this->get_account('Student', $account_id);
    }

    function get_student_by_account_number($account_number)
    {
        return $this->get_account_by_account_number('Student', $account_number);
    }

    function delete_student($account_id)
    {
        return $this->delete_account('Student', $account_id);
    }

    function add_student()
    {
        return $this->add_account('Student');
    }

    function update_student()
    {
        return $this->update_account('Student');
    }

    function activate_student($account_id, $is_active=true)
    {
        return $this->activate_account('Student', $account_id, $is_active);
    }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */