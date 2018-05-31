<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mauth extends CI_Model
{

    
    /*public $id = 'id_inc';
    public $order = 'DESC';*/

    function __construct()
    {
        parent::__construct();
         $this->table = 'ms_pengguna';
    }

    function proseslogin($data=array()){
        // print_r($data);
        $this->db->where('username', $data['username']); 
        $this->db->where('password', $data['password']); 
        $query=$this->db->get($this->table)->row();
        if(!empty($query)){
            $ses=array(
                'sessauth'=>1,
                'id_pengguna'=>$query->id_inc,
                'nama'=>$query->nama,
                'username'=>$query->username,
                'role'=>$query->ms_role_id
                );
            $this->session->set_userdata($ses);
            return 'true';
        }else{
            return 'false';
        }
    }
    

}

 