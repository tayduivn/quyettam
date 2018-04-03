<?php
// created: 2016-07-16 17:38:41
$searchFields['J_PaymentDetail'] = array (
  'name' =>
  array (
    'query_type' => 'default',
  ),
  'current_user_only' =>
  array (
    'query_type' => 'default',
    'db_field' =>
    array (
      0 => 'assigned_user_id',
    ),
    'my_items' => true,
    'vname' => 'LBL_CURRENT_USER_FILTER',
    'type' => 'bool',
  ),
  'assigned_user_id' =>
  array (
    'query_type' => 'default',
  ),
  'favorites_only' =>
  array (
    'query_type' => 'format',
    'operator' => 'subquery',
    'subquery' => 'SELECT sugarfavorites.record_id FROM sugarfavorites
			                    WHERE sugarfavorites.deleted=0
			                        and sugarfavorites.module = \'J_PaymentDetail\'
			                        and sugarfavorites.assigned_user_id = \'{0}\'',
    'db_field' =>
    array (
      0 => 'id',
    ),
  ),
  'range_date_entered' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_entered' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_entered' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_date_modified' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_date_modified' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_date_modified' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_payment_amount' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_amount' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_amount' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_method_fee' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_payment_method_fee' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_payment_method_fee' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_date' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_payment_date' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_payment_date' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'range_numeric_vat_no' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'start_range_numeric_vat_no' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'end_range_numeric_vat_no' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
  ),
  'range_payment_date' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'start_range_payment_date' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
  'end_range_payment_date' =>
  array (
    'query_type' => 'default',
    'enable_range_search' => true,
    'is_date_field' => true,
  ),
);