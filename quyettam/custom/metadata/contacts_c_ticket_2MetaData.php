<?php
// created: 2015-05-21 17:28:17
$dictionary["contacts_c_ticket_2"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'contacts_c_ticket_2' => 
    array (
      'lhs_module' => 'Contacts',
      'lhs_table' => 'contacts',
      'lhs_key' => 'id',
      'rhs_module' => 'C_Ticket',
      'rhs_table' => 'c_ticket',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'contacts_c_ticket_2_c',
      'join_key_lhs' => 'contacts_c_ticket_2contacts_ida',
      'join_key_rhs' => 'contacts_c_ticket_2c_ticket_idb',
    ),
  ),
  'table' => 'contacts_c_ticket_2_c',
  'fields' => 
  array (
    0 => 
    array (
      'name' => 'id',
      'type' => 'varchar',
      'len' => 36,
    ),
    1 => 
    array (
      'name' => 'date_modified',
      'type' => 'datetime',
    ),
    2 => 
    array (
      'name' => 'deleted',
      'type' => 'bool',
      'len' => '1',
      'default' => '0',
      'required' => true,
    ),
    3 => 
    array (
      'name' => 'contacts_c_ticket_2contacts_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'contacts_c_ticket_2c_ticket_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'contacts_c_ticket_2spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'contacts_c_ticket_2_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'contacts_c_ticket_2contacts_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'contacts_c_ticket_2_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'contacts_c_ticket_2c_ticket_idb',
      ),
    ),
  ),
);