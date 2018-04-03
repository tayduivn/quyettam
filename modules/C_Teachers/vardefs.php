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

    $dictionary['C_Teachers'] = array(
        'table'=>'c_teachers',
        'audited'=>true,
        'duplicate_merge'=>true,
        'fields'=>array (
            'dob' =>
            array (
                'required' => false,
                'name' => 'dob',
                'vname' => 'LBL_DOB',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'enable_range_search' => false,
            ),
            'nationality' =>
            array (
                'required' => false,
                'name' => 'nationality',
                'vname' => 'LBL_NATIONALITY',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => '200',
                'size' => '20',
            ),
            'visa_number' =>
            array (
                'required' => false,
                'name' => 'visa_number',
                'vname' => 'LBL_VISA_NUMBER',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => '255',
                'size' => '20',
            ),
            'passport_number' =>
            array (
                'required' => false,
                'name' => 'passport_number',
                'vname' => 'LBL_PASSPORT_NUMBER',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => '255',
                'size' => '20',
            ),
            'visa_type' =>
            array (
                'required' => false,
                'name' => 'visa_type',
                'vname' => 'LBL_VISA_TYPE',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => '100',
                'size' => '20',
            ),
            'visa_expiration_date' =>
            array (
                'required' => false,
                'name' => 'visa_expiration_date',
                'vname' => 'LBL_VISA_EXPIRATION_DATE',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'enable_range_search' => false,
            ),
            'teaching_cerificate' =>
            array (
                'required' => false,
                'name' => 'teaching_cerificate',
                'vname' => 'LBL_TEACHING_CERIFICATE',
                'type' => 'text',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'studio' => 'visible',
                'rows' => '4',
                'cols' => '60',
            ),
            'experience' =>
            array (
                'required' => false,
                'name' => 'experience',
                'vname' => 'LBL_EXPERIENCE',
                'type' => 'text',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'studio' => 'visible',
                'rows' => '4',
                'cols' => '60',
            ),
            'strength' =>
            array (
                'required' => false,
                'name' => 'strength',
                'vname' => 'LBL_STRENGTH',
                'type' => 'text',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'studio' => 'visible',
                'rows' => '4',
                'cols' => '60',
            ),
            'weakness' =>
            array (
                'required' => false,
                'name' => 'weakness',
                'vname' => 'LBL_WEAKNESS',
                'type' => 'text',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'studio' => 'visible',
                'rows' => '4',
                'cols' => '60',
            ),
            'interest' =>
            array (
                'required' => false,
                'name' => 'interest',
                'vname' => 'LBL_INTEREST',
                'type' => 'text',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'studio' => 'visible',
                'rows' => '4',
                'cols' => '60',
            ),
            'married' =>
            array (
                'required' => false,
                'name' => 'married',
                'vname' => 'LBL_MARRIED',
                'type' => 'enum',
                'massupdate' => 0,
                'default' => 'Yes',
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 100,
                'size' => '20',
                'options' => 'married_teachers_list',
                'studio' => 'visible',
                'dependency' => false,
            ),
            'contract_date' =>
            array (
                'required' => false,
                'name' => 'contract_date',
                'vname' => 'LBL_CONTRACT_DATE',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => true,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'enable_range_search' => false,
            ),
            'contract_until' =>
            array (
                'required' => false,
                'name' => 'contract_until',
                'vname' => 'LBL_CONTRACT_UNTIL',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'true',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => true,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'enable_range_search' => false,
            ),
            //Add field - 16/07/2014 - by MTN
            'teacher_id' =>
            array (
                'required' => false,
                'name' => 'teacher_id',
                'vname' => 'LBL_TEACHER_ID',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => '100',
                'size' => '20',
            ),
            'type' =>
            array (
                'required' => true,
                'name' => 'type',
                'vname' => 'LBL_TYPE',
                'type' => 'enum',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 100,
                'size' => '20',
                'options' => 'teacher_type_list',
                'studio' => 'visible',
                'dependency' => false,
            ),
            'status' =>
            array (
                'required' => false,
                'name' => 'status',
                'vname' => 'LBL_STATUS',
                'type' => 'enum',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => 100,
                'size' => '20',
                'options' => 'teacher_status_list',
                'studio' => 'visible',
                'dependency' => false,
            ),
            'teach_hours' =>
            array (
                'required' => false,
                'audited'=>true,
                'name' => 'teach_hours',
                'vname' => 'LBL_TEACH_HOURS',
                'type' => 'int',
                'dbType' => 'varchar',
                'len' => 20,
                'enable_range_search' => true,
                'options' => 'numeric_range_search_dom',
            ),
            'admin_hours' =>
            array (
                'required' => false,
                'audited'=>true,
                'name' => 'admin_hours',
                'vname' => 'LBL_ADMIN_HOURS',
                'type' => 'int',
                'dbType' => 'varchar',
                'len' => 20,
                'enable_range_search' => true,
                'options' => 'numeric_range_search_dom',
            ),
            'passport_issued_date' =>
            array (
                'required' => false,
                'name' => 'passport_issued_date',
                'vname' => 'LBL_PASSPORT_ISSUED_DATE',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'enable_range_search' => true,
                'options' => 'date_range_search_dom',
            ),
            'passport_expired_date' =>
            array (
                'required' => false,
                'name' => 'passport_expired_date',
                'vname' => 'LBL_PASSPORT_EXPIRED_DATE',
                'type' => 'date',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'size' => '20',
                'enable_range_search' => true,
                'options' => 'date_range_search_dom',
            ),
            'full_teacher_name' =>
            array (
                 'required' => false,
                'name' => 'full_teacher_name',
                'vname' => 'LBL_FULL_NAME',
                'type' => 'varchar',
                'massupdate' => 0,
                'no_default' => false,
                'comments' => '',
                'help' => '',
                'importable' => 'false',
                'duplicate_merge' => 'disabled',
                'duplicate_merge_dom_value' => '0',
                'audited' => false,
                'reportable' => true,
                'unified_search' => false,
                'merge_filter' => 'disabled',
                'calculated' => false,
                'len' => '120',
                'size' => '20',
            ),
          // Relationship Teacher ( 1 - n ) Holidays - Lap Nguyen
            'teacher_holidays' => array(
                'name' => 'teacher_holidays',
                'type' => 'link',
                'relationship' => 'teacher_holidays',
                'module' => 'Holidays',
                'bean_name' => 'Holidays',
                'source' => 'non-db',
                'vname' => 'LBL_HOLIDAYS',
            ),
            //Custom Relationship JUNIOR. Teacher - Meeting  By Lap Nguyen
//            'ju_meetings'=>array(
//                'name' => 'ju_meetings',
//                'type' => 'link',
//                'relationship' => 'ju_c_teachers_meetings',
//                'module' => 'Meetings',
//                'bean_name' => 'Meetings',
//                'source' => 'non-db',
//                'vname' => 'LBL_JU_MEETING',
//            ),

        ),
        'relationships'=>array (
            'teacher_holidays' => array(
                'lhs_module'        => 'C_Teachers',
                'lhs_table'            => 'c_teachers',
                'lhs_key'            => 'id',
                'rhs_module'        => 'Holidays',
                'rhs_table'            => 'holidays',
                'rhs_key'            => 'teacher_id',
                'relationship_type'    => 'one-to-many',
            ),
            //Custom Relationship JUNIOR. Teacher - Meeting  By Lap Nguyen
//            'ju_c_teachers_meetings' => array(
//                'lhs_module'        => 'C_Teachers',
//                'lhs_table'            => 'c_teachers',
//                'lhs_key'            => 'id',
//                'rhs_module'        => 'Meetings',
//                'rhs_table'            => 'meetings',
//                'rhs_key'            => 'ju_teacher_id',
//                'relationship_type'    => 'one-to-many',
//            ),
        ),
         // Relationship Teacher ( 1 - n ) Holidays - Lap Nguyen
        'optimistic_locking'=>true,
        'unified_search'=>true,
    );
    if (!class_exists('VardefManager')){
        require_once('include/SugarObjects/VardefManager.php');
    }
    VardefManager::createVardef('C_Teachers','C_Teachers', array('basic','team_security','assignable','person'));

//jc - adding for refactor
//defined in the field_arrays.php file

$dictionary['C_Teachers']['fields']['name']['fields'] = array('first_name', 'last_name');
$dictionary['C_Teachers']['fields']['name']['sort_on'] = 'first_name';
$dictionary['C_Teachers']['fields']['name']['group'] = 'first_name';
$dictionary['C_Teachers']['fields']['name']['db_concat_fields'] = array(0=>'first_name', 1=>'last_name');

$dictionary['C_Teachers']['fields']['full_name']['fields'] = array('first_name', 'last_name');
$dictionary['C_Teachers']['fields']['full_name']['sort_on'] = 'first_name';
$dictionary['C_Teachers']['fields']['full_name']['group'] = 'first_name';
$dictionary['C_Teachers']['fields']['full_name']['db_concat_fields'] = array(0=>'first_name', 1=>'last_name');