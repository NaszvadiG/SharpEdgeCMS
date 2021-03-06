<?php
###################################################################
##
##	Contact Admin Module
##	Version: 1.05
##
##	Last Edit:
##	March 29 2014
##
##	Description:
##	Contact Form Admin System
##	
##	Author:
##	By Shawn Purdy
##	
##	Comments:
##	
##
##################################################################
class Contact_admin extends ADMIN_Controller {

	function Contact_admin()
		{
		parent::__construct();
		#Libarays
		$this->load->library('image_lib');
		$this->lang->load('recaptcha');
		$this->load->library('recaptcha');

		#Models
		$this->load->model('contact_admin_model');

		#Helpers
		$this->load->helper('date');
		$this->load->helper('file');
		
		#Configuration
		$this->load->config('contact_config');
		
		#Load Module User Protection
		$check_perm = $this->backend_model->protect_module();
		$this->data['module_read'] = 'N';
		$this->data['module_write'] = 'N';
		$this->data['module_delete'] = 'N';
		$check_perm = $this->backend_model->get_module_permissions();
		if($check_perm->result())
			{
			foreach($check_perm->result() as $pm)
				{
				$this->data['module_read'] = $pm->read;
				$this->data['module_write'] = $pm->write;
				$this->data['module_delete'] = $pm->delete;
				}
			}
		else
			{
			$this->data['module_read'] = 'N';
			$this->data['module_write'] = 'N';
			$this->data['module_delete'] = 'N';
			}
		}

	function index()
		{
		if($this->data['module_read'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$data['query'] = $this->contact_admin_model->show_fields();
			$data['heading'] = $this->lang->line('manage_fields');
			$data['template_path'] = $this->config->item('template_admin_page');
			$data['page'] =  $data['template_path'] . '/contact_admin/field_list';
			$data['flashmsg'] = $this->session->flashdata('flashmsg');
			$this->load->vars($data);
			$this->load->view($this->_container);
			}
		else
			{
			echo "access denied";
			}
		}

	function new_field()
		{
		if($this->data['module_write'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$this->form_validation->set_message('required', 'The Field %s is Required');
			$this->form_validation->set_rules('name', 'name', 'xss_clean|required');
			$this->form_validation->set_rules('type', 'type', 'xss_clean');
			$this->form_validation->set_rules('array_name', 'array_name', 'xss_clean');
			$this->form_validation->set_rules('lang', 'lang', 'xss_clean');
			$this->form_validation->set_rules('is_required', 'is_required', 'xss_clean');
			$this->form_validation->set_rules('is_email', 'is_email', 'xss_clean');
			$this->form_validation->set_rules('alignment', 'alignment', 'xss_clean');
			$this->form_validation->set_rules('sort_id', 'sort_id', 'xss_clean');
			$this->form_validation->set_error_delimiters('<h5>', '</h5>');
			if($this->form_validation->run() == FALSE)
				{
				$data['heading'] = $this->lang->line('add_field');
				$data['template_path'] = $this->config->item('template_admin_page');
				$data['langs'] = $this->contact_admin_model->get_langs();
				
				if(!isset($_POST['name']))
					{
					$this->load->view($data['template_path'] . '/contact_admin/new_field', $data);
					}
				else
					{
					$data['page'] = $data['template_path'] . '/contact_admin/new_field';
					$this->load->vars($data);
					$this->load->view($this->_container);
					}
				}
			else
				{
				$this->contact_admin_model->field_insert();
				$msg = $this->lang->line('added');
				$this->session->set_flashdata('flashmsg', $msg);
				redirect('./contact_admin/');
				}
			}
		else
			{
			echo "access denied";
			}
		}

	function edit_field()
		{
		if($this->data['module_write'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$this->form_validation->set_message('required', 'The Field %s is Required');
			$this->form_validation->set_rules('type', 'type', 'xss_clean');
			$this->form_validation->set_rules('array_name', 'array_name', 'xss_clean');
			$this->form_validation->set_rules('lang', 'lang', 'xss_clean');
			$this->form_validation->set_rules('is_required', 'is_required', 'xss_clean');
			$this->form_validation->set_rules('is_email', 'is_email', 'xss_clean');
			$this->form_validation->set_rules('alignment', 'alignment', 'xss_clean');
			$this->form_validation->set_rules('sort_id', 'sort_id', 'xss_clean');
			$this->form_validation->set_error_delimiters('<h5>', '</h5>');
			if($this->form_validation->run() == FALSE)
				{
				$data['query'] = $this->contact_admin_model->edit_field();
				$data['langs'] = $this->contact_admin_model->get_langs();
				$data['heading'] = $this->lang->line('label_edit_field');
				$data['template_path'] = $this->config->item('template_admin_page');
				$data['page'] = $data['template_path'] . '/contact_admin/edit_field';
				$this->load->vars($data);
				$this->load->view($this->_container);
				}
			else
				{
				$this->contact_admin_model->field_update();
				$msg = $this->lang->line('updated');
				$this->session->set_flashdata('flashmsg', $msg);
				redirect('./contact_admin/');
				}
			}
		else
			{
			echo "access denied";
			}
		}

	function delete_field()
		{
		if($this->data['module_delete'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$this->contact_admin_model->field_delete();
			$msg = $this->lang->line('delete');
			$this->session->set_flashdata('flashmsg', $msg);
			redirect('./contact_admin/');
			}
		else
			{
			echo "access denied";
			}
		}

	function manage_contacts()
		{
		if($this->data['module_read'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$data['query'] = $this->contact_admin_model->show_contacts();
			$data['heading'] = $this->lang->line('manage_contacts');
			$data['template_path'] = $this->config->item('template_admin_page');
			$data['page'] =  'contact_list';
			$data['flashmsg'] = $this->session->flashdata('flashmsg');
			$this->load->view($data['template_path'] . '/contact_admin/contact_list', $data);
			}
		else
			{
			echo "access denied";
			}
		}

	function new_contact()
		{
		if($this->data['module_write'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$this->form_validation->set_message('required', 'The Field %s is Required');
			$this->form_validation->set_rules('contact_name', 'contact_name', 'xss_clean|required');
			$this->form_validation->set_rules('email', 'email', 'xss_clean|required');
			$this->form_validation->set_error_delimiters('<h5>', '</h5>');
			if($this->form_validation->run() == FALSE)
				{
				$data['heading'] = $this->lang->line('add_contact');
				$data['template_path'] = $this->config->item('template_admin_page');
				
				if(!isset($_POST['contact_name']))
					{
					$this->load->view($data['template_path'] . '/contact_admin/new_contact', $data);
					}
				else
					{
					$data['page'] = $data['template_path'] . '/contact_admin/new_contact';
					$this->load->vars($data);
					$this->load->view($this->_container);
					}
				}
			else
				{
				$this->contact_admin_model->contact_insert();
				$msg = $this->lang->line('added');
				$this->session->set_flashdata('flashmsg', $msg);
				redirect('contact_admin/#tabs-3');
				}
			}
		else
			{
			echo "access denied";
			}
		}

	function edit_contact()
		{
		if($this->data['module_write'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$this->form_validation->set_message('required', 'The Field %s is Required');
			$this->form_validation->set_rules('contact_name', 'contact_name', 'xss_clean|required');
			$this->form_validation->set_rules('email', 'email', 'xss_clean|required');
			$this->form_validation->set_error_delimiters('<h5>', '</h5>');
			if($this->form_validation->run() == FALSE)
				{
				$data['query'] = $this->contact_admin_model->edit_contact();
				$data['heading'] = $this->lang->line('label_edit_contact');
				$data['template_path'] = $this->config->item('template_admin_page');
				$data['page'] = $data['template_path'] . '/contact_admin/edit_contact';
				$this->load->vars($data);
				$this->load->view($this->_container);
				}
			else
				{
				$this->contact_admin_model->contact_update();
				$msg = $this->lang->line('updated');
				$this->session->set_flashdata('flashmsg', $msg);
				redirect('contact_admin/#tabs-3');
				}
			}
		else
			{
			echo "access denied";
			}
		}

	function delete_contact()
		{
		if($this->data['module_delete'] == 'Y' OR $this->ion_auth->is_admin())
			{
			$this->contact_admin_model->contact_delete();
			redirect('contact_admin/#tabs-3');
			}
		else
			{
			echo "access denied";
			}
		}
}