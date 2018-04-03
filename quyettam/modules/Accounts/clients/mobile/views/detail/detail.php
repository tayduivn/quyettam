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
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 * Contributor(s): ______________________________________..
 ********************************************************************************/
 
$viewdefs['Accounts']['mobile']['view']['detail'] = array(
	'templateMeta' => array(
                            'maxColumns' => '1', 
                            'widths' => array(
								array('label' => '10', 'field' => '30'), 
                            ),                                  
                           ),
    'panels' => array(
        array(
            'label' => 'LBL_PANEL_DEFAULT',
            'fields' => array(
                array(
                    'name'=>'name',
                    'displayParams'=>array(
                        'required'=>true,
                        'wireless_edit_only'=>true,
                    ),
                ),
                'phone_office',
                array(
                    'name'=>'website',
                    'displayParams'=>array(
                        'type'=>'link',
                    ),
                ),
                'email1',
                'billing_address_street',
                'billing_address_city',
                'billing_address_state',
                'billing_address_postalcode',
                'billing_address_country',
                'shipping_address_street',
                'shipping_address_city',
                'shipping_address_state',
                'shipping_address_postalcode',
                'shipping_address_country',
                'assigned_user_name',
                'team_name',
            ),
        ),
	),
);