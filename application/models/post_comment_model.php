<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Post_comment_model extends Model_base
{

    function __construct()
    {
        parent::__construct();
    }

    public $CommentId;
    public $AccountId;
    public $Comment;
	public $PostedDate;
	public $PostId;


    function get_all_post_comments(Post_comment_model $model)
    {
        $this->db->where('PostId', $model->PostId);

        $query = $this->db->get('post_comment');

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Post_comment_model');

        return $result;
    }


    function get_post_comment(Post_comment_model $model)
    {
        $this->db->where('CommentId', $model->CommentId);

        $result =$this->db->get('post_comment');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Post_comment_model');
    }


    function add_post_comment(Post_comment_model $model)
    {
        $result=$this->db->insert('post_comment', $model);
        return $result;
    }

    function update_post_comment(Post_comment_model $model)
    {
        $this->db->where('CommentId', $model->CommentId);

        $result = $this->db->update('post_comment', $model);

        return $result;
    }

    function delete_post_comment(Post_comment_model $model)
    {
        $this->db->where('CommentId', $model->CommentId);

        $result=$this->db->delete('post_comment');

        return $result;
    }


}