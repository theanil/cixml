<?php

class Form1 extends CI_Controller {

	function index()
	{
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('hobb[]', 'Hobbies', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('form1');
		}
		else
		{
			echo "Sucessfully form is submited";
		}
	}
}
?>