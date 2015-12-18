<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Bora
 * Date: 12/17/2015
 * Time: 5:34 AM
 */

class Model_base extends CI_Model
{

    function __construct()
    {
        parent::__construct();
    }

    //Paging
    public $CurrentPage = 1;
    public $RecordPerPage = 20;
    public $CurrentRecord = 0;
    public $RecordCounts = 0;
}