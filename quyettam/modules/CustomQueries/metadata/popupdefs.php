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


$popupMeta = array('moduleMain' => 'CustomQuery',
						'varName' => 'CUSTOMQUERY',
						'className' => 'CustomQuery',
						'orderBy' => 'name',
						'whereClauses' => 
							array('name' => 'custom_queries.name', 
								  'query_name' => 'custom_queries.query_type',
								  'description' => 'custom_queries.description'),
						'listviewdefs' => array(
											'NAME' => array(
												'width' => '20', 
												'label' => 'LBL_LIST_NAME',
												'link' => true,
										        'default' => true), 
											'QUERY_TYPE' => array(
												'width' => '20', 
												'label' => 'LBL_QUERY_TYPE', 
												'link' => false,
										        'default' => true), 
											'DESCRIPTION' => array(
												'width' => '20', 
												'label' => 'LBL_LIST_DESCRIPTION', 
												'link' => false,
										        'default' => true),
											),
						'searchdefs'   => array(
										 	'name', 
											'query_type', 
											'description',
										  )
						);
?>
 