<?php
class Events extends CI_Controller {
		
    var $myapp;
	var $std_pages;
	
	public function __construct()
    {
		parent::__construct();
		// Your own constructor code
		$this->load->helper(array('form', 'url', 'date'));
		$this->load->library('table');

		$this->myapp['name'] = 'My Application 0.01';
		$this->load->vars($this->myapp); //Load into every view

		$this->std_pages['total'] = 5;
		$this->load->vars($this->std_pages); //Load into every view
		#$myapp = 'Anil - App';;
    }

	function index()
	{
		#echo "Hello world";
		#echo $this->myapp['name'];
		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>";
		$top_menu .= "<li>" . anchor("/about", 'About') ."</li>";
		$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>";
		$top_menu .= "<li>" . anchor("/logout", 'Logout') ."</li>";

		$r_menu  = "<li>" . anchor("/events", 'List Events') ."</li>";
		$r_menu .= "<li>" . anchor("/events/new_events", 'New Events') ."</li>";
		#$r_menu .= "<li>" . anchor("/news/view/1", 'View News') ."</li>";
		#$r_menu .= "<li>" . anchor("/news", 'Manage News') ."</li>";

		$bread_m  = anchor("/", 'Home') ." &raquo\n";
		$bread_m .= anchor("/news", 'News') ." &raquo\n";
		$bread_m .= "<span>List News</span>\n";
						
		#$data['name'] = 'Anil';
		$data['app_name'] = $this->myapp['name'];
		$data['title'] = 'Events - List Event';
		$data['top_menu'] = $top_menu;
		$data['bread_m'] = $bread_m;
		$data['right_menu'] = $r_menu;
	

		$this->load->model('EventsModel','', TRUE);
		
		$count = $this->EventsModel->count_total_results();
		
		#$this->load->database();
		
		#$this->db->from('news');
		#$count = $this->db->count_all_results();		
					
		$data['per_page'] = $this->std_pages['total'];
		$data['pages'] = ceil($count/$this->std_pages['total']);		

		$this->load->view('header', $data);	
		#$this->load->view('test-bar', $data);		
		$this->load->view('events/events_show', $data);	
		#$this->load->view('sidebar');		
		$this->load->view('footer');		
	}
	
	function content($id = '1')
	{
		$id = $id-1;
		$pages = $this->std_pages['total'];
		$id_from = $id * $pages;
	
		$this->load->model('NewsModel','', TRUE);
		$query = $this->NewsModel->get_selected_records('news_id, news_date, news_title, news_short_desc', $pages, $id_from);		
			
		$this->table->set_heading('News ID', 'News Date','News Title', 'Short Desc','Action','','');
		#$this->table->add_row('Fred', 'Blue', 'Small');
		foreach($query as $row)
		{
			$this->table->add_row("$row->news_id", "$row->news_date", "$row->news_title","$row->news_short_desc", anchor("/news/view/" .$row->news_id, 'View'), anchor("/news/update/" .$row->news_id, 'Update'), anchor("/news/del/" .$row->news_id, 'Delete', 'onClick="return confirmSubmit()"'));						
		}				
		echo $this->table->generate();		
	}	
	
	function new_events()
	{
		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>";
		$top_menu .= "<li>" . anchor("/about", 'About') ."</li>";
		$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>";
		$top_menu .= "<li>" . anchor("/logout", 'Logout') ."</li>";

		$r_menu  = "<li>" . anchor("/news", 'List News') ."</li>";
		#$r_menu .= "<li>" . anchor("/news/new_news", 'New News') ."</li>";
		#$r_menu .= "<li>" . anchor("/news/view/1", 'View News') ."</li>";
		#$r_menu .= "<li>" . anchor("/news", 'Manage News') ."</li>";
			
		$bread_m  = anchor("/", 'Home') ." &raquo\n";
		$bread_m .= anchor("/news", 'News') ." &raquo\n";
		$bread_m .= "<span>New News</span>\n";
						
		#$data['name'] = 'Anil';
		$data['app_name'] = $this->myapp['name'];
		$data['title'] = 'News - New News';
		$data['top_menu'] = $top_menu;
		$data['bread_m'] = $bread_m;
		$data['right_menu'] = $r_menu;
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		
		$this->form_validation->set_rules('news_title', 'News Title', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('news_short_desc', 'Short Description', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('news_long_desc', 'Long Description', 'trim|required|min_length[4]|xss_clean');

		if ($this->form_validation->run() == FALSE)
		{
			#$this->load->view('myform', array('login_failed' => false));

			$this->load->view('header', $data);	
			#$this->load->view('test-bar', $data);		
			$this->load->view('events/events_new');		
			#$this->load->view('sidebar');		
			$this->load->view('footer');
		}		
		else
		{
			$this->load->model('EventsModel','', TRUE);
			$this->EventsModel->insert_entry();
			
			#print "News added";
			$data['title'] = 'News - added';
			$data['show_title'] = 'News added successfully.';

			$this->load->view('header', $data);	
			#$this->load->view('test-bar', $data);		
			$this->load->view('success');		
			#$this->load->view('sidebar');		
			$this->load->view('footer');			
		}
		
        #$this->load->view('news\news_test', $data);						
	}	
	
	function view($id='')
	{
		#$this->output->cache(100);
		
		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>";
		$top_menu .= "<li>" . anchor("/about", 'About') ."</li>";
		$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>";
		$top_menu .= "<li>" . anchor("/logout", 'Logout') ."</li>";

		$r_menu  = "<li>" . anchor("/news", 'List News') ."</li>";
		$r_menu .= "<li>" . anchor("/news/new_news", 'New News') ."</li>";
		
		if(!empty($id))
		{
			$r_menu .= "<li>" . anchor("news/update/$id", 'Update News') ."</li>";
			$r_menu .= "<li>" . anchor("news/del/$id", 'Delete News', 'onClick="return confirmSubmit()"') ."</li>";
			#$r_menu .= "<li>" . anchor("/news", 'Manage News') ."</li>";
		}
			
		$bread_m  = anchor("/", 'Home') ." &raquo\n";
		$bread_m .= anchor("/news", 'News') ." &raquo\n";
		$bread_m .= "<span>View News</span>\n";
						
		#$data['name'] = 'Anil';
		$data['app_name'] = $this->myapp['name'];
		$data['title'] = 'News -  View News';
		$data['id'] = $id;
		$data['top_menu'] = $top_menu;
		$data['bread_m'] = $bread_m;
		$data['right_menu'] = $r_menu;
		
		if(empty($id))
		{
			$data['show_title'] = "Please pass the News ID <br/>\n";
		}

		$this->load->view('head', $data);	
		
		#echo "helo $id";
		if(empty($id))
		{
			#print "Please pass the News ID <br/>\n";
			$this->load->view('success');				
		}
		else
		{
			#print "Showing result of News id $id <br/>\n";
		
			$this->load->model('NewsModel','', TRUE);

			$data['query'] = $this->NewsModel->get_news_by_id($id);
			
			#$this->load->view('test-bar', $data);		
			$this->load->view('news\news_view', $data);			
		}		
		
		$this->load->view('sidebar');		
		$this->load->view('footer');	
		}

	function del($id='')
	{
		#echo "helo $id";
		
		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>";
		$top_menu .= "<li>" . anchor("/about", 'About') ."</li>";
		$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>";
		$top_menu .= "<li>" . anchor("/logout", 'Logout') ."</li>";

		$r_menu  = "<li>" . anchor("/news", 'List News') ."</li>";
		$r_menu .= "<li>" . anchor("/news/new_news", 'New News') ."</li>";
		#$r_menu .= "<li>" . anchor("news/update/$id", 'Update News') ."</li>";
		#$r_menu .= "<li>" . anchor("news/del/$id", 'Delete News', 'onClick="return confirmSubmit()"') ."</li>";
		#$r_menu .= "<li>" . anchor("/news", 'Manage News') ."</li>";
			
		$bread_m  = anchor("/", 'Home') ." &raquo\n";
		$bread_m .= anchor("/news", 'News') ." &raquo\n";
		$bread_m .= "<span>Delete News</span>\n";
			
		$data['app_name'] = $this->myapp['name'];
		$data['title'] = 'News - Delete News';
		$data['top_menu'] = $top_menu;
		$data['bread_m'] = $bread_m;
		$data['right_menu'] = $r_menu;

		if(empty($id))
		{
			#print "Please pass the News ID <br/>\n";
			$data['show_title'] = "Please pass the News ID <br/>\n";
		}
		
		if(!empty($id))
		{
			#print "Deleting News of News id $id <br/>\n";

			$this->load->model('NewsModel','', TRUE);

			$del_status = $this->NewsModel->delete_news_by_id($id);
			#$this->load->view('news\news_view', $data);
			
			$del_message = ($del_status) ? "Record deleted. " : "Not deleted.";

			$data['show_title'] = $del_message;
		}	
		
		$this->load->view('head', $data);	
		#$this->load->view('test-bar', $data);		
		$this->load->view('success');		
		$this->load->view('sidebar');		
		$this->load->view('footer');			
	}

	function update($id='')
	{
		#echo "ID: $id";

		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>";
		$top_menu .= "<li>" . anchor("/about", 'About') ."</li>";
		$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>";
		$top_menu .= "<li>" . anchor("/logout", 'Logout') ."</li>";

		$r_menu  = "<li>" . anchor("/news", 'List News') ."</li>";
		$r_menu .= "<li>" . anchor("/news/new_news", 'New News') ."</li>";
		
		if(!empty($id))
		{
			$r_menu .= "<li>" . anchor("news/view/$id", 'View News') ."</li>";
			$r_menu .= "<li>" . anchor("news/del/$id", 'Delete News', 'onClick="return confirmSubmit()"') ."</li>";
			#$r_menu .= "<li>" . anchor("/news", 'Manage News') ."</li>";
		}
		
		$bread_m  = anchor("/", 'Home') ." &raquo\n";
		$bread_m .= anchor("/news", 'News') ." &raquo\n";
		$bread_m .= "<span>Update News</span>\n";		
		
		#$data['name'] = 'Anil';
		$data['app_name'] = $this->myapp['name'];
		$data['title'] = 'News -  Update News';
		$data['id'] = $id;
		$data['top_menu'] = $top_menu;
		$data['bread_m'] = $bread_m;
		$data['right_menu'] = $r_menu;
			
		if(empty($id))
		{
			#print "Please pass the News ID <br/>\n";
			$data['show_title'] = "Please pass the News ID <br/>\n";

				$this->load->view('head', $data);	
				$this->load->view('success', $data);		
				$this->load->view('sidebar');		
				$this->load->view('footer');			
		}
		else
		{
			$this->load->model('NewsModel','', TRUE);	
			
			$this->load->library('form_validation');
			$this->form_validation->set_error_delimiters('<div class="errorMessage">', '</div>');
			
			$this->form_validation->set_rules('news_title', 'News Title', 'trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('news_short_desc', 'Short Description', 'trim|required|min_length[4]|xss_clean');
			$this->form_validation->set_rules('news_long_desc', 'Long Description', 'trim|required|min_length[4]|xss_clean');

			if ($this->form_validation->run() == FALSE)
			{
				#$this->load->view('myform', array('login_failed' => false));

				$data['query'] = $this->NewsModel->get_news_by_id($id);
			
				$this->load->view('head', $data);	
				$this->load->view('news\news_update', $data);		
				$this->load->view('sidebar');		
				$this->load->view('footer');
			}		
			else
			{
				$this->NewsModel->update_entry();
				
				#print "News added";
				$data['title'] = 'News - Updated';
				$data['show_title'] = 'News updated successfully.';

				$this->load->view('head', $data);	
				$this->load->view('success');		
				$this->load->view('sidebar');		
				$this->load->view('footer');			
			}
						
		}		
	}	
	
	function test()
	{
		#echo "Hello world";
		$top_menu  = "<li>" . anchor("/", 'Home') ."</li>";
		$top_menu .= "<li>" . anchor("/about", 'About') ."</li>";
		$top_menu .= "<li>" . anchor("/contact", 'Contact') ."</li>";
		$top_menu .= "<li>" . anchor("/logout", 'Logout') ."</li>";

		$r_menu  = "<li>" . anchor("/news", 'List News') ."</li>";
		$r_menu .= "<li>" . anchor("/news/new_news", 'New News') ."</li>";
		$r_menu .= "<li>" . anchor("/news/view/1", 'View News') ."</li>";
		$r_menu .= "<li>" . anchor("/news", 'Manage News') ."</li>";
		
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="errorMessage">', '</div>');

		$this->form_validation->set_rules('news_title', 'News Title', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('news_short_desc', 'Short Description', 'trim|required|min_length[4]|xss_clean');
		$this->form_validation->set_rules('news_long_desc', 'Long Description', 'trim|required|min_length[4]|xss_clean');
		
		$data['name'] = 'Anil';
		$data['title'] = 'News - New News';
		$data['top_menu'] = $top_menu;
		$data['right_menu'] = $r_menu;
		
		#print $this->form_validation->run();
		if ($this->form_validation->run() == FALSE)
		{
			#$this->load->view('myform', array('login_failed' => false));

			$this->load->view('head', $data);	
			#$this->load->view('test-bar', $data);		
			$this->load->view('news\news_new2', $data);		
			$this->load->view('sidebar', $data);		
			$this->load->view('footer', $data);
		}		
		else
		{
			$this->load->model('NewsModel','', TRUE);
			$this->NewsModel->insert_entry();
			
			print "News added";
		}
		
		
        #$this->load->view('news\news_test', $data);		
	}			
}

