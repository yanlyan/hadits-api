<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * nasai bab
 *
 * @package    Controller\Bab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */

require APPPATH.'/libraries/REST_Controller.php';
class nasai extends REST_Controller{


	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set default orm and response variable
		*/
		$this->orm 			= new Model\databab\Nasai();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabNasai = $this->orm->all();
		}else
		{
			$objBabNasai = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabNasai as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
		}
		
		if($objBabNasai)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	/**
	 * Get Nasai bab data with specific id
	 * 
	 * @param   string  $intid   Bab Nasai id
	 * @return  json
	 */
	function id_get($intId = 0)
	{
		// Find in database with id
		$objBabNasai = $this->orm->find($intId);
		if($objBabNasai)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objBabNasai->ID_Kitab;
			$this->arrResponse['id_bab'] 			= $objBabNasai->ID_Bab;
			$this->arrResponse['bab_indonesia'] 	= $objBabNasai->Bab_Indonesia;
			$this->arrResponse['bab_arab'] 			= $objBabNasai->Bab_Arab;
			$this->arrResponse['kitab_indonesia'] 	= $objBabNasai->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabNasai->kitab()->Kitab_Arab;
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
		$objBabNasai = $this->orm->find_by_ID_Kitab($intId);
		if($objBabNasai)
		{
			$this->arrResponse['id_kitab']	 		= $objBabNasai[0]->ID_Kitab;
			$this->arrResponse['kitab_indonesia']	= $objBabNasai[0]->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabNasai[0]->kitab()->Kitab_Arab;
			foreach ($objBabNasai as $key => $value) {
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