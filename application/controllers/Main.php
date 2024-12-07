<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
	    	$this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
				$this->data['header']   = 'Mantenbaru Wedding Organizer - Mempermudah Calon Pasangan Pengantin Dalam Memilih Vendor Pernikahan Yang Tepat Demi Terwujudnya Pernikahan Yang Sangat Istimewa Sehingga Menciptakan Keluarga Yang Bahagia Selamanya';
				$this->data['post_news']= $this->Crud_m->view_join_three('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10');

		$this->load->view('fronts/home/v_index', $this->data);
	}


}
