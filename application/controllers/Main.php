<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
	    	$this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
				$this->data['header']   = 'Mantenbaru Wedding Organizer - Mempermudah Calon Pasangan Pengantin Dalam Memilih Vendor Pernikahan Yang Tepat Demi Terwujudnya Pernikahan Yang Sangat Istimewa Sehingga Menciptakan Keluarga Yang Bahagia Selamanya';

				$this->data['post_gedung']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Gedung'));

				$this->data['post_dokumen']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Dokumentasi'));

				$this->data['post_catering']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Catering'));

				$this->data['post_mua']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'MUA'));

				$this->data['post_gaun']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'MUA'));
				
				$this->data['post_dekorasi']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Dekorasi'));

				$this->data['post_souvenir']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Souvenir'));

				$this->data['post_entertain']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Seni Musik'));

				$this->data['post_mc']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'MC'));

				$this->data['post_perhiasan']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Perhiasan'));

				$this->data['post_kue']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Catering'));

				$this->data['post_gubukan']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Catering'));

				$this->data['post_tarian']= $this->Crud_m->view_where_join_three_limit('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10',array('user_company_judul'=>'Seni Musik'));

				$this->data['post_news']= $this->Crud_m->view_join_three('harga','user_bisnis','user_company','kabupaten','id_harga','user_company_account','10');

		$this->load->view('fronts/home/v_index', $this->data);
	}


}
