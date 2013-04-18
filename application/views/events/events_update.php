

<!--main content start here -->

<script LANGUAGE="JavaScript">
<!--
// Nannette Thacker http://www.shiningstar.net
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


<?php //echo validation_errors(); ?>

<?php
	#print "Total record : " . sizeof($query) . "<br />\n";

	if(sizeof($query)<1)
	{
		#echo "error <br />\n";
		echo "<h2>News with ID $id not existing</h2>";
		return;
		//exit;
	}	
	#print_r($query);
	#print $query[0][1];
	
	foreach($query as $row)
	{
		#echo $row->news_id . " $ ";
		#echo $row->news_title . " $ ";
		#echo $row->news_short_desc . " $ ";
		#echo $row->news_long_desc . " $ ";
		#echo $row->news_entry_by . "<br />\n";
		
		#$news_title = $row->news_title;
		#echo "<hr>second time : " . $this->input->post('second_time') . "<br />";
		
		if($this->input->post('second_time') == '1')
		{
			#$news_id = set_value('news_id');
			$news_id =$this->input->post('news_id');
			$news_title = set_value('news_title');
			$news_short_desc =  set_value('news_short_desc');
			$news_long_desc =  set_value('news_long_desc');
			
			#echo "<hr>second time : <hr>";
			#print "hello $news_id :: $news_title :: $news_short_desc :: $news_long_desc <hr>";			
		}
		else
		{
			$news_id = $row->news_id;
			$news_title = $row->news_title;
			$news_short_desc = $row->news_short_desc;
			$news_long_desc = $row->news_long_desc;
			
			#echo "<hr>first time : <hr>";
			#print "hello $news_id :: $news_title :: $news_short_desc :: $news_long_desc <hr>";
		}
		
		#echo "<hr>" . $news_id . " == " . $news_title . " - hello <br />";
		
		#$_POST['news_id'] = $row->news_id;
		#$_POST['news_title'] = $row->news_title;
		#$_POST['news_short_desc'] = $row->news_short_desc;
		#$_POST['news_long_desc'] = $row->news_long_desc;
		#$_POST['news_entry_by'] = $row->news_entry_by;
	}		
?>

<?php echo form_open('news/update/'. $news_id); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<label for="news_title">News Title <span class="required">*</span></label>
		<input type="text" name="news_title" placeholder="Enter News Title" value="<?php echo $news_title; ?>" size="50" />
		<?php echo form_error('news_title'); ?>
	</div>

	<div class="row">
		<label for="news_short_desc">Short Description <span class="required">*</span></label>		
		<textarea name="news_short_desc" rows="4" cols="39"><?php echo $news_short_desc; ?></textarea>
		<?php echo form_error('news_short_desc'); ?>
	</div>

	<div class="row">
		<label for="news_long_desc">Long Description <span class="required">*</span></label>		
		<textarea name="news_long_desc" rows="8" cols="39"><?php echo $news_long_desc; ?></textarea>
		<?php echo form_error('news_long_desc'); ?>
	</div>

	<?php #echo form_hidden('news_id', set_value('news_id')); ?>
	<?php echo form_hidden('news_id', $news_id); ?>
	<?php echo form_hidden('second_time', '1'); ?>
	
	<div class="row buttons">
		<input type="submit" name='mysubmit' value="Submit" />	
	</div>

<?php echo form_close(); ?>

<!--main content end here -->

