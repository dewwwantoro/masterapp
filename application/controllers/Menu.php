<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Menu extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->id_pengguna=$this->session->userdata('id_pengguna');
        $this->load->model('Mmenu');
        $this->load->library('form_validation');
    }

    private function cekAkses(){
        $url='Menu';
        $this->akses->cek($this->id_pengguna,$url);
    }

    public function index()
    {
        $this->cekAkses();
        $q = urldecode($this->input->get('q', TRUE));
        $start = intval($this->input->get('start'));
        
        if ($q <> '') {
            $config['base_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
            $config['first_url'] = base_url() . 'menu/index.html?q=' . urlencode($q);
        } else {
            $config['base_url'] = base_url() . 'menu/index.html';
            $config['first_url'] = base_url() . 'menu/index.html';
        }

        $config['per_page'] = 10;
        $config['page_query_string'] = TRUE;
        $config['total_rows'] = $this->Mmenu->total_rows($q);
        $menu = $this->Mmenu->get_limit_data($config['per_page'], $start, $q);

        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
            'menu_data' => $menu,
            'q' => $q,
            'pagination' => $this->pagination->create_links(),
            'total_rows' => $config['total_rows'],
            'start' => $start,
        );
        // $this->load->view('menu/ms_menu_list', $data);
        $this->template->load('layout','menu/ms_menu_list',$data);
    }

    public function read($id) 
    {
        $this->cekAkses();
        $row = $this->Mmenu->get_by_id($id);
        if ($row) {
            $data = array(
		'id_inc' => $row->id_inc,
		'nama_menu' => $row->nama_menu,
		'link_menu' => $row->link_menu,
		'parent' => $row->parent,
		'sort' => $row->sort,
		'icon' => $row->icon,
	    );
            // $this->load->view('menu/ms_menu_read', $data);
            $this->template->load('layout','menu/ms_menu_read',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function create() 
    {
        $this->cekAkses();
        $data = array(
            'button'    => 'Create',
            'action'    => site_url('menu/create_action'),
            'id_inc'    => set_value('id_inc'),
            'nama_menu' => set_value('nama_menu'),
            'link_menu' => set_value('link_menu'),
            'parent'    => set_value('parent'),
            'sort'      => set_value('sort'),
            'icon'      => set_value('icon'),
            'pm'=>$this->Mmenu->parent()
	);
        // $this->load->view('menu/ms_menu_form', $data);
        $this->template->load('layout','menu/ms_menu_form',$data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nama_menu' => $this->input->post('nama_menu',TRUE),
		'link_menu' => $this->input->post('link_menu',TRUE),
		'parent' => $this->input->post('parent',TRUE),
		'sort' => $this->input->post('sort',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Mmenu->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function update($id) 
    {
        $this->cekAkses();
        $row = $this->Mmenu->get_by_id($id);

        if ($row) {
            $data = array(
                'button'    => 'Update',
                'action'    => site_url('menu/update_action'),
                'id_inc'    => set_value('id_inc', $row->id_inc),
                'nama_menu' => set_value('nama_menu', $row->nama_menu),
                'link_menu' => set_value('link_menu', $row->link_menu),
                'parent'    => set_value('parent', $row->parent),
                'sort'      => set_value('sort', $row->sort),
                'icon'      => set_value('icon', $row->icon),
                'pm'        =>$this->Mmenu->parent()
	    );
            // $this->load->view('menu/ms_menu_form', $data);
            $this->template->load('layout','menu/ms_menu_form',$data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
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
		'nama_menu' => $this->input->post('nama_menu',TRUE),
		'link_menu' => $this->input->post('link_menu',TRUE),
		'parent' => $this->input->post('parent',TRUE),
		'sort' => $this->input->post('sort',TRUE),
		'icon' => $this->input->post('icon',TRUE),
	    );

            $this->Mmenu->update($this->input->post('id_inc', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('menu'));
        }
    }
    
    public function delete($id) 
    {
        $this->cekAkses();
        $row = $this->Mmenu->get_by_id($id);

        if ($row) {
            $this->Mmenu->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('menu'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('menu'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nama_menu', 'nama menu', 'trim|required');
	$this->form_validation->set_rules('link_menu', 'link menu', 'trim|required');
	$this->form_validation->set_rules('parent', 'parent', 'trim|required');
	$this->form_validation->set_rules('sort', 'sort', 'trim|required');
	$this->form_validation->set_rules('icon', 'icon', 'trim|required');

	$this->form_validation->set_rules('id_inc', 'id_inc', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}

/* End of file Menu.php */
/* Location: ./application/controllers/Menu.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-05-04 03:37:35 */
/* http://harviacode.com */