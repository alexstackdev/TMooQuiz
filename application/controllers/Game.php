<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 28/08/2017
 * Time: 7:32 CH
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Game extends Public_Controller {
    function __construct()
    {
        parent::__construct();
    }

    public function pikachu(){
        $this->data['quiz_info'] = array(
            'title'		=>	'Pikachu',
            'description'   => 'Game Giải Trí',
            'url'       => base_url().'game/piakchu.html'
        );
        $this->data['pikachu'] = true;
        $this->view('web/pikachu_view');
    }

    public function pikachu1(){
        $this->view('web/game/pikachu');
    }
}