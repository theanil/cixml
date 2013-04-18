<html>
<body>
<div id="header">
<?php //$this->load->view('widget_header'); ?>
</div>

<?php echo form_open('widget/input'); ?>
<?php echo $alliancename.' : '.
        form_input($faliancename).br(); ?>
<?php echo $code.' : '.
        form_input($fcode).br(); ?>
<?php echo $foldername.' : '.
        form_input($ffoldername).br(); ?>
<?php echo $pagetitle.' : '.
        form_dropdown($fpagetitle).br(); ?>

        
<?php echo form_submit('mysubmit','Submit!');  ?>
<?php echo form_close(); ?>

<div id="footer">
<?php //$this->load->view('widget_footer'); ?>
</div>

</body>
</html>


