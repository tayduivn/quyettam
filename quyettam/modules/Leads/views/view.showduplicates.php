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


/**
 * view.showduplicates.php
 *
 * This is the SugarView subclass to handle displaying the list of duplicate Leads found when attempting to create
 * a new Lead.  This class is called from the LeadFormBase class handleSave function.
 */
class ViewShowDuplicates extends SugarView
{

    function display()
    {
        global $app_strings;
        global $app_list_strings;
        global $theme;
        global $current_language;
        global $mod_strings;

        if(!isset($_SESSION['SHOW_DUPLICATES']))
        {
            $GLOBALS['log']->error("Unauthorized access to this area.");
            sugar_die("Unauthorized access to this area.");
        }

        parse_str($_SESSION['SHOW_DUPLICATES'],$_POST);
        unset($_SESSION['SHOW_DUPLICATES']);


        $lead = new Lead();
        require_once('modules/Leads/LeadFormBase.php');
        $leadForm = new LeadFormBase();
        $GLOBALS['check_notify'] = FALSE;

        $query = 'SELECT id, first_name, last_name, title FROM leads WHERE deleted=0 ';

        $duplicates = $_POST['duplicate'];
        $count = count($duplicates);
        if ($count > 0)
        {
            $query .= "and (";
            $first = true;
            foreach ($duplicates as $duplicate_id)
            {
                if (!$first) $query .= ' OR ';
                $first = false;
                $query .= "id='$duplicate_id' ";
            }
            $query .= ')';
        }

        $duplicateLeads = array();
        $db = DBManagerFactory::getInstance();
        $result = $db->query($query);
        $i=0;
        while (($row=$db->fetchByAssoc($result)) != null) {
            $duplicateLeads[$i] = $row;
            $i++;
        }

        $this->ss->assign('FORMBODY', $leadForm->buildTableForm($duplicateLeads));

        $input = '';
        foreach ($lead->column_fields as $field)
        {
            if (!empty($_POST['Leads'.$field])) {
                $input .= "<input type='hidden' name='$field' value='${_POST['Leads'.$field]}'>\n";
            }
        }

        foreach ($lead->additional_column_fields as $field)
        {
            if (!empty($_POST['Leads'.$field])) {
                $input .= "<input type='hidden' name='$field' value='${_POST['Leads'.$field]}'>\n";
            }
        }

        // Bug 25311 - Add special handling for when the form specifies many-to-many relationships
        if(!empty($_POST['Leadsrelate_to'])) {
            $input .= "<input type='hidden' name='relate_to' value='{$_POST['Leadsrelate_to']}'>\n";
        }

        if(!empty($_POST['Leadsrelate_id'])) {
            $input .= "<input type='hidden' name='relate_id' value='{$_POST['Leadsrelate_id']}'>\n";
        }

        $input .= get_teams_hidden_inputs('Leads');

        $emailAddress = new SugarEmailAddress();
        $input .= $emailAddress->getEmailAddressWidgetDuplicatesView($lead);

        $get = '';
        if(!empty($_POST['return_module']))
        {
            $this->ss->assign('RETURN_MODULE', $_POST['return_module']);
        } else {
            $get .= "Leads";
        }

        $get .= "&return_action=";
        if(!empty($_POST['return_action']))
        {
            $this->ss->assign('RETURN_ACTION', $_POST['return_action']);
        } else {
            $get .= "DetailView";
        }

        ///////////////////////////////////////////////////////////////////////////////
        ////	INBOUND EMAIL WORKFLOW
        if(isset($_REQUEST['inbound_email_id'])) {
            $this->ss->assign('INBOUND_EMAIL_ID', $_REQUEST['inbound_email_id']);
            $this->ss->assign('RETURN_MODULE', 'Emails');
            $this->ss->assign('RETURN_ACTION', 'EditView');
            if(isset($_REQUEST['start'])) {
               $this->ss->assign('START', $_REQUEST['start']);
            }
        }
        ////	END INBOUND EMAIL WORKFLOW
        ///////////////////////////////////////////////////////////////////////////////
        if(!empty($_POST['popup']))
        {
            $input .= '<input type="hidden" name="popup" value="'.$_POST['popup'].'">';
        } else {
            $input .= '<input type="hidden" name="popup" value="false">';
        }

        if(!empty($_POST['to_pdf']))
        {
            $input .= '<input type="hidden" name="to_pdf" value="'.$_POST['to_pdf'].'">';
        } else {
            $input .= '<input type="hidden" name="to_pdf" value="false">';
        }

        if(!empty($_POST['create']))
        {
            $input .= '<input type="hidden" name="create" value="'.$_POST['create'].'">';
        } else {
            $input .= '<input type="hidden" name="create" value="false">';
        }

        if(!empty($_POST['return_id']))
        {
            $this->ss->assign('RETURN_ID', $_POST['return_id']);
        }

        $this->ss->assign('INPUT_FIELDS', $input);

        $saveLabel = string_format($app_strings['LBL_SAVE_OBJECT'], array($this->module));
        $this->ss->assign('TITLE', getClassicModuleTitle('Leads', array($this->module, $saveLabel), true));
        //Load the appropriate template
        $this->ss->displayCustom('modules/Leads/tpls/ShowDuplicates.tpl');
    }

}
