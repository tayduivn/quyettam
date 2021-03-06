<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
/*********************************************************************************
 * By installing or using this file, you are confirming on behalf of the entity
 * subscribed to the SugarCRM Inc. product ("Company") that Company is bound by
 * the SugarCRM Inc. Master Subscription Agreement (“MSA”), which is viewable at:
 * http://www.sugarcrm.com/master-subscription-agreement
 *
 * If Company is not bound by the MSA, then by installing or using this file
 * you are agreeing unconditionally that Company will be bound by the MSA and
 * certifying that you have authority to bind Company accordingly.
 *
 * Copyright (C) 2004-2013 SugarCRM Inc.  All rights reserved.
 ********************************************************************************/

/*********************************************************************************

 * Description:
 ********************************************************************************/







// TaxRate is used to store customer information.
class TaxRate extends SugarBean {
	// Stored fields
	var $id;
	var $deleted;
	var $date_entered;
	var $date_modified;
	var $modified_user_id;
	var $created_by;
	var $created_by_name;
	var $modified_by_name;
	var $name;
	var $status;
	var $value;

	var $table_name = "taxrates";
	var $module_dir = 'TaxRates';
	var $object_name = "TaxRate";

	var $new_schema = true;

	var $importable = true;
	// This is used to retrieve related fields from form posts.
	var $additional_column_fields = Array();

    /**
     * This is a depreciated method, please start using __construct() as this method will be removed in a future version
     *
     * @see __construct
     * @deprecated
     */
    public function TaxRate()
    {
        self::__construct();
    }

	public function __construct() {
		parent::__construct();
		$this->disable_row_level_security =true;
	}


	function get_summary_text()
	{
		return "$this->name";
	}

	function get_taxrates($add_blank=false, $status='Active')
	{
		$query = "SELECT id, name FROM $this->table_name where deleted=0 ";
		if ($status=='Active') {
			$query .= " and status='Active' ";
		}
		elseif ($status=='Inactive') {
			$query .= " and status='Inactive' ";
		}
		elseif ($status=='All') {
		}
		$query .= " order by list_order asc";
		$result = $this->db->query($query, false);
		$GLOBALS['log']->debug("get_taxrates: result is ".print_r($result,true));

		$list = array();
		if ($add_blank) {
			$list['']='';
		}
		//if($this->db->getRowCount($result) > 0){
			// We have some data.
			while (($row = $this->db->fetchByAssoc($result)) != null) {
			//while ($row = $this->db->fetchByAssoc($result)) {
				$list[$row['id']] = $row['name'];
				$GLOBALS['log']->debug("row id is:".$row['id']);
				$GLOBALS['log']->debug("row name is:".$row['name']);
			}
		//}
		return $list;
	}

	function get_default_taxrate_value($status='Active')
	{
		$query = "SELECT value FROM $this->table_name where deleted=0 ";
		if ($status=='Active') {
			$query .= " and status='Active' ";
		}
		elseif ($status=='Inactive') {
			$query .= " and status='Inactive' ";
		}
		elseif ($status=='All') {
		}
		$query .= " order by list_order asc";
		$result = $this->db->query($query, false);
		$GLOBALS['log']->debug("get_taxrates: result is ".print_r($result,true));

		//if($this->db->getRowCount($result) > 0){
			// We have some data.
		$row = $this->db->fetchByAssoc($result);
		if(!empty($row)){
			$result = $row['value'];
		}
		else {
			$result = 0;
		}
		return $result;
	}

	function get_taxrate_js($add_blank=false, $status='Active')
	{
		$query = "SELECT id, value FROM $this->table_name where deleted=0 ";
		if ($status=='Active') {
			$query .= " and status='Active' ";
		}
		elseif ($status=='Inactive') {
			$query .= " and status='Inactive' ";
		}
		elseif ($status=='All') {
		}
		$query .= " order by list_order asc";
		$result = $this->db->query($query, false);
		$GLOBALS['log']->debug("get_taxrates: result is ".print_r($result,true));

		$js  = "<script>\n";
		$js .= "function get_taxrate (id) { \n";
		$js .= "  switch (id) { \n";

		//if($this->db->getRowCount($result) > 0){
			// We have some data.
			while (($row = $this->db->fetchByAssoc($result)) != null){
			//while ($row = $this->db->fetchByAssoc($result)) {
				$js .= "    case '".$row['id']."': \n";
                $value = $row['value'] / 100;
				$js .= "      return ".$value."; \n";
			}
		//}
		$js .= "  } \n";
		$js .= "} \n";
		$js .= "</script> \n";
		return $js;
	}

	function save_relationship_changes($is_update)
    {

    }

	function clear_product_taxrates_relationship($taxrates_id)
	{
		//$query = "UPDATE $this->rel_products set taxrates_id='' where (taxrates_id='$taxrates_id') and deleted=0";
		//$this->db->query($query,true,"Error clearing taxrates to taxrates relationship: ");
	}

	function mark_relationships_deleted($id)
	{
		$this->clear_product_taxrates_relationship($id);
	}

	function fill_in_additional_list_fields()
	{
		$this->fill_in_additional_detail_fields();
	}

	function fill_in_additional_detail_fields()
	{
	}

	function get_list_view_data(){
		$temp_array = $this->get_list_view_array();
        $temp_array["ENCODED_NAME"]=$this->name;
//    	$temp_array["ENCODED_NAME"]=htmlspecialchars($this->name, ENT_QUOTES);
    	return $temp_array;

	}
	/**
		builds a generic search based on the query string using or
		do not include any $this-> because this is called on without having the class instantiated
	*/
	function build_generic_where_clause ($the_query_string) {
	$where_clauses = Array();
	$the_query_string = $this->db->quote($the_query_string);
	array_push($where_clauses, "name like '$the_query_string%'");

	$the_where = "";
	foreach($where_clauses as $clause)
	{
		if($the_where != "") $the_where .= " or ";
		$the_where .= $clause;
	}


	return $the_where;
}


}

?>