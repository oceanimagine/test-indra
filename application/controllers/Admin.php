<?php
defined('BASEPATH') or exit('No direct script access allowed');

require_once APPPATH . 'third_party/Spout/Autoloader/autoload.php';

use Box\Spout\Reader\Common\Creator\ReaderEntityFactory;
use Box\Spout\Writer\Common\Creator\WriterEntityFactory;
use Box\Spout\Common\Entity\Row;

class Admin extends CI_Controller
{
	private $filename = "import_data";

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
			$this->load->model('Admin_model');
			$this->load->library('curl');
		} else {
			redirect('login', 'refresh');
		}
	}

        public function main_admin($filter_tanggal = ""){
            if ($this->session->userdata('logged_in')) {
                    $session_data = $this->session->userdata('logged_in');
                    $id_user = $session_data['id_user'];
                    $username = $session_data['username'];
                    $password = $session_data['password'];
                    $nama = $session_data['nama'];
                    $email = $session_data['email'];
                    $level = $session_data['level'];
                    $data['nama'] = $nama;
                    $data['filter_tanggal'] = $filter_tanggal;
                    $data['controll'] = $this;

                    if ($level == 1) {
                        $query_covid = $this->db->query("select b.nama_kelurahan, a.positif, a.sembuh, a.meninggal from kelurahan b, covid a where a.fk_kelurahan = b.id_kelurahan");    
                        $hasil_covid = $query_covid->result_array();
                        for($i = 0; $i < sizeof($hasil_covid); $i++){
                            $_GET["".$hasil_covid[$i]['nama_kelurahan']."_terkonfirmasi_positif"] = $hasil_covid[$i]['positif'];
                            $_GET["".$hasil_covid[$i]['nama_kelurahan']."_sembuh"] = $hasil_covid[$i]['sembuh'];
                            $_GET["".$hasil_covid[$i]['nama_kelurahan']."_meninggal"] = $hasil_covid[$i]['meninggal'];
                        }
                        $this->load->view('admin/admin_view', $data);
                    } elseif ($level == 2) {
                        redirect('User', 'refresh');
                    }
                    // } elseif ($level == 3) {
                    // 	redirect('Super_admin', 'refresh');
                    // }
                    // $this->load->view('admin/admin_view', $data);
            } else {
                    redirect('login', 'refresh');
            }
        }
        
	public function index(){
            $this->main_admin();
	}
        
        public function filter($tanggal = ""){
            $this->main_admin($tanggal);
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
			$data['kelurahan'] = $this->Admin_model->getKelurahan();
			// $data['admin'] = $this->Admin_model->getAdmin();

			if ($level == 1) {
				$this->load->view('admin/grafik', $data);
			} elseif ($level == 2) {
				redirect('User', 'refresh');
			}
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
			$data['kelurahan'] = $this->Admin_model->getKelurahan();
			$this->form_validation->set_rules('hidden', 'Kelurahan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('admin/admin_view', $data);
			} else {
				$kelurahan = $this->input->post('kelurahan');
				$data['covid'] = $this->Admin_model->getCovidByKelurahan($kelurahan);
				$data['klr'] = $kelurahan;
				$this->load->view('admin/admin_filter', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function kelola_admin()
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
			$data['admin'] = $this->Admin_model->getAdmin();

			$this->load->view('admin/kelola_admin', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function kelola_user()
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
			$data['user'] = $this->Admin_model->getUser();

			$this->load->view('admin/kelola_user', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_admin()
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
			$data['tahun'] = $this->Admin_model->getTahun();
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_admin', $data);
			} else {
				$this->Admin_model->addAdmin();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_admin', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_user()
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
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_user', $data);
			} else {
				$this->Admin_model->addUser();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_user', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function delete_admin($id_admin)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->Admin_model->deleteUser($id_admin);
			echo "<script>alert('Hapus Data Berhasil')</script>";
			redirect('Admin/kelola_admin', 'refresh');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function delete_user($id)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->Admin_model->deleteUser($id);
			echo "<script>alert('Hapus Data Berhasil')</script>";
			redirect('Admin/kelola_user', 'refresh');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_admin($id_admin)
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
			$data['admin'] = $this->Admin_model->getAdminById($id_admin);

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_admin', $data);
			} else {
				$this->Admin_model->edit_admin($id_admin);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_admin', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_user($id)
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
			$data['user'] = $this->Admin_model->getUserById($id);

			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_user', $data);
			} else {
				$this->Admin_model->edit_user($id);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_user', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	
	public function kelola_covid()
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
			$data['covid'] = $this->Admin_model->getCovid();

			$this->load->view('admin/kelola_covid', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_covid()
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
			$data['kelurahan'] = $this->Admin_model->getKelurahan();
			$this->form_validation->set_rules('fk_kelurahan', 'Kelurahan', 'trim|required');
			$this->form_validation->set_rules('positif', 'Positif', 'trim|required');
			$this->form_validation->set_rules('sembuh', 'Sembuh', 'trim|required');
			$this->form_validation->set_rules('meninggal', 'Meninggal', 'trim|required');
			// $this->form_validation->set_rules('isoman', 'Isolasi Mandiri', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_covid', $data);
			} else {
				$this->Admin_model->addCovid();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_covid', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function add_covid($tanggal)
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
			$data['kelurahan'] = $this->Admin_model->getKelurahan();

			$this->form_validation->set_rules('fk_kelurahan', 'Kelurahan', 'trim|required');
			$this->form_validation->set_rules('positif', 'Positif', 'trim|required');
			$this->form_validation->set_rules('sembuh', 'Sembuh', 'trim|required');
			$this->form_validation->set_rules('meninggal', 'Meninggal', 'trim|required');
			// $this->form_validation->set_rules('isoman', 'Isolasi Mandiri', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/add_covid', $data);
			} else {
				$this->Admin_model->add_covid($tanggal);
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_covid_filter', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_covid($id_covid)
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
			$data['covid'] = $this->Admin_model->getCovidById($id_covid);
			$data['kelurahan'] = $this->Admin_model->getKelurahan();

			$this->form_validation->set_rules('fk_kelurahan', 'Kelurahan', 'trim|required');
			$this->form_validation->set_rules('positif', 'Positif', 'trim|required');
			$this->form_validation->set_rules('sembuh', 'Sembuh', 'trim|required');
			$this->form_validation->set_rules('meninggal', 'Meninggal', 'trim|required');
			$this->form_validation->set_rules('isoman', 'Isolasi Mandiri', 'trim|required');
			$this->form_validation->set_rules('tanggal', 'Tanggal', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_covid', $data);
			} else {
				$this->Admin_model->edit_covid($id_covid);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_covid', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}
	public function delete_covid($id_covid)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->Admin_model->deleteCovid($id_covid);
			echo "<script>alert('Hapus Data Berhasil')</script>";
			redirect('Admin/kelola_covid', 'refresh');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function kelola_covid_filter()
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
			$data['tanggal'] = $this->Admin_model->getTanggal();

			$this->load->view('admin/kelola_covid_filter', $data);
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
			$data['tanggal'] = $this->Admin_model->getTanggal();
			$this->form_validation->set_rules('hidden', 'Tanggal', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Pilih Tahun";
				$this->load->view('admin/kelola_covid_filter', $data);
			} else {
				$tanggal = $this->input->post('tanggal');
				$data['covid'] = $this->Admin_model->getCovidFilter($tanggal);
				$data['tgl'] = $tanggal;
				$this->load->view('admin/kelola_covid_filter2', $data);
			}
		} else {
			redirect('login', 'refresh');
		}
	}
        
        public function validateDate($date, $format = 'Y-m-d'){
            $d = DateTime::createFromFormat($format, $date);
            // echo $d && $d->format($format) == $date . "<br />\n";
            // echo $date . "<br />\n";
            // echo $d && $d->format($format) === $date;
            // echo "<br />\n";
            // echo $date;
            // echo "<br />\n";
            return $d && $d->format($format) == $date;
        }

	public function import_excel()
	{
		$config['upload_path'] = './uploads';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name'] = 'doc' . time();
		$this->load->library('upload', $config);
		if ($this->upload->do_upload('importexcel')) {
			$file = $this->upload->data();
			$reader = ReaderEntityFactory::createXLSXReader();

			$reader->open('uploads/' . $file['file_name']);
			foreach ($reader->getSheetIterator() as $sheet) {
				$numRow = 1;
                                $insert_data = 0;
				foreach ($sheet->getRowIterator() as $row) {
					if ($numRow > 1) {
                                            $data_not_exists = false;
                                            $kelurahan_exists = false;
                                            
                                                
                                            if($this->validateDate($row->getCellAtIndex(4))){
                                                
                                                // echo $row->getCellAtIndex(0) . "<br />\n";
                                                // echo $row->getCellAtIndex(1) . "<br />\n";
                                                // echo $row->getCellAtIndex(2) . "<br />\n";
                                                // echo $row->getCellAtIndex(3) . "<br />\n";
                                                // echo $row->getCellAtIndex(4) . "<br />\n";
                                                // echo $this->validateDate($row->getCellAtIndex(4)) . "<br />\n";
                                                // echo "<br />\n";
                                                
                                                $query_check_data = $this->db->query("
                                                    SELECT * FROM `covid` where tanggal = '".$row->getCellAtIndex(4)."' and fk_kelurahan = '".$row->getCellAtIndex(0)."'
                                                ");
                                                $hasil_check_data = $query_check_data->result_array();
                                                if(sizeof($hasil_check_data) == 0){
                                                    $data_not_exists = true;
                                                }
                                                $query_check_kelurahan = $this->db->query("
                                                    select id_kelurahan from kelurahan where id_kelurahan = '".$row->getCellAtIndex(0)."'
                                                ");
                                                $hasil_check_kelurahan = $query_check_kelurahan->result_array();
                                                if(sizeof($hasil_check_kelurahan) > 0){
                                                    $kelurahan_exists = true;
                                                }
                                            }
                                            if($kelurahan_exists && $data_not_exists){
						$datacovid = array(
							'fk_kelurahan' => $row->getCellAtIndex(0),
							'positif' => $row->getCellAtIndex(1),
							'sembuh' => $row->getCellAtIndex(2),
							'meninggal' => $row->getCellAtIndex(3),
							// 'isoman' => $row->getCellAtIndex(4),
							'tanggal' => $row->getCellAtIndex(4)
						);
						$this->Admin_model->import_data($datacovid);
                                                $insert_data++;
                                            }
					}
					$numRow++;
				}
				$reader->close();
                                // exit();
				unlink('uploads/' . $file['file_name']);
                                ?>
                                <script>alert("Data berhasil ditambahkan.\nJumlah Data Masuk : <?php echo $insert_data; ?>")</script>
                                <?php
				$this->session->set_flashdata('message', '<script>alert("Data berhasil ditambahkan.\nJumlah Data Masuk : '.$insert_data.'")</script>');
				// $this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('Admin/kelola_covid', 'refresh');
			}
		} else {
			// echo '<script>alert("Harap masukkan data dengan benar !")</script>';
			$this->session->set_flashdata('message', '<script>alert("Harap masukkan data dengan benar !")</script>');
			redirect('Admin/kelola_covid');
		}
	}

	public function kelola_kelurahan()
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
			$data['kelurahan'] = $this->Admin_model->getKelurahan();

			$this->load->view('admin/kelola_kelurahan', $data);
		} else {
			redirect('login', 'refresh');
		}
	}

	public function tambah_kelurahan()
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
			$this->form_validation->set_rules('id_kelurahan', 'Id Kelurahan', 'trim|required|is_unique[kelurahan.id_kelurahan]', [
				'is_unique' => 'Id Kelurahan sudah tersedia, silahkan masukan id yang lain!'
			]);
			$this->form_validation->set_rules('nama_kelurahan', 'Kelurahan', 'trim|required');

			// $this->form_validation->set_message('is_unique', '{field} sudah dipakai, silahkan ganti yang lain');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/tambah_kelurahan', $data);
			} else {
				$this->Admin_model->addKelurahan();
				echo "<script>alert('Tambah Data Berhasil')</script>";
				redirect('Admin/kelola_kelurahan', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function delete_kelurahan($id_kelurahan)
	{
		if ($this->session->userdata('logged_in')) {
			$session_data = $this->session->userdata('logged_in');
			$id_user = $session_data['id_user'];
			$username = $session_data['username'];
			$password = $session_data['password'];
			$nama = $session_data['nama'];
			$email = $session_data['email'];
			$level = $session_data['level'];

			$this->Admin_model->deleteKelurahan($id_kelurahan);
			echo "<script>alert('Hapus Data Berhasil')</script>";
			redirect('Admin/kelola_kelurahan', 'refresh');
		} else {
			redirect('login', 'refresh');
		}
	}

	public function edit_kelurahan($id_kelurahan)
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
			$data['kelurahan'] = $this->Admin_model->getKelurahanById($id_kelurahan);

			$this->form_validation->set_rules('id_kelurahan', 'Id Kelurahan', 'trim|required|is_unique[kelurahan.id_kelurahan]', [
				'is_unique' => 'Id Kelurahan sudah tersedia, silahkan masukan id yang lain!'
			]);
			$this->form_validation->set_rules('nama_kelurahan', 'Kelurahan', 'trim|required');

			if ($this->form_validation->run() == FALSE) {
				$data['error'] = "Data Harus Lengkap";
				$this->load->view('admin/edit_kelurahan', $data);
			} else {
				$this->Admin_model->edit_kelurahan($id_kelurahan);
				echo "<script>alert('Update Data Berhasil')</script>";
				redirect('Admin/kelola_kelurahan', 'refresh');
			}
		} else {
			redirect('login', 'refresh');
		}
	}

	public function delete_all_kelurahan()
    {

        $this->db->query('DELETE FROM kelurahan');
        $this->session->set_flashdata('message', '<script>alert("Data berhasil dihapus")</script>');
        redirect('Admin/kelola_kelurahan', 'refresh');
    }
}
