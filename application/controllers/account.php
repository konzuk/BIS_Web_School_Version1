<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Account extends My_controller
{

    function index()
	{
        //echo date('y-m-d H:i:s a');

        $this->get_all_accounts('User');

	}

    /*
     *  Manage User
     * */

    function get_photo_site()
    {
        return $this->get_file_site()."accounts/";
    }

    function get_photo_path()
    {
        return $this->get_file_path()."accounts/";
    }

    function initialize_account($account_type)
    {
        if(!$this->is_valid_account_type($account_type)) return false;

        $this->load->model('Account_model');

        $result = new Account_model();
        $result->AccountType = $account_type;
        $result->PhotoFullPath = $this->default_user_image_path();

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

        if(!$result) return false;

        if(isset($result->PhotoPath) && $result->PhotoPath!='')
        {
            $result->PhotoFullPath = $this->get_photo_site().$result->PhotoPath;
        }

        echo json_encode($result);

    }

    function get_account_by_name($user_name)
    {
        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $account->UserName = $user_name;

        $result = $this->Account_model->get_account_by_name($account);

        if(!$result) return false;

        if(isset($result->PhotoPath) && $result->PhotoPath!='')
        {
            $result->PhotoFullPath = $this->get_photo_site().$result->PhotoPath;
        }

        echo json_encode($result);

    }

    private function upload_user_image(Account_model $account, $delete_if_exist = true)
    {
        if(isset($_FILES['file']) && $_FILES['file']['name'] != '')
        {
            $file_name = $_FILES['file']['name'];
            $file_name = $account->UserName.".".pathinfo($file_name, PATHINFO_EXTENSION);
            $file_path = $this->get_photo_path();

            //delete old file
            if($delete_if_exist && !$this->delete_file($file_path.$file_name)) return false;

            $upload = $this->upload_file($file_path , $file_name);
            if(!$upload) return false;

            $account->PhotoPath = $file_name;
        }

        return true;
    }

    function add_account()
    {
        $data = $this->get_json_object();

        if(!isset($data)) return false;

        if(!$this->is_valid_account_type($data->AccountType)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();

        Model_base::map_objects($account, $data);

        if($account->AccountType == 'Student') $account->IsActive = false;

        //update photo
        if(!$this->upload_user_image($account)) return false;

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

        if(!isset($data)) return false;

        if(!$this->is_valid_account_type($data->AccountType)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();

        Model_base::map_objects($account, $data);

        //update photo
        if(!$this->upload_user_image($account)) return false;

        $result = $this->Account_model->update_account($account);

        if(!$result) return false;

        echo json_encode($result);
    }

    function delete_account()
    {
        $data = $this->get_json_object();

        if(!isset($data)) return false;

        //delete old file
        if( isset($data->PhotoPath) &&
            $data->PhotoPath != '' &&
            !$this->delete_file($this->get_photo_path().$data->PhotoPath)) return false;

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

        if(!isset($data)) return false;

        $this->load->model('Account_model', '', true);

        $account = new Account_model();

        $account->AccountId = $data->AccountId;

        $result = $this->Account_model->reset_password($account);

        if(!$result) return false;

        echo true;
        return true;
    }

    function change_password()
    {
        $this->load->model('Account_model', '', true);

        $account = new Account_model();
        $old_password = isset($_POST['OldPassword'])? $_POST['OldPassword'] : '';
        $new_password = isset($_POST['NewPassword'])? $_POST['NewPassword'] : '';
        $account->UserName = isset($_POST['UserName'])? $_POST['UserName']: '';

        $message = '';

        $account->Password = $old_password;
        $result = $account->login($account);
        if($result)
        {
            $account->Password = $new_password;
            $account->AccountId = $result->AccountId;
            $result = $this->Account_model->change_password($account);
            $message = 'Cannot change password.';
        }
        else
        {
            $message = 'Invalid user name or password.';
        }

        if($result)
        {
            header("location:". base_url()."index.php/login");
        }
        else
        {
            $account->OldPassword = $old_password;
            $account->Passowrd = $new_password;
            $account->Message = $message;
            $this->show_change_password($account);
        }
    }

    function show_change_password(Account_model $account=null)
    {
        $this->load->view('admin/change_password', $account);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */