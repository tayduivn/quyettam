<?php
$module_name = 'C_BookingTicket';
$viewdefs[$module_name] = 
array (
    'EditView' => 
    array (
        'templateMeta' => 
        array (
            'form' => 
            array (
                'hidden' => 
                array (
                    1 => '<input type="hidden" name="customer_address" id="customer_address" value=""/>',
                    2 => '<input type="hidden" name="account_street" id="account_street"/>',
                    3 => '<input type="hidden" name="duplicateType" id="duplicateType" value="{$DUPLICATE_TYPE}"/>',
                    4 => '<link rel="stylesheet" type="text/css" href="custom/include/javascripts/Select2/select2.css">',
                    5 => '<input type="hidden" name="customer_category" id="customer_category" value="{$CUSTOMER_CATEGORY}"/>',
                ),
            ),  
            'maxColumns' => '2',
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
            'javascript' => '       
            {sugar_getscript file="custom/modules/C_BookingTicket/js/editview.js"}
            {sugar_getscript file="custom/include/javascripts/Select2/select2.min.js"}
            {sugar_getscript file="include/SugarFields/Fields/Datetimecombo/Datetimecombo.js"}',
            'useTabs' => true,
            'tabDefs' => 
            array (              
                'DEFAULT' => 
                array (
                    'newTab' => true,
                    'panelDefault' => 'expanded',
                ),
                'LBL_EDITVIEW_PANEL1' => 
                array (
                    'newTab' => true,
                    'panelDefault' => 'expanded',
                ),
            ),
            'syncDetailEditViews' => true,
        ),
        'panels' => 
        array (
            'default' => 
            array (
                0 => 
                array (
                    0 => 
                    array (
                        'name' =>'status',
                        'customCode' => '<table width="100%">
                        <tbody><tr colspan = "5">
                        <td width = "20%">{html_options name="status" id="status" style="width: 140px;" options=$fields.status.options selected=$fields.status.value}</td>
                        <td width = "20%"><label>{$MOD.LBL_NAME}: </label></td>
                        <td width = "20%">{$NEWID}</td>
                        <td width = "20%"><label>{$MOD.LBL_BOOKING_DATE}: </label></td>
                        <td width = "20%">
                        <span class="dateTime">
                        <input class="date_input" autocomplete="off" type="text" name="booking_date" id="booking_date" value="{$fields.booking_date.value}" title="Booking Date" tabindex="0" size="11" maxlength="10" style="vertical-align: top;">
                        <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:0px" border="0" id="booking_date_trigger">
                        </span>
                        {literal}
                        <script type="text/javascript">
                        Calendar.setup ({
                        inputField : "booking_date",
                        daFormat : cal_date_format,
                        button : "booking_date_trigger",
                        singleClick : true,
                        dateStr : "",
                        step : 1,
                        weekNumbers:false
                        }
                        );
                        </script>
                        {/literal}
                        </td>
                        </tr></tbody>
                        </table>',
                    ),
                ),
                1 => 
                array (
                    0 => 
                    array (
                        'name' => 'payment_status',
                        'customCode' => '<table width="100%">
                        <tbody><tr colspan = "5">
                        <td width="20%">{html_options name="payment_status" id="payment_status" style="width: 140px;" options=$fields.payment_status.options selected=$fields.payment_status.value}</td>
                        <td width="20%" ><div id="gs_code_label">{$MOD.LBL_GS_CODE}:</div></td>
                        <td width="20%" ><div id="gs_code_value">{html_options name="gs_code" id="gs_code" style="width: 140px;" options=$gs_code_options selected=$fields.gs_code.value}</div></td>
                        <td width="20%"><div id="lbl_refund_date">{$MOD.LBL_REFUND_DATE}:<span class="required">*</span></div></td>
                        <td width="20%">
                        <span class="dateTime">
                        <input class="date_input" autocomplete="off" type="text" name="refund_date" id="refund_date" value="{$fields.refund_date.value}" title="$MOD.LBL_EXPECTED_DATE}" tabindex="0" size="11" maxlength="10" style="vertical-align: top;">
                        <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:0px" border="0" id="refund_date_trigger">
                        </span>
                        {literal}
                        <script type="text/javascript">
                        Calendar.setup ({
                        inputField : "refund_date",
                        daFormat : cal_date_format,
                        button : "refund_date_trigger",
                        singleClick : true,
                        dateStr : "",
                        step : 1,
                        weekNumbers:false
                        }
                        );
                        </script>
                        {/literal}
                        </tr></tbody>
                        </table>',
                    ),

                ),
                2 => 
                array (
                    0 => 
                    array (
                        'name' =>'serial_no',
                        'customCode' => '<table width="100%">
                        <tbody><tr colspan = "5">
                        <td width = "20%"><input type="text" name="serial_no" id="serial_no" size="15" maxlength="26" value="{$fields.serial_no.value}" title="{$MOD.LBL_SERIAL_NO}" tabindex="0"></td>
                        <td width = "20%"><label>{$MOD.LBL_INVOICE_NO}: </label></td>
                        <td width = "20%"><input type="text" name="invoice_no" id="invoice_no" size="15" maxlength="26" value="{$fields.invoice_no.value}" title="{$MOD.LBL_INVOICE_NO}" tabindex="0"></td>
                        <td width = "20%"><label>{$MOD.LBL_INVOICE_DATE}: </label></td>
                        <td width = "20%">
                        <span class="dateTime">
                        <input class="date_input" autocomplete="off" type="text" name="invoice_date" id="invoice_date" value="{$fields.invoice_date.value}" title="Invoice Date" tabindex="0" size="11" maxlength="10" style="vertical-align: top;">
                        <img src="themes/RacerX/images/jscalendar.png" alt="Enter Date" style="position:relative; top:0px" border="0" id="invoice_date_trigger">
                        </span>
                        {literal}
                        <script type="text/javascript">
                        Calendar.setup ({
                        inputField : "invoice_date",
                        daFormat : cal_date_format,
                        button : "invoice_date_trigger",
                        singleClick : true,
                        dateStr : "",
                        step : 1,
                        weekNumbers:false
                        }
                        );
                        </script>
                        {/literal}
                        </td>
                        </tr></tbody>
                        </table>',
                    ),
                ),
                3 => 
                array (
                    0 => 
                    array (
                        'name' => 'internal_doc_id',                                                                                                    
                        'customCode' => '<table width="100%">
                        <tbody>
                        <tr colspan = "5">
                        <td width = "20%">{$DOCID}</td>
                        <td width = "20%"><label> {$MOD.LBL_INVOICE_CONTENT} </label></td>
                        <td width = "20%"><textarea name="invoice_content" style ="height: 50px;" id="invoice_content" maxlength="225" title="Nhập nội dung xuất hóa đơn nếu Booking có nhiều hơn 4 vé">{$fields.invoice_content.value}</textarea></td>
                        <td width = "20%"><label> {$MOD.LBL_TOTAL_AMOUNT_INVOICE}</label>
                        <td width = "20%"><input type="text" name="total_amount_invoice" class="currency" id="total_amount_invoice" size="15" maxlength="25" value="{sugar_number_format var=$fields.total_amount_invoice.value}" title="Nhập số tiền hóa đơn nếu Booking có nhiều hơn 4 vé"></td>
                        </tr>
                        </tbody>
                        </table>
                        '
                    ),
                ), 
                4 => 
                array (
                    0 => 
                    array (
                        'name' => 'parent_name',
                        'studio' => 'visible',
                        'label' => 'LBL_PARENT_NAME',
                        'displayParams' => 
                        array (
                            'required' => true,
                        ),
                    ),
                    1 => array (
                        'name' => 'company',
                        'label' => 'LBL_COMPANY',
                    ),
                ),

                5 => 
                array (
                    0 => 
                    array (
                        'name' => 'contacts_c_bookingticket_2_name',
                    ),
                    1 => array (
                        'hiddenLabel' => 'true',
                    ),
                ),

                6 => 
                array (
                    0 => 
                    array (
                        'name' => 'address',
                        'label' => 'LBL_ADDRESS',
                    ),
                    1 => 'taxcode',
                ),

                7 => 
                array (
                    0=> array(
                        'name' => 'opportunities_c_bookingticket_1_name',
                        'label' => "LBL_OPPORTUNITY",
                    ),
                    1 => 
                    array (
                        'name' => 'booking_type',
                        'studio' => 'visible',
                        'label' => 'LBL_BOOKING_TYPE',
                        'customCode' => '{html_options name="booking_type" id="booking_type" style="width: 140px;" options=$fields.booking_type.options selected=$fields.booking_type.value}',
                    ),
                ),
                8 => 
                array (
                    0 => array(
                        'name' => 'assigned_user_name',
                        'label' => 'LBL_ASSIGNED_TO_NAME',
                        'displayParams' => 
                        array (
                            'required' => true,
                        ),
                    ),
                    1 => 
                    array (
                        'name' => 'io_code',
                        'customCode' => '{html_options style="width: 165px;" name="io_code" id="io_code" options=$io_code_options selected=$fields.io_code.value}'
                    ),
                ),
                9 => 
                array (
                    0 => array(
                        'name' => 'user_sale',
                    ),
                    1 =>
                    array ( 
                        'name' => 'tcc_code',
                    ),
                ),
                10 => 
                array (
                    0 => 'description',
                    1 =>
                    array ( 
                        'name' => 'inspected_payment_date',
                        'customLabel' => '<label>  {$MOD.LBL_EXPECTED_DATE}: </label>'
                    ),
                ),
                11 => 
                array (
                    0 => 
                    array (
                        'hideLabel' => true,
                        'customCode' => '{include file="custom/modules/C_BookingTicket/tpl/payment_info.tpl"}',
                    ),
                ),
                12 => 
                array (
                    'name' => 'team_name',
                    'displayParams' => 
                    array (
                        'display' => true,
                    ),
                ),
            ),
            'lbl_editview_panel1' => 
            array (  
                0 => 
                array (
                    0 => 
                    array (
                        'name' => 'ticket_info',
                        'customCode' => '{include file="custom/modules/C_BookingTicket/tpl/tickets_editview.tpl"}',
                        'hideLabel' => true,
                    ),
                ),
            )
        ),
    ),
);
