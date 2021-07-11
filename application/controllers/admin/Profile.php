<?php

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation', 'upload');
        $this->load->model('admin/M_crud');
    }

    function index()
    {

        $data['user'] = $this->M_crud->getIds('user', 'id_user')->result();

            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_edit_profile', $data);
            $this->load->view('admin/template_adm/footer');
    }

    function edit_profil()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->M_crud->edit($email)->result_array();
        $data['title'] = "Edit Profil";
        
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_edit_profile', $data);
        $this->load->view('admin/template_adm/footer');
    }
    
    function update_profil()
    {
        $id_user = $this->input->post('id_user');
        //rules
        $data['title'] = "Edit Profil";
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');
        $this->form_validation->set_message('valid_email', 'Maaf, {field} harus sesuai format');
        ;
        //wadah pesan
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');
        //cek inputan sesuai rules atau tak?
        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('pesan', '
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Maaf!</strong> Mohon periksa form masukan anda
                <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            ');
            $where = array('id_user' => $id_user);
            $data['user'] = $this->M_crud->edit2($where, 'user');
            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_edit_profile', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            
            $upload_image = $_FILES['foto']['name'];
            
            if ($upload_image) {
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = '5000';
                $config['upload_path'] = './assets/dist/img/user/';
                
                $this->upload->initialize($config);

                $user['user']= $this->db->get_where('user', ['id_user' => $id_user])->row_array();
                
                if ($this->upload->do_upload('foto')) {
                    $old_image = $user['user']['foto'];
                    if ($old_image != 'default.png') {
                        unlink(FCPATH . 'assets/dist/img/user/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    $this->session->set_flashdata('pesan', '
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data foto.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    ');
                    redirect("admin/profile/edit_profil/$id_user");
                }
            }

            $where = array(
                'id_user' => $id_user
            );
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'time_in_usr' => date('Y-m-d H:i:s')
            );
            
            $get = $this->db->get_where('user', $where)->row();
            unlink(FCPATH . 'assets/dist/img/user/' . $get->foto);

            $this->M_crud->update($where, $data, 'user');
            if ($this->db->affected_rows() == true) {
                $this->session->set_flashdata(
                    'pesan',
                    '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat!</strong> Anda berhasil mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>'
                );
                redirect("admin/profile/edit_profil/$id_user");
            } else {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Anda gagal mengubah data.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect("admin/profile/edit_profil/$id_user");
            }
        }
        // }
    }

    function ubah_password()
    {
        $email = $this->session->userdata('email');
        $data['user'] = $this->M_crud->edit($email)->result_array();
        $data['title'] = "Ubah Password";
        
        $this->load->view('admin/template_adm/header', $data);
        $this->load->view('admin/template_adm/navbar');
        $this->load->view('admin/template_adm/sidebar');
        $this->load->view('admin/v_ubah_password', $data);
        $this->load->view('admin/template_adm/footer');
    }

    function changePassword()
    {

        // $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title']= 'Edit Password';

        //set rules
        $this->form_validation->set_rules('password_sekarang', 'Password Sekarang', 'required|trim');
        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|trim|min_length[8]|matches[password_baru2]');
        $this->form_validation->set_rules('password_baru2', 'Ketik Ulang Password Baru', 'required|trim|matches[password_baru]');

        //set pesan
        $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');
        $this->form_validation->set_message('min_length', 'Mohon maaf, Masukan {field} minimum {param} karakter');
        $this->form_validation->set_message('matches', 'Mohon maaf, {field} tidak cocok dengan {param}');

        //wadah pesan
        $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/template_adm/header', $data);
            $this->load->view('admin/template_adm/navbar');
            $this->load->view('admin/template_adm/sidebar');
            $this->load->view('admin/v_ubah_password', $data);
            $this->load->view('admin/template_adm/footer');
        } else {
            $password_sekarang = $this->input->post('password_sekarang');
            $password_baru = $this->input->post('password_baru');
            $password_baru2 = $this->input->post('password_baru2');
            if (!password_verify($password_sekarang, $user['password'])) {
                $this->session->set_flashdata('pesan', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Maaf!</strong> Password lama yang dimasukkan salah.
                    <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                ');
                redirect('admin/profile/changePassword');
            } else {
                if ($password_sekarang == $password_baru) {
                    $this->session->set_flashdata('pesan', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Password lama dan password baru sama!
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                ');
                    redirect('admin/profile/changePassword');
                } else if ($password_baru != $password_baru2) {
                    $this->session->set_flashdata('pesan', '
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Maaf!</strong> Password Baru anda tidak sama!
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                ');
                    redirect('admin/profile/changePassword');
                } else {
                    $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);
                    
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $data = $this->session->set_flashdata('pesan', '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Selamat!</strong> password berhasil diubah, silahkan login!
                        <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                ');
                    $this->session->sess_destroy(); //menghentikan semua sesion
		            redirect(base_url('admin/auth', $data)); // diarahkan ke form login
                }
            }
        }
    }

    // function changed()
    // {
    //     $id_user = $this->input->post('id_user');
    //     //rules
    //     $this->form_validation->set_rules('password', 'Password', 'required');

    //     //custom pesan
    //     $this->form_validation->set_message('required', 'Maaf, {field} harus terisi');

    //     //wadah pesan
    //     $this->form_validation->set_error_delimiters('<div class="text-center"><span class="badge badge-danger text-white mt-2 px-4">', '</span></div>');
    //     //cek inputan sesuai rules atau tak?
    //     if ($this->form_validation->run() == false) {
    //         $this->session->set_flashdata('pesan', '
    //         <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //             <strong>Maaf!</strong> Mohon periksa form masukan anda
    //             <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
    //             <span aria-hidden="true">&times;</span>
    //             </button>
    //         </div>
    //         ');
    //         $where = array('id_user' => $id_user);
    //         $data['user'] = $this->M_crud->edit($where, 'user')->result();
    //         $this->load->view('admin/template_adm/header', $data);
    //         $this->load->view('admin/template_adm/navbar');
    //         $this->load->view('admin/template_adm/sidebar');
    //         $this->load->view('admin/v_ubah_password', $data);
    //         $this->load->view('admin/template_adm/footer');
    //     } else {
    //         $where = array(
    //             'id_user' => $id_user
    //         );
    //         $data = array(
    //             'nama' => $this->input->post('nama'),
    //             'email' => $this->input->post('email'),
    //             'password' => $this->input->post('password')
    //         );
    //         $this->M_crud->update($where, $data, 'user');
    //         if ($this->db->affected_rows() == true) {
    //             $this->session->set_flashdata(
    //                 'pesan',
    //                 '<div class="alert alert-success alert-dismissible fade show" role="alert">
    //                 <strong>Selamat!</strong> Password berhasil diubah.
    //                 <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
    //                 <span aria-hidden="true">&times;</span>
    //                 </button>
    //             </div>'
    //             );
    //             redirect("admin/profile/change_password/$id_user");
    //         } else {
    //             $this->session->set_flashdata('pesan', '
    //             <div class="alert alert-danger alert-dismissible fade show" role="alert">
    //                 <strong>Maaf!</strong> Password gagal diubah.
    //                 <button type="button" class="close py-auto" data-dismiss="alert" aria-label="Close">
    //                 <span aria-hidden="true">&times;</span>
    //                 </button>
    //             </div>
    //             ');
    //             redirect("admin/profile/change_password/$id_user");
    //         }
    //     }
    // }









}