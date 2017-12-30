<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 23/08/2017
 * Time: 8:49 CH
 */
defined('BASEPATH') OR exit('No direct script access allowed');
class Download extends Public_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('zip');
    }

    public function quiz($id){
        if ($this->_user['vip'] != 1 && $id != 563){
            return redirect();
        }
        $quiz = $this->db->query("SELECT * FROM quiz WHERE quiz_id = $id")->row_array();
        $download = $quiz['download']+1;
        $this->db->where('quiz_id',$id);
        $this->db->update('quiz',array("download" => $download));
        $word = $quiz['quiz_slug'].'.doc';
        $txt = $quiz['quiz_slug'].'.txt';
        $data = $quiz['quiz_content'];
        $filename = $quiz['quiz_slug'].'.zip';
        //echo $data;die;
        $this->zip->add_data($word, $data);
        //print_r($quiz);
        $this->zip->read_dir('uploads/img/'.$id,false);
        // Write the zip file to a folder on your server. Name it "my_backup.zip"
        $this->zip->archive($filename);
        if (file_exists($filename)){
            unlink($filename);
        }
        // Download the file to your desktop. Name it "my_backup.zip"
        $this->zip->download($filename);
    }

    /**
     * @return array
     */
    public function installDB()
    {

        //print_r($url);
        $this->load->dbforge();
        $field = array(
            /*'vip'  =>  array(
                'type'          =>  'tinyint',
                'constraint'    =>  1,
                'default'       =>  0
            ),
            'balance'  =>  array(
                'type'          =>  'int',
                'constraint'    =>  11,
                'default'       =>  0
            )*/
            'login'  => array(
                'type'  => 'text',
                'default'   => null
                ),
            'avatar'    => array(
                'type'  => 'varchar',
                'constraint'    => 255,
                'default'   => null
                ),
            'vip_date' => array(
                'type' => 'datetime',
            )            
        );
        //$this->dbforge->add_column('user', $field);
        //$sql = "UPDATE user set vip = 1 where user_id = 1";
        //$this->db->query($sql);
        $a = $this->db->query("SELECT * FROM user")->row_array();
        print_r($a);
    }
}