<!DOCTYPE html>
<!-- 
Bootstrap 3.2.0 - For SharpEdge CMS
By: Shawn Purdy
-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->config->item('language_abbr');?>" lang="<?php echo $this->config->item('language_abbr');?>">

	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<title><?php echo $this->config->item('sitename');?> - <?php echo $heading?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="content-type" content="text/html; charset=<?php echo config_item('charset');?>" />
		<meta name="robots" content="<?php echo $this->config->item('robots');?>" />
		<link rel="alternate" type="application/rss+xml" title="RSS Feed" href="<?php echo site_url();?>/blog_feed/rss" />
<?php if($this->router->fetch_class() == 'pages'):?>
<?php foreach($curpage->result() as $pid):?>
<?php if($pid->meta_desc != '' OR $pid->meta_keywords != ''):?>
		<meta name="description" content="<?php echo $pid->meta_desc;?>" />
		<meta name="keywords" content="<?php echo $pid->meta_keywords?>" />
		<link rel="image_src" href="<?php echo $this->config->item('image_src');?>"/>
<?php else:?>
		<meta name="description" content="<?php echo $this->config->item('description');?>" />
		<meta name="keywords" content="<?php echo $this->config->item('keywords');?>" />
		<link rel="image_src" href="<?php echo $this->config->item('image_src');?>"/>
<?php endif;?>
<?php endforeach;?>
<?php elseif($this->uri->segment(1) == 'news' AND $this->uri->segment(2) == 'comments'):?>
<?php foreach($blog_post->result() as $bp):?>
<?php $blog_str = parse_smileys($bp->text, "/assets/images/system_images/smileys/");?>
<?php $chars = $this->config->item('blog_short_char_limit');?>
		<meta name="description" content="<?php echo truncateHtml(strip_tags($blog_str),$chars);?>" />
		<meta name="keywords" content="<?php echo $this->config->item('keywords');?>" />
<?php if($bp->userfile == ''):?>
		<link rel="image_src" href="<?php echo $this->config->item('image_src');?>"/>
<?php else:?>
		<link rel="image_src" href="<?php echo base_url();?>assets/news/normal/<?php echo $bp->userfile?>"/>
		<meta property="og:title" content="<?php echo $bp->name;?>">
		<meta property="og:description" content="<?php echo $bp->name;?>">
		<meta property="og:image" content="<?php echo base_url();?>assets/news/normal/<?php echo $bp->userfile?>">
<?php endif;?>
<?php endforeach;?>
<?php else:?>
		<meta name="description" content="<?php echo $this->config->item('description');?>" />
		<meta name="keywords" content="<?php echo $this->config->item('keywords');?>" />
		<link rel="image_src" href="<?php echo $this->config->item('image_src');?>"/>
<?php endif;?>
		<meta name="generator" content="<?php echo $this->config->item('generator');?>" />
		<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>assets/favicon.ico" /> 
		
	</head>
	
	<body>
<?php if ($this->config->item('construction') == 1) :?>
		<div class='constr'><?php echo $this->lang->line('label_web_construction');?></div>
<?php endif;?>

<?php echo $this->load->view('themes/' . $theme . '/admin_menu');?>
		
		<header class="main_header">
			<div class="container">
				<h1><?php echo $this->config->item('sitename');?></h1>
				<small><?php echo $this->config->item('site_slogan');?></small>
				<div class="pull-right"><?php echo alt_site_url();?></div>
				
				<div class="social_container">
<?php if($this->config->item('twitter') == 1):?>
					<div class="twitter_icon">
					<ul>
					<li><a href="<?php echo $this->config->item('twitter_url');?>"> </a></li>
					</ul>
					</div>
<?php endif;?>
<?php if($this->config->item('facebook') == 1):?>
					<div class="fb_icon">
					<ul>
					<li><a href="<?php echo $this->config->item('facebook_url');?>"> </a></li>
					</ul>
					</div>
<?php endif;?>
<?php if($this->config->item('linkedin') == 1):?>
					<div class="linkedin_icon">
					<ul>
					<li><a href="<?php echo $this->config->item('linkedin_url');?>"> </a></li>
					</ul>
					</div>
<?php endif;?>
<?php if($this->config->item('googleplus') == 1):?>
					<div class="google_icon">
					<ul>
					<li><a href="<?php echo $this->config->item('googleplus_url');?>"> </a></li>
					</ul>
					</div>
<?php endif;?>
<?php if($this->config->item('pinterest') == 1):?>
					<div class="pinterest_icon">
					<ul>
					<li><a href="<?php echo $this->config->item('pinterest_url');?>"> </a></li>
					</ul>
					</div>
<?php endif;?>
					<div class="rss_icon">
					<ul>
					<li><a href="<?php echo site_url();?>/blog_feed/rss"> </a></li>
					</ul>
					</div>
				</div>
				
			</div>
		</header>
		
		<div class="clearfix"></div>
		<div class="container">
