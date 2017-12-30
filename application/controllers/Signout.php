<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Signout extends Public_Controller {
    function __construct() {
        parent::__construct();
    }
    public function index() {
        $this->db->where('user_id',$this->session->user_id)->update('user',array("login" => null));
    	$url = $this->session->back;
        $this->session->sess_destroy();
        if ($url) {
            return redirect($url,'refresh');
        }
        redirect('login', 'refresh');
    }
}
?>