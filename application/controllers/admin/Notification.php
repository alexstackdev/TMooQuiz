<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Notification extends Admin_Controller {
    function __construct() {
        parent::__construct();
    }

    public function popup(){
    	if ($this->session->permission == 2) {
    		$this->render('admin/notif_popup');
    	} else {
    		redirect('admin/listquiz','refresh');
    	} 
    }
}