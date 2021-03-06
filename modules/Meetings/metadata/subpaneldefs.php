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


    $layout_defs['Meetings'] = array( 
        // list of what Subpanels to show in the DetailView 
        'subpanel_setup' => array(
            'contacts' => array(
                'top_buttons' => array(
                    0 => array (
                        'widget_class' => 'SubPanelMeetingSelectStudent',
                    ),
                ),        
                'order' => 10,
                'module' => 'Contacts',
                'sort_order' => 'asc',
                'sort_by' => 'last_name, first_name',
                'subpanel_name' => 'ForMeetings',
                'get_subpanel_data'=>'contacts',
                'title_key' => 'LBL_CONTACTS_SUBPANEL_TITLE',
            ),
            'users' => array(
                'top_buttons' => array(),    
                'order' => 20,
                'module' => 'Users',
                'sort_order' => 'asc',
                'sort_by' => 'name',
                'subpanel_name' => 'ForMeetings',
                'get_subpanel_data'=>'users',
                'title_key' => 'LBL_USERS_SUBPANEL_TITLE',
            ),
            'leads' => array(
                'order' => 30,
                'module' => 'Leads',
                'sort_order' => 'asc',
                'sort_by' => 'last_name, first_name',
                'subpanel_name' => 'ForMeetings',
                'get_subpanel_data' => 'leads',
                'title_key' => 'LBL_LEADS_SUBPANEL_TITLE',
                'top_buttons' => array(                 
                    //0 => array (
//                        'widget_class' => 'SubPanelTopSelectButton',
//                    ),
                ),
            ),
            'history' => array(
                'order' => 40,
                'sort_order' => 'desc',
                'sort_by' => 'date_entered',
                'title_key' => 'LBL_HISTORY_SUBPANEL_TITLE',
                'type' => 'collection',
                'subpanel_name' => 'history',   //this values is not associated with a physical file.
                'header_definition_from_subpanel'=> 'meetings',
                'module'=>'History',

                'top_buttons' => array(
                    array('widget_class' => 'SubPanelTopCreateNoteButton'),
                ),	

                'collection_list' => array(		
                    'notes' => array(
                        'module' => 'Notes',
                        'subpanel_name' => 'ForMeetings',
                        'get_subpanel_data' => 'notes',
                    ),		
                )			
            ),
        ),
    );
?>
