
<!--main content start here -->

<?php #echo validation_errors(); ?>

<?php echo form_open('events/new_events'); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">
		<label for="news_title">News Title <span class="required">*</span></label>
		<input type="text" name="news_title" placeholder="Enter News Title" value="<?php echo set_value('news_title'); ?>" size="50" />
		<?php echo form_error('news_title'); ?>
	</div>

	<div class="row">
		<label for="news_short_desc">Short Description <span class="required">*</span></label>		
		<textarea name="news_short_desc" rows="4" cols="39"><?php echo set_value('news_short_desc'); ?></textarea>
		<?php echo form_error('news_short_desc'); ?>
	</div>

	<div class="row">
		<label for="news_long_desc">Long Description <span class="required">*</span></label>		
		<textarea name="news_long_desc" rows="8" cols="39"><?php echo set_value('news_long_desc'); ?></textarea>
		<?php echo form_error('news_long_desc'); ?>
	</div>

	<div class="row buttons">
		<input type="submit" name='mysubmit' value="Submit" />	
	</div>

<?php echo form_close(); ?>

<!--main content end here -->


