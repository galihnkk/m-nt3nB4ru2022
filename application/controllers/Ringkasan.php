<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ringkasan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  public function index()
  {
    redirect(base_url('ringkasan/informasi'));
  }
  public function informasi()
  {
    	    if ($this->session->level=='1')
        {
          cek_session_akses('settings',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('settings',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('settings',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('projek',array('username'=>$this->session->username, 'projek_status'=>'1'),'id_projek','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('projek',array('username'=>$this->session->username,'projek_status'=>'1'),'id_projek','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar',$data);
        }
        else {
          redirect('aspanel/logout');
        }
  }
  public function sampah()
  {
    	    if ($this->session->level=='1')
        {
          cek_session_akses('ringkasan',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('ringkasan',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('ringkasan',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='4')
        {
          cek_session_akses_level_4('ringkasan',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('projek',array('username'=>$this->session->username, 'projek_status'=>'0'),'id_projek','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('ringkasan',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('projek',array('username'=>$this->session->username,'projek_status'=>'0'),'id_projek','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/ringkasan/v_daftar_sampah',$data);
        }
        else {
          redirect('aspanel/logout');
        }
  }
  public function tambah()
  {
						if (isset($_POST['submit']))
						{
							$config['upload_path'] = 'assets/frontend/projek/';
							$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

							$this->upload->initialize($config);
							$this->upload->do_upload('foto1');
							$hasil=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto2');
							$hasil2=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil2['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil2['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto3');
							$hasil3=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil3['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil3['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto4');
							$hasil4=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil4['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil4['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto5');
							$hasil5=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil5['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil5['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							if ($hasil['file_name']=='' && $hasil2['file_name']=='' && $hasil3['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']=='')
              {
								$data = array(
									'username'=>$this->input->post('id'),
									'judul'=>$this->input->post('judul'),
									'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
									'youtube'=>$this->input->post('youtube'),
                  'projek_status'=>'1',
									'deskripsi'=>$this->input->post('deskripsi'),
									'hari'=>hari_ini(date('w')),
                  'tanggal'=>date('Y-m-d'),
                  'jam'=>date('H:i:s'),
									'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
									'keyword'=>$this->input->post('keyword'));
								}
                elseif ($hasil2['file_name']=='' && $hasil3['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']=='')
                {
									$data = array(
										'username'=>$this->input->post('id'),
										'judul'=>$this->input->post('judul'),
										'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
										'youtube'=>$this->input->post('youtube'),
                    'projek_status'=>'1',
										'foto1'=>$hasil['file_name'],
										'deskripsi'=>$this->input->post('deskripsi'),
										'hari'=>hari_ini(date('w')),
                    'tanggal'=>date('Y-m-d'),
                    'jam'=>date('H:i:s'),
										'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
										'keyword'=>$this->input->post('keyword'));
									}
                  elseif ($hasil3['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']=='')
                  {
										$data = array(
											'username'=>$this->input->post('id'),
											'judul'=>$this->input->post('judul'),
											'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
											'youtube'=>$this->input->post('youtube'),
                      'projek_status'=>'1',
											'foto1'=>$hasil['file_name'],
											'foto2'=>$hasil2['file_name'],
											'deskripsi'=>$this->input->post('deskripsi'),
											'hari'=>hari_ini(date('w')),
                      'tanggal'=>date('Y-m-d'),
                      'jam'=>date('H:i:s'),
											'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
											'keyword'=>$this->input->post('keyword'));
										}
                    elseif ($hasil4['file_name']=='' && $hasil5['file_name']=='')
                    {
											$data = array(
												'username'=>$this->input->post('id'),
												'judul'=>$this->input->post('judul'),
												'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
												'youtube'=>$this->input->post('youtube'),
                        'projek_status'=>'1',
												'foto1'=>$hasil['file_name'],
												'foto2'=>$hasil2['file_name'],
												'foto3'=>$hasil3['file_name'],
												'deskripsi'=>$this->input->post('deskripsi'),
												'hari'=>hari_ini(date('w')),
                        'tanggal'=>date('Y-m-d'),
                        'jam'=>date('H:i:s'),
												'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
												'keyword'=>$this->input->post('keyword'));
											}
                      elseif ($hasil5['file_name']=='')
                      {
												$data = array(
													'username'=>$this->input->post('id'),
													'judul'=>$this->input->post('judul'),
													'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
													'youtube'=>$this->input->post('youtube'),
                          'projek_status'=>'1',
													'foto1'=>$hasil['file_name'],
													'foto2'=>$hasil2['file_name'],
													'foto3'=>$hasil3['file_name'],
													'foto4'=>$hasil4['file_name'],
													'deskripsi'=>$this->input->post('deskripsi'),
													'hari'=>hari_ini(date('w')),
                          'tanggal'=>date('Y-m-d'),
                          'jam'=>date('H:i:s'),
													'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
													'keyword'=>$this->input->post('keyword'));
								       }
                       else
                       {
        									$data = array(
        										'username'=>$this->input->post('id'),
        										'judul'=>$this->input->post('judul'),
        										'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
        										'youtube'=>$this->input->post('youtube'),
                            'projek_status'=>'1',
        										'deskripsi'=>$this->input->post('deskripsi'),
        										'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
        										'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
        										'foto1'=>$hasil['file_name'],
        										'foto2'=>$hasil2['file_name'],
        										'foto3'=>$hasil3['file_name'],
        										'foto4'=>$hasil4['file_name'],
        										'foto5'=>$hasil5['file_name'],
        										'keyword'=>$this->input->post('keyword'));

									     }
                       $this->Crud_m->insert('projek',$data);
                       redirect('ringkasan');

						}
            else{
              if ($this->session->level=='1')
                {
                  cek_session_akses('informasi',$this->session->id_session);
                  $this->load->view('backend/ringkasan/v_tambah');
                }
            elseif($this->session->level=='2')
                {
                  cek_session_akses_admin('informasi',$this->session->id_session);

                  $this->load->view('backend/ringkasan/v_tambah');
                }
            elseif($this->session->level=='3')
                {
                  cek_session_akses_level_3('informasi',$this->session->id_session);

                  $this->load->view('backend/ringkasan/v_tambah');
                }
            elseif($this->session->level=='4')
                {
                  cek_session_akses_level_4('informasi',$this->session->id_session);

                  $this->load->view('backend/ringkasan/v_tambah');
                }
            elseif($this->session->level=='5')
                {
                  cek_session_akses_level_5('informasi',$this->session->id_session);

                  $this->load->view('backend/ringkasan/v_tambah');
                }
            else{
                redirect('aspanel/home');
              }
						}
		}
	public function edit()
  {
					$id = $this->uri->segment(3);
						if (isset($_POST['submit']))
						{
							$config['upload_path'] = 'assets/frontend/projek/';
							$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

							$this->upload->initialize($config);
							$this->upload->do_upload('foto1');
							$hasil=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto2');
							$hasil2=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil2['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil2['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto3');
							$hasil3=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil3['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil3['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto4');
							$hasil4=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil4['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil4['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							$this->upload->initialize($config);
							$this->upload->do_upload('foto5');
							$hasil5=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/projek/'.$hasil5['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/projek/'.$hasil5['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							if ($hasil['file_name']=='' && $hasil2['file_name']=='' && $hasil3['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']==''){
							$data = array(
								'username'=>$this->input->post('id'),
								'judul'=>$this->input->post('judul'),
								'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
								'youtube'=>$this->input->post('youtube'),
								'deskripsi'=>$this->input->post('deskripsi'),
								'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
								'keyword'=>$this->input->post('keyword'));
								$where = array('id_projek' => $this->input->post('id_projek'));
							  $this->db->update('projek',$data,$where);

							}elseif ($hasil2['file_name']=='' && $hasil3['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']==''){
								$data = array(
									'username'=>$this->input->post('id'),
									'judul'=>$this->input->post('judul'),
									'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
									'youtube'=>$this->input->post('youtube'),
									'deskripsi'=>$this->input->post('deskripsi'),
									'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
									'foto1'=>$hasil['file_name'],
									'keyword'=>$this->input->post('keyword'));
									$where = array('id_projek' => $this->input->post('id_projek'));
									$_image = $this->db->get_where('projek',$where)->row();
									$query = $this->db->update('projek',$data,$where);
									if($query){
										unlink("assets/frontend/projek/".$_image->foto1);
									}
								}elseif ($hasil['file_name']=='' && $hasil3['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']==''){
									$data = array(
										'username'=>$this->input->post('id'),
										'judul'=>$this->input->post('judul'),
										'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
										'youtube'=>$this->input->post('youtube'),
										'deskripsi'=>$this->input->post('deskripsi'),
										'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
										'foto2'=>$hasil2['file_name'],
										'keyword'=>$this->input->post('keyword'));
										$where = array('id_projek' => $this->input->post('id_projek'));
										$_image = $this->db->get_where('projek',$where)->row();
										$query = $this->db->update('projek',$data,$where);
										if($query){
											unlink("assets/frontend/projek/".$_image->foto2);
										}
									}elseif ($hasil['file_name']=='' && $hasil2['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']==''){
										$data = array(
											'username'=>$this->input->post('id'),
											'judul'=>$this->input->post('judul'),
											'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
											'youtube'=>$this->input->post('youtube'),
											'deskripsi'=>$this->input->post('deskripsi'),
											'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
											'foto3'=>$hasil3['file_name'],
											'keyword'=>$this->input->post('keyword'));
											$where = array('id_projek' => $this->input->post('id_projek'));
											$_image = $this->db->get_where('projek',$where)->row();
											$query = $this->db->update('projek',$data,$where);
											if($query){
												unlink("assets/frontend/projek/".$_image->foto3);
											}
										}elseif ($hasil['file_name']=='' && $hasil2['file_name']=='' && $hasil3['file_name']=='' && $hasil5['file_name']==''){
											$data = array(
												'username'=>$this->input->post('id'),
												'judul'=>$this->input->post('judul'),
												'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
												'youtube'=>$this->input->post('youtube'),
												'deskripsi'=>$this->input->post('deskripsi'),
												'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
												'foto4'=>$hasil4['file_name'],
												'keyword'=>$this->input->post('keyword'));
												$where = array('id_projek' => $this->input->post('id_projek'));
												$_image = $this->db->get_where('projek',$where)->row();
												$query = $this->db->update('projek',$data,$where);
												if($query){
													unlink("assets/frontend/projek/".$_image->foto4);
												}
											}elseif ($hasil['file_name']=='' && $hasil2['file_name']=='' && $hasil3['file_name']=='' && $hasil4['file_name']==''){
												$data = array(
													'username'=>$this->input->post('id'),
													'judul'=>$this->input->post('judul'),
													'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
													'youtube'=>$this->input->post('youtube'),
													'deskripsi'=>$this->input->post('deskripsi'),
													'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
													'foto5'=>$hasil5['file_name'],
													'keyword'=>$this->input->post('keyword'));
													$where = array('id_projek' => $this->input->post('id_projek'));
													$_image = $this->db->get_where('projek',$where)->row();
													$query = $this->db->update('projek',$data,$where);
													if($query){
														unlink("assets/frontend/projek/".$_image->foto5);
													}
											}elseif ($hasil3['file_name']=='' && $hasil4['file_name']=='' && $hasil5['file_name']==''){
									$data = array(
										'username'=>$this->input->post('id'),
										'judul'=>$this->input->post('judul'),
										'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
										'youtube'=>$this->input->post('youtube'),
										'deskripsi'=>$this->input->post('deskripsi'),
										'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
										'foto1'=>$hasil['file_name'],
										'foto2'=>$hasil2['file_name'],
										'keyword'=>$this->input->post('keyword'));
										$where = array('id_projek' => $this->input->post('id_projek'));
										$_image = $this->db->get_where('projek',$where)->row();
										$query = $this->db->update('projek',$data,$where);
										if($query){
											unlink("assets/frontend/projek/".$_image->foto1);
											unlink("assets/frontend/projek/".$_image->foto2);
										}

								}elseif ($hasil['file_name']=='' && $hasil2['file_name']=='' ){
								$data = array(
									'username'=>$this->input->post('id'),
									'judul'=>$this->input->post('judul'),
									'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
									'youtube'=>$this->input->post('youtube'),
									'deskripsi'=>$this->input->post('deskripsi'),
									'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
									'foto3'=>$hasil3['file_name'],
									'foto4'=>$hasil4['file_name'],
									'foto5'=>$hasil5['file_name'],
									'keyword'=>$this->input->post('keyword'));
									$where = array('id_projek' => $this->input->post('id_projek'));
									$_image = $this->db->get_where('projek',$where)->row();
									$query = $this->db->update('projek',$data,$where);
									if($query){
										unlink("assets/frontend/projek/".$_image->foto3);
										unlink("assets/frontend/projek/".$_image->foto4);
										unlink("assets/frontend/projek/".$_image->foto5);
									}

								}elseif ($hasil['file_name']=='' && $hasil2['file_name']=='' && $hasil3['file_name']==''){
								$data = array(
									'username'=>$this->input->post('id'),
									'judul'=>$this->input->post('judul'),
									'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
									'youtube'=>$this->input->post('youtube'),
									'deskripsi'=>$this->input->post('deskripsi'),
									'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
									'foto4'=>$hasil4['file_name'],
									'foto5'=>$hasil5['file_name'],
									'keyword'=>$this->input->post('keyword'));
									$where = array('id_projek' => $this->input->post('id_projek'));
									$_image = $this->db->get_where('projek',$where)->row();
									$query = $this->db->update('projek',$data,$where);
									if($query){
										unlink("assets/frontend/projek/".$_image->foto4);
										unlink("assets/frontend/projek/".$_image->foto5);
									}
								}else{
									$data = array(
									'username'=>$this->input->post('id'),
									'judul'=>$this->input->post('judul'),
									'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
									'youtube'=>$this->input->post('youtube'),
									'deskripsi'=>$this->input->post('deskripsi'),
									'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
									'foto1'=>$hasil['file_name'],
									'foto2'=>$hasil2['file_name'],
									'foto3'=>$hasil3['file_name'],
									'foto4'=>$hasil4['file_name'],
									'foto5'=>$hasil5['file_name'],
									'keyword'=>$this->input->post('keyword'));
									$where = array('id_projek' => $this->input->post('id_projek'));
									$_image = $this->db->get_where('projek',$where)->row();
									$query = $this->db->update('projek',$data,$where);
									if($query){
						                unlink("assets/frontend/projek/".$_image->foto1);
														unlink("assets/frontend/projek/".$_image->foto2);
														unlink("assets/frontend/projek/".$_image->foto3);
														unlink("assets/frontend/projek/".$_image->foto4);
														unlink("assets/frontend/projek/".$_image->foto5);
						                }
								}
									redirect('ringkasan/informasi');
						}else{

              if ($this->session->level=='1')
                {
                  cek_session_akses('ringkasan',$this->session->id_session);
                  $proses = $this->Crud_m->edit('projek', array('id_projek' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/ringkasan/v_edit',$data);
                }
            elseif($this->session->level=='2')
                {
                  cek_session_akses_admin('ringkasan',$this->session->id_session);
                  $proses = $this->Crud_m->edit('projek', array('id_projek' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/ringkasan/v_edit',$data);
                }
            elseif($this->session->level=='3')
                {
                  cek_session_akses_level_3('ringkasan',$this->session->id_session);
                  $proses = $this->Crud_m->edit('projek', array('id_projek' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/ringkasan/v_edit',$data);
                }
            elseif($this->session->level=='4')
                {
                  cek_session_akses_level_4('ringkasan',$this->session->id_session);
                  $proses = $this->Crud_m->edit('projek', array('id_projek' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/ringkasan/v_edit',$data);
                }
            elseif($this->session->level=='5')
                {
                  cek_session_akses_level_5('ringkasan',$this->session->id_session);
                  $proses = $this->Crud_m->edit('projek', array('id_projek' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/ringkasan/v_edit',$data);
                }

						}
		}
	public function hapus()
  {

			$id_projek = $this->uri->segment(3);

			$_id = $this->db->get_where('projek',['id_projek' => $id_projek])->row();
			$query = $this->db->delete('projek',['id_projek'=>$id_projek]);
			if($query){
                unlink("assets/frontend/projek/".$_id->foto1);
								unlink("assets/frontend/projek/".$_id->foto2);
								unlink("assets/frontend/projek/".$_id->foto3);
								unlink("assets/frontend/projek/".$_id->foto4);
								unlink("assets/frontend/projek/".$_id->foto5);
      }
			redirect('ringkasan/sampah');
		}
  public function hapus_temp()
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
				else
				{
							$agent = 'Unidentified User Agent';
				}
		if ($this->session->level=='1'){
			cek_session_akses('ringkasan',$this->session->id_session);
			$data = array('projek_status'=>'0');
      $where = array('id_projek' => $this->uri->segment(3));
			$this->db->update('projek', $data, $where);
			$data_history_addcompany = array (
				'log_activity_user_id'=>$this->session->id_user,
				'log_activity_modul' => 'Hapus Ringkasan',
				'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
				'log_activity_platform'=> $agent,
				'log_activity_ip'=> $this->input->ip_address()
			);
			$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='2'){
        cek_session_akses_admin('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'0');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='3'){
        cek_session_akses_level_3('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'0');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='4'){
        cek_session_akses_level_4('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'0');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='5'){
        cek_session_akses_level_5('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'0');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			} else{

			}

			redirect('ringkasan');
	}
  public function kembalikan()
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
				else
				{
							$agent = 'Unidentified User Agent';
				}
		if ($this->session->level=='1'){
			cek_session_akses('ringkasan',$this->session->id_session);
			$data = array('projek_status'=>'1');
      $where = array('id_projek' => $this->uri->segment(3));
			$this->db->update('projek', $data, $where);
			$data_history_addcompany = array (
				'log_activity_user_id'=>$this->session->id_user,
				'log_activity_modul' => 'Hapus Ringkasan',
				'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
				'log_activity_platform'=> $agent,
				'log_activity_ip'=> $this->input->ip_address()
			);
			$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='2'){
        cek_session_akses_admin('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'1');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='3'){
        cek_session_akses_level_3('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'1');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='4'){
        cek_session_akses_level_4('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'1');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='5'){
        cek_session_akses_level_5('ringkasan',$this->session->id_session);
        $data = array('projek_status'=>'1');
        $where = array('id_projek' => $this->uri->segment(3));
        $this->db->update('projek', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Ringkasan',
								'log_activity_status' => 'Hapus Ringkasan '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			} else{

			}

			redirect('ringkasan');
	}


}
