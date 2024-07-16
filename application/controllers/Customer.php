<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Customer extends CI_Controller
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


  public function daftar_klien_lunas()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'5'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_lunas_administrator',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('user_bisnis',array('user_bisnis_status'=>'1'),'id_bisnis','DESC');
         
          $this->load->view('backend/customers/v_daftar_administrator',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }

  public function daftar_klien_uangmuka()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'4'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_uangmuka_administrator',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('user_bisnis',array('user_bisnis_status'=>'1'),'id_bisnis','DESC');
         
          $this->load->view('backend/customers/v_daftar_administrator',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }

  public function daftar_klien_kuncitgl()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'3'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_kuncitgl_administrator',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('user_bisnis',array('user_bisnis_status'=>'1'),'id_bisnis','DESC');
         
          $this->load->view('backend/customers/v_daftar_administrator',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }
  //batas hapus
  public function daftar_klien_konsul()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'2'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_konsul_administrator',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('user_bisnis',array('user_bisnis_status'=>'1'),'id_bisnis','DESC');
         
          $this->load->view('backend/customers/v_daftar_administrator',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }
  public function daftar_klien_hot()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'11'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_hot_administrator',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('user_bisnis',array('user_bisnis_status'=>'1'),'id_bisnis','DESC');
         
          $this->load->view('backend/customers/v_daftar_administrator',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }
  public function daftar_klien()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'1'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_administrator',$data);
        }
        elseif($this->session->level=='2')
        {
          cek_session_akses_admin('customers',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'1'),'customers_id','DESC');
         
          $this->load->view('backend/customers/v_daftar_klien_administrator',$data);
        }
        elseif($this->session->level=='3')
        {
          cek_session_akses_level_3('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='4')
        {

          cek_session_akses_level_4('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='5')
        {
          cek_session_akses_level_5('customers',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }
  public function tambah_klien()
  {


            if (isset($_POST['submit']))
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

                $data = array(
                  'id_session'=>$this->input->post('id'),
                  'customers_nama'=>$this->input->post('nama'),
                  'customers_id_session'=>md5($this->input->post('nama').''.$this->input->post('hp')).''.date('YmdHis'),
                  'customers_nohp'=>$this->input->post('hp'),
                  'customers_lokasi'=>$this->input->post('lokasi'),
                  'customers_tanggal_acara'=>$this->input->post('tanggal'),
                  'customers_status'=>'1',
                  'customers_tglawal' =>$this->input->post('tanggal_chat'),
                  'hari'=>hari_ini(date('w')),
                  'tanggal'=>date('Y-m-d'),
                  'jam'=>date('H:i:s'));
           
              $data_history = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'customer/tambah_bisnis',
                'log_activity_document_no' => md5($this->input->post('nama').''.$this->input->post('hp')).''.date('YmdHis'),
                'log_activity_status' => 'Tambah Klien ',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history);
              $this->Crud_m->insert('customers',$data);

              redirect('customer/daftar_klien');
            }
            else{
              if ($this->session->level=='1')
                {
                  cek_session_akses('informasi',$this->session->id_session);
                  $this->load->view('backend/customers/v_tambah_klien_administrator');
                }
            elseif($this->session->level=='2')
                {
                  cek_session_akses_admin('informasi',$this->session->id_session);
                  $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
                  $data['propinsi'] = $this->db->get('provinsi');
                  $this->load->view('backend/customers/v_tambah_bisnis_administrator',$data);
                }
            elseif($this->session->level=='3')
                {
                  cek_session_akses_level_3('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='4')
                {
                  cek_session_akses_level_4('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='5')
                {
                  cek_session_akses_level_5('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            else{
                redirect('aspanel/home');
              }
            }
  }
  public function edit_klien()
  {
          $id = $this->uri->segment(3);
            if (isset($_POST['submit']))
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
              $data = array(
                'customers_nama'=>$this->input->post('nama'),
                'customers_nohp'=>$this->input->post('hp'),
                'customers_lokasi'=>$this->input->post('lokasi'),
                'customers_tanggal_acara'=>$this->input->post('tanggal'),
                'customers_tglawal' =>$this->input->post('tanggal_chat'),
                'customers_status'=>$this->input->post('status'));
              $where = array('customers_id_session' => $this->input->post('id'));
              $query = $this->db->update('customers',$data,$where);           
              $data_history = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'customer/edit_klien',
                'log_activity_document_no' => $this->input->post('id'),
                'log_activity_status' => 'Perbarui Klien',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history);           
              redirect('customer/daftar_klien');
            }else{

              if ($this->session->level=='1')
                {
                  cek_session_akses('customer/daftar_klien',$this->session->id_session);
                  $proses = $this->Crud_m->edit('customers', array('customers_id_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit_klien_administrator',$data);
                }
            elseif($this->session->level=='2')
                {
                  cek_session_akses_admin('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->edit('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
                  $data['propinsi'] = $this->db->get('provinsi');
                  $this->load->view('backend/customers/v_edit_klien_administrator',$data);
                }
            elseif($this->session->level=='3')
                {
                  cek_session_akses_level_3('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->edit('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit',$data);
                }
            elseif($this->session->level=='4')
                {
                  cek_session_akses_level_4('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->edit('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit',$data);
                }
            elseif($this->session->level=='5')
                {
                  cek_session_akses_level_5('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->edit('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit',$data);
                }

            }
  }
  public function hapus_temp_klien()
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
      cek_session_akses('customer/daftar_klien',$this->session->id_session);
      $data = array('customers_status'=>'100');
      $where = array('customers_id_session' => $this->uri->segment(3));
      $this->db->update('customers', $data, $where);
      $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'customer/hapus_temp_klien',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Sampah Sementara Klien',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
      );
      $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131'){
        cek_session_akses_admin('harga/informasi_bisnis',$this->session->id_session);
        $data = array('customers_status'=>'0');
        $where = array('customers_id_session' => $this->uri->segment(3));
        $this->db->update('customers', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f'){
        cek_session_akses_level_3('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d'){
        cek_session_akses_level_4('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa'){
        cek_session_akses_level_5('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      } else{

      }

      redirect('customer/daftar_klien');
  }
  public function batal_klien()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customer/sampah_klien',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'110'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_batal_administrator',$data);
        }
        elseif($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131')
        {
          cek_session_akses_admin('sampah_bisnis',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('user_bisnis',array('user_bisnis_status'=>'0'),'id_bisnis','DESC');          
          $this->load->view('backend/customers/v_daftar_sampah_administrator',$data);
        }
        elseif($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f')
        {
          cek_session_akses_level_3('sampah_bisnis',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d')
        {
          cek_session_akses_level_4('sampah_bisnis',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'0'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa')
        {
          cek_session_akses_level_5('sampah_bisnis',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'0'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar_sampah',$data);
        }
        else {
          redirect('aspanel/logout');
        }
  }
 
  public function cold_klien()
  {
       if ($this->session->level=='1')
        {
          cek_session_akses('customer/sampah_klien',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('customers',array('customers_status'=>'10'),'customers_id','DESC');
          $this->load->view('backend/customers/v_daftar_klien_cold_administrator',$data);
        }
        elseif($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131')
        {
          cek_session_akses_admin('sampah_bisnis',$this->session->id_session);
          $data['record'] = $this->Crud_m->view_where_ordering('user_bisnis',array('user_bisnis_status'=>'0'),'id_bisnis','DESC');          
          $this->load->view('backend/customers/v_daftar_sampah_administrator',$data);
        }
        elseif($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f')
        {
          cek_session_akses_level_3('sampah_bisnis',$this->session->id_session);
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d')
        {
          cek_session_akses_level_4('sampah_bisnis',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'0'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar_sampah',$data);
        }
        elseif($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa')
        {
          cek_session_akses_level_5('sampah_bisnis',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'0'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar_sampah',$data);
        }
        else {
          redirect('aspanel/logout');
        }
  }
  public function kembalikan_klien()
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
      cek_session_akses('customer/sampah_klien',$this->session->id_session);
      $data = array('customers_status'=>'1');
      $where = array('customers_id_session' => $this->uri->segment(3));
      $this->db->update('customers', $data, $where);
      $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'customer/sampah_klien',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Kembalikan Klien',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
      );
      $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131'){
        cek_session_akses_admin('harga/sampah_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'1');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
        $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/sampah_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Kembalikan Vendor',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f'){
        cek_session_akses_level_3('harga/sampah_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'1');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
        $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/sampah_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Kembalikan Vendor',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d'){
        cek_session_akses_level_4('harga/sampah_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'1');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
        $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/sampah_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Kembalikan Vendor',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa'){
        cek_session_akses_level_5('harga/sampah_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'1');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
        $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/sampah_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Kembalikan Vendor',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      } else{

      }

      redirect('customer/daftar_klien');
  }
  public function hapus_permanen_klien()
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
      $id = $this->uri->segment(3);
     $this->db->delete('customers',['customers_id_session'=>$id]);
      

      $data_history = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'customer/hapus_permanen_klien',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Permanen Klien',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history);

      }else{

      }
      redirect('customer/sampah_klien');
  }
	public function detail_bisnis()
  {
          $id = $this->uri->segment(3);   
            if ($this->session->level=='ae0cb972bfad8467d4a0ace09b56a0c1ec9696bc')
                {
                  cek_session_akses('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->view_where('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit',$data);
                }
            elseif($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131')
                {
                  cek_session_akses_admin('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->view_where('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $data['companys'] = $this->Crud_m->view_limit_ordering('user_company','user_company_id','ASC','20','1');
                  $data['propinsi'] = $this->db->get('provinsi');
                  $this->load->view('backend/customers/v_detail_bisnis_administrator',$data);
                }
            elseif($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f')
                {
                  cek_session_akses_level_3('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->edit('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit',$data);
                }
            elseif($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d')
                {
                  cek_session_akses_level_4('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->edit('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit',$data);
                }
            elseif($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa')
                {
                  cek_session_akses_level_5('harga/informasi_bisnis',$this->session->id_session);
                  $proses = $this->Crud_m->edit('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);
                  $this->load->view('backend/customers/v_edit',$data);
                }       
  }

  public function harga_bisnis()
  {
        $id = $this->uri->segment(3);   
       if ($this->session->level=='ae0cb972bfad8467d4a0ace09b56a0c1ec9696bc')
        {
          cek_session_akses('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131')
        {
          cek_session_akses_admin('harga_bisnis',$this->session->id_session);
          $proses = $this->Crud_m->view_where('user_bisnis', array('user_bisnis_session' => $id))->row_array();
          $data = array('records' => $proses);
          $data['record'] = $this->Crud_m->view_where_ordering('harga',array('user_bisnis_session' => $id,'harga_status'=>'1'),'id_harga','DESC');
          $this->load->view('backend/customers/v_harga_bisnis_administrator',$data);
        }
        elseif($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f')
        {
          cek_session_akses_level_3('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d')
        {

          cek_session_akses_level_4('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa')
        {
          cek_session_akses_level_5('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }
  public function tambah_harga_bisnis()
  {
            $id = $this->uri->segment(3); 

            if (isset($_POST['submit']))
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
                  'id_harga_session'=>md5($this->input->post('judul')).''.date('YmdHis'),
                  'id_user_session'=>$this->input->post('id'),
                  'user_bisnis_session'=>$this->input->post('id_bisnis'),
                  'judul'=>$this->input->post('judul'),
                  'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                  'harga'=>$this->input->post('harga'),
                  'harga_spec'=>$this->input->post('harga_spec'),
                  'harga_diskon'=>$this->input->post('harga_diskon'),
                  'harga_modal'=>$this->input->post('harga_modal'),
                  'harga_status'=>'1',
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
                  'id_harga_session'=>md5($this->input->post('judul')).''.date('YmdHis'),
                  'id_user_session'=>$this->input->post('id'),
                  'user_bisnis_session'=>$this->input->post('id_bisnis'),
                  'judul'=>$this->input->post('judul'),
                  'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                  'harga'=>$this->input->post('harga'),
                  'harga_spec'=>$this->input->post('harga_spec'),
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
              $data_history = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/tambah_harga_bisnis',
                'log_activity_document_no' => md5($this->input->post('judul')).''.date('YmdHis'),
                'log_activity_status' => 'Tambah Bisnis ',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history);
              $this->Crud_m->insert('harga',$data);

              redirect('harga/harga_bisnis/'.$this->input->post('id_bisnis'));
            }
            else{
              if ($this->session->level=='ae0cb972bfad8467d4a0ace09b56a0c1ec9696bc')
                {
                  cek_session_akses('informasi',$this->session->id_session);
                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131')
                {
                  cek_session_akses_admin('informasi',$this->session->id_session);
                 
                  $proses = $this->Crud_m->view_where('user_bisnis', array('user_bisnis_session' => $id))->row_array();
                  $data = array('records' => $proses);                  
                  $this->load->view('backend/customers/v_tambah_harga_bisnis_administrator',$data);
                }
            elseif($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f')
                {
                  cek_session_akses_level_3('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d')
                {
                  cek_session_akses_level_4('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa')
                {
                  cek_session_akses_level_5('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            else{
                redirect('aspanel/home');
              }
            }
  }
  public function edit_harga_bisnis()
  {
            $id = $this->uri->segment(3); 

            if (isset($_POST['submit']))
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
                  'judul'=>$this->input->post('judul'),
                  'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                  'harga'=>$this->input->post('harga'),
                  'harga_spec'=>$this->input->post('harga_spec'),
                  'harga_diskon'=>$this->input->post('harga_diskon'),
                  'harga_modal'=>$this->input->post('harga_modal'),             
                  'deskripsi'=>$this->input->post('deskripsi'),                  
                  'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
                  'keyword'=>$this->input->post('keyword'));
                $where = array('id_harga_session' => $this->input->post('id_harga'));
                $this->db->update('harga',$data,$where);
              }  
              else
              {
                  $data = array(
                  'judul'=>$this->input->post('judul'),
                  'judul_seo'=>$this->mylibrary->seo_title($this->input->post('judul')),
                  'harga'=>$this->input->post('harga'),
                  'harga_spec'=>$this->input->post('harga_spec'),
                  'harga_diskon'=>$this->input->post('harga_diskon'),
                  'harga_modal'=>$this->input->post('harga_modal'),             
                  'deskripsi'=>$this->input->post('deskripsi'),                  
                  'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
                  'foto_h'=>$hasil['file_name'],
                  'keyword'=>$this->input->post('keyword'));
                  $where = array('id_harga_session' => $this->input->post('id_harga'));                
                  $_image = $this->db->get_where('harga',$where)->row();
                  $query = $this->db->update('harga',$data,$where);
                  if($query){
                            unlink("assets/frontend/harga/".$_image->foto_h);
                            }
              }
              $data_history = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/edit_harga_bisnis',
                'log_activity_document_no' => $this->input->post('id_harga'),
                'log_activity_status' => 'Perbarui Harga Bisnis',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history);      
              redirect('harga/harga_bisnis/'.$this->input->post('id_bisnis'));
            }
            else{
              if ($this->session->level=='ae0cb972bfad8467d4a0ace09b56a0c1ec9696bc')
                {
                  cek_session_akses('informasi',$this->session->id_session);
                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131')
                {
                  cek_session_akses_admin('harga/harga_bisnis',$this->session->id_session);                 
                  $proses = $this->Crud_m->view_where('harga', array('id_harga_session' => $id))->row_array();
                  $data = array('records' => $proses);                  
                  $this->load->view('backend/customers/v_edit_harga_bisnis_administrator',$data);
                }
            elseif($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f')
                {
                  cek_session_akses_level_3('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d')
                {
                  cek_session_akses_level_4('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            elseif($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa')
                {
                  cek_session_akses_level_5('informasi',$this->session->id_session);

                  $this->load->view('backend/customers/v_tambah_bisnis_administrator');
                }
            else{
                redirect('aspanel/home');
              }
            }
  }
  public function hapus_temp_harga()
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
    if ($this->session->level=='ae0cb972bfad8467d4a0ace09b56a0c1ec9696bc'){
      cek_session_akses('harga/informasi_bisnis',$this->session->id_session);
      $data = array('harga_status'=>'0');
      $where = array('id_harga_session' => $this->uri->segment(3));
      $this->db->update('harga', $data, $where);
      $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/harga_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Hapus Harga',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
      );
      $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131'){
        cek_session_akses_admin('harga/informasi_bisnis',$this->session->id_session);
        $data = array('harga_status'=>'0');
        $where = array('id_harga_session' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
        $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/harga_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Hapus Harga',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f'){
        cek_session_akses_level_3('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d'){
        cek_session_akses_level_4('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa'){
        cek_session_akses_level_5('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      } else{

      }

      redirect($_SERVER['HTTP_REFERER']);
  }
  public function harga_sampah_bisnis()
  {
        $id = $this->uri->segment(3);   
       if ($this->session->level=='ae0cb972bfad8467d4a0ace09b56a0c1ec9696bc')
        {
          cek_session_akses('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131')
        {
          cek_session_akses_admin('harga_bisnis',$this->session->id_session);
          $proses = $this->Crud_m->view_where('user_bisnis', array('user_bisnis_session' => $id))->row_array();
          $data = array('records' => $proses);
          $data['record'] = $this->Crud_m->view_where_ordering('harga',array('user_bisnis_session' => $id,'harga_status'=>'0'),'id_harga','DESC');
          $this->load->view('backend/customers/v_harga_bisnis_sampah_administrator',$data);
        }
        elseif($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f')
        {
          cek_session_akses_level_3('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d')
        {

          cek_session_akses_level_4('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username, 'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        elseif($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa')
        {
          cek_session_akses_level_5('settings',$this->session->id_session);
          $data['records'] = $this->Crud_m->view_where_ordering('harga',array('username'=>$this->session->username,'harga_status'=>'1'),'id_harga','DESC');
          $data['companys'] = $this->db->get('user_company');
          $this->load->view('backend/customers/v_daftar',$data);
        }
        else {
          redirect(base_url());
        }
  }
  public function kembalikan_harga_bisnis()
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
    if ($this->session->level=='ae0cb972bfad8467d4a0ace09b56a0c1ec9696bc'){
      cek_session_akses('harga/informasi_bisnis',$this->session->id_session);
      $data = array('harga_status'=>'1');
      $where = array('id_harga_session' => $this->uri->segment(3));
      $this->db->update('harga', $data, $where);
      $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/harga_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Hapus Harga',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
      );
      $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131'){
        cek_session_akses_admin('harga/informasi_bisnis',$this->session->id_session);
        $data = array('harga_status'=>'1');
        $where = array('id_harga_session' => $this->uri->segment(3));
        $this->db->update('harga', $data, $where);
        $data_history_addcompany = array (
        'log_activity_user_id'=>$this->session->id_session,
        'log_activity_modul' => 'harga/harga_bisnis',
        'log_activity_document_no ' => $this->uri->segment(3),
        'log_activity_status' => 'Kembalikan Harga',
        'log_activity_platform'=> $agent,
        'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='4f599b712d55f86b9dfd3d04338f758aa07b0a3f'){
        cek_session_akses_level_3('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='493a39fdab06bf01adcc85102f7c8a0ad29da98d'){
        cek_session_akses_level_4('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      }else if ($this->session->level=='d1f9f5dfff1d24e26ef15bab38b8afffb9fd81fa'){
        cek_session_akses_level_5('harga/informasi_bisnis',$this->session->id_session);
        $data = array('user_bisnis_status'=>'0');
        $where = array('user_bisnis_session' => $this->uri->segment(3));
        $this->db->update('user_bisnis', $data, $where);
              $data_history_addcompany = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/informasi_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Vendor',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history_addcompany);
      } else{

      }

      redirect($_SERVER['HTTP_REFERER']);
  }
   public function hapus_permanen_harga()
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

      if ($this->session->level=='105221cd0abe4603ecfee5fb02ba2f398128d131'){
      $id = $this->uri->segment(3);
      $_id = $this->db->get_where('harga',['id_harga_session' => $id])->row();
      $query = $this->db->delete('harga',['id_harga_session'=>$id]);
      if($query){
                unlink("assets/frontend/harga/".$_id->foto_h);
      }

      $data_history = array (
                'log_activity_user_id'=>$this->session->id_session,
                'log_activity_modul' => 'harga/harga_sampah_bisnis',
                'log_activity_document_no ' => $this->uri->segment(3),
                'log_activity_status' => 'Hapus Permanen Harga',
                'log_activity_platform'=> $agent,
                'log_activity_ip'=> $this->input->ip_address()
              );
              $this->db->insert('log_activity', $data_history);

      }else{

      }
      redirect($_SERVER['HTTP_REFERER']);
  }

}
