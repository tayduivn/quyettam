<?php
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

    $dictionary['C_Holiday'] = array(
        'table'=>'c_holiday',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'holiday_date' =>
            array (
                'name' => 'holiday_date',
                'type' => 'date',
                'vname' => 'LBL_HOLIDAY_DATE',
                'required' => true,
                'importable' => 'required',
            ),
        ),
        'relationships'=>array (
        ),
        'optimistic_locking'=>true,
        'unified_search'=>true,
    );
    if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
    }
    VardefManager::createVardef('C_Holiday','C_Holiday', array('basic','team_security','assignable'));