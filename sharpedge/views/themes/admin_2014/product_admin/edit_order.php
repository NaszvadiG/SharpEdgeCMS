<?php foreach($edit_order->result() as $id):?>
<?php echo form_open('product_admin/edit_order/'.$this->uri->segment(3));?>
	<input type="hidden" id="id" name="id" value="<?php echo $id->id?>">
	<input type="hidden" id="id" name="order_number" value="<?php echo $id->order_number?>">
		<fieldset>
			<legend><?php echo $this->lang->line('label_edit_order');?></legend>
			<div class="input-group">
				<p class="form-control"><?php echo $id->order_number?></p>
			<?php echo form_error('total_amount'); ?>
			<div class="input-group">
				<input type="text" class="form-control" name="total_amount" value="<?php echo $id->total_amount?>" />
			<div class="input-group">
				<select name="paid" class="form-control">
					<option value="N"<?php if($id->paid == 'N'):?>selected="selected"<?php endif;?>><?php echo $this->lang->line('label_no');?></option>
					<option value="Y"<?php if($id->paid == 'Y'):?>selected="selected"<?php endif;?>><?php echo $this->lang->line('label_yes');?></option>
				</select>
            <input class="btn btn-primary" type="submit" value="Submit" />
		</fieldset>
<?php echo form_close();?>
<?php endforeach;?>