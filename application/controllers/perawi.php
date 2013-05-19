<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Perawi extends REST_Controller{

	function all_get($limit)
	{
		if($limit == 0)
		{
			$objPerawi = Model\perawi\Daftar::result()->all();
		}else
		{
			$objPerawi = Model\perawi\Daftar::result()->limit($limit)->all();	
		}
		
		

		if($objPerawi)
		{
            $this->response($objPerawi->to_array(), 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	function one_get($intId)
	{
		$objPerawi = Model\perawi\Daftar::result()->find($intId);

		if($objPerawi)
		{
			$this->response($objPerawi->to_array(), 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}

	function find_by_quality_get($value, $limit)
	{
		if($limit == 0)
		{
			$objPerawi = Model\perawi\Daftar::result()->find_by_Quality($value);
		}else
		{
			$objPerawi = Model\perawi\Daftar::result()->find_by_Quality($value)->limit($limit);
		}
		

		if($objPerawi)
		{
			$this->response($objPerawi->to_array(), 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}
}