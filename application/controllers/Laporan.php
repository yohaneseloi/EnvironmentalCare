<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function index()
	{
		$this->load->model('model_sesi');
		$this->model_sesi->getsesi();
		$Email_Volunteer = $this->session->userdata('Email_Volunteer');
		$isi['username'] = $this->db->query("SELECT Username FROM user WHERE Email_Volunteer='$Email_Volunteer' ");
		$isi['regional'] = $this->db->query("SELECT nama_kota FROM kategori_regional WHERE id_regional=(SELECT id_regional FROM user WHERE Email_Volunteer='$Email_Volunteer') ");
		$isi['jenis_sampah'] = $this->db->query("SELECT nama_sampah FROM kategori_sampah WHERE id_sampah=(SELECT id_sampah FROM laporan WHERE Email_Volunteer='$Email_Volunteer') ");
		$isi['jml_sampah'] = $this->db->query("SELECT Jumlah FROM laporan WHERE Email_Volunteer='$Email_Volunteer' ");
		$isi['id_lap'] = $this->db->query("SELECT id_laporan FROM laporan WHERE Email_Volunteer='$Email_Volunteer' ");






		$this->load->view('tampilan_laporan', $isi);
	}




}