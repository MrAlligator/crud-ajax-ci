<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Login | CRUD Siswa";

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);

        if (isset($_SESSION['username'])) {
            redirect('siswa');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login', $data);
            } else {
                $this->_loginAdmin();
            }
        }
    }

    private function _loginAdmin()
    {
        //Load
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('tbl_user', ['user_username' => $username])->row_array();
        $nis = $this->db->get_where('tbl_siswa', ['siswa_nis' => $username])->row_array();

        //Execution
        //Cek User
        if ($user) {
            //Cek Password
            if (password_verify($password, $user['user_password'])) {
                //data yang akan dimasukkan session
                $data = [
                    'username' => $user['user_username'],
                    'user_id' => $user['user_id'],
                    'name' => $user['user_name'],
                    'level' => $user['user_level']
                ];
                $this->session->set_userdata($data); //menyimpan data ke dalam session
                redirect('siswa');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        //menghapus session
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('level');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Sudah Logout</div>');
        redirect('auth');
    }

    public function forbidden()
    {
        $data['title'] = '403 Forbidden';

        $this->load->view('403', $data);
    }

    public function siswa_login()
    {
        $data['title'] = "Login | CRUD Siswa";

        $this->form_validation->set_rules('username', 'Username', 'required|trim', [
            'required' => 'Username Tidak Boleh Kosong!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Password Tidak Boleh Kosong!'
        ]);

        if (isset($_SESSION['username'])) {
            redirect('siswa');
        } else {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('login-siswa', $data);
            } else {
                $this->_loginSiswa();
            }
        }
    }

    private function _loginSiswa()
    {
        //Load
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nis = $this->db->get_where('tbl_siswa', ['siswa_nis' => $username])->row_array();

        //Execution
        //Cek User
        if ($nis) {
            //Cek Password
            if (password_verify($password, $nis['siswa_password'])) {
                //data yang akan dimasukkan session
                $data = [
                    'username' => $nis['siswa_nis'],
                    'user_id' => $nis['siswa_id'],
                    'name' => $nis['siswa_nama'],
                    'level' => $nis['siswa_level']
                ];
                $this->session->set_userdata($data); //menyimpan data ke dalam session
                redirect('siswa');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Login Gagal, Silahkan Coba Lagi</div>');
            redirect('auth');
        }
    }
}
