<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_user');
        notLogin();
        cekadm();
    }

    /** ================================ HAK AKSES ================================ */
    public function index()
    {
        $data['title'] = 'SPK-BP | Hak Akses';
        $data['judul'] = 'Hak Akses';

        /** Menampilkan data hak akses */
        $data['hak_akses'] = $this->M_user->getacs()->result_array();

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_hak_akses', $data);
        $this->load->view('admin/template_adm/footer');
    }

    public function tbh_hakAkses()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_acs', 'Nm_acs', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Hak Akses';
            $data['judul'] = 'Hak Akses';

            /** Menampilkan data hak akses */
            $data['hak_akses'] = $this->M_user->getacs()->result_array();

            /** Alert validasi salah */
            $this->session->set_flashdata('message', 'warning');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_hak_akses', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel kriteria */
            $dt_acs = [
                'nm_akses' => htmlspecialchars($this->input->post('nm_acs'))
            ];

            $this->M_user->insertacs($dt_acs);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/user');
        }
    }

    public function edit_hakAkses()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_acs1', 'Nm_acs', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Hak Akses';
            $data['judul'] = 'Hak Akses';

            /** Menampilkan data hak akses */
            $data['hak_akses'] = $this->M_user->getacs()->result_array();

            /** Alert validasi salah */
            $this->session->set_flashdata('message', 'warning');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_hak_akses', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            $id_acs = $this->input->post('id_acs1');

            /** Edit data tabel hak akses */
            $dt_acs = [
                'nm_akses' => htmlspecialchars($this->input->post('nm_acs1'))
            ];

            $this->M_user->updateacs($dt_acs, $id_acs);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/user');
        }
    }

    public function del_hakAkses()
    {
        /** Menghapus data tabel kecamatan */
        $id_acs = $this->input->post('id_acs');
        $this->M_user->deleteacs($id_acs);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/user');
    }


    /** ================================ PETUGAS DINAS ================================ */
    public function petugas_dinas()
    {
        $data['title'] = 'SPK-BP | Petugas Dinas';
        $data['judul'] = 'Petugas Dinas';

        $id_akses = 2;

        /** Mengambil data user */
        $data['petugas'] = $this->M_user->getuser($id_akses)->result_array();

        /** Perikasa apakah ada data di tabel */
        $countData = $this->M_user->idusr()->num_rows();

        /** Ambil id terakhir */
        $getID = $this->M_user->idusr()->row_array();

        /** Membuat uniq id */
        if ($countData > 0) {
            $id_usr = autonumber($getID['id_user'], 3, 12);
        } else {
            $id_usr = "USR000000000001";
        }

        /** Mengirim id ke view */
        $data['id_usr'] = $id_usr;

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_petugas', $data);
        $this->load->view('admin/template_adm/footer');
    }

    public function tbh_petugas()
    {
        /** Validasi form */
        $this->form_validation->set_rules('nm_ptgs', 'Nm_ptgs', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        $this->form_validation->set_rules('em_ptgs', 'Em_ptgs', 'trim|required|valid_email|is_unique[user.email]', [
            'required' => 'Kolom ini wajib diisi',
            'valid_email' => 'Email yang anda masukkan tidak valid',
            'is_unique' => 'Email sudah terdaftar pada akun lain'
        ]);

        $this->form_validation->set_rules('psw_ptgs', 'Psw', 'trim|required|min_length[8]|matches[psw_ptgs1]', [
            'required' => 'Kolom ini wajib diisi',
            'min_length' => 'Password terlalu pendek, minimal 8 karakter',
            'matches' => ''
        ]);

        $this->form_validation->set_rules('psw_ptgs1', 'Psw1', 'trim|required|min_length[8]|matches[psw_ptgs]', [
            'required' => 'Kolom ini wajib diisi',
            'min_length' => 'Password terlalu pendek, minimal 8 karakter',
            'matches' => 'Password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Petugas Dinas';
            $data['judul'] = 'Petugas Dinas';

            $id_akses = 2;

            /** Mengambil data user */
            $data['petugas'] = $this->M_user->getuser($id_akses)->result_array();

            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_user->idusr()->num_rows();

            /** Ambil id terakhir */
            $getID = $this->M_user->idusr()->row_array();

            /** Membuat uniq id */
            if ($countData > 0) {
                $id_usr = autonumber($getID['id_user'], 3, 12);
            } else {
                $id_usr = "USR000000000001";
            }

            /** Mengirim id ke view */
            $data['id_usr'] = $id_usr;

            /** Alert validasi salah */
            $this->session->set_flashdata('message', 'warning');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_petugas', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel user */
            $dt_ptgs = [
                'id_user' => $this->input->post('id_ptgs'),
                'nama' => htmlspecialchars($this->input->post('nm_ptgs')),
                'email' => htmlspecialchars($this->input->post('em_ptgs')),
                'password' => password_hash(htmlspecialchars($this->input->post('psw_ptgs1')), PASSWORD_DEFAULT),
                'id_akses' => 2,
                'status' => 0
            ];

            $this->M_user->insertptgs($dt_ptgs);
            $this->session->set_flashdata('message', 'add');
            redirect('admin/user/petugas_dinas');
        }
    }

    public function edit_petugas()
    {
        /** Validasi form */
        $email = $this->input->post('em_ptgs1');
        $param_email = $this->input->post('param_email');
        $psw1 = $this->input->post('psw_ptgs1');
        $psw2 = $this->input->post('psw_ptgs2');

        $this->form_validation->set_rules('nm_ptgs1', 'Nm_ptgs', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($email != $param_email) {
            $this->form_validation->set_rules('em_ptgs1', 'Em_ptgs', 'trim|required|valid_email|is_unique[user.email]', [
                'required' => 'Kolom ini wajib diisi',
                'valid_email' => 'Email yang anda masukkan tidak valid',
                'is_unique' => 'Email sudah terdaftar pada akun lain'
            ]);
        } else {
        }

        if ($psw1 != "" && $psw2 != "") {
            $this->form_validation->set_rules('psw_ptgs1', 'Psw1', 'trim|required|min_length[8]|matches[psw_ptgs2]', [
                'required' => 'Kolom ini wajib diisi',
                'min_length' => 'Password terlalu pendek, minimal 8 karakter',
                'matches' => ''
            ]);

            $this->form_validation->set_rules('psw_ptgs2', 'Psw2', 'trim|required|min_length[8]|matches[psw_ptgs1]', [
                'required' => 'Kolom ini wajib diisi',
                'min_length' => 'Password terlalu pendek, minimal 8 karakter',
                'matches' => 'Password tidak sama'
            ]);
        } else {
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | Petugas Dinas';
            $data['judul'] = 'Petugas Dinas';

            $id_akses = 2;

            /** Mengambil data user */
            $data['petugas'] = $this->M_user->getuser($id_akses)->result_array();

            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_user->idusr()->num_rows();

            /** Ambil id terakhir */
            $getID = $this->M_user->idusr()->row_array();

            /** Membuat uniq id */
            if ($countData > 0) {
                $id_usr = autonumber($getID['id_user'], 3, 12);
            } else {
                $id_usr = "USR000000000001";
            }

            /** Mengirim id ke view */
            $data['id_usr'] = $id_usr;

            /** Alert validasi salah */
            $this->session->set_flashdata('message', 'warning');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_petugas', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel user */
            $id_user = $this->input->post('id_ptgs1');
            $email = $this->input->post('em_ptgs1');
            $param_email = $this->input->post('param_email');
            $psw1 = $this->input->post('psw_ptgs1');
            $psw2 = $this->input->post('psw_ptgs2');

            if ($psw1 == "" && $psw2 == "" && $email == $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_ptgs1'))
                ];
            } else if ($psw1 != "" && $psw2 != "" && $email != $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_ptgs1')),
                    'email' => htmlspecialchars($this->input->post('em_ptgs1')),
                    'password' => password_hash(htmlspecialchars($this->input->post('psw_ptgs2')), PASSWORD_DEFAULT)
                ];
            } else if ($psw1 != "" && $psw2 != "" && $email == $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_ptgs1')),
                    'password' => password_hash(htmlspecialchars($this->input->post('psw_ptgs2')), PASSWORD_DEFAULT)
                ];
            } else if ($psw1 == "" && $psw2 == "" && $email != $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_ptgs1')),
                    'email' => htmlspecialchars($this->input->post('em_ptgs1'))
                ];
            }

            $this->M_user->updateuser($dt_user, $id_user);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/user/petugas_dinas');
        }
    }

    public function del_petugas()
    {
        /** Menghapus data tabel kecamatan */
        $id_user = $this->input->post('id_ptgs');
        $this->M_user->deleteuser($id_user);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/user/petugas_dinas');
    }

    public function dis_petugas()
    {
        /** Menonaktifkan akun user */
        $id_user = $this->input->post('id_ptgs');
        $this->M_user->disabled($id_user);
        $this->session->set_flashdata('message', 'disable');
        redirect('admin/user/petugas_dinas');
    }

    public function en_petugas()
    {
        /** Mengaktifkan akun user */
        $id_user = $this->input->post('id_ptgs');
        $this->M_user->enabled($id_user);
        $this->session->set_flashdata('message', 'enable');
        redirect('admin/user/petugas_dinas');
    }

    /** ================================ USER UMUM ================================ */
    public function umum()
    {
        $data['title'] = 'SPK-BP | User Umum';
        $data['judul'] = 'User Umum';

        $id_akses = 3;

        /** Mengambil data user */
        $data['umum'] = $this->M_user->getuser($id_akses)->result_array();

        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_umum', $data);
        $this->load->view('admin/template_adm/footer');
    }

    public function edit_umum()
    {
        /** Validasi form */
        $email = $this->input->post('em_umum');
        $param_email = $this->input->post('param_email');
        $psw1 = $this->input->post('psw_umum');
        $psw2 = $this->input->post('psw_umum1');

        $this->form_validation->set_rules('nm_umum', 'Nm_ptgs', 'trim|required', [
            'required' => 'Kolom ini wajib diisi'
        ]);

        if ($email != $param_email) {
            $this->form_validation->set_rules('em_umum', 'Em_ptgs', 'trim|required|valid_email|is_unique[user.email]', [
                'required' => 'Kolom ini wajib diisi',
                'valid_email' => 'Email yang anda masukkan tidak valid',
                'is_unique' => 'Email sudah terdaftar pada akun lain'
            ]);
        } else {
        }

        if ($psw1 != "" && $psw2 != "") {
            $this->form_validation->set_rules('psw_umum', 'Psw1', 'trim|required|min_length[8]|matches[psw_umum1]', [
                'required' => 'Kolom ini wajib diisi',
                'min_length' => 'Password terlalu pendek, minimal 8 karakter',
                'matches' => ''
            ]);

            $this->form_validation->set_rules('psw_umum1', 'Psw2', 'trim|required|min_length[8]|matches[psw_umum]', [
                'required' => 'Kolom ini wajib diisi',
                'min_length' => 'Password terlalu pendek, minimal 8 karakter',
                'matches' => 'Password tidak sama'
            ]);
        } else {
        }

        if ($this->form_validation->run() == false) {
            $data['title'] = 'SPK-BP | User Umum';
            $data['judul'] = 'User Umum';

            $id_akses = 2;

            /** Mengambil data user */
            $data['petugas'] = $this->M_user->getuser($id_akses)->result_array();

            /** Alert validasi salah */
            $this->session->set_flashdata('message', 'warning');

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_petugas', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            /** Menambahkan data ke tabel user */
            $id_user = $this->input->post('id_umum');
            $email = $this->input->post('em_umum');
            $param_email = $this->input->post('param_email');
            $psw = $this->input->post('psw_umum');
            $psw1 = $this->input->post('psw_umum1');

            if ($psw == "" && $psw1 == "" && $email == $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_umum'))
                ];
            } else if ($psw != "" && $psw1 != "" && $email != $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_umum')),
                    'email' => htmlspecialchars($this->input->post('em_umum')),
                    'password' => password_hash(htmlspecialchars($this->input->post('psw_umum1')), PASSWORD_DEFAULT)
                ];
            } else if ($psw != "" && $psw1 != "" && $email == $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_umum')),
                    'password' => password_hash(htmlspecialchars($this->input->post('psw_umum1')), PASSWORD_DEFAULT)
                ];
            } else if ($psw == "" && $psw1 == "" && $email != $param_email) {
                $dt_user = [
                    'nama' => htmlspecialchars($this->input->post('nm_umum')),
                    'email' => htmlspecialchars($this->input->post('em_umum'))
                ];
            }

            $this->M_user->updateuser($dt_user, $id_user);
            $this->session->set_flashdata('message', 'edit');
            redirect('admin/user/umum');
        }
    }

    public function del_umum()
    {
        /** Menghapus data tabel kecamatan */
        $id_user = $this->input->post('id_umum');
        $this->M_user->deleteuser($id_user);
        $this->session->set_flashdata('message', 'delete');
        redirect('admin/user/umum');
    }

    public function dis_umum()
    {
        /** Menonaktifkan akun user */
        $id_user = $this->input->post('id_umum');
        $this->M_user->disabled($id_user);
        $this->session->set_flashdata('message', 'disable');
        redirect('admin/user/umum');
    }

    public function en_umum()
    {
        /** Mengaktifkan akun user */
        $id_user = $this->input->post('id_umum');
        $this->M_user->enabled($id_user);
        $this->session->set_flashdata('message', 'enable');
        redirect('admin/user/umum');
    }
}
