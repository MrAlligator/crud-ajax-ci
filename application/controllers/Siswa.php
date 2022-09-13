<?php
class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_siswa');
	}
	function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['user_username' => $this->session->userdata('username')])->row_array();
		$this->load->view('v_siswa', $data);
	}

	function data_siswa()
	{
		$data = $this->m_siswa->siswa_list();
		echo json_encode($data);
	}

	function get_siswa()
	{
		$nis = $this->input->get('nis');
		$data = $this->m_siswa->get_siswa_by_id($nis);
		echo json_encode($data);
	}

	function simpan()
	{
		$nis = htmlentities($this->input->post('nis'));
		$nama = htmlentities($this->input->post('nama'));
		$kelas = htmlentities($this->input->post('kelas'));
		$jurusan = htmlentities($this->input->post('jurusan'));
		$password = password_hash($this->input->post('nis'), PASSWORD_DEFAULT);
		$data = $this->m_siswa->simpan($nis, $nama, $kelas, $jurusan, $password);
		echo json_encode($data);
	}

	function update()
	{
		$nis = $this->input->post('nis_edit');
		$nama = htmlentities($this->input->post('nama_edit'));
		$kelas = htmlentities($this->input->post('kelas_edit'));
		$jurusan = htmlentities($this->input->post('jurusan_edit'));
		$data = $this->m_siswa->update($nis, $nama, $kelas, $jurusan);
		echo json_encode($data);
	}

	function hapus()
	{
		$nis = $this->input->post('nis');
		$data = $this->m_siswa->hapus($nis);
		echo json_encode($data);
	}
}
