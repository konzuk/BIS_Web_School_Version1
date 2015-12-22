<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Category_model extends Model_base
{

    function __construct()
    {
        parent::__construct();
    }

    public $CategoryId;
    public $CategoryName;
    public $CategoryType;
   

    function get_categories(Category_model $model)
    {
        $query_string = "select (select count(*) from category) as 'RecordCounts', c.* from category c ".
            "where CategoryType='$model->CategoryType' ".
            "limit $model->CurrentRecord, $model->RecordPerPage";

        $query = $this->db->query($query_string);

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Category_model');

        return $result;
    }

    function get_all_categories(Category_model $model)
    {
        $this->db->where('CategoryType=',$model->CategoryType);

        $query = $this->db->get('category');

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Category_model');

        return $result;
    }

    function get_category(Category_model $model)
    {
        $this->db->where('CategoryId', $model->CategoryId);

        $result =$this->db->get('category');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Category_model');
    }

    function get_category_by_name(Category_model $model)
    {
        $this->db->where('CategoryType', $model->CategoryType);
        $this->db->where('CategoryName', $model->CategoryName);

        $result =$this->db->get('category');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Category_model');
    }

    function is_exist_category(Category_model $model)
    {
        $this->db->where('CategoryId', $model->CategoryId);

        $result =$this->db->get('category');

        return $result && $result->num_rows()> 0;
    }

    function is_exist_category_name(Category_model $model)
    {
        $this->db->where('CategoryType', $model->CategoryType);
        $this->db->where('CategoryName', $model->CategoryName);
        $this->db->where('CategoryId !=', $model->CategoryId);

        $result =$this->db->get('category');

        return $result && $result->num_rows()>0;
    }

    function add_category(Category_model $model)
    {
        if(!isset($model->CategoryName) || $this->is_exist_category_name($model)) return false;

        $result=$this->db->insert('category', $model);

        return $result;
    }

    function update_category(Category_model $model)
    {
        if(!isset($model->CategoryName) || $this->is_exist_category_name($model)) return false;

        $this->db->where('CategoryId', $model->CategoryId);

        $result = $this->db->update('category', $model);

        return $result;
    }

    function delete_category(Category_model $model)
    {
        $this->db->where('CategoryId', $model->CategoryId);

        $result=$this->db->delete('category');

        return $result;
    }


}