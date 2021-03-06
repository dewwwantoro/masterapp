<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mpengguna extends CI_Model
{

    public $table = 'ms_pengguna';
    public $id = 'id_inc';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // datatables
    function json() {
        $this->datatables->select('ms_pengguna.id_inc,nama,username,password,nama_role');
        $this->datatables->from('ms_pengguna');
        $this->datatables->join('ms_role', 'ms_pengguna.ms_role_id = ms_role.id_inc');
        $this->datatables->add_column('action', anchor(site_url('pengguna/update/$1'),'<i class="fa fa-edit"></i>')."  ".anchor(site_url('pengguna/delete/$1'),'<i class="fa fa-trash"></i>','onclick="javasciprt: return confirm(\'Are You Sure ?\')"'), 'id_inc');
        return $this->datatables->generate();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_inc', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('ms_role_id', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_inc', $q);
	$this->db->or_like('nama', $q);
	$this->db->or_like('username', $q);
	$this->db->or_like('password', $q);
	$this->db->or_like('ms_role_id', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }


    function getRole(){
        return $this->db->get('ms_role')->result();
    }

}

/* End of file Mpengguna.php */
/* Location: ./application/models/Mpengguna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-04 04:38:18 */
/* http://harviacode.com */