<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Imam extends REST_Controller{

	function all_get()
	{
		// page a new contact object
		$objImam = Model\biografi\Imam::result()->all();

		if($objImam)
		{
            $this->response($objImam->to_array(), 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}
}