<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Bora
 * Date: 12/17/2015
 * Time: 5:34 AM
 */

class Message_result extends Model_Base
{

    function __construct($message='', $is_success=false, $model=null, $models=null)
    {
        parent::__construct();

        $this->Message = $message;
        $this->IsSuccess = $is_success;
        $this->Model = $model;
        $this->Models = $models;
    }

    //Paging
    public $CurrentPage = 1;
    public $RecordPerPage = 20;
    public $CurrentRecord = 0;
    public $RecordCounts = 0;
    public $PageCounts = 0;


    //Message
    public $IsSuccess;
    public $Model;
    public $Models;
    public $Message;


    function set_error_message($message)
    {
        $this->Message = $message;
    }

    function set_success_message(Model_base $model, $models = array())
    {
        $this->Message = 'Success';
        $this->IsSuccess = true;

        if(isset($model))
        {
            $this->Model = $model;
            $this->Models = $models;

            //Paging
//            $this->CurrentRecord = $model->CurrentRecord;
//            $this->RecordPerPage = $model->RecordPerPage > 0? $model->RecordPerPage : 20;

//            if(isset($models))
//            {
//                $this->RecordCounts = $models[0]->RecordCounts;
//                $this->PageCounts = ceil($models[0]->RecordCounts / $this->RecordPerPage);
//            }
        }

    }

    function set_message($params = array())
    {
        if(isset($params))
        {
            foreach($params as $key=>$val)
            {
                if(property_exists($this, $key)) $this->$key = $val;
            }
        }
    }


    function create_error_message($message)
    {
        $message = new Message_result($message, false);

        return $message;
    }

    function create_success_message(Model_base $model=null, $models = array())
    {
        $message = new Message_result();
        $message->Message = 'Success';
        $message->IsSuccess = true;

        if(isset($model))
        {
            $message->Model = $model;
            $message->Models = $models;

            //Paging
            $message->CurrentRecord = $model->CurrentRecord;
            $message->RecordPerPage = $model->RecordPerPage > 0? $model->RecordPerPage : 20;

            if(isset($models))
            {
                $message->RecordCounts = $models[0]->RecordCounts;
                $message->PageCounts = ceil($models[0]->RecordCounts / $message->RecordPerPage);
            }
        }

        return $message;
    }

    function create_message($params = array())
    {
        $message = new Message_result();

        if(isset($params))
        {
            foreach($params as $key=>$val)
            {
                if(property_exists($message, $key)) $message->$key = $val;
            }
        }

        return $message;
    }

}