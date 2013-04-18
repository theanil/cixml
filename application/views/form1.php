<html>
<head>
<title>My Form</title>
</head>
<body>

<?php #echo validation_errors(); ?>

<?php echo form_open('form1'); ?>

<h5>Name</h5>
<input type="text" name="name" value="<?php echo set_value('name'); ?>" size="50" />
<?php echo form_error('name'); ?>

<h5>Hobby</h5>
<input type="checkbox" name="hobb[]" value="Singing" />
<input type="checkbox" name="hobb[]" value="Reading" />
<input type="checkbox" name="hobb[]" value="Playing" /> 
<?php echo form_error('hobb[]'); ?>

<div><input type="submit" value="Submit" /></div>

</form>

</body>
</html>