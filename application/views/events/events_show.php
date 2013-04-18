
<!--main content start here -->

	<script LANGUAGE="JavaScript">
	<!--
	function confirmSubmit()
	{
		var agree=confirm("Are you sure you delete?");
		if (agree)
			return true ;
		else
			return false ;
	}
	// -->
	</script>	

	
<style>

#paging li{	list-style: none; float: left; margin-right: 16px; text-transform: uppercase;	color: #c2c2c2; }
#paging li:hover{ color: #6fa5fd; cursor: pointer; }

</style>		
<?php
	#print "Total record : " . sizeof($query) . "<br />\n";

	#print_r($query);
	#print $query[0][1];
	
	/*
	foreach($query as $row)
	{
		echo $row->news_id . " $ ";
		echo $row->news_title . " $ ";
		echo $row->news_short_desc . " $ ";
		echo $row->news_long_desc . " $ ";
		echo $row->news_entry_by . "<br />\n";
	}	
	*/
?>


  <!-- the result of the search will be rendered inside this div -->

  

    <div id="searchbox" class="span-18 last">
		<?php $attributes = array('id' => 'searchForm1'); echo form_open('news/search', $attributes); ?>	
		
		<div class="span-18 last">
		<h3>Search</h3>
		</div>
		
		<div class="span-2">
		<label for="city">News ID</label>
		</div>
				 
        <div class="span-16 last">
		 <input type="text" name="city" placeholder="Enter Short Desc" value="<?php echo set_value('city'); ?>" size="50" />
		</div>	

		<div class="span-2">
		<label for="city">News Title</label>
		</div>
				 
        <div class="span-16 last">
		 <input type="text" name="city" placeholder="Enter City" value="<?php echo set_value('city'); ?>" size="50" />
		</div>	

		<div class="span-2">
		<label for="city">Short Desc</label>
		</div>
				 
        <div class="span-16 last">
		 <input type="text" name="city" placeholder="Enter Short Desc" value="<?php echo set_value('city'); ?>" size="50" />
		</div>	
		
		<div class="span-2">
		<label for="city">Long Desc</label>
		</div>
				 
        <div class="span-16 last">
		 <input type="text" name="city" placeholder="Enter Long Desc" value="<?php echo set_value('city'); ?>" size="50" />
		</div>	

		<div class="span-2">&nbsp;
		</div>
				 
        <div class="span-16 last">
		 <input type="submit" name='mysubmit' value="Search" />
		</div>	
		
		<?php echo form_close(); ?>		
	</div>
		<div class="append-8 last" align="center">
			<a href="#">Advance Search</a>
		</div>

  
  
	<script>
		$("a").click(function ( event ) 
		{
			//event.preventDefault();
			$("#searchbox").toggle();
		});		
	</script>

	
	<div align="center">
		<table border="0" cellpadding="0" cellspacing="0" width="100%" id="table1">

			<tr>
				<td>
				<div id="loading" style="position: absolute;">
					LOADING...
				</div>
				</td>
			</tr>
			
			<tr>
				<td>
				
					<div id="paging">
						<ul id="menu">
						<?php
						//Show page links
						for($i=1; $i<=$pages; $i++)
						{
							echo '<li id="'.$i.'">'.$i.'</li>';
						}
						?>
						</ul>						
					</div>
					
				</td>
			</tr>
			
			<tr>
				<td>
				<div id="content2" style="height: 200px;"></div>
				</td>
			</tr>
			

			
		</table>
	</div>
	
<!--main content end here -->



