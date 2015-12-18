<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Comment_posting_model extends Model_base

{

    function __construct()
    {
        parent::__construct();
    }

    public $CommentId;
    public $Comment;
	public $PostedDate;
	public $CommentOn;
	public $CommentOnId;
    public $AccountId;
	public $AccountNumber;
	

    function get_comments(Comment_posting_model $model)
    {
        $query_string = "select (select count(*) from commentposting) as 'RecordCounts', c.* from commentposting c ".
            "where CommentOn='$model->CommentOn' and CommentOnId='$model->CommentOnId' ".
            "limit $model->CurrentRecord, $model->RecordPerPage";

        $query = $this->db->query($query_string);

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Comment_posting_model');

        return $result;
    }

    function get_comment(Comment_posting_model $model)
    {
        $this->db->where('CommentOn', $model->CommentOn);
        $this->db->where('CommentId', $model->CommentId);

        $result =$this->db->get('commentposting');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Comment_posting_model');
    }


    function add_comment(Comment_posting_model $model)
    {
        $result=$this->db->insert('commentposting', $model);
        return $result;
    }

    function update_comment(Comment_posting_model $model)
    {
        if($this->is_exist_category_name($model)) return false;

        $this->db->where('CommentType', $model->CommentType);
        $this->db->where('CommentId', $model->CommentId);

        $result = $this->db->update('commentposting', $model);

        return $result;
    }

    function delete_comment(Comment_posting_model $model)
    {
        $this->db->where('CommentType', $model->CommentType);
        $this->db->where('CommentId', $model->CommentId);

        $result=$this->db->delete('commentposting');

        return $result;
    }


}