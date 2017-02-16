<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function index(){
    	if ($this->mcode->admin_logged_in()) {
    		$this->render('admin/upload_quiz_view');
    	}
    	else
    	{
    		redirect('login','refresh');
    	}  
    }
}