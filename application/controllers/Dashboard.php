<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('dashboard_model','dashboard');
	}	

	/* sale report summary */

	public function index()
	{
		if ($this->account->isLoggedIn())
    	{
           if($this->session->userdata('userType') == 'admin')
    		{
    			$user = 'Organization Admin Panel';
    			$usertype = 'Admin';
    		}
    		$this->data['metadata'] = metadata($user);
    		$this->data['usertype'] = $usertype;
    		$this->data['allemployee'] = $this->dashboard->get_employee();
			$this->load->view('common/header', $this->data);
			$this->load->view('dashboard/dashboard',$this->data);
			$this->load->view('common/footer', $this->data);
		}else{
			redirect (base_url('login'));
		}

	}
    public function upload(){
       if ($this->account->isLoggedIn())
        {
            $this->load->helper('main_helper');
            $count=0;
            $row_count=0;
            $fp = fopen($_FILES['userfile']['tmp_name'],'r');
            while(($data = fgetcsv($fp, 1024, ",")) !== FALSE){
                if(!empty($data[0])){
                    $count++;
                    if($count == 1)continue;
                    ++$row_count;
                }
                
                
            }
            fclose($fp);
            if($row_count <= 20){
                $count=0;
                $flag=0;
                $fp = fopen($_FILES['userfile']['tmp_name'],'r');
                while($csv_line = fgetcsv($fp,1024))
                {

                    if(!empty($csv_line[0]) && !empty($csv_line[1])  && !empty($csv_line[2]) && !empty($csv_line[3]) && !empty($csv_line[4])){
                        $count++;
                        
                        if($count == 1)
                        {
                            continue;
                        }//keep this if condition if you want to remove the first row
                        for($i = 0, $j = count($csv_line); $i < $j; $i++)
                        {
                            $insert_csv = array();
                            $insert_csv['employee_name'] = $csv_line[0];//remove if you want to have primary key,
                            $insert_csv['employee_code'] = $csv_line[1];
                            $insert_csv['departmentname'] = $csv_line[2];
                            $insert_csv['date_of_birth'] = $csv_line[3];
                            $insert_csv['date_of_join'] = $csv_line[4];

                        }
                        $i++;
                        $employeecode='';
                        $checkemployeecode = checkemployeecode($insert_csv['employee_code']);
                        if(empty($checkemployeecode)){
                            $departmentcode = getdepartmentcode($insert_csv['departmentname']);
                            $deptcode='';
                            if(!empty($departmentcode)){
                                $deptcode = $departmentcode[0]['departmentID'];
                                $date_of_birth = date("Y-m-d", strtotime($insert_csv['date_of_birth']));
                                $date_of_join = date("Y-m-d", strtotime($insert_csv['date_of_join']));
                                $insert_data = array(
                                'departmentID' => $deptcode,
                                'employee_code' => $insert_csv['employee_code'],
                                'employee_name' => $insert_csv['employee_name'],
                                'employee_dob' => $date_of_birth,
                                'employee_doj' => $date_of_join,
                               );
                                //print_r($insert_data);die;
                                $result=$this->dashboard->insert('employee', $insert_data);
                                if(empty($result)){
                                    $flag=1;
                                }
                            }else{
                                fclose($fp);
                                $this->session->set_flashdata('error_message', 'The given department does not exist. Please check and try again');
                                redirect(base_url('dashboard'), 'refresh'); 
                            }
                        }else{
                            fclose($fp);
                           $this->session->set_flashdata('error_message', 'The Employee code already exist. Please check and try again');
                            redirect(base_url('dashboard'), 'refresh'); 
                        }
                    }else{
                        fclose($fp);
                        $this->session->set_flashdata('error_message', 'The file contain atleast 5 columns. Please confrim and try again');
                        redirect(base_url('dashboard'), 'refresh');
                    }
                }
                    fclose($fp);
                    if($flag == 0){
                        $this->session->set_flashdata('success_message', 'The file has been uploaded successfully.');
                    }else{
                        $this->session->set_flashdata('error_message', 'The failed to upload file. Please try again');
                    }
                    redirect (base_url('dashboard'), 'refresh');
                    
            }else{
                fclose($fp);
                $this->session->set_flashdata('error_message', 'The employee data must be less than or equal to 20. Please try again');
                redirect (base_url('dashboard'), 'refresh');
            }
            

        }else{
            redirect (base_url('login'));
        }
    }
}

