<?PHP
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

/**
 * THIS CLASS IS GENERATED BY MODULE BUILDER
 * PLEASE DO NOT CHANGE THIS CLASS
 * PLACE ANY CUSTOMIZATIONS IN C_Category
 */

require_once('include/SugarObjects/templates/file/File.php');

class C_Category_sugar extends File {
	var $new_schema = true;
	var $module_dir = 'C_Category';
	var $object_name = 'C_Category';
	var $table_name = 'c_category';
	var $importable = true;
		var $id;
		var $date_entered;
		var $date_modified;
		var $modified_user_id;
		var $modified_by_name;
		var $created_by;
		var $created_by_name;
		var $description;
		var $deleted;
		var $created_by_link;
		var $modified_user_link;
		var $team_id;
		var $team_set_id;
		var $team_count;
		var $team_name;
		var $team_link;
		var $team_count_link;
		var $teams;
		var $assigned_user_id;
		var $assigned_user_name;
		var $assigned_user_link;
		var $document_name;
		var $filename;
		var $file_ext;
		var $file_mime_type;
		var $uploadfile;
		var $active_date;
		var $exp_date;
		var $category_id;
		var $subcategory_id;
		var $status_id;
		var $status;
		var $code;
		
	/**
	 * This is a depreciated method, please start using __construct() as this method will be removed in a future version
     *
     * @see __construct
     * @depreciated
	 */
	function C_Category_sugar(){
		self::__construct();
	}

	public function __construct(){
		parent::__construct();
	}
	
	public function bean_implements($interface){
		switch($interface){
			case 'ACL': return true;
		}
		return false;
}
		
}
?>