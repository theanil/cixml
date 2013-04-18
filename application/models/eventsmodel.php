<?php

class EventsModel extends CI_Model {

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
	
    function get_last_ten_entries()
    {
        $query = $this->db->get('news', 10);
        return $query->result();
    }

    function get_news_by_id($id)
    {
		$query = $this->db->where('news_id', $id); 
        $query = $this->db->get('news');
		#$query = $this->db->get_where('news', array('news_id' => $id));
		#echo $query->num_rows();
        return $query->result();
    }

	function delete_news_by_id($id)
    {
		$query = $this->db->where('news_id', $id); 
        $query = $this->db->delete('news');
		if ($this->db->affected_rows() > 0)
            return TRUE;
        return FALSE;
    }
	
    function insert_entry()
    {
        $this->news_title   = $this->input->post('news_title'); // please read the below note
        $this->news_short_desc = $this->input->post('news_short_desc');
        $this->news_long_desc = $this->input->post('news_long_desc');
        #$this->news_date    = time();
		
		#$datestring = "Year: %Y Month: %m Day: %d - %h:%i %a";
		$datestring = "%Y-%m-%d %H:%i:%s";
		$time = time();
		#print $time . "<hr>";
		#echo mdate($datestring, $time);
		
		$this->news_date = mdate($datestring, $time);
        $this->db->insert('news', $this);
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