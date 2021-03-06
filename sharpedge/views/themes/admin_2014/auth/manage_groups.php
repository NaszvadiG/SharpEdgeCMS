<table class="table table-striped text-size">
	<tr>
		<th>ID</th>
		<th><?php echo $this->lang->line('label_group_name');?></th>
		<th><?php echo $this->lang->line('label_description');?></th>
		<th><?php echo $this->lang->line('label_controls');?></th>
	</tr>
	<?php foreach ($groups->result() as $id):?>
		<tr>
			<td><?php echo $id->id;?></td>
			<td><?php echo $id->name;?></td>
			<td><?php echo $id->description;?></td>
			<td>
			<a class="btn btn-default" href="<?php echo base_url();?>user_admin/edit_group/<?php echo $id->id?>"><span class="glyphicon glyphicon-pencil"></span> <?php echo $this->lang->line('label_edit');?></a>
			<a class="btn btn-info" href="<?php echo site_url();?>/user_admin/manage_users_in_group/<?php echo $id->id?>"><span class="glyphicon glyphicon-user"></span> <?php echo $this->lang->line('label_users_in_group');?></a>
			<a class="btn btn-warning" href="<?php echo site_url();?>/user_admin/group_module_permissions/<?php echo $id->id?>"><span class="glyphicon glyphicon-lock"></span> <?php echo $this->lang->line('label_group_permissions');?></a>
			</td>
		</tr>
	<?php endforeach;?>
</table>