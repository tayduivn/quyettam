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

global $mod_strings;
$module_menu = Array(
	Array("index.php?module=ACLRoles&action=EditView", $mod_strings['LBL_CREATE_ROLE'],"CreateRoles"),
	Array("index.php?module=ACLRoles&action=index", $mod_strings['LIST_ROLES'],"Roles"),
	Array("index.php?module=ACLRoles&action=ListUsers", $mod_strings['LIST_ROLES_BY_USER'],"Roles"),
	
	);
?>