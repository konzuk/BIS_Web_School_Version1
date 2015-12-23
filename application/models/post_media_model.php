<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post_media_model extends Model_base
{

    function __construct()
    {
        parent::__construct();
    }

    public $PostMediaId;
    public $PostId;
    public $MediaId;


    function get_all_post_medias(Post_media_model $model)
    {
        $this->db->where('PostId', $model->PostId);

        $query = $this->db->get('post_media');

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Post_media_model');

        return $result;
    }

    function get_post_media(Post_media_model $model)
    {
        $this->db->where('PostMediaId', $model->PostMediaId);

        $result =$this->db->get('post_media');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Post_media_model');
    }

    function is_exist_post_media(Post_media_model $model)
    {
        $this->db->where('PostMediaId', $model->PostMediaId);

        $result =$this->db->get('post_media');

        return $result && $result->num_rows()> 0;
    }

    function add_post_media(Post_media_model $model)
    {
        $result=$this->db->insert('post_media', $model);
        return $result;
    }

    function update_post_media(Post_media_model $model)
    {
        $this->db->where('PostMediaId', $model->PostMediaId);

        $result = $this->db->update('post_media', $model);

        return $result;
    }

    function delete_post_media(Post_media_model $model)
    {
        $this->db->where('PostMediaId', $model->PostMediaId);

        $result=$this->db->delete('post_media');

        return $result;
    }


}