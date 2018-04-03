<?php
    /***
    * Create by Hai Nguyen
    */
    // define field store parent option of Opp Account/Leads

    //  $dictionary["Opportunity"]["fields"]["auto_convert_lead"] = array (
    //        'name'      => 'auto_convert_lead',
    //        'vname'     => 'LBL_AUTO_CONVERT_LEAD',
    //        'type'      => 'bool',
    //        'dbType'    => 'tinyint',
    //        'default'   => 0,
    //  );

    $dictionary["Opportunity"]["fields"]["parent_name"] = array (
        'name' => 'parent_name',
        'vname' => 'LBL_PARENT_NAME',
        'type' => 'parent',
        'massupdate' => 0,
        'dbtype' => 'varchar',
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => false,
        'reportable' => true,
        'len' => 100,
        'size' => '20',
        'options' => 'parent_type_display',
        'studio' => 'visible',
        'type_name' => 'parent_type',
        'id_name' => 'parent_id',
        'parent_type' => 'parent_type_display',
    );
    $dictionary["Opportunity"]["fields"]["parent_type"] = array (
        'required' => false,
        'name' => 'parent_type',
        'vname' => 'LBL_PARENT_TYPE',
        'type' => 'parent_type',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'len' => 50,
        'size' => '20',
        'default' => '',
        'dbType' => 'varchar',
        'studio' => 'hidden',
    );
    $dictionary["Opportunity"]["fields"]["parent_id"] = array (
        'required' => false,
        'name' => 'parent_id',
        'vname' => 'LBL_PARENT_ID',
        'type' => 'id',
        'massupdate' => 0,
        'comments' => '',
        'help' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => 0,
        'audited' => false,
        'reportable' => true,
        'len' => 36,
        'size' => '20',
    );
    $dictionary["Opportunity"]["fields"]["account_name"] = array (
        'name' => 'account_name',
        'rname' => 'name',
        'id_name' => 'account_id',
        'vname' => 'LBL_ACCOUNT_NAME',
        'type' => 'relate',
        'table' => 'accounts',
        'join_name'=>'accounts',
        'isnull' => 'true',
        'module' => 'Accounts',
        'dbType' => 'varchar',
        'link'=>'accounts',
        'len' => '255',
        'source'=>'non-db',
        'unified_search' => true,
        'required' => true,
        'importable' => 'required',
        'required' => false,
    );
    $dictionary["Opportunity"]["fields"]["currency"] = array (
        'required' => true,
        'name' => 'currency',
        'vname' => 'LBL_CURRENCY',
        'type' => 'enum',
        'massupdate' => true,
        'default' => 'VND',
        'comments' => '',
        'importable' => 'true',
        'duplicate_merge' => 'disabled',
        'duplicate_merge_dom_value' => '0',
        'audited' => true,
        'reportable' => true,
        'unified_search' => false,
        'merge_filter' => 'disabled',
        'calculated' => false,
        'len' => 30,
        'size' => '20',
        'options' => 'currency_list',
        'studio' => 'visible',
        'dependency' => false
    );

    $dictionary["Opportunity"]["fields"]["won_amount"] = array (
        'required' => false,
        'name' => 'won_amount',
        'vname' => 'LBL_WON_AMOUNT',
        'type' => 'currency',
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
        'len' => 26,
        'size' => '20',
        'enable_range_search' => true,
        'options' => 'numeric_range_search_dom',
        'precision' => 2,
    );


?>