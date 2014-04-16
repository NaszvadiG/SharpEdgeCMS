<style type="text/css">
.remove_margin{margin:0px;margin-bottom:3px;}
.remove_padding{padding-top:5px !important;padding-bottom:5px !important;}
</style>
<?php if($this->config->item('profile_id') == ''):?>
<?php else:?>
<div class="span12 remove_margin">
    <div class="navbar navbar-inverse remove_margin">
    <div class="navbar-inner">
    <a class="brand" href="#"><?php echo $this->lang->line('label_analytics');?></a>
    </div>
    </div>
	<div class="well remove_padding">
	<?php echo modules::run('dashboard/analytics');?>
	</div>
</div>
<?php endif;?>
<div class="span7 remove_margin">
    <div class="navbar navbar-inverse remove_margin">
    <div class="navbar-inner">
    <a class="brand" href="#"><?php echo $this->lang->line('label_quick_post');?></a>
    </div>
    </div>
	<div class="well remove_padding">
	<?php echo modules::run('dashboard/add_news');?>
	</div>
	
	<div class="navbar navbar-inverse remove_margin">
	<div class="navbar-inner">
	<a class="brand" href="#"><?php echo $this->lang->line('label_add_a_page');?></a>
	</div>
	</div>
	<div class="well remove_padding">
	<?php echo modules::run('dashboard/add_page');?>
	</div>
</div>


<div class="span5 remove_margin pull-right">
	<div class="navbar navbar-inverse remove_margin">
	<div class="navbar-inner">
	<a class="brand" href="#"><?php echo $this->lang->line('label_add_a_menu');?></a>
	</div>
	</div>
	<div class="well">
	<?php echo modules::run('dashboard/add_menu');?>
	</div>

    <div class="navbar navbar-inverse remove_margin">
    <div class="navbar-inner">
    <a class="brand" href="#"><?php echo $this->lang->line('label_latest_comments');?></a>
    </div>
    </div>
	<div class="well">
	<?php echo modules::run('dashboard/latest_comments');?>
	</div>
	
	<div class="navbar navbar-inverse remove_margin">
    <div class="navbar-inner">
    <a class="brand" href="#"><?php echo $this->lang->line('label_spam_log');?></a>
    </div>
    </div>
	<div class="well">
	<?php echo modules::run('dashboard/spam_log');?>
	</div>
</diV>