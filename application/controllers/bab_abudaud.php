<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Bab_abudaud extends REST_Controller{

	function all_get($limit)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabAbudaud = Model\databab\Abudaud::all();
		}else
		{
			$objBabAbudaud = Model\databab\Abudaud::limit($limit)->all();	
		}
		

		if($objBabAbudaud)
		{
            $this->response($objBabAbudaud, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	function by_id_bab_get($intId)
	{
		$objBabAbudaud = Model\databab\Abudaud::find_by_ID_Bab($intId);

		if($objBabAbudaud)
		{
			$this->response($objBabAbudaud, 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}

	function by_id_kitab_get($intId)
	{
		$objBabAbudaud = Model\databab\Abudaud::find_by_ID_Kitab($intId);

		if($objBabAbudaud)
		{
			$this->response($objBabAbudaud, 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}
}