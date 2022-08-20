<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Vendors extends CI_Controller {

public function all()
	{


		$jumlah= $this->Crud_m->view('user_bisnis','id_bisnis','asc')->num_rows();

			$config['base_url'] = base_url().'vendors/all/page/';
			$config['total_rows'] = $jumlah;
			$config['per_page'] = 10;

			$config['full_tag_open']    = "<ul class='cp_content color-1'>";
			$config['full_tag_close']   = "</ul>";
			$config['num_tag_open']     = "<li>";
			$config['num_tag_close']    = "</li>";
			$config['cur_tag_open']     = "<li class='active'><a href='#'>";
			$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
			$config['next_link']        = "<i class='fa fa-angle-right'></i>";
			$config['next_tag_open']    = "<li>";
			$config['next_tagl_close']  = "</li>";
			$config['prev_link']        = "<i class='fa fa-angle-left'></i>";
			$config['prev_tag_open']    = "<li>";
			$config['prev_tagl_close']  = "</li>";
			$config['first_link']       = "<i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i>";
			$config['first_tag_open']   = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_link']        = "<i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i>";
			$config['last_tag_open']    = "<li>";
			$config['last_tagl_close']  = "</li>";


			if ($this->uri->segment('4')==''){
				$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
			}

			if (is_numeric($dari)) {
				$this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
				$this->data['post_news'] = $this->Crud_m->view_join_all('user_bisnis','user_company','kabupaten','user_company_account','id_bisnis','DESC',$dari,$config['per_page'])->result();
				$this->data['header']   = 'Daftar vendor wedding planner di mantenbaru yang menyediakan jasa wedding organizer yang mempermudah calon pasangan pengantin dalam memilih vendor pernikahan yang tepat';
				$this->data['post_kategori'] = $this->Crud_m->view_ordering_limits('user_company','user_company_judul_seo','ASC',$dari,'20');
			}else{
				redirect('main');
			}
			$this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
			$this->pagination->initialize($config);
			$this->load->view('fronts/vendors/all', $this->data);
		}
public function read($id)
  {

				$rows = $this->Crud_m->get_by_id_post($id,'id_bisnis','user_bisnis','namabisnis_seo');

    		if ($rows)
        {
          $this->data['post_v']            = $this->Crud_m->get_by_id_post($id,'id_bisnis','user_bisnis','namabisnis_seo');
					$this->add_count_vendor($id);

					$this->data['post_harga']= $this->Crud_m->view_ones('harga','harga','ASC');
					$this->data['post_projek']= $this->Crud_m->view_ones('projek','id_projek','DESC');
    			$this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
    			$this->load->view('fronts/vendors/profil', $this->data);
    		}else{
        	   redirect(base_url());
            }
    	}
public function readprojek($id)
  {
    		$row = $this->Crud_m->get_by_id_post($id,'id_projek','projek','judul_seo');
    		if ($row)
                {
          	$this->data['post_v']            = $this->Crud_m->get_by_id_post($id,'id_projek','projek','judul_seo');
    				$this->add_count_projek($id);
    				$this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
    			 	$this->load->view('fronts/vendors/projects', $this->data);
    		    }
    		    else
                {
        		  redirect(base_url());
            }
    	}
public function readharga($id)
  {
    		$row = $this->Crud_m->get_by_id_post($id,'id_harga','harga','judul_seo');
    		if ($row)
          	{
              $this->data['post_h']            = $this->Crud_m->get_by_id_post($id,'id_harga','harga','judul_seo');
		    			$this->add_count_harga($id);
		    			$this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
    		    	$this->load->view('fronts/vendors/harga', $this->data);
    		    }else{
        			redirect(base_url());
            }
    	}
public function kategori()
	{
			$query = $this->Crud_m->view_where('user_company',array('user_company_judul_seo' => $this->uri->segment(3)));
			if ($query->num_rows()<=0){
				redirect('main');
			}else{
				$row = $query->row_array();
				$jumlah= $this->Crud_m->view_where('user_bisnis',array('user_company_account' => $row['user_company_account']),'id_bisnis','asc')->num_rows();
				$config['base_url'] = base_url().'vendors/kategori/'.$this->uri->segment(3);
				$config['total_rows'] = $jumlah;

				$config['per_page2'] = 12;
				$config['full_tag_open']    = "<ul class='cp_content color-1'>";
				$config['full_tag_close']   = "</ul>";
				$config['num_tag_open']     = "<li>";
				$config['num_tag_close']    = "</li>";
				$config['cur_tag_open']     = "<li class='active'><a href='#'>";
				$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
				$config['next_link']        = "<i class='fa fa-angle-right'></i>";
				$config['next_tag_open']    = "<li>";
				$config['next_tagl_close']  = "</li>";
				$config['prev_link']        = "<i class='fa fa-angle-left'></i>";
				$config['prev_tag_open']    = "<li>";
				$config['prev_tagl_close']  = "</li>";
				$config['first_link']       = "<i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i>";
				$config['first_tag_open']   = "<li>";
				$config['first_tagl_close'] = "</li>";
				$config['last_link']        = "<i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i>";
				$config['last_tag_open']    = "<li>";
				$config['last_tagl_close']  = "</li>";

				if ($this->uri->segment('4')==''){
					$dari = 0;
				}else{
					$dari = $this->uri->segment('4');
				}
				$data['rows'] = $row;
				if (is_numeric($dari)) {
				  $this->data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
					$this->data['post_news'] = $this->Crud_m->view_join_where_kategori2('user_bisnis','user_company','kabupaten','user_company_account',array('user_company_judul_seo' => $this->uri->segment(3),'user_bisnis.user_company_account' => $row['user_company_account']),'id_bisnis','DESC',$dari,'20')->result();
					$this->data['header']   = 'Daftar vendor wedding planner di mantenbaru yang menyediakan jasa wedding organizer yang mempermudah calon pasangan pengantin dalam memilih vendor pernikahan yang tepat';
          $this->data['post_kategori'] = $this->Crud_m->view_ordering_limits('user_company','user_company_judul_seo','ASC',$dari,'20');
				}else{
					redirect('main');
				}

				$this->pagination->initialize($config);
				$this->load->view('fronts/vendors/kategori', $this->data);
			}
		}


public function buat_captcha()
 {
	    /* memanggil helper captcha dan string */
	    $this->load->helper('captcha');

	    /* menyiapkan data variabel vals melalui array untuk proses pembuatan captcha */
	    $vals = array(
	      /* lokasi gambar captcha, ex: captcha */
	      'img_path'      => './captcha/',
	      /* alamat gambar captcha, ex: www.abcd.com/captcha */
	      'img_url'       => base_url().'captcha/',
	      /* tinggi gambar */
	      'img_height'    => 30,
	      /* waktu berlaku captcha disimpan pada folder aplikasi (100 = dalam detik) */
	      'expiration'    => 100,
	      /* jumlah huruf/ karakter yang ditampilkan */
	      'word_length'   => 5,
	      // pengaturan warna dan background captcha
	      'colors'        => array(
	                          'background' => array(255, 255, 255),
	                          'border' => array(0, 0, 0),
	                          'text' => array(0, 0, 0),
	                          'grid' => array(255, 240, 0)
	                        )
	    );

	    $cap = create_captcha($vals);
	    return $cap;
	  }
function add_count_projek($id)
 {
	 if ($this->agent->is_browser())
			{
						$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
			}
			elseif ($this->agent->is_robot())
			{
						$agent = $this->agent->robot();
			}
			elseif ($this->agent->is_mobile())
			{
						$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
			}
		 $this->load->helper('cookie');
		 $check_visitor = $this->input->cookie(urldecode($id), FALSE);
		 $ip = $this->input->ip_address();
		 if ($check_visitor == false) {
				 $cookie = array("name" => urldecode($id), "value" => "$ip", "expire" => time() + 10, "secure" => false);
				 $this->input->set_cookie($cookie);
				 $this->Crud_m->update_counter_views(urldecode($id),'projek','judul_seo');

				 $data_history_addcompany = array (
					 'log_activity_user_id'=>'User Unregister',
					 'log_activity_modul' => 'Projek',
					 'log_activity_bizacc' => '',
					 'log_activity_document_no' => urldecode($id),
					 'log_activity_status' => 'Visits ',
					 'log_activity_platform'=> $agent,
					 'log_activity_ip'=> $this->input->ip_address()
				 );
				 $this->db->insert('log_activity', $data_history_addcompany);

		 }
 }
function add_count_vendor($id)
 {
	 if ($this->agent->is_browser())
			 {
						 $agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
			 }
			 elseif ($this->agent->is_robot())
			 {
						 $agent = $this->agent->robot();
			 }
			 elseif ($this->agent->is_mobile())
			 {
						 $agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
			 }

		 $this->load->helper('cookie');
		 $check_visitor = $this->input->cookie(urldecode($id), FALSE);
		 $ip = $this->input->ip_address();
		 if ($check_visitor == false) {
				 $cookie = array("name" => urldecode($id), "value" => "$ip", "expire" => time() + 10, "secure" => false);
				 $this->input->set_cookie($cookie);
				 $this->Crud_m->update_counter_views(urldecode($id),'user_bisnis','namabisnis_seo');

				 $data_history_addcompany = array (
					 'log_activity_user_id'=>'User Unregister',
					 'log_activity_modul' => 'Vendor',
					 'log_activity_bizacc' => '',
					 'log_activity_document_no' => urldecode($id),
					 'log_activity_status' => 'Visits ',
					 'log_activity_platform'=> $agent,
					 'log_activity_ip'=> $this->input->ip_address()
				 );
				 $this->db->insert('log_activity', $data_history_addcompany);
		 }
 }
function add_count_harga($id)
 {
	 if ($this->agent->is_browser())
		 {
					 $agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
		 }
		 elseif ($this->agent->is_robot())
		 {
					 $agent = $this->agent->robot();
		 }
		 elseif ($this->agent->is_mobile())
		 {
					 $agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
		 }
		 $this->load->helper('cookie');
		 $check_visitor = $this->input->cookie(urldecode($id), FALSE);
		 $ip = $this->input->ip_address();
		 if ($check_visitor == false) {
				 $cookie = array("name" => urldecode($id), "value" => "$ip", "expire" => time() + 10, "secure" => false);
				 $this->input->set_cookie($cookie);
				 $this->Crud_m->update_counter_views(urldecode($id),'harga','judul_seo');

				 $data_history_addcompany = array (
	 				'log_activity_user_id'=>'User Unregister',
	 				'log_activity_modul' => 'Harga',
	 				'log_activity_bizacc' => '',
	 				'log_activity_document_no' => urldecode($id),
	 				'log_activity_status' => 'Visits ',
	 				'log_activity_platform'=> $agent,
	 				'log_activity_ip'=> $this->input->ip_address()
	 			);
	 			$this->db->insert('log_activity', $data_history_addcompany);

		 }
 }



}
