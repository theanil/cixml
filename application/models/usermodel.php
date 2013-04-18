<?php

class UserModel extends CI_Model {

    var $news_title   = '';
    var $news_short_desc = '';
    var $news_long_desc = '';
    var $news_date    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
		//$this->load->helper('date');
    }
    
    function count_total_results()
    {
        $this->db->from('news');
		return $this->db->count_all_results();
    }

	function check_login()
	{
		$username = trim($this->input->post('username'));
		$password = trim($this->input->post('password'));
			
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$query = $this->db->get('tbl_user');
		#return $this->db->count_all_results();	
		return $query->result();
	}
	
	function get_selected_records($columns, $pages, $id_from)
	{
		$this->db->select($columns);		
		
		#$this->db->where('name', $name);
		#$this->db->like('title', 'match');
		#$array = array('title' => $match, 'page1' => $match, 'page2' => $match);
		#$this->db->or_like($array); 
		
		$this->db->order_by("news_id", "asc"); 
		$query = $this->db->get('news', $pages, $id_from);
		return $query->result();			
	}
	
    function update_entry()
    {
        $this->news_title   = $this->input->post('news_title');
        $this->news_short_desc = $this->input->post('news_short_desc');
        $this->news_long_desc = $this->input->post('news_long_desc');
        #$this->news_date    = time();

        $this->db->update('news', $this, array('news_id' => $this->input->post('news_id')));
    }
}

?>