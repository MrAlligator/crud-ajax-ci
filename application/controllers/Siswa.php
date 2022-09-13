<?php
require('./vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Siswa extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_siswa');
		isLoggedIn();
		$this->load->library('pdf');
	}

	function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['user_username' => $this->session->userdata('username')])->row_array();
		$data['siswa'] = $this->db->get_where('tbl_siswa', ['siswa_nis' => $this->session->userdata('username')])->row_array();
		$this->load->view('v_siswa', $data);
	}

	function data_siswa()
	{
		$data = $this->m_siswa->siswa_list();
		echo json_encode($data);
	}

	function get_siswa()
	{
		isAdmin();

		$nis = $this->input->get('nis');
		$data = $this->m_siswa->get_siswa_by_id($nis);
		echo json_encode($data);
	}

	function simpan()
	{
		isAdmin();

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
		isAdmin();

		$nis = $this->input->post('nis_edit');
		$nama = htmlentities($this->input->post('nama_edit'));
		$kelas = htmlentities($this->input->post('kelas_edit'));
		$jurusan = htmlentities($this->input->post('jurusan_edit'));
		$data = $this->m_siswa->update($nis, $nama, $kelas, $jurusan);
		echo json_encode($data);
	}

	function hapus()
	{
		isAdmin();

		$nis = $this->input->post('nis');
		$data = $this->m_siswa->hapus($nis);
		echo json_encode($data);
	}

	function export()
	{
		$getAll = $this->m_siswa->siswa_list();

		$spreadsheet = new Spreadsheet;

		$spreadsheet->setActiveSheetIndex(0)
			->setCellValue('A1', 'No')
			->setCellValue('B1', 'NIS')
			->setCellValue('C1', 'Nama')
			->setCellValue('D1', 'Kelas')
			->setCellValue('E1', 'Jurusan');

		$kolom = 2;
		$nomor = 1;
		foreach ($getAll as $get) {

			$spreadsheet->setActiveSheetIndex(0)
				->setCellValue('A' . $kolom, $nomor)
				->setCellValue('B' . $kolom, $get->siswa_nis)
				->setCellValue('C' . $kolom, $get->siswa_nama)
				->setCellValue('D' . $kolom, $get->siswa_kelas)
				->setCellValue('E' . $kolom, $get->siswa_jurusan);

			$kolom++;
			$nomor++;
		}

		$writer = new Xlsx($spreadsheet);

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="Data Siswa.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	function export_pdf()
	{
		$pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 16);
		$pdf->Cell(190, 7, 'DATA SISWA', 0, 1, 'C');
		$pdf->Cell(10, 7, '', 0, 1);
		$pdf->SetFont('Arial', 'B', 10);
		$pdf->Cell(20, 6, 'NIS', 1, 0);
		$pdf->Cell(85, 6, 'Nama', 1, 0);
		$pdf->Cell(27, 6, 'Kelas', 1, 0);
		$pdf->Cell(25, 6, 'Jurusan', 1, 1);
		$pdf->SetFont('Arial', '', 10);
		$siswa = $this->m_siswa->siswa_list();
		foreach ($siswa as $row) {
			$pdf->Cell(20, 6, $row->siswa_nis, 1, 0);
			$pdf->Cell(85, 6, $row->siswa_nama, 1, 0);
			$pdf->Cell(27, 6, $row->siswa_kelas, 1, 0);
			$pdf->Cell(25, 6, $row->siswa_jurusan, 1, 1);
		}
		$pdf->Output();
	}
}
