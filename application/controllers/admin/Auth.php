<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/M_auth');
    }

    /** ============================== LOGIN ============================== */
    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('admin/dashboard');
        }

        /** Form Validation */
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Kolom ini harus diisi',
            'valid_email' => 'Email yang anda masukkan tidak valid'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required', [
            'required' => 'Kolom ini harus diisi',
        ]);

        if ($this->form_validation->run() == false) {

            $data['title'] = 'SPK-BP | Login';
            $this->load->view('admin/template_adm/auth_header', $data);
            $this->load->view('admin/auth/v_login');
            $this->load->view('admin/template_adm/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email'));
        $password = htmlspecialchars($this->input->post('password'));
        // $user = $this->M_auth->data_usr($email)->row_array();
        $user = $this->db->get_where('user', [
            'email' => $email
        ])->row_array();

        if ($user) {
            if ($user['status'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'id_akses' => $user['id_akses']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['id_akses'] == "1" || $user['id_akses'] == "2" || $user['id_akses'] == "3") {
                        $this->session->set_flashdata('message', 'isLogin');
                        redirect('admin/dashboard');
                    }
                } else {
                    $this->session->set_flashdata('message', 'isWrong');
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('message', 'nonActive');
                redirect('admin/auth');
            }
        } else {
            $this->session->set_flashdata('message', 'notReg');
            redirect('admin/auth');
        }
    }

    public function register()
    {
        if ($this->session->userdata('email')) {
            redirect('admin/dashboard');
        }

        /** Form Validation */
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[user.email]', [
            'required' => 'Kolom ini harus diisi',
            'valid_email' => 'Email yang anda masukkan tidak valid',
            'is_unique' => 'Email sudah terdaftar pada akun lain'
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Kolom ini harus diisi'
        ]);

        $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|matches[password1]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password terlalu pendek, minimal 8 karakter',
            'matches' => ''
        ]);

        $this->form_validation->set_rules('password1', 'Password1', 'trim|required|min_length[8]|matches[password]', [
            'required' => 'Kolom ini harus diisi',
            'min_length' => 'Password terlalu pendek, minimal 8 karakter',
            'matches' => 'Password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            /** Alert */
            $this->session->set_flashdata('message', 'warning');

            $data['title'] = 'SPK-BP | Register';
            $this->load->view('admin/template_adm/auth_header', $data);
            $this->load->view('admin/auth/v_register');
            $this->load->view('admin/template_adm/auth_footer');
        } else {
            /** Perikasa apakah ada data di tabel */
            $countData = $this->M_auth->iduser()->num_rows();

            /** Ambil id terakhir */
            $getID = $this->M_auth->iduser()->row_array();

            /** Membuat uniq id */
            if ($countData > 0) {
                $id_usr = autonumber($getID['id_user'], 3, 12);
            } else {
                $id_usr = "USR000000000001";
            }

            /** Insert data ke tabel user */
            $dt_user = [
                'id_user' => $id_usr,
                'nama' => htmlspecialchars($this->input->post('nama')),
                'email' => htmlspecialchars($this->input->post('email')),
                'password' => password_hash(htmlspecialchars($this->input->post('password1')), PASSWORD_DEFAULT),
                'id_akses' => 3,
                'status' => 1
            ];

            $this->M_auth->insertuser($dt_user);
            $this->session->set_flashdata('message', 'isReg');
            redirect('admin/auth');
        }
    }

    public function forget()
    {
        $data['title'] = 'SPK-BP | Forget';
        $this->load->view('admin/template_adm/auth_header', $data);
        $this->load->view('admin/auth/v_forget');
        $this->load->view('admin/template_adm/auth_footer');
    }

    public function recover()
    {
        $data['title'] = 'SPK-BP | Recover';
        $this->load->view('admin/template_adm/auth_header', $data);
        $this->load->view('admin/auth/v_recover');
        $this->load->view('admin/template_adm/auth_footer');
    }


    /** ============================== LOG OUT ============================== */
    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->set_flashdata('message', 'logout');
        redirect('admin/auth');
    }
}
