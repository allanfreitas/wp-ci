<?php
/**
 * @user_can(manage_options)
 */
class Settings extends Controller {
	
	function Settings() {
		parent::Controller();
	}
	
	function saveSettings() {
		if (verify_nonce()) {
			update_option('wpci_logging_threshold', $this->input->post('logging_threshold'));
			
			update_option('wpci_encryption_key', strip_tags($this->input->post('encryption_key')));
			
			update_option('wpci_get_slug', strip_tags($this->input->post('slug')));
			
			update_option('wpci_database_debugging_enabled', strip_tags($this->input->post('database_debugging_enabled')));
			
			update_option('wpci_ssl_enabled', $this->input->post('ssl_enabled'));
			
			update_option('wpci_application_debugging_enabled', strip_tags($this->input->post('application_debugging_enabled')));
			
			success('Settings <b>saved</b>.');
			
			redirect('index');
		}
	}
	
	function fixGateway() {
		global $wpdb;
		
		$query = null;
		$posts = $wpdb->prefix.'posts';
		$db = DB();
		
		if ($slug = get_option('wpci_gateway_slug')) {
			$query = $db->query("SELECT * FROM $posts WHERE post_name = ?", array($slug));
			if ($query->num_rows() > 0) {
				// obviously, the gateway page was deleted - reinstate
				$db->query("UPDATE $posts SET post_status='publish' WHERE post_name = ? LIMIT 1", array($slug));
				redirect('/wp-admin');
				return true;
			}
			else {
				// otherwise, create it!
				wpci_create_gateway($slug);
			}
		}
		else {
			wp_die("Can't fix gateway issue. Please click Back, then deactivate and reactivate your WP-CI or WP-CMSPLUS plugin.");
		}
		
		redirect('/wp-admin');
		return true;
	}
	
	function index() {
		$this->load->helper('ui');
		$this->load->view('settings/index');
	}
	
}