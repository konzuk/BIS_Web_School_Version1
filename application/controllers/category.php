<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends My_Controller
{

	public function index()
    {
        $this->get_all_categories('News');
    }


    function initialize_category($category_type)
    {
        $this->load->model('Category_model');

        $result = new Category_model();
        $result->CategoryType = $category_type;

        echo json_encode($result);
    }

    private function is_valid_category_type($category_type)
    {
        $valid_types = array(
            'Event' => 'Event',
            'News' => 'News',
            'Media' => 'Media',
            'Lesson' => 'Lesson',
            'Page' => 'Page'
        );

        if(!isset($category_type) || !array_key_exists($valid_types, $category_type))
        {
            echo false;

            return false;
        }

        echo true;
        return true;
    }

    function is_exist_category($category_id)
    {
        $this->load->model('Category_model', '', true);

        $category = new Category_model();
        $category->CategoryId = $category_id;

        $result = $this->Category_model->is_exist_category($category);

        echo $result;
        return $result;
    }

    function is_exist_category_name($category_type, $category_name, $category_id=0)
    {
        if(!$this->is_valid_category_type($category_type)) return false;

        $this->load->model('Category_model', '', true);

        $category = new Category_model();
        $category->CategoryType = $category_type;
        $category->CategoryName = $category_name;
        $category->CategoryId = $category_id;

        $result = $this->Category_model->is_exist_category_name($category);

        echo $result;
        return $result;
    }

    function get_categories($category_type, $current_page=1, $record_per_page= 20)
    {
        if(!$this->is_valid_category_type($category_type)) return false;

        $this->load->model('Category_model', '', true);

        $input = new Category_model();
        $input->CurrentPage = $current_page > 0 ? $current_page : 1;
        $input->RecordPerPage = $record_per_page > 0?  $record_per_page : 20;
        $input->CurrentRecord = ($input->CurrentPage - 1) * $input->RecordPerPage;
        $input->CategoryType = $category_type;

        $data = $this->Category_model->get_categories($input);


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

    function get_all_categories($category_type)
    {
        if(!$this->is_valid_category_type($category_type)) return false;

        $this->load->model('Category_model', '', true);

        $input = new Category_model();
        $input->CategoryType = $category_type;

        $result = $this->Category_model->get_all_categorys($input);

        if(!$result)
        {
            echo false;
            return false;
        }

        echo json_encode($result);
    }

    function get_category($category_id)
    {
        $this->load->model('Category_model', '', true);

        $category = new Category_model();
        $category->CategoryId = $category_id;

        $result = $this->Category_model->get_category($category);

        if($result)
        {
            echo json_encode($result);
            return true;
        }
        else
        {
            echo false;
            return false;
        }

    }

    function get_category_by_name($category_type, $category_name)
    {
        if(!$this->is_valid_category_type($category_type)) return false;

        $this->load->model('Category_model', '', true);

        $category = new Category_model();
        $category->CategoryType = $category_type;
        $category->CategoryNumber = $category_name;

        $result = $this->Category_model->get_category_by_name($category);

        if(!$result)
        {
            echo false;
            return false;
        }

        echo json_encode($result);

    }

    function add_category()
    {


        $data = $this->get_json_object();

        if(!isset($data))
        {
            echo json_encode(false);
            return false;
        }

        if(!isset($data->CategoryType) || !$this->is_valid_category_type($data->CategoryType)) return false;

        $this->load->model('Category_model', '', true);

        $category = new Category_model();
        Model_base::map_objects($category, $data);

        $result = $this->Category_model->add_category($category);

        if(!$result)
        {
            echo false;
            return false;
        }

        echo json_encode($result);
    }

    function update_category()
    {

        $data = $this->get_json_object();

        if(!isset($data))
        {
            echo false;
            return false;
        }

        if(!isset($data->CategoryType) || !$this->is_valid_category_type($data->CategoryType)) return false;

        $this->load->model('Category_model', '', true);

        $category = new Category_model();
        Model_base::map_objects($category, $data);

        $result = $this->Category_model->udpate_category($category);

        if(!$result)
        {
            echo false;
            return false;
        }

        echo json_encode($result);
    }

    function delete_category($category_id)
    {
        $this->load->model('Category_model', '', true);

        $category = new Category_model();
        $category->CategoryId = $category_id;

        $result = $this->Category_model->delete_category($category);

        if(!$result)
        {
            echo false;
            return false;
        }

        echo json_encode($result);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */