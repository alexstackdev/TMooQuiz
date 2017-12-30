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
        $this->data['game'] = true;
        $this->view('web/game/pikachu');
    }

    public function game2048(){
        $this->data['game'] = true;
        $this->view('web/game/2048');
    }
}