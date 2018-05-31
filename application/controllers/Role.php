<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Role extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->id_pengguna=$this->session->userdata('id_pengguna');
        $this->load->model('Mrole');
        $this->load->library('form_validation');        
	$this->load->library('datatables');
    }

    private function cekAkses(){
        $url='Role';
        $this->akses->cek($this->id_pengguna,$url);
    }

    public function index()
    {
        $this->cekAkses();
            $this->template->load('layout','role/view_index');
    } 
    
    public function json() {
        $this->cekAkses();
        header('Content-Type: application/json');
        echo $this->Mrole->json();
    }

    public function setting($id) 
    {
        $this->cekAkses();
        $row = $this->Mrole->get_by_id($id);
        if ($row) {
            $role=$this->Mrole->getMenu($id);
            $data = array(
                'id_inc'    => $row->id_inc,
                'nama_role' => $row->nama_role,
                'role'      =>$role
        	    );
            // $this->load->view('role/view_read', $data);
            $this->template->load('layout','role/view_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role'));
        }
    }

    function prosessettingrole(){
        $this->cekAkses();
        $kode_group =$_POST['kode_group'];
        $roles       =$_POST['role'];
      
        $role=$this->Mrole->do_role($kode_group,$roles);
        if($role){
            $this->session->set_flashdata('msg',  '<div class="note note-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Berhasil </h4>
                            <p>Data telah disimpan.</p>
                        </div>');
            redirect('role');
        }else{
            $this->session->set_flashdata('msg',  '<div class="note note-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h4>Oppss</h4>
                            <p>Data gagal disimpan.</p>
                        </div>');
            redirect('role');
        }
    }

    public function create() 
    {
        $this->cekAkses();
        $data = array(
            'button' => 'Create',
            'action' => site_url('role/create_action'),
	    'id_inc' => set_value('id_inc'),
	    'nama_role' => set_value('nama_role'),
	);
        // $this->load->view('role/view_form', $data);
        $this->template->load('layout','role/view_form',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_role' => $this->input->post('nama_role',TRUE),
	    );

            $this->Mrole->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('role'));
        }
    }
    
    public function update($id) 
    {
        $this->cekAkses();
        $row = $this->Mrole->get_by_id($id);

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('role/update_action'),
		'id_inc' => set_value('id_inc', $row->id_inc),
		'nama_role' => set_value('nama_role', $row->nama_role),
	    );
            // $this->load->view('role/view_form', $data);
            $this->template->load('layout','role/view_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role'));
        }
    }
    
    public function update_action() 
    {
        $this->cekAkses();
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('id_inc', TRUE));
        } else {
            $data = array(
		'nama_role' => $this->input->post('nama_role',TRUE),
	    );

            $this->Mrole->update($this->input->post('id_inc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('role'));
        }
    }
    
    public function delete($id) 
    {
        $this->cekAkses();
        $row = $this->Mrole->get_by_id($id);

        if ($row) {
            $this->Mrole->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('role'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('role'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_role', 'nama role', 'trim|required');

	$this->form_validation->set_rules('id_inc', 'id_inc', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Role.php */
/* Location: ./application/controllers/Role.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-04 04:25:57 */
/* http://harviacode.com */