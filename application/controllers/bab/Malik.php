<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * malik bab
 *
 * @package    Controller\Bab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */

require APPPATH.'/libraries/REST_Controller.php';
class malik extends REST_Controller{


	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set default orm and response variable
		*/
		$this->orm 			= new Model\databab\Malik();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabMalik = $this->orm->all();
		}else
		{
			$objBabMalik = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabMalik as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
			$this->arrResponse[$key]['kitab']['id_kitab'] = $value->ID_Kitab;
			$this->arrResponse[$key]['kitab']['kitab_indonesia'] 	= $value->kitab()->Kitab_Indonesia;
			$this->arrResponse[$key]['kitab']['kitab_arab'] 		= $value->kitab()->Kitab_Arab;
		}
		
		if($objBabMalik)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	/**
	 * Get Malik bab data with specific id
	 * 
	 * @param   string  $intid   Bab Malik id
	 * @return  json
	 */
	function id_get($intId = 0)
	{
		// Find in database with id
		$objBabMalik = $this->orm->find($intId);

		if($objBabMalik)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objBabMalik->ID_Kitab;
			$this->arrResponse['id_bab'] 			= $objBabMalik->ID_Bab;
			$this->arrResponse['bab_indonesia'] 	= $objBabMalik->Bab_Indonesia;
			$this->arrResponse['bab_arab'] 			= $objBabMalik->Bab_Arab;
			$this->arrResponse['kitab_indonesia'] 	= $objBabMalik->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabMalik->kitab()->Kitab_Arab;
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
		$objBabMalik = $this->orm->find_by_ID_Kitab($intId);
		if($objBabMalik)
		{
			$this->arrResponse['id_kitab']	 		= $objBabMalik[0]->ID_Kitab;
			$this->arrResponse['kitab_indonesia']	= $objBabMalik[0]->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabMalik[0]->kitab()->Kitab_Arab;
			foreach ($objBabMalik as $key => $value) {
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

		$objBabMalik = $this->orm->all();
		
		if($objBabMalik){
			foreach ($objBabMalik as $key => $value) {
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