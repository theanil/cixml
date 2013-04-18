

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
		#echo $row->news_id;
		$news_id = $row->news_id;
		$news_title = $row->news_title;
		$news_short_desc = $row->news_short_desc;
		$news_long_desc = $row->news_long_desc;
		$news_entry_by = $row->news_entry_by;
	}		
?>


<!--main content start here -->

<h5>News ID</h5>
<?php echo $news_id; ?>

<h5>Title</h5>
<?php echo $news_title; ?>

<h5>Short Description</h5>
<?php echo nl2br($news_short_desc); ?>

<h5>Long Description</h5>
<?php echo nl2br($news_long_desc); ?>

<h5>Entry By</h5>
<?php echo $news_entry_by; ?>

<!--main content end here -->

