<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Indeks extends REST_Controller{

	function all_get()
	{
		// page a new contact object
		$objIndeks = Model\ind\Lists::all();

		if($objIndeks)
		{
            $this->response($objIndeks, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	function one_get($intId)
	{
		$objIndeks = Model\ind\Lists::find($intId);

		if($objIndeks)
		{
			$this->response($objIndeks, 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}

	function by_judul_get($strJudul)
	{
		$objIndeks = Model\ind\Lists::find_by_Judul_Indeks($strJudul);

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