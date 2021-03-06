<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * ibnumajah bab
 *
 * @package    Controller\Bab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */

require APPPATH.'/libraries/REST_Controller.php';
class ibnumajah extends REST_Controller{


	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set default orm and response variable
		*/
		$this->orm 			= new Model\databab\Ibnumajah();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabIbnumajah = $this->orm->all();
		}else
		{
			$objBabIbnumajah = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabIbnumajah as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
			$this->arrResponse[$key]['kitab']['id_kitab'] = $value->ID_Kitab;
			$this->arrResponse[$key]['kitab']['kitab_indonesia'] 	= $value->kitab()->Kitab_Indonesia;
			$this->arrResponse[$key]['kitab']['kitab_arab'] 		= $value->kitab()->Kitab_Arab;
		}
		
		if($objBabIbnumajah)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	/**
	 * Get Ibnumajah bab data with specific id
	 * 
	 * @param   string  $intid   Bab Ibnumajah id
	 * @return  json
	 */
	function id_get($intId = 0)
	{
		// Find in database with id
		$objBabIbnumajah = $this->orm->find($intId);

		if($objBabIbnumajah)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objBabIbnumajah->ID_Kitab;
			$this->arrResponse['id_bab'] 			= $objBabIbnumajah->ID_Bab;
			$this->arrResponse['bab_indonesia'] 	= $objBabIbnumajah->Bab_Indonesia;
			$this->arrResponse['bab_arab'] 			= $objBabIbnumajah->Bab_Arab;
			$this->arrResponse['kitab_indonesia'] 	= $objBabIbnumajah->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabIbnumajah->kitab()->Kitab_Arab;
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
		$objBabIbnumajah = $this->orm->find_by_ID_Kitab($intId);
		if($objBabIbnumajah)
		{
			$this->arrResponse['id_kitab']	 		= $objBabIbnumajah[0]->ID_Kitab;
			$this->arrResponse['kitab_indonesia']	= $objBabIbnumajah[0]->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabIbnumajah[0]->kitab()->Kitab_Arab;
			foreach ($objBabIbnumajah as $key => $value) {
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

		$objBabIbnumajah = $this->orm->all();
		
		if($objBabIbnumajah){
			foreach ($objBabIbnumajah as $key => $value) {
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