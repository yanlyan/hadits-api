<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * abudaud bab
 *
 * @package    Controller\Bab
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
		$this->orm 			= new Model\databab\Abudaud();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabAbudaud = $this->orm->all();
		}else
		{
			$objBabAbudaud = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabAbudaud as $key => $value) {
			// Parse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
			$this->arrResponse[$key]['kitab']['id_kitab'] = $value->ID_Kitab;
			$this->arrResponse[$key]['kitab']['kitab_indonesia'] 	= $value->kitab()->Kitab_Indonesia;
			$this->arrResponse[$key]['kitab']['kitab_arab'] 		= $value->kitab()->Kitab_Arab;
		}
		
		if($objBabAbudaud)
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
		$objBabAbudaud = $this->orm->find($intId);
		if($objBabAbudaud)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objBabAbudaud->ID_Kitab;
			$this->arrResponse['id_bab'] 			= $objBabAbudaud->ID_Bab;
			$this->arrResponse['bab_indonesia'] 	= $objBabAbudaud->Bab_Indonesia;
			$this->arrResponse['bab_arab'] 			= $objBabAbudaud->Bab_Arab;
			$this->arrResponse['kitab_indonesia'] 	= $objBabAbudaud->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabAbudaud->kitab()->Kitab_Arab;
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
		$objBabAbudaud = $this->orm->find_by_ID_Kitab($intId);
		
		if($objBabAbudaud)
		{
			$this->arrResponse['id_kitab']	 		= $objBabAbudaud[0]->ID_Kitab;
			$this->arrResponse['kitab_indonesia']	= $objBabAbudaud[0]->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabAbudaud[0]->kitab()->Kitab_Arab;
			foreach ($objBabAbudaud as $key => $value) {
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
	function search_get($strKeyword, $limit = 0)
	{
		$strKeyword = urldecode($strKeyword);

		$this->orm->like('bab_indonesia' ,$strKeyword);
		$this->orm->or_like('bab_arab',$strKeyword);
		
		if($limit > 0) 
			$this->orm->limit($limit);

		$objBabAbudaud = $this->orm->all();
		
		if($objBabAbudaud){
			foreach ($objBabAbudaud as $key => $value) {
				// Parse data in arrResponse
				$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
				$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
				$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
				$this->arrResponse[$key]['kitab']['id_kitab'] = $value->ID_Kitab;
				$this->arrResponse[$key]['kitab']['kitab_indonesia'] 	= $value->kitab()->Kitab_Indonesia;
				$this->arrResponse[$key]['kitab']['kitab_arab'] 		= $value->kitab()->Kitab_Arab;
			}
			$this->response($this->arrResponse);

		}
		else
		{
			$this->response(array('error' => 'Couldn\'t find any users!'), 404);
		}
	}
}