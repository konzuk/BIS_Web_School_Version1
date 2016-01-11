<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends My_Controller
{


	public function index()
	{
        $this->load->view('admin');
	}
}
