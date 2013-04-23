<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Indeks extends REST_Controller{

	function indeks_all_get()
	{
		$this->load->model('m_indeks');
		$objIndeks = $this->m_indeks->get_all_indeks();

		if($objIndeks)
		{
            $this->response($objIndeks, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}
} 