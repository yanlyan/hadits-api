<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class List_imam extends REST_Controller{

	function all_get()
	{
		// page a new contact object
		$objList = Model\had\Imam::result()->all();

		if($objList)
		{
            $this->response($objList->to_array(), 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	function one_get($intId)
	{
		$objList = Model\had\Imam::result()->find($intId);

		if($objList)
		{
			$this->response($objList->to_array(), 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}

	function sorted_get()
	{
		$objList = Model\had\Imam::result()->order_by('ImamSorting')->all();

		if($objList)
		{
			$this->response($objList->to_array(), 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}
}