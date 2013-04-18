<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	<!-- blueprint CSS framework -->

	<?php
		$this->load->helper('asset');
		$attributes = array('media' => 'screen, projection');
		$attributes_p = array('media' => 'print');
		
		print js_asset('jquery-1.6.2.min.js') . "\n";
		
		// Load a css file from the main asset css folder

		print css_asset('admin/screen.css', '',$attributes) . "\n";
		print css_asset('admin/print.css','',$attributes_p) . "\n";
		#print css_asset('style.css') . "\n";
		print css_asset('admin/main.css') . "\n";
		
		#echo meta('description', $desc);
		
	?>	

	<!--[if lt IE 8]>
	<?php
		print css_asset('admin/ie.css') . "\n";
	?>		
	<![endif]-->
	
	<title><?php echo $title; ?></title>	
</head>


<body>
    <div class="container">  
	
          <div class="span-24">  
             <h1><?php echo $app_name; ?></h1>
          </div>  
		  
		  <div class="span-24">
			<div id="mainmenu">
				<ul id="yw2">
					<?php echo $top_menu;?>

				</ul>	
			</div><!-- mainmenu -->
		  </div>
		  
          <div class="span-20">  
             
			 <br />		  