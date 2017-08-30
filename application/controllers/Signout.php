<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Signout extends Public_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
    	$url = $this->session->back;
        $this->session->sess_destroy();
        if ($url) {
            return redirect($url,'refresh');
        }
        redirect('login', 'refresh');
    }
}
?>