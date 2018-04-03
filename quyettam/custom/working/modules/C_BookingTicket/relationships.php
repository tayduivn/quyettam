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

$relationships = array (
  'opportunities_c_bookingticket_1' => 
  array (
    'id' => '15518c7b-1aed-498c-9c2b-5559a769b9b8',
    'relationship_name' => 'opportunities_c_bookingticket_1',
    'lhs_module' => 'Opportunities',
    'lhs_table' => 'opportunities',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTicket',
    'rhs_table' => 'c_bookingticket',
    'rhs_key' => 'id',
    'join_table' => 'opportunities_c_bookingticket_1_c',
    'join_key_lhs' => 'opportunities_c_bookingticket_1opportunities_ida',
    'join_key_rhs' => 'opportunities_c_bookingticket_1c_bookingticket_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'c_bookingticket_modified_user' => 
  array (
    'id' => '7bde7bef-6a1f-14f9-04e5-5559a7769058',
    'relationship_name' => 'c_bookingticket_modified_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTicket',
    'rhs_table' => 'c_bookingticket',
    'rhs_key' => 'modified_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'c_bookingticket_created_by' => 
  array (
    'id' => '8a46b904-2fb4-8971-2226-5559a78c1849',
    'relationship_name' => 'c_bookingticket_created_by',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTicket',
    'rhs_table' => 'c_bookingticket',
    'rhs_key' => 'created_by',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'accounts_c_bookingticket_1' => 
  array (
    'id' => '8ca4fa52-1859-0bb2-9b9a-5559a7021b85',
    'relationship_name' => 'accounts_c_bookingticket_1',
    'lhs_module' => 'Accounts',
    'lhs_table' => 'accounts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTicket',
    'rhs_table' => 'c_bookingticket',
    'rhs_key' => 'id',
    'join_table' => 'accounts_c_bookingticket_1_c',
    'join_key_lhs' => 'accounts_c_bookingticket_1accounts_ida',
    'join_key_rhs' => 'accounts_c_bookingticket_1c_bookingticket_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'contacts_c_bookingticket_1' => 
  array (
    'id' => 'ae13a625-f6e6-2cdf-9a5c-5559a78dbc46',
    'relationship_name' => 'contacts_c_bookingticket_1',
    'lhs_module' => 'Contacts',
    'lhs_table' => 'contacts',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTicket',
    'rhs_table' => 'c_bookingticket',
    'rhs_key' => 'id',
    'join_table' => 'contacts_c_bookingticket_1_c',
    'join_key_lhs' => 'contacts_c_bookingticket_1contacts_ida',
    'join_key_rhs' => 'contacts_c_bookingticket_1c_bookingticket_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'c_bookingticket_assigned_user' => 
  array (
    'id' => 'b8678bd6-cc2f-ae16-205f-5559a7845236',
    'relationship_name' => 'c_bookingticket_assigned_user',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTicket',
    'rhs_table' => 'c_bookingticket',
    'rhs_key' => 'assigned_user_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'c_bookingticket_c_ticket_1' => 
  array (
    'id' => 'c93ce1c5-2dd3-ac86-4ea0-5559a7e906c4',
    'relationship_name' => 'c_bookingticket_c_ticket_1',
    'lhs_module' => 'C_BookingTicket',
    'lhs_table' => 'c_bookingticket',
    'lhs_key' => 'id',
    'rhs_module' => 'C_Ticket',
    'rhs_table' => 'c_ticket',
    'rhs_key' => 'id',
    'join_table' => 'c_bookingticket_c_ticket_1_c',
    'join_key_lhs' => 'c_bookingticket_c_ticket_1c_bookingticket_ida',
    'join_key_rhs' => 'c_bookingticket_c_ticket_1c_ticket_idb',
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => 'default',
    'lhs_subpanel' => NULL,
    'from_studio' => true,
    'is_custom' => true,
    'relationship_only' => false,
    'for_activities' => false,
  ),
  'users_sale' => 
  array (
    'id' => 'cba3028d-b8bd-6e48-e4e9-5559a71a5ef1',
    'relationship_name' => 'users_sale',
    'lhs_module' => 'Users',
    'lhs_table' => 'users',
    'lhs_key' => 'id',
    'rhs_module' => 'C_BookingTicket',
    'rhs_table' => 'c_bookingticket',
    'rhs_key' => 'user_sale_id',
    'join_table' => NULL,
    'join_key_lhs' => NULL,
    'join_key_rhs' => NULL,
    'relationship_type' => 'one-to-many',
    'relationship_role_column' => NULL,
    'relationship_role_column_value' => NULL,
    'reverse' => '0',
    'deleted' => '0',
    'readonly' => true,
    'rhs_subpanel' => NULL,
    'lhs_subpanel' => NULL,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
  ),
  'c_bookingticket_c_payment_1' => 
  array (
    'rhs_label' => 'Payment',
    'lhs_label' => 'Booking Ticket',
    'rhs_subpanel' => 'default',
    'lhs_module' => 'C_BookingTicket',
    'rhs_module' => 'C_Payment',
    'relationship_type' => 'one-to-many',
    'readonly' => true,
    'deleted' => false,
    'relationship_only' => false,
    'for_activities' => false,
    'is_custom' => false,
    'from_studio' => true,
    'relationship_name' => 'c_bookingticket_c_payment_1',
  ),
);