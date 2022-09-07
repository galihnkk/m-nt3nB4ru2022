<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Harga extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  public function index()
  {
    redirect(base_url('harga/informasi'));
  }
  public function informasi()
  {
    	    if ($this->session->level=='1')
        {
          cek_session_akses('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }
  public function sampah()
  {
    	    if ($this->session->level=='1')
        {
          cek_session_akses('harga',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('harga',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('harga',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='4')
        {
          cek_session_akses_level_4('harga',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'0'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('harga',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'0'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/harga/v_daftar_sampah',$data);
        }
        else {
          redirect('aspanel/logout');
        }
  }
  public function tambah()
  {
						if (isset($_POST['submit']))
						{
							$config['upload_path'] = 'assets/frontend/harga/';
							$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

							$this->upload->initialize($config);
							$this->upload->do_upload('foto_h');
							$hasil=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/harga/'.$hasil['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/harga/'.$hasil['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							if ($hasil['file_name']=='' )
              {
								$data = array(
									'username'=>$this->input->post('id'),
                  'harga_id_bisnis'=>$this->input->post('harga_id_bisnis'),
									'judul'=>$this->input->post('judul'),
									'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                  'harga'=>$this->input->post('harga'),
                  'harga_diskon'=>$this->input->post('harga_diskon'),
                  'harga_modal'=>$this->input->post('harga_modal'),
                  'harga_status'=>'1',
									'deskripsi'=>$this->input->post('deskripsi'),
									'hari'=>hari_ini(date('w')),
                  'tanggal'=>date('Y-m-d'),
                  'jam'=>date('H:i:s'),
									'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
									'keyword'=>$this->input->post('keyword'));
								}  else
                       {
        									$data = array(
                            'username'=>$this->input->post('id'),
                            'harga_id_bisnis'=>$this->input->post('harga_id_bisnis'),
          									'judul'=>$this->input->post('judul'),
          									'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                            'harga'=>$this->input->post('harga'),
                            'harga_diskon'=>$this->input->post('harga_diskon'),
                            'harga_modal'=>$this->input->post('harga_modal'),
                            'harga_status'=>'1',
          									'deskripsi'=>$this->input->post('deskripsi'),
          									'hari'=>hari_ini(date('w')),
                            'tanggal'=>date('Y-m-d'),
                            'jam'=>date('H:i:s'),
          									'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
                            'foto_h'=>$hasil['file_name'],
          									'keyword'=>$this->input->post('keyword'));
									     }
                       $this->Crud_m->insert('harga',$data);
                       redirect('harga');
						}
            else{
              if ($this->session->level=='1')
                {
                  cek_session_akses('informasi',$this->session->id_session);
                  $this->load->view('backend/harga/v_tambah');
                }
            elseif($this->session->level=='2')
                {
                  cek_session_akses_admin('informasi',$this->session->id_session);

                  $this->load->view('backend/harga/v_tambah');
                }
            elseif($this->session->level=='3')
                {
                  cek_session_akses_level_3('informasi',$this->session->id_session);

                  $this->load->view('backend/harga/v_tambah');
                }
            elseif($this->session->level=='4')
                {
                  cek_session_akses_level_4('informasi',$this->session->id_session);

                  $this->load->view('backend/harga/v_tambah');
                }
            elseif($this->session->level=='5')
                {
                  cek_session_akses_level_5('informasi',$this->session->id_session);

                  $this->load->view('backend/harga/v_tambah');
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
							$config['upload_path'] = 'assets/frontend/harga/';
							$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
							$this->upload->initialize($config);
							$this->upload->do_upload('foto_h');
							$hasil=$this->upload->data();
							$config['image_library']='gd2';
							$config['source_image'] = 'assets/frontend/harga/'.$hasil['file_name'];
							$config['create_thumb']= FALSE;
							$config['maintain_ratio']= FALSE;
							$config['quality']= '80%';
							$config['new_image']= 'assets/frontend/harga/'.$hasil['file_name'];
							$this->load->library('image_lib', $config);
							$this->image_lib->resize();

							if ($hasil['file_name']==''){
							$data = array(
                'username'=>$this->input->post('id'),
                'judul'=>$this->input->post('judul'),
                'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                'harga'=>$this->input->post('harga'),
                'harga_spec'=>$this->input->post('harga_spec'),
                'harga_diskon'=>$this->input->post('harga_diskon'),
                'harga_modal'=>$this->input->post('harga_modal'),
                'harga_status'=>'1',
                'deskripsi'=>$this->input->post('deskripsi'),
                'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
                'keyword'=>$this->input->post('keyword'));
								$where = array('id_harga' => $this->input->post('id_harga'));
							  $this->db->update('harga',$data,$where);
							}else{
									$data = array(
                    'username'=>$this->input->post('id'),
                    'judul'=>$this->input->post('judul'),
                    'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                    'harga_spec'=>$this->input->post('harga_spec'),
                    'harga'=>$this->input->post('harga'),
                    'harga_diskon'=>$this->input->post('harga_diskon'),
                    'harga_modal'=>$this->input->post('harga_modal'),
                    'harga_status'=>'1',
                    'deskripsi'=>$this->input->post('deskripsi'),
                    'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
                    'foto_h'=>$hasil['file_name'],
                    'keyword'=>$this->input->post('keyword'));
									$where = array('id_harga' => $this->input->post('id_harga'));
									$_image = $this->db->get_where('harga',$where)->row();
									$query = $this->db->update('harga',$data,$where);
									if($query){
						                unlink("assets/frontend/harga/".$_image->foto_h);
						                }
								}
									redirect('harga/informasi');
						}else{

              if ($this->session->level=='1')
                {
                  cek_session_akses('harga',$this->session->id_session);
                  $proses = $this->Crud_m->edit('harga', array('id_harga' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/harga/v_edit',$data);
                }
            elseif($this->session->level=='2')
                {
                  cek_session_akses_admin('harga',$this->session->id_session);
                  $proses = $this->Crud_m->edit('harga', array('id_harga' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/harga/v_edit',$data);
                }
            elseif($this->session->level=='3')
                {
                  cek_session_akses_level_3('harga',$this->session->id_session);
                  $proses = $this->Crud_m->edit('harga', array('id_harga' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/harga/v_edit',$data);
                }
            elseif($this->session->level=='4')
                {
                  cek_session_akses_level_4('harga',$this->session->id_session);
                  $proses = $this->Crud_m->edit('harga', array('id_harga' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/harga/v_edit',$data);
                }
            elseif($this->session->level=='5')
                {
                  cek_session_akses_level_5('harga',$this->session->id_session);
                  $proses = $this->Crud_m->edit('harga', array('id_harga' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/harga/v_edit',$data);
                }

						}
		}
	public function hapus()
  {

			$id_projek = $this->uri->segment(3);

			$_id = $this->db->get_where('harga',['id_harga' => $id_projek])->row();
			$query = $this->db->delete('harga',['id_harga'=>$id_projek]);
			if($query){
                unlink("assets/frontend/harga/".$_id->foto_h);
      }
			redirect('harga/sampah');
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
			cek_session_akses('harga',$this->session->id_session);
			$data = array('harga_status'=>'0');
      $where = array('id_harga' => $this->uri->segment(3));
			$this->db->update('harga', $data, $where);
			$data_history_addcompany = array (
				'log_activity_user_id'=>$this->session->id_user,
				'log_activity_modul' => 'Hapus Harga',
				'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
				'log_activity_platform'=> $agent,
				'log_activity_ip'=> $this->input->ip_address()
			);
			$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='2'){
        cek_session_akses_admin('harga',$this->session->id_session);
        $data = array('harga_status'=>'0');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='3'){
        cek_session_akses_level_3('harga',$this->session->id_session);
        $data = array('harga_status'=>'0');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='4'){
        cek_session_akses_level_4('harga',$this->session->id_session);
        $data = array('harga_status'=>'0');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='5'){
        cek_session_akses_level_5('harga',$this->session->id_session);
        $data = array('harga_status'=>'0');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			} else{

			}

			redirect('harga');
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
			cek_session_akses('harga',$this->session->id_session);
			$data = array('harga_status'=>'1');
      $where = array('id_harga' => $this->uri->segment(3));
			$this->db->update('harga', $data, $where);
			$data_history_addcompany = array (
				'log_activity_user_id'=>$this->session->id_user,
				'log_activity_modul' => 'Hapus Harga',
				'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
				'log_activity_platform'=> $agent,
				'log_activity_ip'=> $this->input->ip_address()
			);
			$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='2'){
        cek_session_akses_admin('harga',$this->session->id_session);
        $data = array('harga_status'=>'1');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='3'){
        cek_session_akses_level_3('harga',$this->session->id_session);
        $data = array('harga_status'=>'1');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='4'){
        cek_session_akses_level_4('harga',$this->session->id_session);
        $data = array('harga_status'=>'1');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			}else if ($this->session->level=='5'){
        cek_session_akses_level_5('harga',$this->session->id_session);
        $data = array('harga_status'=>'1');
        $where = array('id_harga' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
							$data_history_addcompany = array (
								'log_activity_user_id'=>$this->session->id_user,
								'log_activity_modul' => 'Hapus Harga',
								'log_activity_status' => 'Hapus Harga '.$this->uri->segment(3),
								'log_activity_platform'=> $agent,
								'log_activity_ip'=> $this->input->ip_address()
							);
							$this->db->insert('log_activity', $data_history_addcompany);
			} else{

			}

			redirect('harga');
	}


}
