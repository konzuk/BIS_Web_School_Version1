<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post extends My_Controller
{

    public function index()
    {
        $this->get_all_posts('News');
    }


    function initialize_post($post_type)
    {
        $this->load->model('Post_model');

        $result = new Post_model();
        $result->PostType = $post_type;

        echo json_encode($result);
    }

    private function is_valid_post_type($post_type)
    {
        $valid_types = array(
            'Event' => 'Event',
            'News' => 'News',
            'Media' => 'Media',
            'Lesson' => 'Lesson',
            'Page' => 'Page'
        );

        return array_key_exists($post_type, $valid_types);
    }

    function is_exist_post($post_id)
    {
        $this->load->model('Post_model', '', true);

        $post = new Post_model();
        $post->PostId = $post_id;

        $result = $this->Post_model->is_exist_post($post);

        echo $result;
        return $result;
    }

    function is_exist_post_title($post_type, $post_title, $post_id=0)
    {
        if(!$this->is_valid_post_type($post_type)) return false;

        $this->load->model('Post_model', '', true);

        $post = new Post_model();
        $post->PostType = $post_type;
        $post->PostTitle = $post_title;
        $post->PostId = $post_id;

        $result = $this->Post_model->is_exist_post_title($post);

        echo $result;
        return $result;
    }

    function get_posts($post_type, $current_page=1, $record_per_page= 20)
    {
        if(!$this->is_valid_post_type($post_type)) return false;

        $this->load->model('Post_model', '', true);

        $input = new Post_model();
        $input->CurrentPage = $current_page > 0 ? $current_page : 1;
        $input->RecordPerPage = $record_per_page > 0?  $record_per_page : 20;
        $input->CurrentRecord = ($input->CurrentPage - 1) * $input->RecordPerPage;
        $input->PostType = $post_type;

        $data = $this->Post_model->get_posts($input);


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

    function get_all_posts($post_type)
    {
        if(!isset($post_type) || !$this->is_valid_post_type($post_type)) return false;

        $this->load->model('Post_model', '', true);

        $input = new Post_model();
        $input->PostType = $post_type;

        $result = $this->Post_model->get_all_posts($input);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

    function get_post($post_id)
    {
        $this->load->model('Post_model', '', true);

        $post = new Post_model();
        $post->PostId = $post_id;

        $result = $this->Post_model->get_post($post);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);

    }

    function get_post_by_title($post_type, $post_title)
    {
        if(!$this->is_valid_post_type($post_type)) return false;

        $this->load->model('Post_model', '', true);

        $post = new Post_model();
        $post->PostType = $post_type;
        $post->PostTitle = $post_title;

        $result = $this->Post_model->get_post_by_title($post);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);

    }

    function add_post()
    {
        $data = $this->get_json_object();

        if(!isset($data))
        {
            return false;
        }

        if(!isset($data->PostType) || !$this->is_valid_post_type($data->PostType)) return false;

        $this->load->model('Post_model', '', true);

        $post = new Post_model();
        Model_base::map_objects($post, $data);

        $result = $this->Post_model->add_post($post);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

    function update_post()
    {
        $data = $this->get_json_object();

        if(!isset($data))
        {
            echo false;
            return false;
        }

        if(!isset($data->PostType) || !$this->is_valid_post_type($data->PostType)) return false;

        $this->load->model('Post_model', '', true);

        $post = new Post_model();
        Model_base::map_objects($post, $data);

        $result = $this->Post_model->udpate_post($post);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

    function delete_post($post_id)
    {
        $this->load->model('Post_model', '', true);

        $post = new Post_model();
        $post->PostId = $post_id;

        $result = $this->Post_model->delete_post($post);

        if(!$result)
        {
            return false;
        }

        echo json_encode($result);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */