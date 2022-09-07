<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Aspanel extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
	}
	public function index()
	{
			redirect(base_url('login'));
	}
	public function home()
	{
		if ($this->session->level=='1'){
			cek_session_akses('home',$this->session->id_session);
			$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
			$this->load->view('backend/home', $data);

		}elseif ($this->session->level=='2'){
			cek_session_akses_admin('home',$this->session->id_session);
			$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
			$this->load->view('backend/home', $data);

		}elseif ($this->session->level=='3') {
			cek_session_akses_level_3('home',$this->session->id_session);
			$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
			$this->load->view('backend/home', $data);

		}elseif ($this->session->level=='4') {
			cek_session_akses_level_4('home',$this->session->id_session);
			$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
			$this->load->view('backend/home', $data);

		}elseif ($this->session->level=='5') {
			cek_session_akses_level_5('home',$this->session->id_session);
			$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
			$this->load->view('backend/home', $data);

		}else{
			redirect(base_url());
		}
	}
	public function register()
	{
						$data['title'] = 'Sign Up';
            $this->form_validation->set_rules('username','','trim|required|min_length[5]|max_length[30]|is_unique[user.username]', array('trim' => '','min_length'=>'Minimal 5 karakter','max_length'=>'Maksimal 30 karakter','required' => 'username masih kosong','is_unique' => 'Username telah digunakan, silahkan gunakan username lain.'));
						$this->form_validation->set_rules('nama','','trim|required', array('trim' => '','required'=>'Nama masih kosong'));
            $this->form_validation->set_rules('email','','trim|required|valid_email|is_unique[user.email]', array('trim' => '','required' => 'Email masih kosong','is_unique' => 'Email telah digunakan, silahkan gunakan email lain.'));
            $this->form_validation->set_rules('password','','trim|required', array('trim' => '','required'=>'Password masih kosong'));
            $this->form_validation->set_rules('password2', '','trim|required|matches[password]', array('trim' => '','required' => 'Konfirmasi password masih kosong','matches'=>'Password tidak sama! Cek kembali password Anda'));

            if($this->form_validation->run() != false){
							if (isset($_POST['submit']))
								{
									$nama = $this->input->post('nama');
									$username = $this->input->post('username');
									$email = $this->input->post('email');
									$password = hash("sha512", md5($this->input->post('password')));
									$cek = $this->Crud_m->cek_register($username,$email,'user');
								    $total = $cek->num_rows();
									if ($total > 0)
										{
										$data['title'] = 'Periksa kembali email dan password Anda!';
										redirect(site_url('daftar'));
										}else{
										        $saltid   = md5($email);
														$data = array(
																						'username'=>$this->input->post('username'),
																						'password'=>hash("sha512", md5($this->input->post('password'))),
																						'nama'=>$this->input->post('nama'),
																						'email'=>$this->db->escape_str($this->input->post('email')),
																						'user_status'=> '0',
																						'user_post_hari'=>hari_ini(date('w')),
							                              'user_post_tanggal'=>date('Y-m-d'),
							                              'user_post_jam'=>date('H:i:s'),
																						'level'=>'4',
																						'user_stat'=>'Publish',
																						'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'));

																						if($this->Crud_m->insert('user',$data))
																						{
																								if($this->sendemail($email, $saltid,$username)){
										                			            $this->session->set_flashdata('msg','<div class="alert bg-5 text-center">Segera lakukan aktivasi akun mantenbaru dari email anda. Harap merefresh pesan masuk di email Anda.</div>');
										                			            redirect(base_url('daftar'));
										                 						}else{
										                      					$this->session->set_flashdata('msg','<div class="alert bg-5 text-center">Coba lagi ...</div>');
										                          			    redirect(base_url('daftar'));
										                  				    }
																						}
														$data['title'] = 'Sukses mendaftar';
														$this->load->view('backend/register',$data);
											}
									}else{
													$data['title'] = 'Silahkan lengkapi kembali';
				                	$this->load->view('backend/register', $data);
				            		}
								}else{
									$data['title'] = 'Ops.. Masih ada yang kurang. Silahkan dicek kembali.';
									$this->load->view('backend/register',$data);
								}
	}
	function sendemail($email,$saltid,$username)
	{
		  // configure the email setting
					$config['protocol'] = 'smtp';
					$config['smtp_host'] = 'ssl://mail.crudbiz.com'; //smtp host name
					$config['smtp_port'] = '465'; //smtp port number
					$config['smtp_user'] = 'noreply@crudbiz.com';
					$config['smtp_pass'] = 'dh4wy3p1c'; //$from_email password
					$config['mailtype'] = 'html';
					$config['charset'] = 'iso-8859-1';
					$config['wordwrap'] = TRUE;
					$config['newline'] = "\r\n"; //use double quotes
					$this->email->initialize($config);
					$url = base_url()."aspanel/confirmation/".$saltid;
					$this->email->from('noreply@crudbiz.com', 'Aktivasi Akun');
					$this->email->to($email);
					$this->email->subject('Aktivasi Akun Yuk - Crudbiz');
					$message = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><body><p><strong>Hallo, $username</strong></p><p>Hanya tinggal 1 langkah lagi untuk bisa bergabung dengan Crudbiz.</p><p>Silahkan mengklik link di bawah ini</p>".$url."<br/><p>Salam Hangat</p><p>Crudbiz Team</p></body></html>";
					$this->email->message($message);
					return $this->email->send();
		}
	public function confirmation($key)
	{
					if($this->crud_m->verifyemail($key))
					{
						$this->session->set_flashdata('msg','<div class="alert bg-3 text-center">Selamat Anda telah Resmi Bergabung! Silahkan Login.</div>');
						redirect(base_url('login'));
					}	else {
						$this->session->set_flashdata('msg','<div class="alert bg-3 text-center">Ops. Anda gagal, silahkan coba lagi.</div>');
						redirect(base_url('login'));
					}
	}

	public function check_username_exists($username)
	{
					 $this->form_validation->set_message('check_username_exists', 'Username Sudah diambil. Silahkan gunakan username lain');
					 if($this->As_m->check_username_exists($username)){
							 return true;
					 } else {
							 return false;
					 }
	}
	public function check_email_exists($email)
	{
            $this->form_validation->set_message('check_email_exists', 'Email Sudah diambil. Silahkan gunakan email lain');
            if($this->As_m->check_email_exists($email)){
                return true;
            } else {
                return false;
            }
  }
	public function logout()
	{
		$id = array('id_session' => $this->session->id_session);
						$data = array('user_login_status'=>'offline');
						$this->db->update('user', $data, $id);
            // Unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            // Set message
            $this->session->set_flashdata('user_logout', 'You are now logged out');
						$this->session->sess_destroy();
            redirect(base_url());
    }
	public function profil()
	{

		if (isset($_POST['submit'])){
			$config['upload_path'] = 'assets/frontend/user/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './assets/frontend/user/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '90%';
			$config['width']= 200;
			$config['height']= 200;
			$config['new_image']= './assets/frontend/user/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

				if ($hasil22['file_name']=='' AND $this->input->post('password')=='' ){
									          $data = array(
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
						    								$this->db->update('user',$data,$where);
															}else if ($this->input->post('password')=='' ){
																$data = array(
																'user_gambar'=>$hasil22['file_name'],
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
																$_image = $this->db->get_where('user',$where)->row();
																$query = $this->db->update('user',$data,$where);
																if($query){
																	unlink("assets/frontend/user/".$_image->user_gambar);
																}
															}else if ($hasil22['file_name']==''){
																$data = array(
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'password'=>sha1($this->input->post('password')),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
						    								$this->db->update('user',$data,$where);
															}else{
															$data = array(
																'user_gambar'=>$hasil22['file_name'],
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'password'=>sha1($this->input->post('password')),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
																$_image = $this->db->get_where('user',$where)->row();
																$query = $this->db->update('user',$data,$where);
																if($query){
																	unlink("assets/frontend/user/".$_image->user_gambar);
																}
															}
			redirect('aspanel/profil');
		}else{
		$proses = $this->As_m->edit('user', array('username' => $this->session->username))->row_array();
		$data = array('record' => $proses);
			$data['post'] = $this->As_m->view_ordering('user_detail','id_user','ASC');
			if ($this->session->level=='1'){
				cek_session_akses('profil',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'1'),'id_user','DESC');
				$this->load->view('backend/profil/profilall', $data);
			}elseif ($this->session->level=='2'){
				cek_session_akses_admin('profil',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'1'),'id_user','DESC');
				$this->load->view('backend/profil/profilall', $data);
			}elseif ($this->session->level=='3') {
				cek_session_akses_level_3('profil',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'1'),'id_user','DESC');
				$this->load->view('backend/profil/profilall', $data);
			}elseif ($this->session->level=='4') {
				cek_session_akses_level_4('profil',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'1'),'id_user','DESC');
				$this->load->view('backend/profil/profilall', $data);
			}elseif ($this->session->level=='5') {
				cek_session_akses_level_5('profil',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'1'),'id_user','DESC');
				$this->load->view('backend/profil/profilall', $data);
			}else{
				redirect(base_url());
			}
		}
	}
	public function user_update()
	{
				cek_session_akses($this->session->id_session);
				$id = $this->uri->segment(3);
				if (isset($_POST['submit'])){
					$config['upload_path'] = 'assets/frontend/user/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './assets/frontend/user/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '90%';
					$config['width']= 200;
					$config['height']= 200;
					$config['new_image']= './assets/frontend/user/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($hasil22['file_name']=='' AND $this->input->post('password')=='' ){
										          $data = array(
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
							    								$this->db->update('user',$data,$where);
																}else if ($this->input->post('password')=='' ){
																	$data = array(
																	'user_gambar'=>$hasil22['file_name'],
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
																	$_image = $this->db->get_where('user',$where)->row();
																	$query = $this->db->update('user',$data,$where);
																	if($query){
																		unlink("assets/frontend/user/".$_image->user_gambar);
																	}
																}else if ($hasil22['file_name']==''){
																	$data = array(
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'password'=>sha1($this->input->post('password')),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
							    								$this->db->update('user',$data,$where);
																}else{
																$data = array(
																	'user_gambar'=>$hasil22['file_name'],
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'password'=>sha1($this->input->post('password')),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
																	$_image = $this->db->get_where('user',$where)->row();
																	$query = $this->db->update('user',$data,$where);
																	if($query){
																		unlink("assets/frontend/user/".$_image->user_gambar);
																	}
																}

					redirect('aspanel/profil');
				}else{
				if ($this->session->level=='1'){
							 $proses = $this->As_m->edit('user', array('id_session' => $id))->row_array();
					}else{
							$proses = $this->As_m->edit('user', array('id_session' => $id))->row_array();
					}
					$data = array('rows' => $proses);
					$data['post'] = $this->As_m->view_ordering('user_detail','id_user','ASC');
					if ($this->session->level=='1'){
							$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'active'),'id_user','DESC');
					}else{
					}
					$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
					$data['record_status'] = $this->Crud_m->view_ordering('user_status','user_status_id','DESC');
					$this->load->view('backend/profil/profiledit', $data);
					}
			}
	public function user_storage_bin()
	{
				cek_session_akses ($this->session->id_session);

						if ($this->session->level=='1'){
								$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'2'),'id_user','DESC');
						}else{
								$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'2'),'id_user','DESC');
						}
						$this->load->view('backend/profil/profilblock', $data);
			}
	public function user_delete()
	{
					cek_session_akses ('profil',$this->session->id_session);
					$id = $this->uri->segment(3);
					$_id = $this->db->get_where('user',['id_session' => $id])->row();
					 $query = $this->db->delete('user',['id_session'=>$id]);
				 	if($query){
									 unlink("./bahan/foto_profil/".$_id->user_gambar);
				 }
				redirect('aspanel/user_storage_bin');
			}

	function identitaswebsite()
	{

		if (isset($_POST['submit'])){
					$config['upload_path'] = 'assets/frontend/campur/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('logo');
					$hasillogo=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './assets/frontend/campur/'.$hasillogo['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '100%';
					$config['new_image']= './assets/frontend/campur/'.$hasillogo['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$this->upload->initialize($config);
					$this->upload->do_upload('favicon');
					$hasilfav=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './assets/frontend/campur/'.$hasilfav['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '50%';
					$config['width']= 30;
					$config['height']= 30;
					$config['new_image']= './assets/frontend/campur/'.$hasilfav['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

          if ($hasilfav['file_name']=='' && $hasillogo['file_name']==''){
            	$data = array(
            	                	'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
                                'email'=>$this->db->escape_str($this->input->post('email')),
                                'url'=>$this->db->escape_str($this->input->post('url')),
                                'facebook'=>$this->input->post('facebook'),
                                'instagram'=>$this->input->post('instagram'),
                                'youtube'=>$this->input->post('youtube'),
                                'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
                                'slogan'=>$this->input->post('slogan'),
                                'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
                                'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'meta_keyword'=>$this->input->post('meta_keyword'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
                                'maps'=>$this->input->post('maps'),
															);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
    														$query = $this->db->update('identitas',$data,$where);
            }else if ($hasillogo['file_name']==''){
            	$data = array(
																'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
																'email'=>$this->db->escape_str($this->input->post('email')),
																'url'=>$this->db->escape_str($this->input->post('url')),
																'facebook'=>$this->input->post('facebook'),
																'instagram'=>$this->input->post('instagram'),
																'youtube'=>$this->input->post('youtube'),
																'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
																'slogan'=>$this->input->post('slogan'),
																'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
																'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'meta_keyword'=>$this->input->post('meta_keyword'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
																'maps'=>$this->input->post('maps'),
                                'favicon'=>$hasilfav['file_name']);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
						    								$_image = $this->db->get_where('identitas',$where)->row();
						    								$query = $this->db->update('identitas',$data,$where);
						    								if($query){
						    					                unlink("assets/frontend/campur/".$_image->favicon);
						    					                }
            }else if ($hasilfav['file_name']==''){
            	$data = array(
																'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
																'email'=>$this->db->escape_str($this->input->post('email')),
																'url'=>$this->db->escape_str($this->input->post('url')),
																'facebook'=>$this->input->post('facebook'),
																'instagram'=>$this->input->post('instagram'),
																'youtube'=>$this->input->post('youtube'),
																'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
																'slogan'=>$this->input->post('slogan'),
																'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
																'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'meta_keyword'=>$this->input->post('meta_keyword'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
																'maps'=>$this->input->post('maps'),
                                'logo'=>$hasillogo['file_name']);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
						    								$_image = $this->db->get_where('identitas',$where)->row();
						    								$query = $this->db->update('identitas',$data,$where);
						    								if($query){
						    					                unlink("assets/frontend/campur/".$_image->logo);
						    					                }
            }else{
            	$data = array(
																'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
																'email'=>$this->db->escape_str($this->input->post('email')),
																'url'=>$this->db->escape_str($this->input->post('url')),
																'facebook'=>$this->input->post('facebook'),
																'instagram'=>$this->input->post('instagram'),
																'youtube'=>$this->input->post('youtube'),
																'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
																'slogan'=>$this->input->post('slogan'),
																'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
																'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'meta_keyword'=>$this->input->post('meta_keyword'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
																'maps'=>$this->input->post('maps'),
																'favicon'=>$hasilfav['file_name'],
                                'logo'=>$hasillogo['file_name']);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
						    								$_image = $this->db->get_where('identitas',$where)->row();
						    								$query = $this->db->update('identitas',$data,$where);
						    								if($query){
						    					                unlink("assets/frontend/campur/".$_image->favicon);
																					unlink("assets/frontend/campur/".$_image->logo);
						    					                }
            }
			redirect('aspanel/identitaswebsite');
		}else{

			$proses = $this->As_m->edit('identitas', array('id_identitas' => 1))->row_array();
			$data = array('record' => $proses);
			if ($this->session->level=='1'){
				cek_session_akses('identitaswebsite',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				}elseif ($this->session->level=='2'){
					cek_session_akses_admin('identitaswebsite',$this->session->id_session);
					$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				}else{
					redirect('aspanel/home');
				}
			$this->load->view('backend/identitas/views', $data);
		}
	}

	public function subholding($id)
	{

		$row = $this->Crud_m->get_by_id_post_one($id,'user_company_account','user_company');
		if ($this->uri->segment('4')==''){
			$dari = 0;
			}else{
				$dari = $this->uri->segment('4');
		}
		if ($row)
			{
				$data['posts'] = $this->Crud_m->get_by_id_post_one($id,'user_company_account','user_company');
				$data['record_company_sub'] = $this->Crud_m->view_where_like_ordering('user_company','user_company_account', $id,'user_company_id','ASC');
				$this->load->view('backend/home_subholding', $data);
			}
			else
					{
						$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
							<button type="button" class="close" data-dismiss="alert">&times;</button>Halaman tidak ditemukan</b></div>');
						redirect(base_url());
					}
	}

    /* Data konsumen */
  public function konsumen()
  {
    	    if ($this->session->level=='1'){

    						$data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_status'=>'publish'),'konsumen_tgl_order','ASC');
    				}else if  ($this->session->level=='2'){
    						$data['record'] = $this->Crud_m->view_join_where_ordering_konsumen_leader('konsumen','perumahan','user','konsumen_perumahan_kode','perumahan_kode','id_user','perumahan_pl',array('konsumen_status'=>'publish'),'konsumen_tgl_order','ASC');
    				}else{
    						$data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_cs_fu'=>$this->session->username,'konsumen_status'=>'publish'),'konsumen_tgl_order','ASC');
    				}
							cek_session_akses('konsumen',$this->session->id_session);
    			    $this->load->view('backend/konsumen/v_daftar', $data);
    	}
  public function exportxlskonsumen()
  {
      $data = $this->Crud_m->view_ordering('konsumen','konsumen_tgl_order','ASC');

      include_once APPPATH.'/third_party/xlsxwriter.class.php';
      ini_set('display_errors', 0);
      ini_set('log_errors', 1);
      error_reporting(E_ALL & ~E_NOTICE);


      $filename = "report-".date('d-m-Y-H-i-s').".xlsx";
      header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
      header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');

      $styles = array('widths'=>[3,20,30,40], 'font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom');
      $styles2 = array( ['font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'left', 'border'=>'left,right,top,bottom','fill'=>'#ffc'],['fill'=>'#fcf'],['fill'=>'#ccf'],['fill'=>'#cff'],);

      $header = array(
        'No'=>'integer',
        'Nama Sales'=>'string',
        'Nama Konsumen'=>'string',
        'Tanggal Dealing'=>'string',
        'Minggu'=>'string',
        'Perumahan'=>'string',
        'Media Promosi' =>'string',
        'Nomor Telepon' =>'string',
        'Pembayaran'=>'string',
        'Tanggal FU'=>'string',
        'Status'=>'string',
        'Status Proses'=>'string',
        'Status Prospek'=>'string',
        'Status Update'=>'string',
        'Detail Kondisi'=>'string',
        'Solusi'=>'string',
        'Gaji Istri'=>'string',
        'Gaji Suami'=>'string',
        'Cicilan'=>'string',
        'Kantor Suami'=>'string',
        'Kantor Istri'=>'string',
        'Domisili'=>'string',
      );

      $writer = new XLSXWriter();
      $writer->setAuthor('Admin');

      $writer->writeSheetHeader('Sheet1', $header, $styles);
      $no = 1;
      foreach($data as $row){
        $writer->writeSheetRow('Sheet1', [$no, $row['konsumen_cs_fu'], $row['konsumen_nama'], $row['konsumen_tgl_order'], $row['konsumen_minggu'], $row['konsumen_perumahan_kode'], $row['konsumen_media_nama'], $row['konsumen_telp'], $row['konsumen_pembayaran'], $row['konsumen_tgl_fu'], $row['konsumen_stat'], $row['konsumen_statpros'], $row['konsumen_statprospek'], $row['konsumen_statupdate'], $row['konsumen_kondisi'], $row['konsumen_solusi'], $row['konsumen_gi'], $row['konsumen_gs'], $row['konsumen_cicilan'], $row['konsumen_ks'], $row['konsumen_ki'], $row['konsumen_domisili']], $styles2);
        $no++;
      }
      $writer->writeToStdOut();
    }
	public function konsumen_storage_bin()
	{


				if ($this->session->level=='1'){
				        $data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_status'=>'delete'),'konsumen_tgl_order','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_cs_fu'=>$this->session->username,'konsumen_status'=>'delete'),'konsumen_tgl_order','DESC');
				}
				cek_session_akses('konsumen',$this->session->id_session);
				$this->load->view('backend/konsumen/v_daftar_hapus', $data);
	}
	public function konsumen_tambahkan()
	{


             if (isset($_POST['submit'])){
							$data = array(
							                'konsumen_kode'=>$this->input->post('konsumen_kode'),
											'konsumen_nama'=>$this->input->post('konsumen_nama'),
											'konsumen_tgl_order'=>$this->input->post('konsumen_tgl_order'),
											'konsumen_minggu'=>$this->input->post('konsumen_minggu'),
											'konsumen_perumahan_kode'=>$this->input->post('konsumen_perumahan_kode'),
											'konsumen_media_nama'=>$this->input->post('konsumen_media_nama'),
											'konsumen_telp'=>$this->input->post('konsumen_telp'),
											'konsumen_pembayaran'=>$this->input->post('konsumen_pembayaran'),
											'konsumen_cs_fu'=>$this->input->post('konsumen_cs_fu'),
											'konsumen_tgl_fu'=>$this->input->post('konsumen_tgl_fu'),
											'konsumen_stat'=>$this->input->post('konsumen_stat'),
											'konsumen_statprospek'=>$this->input->post('konsumen_statprospek'),
											'konsumen_statpros'=>$this->input->post('konsumen_statpros'),
											'konsumen_statupdate'=>$this->input->post('konsumen_statupdate'),
											'konsumen_kondisi'=>$this->input->post('konsumen_kondisi'),
											'konsumen_solusi'=>$this->input->post('konsumen_solusi'),
											'konsumen_gi'=>$this->input->post('konsumen_gi'),
											'konsumen_gs'=>$this->input->post('konsumen_gs'),
											'konsumen_cicilan'=>$this->input->post('konsumen_cicilan'),
											'konsumen_ki'=>$this->input->post('konsumen_ki'),
											'konsumen_ks'=>$this->input->post('konsumen_ks'),
											'konsumen_domisili'=>$this->input->post('konsumen_domisili'),

											'konsumen_post_oleh'=>$this->session->username,
											'konsumen_hari'=>hari_ini(date('w')),
											'konsumen_tanggal'=>date('Y-m-d'),
											'konsumen_jam'=>date('H:i:s'),
											'konsumen_status'=>'publish');

								$this->As_m->insert('konsumen',$data);
								redirect('aspanel/konsumen');
				}else{

		            $data['record_cs'] = $this->Crud_m->view_ordering('user','id_user','DESC');
		            $data['record_stat'] = $this->Crud_m->view_ordering('konsumen_status','konsumen_status_id','ASC');
		            $data['record_statupdate'] = $this->Crud_m->view_ordering('konsumen_statupdate','konsumen_statupdate_id','ASC');
		            $data['record_statpros'] = $this->Crud_m->view_ordering('konsumen_statpros','konsumen_statpros_id','ASC');
		            $data['record_statprospek'] = $this->Crud_m->view_ordering('konsumen_statprospek','konsumen_statprospek_id','DESC');
		            $data['record_minggu'] = $this->Crud_m->view_ordering('konsumen_minggu','konsumen_minggu_id','ASC');
		            $data['record_kategori'] = $this->Crud_m->view_ordering('paketharga','paketharga_id','ASC');
		            $data['record_medpro'] = $this->Crud_m->view_ordering('media_promosi','media_promosi_id','ASC');
		            $data['record_bayar'] = $this->Crud_m->view_ordering('konsumen_pembayaran','konsumen_pembayaran_id','ASC');
					cek_session_akses('konsumen',$this->session->id_session);
					$this->load->view('backend/konsumen/v_tambahkan', $data);

				}
	}
	public function konsumen_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
						$data = array(
						          'konsumen_kode'=>$this->input->post('konsumen_kode'),
											'konsumen_nama'=>$this->input->post('konsumen_nama'),
											'konsumen_tgl_order'=>$this->input->post('konsumen_tgl_order'),
											'konsumen_minggu'=>$this->input->post('konsumen_minggu'),
											'konsumen_perumahan_kode'=>$this->input->post('konsumen_perumahan_kode'),
											'konsumen_media_nama'=>$this->input->post('konsumen_media_nama'),
											'konsumen_telp'=>$this->input->post('konsumen_telp'),
											'konsumen_pembayaran'=>$this->input->post('konsumen_pembayaran'),
											'konsumen_cs_fu'=>$this->input->post('konsumen_cs_fu'),
											'konsumen_tgl_fu'=>$this->input->post('konsumen_tgl_fu'),
											'konsumen_stat'=>$this->input->post('konsumen_stat'),
											'konsumen_statprospek'=>$this->input->post('konsumen_statprospek'),
											'konsumen_statpros'=>$this->input->post('konsumen_statpros'),
											'konsumen_statupdate'=>$this->input->post('konsumen_statupdate'),
											'konsumen_kondisi'=>$this->input->post('konsumen_kondisi'),
											'konsumen_solusi'=>$this->input->post('konsumen_solusi'),
											'konsumen_gi'=>$this->input->post('konsumen_gi'),
											'konsumen_gs'=>$this->input->post('konsumen_gs'),
											'konsumen_cicilan'=>$this->input->post('konsumen_cicilan'),
											'konsumen_ki'=>$this->input->post('konsumen_ki'),
											'konsumen_ks'=>$this->input->post('konsumen_ks'),
											'konsumen_domisili'=>$this->input->post('konsumen_domisili'));
											$where = array('konsumen_id' => $this->input->post('konsumen_id'));
											$this->db->update('konsumen', $data, $where);

						redirect('aspanel/konsumen');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->As_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}else{
					$proses = $this->As_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}
			 $data = array('rows' => $proses);
			 $data['record_cs'] = $this->Crud_m->view_ordering('user','id_user','DESC');
		     $data['record_stat'] = $this->Crud_m->view_ordering('konsumen_status','konsumen_status_id','ASC');
		     $data['record_statupdate'] = $this->Crud_m->view_ordering('konsumen_statupdate','konsumen_statupdate_id','ASC');
		     $data['record_statpros'] = $this->Crud_m->view_ordering('konsumen_statpros','konsumen_statpros_id','ASC');
		     $data['record_statprospek'] = $this->Crud_m->view_ordering('konsumen_statprospek','konsumen_statprospek_id','DESC');
		     $data['record_minggu'] = $this->Crud_m->view_ordering('konsumen_minggu','konsumen_minggu_id','ASC');
		     $data['record_kodeper'] = $this->Crud_m->view_ordering('perumahan','perumahan_id','ASC');
		     $data['record_medpro'] = $this->Crud_m->view_ordering('media_promosi','media_promosi_id','ASC');
		     $data['record_bayar'] = $this->Crud_m->view_ordering('konsumen_pembayaran','konsumen_pembayaran_id','ASC');
			cek_session_akses('konsumen',$this->session->id_session);
			$this->load->view('backend/konsumen/v_update', $data);
		}
	}
	public function konsumen_detail()
	{

		$id = $this->uri->segment(3);

			if ($this->session->level=='1'){
					 $proses = $this->As_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}else{
					$proses = $this->As_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}
				$data = array('rows' => $proses);

        $data['record_cs'] = $this->Crud_m->view_ordering('user','id_user','DESC');
	    $data['record'] = $this->Crud_m->view_ordering('perumahan','perumahan_id','DESC');
		cek_session_akses('konsumen',$this->session->id_session);
		$this->load->view('backend/konsumen/v_detail', $data);

	}
	function konsumen_delete_temp()
	{
			cek_session_akses('konsumen',$this->session->id_session);
			$data = array('konsumen_status'=>'delete');
			$where = array('konsumen_id' => $this->uri->segment(3));
			$this->db->update('konsumen', $data, $where);
			redirect('aspanel/konsumen');
	}
	function konsumen_restore()
	{
		cek_session_akses('konsumen',$this->session->id_session);
			$data = array('konsumen_status'=>'Publish');
			$where = array('konsumen_id' => $this->uri->segment(3));
			$this->db->update('konsumen', $data, $where);
			redirect('aspanel/konsumen');
	}
	public function konsumen_delete()
	{
			cek_session_akses('konsumen',$this->session->id_session);
			$id = $this->uri->segment(3);
			$query = $this->db->delete('konsumen',['konsumen_id'=>$id]);

		redirect('aspanel/konsumen_storage_bin');
	}
	/* konsumen - tutup */

		public function logactivity()
		{
			if ($this->session->level=='1'){
				cek_session_akses('activities',$this->session->id_session);
				$data['record'] = $this->Crud_m->view_join_ordering2('log_activity','user','log_activity_user_id','id_user','log_activity_id','DESC');
				}elseif ($this->session->level=='2'){
					cek_session_akses_admin('activities',$this->session->id_session);
					$data['record'] = $this->Crud_m->view_join_ordering2('log_activity','user','log_activity_user_id','id_user','log_activity_id','DESC');
				}else{
					cek_session_akses_level_3('activities',$this->session->id_session);
					redirect('aspanel/profil');
				}
				$this->load->view('backend/log/v_daftar', $data);
		}


		/*	Bagian untuk klien - Pembuka	*/
		public function log_activity()
		{
			if ($this->session->level=='1'){
				cek_session_akses('activities',$this->session->id_session);
				$data['record'] = $this->Crud_m->view_where_ordering('log_activity',array('log_activity_status'=>'publish'),'log_activity_id','DESC');
				}elseif ($this->session->level=='2'){
					cek_session_akses_admin('activities',$this->session->id_session);
					$data['record'] = $this->Crud_m->view_where_ordering('log_activity',array('log_activity_status'=>'publish'),'log_activity_id','DESC');
				}else{
					cek_session_akses_level_3('activities',$this->session->id_session);
					redirect('aspanel/profil');
				}
				$this->load->view('backend/log/v_daftar', $data);
		}
		public function klien_storage_bin()
		{
			if ($this->session->level=='1'){
				cek_session_akses('klien',$this->session->id_session);
				$data['record'] = $this->Crud_m->view_where_ordering('klien',array('klien_status'=>'delete'),'klien_id','DESC');
				}elseif ($this->session->level=='2'){
					cek_session_akses_admin('klien',$this->session->id_session);
					$data['record'] = $this->Crud_m->view_where_ordering('klien',array('klien_status'=>'delete'),'klien_id','DESC');
				}else{
					cek_session_akses_level_3('klien',$this->session->id_session);
					$data['record'] = $this->Crud_m->view_where_ordering('klien',array('klien_post_oleh'=>$this->session->username,'klien_status'=>'delete'),'klien_id','DESC');
				}
				$this->load->view('backend/klien/v_daftar_hapus', $data);
		}
		public function klien_tambahkan()
		{
			if (isset($_POST['submit'])){

						$config['upload_path'] = 'assets/frontend/klien/';
						$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
						$this->upload->initialize($config);
						$this->upload->do_upload('gambar');
						$hasil22=$this->upload->data();
						$config['image_library']='gd2';
						$config['source_image'] = './assets/frontend/klien/'.$hasil22['file_name'];
						$config['create_thumb']= FALSE;
						$config['maintain_ratio']= FALSE;
						$config['quality']= '95%';
						$config['new_image']= './assets/frontend/klien/'.$hasil22['file_name'];
						$this->load->library('image_lib', $config);
						$this->image_lib->resize();

						if ($hasil22['file_name']==''){
										$data = array(
														'klien_post_oleh'=>$this->session->username,
														'klien_nama_pemesan'=>$this->input->post('klien_nama_pemesan'),
														'klien_nama_pasangan'=>$this->input->post('klien_nama_pasangan'),
														'klien_whatsapp'=>$this->input->post('klien_whatsapp'),
														'klien_instagram'=>$this->input->post('klien_instagram'),
														'klien_alamat'=>$this->input->post('klien_alamat'),
														'klien_produk'=>$this->input->post('klien_produk'),
														'klien_post_hari'=>hari_ini(date('w')),
														'klien_post_tanggal'=>date('Y-m-d'),
														'klien_post_jam'=>date('H:i:s'),
														'klien_dibaca'=>'0',
														'klien_status'=>'publish',
														'klien_meta_desk'=>$this->input->post('klien_meta_desk'),
														'klien_keyword'=>$tag);
												}else{
													$data = array(
														'klien_post_oleh'=>$this->session->username,
														'klien_judul'=>$this->db->escape_str($this->input->post('klien_judul')),
														'klien_judul_seo'=>$this->mylibrary->seo_title($this->input->post('klien_judul')),
														'klien_desk'=>$this->input->post('klien_desk'),
														'klien_post_hari'=>hari_ini(date('w')),
														'klien_post_tanggal'=>date('Y-m-d'),
														'klien_post_jam'=>date('H:i:s'),
														'klien_dibaca'=>'0',
														'klien_status'=>'publish',
														'klien_gambar'=>$hasil22['file_name'],
														'klien_meta_desk'=>$this->input->post('klien_meta_desk'),
														'klien_keyword'=>$tag);
													}
									$this->As_m->insert('klien',$data);
									redirect('aspanel/klien');
					}else{
						if ($this->session->level=='1'){
								cek_session_akses('klien',$this->session->id_session);
								$data['home_stat']   = '';
								$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
							}elseif ($this->session->level=='2'){
								cek_session_akses_admin('klien',$this->session->id_session);
								$data['home_stat']   = '';
								$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
							}else{
								cek_session_akses_level_3('klien',$this->session->id_session);
								$data['home_stat']   = '';
								$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
							}
						$this->load->view('backend/klien/v_tambahkan', $data);
					}
		}
		public function klien_update()
		{

			$id = $this->uri->segment(3);
			if (isset($_POST['submit'])){

				$config['upload_path'] = 'assets/frontend/liniklien/';
				$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
				$this->upload->initialize($config);
				$this->upload->do_upload('gambar');
				$hasil22=$this->upload->data();
				$config['image_library']='gd2';
				$config['source_image'] = './assets/frontend/liniklien/'.$hasil22['file_name'];
				$config['create_thumb']= FALSE;
				$config['maintain_ratio']= FALSE;
				$config['quality']= '80%';
				$config['new_image']= './assets/frontend/liniklien/'.$hasil22['file_name'];
				$this->load->library('image_lib', $config);
				$this->image_lib->resize();

				if ($this->input->post('klien_keyword')!=''){
							$tag_seo = $this->input->post('klien_keyword');
							$tag=implode(',',$tag_seo);
					}else{
							$tag = '';
					}
				$tag = $this->input->post('klien_keyword');
				$tags = explode(",", $tag);
				$tags2 = array();
				foreach($tags as $t)
				{
					$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
					$a = $this->db->query($sql)->result_array();
					if(count($a) == 0){
						$data = array('keyword_nama'=>$this->db->escape_str($t),
								'keyword_username'=>$this->session->username,
								'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
								'count'=>'0');
						$this->As_m->insert('keyword',$data);
					}
					$tags2[] = $this->mylibrary->seo_title($t);
				}
				$tags = implode(",", $tags2);
							if ($hasil22['file_name']==''){
											$data = array(
												'klien_update_oleh'=>$this->session->username,
												'klien_judul'=>$this->db->escape_str($this->input->post('klien_judul')),
												'klien_judul_seo'=>$this->mylibrary->seo_title($this->input->post('klien_judul')),
												'klien_desk'=>$this->input->post('klien_desk'),
												'klien_update_hari'=>hari_ini(date('w')),
												'klien_update_tanggal'=>date('Y-m-d'),
												'klien_update_jam'=>date('H:i:s'),
												'klien_meta_desk'=>$this->input->post('klien_meta_desk'),
												'klien_keyword'=>$tag);
												$where = array('klien_id' => $this->input->post('klien_id'));
												$this->db->update('klien', $data, $where);
							}else{
											$data = array(
												'klien_update_oleh'=>$this->session->username,
												'klien_judul'=>$this->db->escape_str($this->input->post('klien_judul')),
												'klien_judul_seo'=>$this->mylibrary->seo_title($this->input->post('klien_judul')),
												'klien_desk'=>$this->input->post('klien_desk'),
												'klien_update_hari'=>hari_ini(date('w')),
												'klien_update_tanggal'=>date('Y-m-d'),
												'klien_update_jam'=>date('H:i:s'),
												'klien_gambar'=>$hasil22['file_name'],
												'klien_meta_desk'=>$this->input->post('klien_meta_desk'),
												'klien_keyword'=>$tag);
												$where = array('klien_id' => $this->input->post('klien_id'));
												$_image = $this->db->get_where('klien',$where)->row();
												$query = $this->db->update('klien',$data,$where);
												if($query){
													unlink("assets/frontend/liniklien/".$_image->klien_gambar);
												}

							}
							redirect('aspanel/klien');
			}else{
				if ($this->session->level=='1'){
						 $proses = $this->As_m->edit('klien', array('klien_id' => $id))->row_array();
				}else{
						$proses = $this->As_m->edit('klien', array('klien_id' => $id, 'klien_post_oleh' => $this->session->username))->row_array();
				}

				if ($this->session->level=='1'){
						cek_session_akses('klien',$this->session->id_session);
						$data['home_stat']   = '';
						$data = array('rows' => $proses);
						$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					}elseif ($this->session->level=='2'){
						cek_session_akses_admin('klien',$this->session->id_session);
						$data['home_stat']   = '';
						$data = array('rows' => $proses);
						$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					}else{
						cek_session_akses_level_3('klien',$this->session->id_session);
						$data['home_stat']   = '';
						$data = array('rows' => $proses);
						$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					}
				$this->load->view('backend/klien/v_update', $data);
			}
		}
		function klien_delete_temp()
		{
			if ($this->session->level=='1'){
					cek_session_akses('klien',$this->session->id_session);
					$data = array('klien_status'=>'delete');
		      $where = array('klien_id' => $this->uri->segment(3));
					$this->db->update('klien', $data, $where);
				}elseif ($this->session->level=='2'){
					cek_session_akses_admin('klien',$this->session->id_session);
					$data = array('klien_status'=>'delete');
		      $where = array('klien_id' => $this->uri->segment(3));
					$this->db->update('klien', $data, $where);
				}else{
					cek_session_akses_level_3('klien',$this->session->id_session);
					$data = array('klien_status'=>'delete');
		      $where = array('klien_id' => $this->uri->segment(3));
					$this->db->update('klien', $data, $where);
				}
			redirect('aspanel/klien');
		}
		function klien_restore()
		{
			if ($this->session->level=='1'){
					cek_session_akses('klien',$this->session->id_session);
					$data = array('klien_status'=>'publish');
					$where = array('klien_id' => $this->uri->segment(3));
					$this->db->update('klien', $data, $where);
				}elseif ($this->session->level=='2'){
					cek_session_akses_admin('klien',$this->session->id_session);
					$data = array('klien_status'=>'publish');
					$where = array('klien_id' => $this->uri->segment(3));
					$this->db->update('klien', $data, $where);
				}else{
					cek_session_akses_level_3('klien',$this->session->id_session);
					$data = array('klien_status'=>'publish');
					$where = array('klien_id' => $this->uri->segment(3));
					$this->db->update('klien', $data, $where);
				}
				redirect('aspanel/klien_storage_bin');
		}
		public function klien_delete()
		{
			 if ($this->session->level=='1'){
 				 cek_session_akses('klien',$this->session->id_session);
 				 $id = $this->uri->segment(3);
 				 $_id = $this->db->get_where('klien',['klien_id' => $id])->row();
 					$query = $this->db->delete('klien',['klien_id'=>$id]);
 				 if($query){
 									unlink("./assets/frontend/liniklien/".$_id->klien_gambar);
 							}
 			 }elseif ($this->session->level=='2'){
 				 cek_session_akses_admin('klien',$this->session->id_session);
 				 $id = $this->uri->segment(3);
 				 $_id = $this->db->get_where('klien',['klien_id' => $id])->row();
 					$query = $this->db->delete('klien',['klien_id'=>$id]);
 				 if($query){
 									unlink("./assets/frontend/liniklien/".$_id->klien_gambar);
 							}
 			 }else{
 				 cek_session_akses_level_3('klien',$this->session->id_session);
 			 }
			redirect('aspanel/klien_storage_bin');
		}
		/*	Bagian untuk klien - Penutup	*/

	/*	Bagian untuk Dat Karyawan - Pembuka	*/
	public function data_karyawan()
	{
		$data['home_stat']   = '';
		if ($this->session->level=='1'){
				cek_session_akses('data_karyawan',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				$data['record'] = $this->Crud_m->view_join_where3_ordering('user','user_level','user_detail','level','user_level_id','id_user',array('user_stat'=>'publish'));
			}elseif ($this->session->level=='2'){
				cek_session_akses_admin('data_karyawan',$this->session->id_session);
				$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
				$data['record'] = $this->Crud_m->view_join_where3_ordering('user','user_level','user_detail','level','user_level_id','id_user',array('user_stat'=>'publish','level' =>'3'));
			}else{
				redirect('aspanel/home');
			}
			$this->load->view('backend/data_karyawan/v_daftar', $data);
	}
	public function data_karyawan_storage_bin()
	{
		$data['home_stat']   = '';

			if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
				}elseif($this->session->level=='2'){
					$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
				}else{
					redirect('aspanel/home');
				}
			cek_session_akses('data_karyawan',$this->session->id_session);
			$this->load->view('backend/data_karyawan/v_daftar_hapus', $data);
	}
	public function data_karyawan_tambahkan()
	{

		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_karyawan/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['width']= 800;
					$config['height']= 800;
					$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$usernames = $this->input->post('username');


												if ($hasil22['file_name']==''){

												$data = array(
													'username' => $usernames,
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}else {
												$data = array(
													'username' => $usernames,
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'user_gambar'=>$hasil22['file_name'],
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}
											$id_pelanggan = $this->Crud_m->tambah_user($data);

											$data_user_detail = array(
													'id_user' => $id_pelanggan,
													'user_detail_jekel' => $this->input->post('user_detail_jekel'),
													'user_detail_agama' => $this->input->post('user_detail_agama'),
													'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
													'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
													'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
													'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
													'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
													'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
													'user_detail_divisi' => $this->input->post('user_detail_divisi'),
													'user_detail_company' => $this->input->post('user_detail_company'),
													'user_detail_ktp' => $this->input->post('user_detail_ktp'));
											$this->Crud_m->tambah_user_detail($data_user_detail);
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


													$user_bisnis = array (
														'username' => $this->input->post('username'),
													);
													$this->db->insert('user_bisnis', $user_bisnis);


									$data_history_karyawan = array (
										'log_activity_user_id'=>$this->session->id_user,
										'log_activity_modul' => 'Tambah User',
										'log_activity_status' => 'Tambah '.$this->input->post('username'),
										'log_activity_platform'=> $agent,
										'log_activity_ip'=> $this->input->ip_address()
									);
									$this->db->insert('log_activity', $data_history_karyawan);

											redirect('aspanel/data_karyawan');
				}else{
					$data['karyawan_menu_open']   = 'menu-open';

					if ($this->session->level=='1'){
						cek_session_akses('data_karyawan',$this->session->id_session);
						$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
						$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
						$data['records_company'] = $this->Crud_m->view_ordering('user_company','user_company_id','asc');
						$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
						$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
						$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');

						$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
						}elseif($this->session->level=='2'){
							$data['records'] = $this->Crud_m->view_limit_ordering('user_level','user_level_id','ASC','5','2');
							$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
							$data['records_company'] = $this->Crud_m->view_ordering('user_company','user_company_id','asc');
							$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
							$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
							$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
							$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
						}else{
							redirect('aspanel/home');
						}

					$this->load->view('backend/data_karyawan/v_tambahkan', $data);
				}
	}
	public function data_karyawan_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_karyawan/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$pass = sha1($this->input->post('password'));


						if ($hasil22['file_name']=='' AND $this->input->post('password')==''){
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));


							$data2 = array(
							'id_user' => $this->input->post('id_user'),
							'user_detail_jekel' => $this->input->post('user_detail_jekel'),
							'user_detail_agama' => $this->input->post('user_detail_agama'),
							'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
							'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
							'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
							'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
							'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
							'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
							'user_detail_divisi' => $this->input->post('user_detail_divisi'),
							'user_detail_company' => $this->input->post('user_detail_company'),
							'user_detail_ktp' => $this->input->post('user_detail_ktp'));

							$where = array('id_user' => $this->input->post('id_user'));
							$id = $this->db->update('user',$data,$where);
							$id2 = $this->db->update('user_detail',$data2,$where);


						}else if($this->input->post('password')==''){
								$data = array(
									'username' => $this->input->post('username'),
									'email' => $this->input->post('email'),
									'level' => $this->input->post('user_status'),
									'user_update_hari'=>hari_ini(date('w')),
									'user_update_tanggal'=>date('Y-m-d'),
									'user_update_jam'=>date('H:i:s'),
									'user_gambar'=>$hasil22['file_name'],
									'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
									'nama' => $this->input->post('nama'));


								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();
								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}

							}else if($hasil22['file_name']==''){
									$data = array(
										'username' => $this->input->post('username'),
										'email' => $this->input->post('email'),
										'password' => $pass,
										'level' => $this->input->post('user_status'),
										'user_update_hari'=>hari_ini(date('w')),
										'user_update_tanggal'=>date('Y-m-d'),
										'user_update_jam'=>date('H:i:s'),
										'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
										'nama' => $this->input->post('nama'));


									$data2 = array(
									'id_user' => $this->input->post('id_user'),
									'user_detail_jekel' => $this->input->post('user_detail_jekel'),
									'user_detail_agama' => $this->input->post('user_detail_agama'),
									'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
									'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
									'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
									'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
									'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
									'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
									'user_detail_divisi' => $this->input->post('user_detail_divisi'),
									'user_detail_ktp' => $this->input->post('user_detail_ktp'));

									$where = array('id_user' => $this->input->post('id_user'));
									$id = $this->db->update('user',$data,$where);
									$id2 = $this->db->update('user_detail',$data2,$where);


								}else{
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'password' => sha1($this->input->post('password')),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'user_gambar'=>$hasil22['file_name'],
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));

								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();

								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}
							}
						redirect('aspanel/data_karyawan');
		}else{
			if ($this->session->level=='1'){
						 $proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}else{
						$proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}
			if ($this->session->level=='1'){
			cek_session_akses('data_karyawan',$this->session->id_session);
			$data = array('rows' => $proses);
			$data['records_company'] = $this->Crud_m->view_ordering('user_company','user_company_id','asc');
			$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
			$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
			$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
			$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
			$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
		} elseif($this->session->level=='2') {
			$data = array('rows' => $proses);
			$data['records_company'] = $this->Crud_m->view_ordering('user_company','user_company_id','asc');
			$data['records'] = $this->Crud_m->view_limit_ordering('user_level','user_level_id','ASC','5','2');
			$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
			$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
			$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
			$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
		}else{

		}
			$this->load->view('backend/data_karyawan/v_update', $data);
		}
	}
	function data_karyawan_delete_temp()
	{
			cek_session_akses('data_karyawan',$this->session->id_session);
			$data = array('user_stat'=>'delete');
			$where = array('username' => $this->uri->segment(3));
			$this->db->update('user', $data, $where);
			redirect('aspanel/data_karyawan');
	}
	function data_karyawan_restore()
	{
			cek_session_akses('data_karyawan',$this->session->id_session);
			$data = array('user_stat'=>'Publish');
			$where = array('id_user' => $this->uri->segment(3));
			$this->db->update('user', $data, $where);
			redirect('aspanel/data_karyawan_storage_bin');
	}
	public function data_karyawan_delete()
	{
			cek_session_akses('data_karyawan',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('user',['username' => $id])->row();
			$query = $this->db->delete('user',['username'=> $id]);
			$_id2 = $this->db->get_where('user_detail',['user_detail_username' => $id])->row();
			$query2 = $this->db->delete('user_detail',['user_detail_username'=> $id]);
			$_id3 = $this->db->get_where('harga',['username' => $id])->row();
			$query3 = $this->db->delete('harga',['username'=> $id]);
			$_id4 = $this->db->get_where('projek',['username' => $id])->row();
			$query4 = $this->db->delete('projek',['username'=> $id]);
			$_id5 = $this->db->get_where('user_bisnis',['username' => $id])->row();
			$query5 = $this->db->delete('user_bisnis',['username'=> $id]);
			if($query){
						unlink("assets/frontend/gambar_bisnis/".$_id->user_gambar);
		 			 	}
		 	if($query3){
						unlink("assets/frontend/harga/".$_id3->foto_h);
						}
			if($query4){
						unlink("assets/frontend/projek/".$_id4->foto1);
						unlink("assets/frontend/projek/".$_id4->foto2);
						unlink("assets/frontend/projek/".$_id4->foto3);
						unlink("assets/frontend/projek/".$_id4->foto4);
						unlink("assets/frontend/projek/".$_id4->foto5);
	 			 		}
	 		if($query5){
						unlink("assets/frontend/gambar_bisnis/".$_id5->gambar);
						}
		redirect('aspanel/data_karyawan_storage_bin');
	}
	/*	Bagian untuk Data Karyawan - Penutup	*/

	/*	Bagian untuk Divisi - Pembuka	*/
	public function divisi()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['templates_stat']   = '';
		$data['cat_templates_stat']   = 'active';
		$data['slider_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = 'active';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';

				if ($this->session->level=='1'){
					cek_session_akses('divisi',$this->session->id_session);
					$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_status'=>'publish'),'divisi_id','DESC');
					}else{
					}

				$this->load->view('backend/divisi/v_daftar', $data);
	}
	public function divisi_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['templates_stat']   = '';
		$data['cat_templates_stat']   = 'active';
		$data['slider_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = 'active';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';
		cek_session_akses ('divisi',$this->session->id_session);
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_status'=>'delete'),'divisi_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_post_oleh'=>$this->session->username,'divisi_status'=>'delete'),'divisi_id','DESC');
				}
				$this->load->view('backend/divisi/v_daftar_hapus', $data);
	}
	public function divisi_tambahkan()
	{
		cek_session_akses('divisi',$this->session->id_session);
		if (isset($_POST['submit'])){

									$data = array(
													'divisi_post_oleh'=>$this->session->username,
													'divisi_judul'=>$this->db->escape_str($this->input->post('divisi_judul')),
													'divisi_judul_seo'=>$this->mylibrary->seo_title($this->input->post('divisi_judul')),
													'divisi_desk'=>$this->input->post('divisi_desk'),
													'divisi_post_hari'=>hari_ini(date('w')),
													'divisi_post_tanggal'=>date('Y-m-d'),
													'divisi_post_jam'=>date('H:i:s'),
													'divisi_dibaca'=>'0',
													'divisi_status'=>'publish',
													'divisi_meta_desk'=>$this->input->post('divisi_meta_desk'));

								$this->As_m->insert('divisi',$data);
								redirect('aspanel/divisi');
				}else{
					cek_session_akses ('divisi',$this->session->id_session);
					$this->load->view('backend/divisi/v_tambahkan');
				}
	}
	public function divisi_update()
	{
		cek_session_akses('divisi',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
										$data = array(
											'divisi_update_oleh'=>$this->session->username,
											'divisi_judul'=>$this->db->escape_str($this->input->post('divisi_judul')),
											'divisi_judul_seo'=>$this->mylibrary->seo_title($this->input->post('divisi_judul')),
											'divisi_desk'=>$this->input->post('divisi_desk'),
											'divisi_update_hari'=>hari_ini(date('w')),
											'divisi_update_tanggal'=>date('Y-m-d'),
											'divisi_update_jam'=>date('H:i:s'),
											'divisi_meta_desk'=>$this->input->post('divisi_meta_desk'));
											$where = array('divisi_id' => $this->input->post('divisi_id'));
							 				$this->db->update('divisi', $data, $where);

						redirect('aspanel/divisi');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->As_m->edit('divisi', array('divisi_id' => $id))->row_array();
			}else{
					$proses = $this->As_m->edit('divisi', array('divisi_id' => $id, 'divisi_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			cek_session_akses ('divisi',$this->session->id_session);
			$this->load->view('backend/divisi/v_update', $data);
		}
	}
	function divisi_delete_temp()
	{
      cek_session_akses ('divisi',$this->session->id_session);
			$data = array('divisi_status'=>'delete');
      $where = array('divisi_id' => $this->uri->segment(3));
			$this->db->update('divisi', $data, $where);
			redirect('aspanel/divisi');
	}
	function divisi_restore()
	{
      cek_session_akses ('divisi',$this->session->id_session);
			$data = array('divisi_status'=>'Publish');
      $where = array('divisi_id' => $this->uri->segment(3));
			$this->db->update('divisi', $data, $where);
			redirect('aspanel/divisi_storage_bin');
	}
	public function divisi_delete()
	{
			cek_session_akses ('divisi',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('divisi',['divisi_id' => $id])->row();
			 $query = $this->db->delete('divisi',['divisi_id'=>$id]);
		 	if($query){
							 unlink("./bahan/foto_templates/".$_id->divisi_gambar);
		 }
		redirect('aspanel/divisi_storage_bin');
	}
	/*	Bagian untuk Divisi - Penutup	*/

	/*	Bagian untuk Divisi - Pembuka	*/
	public function company()
	{
					if ($this->session->level=='1'){
						cek_session_akses('company',$this->session->id_session);
						$data['record'] = $this->Crud_m->view_join_where_ordering_field2('user_company','user_company_level','user_company_kategori','user_company_level_id',array('user_company_status'=>'1'),'user_company_id','ASC');

						$this->load->view('backend/company/v_daftar', $data);
					}elseif ($this->session->level=='2'){
						cek_session_akses_admin('company',$this->session->id_session);
						$data['record'] = $this->Crud_m->view_join_where_ordering_field2('user_company','user_company_level','user_company_kategori','user_company_level_id',array('user_company_status'=>'1'),'user_company_id','ASC');

						$this->load->view('backend/company/v_daftar', $data);
					}elseif ($this->session->level=='3') {
						cek_session_akses_level_3('company',$this->session->id_session);
						$data['record'] = $this->Crud_m->view_join_where_ordering_field2('user_company','user_company_level','user_company_kategori','user_company_level_id',array('user_company_status'=>'1'),'user_company_id','ASC');

						$this->load->view('backend/company/v_daftar', $data);
					}elseif ($this->session->level=='4') {
						cek_session_akses_level_4('company',$this->session->id_session);
						$data['record'] = $this->Crud_m->view_join_where_ordering_field2('user_company','user_company_level','user_company_kategori','user_company_level_id',array('user_company_status'=>'1'),'user_company_id','ASC');

						$this->load->view('backend/company/v_daftar', $data);
					}elseif ($this->session->level=='5') {
						cek_session_akses_level_5('company',$this->session->id_session);
						$data['record'] = $this->Crud_m->view_join_where_ordering_field2('user_company','user_company_level','user_company_kategori','user_company_level_id',array('user_company_status'=>'1'),'user_company_id','ASC');

						$this->load->view('backend/company/v_daftar', $data);
					}else{
						redirect(base_url());
					}
	}
	public function company_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		if ($this->session->level=='1'){
			cek_session_akses('company',$this->session->id_session);
			$data['record'] = $this->Crud_m->view_join_where_ordering_field2('user_company','user_company_level','user_company_kategori','user_company_level_id',array('user_company_status'=>'0'),'user_company_id','ASC');
			}else if ($this->session->level=='2'){
				$data['record'] = $this->Crud_m->view_join_where_ordering_field2('user_company','user_company_level','user_company_kategori','user_company_level_id',array('user_company_status'=>'0'),'user_company_id','ASC');
			} else{

			}
				$this->load->view('backend/company/v_daftar_hapus', $data);
	}
	public function company_tambahkan()
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

		if (isset($_POST['submit'])){
			$config['upload_path'] = 'assets/frontend/company/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('user_company_logo');
			$hasillogo=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './assets/frontend/company/'.$hasillogo['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['new_image']= './assets/frontend/company/'.$hasillogo['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			if ($hasillogo['file_name']==''){
									$data = array(
													'user_company_post_oleh'=>$this->session->id_user,
													'user_company_account'=>$this->input->post('user_company_account'),
													'user_company_kategori'=>$this->input->post('user_company_kategori'),
													'user_company_judul'=>$this->db->escape_str($this->input->post('user_company_judul')),
													'user_company_judul_seo'=>$this->mylibrary->seo_title($this->input->post('user_company_judul')),
													'user_company_nama'=>$this->input->post('user_company_nama'),
													'user_company_warna'=>$this->input->post('user_company_warna'),
													'user_company_post_hari'=>hari_ini(date('w')),
													'user_company_post_tanggal'=>date('Y-m-d'),
													'user_company_post_jam'=>date('H:i:s'),
													'user_company_status'=>'1');

													$where = array('user_company_id' => $this->input->post('user_company_id'));
													$id = $this->db->insert('user_company',$data,$where);

									}else {
										$data = array(
														'user_company_post_oleh'=>$this->session->id_user,
														'user_company_account'=>$this->input->post('user_company_account'),
														'user_company_kategori'=>$this->input->post('user_company_kategori'),
														'user_company_judul'=>$this->db->escape_str($this->input->post('user_company_judul')),
														'user_company_judul_seo'=>$this->mylibrary->seo_title($this->input->post('user_company_judul')),
														'user_company_nama'=>$this->input->post('user_company_nama'),
														'user_company_warna'=>$this->input->post('user_company_warna'),
														'user_company_post_hari'=>hari_ini(date('w')),
														'user_company_post_tanggal'=>date('Y-m-d'),
														'user_company_post_jam'=>date('H:i:s'),
														'user_company_logo'=>$hasillogo['file_name'],
														'user_company_status'=>'1');

														$where = array('user_company_id' => $this->input->post('user_company_id'));
														$_image = $this->db->get_where('user_company',$where)->row();
														$query = $this->db->insert('user_company',$data,$where);
														if($query){
															unlink("assets/frontend/company/".$_image->user_company_logo);
														}
													}

								$data_history_addcompany = array (
									'log_activity_user_id'=>$this->session->id_user,
									'log_activity_modul' => 'Tambah Perusahaan',
									'log_activity_status' => 'Tambah '.$this->input->post('user_company_account'),
									'log_activity_platform'=> $agent,
									'log_activity_ip'=> $this->input->ip_address()
								);
								$this->db->insert('log_activity', $data_history_addcompany);
								redirect('aspanel/company');
				}else{

						if ($this->session->level=='1'){
							cek_session_akses('company',$this->session->id_session);
							$data['category_company'] = $this->Crud_m->view_ordering('user_company_level','user_company_level_id','asc');
							$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
							$this->load->view('backend/company/v_tambahkan', $data);
						}elseif ($this->session->level=='2'){
							cek_session_akses_admin('company',$this->session->id_session);
							$data['category_company'] = $this->Crud_m->view_ordering('user_company_level','user_company_level_id','asc');
							$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
							$this->load->view('backend/company/v_tambahkan', $data);
						}elseif ($this->session->level=='3') {
							cek_session_akses_level_3('company',$this->session->id_session);
							$data['category_company'] = $this->Crud_m->view_ordering('user_company_level','user_company_level_id','asc');
							$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
							$this->load->view('backend/company/v_tambahkan', $data);
						}elseif ($this->session->level=='4') {
							cek_session_akses_level_4('company',$this->session->id_session);
							$data['category_company'] = $this->Crud_m->view_ordering('user_company_level','user_company_level_id','asc');
							$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
							$this->load->view('backend/company/v_tambahkan', $data);
						}elseif ($this->session->level=='5') {
							cek_session_akses_level_5('company',$this->session->id_session);
							$data['category_company'] = $this->Crud_m->view_ordering('user_company_level','user_company_level_id','asc');
							$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
							$this->load->view('backend/company/v_tambahkan', $data);
						}else{
							redirect(base_url());
						}
				}
	}
	public function company_update()
	{
		$id = $this->uri->segment(3);

		if (isset($_POST['submit'])){
			$config['upload_path'] = 'assets/frontend/company/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('user_company_logo');
			$hasillogo=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './assets/frontend/company/'.$hasillogo['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['new_image']= './assets/frontend/company/'.$hasillogo['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			if ($hasillogo['file_name']==''){
									$data = array(
													'user_company_account'=>$this->input->post('user_company_account'),
													'user_company_kategori'=>$this->input->post('user_company_kategori'),
													'user_company_judul'=>$this->db->escape_str($this->input->post('user_company_judul')),
													'user_company_judul_seo'=>$this->mylibrary->seo_title($this->input->post('user_company_judul')),
													'user_company_nama'=>$this->input->post('user_company_nama'),
													'user_company_warna'=>$this->input->post('user_company_warna'),
													'user_company_post_hari'=>hari_ini(date('w')),
													'user_company_post_tanggal'=>date('Y-m-d'),
													'user_company_post_jam'=>date('H:i:s'),
													'user_company_status'=>'1');
													$where = array('user_company_id' => $this->input->post('user_company_id'));
									 				$this->db->update('user_company', $data, $where);
									}else {
										$data = array(
														'user_company_account'=>$this->input->post('user_company_account'),
														'user_company_kategori'=>$this->input->post('user_company_kategori'),
														'user_company_judul'=>$this->db->escape_str($this->input->post('user_company_judul')),
														'user_company_judul_seo'=>$this->mylibrary->seo_title($this->input->post('user_company_judul')),
														'user_company_nama'=>$this->input->post('user_company_nama'),
														'user_company_warna'=>$this->input->post('user_company_warna'),
														'user_company_post_hari'=>hari_ini(date('w')),
														'user_company_post_tanggal'=>date('Y-m-d'),
														'user_company_post_jam'=>date('H:i:s'),
														'user_company_logo'=>$hasillogo['file_name'],
														'user_company_status'=>'1');
														$where = array('user_company_id' => $this->input->post('user_company_id'));
														$_image = $this->db->get_where('user_company',$where)->row();
														$query = $this->db->update('user_company',$data,$where);
														if($query){
															unlink("assets/frontend/company/".$_image->user_company_logo);
														}
													}

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

											$data_history_addcompany = array (
												'log_activity_user_id'=>$this->session->id_user,
												'log_activity_modul' => 'Update Perusahaan',
												'log_activity_status' => 'Update '.$this->input->post('user_company_account'),
												'log_activity_platform'=> $agent,
												'log_activity_ip'=> $this->input->ip_address()
											);
											$this->db->insert('log_activity', $data_history_addcompany);

						redirect('aspanel/company');
		}else{


			if ($this->session->level=='1'){
				cek_session_akses('company',$this->session->id_session);
				$proses = $this->As_m->edit('user_company', array('user_company_account' => $id))->row_array();
			}elseif ($this->session->level=='2'){
				cek_session_akses_admin('company',$this->session->id_session);
				$proses = $this->As_m->edit('user_company', array('user_company_account' => $id))->row_array();
			}elseif ($this->session->level=='3') {
				cek_session_akses_level_3('company',$this->session->id_session);
				$proses = $this->As_m->edit('user_company', array('user_company_account' => $id))->row_array();
			}elseif ($this->session->level=='4') {
				cek_session_akses_level_4('company',$this->session->id_session);
				$proses = $this->As_m->edit('user_company', array('user_company_account' => $id))->row_array();
			}elseif ($this->session->level=='5') {
				cek_session_akses_level_5('company',$this->session->id_session);
				$proses = $this->As_m->edit('user_company', array('user_company_account' => $id))->row_array();
			}else{
				redirect(base_url());
			}
			$data = array('rows' => $proses);
			$data['record_company_sub'] = $this->Crud_m->view_where_ordering('user_company',array('user_company_kategori'=>'2'),'user_company_id','ASC');
			$data['category_company'] = $this->Crud_m->view_ordering('user_company_level','user_company_level_id','ASC');
			$this->load->view('backend/company/v_update', $data);
		}
	}
	function company_delete_temp()
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
			cek_session_akses('company',$this->session->id_session);

			$data = array('user_company_status'=>'0');
      $where = array('user_company_account' => $this->uri->segment(3));
			$this->db->update('user_company', $data, $where);
			$data_history_addcompany = array (
				'log_activity_user_id'=>$this->session->id_user,
				'log_activity_modul' => 'Blok Perusahaan',
				'log_activity_status' => 'Blok '.$this->uri->segment(3),
				'log_activity_platform'=> $agent,
				'log_activity_ip'=> $this->input->ip_address()
			);
			$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='2'){

							$data = array('user_company_status'=>'0');
				      $where = array('user_company_account' => $this->uri->segment(3));
							$this->db->update('user_company', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Blok Perusahaan',
								'log_activity_status' => 'Blok '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			} else{

			}

			redirect('aspanel/company');
	}
	function company_restore()
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
						cek_session_akses('company',$this->session->id_session);

						$data = array('user_company_status'=>'1');
			      $where = array('user_company_account' => $this->uri->segment(3));
						$this->db->update('user_company', $data, $where);
						$data_history_addcompany = array (
							'log_activity_user_id'=>$this->session->id_user,
							'log_activity_modul' => 'Kembalikan Perusahaan',
							'log_activity_status' => 'Kembalikan '.$this->uri->segment(3),
							'log_activity_platform'=> $agent,
							'log_activity_ip'=> $this->input->ip_address()
						);
						$this->db->insert('log_activity', $data_history_addcompany);
						}else if ($this->session->level=='2'){

										$data = array('user_company_status'=>'1');
							      $where = array('user_company_account' => $this->uri->segment(3));
										$this->db->update('user_company', $data, $where);
										$data_history_addcompany = array (
											'log_activity_user_id'=>$this->session->id_user,
											'log_activity_modul' => 'Kembalikan Perusahaan',
											'log_activity_status' => 'Kembalikan '.$this->uri->segment(3),
											'log_activity_platform'=> $agent,
											'log_activity_ip'=> $this->input->ip_address()
										);
										$this->db->insert('log_activity', $data_history_addcompany);
						} else{

						}

			redirect('aspanel/company_storage_bin');
	}
	public function company_delete()
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

			$id = $this->uri->segment(3);
			if ($this->session->level=='1'){
				cek_session_akses('company',$this->session->id_session);
			$_id = $this->db->get_where('user_company',['user_company_account' => $id])->row();
			 $query = $this->db->delete('user_company',['user_company_account'=>$id]);
		 	if($query){
							 unlink("./assets/backend/images/".$_id->user_company_logo);
		 }
		 $data_history_addcompany = array (
			 'log_activity_user_id'=>$this->session->id_user,
			 'log_activity_modul' => 'Hapus Perusahaan',
			 'log_activity_status' => 'Hapus '.$this->uri->segment(3),
			 'log_activity_platform'=> $agent,
			 'log_activity_ip'=> $this->input->ip_address()
		 );
		 $this->db->insert('log_activity', $data_history_addcompany);
		 	}else if ($this->session->level=='2'){
				$_id = $this->db->get_where('user_company',['user_company_account' => $id])->row();
				 $query = $this->db->delete('user_company',['user_company_account'=>$id]);
			 	if($query){
								 unlink("./assets/backend/images/".$_id->user_company_logo);
			 }
			 $data_history_addcompany = array (
				 'log_activity_user_id'=>$this->session->id_user,
				 'log_activity_modul' => 'Hapus Perusahaan',
				 'log_activity_status' => 'Hapus '.$this->uri->segment(3),
				 'log_activity_platform'=> $agent,
				 'log_activity_ip'=> $this->input->ip_address()
			 );
			 $this->db->insert('log_activity', $data_history_addcompany);
			}else{

			}
		redirect('aspanel/company_storage_bin');
	}
	/*	Bagian untuk Company - Penutup	*/


}
