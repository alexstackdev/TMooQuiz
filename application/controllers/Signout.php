<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Signout extends Public_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }
}
?>