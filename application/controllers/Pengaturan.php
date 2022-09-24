<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pengaturan extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    date_default_timezone_set('Asia/Jakarta');
  }
  public function index()
  {
    redirect(base_url('pengaturan/informasi'));
  }
  public function Informasi()
  {
    if (isset($_POST['submit'])){
			$config['upload_path'] = 'assets/frontend/gambar_bisnis/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('foto');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './assets/frontend/gambar_bisnis/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
      $config['max_size'] = 5000;
			$config['new_image']= './assets/frontend/gambar_bisnis/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->upload->initialize($config);
			$this->upload->do_upload('logo');
			$logobisnis=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './assets/frontend/gambar_bisnis/'.$logobisnis['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['max_size'] = 5000;
			$config['new_image']= './assets/frontend/gambar_bisnis/'.$logobisnis['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

      if ($logobisnis['file_name']=='' && $hasil22['file_name']=='' && $this->input->post('password')==''){
        $data = array(
            'email'=>$this->db->escape_str($this->input->post('email')),
            'nama'=>$this->input->post('nama'),
            'user_update_hari'=>hari_ini(date('w')),
            'user_update_tanggal'=>date('Y-m-d'),
            'user_update_jam'=>date('H:i:s'));
            $where = array('id_user' => $this->input->post('id_user'));
            $this->db->update('user',$data,$where);
          $data2 = array(
            'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
            'namabisnis'=>$this->input->post('namabisnis'),
            'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
            'tentangbisnis'=>$this->input->post('tentangbisnis'),
            'alamat'=>$this->input->post('alamat'),
            'propinsi'=>$this->input->post('provinsi'),
            'kabupaten'=>$this->input->post('kabupaten'),
            'kecamatan'=>$this->input->post('kecamatan'),
            'kodepos'=>$this->input->post('kodepos'),
            'nomerbisnis'=>$this->input->post('nomerbisnis'),
            'ig'=>$this->input->post('ig'),
            'ytb'=>$this->input->post('ytb'),
            'fb'=>$this->input->post('fb'),
            'tiktok'=>$this->input->post('tiktok'),
            'hari'=>hari_ini(date('w')),
            'tanggal'=>date('Y-m-d'),
            'jam'=>date('H:i:s'));
            $where2 = array('username' => $this->input->post('username'));
            $this->db->update('user_bisnis',$data2,$where2);


          }else if ($logobisnis['file_name']=='' && $this->input->post('password')=='' ){
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
            $data2 = array(
              'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
              'namabisnis'=>$this->input->post('namabisnis'),
              'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
              'tentangbisnis'=>$this->input->post('tentangbisnis'),
              'alamat'=>$this->input->post('alamat'),
              'propinsi'=>$this->input->post('provinsi'),
              'kabupaten'=>$this->input->post('kabupaten'),
              'kecamatan'=>$this->input->post('kecamatan'),
              'kodepos'=>$this->input->post('kodepos'),
              'nomerbisnis'=>$this->input->post('nomerbisnis'),
              'ig'=>$this->input->post('ig'),
              'ytb'=>$this->input->post('ytb'),
              'fb'=>$this->input->post('fb'),
              'tiktok'=>$this->input->post('tiktok'),
              'hari'=>hari_ini(date('w')),
              'tanggal'=>date('Y-m-d'),
              'jam'=>date('H:i:s'));
              $where2 = array('username' => $this->input->post('username'));
              $this->db->update('user_bisnis',$data2,$where2);

          }else if ($hasil22['file_name']=='' && $this->input->post('password')=='' ){
            $data = array(
            'email'=>$this->db->escape_str($this->input->post('email')),
            'nama'=>$this->input->post('nama'),
            'user_update_hari'=>hari_ini(date('w')),
            'user_update_tanggal'=>date('Y-m-d'),
            'user_update_jam'=>date('H:i:s'));
            $where = array('id_user' => $this->input->post('id_user'));
            $this->db->update('user',$data,$where);
            $data2 = array(
              'gambar'=>$logobisnis['file_name'],
              'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
              'namabisnis'=>$this->input->post('namabisnis'),
              'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
              'tentangbisnis'=>$this->input->post('tentangbisnis'),
              'alamat'=>$this->input->post('alamat'),
              'propinsi'=>$this->input->post('provinsi'),
              'kabupaten'=>$this->input->post('kabupaten'),
              'kecamatan'=>$this->input->post('kecamatan'),
              'kodepos'=>$this->input->post('kodepos'),
              'nomerbisnis'=>$this->input->post('nomerbisnis'),
              'ig'=>$this->input->post('ig'),
              'ytb'=>$this->input->post('ytb'),
              'fb'=>$this->input->post('fb'),
              'tiktok'=>$this->input->post('tiktok'),
              'hari'=>hari_ini(date('w')),
              'tanggal'=>date('Y-m-d'),
              'jam'=>date('H:i:s'));
              $where2 = array('username' => $this->input->post('username'));
              $_image = $this->db->get_where('user_bisnis',$where2)->row();
              $query = $this->db->update('user_bisnis',$data2,$where2);
              if($query){
                unlink("assets/frontend/gambar_bisnis/".$_image->gambar);
              }

          }else if ($hasil22['file_name']=='' && $logobisnis['file_name']=='' ){
            $data = array(
            'password'=>sha1($this->input->post('password')),
            'email'=>$this->db->escape_str($this->input->post('email')),
            'nama'=>$this->input->post('nama'),
            'user_update_hari'=>hari_ini(date('w')),
            'user_update_tanggal'=>date('Y-m-d'),
            'user_update_jam'=>date('H:i:s'));
            $where = array('id_user' => $this->input->post('id_user'));
            $this->db->update('user',$data,$where);
            $data2 = array(
              'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
              'namabisnis'=>$this->input->post('namabisnis'),
              'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
              'tentangbisnis'=>$this->input->post('tentangbisnis'),
              'alamat'=>$this->input->post('alamat'),
              'propinsi'=>$this->input->post('provinsi'),
              'kabupaten'=>$this->input->post('kabupaten'),
              'kecamatan'=>$this->input->post('kecamatan'),
              'kodepos'=>$this->input->post('kodepos'),
              'nomerbisnis'=>$this->input->post('nomerbisnis'),
              'ig'=>$this->input->post('ig'),
              'ytb'=>$this->input->post('ytb'),
              'fb'=>$this->input->post('fb'),
              'tiktok'=>$this->input->post('tiktok'),
              'hari'=>hari_ini(date('w')),
              'tanggal'=>date('Y-m-d'),
              'jam'=>date('H:i:s'));
              $where2 = array('username' => $this->input->post('username'));
              $this->db->update('user_bisnis',$data2,$where2);


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

            $data2 = array(
              'gambar'=>$logobisnis['file_name'],
              'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
              'namabisnis'=>$this->input->post('namabisnis'),
              'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
              'tentangbisnis'=>$this->input->post('tentangbisnis'),
              'alamat'=>$this->input->post('alamat'),
              'propinsi'=>$this->input->post('provinsi'),
              'kabupaten'=>$this->input->post('kabupaten'),
              'kecamatan'=>$this->input->post('kecamatan'),
              'kodepos'=>$this->input->post('kodepos'),
              'nomerbisnis'=>$this->input->post('nomerbisnis'),
              'ig'=>$this->input->post('ig'),
              'ytb'=>$this->input->post('ytb'),
              'fb'=>$this->input->post('fb'),
              'tiktok'=>$this->input->post('tiktok'),
              'hari'=>hari_ini(date('w')),
              'tanggal'=>date('Y-m-d'),
              'jam'=>date('H:i:s'));
              $where2 = array('username' => $this->input->post('username'));
              $_image = $this->db->get_where('user_bisnis',$where2)->row();
              $query = $this->db->update('user_bisnis',$data2,$where2);
              if($query){
                unlink("assets/frontend/gambar_bisnis/".$_image->gambar);
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

            $data2 = array(
              'gambar'=>$logobisnis['file_name'],
              'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
              'namabisnis'=>$this->input->post('namabisnis'),
              'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
              'tentangbisnis'=>$this->input->post('tentangbisnis'),
              'alamat'=>$this->input->post('alamat'),
              'propinsi'=>$this->input->post('provinsi'),
              'kabupaten'=>$this->input->post('kabupaten'),
              'kecamatan'=>$this->input->post('kecamatan'),
              'kodepos'=>$this->input->post('kodepos'),
              'nomerbisnis'=>$this->input->post('nomerbisnis'),
              'ig'=>$this->input->post('ig'),
              'ytb'=>$this->input->post('ytb'),
              'fb'=>$this->input->post('fb'),
              'tiktok'=>$this->input->post('tiktok'),
              'hari'=>hari_ini(date('w')),
              'tanggal'=>date('Y-m-d'),
              'jam'=>date('H:i:s'));
              $where2 = array('username' => $this->input->post('username'));
              $_image = $this->db->get_where('user_bisnis',$where2)->row();
              $query = $this->db->update('user_bisnis',$data2,$where2);
              if($query){
                unlink("assets/frontend/gambar_bisnis/".$_image->gambar);
              }
          }else if ($logobisnis['file_name']==''){
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
            $data2 = array(
              'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
              'namabisnis'=>$this->input->post('namabisnis'),
              'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
              'tentangbisnis'=>$this->input->post('tentangbisnis'),
              'alamat'=>$this->input->post('alamat'),
              'propinsi'=>$this->input->post('provinsi'),
              'kabupaten'=>$this->input->post('kabupaten'),
              'kecamatan'=>$this->input->post('kecamatan'),
              'kodepos'=>$this->input->post('kodepos'),
              'nomerbisnis'=>$this->input->post('nomerbisnis'),
              'ig'=>$this->input->post('ig'),
              'ytb'=>$this->input->post('ytb'),
              'fb'=>$this->input->post('fb'),
              'tiktok'=>$this->input->post('tiktok'),
              'hari'=>hari_ini(date('w')),
              'tanggal'=>date('Y-m-d'),
              'jam'=>date('H:i:s'));
              $where2 = array('username' => $this->input->post('username'));
              $this->db->update('user_bisnis',$data2,$where2);

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
            $data2 = array(
              'gambar'=>$logobisnis['file_name'],
              'user_company_account'=>$this->db->escape_str($this->input->post('user_company_account')),
              'namabisnis'=>$this->input->post('namabisnis'),
              'namabisnis_seo'=>$this->mylibrary->seo_title($this->input->post('namabisnis')),
              'tentangbisnis'=>$this->input->post('tentangbisnis'),
              'alamat'=>$this->input->post('alamat'),
              'propinsi'=>$this->input->post('provinsi'),
              'kabupaten'=>$this->input->post('kabupaten'),
              'kecamatan'=>$this->input->post('kecamatan'),
              'kodepos'=>$this->input->post('kodepos'),
              'nomerbisnis'=>$this->input->post('nomerbisnis'),
              'ig'=>$this->input->post('ig'),
              'ytb'=>$this->input->post('ytb'),
              'fb'=>$this->input->post('fb'),
              'tiktok'=>$this->input->post('tiktok'),
              'hari'=>hari_ini(date('w')),
              'tanggal'=>date('Y-m-d'),
              'jam'=>date('H:i:s'));
              $where2 = array('username' => $this->input->post('username'));
              $_image = $this->db->get_where('user_bisnis',$where2)->row();
              $query = $this->db->update('user_bisnis',$data2,$where2);
              if($query){
                unlink("assets/frontend/gambar_bisnis/".$_image->gambar);
              }
          }
        redirect('pengaturan/index');
  		}else{


        $proses = $this->As_m->edit('user', array('id_user' => $this->session->id_user))->row_array();
    	    if ($this->session->level=='1')
        {
          cek_session_akses('settings',$this->session->id_session);
          $data = array('record' => $proses);

          $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
          $data['propinsi'] = $this->db->get('provinsi');
          $this->load->view('backend/pengaturan/v_daftar',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('settings',$this->session->id_session);
          $data = array('record' => $proses);
          $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
          $data['propinsi'] = $this->db->get('provinsi');
          $this->load->view('backend/pengaturan/v_daftar',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('settings',$this->session->id_session);
          $data = array('record' => $proses);
          $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
          $data['propinsi'] = $this->db->get('provinsi');
          $this->load->view('backend/pengaturan/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('settings',$this->session->id_session);
          $data = array('record' => $proses);
          $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
          $data['propinsi'] = $this->db->get('provinsi');
          $this->load->view('backend/pengaturan/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('settings',$this->session->id_session);
          $data = array('record' => $proses);
          $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
          $data['propinsi'] = $this->db->get('provinsi');
          $this->load->view('backend/pengaturan/v_daftar',$data);
        }
        else {
          redirect('aspanel/logout');
        }
  }}

  function kabupaten(){
        $propinsiID = $_GET['id'];
        if($propinsiID == ''){
			    foreach ($kabupaten->result() as $k)
	        {
	            if ($user_bisnis['kabupaten'] == $k->id){
	            	echo "<option value='$k->id' selected>$k->nama</option>";
	            }else{
	            	echo "<option value='$k->id'>$k->nama</option>";
							}
	        }
				}else{
	        $kabupaten   = $this->db->get_where('kabupaten',array('id_prov'=>$propinsiID));
	        foreach ($kabupaten->result() as $k)
	        {
	            if ($user_bisnis['kabupaten'] == $k->id){
	                 echo "<option value='$k->id' selected>$k->nama</option>";
                 }else{
	                 echo "<option value='$k->id'>$k->nama</option>";
	               }
	        }
				}
		}
  function kecamatan(){
        $kabupatenID = $_GET['id'];
        if($kabupatenID == ''){
		     exit;
			 }else{
		        $kecamatan   = $this->db->get_where('kecamatan',array('id_kabupaten'=>$kabupatenID));
		        foreach ($kecamatan->result() as $k)
		        {
		            if ($user_bisnis['kecamatan'] == $k->id){
		                echo "<option  value='$k->id' selected>$k->nama_kec</option>";
		                                                  }else{
		                                                  echo "<option value='$k->id'>$k->nama_kec</option>";
		                                                }
		        }
					}
        exit;
    }

}
