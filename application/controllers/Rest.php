<?php

defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Rest extends RestController
{

    function __construct()
    {
        parent::__construct();
    }

    function index_get()
    {
        $id = $this->get('siswa_id');
        if ($id == '') {
            $siswa = $this->db->get('tbl_siswa')->result();
        } else {
            $this->db->where('siswa_id', $id);
            $siswa = $this->db->get('tbl_siswa')->result();
        }
        $this->response($siswa, 200);
    }
}
