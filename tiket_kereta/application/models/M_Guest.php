<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Guest extends CI_Model {

	public function getDataStasiun(){
		return $this->db->get('stasiun');
	}

	public function cari_tiket($data){
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->where($data);
		$this->db->like('tgl_berangkat', $this->input->post('tanggal'));
		$this->db->from('jadwal');
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get();
	}
	public function getDataInfoPesan($id){
		$this->db->select('jadwal.*, Asal.nama_stasiun AS ASAL, Tujuan.nama_stasiun As TUJUAN');
		$this->db->where('jadwal.id', $id);
		$this->db->join('stasiun as Asal','jadwal.asal = Asal.id', 'left');
		$this->db->join('stasiun as Tujuan','jadwal.tujuan = Tujuan.id', 'left');
		return $this->db->get('jadwal');
	}

	public function insertPenumpang($penumpang, $nomor_tiket)
	{
		for ($i=1; $i<=$penumpang; $i++) 
			$data = [
				'nomor_tiket' => $nomor_tiket,
				'nama' => $this->input->post('nama'.$i),
				'no_identitas' => $this->input->post('no_identitas'.$i)
			];
			$this->db->insert('penumpang', $data);
		
	}
	public function getTiket(){
		return $this->db->get('tiket');
	}
	public function insertPemesan($nomor_tiket){
		$data = array(
			'nomor_tiket' => $nomor_tiket,
			'id_jadwal' => $this->input->post('id_jadwal'),
			'nama_pemesan' => $this->input->post('nama_pemesan'), 
			'email' => $this->input->post('email'), 
			'no_telepon' => $this->input->post('no_telp'), 
			'alamat' => $this->input->post('alamat'),
			'tanggal' => date('Y-m-d h:i:s')
		);

		$this->db->insert('tiket', $data)->num_rows();
	}

}
