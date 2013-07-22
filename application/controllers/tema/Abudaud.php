<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * abudaud tema
 *
 * @package    Controller\Tema
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
		* @var  Set default ORM and response variable
		*/
		$this->orm 			= new Model\tema\Abudaud();
		$this->arrResponse 	= array();
	}

	function all_get($limit = 0)
	{
		if ($limit == 0) {
			$objTemaAbudaud = $this->orm->all();
		} else {
			$objTemaAbudaud = $this->orm->limit($limit)->all();
		}

		foreach ($objTemaAbudaud as $key => $value) {
			$this->arrResponse[$key]['no_hadits'] 						= $value->NoHdt;
			$this->arrResponse[$key]['isi_hadits']['isi_arab'] 			= $value->hadits()->Isi_Arab;
			$this->arrResponse[$key]['isi_hadits']['isi_indonesia'] 	= $value->hadits()->Isi_Indonesia;
			$this->arrResponse[$key]['isi_hadits']['isi_arab_gundul'] 	= $value->hadits()->Isi_Arab_Gundul;
			$this->arrResponse[$key]['tema_indonesia'] 					= $value->Tema_Indonesia;
			$this->arrResponse[$key]['tema_arab'] 						= $value->Tema_Arab;
			$this->arrResponse[$key]['kitab']['id_kitab'] 				= $value->kitab()->ID_Kitab;
			$this->arrResponse[$key]['kitab']['kitab_indonesia'] 		= $value->kitab()->Kitab_Indonesia;
			$this->arrResponse[$key]['kitab']['kitab_arab'] 			= $value->kitab()->Kitab_Indonesia;
			$this->arrResponse[$key]['bab']['id_bab'] 					= $value->bab()->ID_Bab;
			$this->arrResponse[$key]['bab']['bab_indonesia'] 			= $value->bab()->Bab_Indonesia;
			$this->arrResponse[$key]['bab']['bab_arab'] 				= $value->bab()->Bab_Arab;
		}

		if ($objTemaAbudaud) {
			$this->response($this->arrResponse, 200);
		} else {
			$this->response(array('error' => 'Couldn\'t find any hadits!'), 404);
		}
	}

	

}