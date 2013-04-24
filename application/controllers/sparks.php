<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sparks extends CI_Controller{

	function index()
	{
		$this->example_spark->printHello();
	}
} 