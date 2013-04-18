<?php
class widget_model extends CI_Model{
	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		//$this->load->helper('date');
		$this->load->helper('url');				
    }

  
 function entry_insert()
	{
		$this->load->database();
	$data = array(
	          'aliancename'=>$this->input->post('aliancename'),
			  'code'=>$this->input->post('code'),
			  'foldername'=>$this->input->post('foldername'),
			  'pagetitle'=>$this->input->post('pagetitle'),
			  #'referlink'=>$this->input->post('referlink'),
			  #'textcolor'=>$this->input->post('textcolor'),
			  #'backgroundcolor'=>$this->input->post('backgroundcolor'),
			  #'searchpanel'=>$this->input->post('searchpanel'),
	        );
	$this->db->insert('widget',$data);	
	}
	
  function general(){		
	$data['webtitle']	= 'Alliance Widget';
	$data['websubtitle']= 'Alliance Widget';
	$data['webfooter']	= '© copyright by Euclid Infotech Pvt.Ltd.'; 
	$data['alliancename']= 'Alliance Name';
	$data['code']	 	= 'Code';
	$data['foldername']	= 'Folder Name';				
	$data['pagetitle']	= 'Page Title';
	
	$data['forminput']	= 'Form Input';
	
	$data['falliancename']	= array('name'=>'alliancename',
	                            'size'=>30
						  );
	$data['fcode']	= array('name'=>'code',
	                            'size'=>30
						  );
	$data['ffoldername']	= array('name'=>'foldername',
	                            'size'=>30
						  );
    $data['fpagetitle']	= array('name'=>'pagetitle'
	                            
						  );
	
	return $data;	
  }
}


?>
