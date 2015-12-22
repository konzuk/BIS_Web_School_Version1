<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post_model extends Model_base

{

    function __construct()
    {
        parent::__construct();
    }

    public $PostId;
    public $PostTitle;
	public $Post;
    public $PostType;
	public $PostBy;
	public $CategoryId;


    function get_posts(Post_model $model)
    {
        $query_string = "select (select count(*) from post) as 'RecordCounts', c.* from post c ".
            "where PostType='$model->PostType' ".
            "limit $model->CurrentRecord, $model->RecordPerPage";

        $query = $this->db->query($query_string);

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Post_model');

        return $result;
    }

    function get_all_posts(Post_model $model)
    {
        $this->db->where('PostType', $model->PostType);

        $query = $this->db->get('post');

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Post_model');

        return $result;
    }

    function get_post(Post_model $model)
    {
        $this->db->where('PostId', $model->PostId);

        $result =$this->db->get('post');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Post_model');
    }

    function get_post_by_title(Post_model $model)
    {
        $this->db->where('PostType', $model->PostType);
        $this->db->where('PostTitle', $model->PostTitle);

        $result =$this->db->get('post');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Post_model');
    }

    function is_exist_post(Post_model $model)
    {
        $this->db->where('PostId', $model->PostId);

        $result =$this->db->get('post');

        return $result && $result->num_rows()> 0;
    }

    function is_exist_post_title(Post_model $model)
    {
        $this->db->where('PostType', $model->PostType);
        $this->db->where('PostTitle', $model->PostTitle);
        $this->db->where('PostId !=', $model->PostId);

        $result =$this->db->get('post');

        return $result && $result->num_rows()> 0;
    }

    function add_post(Post_model $model)
    {
        if(!isset($model->PostTitle) || $this->is_exist_post_title($model)) return false;

        $result=$this->db->insert('post', $model);
        return $result;
    }

    function update_post(Post_model $model)
    {
        if(!isset($model->PostTitle) || $this->is_exist_post_title($model)) return false;

        $this->db->where('PostId', $model->PostId);

        $result = $this->db->update('post', $model);

        return $result;
    }

    function delete_post(Post_model $model)
    {
        $this->db->where('PostId', $model->PostId);

        $result=$this->db->delete('post');

        return $result;
    }


}