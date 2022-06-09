<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

	public function getAdmin()
	{
		// $this->db->where('level', '1');
		return $this->db->get('user')->result();
	}

	public function getUser()
	{
		$this->db->where('level', '2');
		return $this->db->get('user')->result();
	}

	public function getCovidFilter($tanggal)
	{
		$this->db->where('tanggal', $tanggal);
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('covid')->result();
	}

	

	public function getLokasi()
	{
		return $this->db->get('lokasi')->result();
	}
	public function getKelurahan()
	{
		return $this->db->get('kelurahan')->result();
	}

	public function getTahun()
	{
		$this->db->distinct();
		$this->db->group_by('tahun');
		return $this->db->get('tanaman')->result();
	}

	public function getTanggal()
	{
		$this->db->distinct();
		$this->db->group_by('tanggal');
		return $this->db->get('covid')->result();
	}

	public function addAdmin()
	{
		$object = array(
			'username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '2'
		);
		$this->db->insert('user', $object);
	}

	
	public function add_covid($tanggal)
	{
		$object = array(
			'fk_kelurahan' => $this->input->post('fk_kelurahan'),
			'positif' => $this->input->post('positif'),
			'sembuh' => $this->input->post('sembuh'),
			'meninggal' => $this->input->post('meninggal'),
			// 'isoman' => $this->input->post('isoman'),
			'tanggal' => $tanggal
		);
		$this->db->insert('covid', $object);
	}

	public function addUser()
	{
		$object = array(
			'username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '2'
		);
		$this->db->insert('user', $object);
	}

	
	public function addKelurahan()
	{
		$object = array(
			'id_kelurahan' => $this->input->post('id_kelurahan'),
			'nama_kelurahan' => $this->input->post('nama_kelurahan')
		);
		// $object = array('nama_lokasi' => $this->input->post('nama_lokasi'));
		$this->db->insert('kelurahan', $object);
	}

	public function deleteUser($id_user)
	{
		$this->db->where('id_user', $id_user);
		$this->db->delete('user');
	}

	
	public function deleteKelurahan($id_kelurahan)
	{
		$this->db->where('id_kelurahan', $id_kelurahan);
		$this->db->delete('kelurahan');
	}

	public function deleteJagung($id_tanaman)
	{
		$this->db->where('id_tanaman', $id_tanaman);
		$this->db->delete('tanaman');
	}

	public function getAdminById($id_user)
	{
		$this->db->where('id_user', $id_user);
		// $this->db->where('level', '1');
		return $this->db->get('user')->result();
	}

	public function getUserById($id_user)
	{
		$this->db->where('id_user', $id_user);
		// $this->db->where('level', '2');
		return $this->db->get('user')->result();
	}

	
	public function getKelurahanById($id_kelurahan)
	{
		$this->db->where('id_kelurahan', $id_kelurahan);
		return $this->db->get('kelurahan')->result();
	}

	public function getCovidById($id_covid)
	{
		$this->db->where('id_covid', $id_covid);
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('covid')->result();
	}

	public function edit_admin($id_admin)
	{
		$object = array(
			'username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '1'
		);
		$this->db->where('id_user', $id_admin);
		$this->db->update('user', $object);
	}

	
	public function edit_user($id_user)
	{
		$object = array(
			'username' => $this->input->post('username'),
			'password' => base64_encode($this->input->post('password')),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'level' => '2'
		);
		$this->db->where('id_user', $id_user);
		$this->db->update('user', $object);
	}

	
	public function edit_kelurahan($id_kelurahan)
	{
		$object = array(
			'id_kelurahan' => $this->input->post('id_kelurahan'),
			'nama_kelurahan' => $this->input->post('nama_kelurahan')
		);
		$this->db->where('id_kelurahan', $id_kelurahan);
		$this->db->update('kelurahan', $object);
	}

	public function upload_file($filename)
	{
		$this->load->library('upload'); // Load librari upload

		$config['upload_path'] = './excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']  = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config); // Load konfigurasi uploadnya
		if ($this->upload->do_upload('file')) { // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	public function insert_multiple($data)
	{
		$this->db->insert_batch('tanaman', $data);
	}

	public function getCovid()
	{
		$this->db->order_by('nama_kelurahan', 'ASC');
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('covid')->result();
	}

	public function addCovid()
	{
		$object = array(
			'fk_kelurahan' => $this->input->post('fk_kelurahan'),
			'positif' => $this->input->post('positif'),
			'sembuh' => $this->input->post('sembuh'),
			'meninggal' => $this->input->post('meninggal'),
			// 'isoman' => $this->input->post('isoman'),
			'tanggal' => $this->input->post('tanggal')
		);
		$this->db->insert('covid', $object);
	}

	public function edit_covid($id_covid)
	{
		$object = array(
			'fk_kelurahan' => $this->input->post('fk_kelurahan'),
			'positif' => $this->input->post('positif'),
			'sembuh' => $this->input->post('sembuh'),
			'meninggal' => $this->input->post('meninggal'),
			// 'isoman' => $this->input->post('isoman'),
			'tanggal' => $this->input->post('tanggal')
		);
		$this->db->where('id_covid', $id_covid);
		$this->db->update('covid', $object);
	}

	public function deleteCovid($id_covid)
	{
		$this->db->where('id_covid', $id_covid);
		$this->db->delete('covid');
	}
	public function import_data($datacovid)
	{
		$jumlah = count($datacovid);
		if ($jumlah > 0) {
			$this->db->replace('covid', $datacovid);
		}
	}

	public function getCovidByKelurahan($kelurahan)
	{
		$this->db->where('fk_kelurahan', $kelurahan);
		$this->db->join('kelurahan', 'kelurahan.id_kelurahan = covid.fk_kelurahan', 'join');
		return $this->db->get('covid')->result();
	}
}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */