<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * muslim bab
 *
 * @package    Controller\Bab
 * @author     Hadits API Dev
 * @copyright  (c) 2013
 * @version    0.1
 */

require APPPATH.'/libraries/REST_Controller.php';
class muslim extends REST_Controller{


	function __construct()
	{
		parent::__construct();
		/**
		* @var  Set default orm and response variable
		*/
		$this->orm 			= new Model\databab\Muslim();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		// page a new contact object
		if($limit == 0)
		{
			$objBabMuslim = $this->orm->all();
		}else
		{
			$objBabMuslim = $this->orm->limit($limit)->all();	
		}
		foreach ($objBabMuslim as $key => $value) {
			// Pasrse data in arrResponse
			$this->arrResponse[$key]['id_bab'] 			= $value->ID_Bab;
			$this->arrResponse[$key]['bab_indonesia'] 	= $value->Bab_Indonesia;
			$this->arrResponse[$key]['bab_arab'] 		= $value->Bab_Arab;
			$this->arrResponse[$key]['kitab']['id_kitab'] = $value->ID_Kitab;
			$this->arrResponse[$key]['kitab']['kitab_indonesia'] 	= $value->kitab()->Kitab_Indonesia;
			$this->arrResponse[$key]['kitab']['kitab_arab'] 		= $value->kitab()->Kitab_Arab;
		}
		
		if($objBabMuslim)
		{
			$this->response($this->arrResponse, 200);
        }

        else
        {
            $this->response(array('error' => 'Couldn\'t find any users!'), 404);
        }
	}

	/**
	 * Get Muslim bab data with specific id
	 * 
	 * @param   string  $intid   Bab Muslim id
	 * @return  json
	 */
	function id_get($intId = 0)
	{
		// Find in database with id
		$objBabMuslim = $this->orm->find($intId);
		if($objBabMuslim)
		{
			// Pasrse data in arrResponse
			$this->arrResponse['id_kitab'] 			= $objBabMuslim->ID_Kitab;
			$this->arrResponse['id_bab'] 			= $objBabMuslim->ID_Bab;
			$this->arrResponse['bab_indonesia'] 	= $objBabMuslim->Bab_Indonesia;
			$this->arrResponse['bab_arab'] 			= $objBabMuslim->Bab_Arab;
			$this->arrResponse['kitab_indonesia'] 	= $objBabMuslim->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabMuslim->kitab()->Kitab_Arab;
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
		$objBabMuslim = $this->orm->find_by_ID_Kitab($intId);

		

		if($objBabMuslim)
		{
			$this->arrResponse['id_kitab']	 		= $objBabMuslim[0]->ID_Kitab;
			$this->arrResponse['kitab_indonesia']	= $objBabMuslim[0]->kitab()->Kitab_Indonesia;
			$this->arrResponse['kitab_arab'] 		= $objBabMuslim[0]->kitab()->Kitab_Arab;
			foreach ($objBabMuslim as $key => $value) {
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