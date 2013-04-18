
<!--main content start here -->		

<?php if ($login_failed) : ?>
    <div class="error">Login failed</div>
<?php endif; ?>

<?php
#$attributes = array('name' => 'form1', 'id' => 'form1', 'class' => 'inline');
$attributes = array('name' => 'form1', 'id' => 'form1');

echo form_open('welcome', $attributes); ?>

<div class="span-2"><label>Username</label></div>
<div class="span-16" last><input placeholder="Enter User Name" type="text" class="text" id="username" name="username" value="<?php echo set_value('username'); ?>" size="20" />
<?php echo form_error('username'); ?>
</div>

<div class="span-2"><label>Password</label></div>
<div class="span-16" last><input placeholder="Enter Password" type="password" class="text" id="password" name="password" value="<?php echo set_value('password'); ?>" size="20" />
<?php echo form_error('password'); ?>
</div>

<div class="span-18" last><input type="submit" value="Submit" /></div>

<?php echo form_close(); ?>

<!--main content end here -->		

