<?php
class Widget extends CI_Controller{

 	public function __construct()
    {
		parent::__construct();

	}

 	function main(){
	$this->load->model('widget_model');
	$data = $this->widget_model->general();
	$this->load->view('widget_main',$data);
  }

	
 	function input(){
		$this->load->helper('form');
		$this->load->helper('html');  
  		$this->load->model('widget_model');
		
		if($this->input->post('mysubmit'))
		{
        $this->books_model->entry_insert();
	    } 
  	
  		$this->load->view('widget_input',$data);	
 	}
	
	function index()
	{
		$this->load->helper('form');
		$this->load->helper('html');  
		$this->load->model('widget_model');
		#$this->load->view('widget_header');
		$this->load->view('widget_input',$data);	
		#$this->load->view('widget_footer');
	}
	
	function show($id='')
	{
		echo $id;
	}
}


?>