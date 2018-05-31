<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pengguna extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->id_pengguna=$this->session->userdata('id_pengguna');
        $this->load->model('Mpengguna');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    private function cekAkses(){
        $url='Pengguna';
        $this->akses->cek($this->id_pengguna,$url);
    }

    public function index()
    {
        $this->cekAkses();
            $this->template->load('layout','pengguna/view_index');
    } 
    
    public function json() {
        $this->cekAkses();
        header('Content-Type: application/json');
        echo $this->Mpengguna->json();
    }

    public function read($id) 
    {
        $this->cekAkses();
        $row = $this->Mpengguna->get_by_id($id);
        if ($row) {
            $data = array(
		'id_inc' => $row->id_inc,
		'nama' => $row->nama,
		'username' => $row->username,
		'password' => $row->password,
		'ms_role_id' => $row->ms_role_id,
	    );
            // $this->load->view('pengguna/view_read', $data);
            $this->template->load('layout','pengguna/view_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function create() 
    {
        $this->cekAkses();
        $data = array(
            'button'     => 'Create',
            'action'     => site_url('pengguna/create_action'),
            'id_inc'     => set_value('id_inc'),
            'nama'       => set_value('nama'),
            'username'   => set_value('username'),
            'password'   => set_value('password'),
            'ms_role_id' => set_value('ms_role_id'),
            'role'=> $this->Mpengguna->getRole()
	);
        $this->template->load('layout','pengguna/view_form',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
                'nama'       => $this->input->post('nama',TRUE),
                'username'   => $this->input->post('username',TRUE),
                'password'   => sha1($this->input->post('password',TRUE)),
                'ms_role_id' => $this->input->post('ms_role_id',TRUE),
        	    );

            $this->Mpengguna->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update($id) 
    {
        $this->cekAkses();
        $row = $this->Mpengguna->get_by_id($id);

        if ($row) {
            $data = array(
                'button'     => 'Update',
                'action'     => site_url('pengguna/update_action'),
                'id_inc'     => set_value('id_inc', $row->id_inc),
                'nama'       => set_value('nama', $row->nama),
                'username'   => set_value('username', $row->username),
                'ms_role_id' => set_value('ms_role_id', $row->ms_role_id),
                'role'       => $this->Mpengguna->getRole()
	    );        
            $this->template->load('layout','pengguna/view_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }
    
    public function update_action() 
    {
        $this->cekAkses();
        $this->_rulesedit();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_inc', TRUE));
        } else {
            $data = array(
                'nama'       => $this->input->post('nama',TRUE),
                'username'   => $this->input->post('username',TRUE),
                'ms_role_id' => $this->input->post('ms_role_id',TRUE),
	           );

            $this->Mpengguna->update($this->input->post('id_inc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('pengguna'));
        }
    }
    
    public function delete($id) 
    {
        $this->cekAkses();
        $row = $this->Mpengguna->get_by_id($id);

        if ($row) {
            $this->Mpengguna->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('pengguna'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('pengguna'));
        }
    }

    public function _rules() 
    {
    	$this->form_validation->set_rules('nama', 'nama', 'trim|required');
    	$this->form_validation->set_rules('username', 'username', 'trim|required');
    	$this->form_validation->set_rules('password', 'password', 'trim|required');
    	$this->form_validation->set_rules('ms_role_id', 'role', 'trim|required');
    	$this->form_validation->set_rules('id_inc', 'id_inc', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function _rulesedit() 
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('ms_role_id', 'role', 'trim|required');
        $this->form_validation->set_rules('id_inc', 'id_inc', 'trim');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }



}

/* End of file Pengguna.php */
/* Location: ./application/controllers/Pengguna.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-04 04:38:18 */
/* http://harviacode.com */