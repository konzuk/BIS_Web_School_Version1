<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Media_model extends Model_base
{

    function __construct()
    {
        parent::__construct();
    }

    public $MediaId;
    public $Title;
    public $FileName;
    public $FilePath;
    public $Url;
    public $MediaType;


    function get_medias(Media_model $model)
    {
        $query_string = "select (select count(*) from media) as 'RecordCounts', c.* from media c ".
            "where MediaType='$model->MediaType' ".
            "limit $model->CurrentRecord, $model->RecordPerPage";

        $query = $this->db->query($query_string);

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Media_model');

        return $result;
    }

    function get_all_medias(Media_model $model)
    {
        $this->db->where('MediaType', $model->MediaType);

        $query = $this->db->get('media');

        if(!$query || $query->num_rows()== 0) return false;

        $result= $query->result('Media_model');

        return $result;
    }

    function get_media(Media_model $model)
    {
        $this->db->where('MediaId', $model->MediaId);

        $result =$this->db->get('media');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Media_model');
    }

    function get_media_by_title(Media_model $model)
    {
        $this->db->where('MediaType', $model->MediaType);
        $this->db->where('Title', $model->Title);

        $result =$this->db->get('media');

        if(!$result || $result->num_rows()== 0) return false;

        return $result->first_row('Media_model');
    }

    function is_exist_media(Media_model $model)
    {
        $this->db->where('MediaId', $model->MediaId);

        $result =$this->db->get('media');

        return $result && $result->num_rows()> 0;
    }

    function is_exist_media_title(Media_model $model)
    {
        $this->db->where('MediaType', $model->MediaType);
        $this->db->where('Title', $model->Title);
        $this->db->where('MediaId !=', $model->MediaId);

        $result =$this->db->get('media');

        return $result && $result->num_rows()> 0;
    }

    function add_media(Media_model $model)
    {
        if(!isset($model->Title) || $this->is_exist_media_title($model)) return false;

        $result=$this->db->insert('media', $model);
        return $result;
    }

    function update_media(Media_model $model)
    {
        if(!isset($model->MediaTitle) || $this->is_exist_media_title($model)) return false;

        $this->db->where('MediaId', $model->MediaId);

        $result = $this->db->update('media', $model);

        return $result;
    }

    function delete_media(Media_model $model)
    {
        $this->db->where('MediaId', $model->MediaId);

        $result=$this->db->delete('media');

        return $result;
    }


}