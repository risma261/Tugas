<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {

	public function keHalamanDepan(){
		$data['judul'] = 'Halaman Depan';
		$data['stasiun'] = $this->M_Guest->getDataStasiun()->result();

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}

	public function keHalamanKonfirmasi(){
		$data['judul'] = 'Halaman Konfirmasi';

		if(isset($_GET['kode'])):
			$kode = $_GET['kode'];
			$data['no_tiket'] = $this->M_Guest->getPembayaranWhere($kode)->row();
			$data['detail'] = $this->M_Guest->cekKonfirmasi($data['no_tiket']->no_tiket)->result();
			$tiket = $this->M_Guest->getTiketWhere($data['no_tiket']->no_tiket)->row();

			$data['bagian_a'] = $this->M_Guest->getKursiWhere('a',$data['no_tiket']->no_tiket,$tiket->id_jadwal)->result();
			$data['bagian_b'] = $this->M_Guest->getKursiWhere('b',$data['no_tiket']->no_tiket,$tiket->id_jadwal)->result();
		endif;

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_konfirmasi');
		$this->load->view('guest/template/footer');
	}
	
	public function cari_tiket(){
		$data = array(
			'asal' => $this->input->post('asal'), 
			'tujuan' => $this->input->post('tujuan'),
			'status' => 0
		);

		$data['tiket']  = $this->M_Guest->cari_tiket($data)->result();
		$data['penumpang'] = $this->input->post('jumlah');


		$data['judul'] = 'Halaman Depan';
		$data['stasiun'] = $this->M_Guest->getDataStasiun()->result();

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/halaman_depan');
		$this->load->view('guest/template/footer');
	}
	public function pesan($id){
		$data['judul'] = 'Formulir Data Diri';

		$data['info'] = $this->M_Guest->getDataInfoPesan($id)->row();
		$data['id_jadwal'] = $id;

		$this->load->view('guest/template/header', $data);
		$this->load->view('guest/template/data_diri');
		$this->load->view('guest/template/footer');
	}
	public function pesanTiket(){
		$penumpang = $this->input->post('penumpang');
		$id_jadwal = $this->input->post('id_jadwal');
		$harga = $this->input->post('harga');

		// Generate Nomor Tiket
		$cek = $this->M_Guest->getTiket()->num_rows()+1;
		$nomor_tiket = 'TOO'.$cek;

		// Input data Penumpang
	
			for ($i=1;$i<=$penumpang;$i++) { 
			$data = array(
				'nomor_tiket' => $nomor_tiket,
				'nama' => $this->input->post('nama'.$i),
				'no_identitas' => $this->input->post('identitas'.$i)
			);

			$this->M_Guest->insertPenumpang($penumpang, $nomor_tiket);
		

		// input Data Pemesan

		$data = array(
			'nomor_tiket' => $nomor_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'), 
			'email' => $this->input->post('email'), 
			'no_telepon' => $this->input->post('no_telp'), 
			'alamat' => $this->input->post('alamat'),
			

		);

		$this->M_Guest->insertPemesan($data);

		redirect('pembayaran');
		
	}
		
	}
	

}