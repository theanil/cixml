<?php

class Details extends CI_Controller 
{
	public function __construct()
    {
		parent::__construct();
		// Your own constructor code
		$this->load->helper(array('form', 'url', 'date','html'));
		$this->load->library('table');
		$this->load->library('session');
		$this->config->load('site');
    }

	function _remap( $method )
		{
			// $method contains the second segment of your URI
			switch( $method )
			{
				case 'about-us':
					$this->about_me();
					break;

				case 'successful':
					$this->display_successful_message();
					break;

				case 'contact-us':
					$this->contact_us();
					break;
					
				default:
					$this->show_details($method);
					break;
			}
		}

		function index()
		{
			// ---
			echo 'index';
		}

		function about_me()
		{
			// ---
			$w = $this->config->item('website_name');
			echo "about us = $w <br/>";
			echo $this->config->item('sms_name');
		}

		function contact_us()
		{
			// ---
			echo "contact us";
		}
		
		function show_details($method)
		{
			// ---
			echo "hello $method";
		}

}

?>