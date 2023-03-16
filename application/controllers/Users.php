<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
 
class Users extends CI_Controller { 
     
    function __construct() { 
        parent::__construct(); 
        $this->load->helper(array('form', 'url')); 
        // Load form validation ibrary & user model 
        $this->load->library('form_validation'); 
        $this->load->model('user'); 
        $this->load->model('order');
         
        // User login status 
        $this->isUserLoggedIn = $this->session->userdata('isUserLoggedIn'); 
    } 
     
    public function index(){ 
        //if($this->isUserLoggedIn){ 
            redirect('users/account'); 
       // }else{ 
           // redirect('users/login'); 
       // } 
    } 
 
    public function account(){


        if(null !== $this->input->post('orderbtn')){

            if($this->input->post('buyform') ==1){

                $orderData = array( 
                    'user_id' => $this->session->userdata('userId'), 
                    'customer_name' => $this->session->userdata('user')['name'], 
                    'rate' => strip_tags($this->input->post('buy')), 
                    'buy_sell' => 'Buy', 
                    'unit' => $this->input->post('unit'), 
                    'total' => $this->input->post('total'), 
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ); 

            }else{

                 $orderData = array( 
                    'user_id' => $this->session->userdata('userId'), 
                    'customer_name' => $this->session->userdata('user')['name'], 
                    'rate' => strip_tags($this->input->post('sell')), 
                    'buy_sell' => 'Sell', 
                    'unit' => $this->input->post('unit'), 
                    'total' => $this->input->post('total'), 
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'), 
                ); 

            }



             $config['upload_path']   = './uploads/'; 
             $config['allowed_types'] = 'gif|jpg|png'; 
             $config['max_size']      = 10000; 
             $config['max_width']     = 20240; 
             $config['max_height']    = 17680;  
             $this->load->library('upload', $config);
                
             if ( ! $this->upload->do_upload('customer_attachment')) {
                $error = array('error' => $this->upload->display_errors()); 
                  print_r($error);
              exit;
                //$this->load->view('upload_form', $error); 
             }
                
             else { 
                $datafile = array('upload_data' => $this->upload->data()); 
                $orderData['customer_attachment'] = $datafile['upload_data']['file_name'];  
             }
          
             $insert = $this->order->insert($orderData); 
                
            $this->session->set_userdata('success_msg', 'Order save successfully.'); 
            redirect('users/orderhistory'); 
        }

        $data = array(); 
       
            // $con = array( 
            //     'id' => $this->session->userdata('userId') 
            // ); 
            // $data['user'] = $this->user->getRows($con);
             
            // Pass the user data and load view 
            $this->load->view('elements/header', $data); 
            $this->load->view('users/account', $data); 
            $this->load->view('elements/footer'); 
         
    } 

    public function orderhistory(){ 
        $data = array(); 
        if($this->isUserLoggedIn){ 

        	$con = array( 
                'id' => $this->session->userdata('userId') 
            ); 
            $data['user'] = $this->user->getRows($con);


            $con1 = array( 
            	'returnType'=>'array',
            	'conditions'=>['user_id'=>$this->session->userdata('userId')]
                //'id' => $this->session->userdata('userId') 
            ); 
            $data['order'] = $this->order->getRows($con1); 

            // Pass the user data and load view 
            $this->load->view('elements/header', $data); 
            $this->load->view('users/orderhistory', $data); 
            $this->load->view('elements/footer'); 
        }else{ 
            redirect('users/login'); 
        } 
    }

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
                        'password' => md5($this->input->post('password'))
                       // 'status' => 1 
                    ) 
                ); 
                $checkLogin = $this->user->getRows($con); 
                if($checkLogin){						if($checkLogin['status']==0){							$data['error_msg'] = 'Currently your account is Inactive, Kindly Contact to admin for account approval';						}else{							       $this->session->set_userdata('isUserLoggedIn', TRUE); 								$this->session->set_userdata('userId', $checkLogin['id']);								$this->session->set_userdata('user', $checkLogin); 								redirect('users/account/');						}
              
                }else{ 
                    $data['error_msg'] = 'Wrong email or password, please try again.'; 
                } 
            }else{ 
                $data['error_msg'] = 'Please fill all the mandatory fields.'; 
            } 
        } 
         
        // Load view 
        $this->load->view('elements/header', $data); 
        $this->load->view('users/login', $data); 
        $this->load->view('elements/footer'); 
    } 
 
    public function registration(){ 
        $data = $userData = array(); 
         
        // If registration request is submitted 
        if($this->input->post('signupSubmit')){ 
            $this->form_validation->set_rules('name', 'Name', 'required'); 
      
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_email_check'); 
            $this->form_validation->set_rules('password', 'password', 'required'); 
            $this->form_validation->set_rules('conf_password', 'confirm password', 'required|matches[password]'); 
 
            $userData = array( 
                'name' => strip_tags($this->input->post('name')), 

                'email' => strip_tags($this->input->post('email')), 
                'password' => md5($this->input->post('password')), 
                'address' => $this->input->post('address'), 
                'person_contact' => $this->input->post('person_contact'),

                'remarks' => $this->input->post('remarks')
            ); 
 
            if($this->form_validation->run() == true){ 

                 $config['upload_path']   = './uploads/'; 
                 $config['allowed_types'] = 'gif|jpg|png'; 
                 $config['max_size']      = 10000; 
                 $config['max_width']     = 20240; 
                 $config['max_height']    = 17680;   
                 $this->load->library('upload', $config);
                    
                 if ( ! $this->upload->do_upload('ic_pictures')) {
                    $error = array('error' => $this->upload->display_errors()); 
                      print_r($error);
                  exit;
                    //$this->load->view('upload_form', $error); 
                 }
                    
                 else { 
                    $datafile = array('upload_data' => $this->upload->data()); 
                    $userData['ic_pictures'] = $datafile['upload_data']['file_name'];  
                 }

                
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
        $this->session->unset_userdata('isUserLoggedIn'); 
        $this->session->unset_userdata('userId'); 
        $this->session->sess_destroy(); 
        redirect('users/login/'); 
    } 
     
     
    // Existing email check during validation 
    public function email_check($str){ 
        $con = array( 
            'returnType' => 'count', 
            'conditions' => array( 
                'email' => $str 
            ) 
        ); 
        $checkEmail = $this->user->getRows($con); 
        if($checkEmail > 0){ 
            $this->form_validation->set_message('email_check', 'The given email already exists.'); 
            return FALSE; 
        }else{ 
            return TRUE; 
        } 
    } 
}