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


$module_name='C_BookingTicket';
$subpanel_layout = array(
	'top_buttons' => array(
		array('widget_class' => 'SubPanelTopCreateButton'),
		array('widget_class' => 'SubPanelTopSelectButton', 'popup_module' => $module_name),
	),

	'where' => '',

	'list_fields' => array(
        
		'name'=> array(
	 		'vname' => 'LBL_NAME',
			'widget_class' => 'SubPanelDetailViewLink',
	 		'width' => '20%',
		),
        
        'parent_name' => array(
            'vname'   => 'LBL_PARENT_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'target_recoded_key' => 'parent_id',
            'width'  =>'20%'
        ),
        'status' => array(
            'vname'  =>'LBL_STATUS',
            'width'  => '10%'
        ),
        'booking_date' => array(
            'vname'  => 'LBL_BOOKING_DATE',
            'width'  => '15%'
        ),
        'booking_type' => array(
            'vname' => 'LBL_BOOKING_TYPE',
            'width' => '15%',
        ),
        'assigned_user_name' => array(
            'name'  => 'assigned_user_name',
            'vname' => 'LBL_ASSIGNED_TO_NAME',
            'widget_class' => 'SubPanelDetailViewLink',
            'width' => '15%',
            'target_record_key' => 'assigned_user_id',
            'target_module' => 'Employees'
        )
		//'date_modified'=>array(
//	 		'vname' => 'LBL_DATE_MODIFIED',
//	 		'width' => '45%',
//		),
//		'edit_button'=>array(
//            'vname' => 'LBL_EDIT_BUTTON',
//			'widget_class' => 'SubPanelEditButton',
//		 	'module' => $module_name,
//	 		'width' => '4%',
//		),
//		'remove_button'=>array(
//            'vname' => 'LBL_REMOVE',
//			'widget_class' => 'SubPanelRemoveButton',
//		 	'module' => $module_name,
//			'width' => '5%',
//		),
	),
);

?>