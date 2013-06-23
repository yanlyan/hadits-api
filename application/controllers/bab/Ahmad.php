<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ahmad bab
 *
 * @package    Controller\Bab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */

require APPPATH.'/libraries/REST_Controller.php';
class ahmad extends REST_Controller{


	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set devalut orm and response variable
		*/
		$this->orm 			= new Model\databab\Ahmad();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabAhmad = $this->orm->all();
		}else
		{
			$objBabAhmad = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabAhmad as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
		}
		
		if($objBabAhmad)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	/**
	 * Get Abudaud bab data with specific id
	 * 
	 * @param   string  $intid   Bab Abudaud id
	 * @return  json
	 */
	function id_get($intId = 0)
	{
		// Find in database with id

		$objBabAhmad = $this->orm->find($intId);

		// Pasrse data in arrResponse
		$this->arrResponse['id_kitab'] 			= $objBabAhmad->ID_Kitab;
		$this->arrResponse['id_bab'] 			= $objBabAhmad->ID_Bab;
		$this->arrResponse['bab_indonesia'] 	= $objBabAhmad->Bab_Indonesia;
		$this->arrResponse['bab_arab'] 			= $objBabAhmad->Bab_Arab;
		$this->arrResponse['kitab_indonesia'] 	= $objBabAhmad->kitab()->Kitab_Indonesia;
		$this->arrResponse['kitab_arab'] 		= $objBabAhmad->kitab()->Kitab_Arab;

		if($objBabAhmad)
		{
			$this->response($this->arrResponse, 200);
		}
		else
		{
			$this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}

	function idkitab_get($intId = 0)
	{
		// Find in database with id
		$objBabAhmad = $this->orm->find_by_ID_Kitab($intId);

		$this->arrResponse['id_kitab']	 		= $objBabAhmad[0]->ID_Kitab;
		$this->arrResponse['kitab_indonesia']	= $objBabAhmad[0]->kitab()->Kitab_Indonesia;
		$this->arrResponse['kitab_arab'] 		= $objBabAhmad[0]->kitab()->Kitab_Arab;
		foreach ($objBabAhmad as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
		}

		if($objBabAhmad)
		{
			$this->response($this->arrResponse, 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}
}