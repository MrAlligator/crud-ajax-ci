<?php
class M_siswa extends CI_Model
{

	function siswa_list()
	{
		$hasil = $this->db->query("SELECT * FROM tbl_siswa");
		return $hasil->result();
	}

	function simpan($nis, $nama, $kelas, $jurusan, $password)
	{
		$hasil = $this->db->query("INSERT INTO tbl_siswa (siswa_nis, siswa_nama, siswa_kelas, siswa_jurusan, siswa_password)VALUES('$nis', '$nama', '$kelas', '$jurusan', '$password')");
		return $hasil;
	}

	function get_siswa_by_id($nis)
	{
		$query = $this->db->query("SELECT * FROM tbl_siswa WHERE siswa_nis='$nis'");
		if ($query->num_rows() > 0) {
			foreach ($query->result() as $data) {
				$hasil = array(
					'siswa_nis' => $data->siswa_nis,
					'siswa_nama' => $data->siswa_nama,
					'siswa_kelas' => $data->siswa_kelas,
					'siswa_jurusan' => $data->siswa_jurusan
				);
			}
		}
		return $hasil;
	}

	function update($nis, $nama, $kelas, $jurusan)
	{
		$hasil = $this->db->query("UPDATE tbl_siswa SET siswa_nama='$nama', siswa_kelas='$kelas', siswa_jurusan='$jurusan' WHERE siswa_nis='$nis'");
		return $hasil;
	}

	function hapus($nis)
	{
		$hasil = $this->db->query("DELETE FROM tbl_siswa WHERE siswa_nis='$nis'");
		return $hasil;
	}
}
