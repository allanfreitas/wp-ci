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
	
	/**
	 * @ajax
	 */
	function ajax() {
		echo json_encode(array(
			'one' => 1,
			'two' => 'two', 
			'three' => array(1, 2, 3),
			'obj' => new stdClass,
			'bool' => true	
		));
	}
	
}