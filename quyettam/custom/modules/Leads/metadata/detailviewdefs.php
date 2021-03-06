<?php
$viewdefs['Leads'] = 
array (
  'DetailView' => 
  array (
    'templateMeta' => 
    array (
      'form' => 
      array (
        'buttons' => 
        array (
          0 => 'EDIT',
          1 => 'DUPLICATE',
          2 => 'DELETE',
          4 => 'FIND_DUPLICATES',
          5 => 
          array (
            'customCode' => '<input title="{$APP.LBL_MANAGE_SUBSCRIPTIONS}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';" type="submit" name="Manage Subscriptions" value="{$APP.LBL_MANAGE_SUBSCRIPTIONS}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              'htmlOptions' => 
              array (
                'title' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
                'class' => 'button',
                'id' => 'manage_subscriptions_button',
                'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'Subscriptions\'; this.form.module.value=\'Campaigns\'; this.form.module_tab.value=\'Leads\';',
                'name' => '{$APP.LBL_MANAGE_SUBSCRIPTIONS}',
              ),
            ),
          ),
          6 => 
          array (
            'customCode' => '<input title="{$APP.LBL_BOOKING_TICKET}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'EditView\'; this.form.module.value=\'C_BookingTicket\';" type="submit" name="Booking Ticket" value="{$APP.LBL_BOOKING_TICKET}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_BOOKING_TICKET}',
              'htmlOptions' => 
              array (
                'title' => '{$APP.LBL_BOOKING_TICKET}',
                'class' => 'button',
                'id' => 'booking_ticket_button',
                'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'EditView\'; this.form.module.value=\'C_BookingTicket\';',
                'name' => '{$APP.LBL_BOOKING_TICKET}',
              ),
            ),
          ),
          7 => 
          array (
            'customCode' => '<input title="{$APP.LBL_BOOKING_HOTEL}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'EditView\'; this.form.module.value=\'C_BookingHotel\';" type="submit" name="Booking Hotel" value="{$APP.LBL_BOOKING_HOTEL}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_BOOKING_HOTEL}',
              'htmlOptions' => 
              array (
                'title' => '{$APP.LBL_BOOKING_HOTEL}',
                'class' => 'button',
                'id' => 'booking_hotel_button',
                'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'EditView\'; this.form.module.value=\'C_BookingHotel\';',
                'name' => '{$APP.LBL_BOOKING_HOTEL}',
              ),
            ),
          ),
          8 => 
          array (
            'customCode' => '<input title="{$APP.LBL_BOOKING_TOUR}" class="button" onclick="this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'EditView\'; this.form.module.value=\'C_BookingTour\';" type="submit" name="Booking Tour" value="{$APP.LBL_BOOKING_TOUR}">',
            'sugar_html' => 
            array (
              'type' => 'submit',
              'value' => '{$APP.LBL_BOOKING_TOUR}',
              'htmlOptions' => 
              array (
                'title' => '{$APP.LBL_BOOKING_TOUR}',
                'class' => 'button',
                'id' => 'booking_tour_button',
                'onclick' => 'this.form.return_module.value=\'Leads\'; this.form.return_action.value=\'DetailView\';this.form.return_id.value=\'{$fields.id.value}\'; this.form.action.value=\'EditView\'; this.form.module.value=\'C_BookingTour\';',
                'name' => '{$APP.LBL_BOOKING_TOUR}',
              ),
            ),
          ),
        ),
        'headerTpl' => 'modules/Leads/tpls/DetailViewHeader.tpl',
      ),
      'maxColumns' => '2',
      'useTabs' => false,
      'widths' => 
      array (
        0 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
        1 => 
        array (
          'label' => '10',
          'field' => '30',
        ),
      ),
      'includes' => 
      array (
        0 => 
        array (
          'file' => 'custom/modules/Leads/js/DetailView.js',
        ),
      ),
      'tabDefs' => 
      array (
        'LBL_CONTACT_INFORMATION' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL2' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_DETAILVIEW_PANEL3' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
        'LBL_EDITVIEW_PANEL1' => 
        array (
          'newTab' => false,
          'panelDefault' => 'expanded',
        ),
      ),
      'syncDetailEditViews' => true,
    ),
    'panels' => 
    array (
      'LBL_CONTACT_INFORMATION' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'code',
            'label' => 'LBL_CODE',
          ),
          1 => 'category',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'name',
            'comment' => 'First name of the contact',
            'label' => 'LBL_NAME',
          ),
          1 => 'fit_category',
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'pax_name',
            'label' => 'LBL_PAX_NAME',
          ),
          1 => 
          array (
            'name' => 'gs_code',
            'customLabel' => '{$LBL_GS_CODE}',
            'customCode' => '<label id="gs_code" name="gs_code">{$GS_CODE}</label>',
          ),
        ),
        3 => 
        array (
          0 => 'department',
          1 => 'website',
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'account_name',
            'displayParams' => 
            array (
              'enableConnectors' => true,
              'module' => 'Leads',
              'connectors' => 
              array (
                0 => 'ext_rest_twitter',
              ),
            ),
          ),
          1 => 'status',
        ),
        5 => 
        array (
          0 => 'title',
          1 => 'phone_mobile',
        ),
        6 => 
        array (
          0 => 'email1',
          1 => 'phone_work',
        ),
        7 => 
        array (
          0 => 'lead_source',
          1 => 
          array (
            'name' => 'phone_other',
            'comment' => 'Other phone number for the contact',
            'label' => 'LBL_OTHER_PHONE',
          ),
        ),
        8 => 
        array (
          0 => 
          array (
            'name' => 'rating',
            'label' => 'LBL_RATING',
          ),
          1 => 'phone_fax',
        ),
        9 => 
        array (
          0 => 
          array (
            'name' => 'dob_day',
            'label' => 'LBL_BIRTHDATE',
            'type' => 'Dob',
          ),
          1 => 
          array (
            'name' => 'passport',
            'label' => 'LBL_PASSPORT',
          ),
        ),
        10 => array(
            0 => 'gender',
            1 => '',
        ),
       11 => 
        array (
          0 => 
          array (
            'name' => 'primary_address_street',
            'label' => 'LBL_PRIMARY_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'primary',
            ),
          ),
          1 => 
          array (
            'name' => 'alt_address_street',
            'label' => 'LBL_ALTERNATE_ADDRESS',
            'type' => 'address',
            'displayParams' => 
            array (
              'key' => 'alt',
            ),
          ),
        ),
      ),
      'lbl_editview_panel2' => 
      array (
        0 => 
        array (
          0 => 'status_description',
          1 => 'lead_source_description',
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'airline',
            'label' => 'LBL_AIRLINE',
          ),
          1 => '',
        ),
        2 => 
        array (
          0 => 'refered_by',
          1 => 
          array (
            'name' => 'seat_type',
            'label' => 'LBL_SEAT_TYPE',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'campaign_name',
            'label' => 'LBL_CAMPAIGN',
          ),
          1 => 
          array (
            'name' => 'working_date',
            'label' => 'LBL_WORKING_DATE',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'description',
            'label' => 'LBL_DESCRIPTION',
          ),
          1 => 
          array (
            'name' => 'favorites',
            'studio' => 'visible',
            'label' => 'LBL_FAVORITES',
          ),
        ),
        5 => 
        array (
          0 => 'do_not_call',
        ),
      ),
      'lbl_detailview_panel3' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'document_type',
            'label' => 'LBL_DOCUMENT_TYPE',
          ),
          1 => 
          array (
            'name' => 'document_number',
            'label' => 'LBL_DOCUMENT_NUMBER',
          ),
        ),
        1 => 
        array (
          0 => 
          array (
            'name' => 'nationality',
            'label' => 'LBL_NATIONALITY',
          ),
          1 => 
          array (
            'name' => 'issuing_country',
            'label' => 'LBL_ISSUING_COUNTRY',
          ),
        ),
        2 => 
        array (
          0 => 
          array (
            'name' => 'card_holder',
            'label' => 'LBL_CARD_HOLDER',
          ),
          1 => 
          array (
            'name' => 'membership_number',
            'label' => 'LBL_MEMBERSHIP_NUMBER',
          ),
        ),
        3 => 
        array (
          0 => 
          array (
            'name' => 'facebook_id',
            'label' => 'LBL_FACEBOOK_ID',
          ),
          1 => 
          array (
            'name' => 'google_id',
            'label' => 'LBL_GOOGLE_ID',
          ),
        ),
        4 => 
        array (
          0 => 
          array (
            'name' => 'ibe_id',
            'label' => 'LBL_IBE_ID',
          ),
          1 => '',
        ),
      ),
      'lbl_editview_panel1' => 
      array (
        0 => 
        array (
          0 => 
          array (
            'name' => 'assigned_user_name',
            'label' => 'LBL_ASSIGNED_TO',
          ),
          1 => 
          array (
            'name' => 'date_modified',
            'label' => 'LBL_DATE_MODIFIED',
            'customCode' => '{$fields.date_modified.value} {$APP.LBL_BY} {$fields.modified_by_name.value}',
          ),
        ),
        1 => 
        array (
          0 => 'team_name',
          1 => 
          array (
            'name' => 'date_entered',
            'customCode' => '{$fields.date_entered.value} {$APP.LBL_BY} {$fields.created_by_name.value}',
          ),
        ),
      ),
    ),
  ),
);
