<div class="form-horizontal">
<?php echo form_open('contact_admin/new_field');?>
		<fieldset>
			<legend><?php echo $this->lang->line('label_new_field');?></legend>
			
			<?php echo form_error('name'); ?>
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_name');?></span>
				<input type="text" class="form-control" name="name" value="<?php echo set_value('name');?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_field_type');?></span>
				<select name="type" class="form-control">
				<option value="input" selected="selected"><?php echo $this->lang->line('label_select_type');?></option>
				<option value="label" <?php echo set_select('type', 'label');?>><?php echo $this->lang->line('label_label');?></option>
				<option value="para" <?php echo set_select('type', 'para');?>><?php echo $this->lang->line('label_para_info');?></option>
				<option value="input" <?php echo set_select('type', 'input');?>><?php echo $this->lang->line('label_input_box');?></option>
				<option value="text" <?php echo set_select('type', 'text');?>><?php echo $this->lang->line('label_text_area');?></option>
				<option value="select" <?php echo set_select('type', 'select');?>><?php echo $this->lang->line('label_drop_down');?></option>
				<option value="radio" <?php echo set_select('type', 'radio');?>><?php echo $this->lang->line('label_radio');?></option>
				<option value="array" <?php echo set_select('type', 'array');?>><?php echo $this->lang->line('label_array_drop_down');?></option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_array_name');?></span>
				<input type="text" class="form-control" name="array_name" value="<?php echo set_value('array_name');?>" />
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_language');?></span>
				<select class="form-control" name="lang">
				<option value="<?php echo $this->config->item('language_abbr');?>" selected="selected"><?php echo $this->lang->line('label_language');?></option>
				<?php foreach($langs->result() as $la):?>
				<option value="<?php echo $la->lang_short?>" <?php echo set_select('lang', $la->lang_short);?>><?php echo $la->lang?></option>
				<?php endforeach; ?>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_is_required');?></span>
				<select class="form-control" name="is_required">
				<option value="N" <?php echo set_select('is_required', 'N', TRUE);?>><?php echo $this->lang->line('label_no');?></option>
				<option value="Y" <?php echo set_select('is_required', 'Y');?>><?php echo $this->lang->line('label_yes');?></option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_is_email');?></span>
				<select class="form-control" name="is_email">
				<option value="N" <?php echo set_select('is_email', 'N', TRUE);?>><?php echo $this->lang->line('label_no');?></option>
				<option value="Y" <?php echo set_select('is_email', 'Y');?>><?php echo $this->lang->line('label_yes');?></option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_alignment');?></span>
				<select class="form-control" name="alignment">
				<option value="left" <?php echo set_select('alignment', 'left', TRUE);?>><?php echo $this->lang->line('label_left');?></option>
				<option value="center" <?php echo set_select('alignment', 'center');?>><?php echo $this->lang->line('label_center');?></option>
				<option value="right" <?php echo set_select('alignment', 'right');?>><?php echo $this->lang->line('label_right');?></option>
				</select>
			</div>
			
			<div class="input-group">
				<span class="input-group-addon"><?php echo $this->lang->line('label_sort');?></span>
				<input type="text" class="form-control" name="sort_id" value="<?php echo set_value('sort_id');?>" />
			</div>
            
			<input class="btn btn-primary" type="submit" value="Submit" />

		</fieldset>
<?php echo form_close();?>
</div>