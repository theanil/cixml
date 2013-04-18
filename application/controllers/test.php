<?php
class Test extends CI_Controller {
		
    var $myapp;
	var $std_pages;
	
	public function __construct()
    {
		parent::__construct();
		// Your own constructor code
		$this->load->helper(array('form', 'url', 'date','html'));
		$this->load->library('table');
		$this->load->library('session');

		$this->myapp['name'] = 'TI App';
		$this->load->vars($this->myapp); //Load into every view

		$this->std_pages['total'] = 5;
		$this->load->vars($this->std_pages); //Load into every view
    }

	function index()
	{

		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>\n";
		#$top_menu .= "<li>" . anchor("/about", 'About') ."</li>\n";
		#$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>\n";
		$top_menu .= "<li>" . anchor("/", 'Login') ."</li>\n";

		$r_menu  = "<li>" . anchor("/news", 'List News') ."</li>\n";
		#$r_menu .= "<li>" . anchor("/news/new_news", 'New News') ."</li>\n";

						
		#$data['name'] = 'Anil';
		$data['app_name'] = $this->myapp['name'];
		$data['title'] = 'XML System 2.0';
		#$data['desc'] = 'Rom description';
		
		#$this->load->model('UserModel','', TRUE);
		#$data['desc'] = $this->UserModel->get_dessc('rom');	
		
		$data['top_menu'] = $top_menu;
		$data['right_menu'] = $r_menu;

		$logged_in_session = $this->session->userdata('logged_in');
		$username_session = $this->session->userdata('username');
		
		if(empty($logged_in_session))
		{
			#$this->output->cache(5);
			
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[4]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean');
			#$this->form_validation->set_rules('passconf', 'Password Confirmation', 'trim|required');
			#$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
			
			if ($this->form_validation->run() == FALSE)
			{
				//without login
				
				$this->load->view('header', $data);	
				$this->load->view('loginform', array('login_failed' => false));
				$this->load->view('footer', $data);	
				
			}
			else
			{
				$this->load->model('UserModel','', TRUE);
				
				$query = $this->UserModel->check_login();				
				$username = trim($this->input->post('username'));
				$count = sizeof($query);
						
				#print $count;exit;
				
				if($count == 1)
				{
					$newdata = array(
							'username'  => "$username",       
							'logged_in' => TRUE
							);
							#echo "success";
					$this->session->set_userdata($newdata);					
					$this->_login_success();
				}
				else
				{
					#echo 'error in password';
					$this->load->view('header', $data);	
					$this->load->view('loginform', array('login_failed' => true));
					$this->load->view('footer',$data);					
				}
			}
		}
		else
		{
			$this->_login_success();
		}
	}
	
	function show($id ='')
	{
		#echo $website_name;
		
		echo "Welcome $id";
		$this->output->cache(10);
	}

	
	function logout()
	{
		$this->load->library('session');
		$this->load->helper('url');

		$this->session->sess_destroy();
		redirect('/');			
	}	
	
	private function _login_success()
	{
		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>\n";
		#$top_menu .= "<li>" . anchor("/about", 'About') ."</li>\n";
		#$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>\n";
		$top_menu .= "<li>" . anchor("/welcome/logout", 'Logout') ."</li>\n";

		$r_menu  = "<li>" . anchor("/news", 'List News') ."</li>\n";
		#$r_menu .= "<li>" . anchor("/news/new_news", 'New News') ."</li>\n";

						
		#$data['name'] = 'Anil';
		$data['app_name'] = $this->myapp['name'];
		$data['title'] = 'Login';
		$data['top_menu'] = $top_menu;
		$data['right_menu'] = $r_menu;

		
		$this->load->view('header', $data);	
		$this->load->view('welcome_message');
		$this->load->view('footer',$data);	
	}	
}

