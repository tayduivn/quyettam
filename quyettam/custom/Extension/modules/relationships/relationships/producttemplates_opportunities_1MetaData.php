<?php
// created: 2015-05-04 10:36:51
$dictionary["producttemplates_opportunities_1"] = array (
  'true_relationship_type' => 'one-to-many',
  'from_studio' => true,
  'relationships' => 
  array (
    'producttemplates_opportunities_1' => 
    array (
      'lhs_module' => 'ProductTemplates',
      'lhs_table' => 'product_templates',
      'lhs_key' => 'id',
      'rhs_module' => 'Opportunities',
      'rhs_table' => 'opportunities',
      'rhs_key' => 'id',
      'relationship_type' => 'many-to-many',
      'join_table' => 'producttemplates_opportunities_1_c',
      'join_key_lhs' => 'producttemplates_opportunities_1producttemplates_ida',
      'join_key_rhs' => 'producttemplates_opportunities_1opportunities_idb',
    ),
  ),
  'table' => 'producttemplates_opportunities_1_c',
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
      'name' => 'producttemplates_opportunities_1producttemplates_ida',
      'type' => 'varchar',
      'len' => 36,
    ),
    4 => 
    array (
      'name' => 'producttemplates_opportunities_1opportunities_idb',
      'type' => 'varchar',
      'len' => 36,
    ),
  ),
  'indices' => 
  array (
    0 => 
    array (
      'name' => 'producttemplates_opportunities_1spk',
      'type' => 'primary',
      'fields' => 
      array (
        0 => 'id',
      ),
    ),
    1 => 
    array (
      'name' => 'producttemplates_opportunities_1_ida1',
      'type' => 'index',
      'fields' => 
      array (
        0 => 'producttemplates_opportunities_1producttemplates_ida',
      ),
    ),
    2 => 
    array (
      'name' => 'producttemplates_opportunities_1_alt',
      'type' => 'alternate_key',
      'fields' => 
      array (
        0 => 'producttemplates_opportunities_1opportunities_idb',
      ),
    ),
  ),
);