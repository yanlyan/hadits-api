<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Tirmidzi bab
 *
 * @package    Controller\Bab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */

require APPPATH.'/libraries/REST_Controller.php';
class tirmidzi extends REST_Controller{


	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set default orm and response variable
		*/
		$this->orm 			= new Model\databab\Tirmidzi();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabTirmidzi = $this->orm->all();
		}else
		{
			$objBabTirmidzi = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabTirmidzi as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
			$this->arrResponse[$key]['kitab']['id_kitab'] = $value->ID_Kitab;
			$this->arrResponse[$key]['kitab']['kitab_indonesia'] 	= $value->kitab()->Kitab_Indonesia;
			$this->arrResponse[$key]['kitab']['kitab_arab'] 		= $value->kitab()->Kitab_Arab;
		}
		
		if($objBabTirmidzi)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	/**
	 * Get Tirmidzi bab data with specific id
	 * 
	 * @param   string  $intid   Bab Tirmidzi id
	 * @return  json
	 */
	function id_get($intId = 0)
	{
		// Find in database with id
		$objBabTirmidzi = $this->orm->find($intId);
		if($objBabTirmidzi)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objBabTirmidzi->ID_Kitab;
			$this->arrResponse['id_bab'] 			= $objBabTirmidzi->ID_Bab;
			$this->arrResponse['bab_indonesia'] 	= $objBabTirmidzi->Bab_Indonesia;
			$this->arrResponse['bab_arab'] 			= $objBabTirmidzi->Bab_Arab;
			$this->arrResponse['kitab_indonesia'] 	= $objBabTirmidzi->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabTirmidzi->kitab()->Kitab_Arab;
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
		$objBabTirmidzi = $this->orm->find_by_ID_Kitab($intId);
		if($objBabTirmidzi)
		{
			$this->arrResponse['id_kitab']	 		= $objBabTirmidzi[0]->ID_Kitab;
			$this->arrResponse['kitab_indonesia']	= $objBabTirmidzi[0]->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabTirmidzi[0]->kitab()->Kitab_Arab;
			foreach ($objBabTirmidzi as $key => $value) {
				// Pasrse data in arrResponse
				$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
				$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
				$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
			}
			$this->response($this->arrResponse, 200);
		}
		else
		{
			 $this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}
}