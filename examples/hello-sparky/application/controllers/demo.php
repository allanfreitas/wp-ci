<?php
class Demo extends Controller {
	
	/**
	 * @title(Hello, Sparky!)
	 */
	function index() {
		$this->load->view('demo');
	}
	
	/**
	 * @title(Links and Forms)
	 */
	function links() {
		$this->load->view('links');
	}
	
}