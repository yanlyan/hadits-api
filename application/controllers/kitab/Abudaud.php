<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * abudaud kitab
 *
 * @package    Controller\Kitab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */


require APPPATH.'/libraries/REST_Controller.php';
class abudaud extends REST_Controller{

	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set default orm and response variable
		*/
		$this->orm 			= new Model\datakitab\Abudaud();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objKitabAbudaud = $this->orm->all();
		}else
		{
			$objKitabAbudaud = $this->orm->limit($limit)->all();	
		}
		foreach ($objKitabAbudaud as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_kitab'] 			= $value->ID_Kitab;
			$this->arrResponse[$key]['kitab_indonesia'] 	= $value->Kitab_Indonesia;
			$this->arrResponse[$key]['kitab_arab']	 		= $value->Kitab_Arab;
		}
		
		if($objKitabAbudaud)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	function id_get($intId = 0)
	{
		// Find in database with id
		$objKitabAbudaud = $this->orm->find($intId);
		if($objKitabAbudaud)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objKitabAbudaud->ID_Kitab;
			$this->arrResponse['kitab_indonesia'] 	= $objKitabAbudaud->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objKitabAbudaud->Kitab_Arab;
			$this->response($this->arrResponse, 200);
		}
		else
		{
			$this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}

	

}