<?php
/**
 * Created by PhpStorm.
 * User: macos
 * Date: 1/17/18
 * Time: 7:38 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Model{
    public $table = 'user';
    public $key = 'user_id';
}
?>