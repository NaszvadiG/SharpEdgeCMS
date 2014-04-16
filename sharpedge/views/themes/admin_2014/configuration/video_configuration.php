<?php $stats = $this->config->load('video_config');?>
<?php $videos_per_page = $stats . $this->config->item('videos_per_page');?>
<?php $video_char_limit = $stats . $this->config->item('video_short_char_limit');?>
<?php $video_allow_comments = $stats . $this->config->item('video_allow_comments');?>
<?php $video_image_security = $stats . $this->config->item('video_image_security');?>
<?php $video_normal_maxwidth = $stats . $this->config->item('video_normal_maxwidth');?>
<?php $video_normal_maxheight = $stats . $this->config->item('video_normal_maxheight');?>
<?php $video_normal_quality = $stats . $this->config->item('video_normal_quality');?>
<?php $video_small_maxwidth = $stats . $this->config->item('video_small_maxwidth');?>
<?php $video_small_maxheight = $stats . $this->config->item('video_small_maxheight');?>
<?php $video_small_quality = $stats . $this->config->item('video_small_quality');?>
<?php $video_medium_maxwidth = $stats . $this->config->item('video_medium_maxwidth');?>
<?php $video_medium_maxheight = $stats . $this->config->item('video_medium_maxheight');?>
<?php $video_medium_quality = $stats . $this->config->item('video_medium_quality');?>
<?php $video_thumbnail_maxwidth = $stats . $this->config->item('video_thumbnail_maxwidth');?>
<?php $video_thumbnail_maxheight = $stats . $this->config->item('video_thumbnail_maxheight');?>
<?php $video_thumbnail_quality = $stats . $this->config->item('video_thumbnail_quality');?>
<div class="form-horizontal">
<?php echo form_open('configuration/video_config/');?>
		<fieldset>
			<legend><?php echo $this->lang->line('video_config');?></legend>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_per_page');?></span>
				<input type="text" class="form-control" name="videos_per_page" value="<?php echo $videos_per_page;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_max_chars');?></span>
				<input type="text" class="form-control" name="video_short_char_limit" value="<?php echo $video_char_limit;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_allow_comments');?></span>
				<select name="video_allow_comments" class="form-control">
				<option value="true"<?php if($video_allow_comments == 1):?>selected="selected"<?php endif;?>><?php echo $this->lang->line('label_true');?></option>
				<option value="false"<?php if($video_allow_comments == 0):?>selected="selected"<?php endif;?>><?php echo $this->lang->line('label_false');?></option>
				</select>
			</div>

			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_image_security');?></span>
				<select name="video_image_security" class="form-control">
				<option value="true"<?php if($video_image_security == 1):?>selected="selected"<?php endif;?>><?php echo $this->lang->line('label_true');?></option>
				<option value="false"<?php if($video_image_security == 0):?>selected="selected"<?php endif;?>><?php echo $this->lang->line('label_false');?></option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_normal_maxwidth');?></span>
				<input type="text" class="form-control" name="video_normal_maxwidth" value="<?php echo $video_normal_maxwidth;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_normal_maxheight');?></span>
				<input type="text" class="form-control" name="video_normal_maxheight" value="<?php echo $video_normal_maxheight;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_normal_quality');?></span>
				<input type="text" class="form-control" name="video_normal_quality" value="<?php echo $video_normal_quality;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_small_maxwidth');?></span>
				<input type="text" class="form-control" name="video_small_maxwidth" value="<?php echo $video_small_maxwidth;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_small_maxheight');?></span>
				<input type="text" class="form-control" name="video_small_maxheight" value="<?php echo $video_small_maxheight;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_small_quality');?></span>
				<input type="text" class="form-control" name="video_small_quality" value="<?php echo $video_small_quality;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_medium_maxwidth');?></span>
				<input type="text" class="form-control" name="video_medium_maxwidth" value="<?php echo $video_medium_maxwidth;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_medium_maxheight');?></span>
				<input type="text" class="form-control" name="video_medium_maxheight" value="<?php echo $video_medium_maxheight;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_medium_quality');?></span>
				<input type="text" class="form-control" name="video_medium_quality" value="<?php echo $video_medium_quality;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_thumbnail_maxwidth');?></span>
				<input type="text" class="form-control" name="video_thumbnail_maxwidth" value="<?php echo $video_thumbnail_maxwidth;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_thumbnail_maxheight');?></span>
				<input type="text" class="form-control" name="video_thumbnail_maxheight" value="<?php echo $video_thumbnail_maxheight;?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('video_thumbnail_quality');?></span>
				<input type="text" class="form-control" name="video_thumbnail_quality" value="<?php echo $video_thumbnail_quality;?>" />
			</div>
			
			<input class="btn btn-primary" type="submit" value="Submit" />

</fieldset>
<?php echo form_close();?>
</div>