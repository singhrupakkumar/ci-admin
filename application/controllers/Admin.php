<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Admin extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
         
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('user'); 
        $this->load->model('order');
         
        // User login status 
        $this->isAdminLoggedIn = $this->session->userdata('isAdminLoggedIn'); 
    } 
     
    public function index(){ 
        if($this->isAdminLoggedIn){ 
            redirect('users/settings'); 
        }else{ 
            redirect('admin/login'); 
        } 
    } 

    public function customers(){ 
        $data = array(); 
        if($this->isAdminLoggedIn){ 

            $con1 = array( 
                'returnType'=>'array'
                //'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->user->getRows($con1); 
            // Pass the user data and load view 
            $this->load->view('admin/elements/header', $data); 
            $this->load->view('admin/customers', $data); 
            $this->load->view('admin/elements/footer'); 
        }else{ 
            redirect('admin/login'); 
        } 
    }		public function reject(){         $data = array();         if($this->isAdminLoggedIn){ 			if(isset($_GET['order_id'])){				$this->db->where('id', $_GET['order_id']);                $this->db->update('orders', array('status'=>2));  			}						$this->session->set_userdata('success_msg', 'Order status updated.');             redirect('admin/orders'); 			        }else{             redirect('admin/login');         }     }		public function approval(){         $data = array();         if($this->isAdminLoggedIn){ 			if(isset($_GET['user_id'])){				$this->db->where('id', $_GET['user_id']);                $this->db->update('customers', array('status'=>1));  			}						$this->session->set_userdata('success_msg', 'Account approved.');             redirect('admin/customers'); 			        }else{             redirect('admin/login');         }     }

    public function login(){ 
        $data = array(); 
         
        // Get messages from the session 
        if($this->session->userdata('success_msg')){ 
            $data['success_msg'] = $this->session->userdata('success_msg'); 
            $this->session->unset_userdata('success_msg'); 
        } 
        if($this->session->userdata('error_msg')){ 
            $data['error_msg'] = $this->session->userdata('error_msg'); 
            $this->session->unset_userdata('error_msg'); 
        } 
         
        // If login request submitted 
        if($this->input->post('loginSubmit')){ 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
             
            if($this->form_validation->run() == true){ 
                $con = array( 
                    'returnType' => 'single', 
                    'conditions' => array( 
                        'email'=> $this->input->post('email'), 
                        'password' => md5($this->input->post('password')), 
                        'status' => 1,
                        'role'=>'admin' 
                    ) 
                ); 
                $checkLogin = $this->user->getRows($con); 
                if($checkLogin){ 
                    $this->session->set_userdata('isAdminLoggedIn', TRUE); 
                    $this->session->set_userdata('userId', $checkLogin['id']);
                    $this->session->set_userdata('user', $checkLogin); 
                    redirect('admin/settings/'); 
                }else{ 
                    $data['error_msg'] = 'Wrong email or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Load view 
       // $this->load->view('elements/header', $data); 
        $this->load->view('admin/login', $data); 
        $this->load->view('elements/footer'); 
    }

    public function orders(){ 
        $data = array(); 
        if($this->isAdminLoggedIn){


            if(isset($_POST['order_id'])){
                  $config['upload_path']   = './uploads/'; 
                 $config['allowed_types'] = 'gif|jpg|png'; 
                 $config['max_size']      = 10000; 
                 $config['max_width']     = 20240; 
                 $config['max_height']    = 17680;   
                 $this->load->library('upload', $config);
                    
                 if ( ! $this->upload->do_upload('admin_attachment')) {
                    $error = array('error' => $this->upload->display_errors()); 
                      print_r($error);
                  exit;
                    //$this->load->view('upload_form', $error); 
                 }
                    
                 else { 
                    $datafile = array('upload_data' => $this->upload->data()); 
                    $updateData['admin_attachment'] = $datafile['upload_data']['file_name'];
					$updateData['status'] = 3;
                     $this->db->where('id', $_POST['order_id']);
                    $this->db->update('orders', $updateData);  
					
					//update settings qty
					
				  $this->db->select('unit'); 
                  $this->db->from('orders');
                  $this->db->where('id', $_POST['order_id']);
                  $query5 = $this->db->get(); 
                  $orderUnit = $query5->row_array();
					
				  $this->db->select('value'); 
                  $this->db->from('settings');
                  $this->db->where('meta_key','available_unit'); 
                  $query2 = $this->db->get(); 
                  $available_unitresult = $query2->row_array(); 
				  $currentUnt = isset($available_unitresult['value'])?$available_unitresult['value']:0;
				   
				   $updateUnit = $currentUnt - $orderUnit['unit'];
				  
					$updatesetting['value'] = $updateUnit;
                    $this->db->where('meta_key','available_unit');
                    $this->db->update('settings', $updatesetting);
					
                 }
            }
              


            $con1 = array( 
                'returnType'=>'array'
                //'id' => $this->session->userdata('userId') 
            ); 
            $data['order'] = $this->order->getRows($con1); 
            // Pass the user data and load view 
            $this->load->view('admin/elements/header', $data); 
            $this->load->view('admin/orders', $data);   
            $this->load->view('admin/elements/footer'); 
        }else{ 
            redirect('admin/login'); 
        } 
    }
 
    public function settings(){ 
         if($this->isAdminLoggedIn){ 
        $data = array(); 

           if($this->input->post('submit')){
            foreach($_POST as $key=>$value)
            {
              //echo "$key=$value";
              $idata = [];
              $idata['meta_key']=$key;
              $idata['value']=$value;
            $this->db->where('meta_key',$key);
            $q = $this->db->get('settings');
            $this->db->reset_query();
                
            if ( $q->num_rows() > 0 ) 
            {
                $this->db->where('meta_key',$key)->update('settings', $idata);
            } else {
                $idata['created_at']=date('Y-m-d H:i:s');
             
                $this->db->insert('settings', $idata);
            }



            }
        }


         $fields = [

                    [
                        'name'          =>  'buy',
                        'type'          =>  'text',
                        'label'         =>  'Buy',
                        'placeholder'   =>  'Buy'
                    ],
                    [
                        'name'          =>  'available_unit',
                        'type'          =>  'number',
                        'label'         =>  'Available Unit',
                        'placeholder'   =>  'Available Unit'
                    ],
                    [
                        'name'          =>  'sell',
                        'type'          =>  'text',
                        'label'         =>  'Sell',
                        'placeholder'   =>  'Sell'
                    ],
                    [
                        'name'          =>  'bank_acc1',
                        'type'          =>  'text',
                        'label'         =>  'Bank Account 1',
                        'placeholder'   =>  'Bank Account 1'
                    ],
                    [
                        'name'          =>  'bank_acc2',
                        'type'          =>  'text',
                        'label'         =>  'Bank Account 2',
                        'placeholder'   =>  'Bank Account 2'
                    ],
                    [
                        'name'          =>  'bank_acc3',
                        'type'          =>  'text',
                        'label'         =>  'Bank Account 3',
                        'placeholder'   =>  'Bank Account 3'
                    ],
                    [
                        'name'          =>  'wallet_link1',
                        'type'          =>  'url',
                        'label'         =>  'Wallet Link 1',
                        'placeholder'   =>  'Wallet Link 1'
                    ],
                    [
                        'name'          =>  'wallet_link2',
                        'type'          =>  'url',
                        'label'         =>  'Wallet Link 2',
                        'placeholder'   =>  'Wallet Link 2'
                    ],
                    [
                        'name'          =>  'wallet_link3',
                        'type'          =>  'url',
                        'label'         =>  'Wallet Link 3',
                        'placeholder'   =>  'Wallet Link 3'
                    ],
       
        ];

        
        foreach ($fields as $key => $value) {
         $this->db->select('*'); 
         $this->db->from('settings');
         $this->db->where('meta_key',$value['name']); 
         $query = $this->db->get(); 
         $result = $query->row_array(); 
         $fields[$key]['value'] = isset($result['value'])?$result['value']:'';
        }

        $data['fields'] = $fields;
            // Pass the user data and load view 
        $this->load->view('admin/elements/header'); 
        $this->load->view('admin/settings', $data); 
        $this->load->view('admin/elements/footer');

        }else{ 
            redirect('admin/login'); 
        } 
      
    } 
 
    public function registration(){ 
        $data = $userData = array(); 
         
        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('first_name', 'First Name', 'required'); 
            $this->form_validation->set_rules('last_name', 'Last Name', 'required'); 
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
            $userData = array( 
                'first_name' => strip_tags($this->input->post('first_name')), 
                'last_name' => strip_tags($this->input->post('last_name')), 
                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                'gender' => $this->input->post('gender'), 
                'phone' => strip_tags($this->input->post('phone')) 
            ); 
 
            if($this->form_validation->run() == true){ 
                $insert = $this->user->insert($userData); 
                if($insert){ 
                    $this->session->set_userdata('success_msg', 'Your account registration has been successful. Please login to your account.'); 
                    redirect('users/login'); 
                }else{ 
                    $data['error_msg'] = 'Some problems occured, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Posted data 
        $data['user'] = $userData; 
         
        // Load view 
        $this->load->view('elements/header', $data); 
        $this->load->view('users/registration', $data); 
        $this->load->view('elements/footer'); 
    } 
     
    public function logout(){ 
        $this->session->unset_userdata('isAdminLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('admin/login/'); 
    } 
      
}