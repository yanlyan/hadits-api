<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class m_indeks extends CI_Model{
	function get_all_indeks(){
		$strSql =  "SELECT * FROM ind_list";
		$Query = $this->db->query($strSql);
        if($Query->num_rows() > 0){
            foreach ($Query->result_array() as $arrRow) {
                $arrStrResult[] = $arrRow;
            }
            $Query->free_result();
            return $arrStrResult;
        }else{
            return array();
        }
	}
}

?>