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

 * Description:  Contains a variety of utility functions used to display UI
 * components such as form headers and footers.  Intended to be modified on a per
 * theme basis.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/

/**
 * Create javascript to validate the data entered into a record.
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 */
function get_validate_record_js () {
global $mod_strings;
global $app_strings;

$lbl_last_name = $mod_strings['LBL_LIST_LAST_NAME'];
$lbl_user_name = $mod_strings['LBL_LIST_USER_NAME'];
$err_missing_required_fields = $app_strings['ERR_MISSING_REQUIRED_FIELDS'];
$err_invalid_email_address = $app_strings['ERR_INVALID_EMAIL_ADDRESS'];

$the_script  = <<<EOQ

<script type="text/javascript" language="Javascript">
function verify_data(form) {
	var isError = false;
	var errorMessage = "";
	if (trim(form.last_name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_last_name";
	}
	if (trim(form.user_name.value) == "") {
		isError = true;
		errorMessage += "\\n$lbl_user_name";
	}

	if (isError == true) {
		alert("$err_missing_required_fields" + errorMessage);
		return false;
	}
	if (trim(form.email1.value) != "" && !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(form.email1.value)) {
		alert('"' + form.email1.value + '" $err_invalid_email_address');
		return false;
	}
	if (trim(form.email2.value) != "" && !/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/.test(form.email2.value)) {
		alert('"' + form.email2.value + '" $err_invalid_email_address');
		return false;
	}

	return true;
}
</script>

EOQ;

return $the_script;
}

?>