<?php
###################################################################
##
##	Pages Module
##	Version: 1.01
##
##	Last Edit:
##	Feb 25 2015
##
##	Description:
##	Page Frontend System
##	
##	Author:
##	By Shawn Purdy
##	
##	Comments:
##	
##
##################################################################
class Page_model extends CI_Model 
	{
    function Page_model()
		{     
		parent::__construct();
		}

	#Gets the page from uri segment 3 (pages/view/(segment3)/
	function page_section($pagetitle)
		{
		$page = $this->db
			->select('
				id,
				name,
				url_name,
				text,
				container_name,
				lang,
				side_top,
				slide_id,
				side_bottom,
				content_top,
				content_bottom,
				meta_desc,
				meta_keywords,
				hide,
				restrict_access,
				user_group
			')
			->where('url_name', $pagetitle)
			->where('lang', $this->config->item('language_abbr'))
			->get('pages');
		return $page;
		}

	#Gets the Page Name
	function page_heading()
		{
		
		if($this->config->item('short_url') == 1)
			{
			$seg = $this->uri->segment(1);
			}
		else
			{
			$seg = $this->uri->segment(3);
			}
			
		$get_heading = $this->db->select('name')->where('url_name', $seg)->where('lang', $this->config->item('language_abbr'))->get('pages');
		$set_heading = $get_heading->row();
		$page_heading = $set_heading->name;
		return $page_heading;
		}

	#Get Page widgets
	function get_page_widgets($location_name, $uri)
		{
		$widget_group = $this->db
		->where('widget_locations.name', $location_name)
		->where('widget_locations.id = page_widgets.location_id')
		->where('page_widgets.rel_id = pages.id')
		->where('pages.url_name', $uri)
		->where('pages.lang', $this->config->item('language_abbr'))
		->where('page_widgets.group_id = widget_group_items.group_id')
		->where('widgets.lang', $this->config->item('language_abbr'))
		->where('widget_group_items.widget_id = widgets.id')
		->select('
			widgets.id,
			widgets.name,
			widgets.mode,
			widgets.system_name,
			widgets.bbcode,
			widgets.lang,
			widget_groups.id,
			widget_group_items.group_id,
			widget_group_items.widget_id,
			widget_group_items.sort_id
		')
		->from('widgets,widget_groups,widget_locations,page_widgets, pages')
		->join('widget_group_items', 'widget_group_items.group_id = widget_groups.id')
		->order_by('widget_group_items.sort_id', 'asc')
		->get();
		return $widget_group;
		}
		
	function get_user_group($user_id)
		{
		$user_group = $this->db
			->where('user_id', $user_id)
			->select('group_id')
			->from('users_groups')
			->get();
		return $user_group;
		}
		
	function update_views($page)
		{
		$this->db->where('url_name', $page);
		$this->db->where('lang', $this->config->item('language_abbr'));
		$the_page = $this->db->get('pages');
		foreach($the_page->result() as $tp)
			{
			$page_id = $tp->id;
			$current_views = $tp->views;
			}
		$new_views = $current_views +1;
		$view_array = array(
			'id' => $page_id,
			'views' => $new_views
			);
		$this->db->set($view_array);
		$this->db->where('id', $page_id);
		$this->db->update('pages');
		}
	}
?>