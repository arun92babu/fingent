<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller 
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('login_model','login');
        $this->load->library('account');
        
    }

    public function index()
    {
        if( ! $this->account->isLoggedIn(FALSE))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("uname", "User Name", "trim|required");
            $this->form_validation->set_rules("password", "Password", "trim|required");
            if ($this->form_validation->run() === TRUE)
            {

                if ($this->input->post())
                {
                    $uname = $this->input->post("uname");
                    $password = $this->input->post("password");
                    $user = $this->login->read_user_by_uname($uname);
                    if(! empty($user))
                    {
                        if(($user['username'] == $uname) AND ($user['password'] == md5($password)))
                        {
                            
                            $sessiondata = array(
                                                  'userID'          => $user['loginID'],
                                                  'userName'        => $user['username'],
                                                  'userType'        => $user['typeKey'],
                                                  'isLoggedIn'      => TRUE
                                                );
                            $this->session->set_userdata($sessiondata);

                            redirect(base_url().'dashboard');
                        }else{
                            $this->session->set_flashdata('message', 'Invalid username or password. Please try again');
                            redirect(base_url('login'), 'refresh');
                        }
                    }else{
                        $this->session->set_flashdata('message', 'User does not exist. Please try again');
                        redirect(base_url('login'), 'refresh');
                    }
            
                    
                }
               
            }else{

                $this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
                $this->load->view('login/login',$this->data);
            }
            
        }
        else
        {
            if($this->account->isLoggedIn(TRUE)){
                redirect(base_url().'dashboard');
            }else{
                redirect (base_url('login'));
            }
            
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();

        redirect(base_url().'login');
    }
}