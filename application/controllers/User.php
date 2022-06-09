<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->load->helper('url', 'form', 'file');
			$this->load->library('form_validation');
			$this->load->model('User_model');
			$this->load->model('Admin_model');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function index()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['lokasi'] = $this->User_model->getLokasi();
			// $data['admin'] = $this->Admin_model->getAdmin();

			$this->load->view('user/user_view', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function grafik()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['kelurahan'] = $this->User_model->getKelurahan();
			// $data['admin'] = $this->Admin_model->getAdmin();

			$this->load->view('user/grafik', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function filter_grafik()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['kelurahan'] = $this->User_model->getKelurahan();
			$this->form_validation->set_rules('hidden', 'Kelurahan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('user/user_view', $data);
			} else {
				$kelurahan = $this->input->post('kelurahan');
				$data['covid'] = $this->User_model->getCovidByKelurahan($kelurahan);
				$data['klr'] = $kelurahan;
				$this->load->view('user/user_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function jagung()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['tahun'] = $this->User_model->getTahun();

			$this->load->view('user/jagung', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function filter_jagung()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['tahun'] = $this->User_model->getTahun();
			$this->form_validation->set_rules('hidden', 'Tahun', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('user/jagung', $data);
			} else {
				$tahun = $this->input->post('tahun');
				$data['jagung'] = $this->User_model->getJagung($tahun);
				$data['thn'] = $tahun;
				$this->load->view('user/jagung_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function cetak($tahun)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['tahun'] = $this->User_model->getTahun();
			$data['jagung'] = $this->User_model->getJagung($tahun);
			$data['thn'] = $tahun;
			$this->load->view('user/cetak', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function covid()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['tanggal'] = $this->User_model->getTanggal();

			$this->load->view('user/covid', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function filter_covid()
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$data['level'] = $level;
			$data['nama'] = $nama;
			$data['tanggal'] = $this->User_model->getTanggal();
			$this->form_validation->set_rules('hidden', 'Tanggal', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('user/covid', $data);
			} else {
				$tanggal = $this->input->post('tanggal');
				$data['covid'] = $this->User_model->getCovidFilter($tanggal);
				$data['tgl'] = $tanggal;
				$this->load->view('user/covid_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */