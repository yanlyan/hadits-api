<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * bukhari bab
 *
 * @package    Controller\Bab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */

require APPPATH.'/libraries/REST_Controller.php';
class bukhari extends REST_Controller{


	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set default orm and response variable
		*/
		$this->orm 			= new Model\databab\Bukhari();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabBukhari = $this->orm->all();
		}else
		{
			$objBabBukhari = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabBukhari as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
		}
		
		if($objBabBukhari)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	/**
	 * Get Bukhari bab data with specific id
	 * 
	 * @param   string  $intid   Bab Bukhari id
	 * @return  json
	 */
	function id_get($intId = 0)
	{
		// Find in database with id
		$objBabBukhari = $this->orm->find($intId);
		if($objBabBukhari)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objBabBukhari->ID_Kitab;
			$this->arrResponse['id_bab'] 			= $objBabBukhari->ID_Bab;
			$this->arrResponse['bab_indonesia'] 	= $objBabBukhari->Bab_Indonesia;
			$this->arrResponse['bab_arab'] 			= $objBabBukhari->Bab_Arab;
			$this->arrResponse['kitab_indonesia'] 	= $objBabBukhari->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabBukhari->kitab()->Kitab_Arab;
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
		$objBabBukhari = $this->orm->find_by_ID_Kitab($intId);
		if($objBabBukhari)
		{
			$this->arrResponse['id_kitab']	 		= $objBabBukhari[0]->ID_Kitab;
			$this->arrResponse['kitab_indonesia']	= $objBabBukhari[0]->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabBukhari[0]->kitab()->Kitab_Arab;
			foreach ($objBabBukhari as $key => $value) {
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