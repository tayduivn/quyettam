(function() {
  var template = Handlebars.template, templates = Handlebars.templates = Handlebars.templates || {};
templates['call-template.html'] = template(function (Handlebars,depth0,helpers,partials,data) {
  this.compilerInfo = [4,'>= 1.0.0'];
helpers = this.merge(helpers, Handlebars.helpers); data = data || {};
  var buffer = "", stack1, functionType="function", escapeExpression=this.escapeExpression, self=this;

function program1(depth0,data) {
  
  var buffer = "", stack1;
  buffer += "\n                            <p class=\"select_contact\" id=\"contact_";
  if (stack1 = helpers.bean_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.bean_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">\n                                <input type=\"radio\" name=\"contactSelect\" class=";
  if (stack1 = helpers.bean_module) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.bean_module; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + " value=";
  if (stack1 = helpers.bean_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.bean_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "  />\n                                <a class=\"multiplecontacts\" title=\"";
  if (stack1 = helpers.parent_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.parent_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" href=";
  if (stack1 = helpers.bean_link) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.bean_link; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + ">";
  if (stack1 = helpers.bean_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.bean_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</a>\n                            </p>\n                            ";
  return buffer;
  }

  buffer += "<div id=\"";
  if (stack1 = helpers.callbox_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.callbox_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"callbox\">\n    <div class=\"callboxhead\">\n        <div class=\"callboxtitle\">";
  if (stack1 = helpers.title) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.title; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</div>\n        <div class=\"callboxoptions\">\n            <a href=\"#\" class=\"callbox_close\">X</a>\n        </div>\n    </div>\n    <div class=\"control_panel\">\n        <button class=\"transfer_panel\"></button>\n     <button class=\"hangup_panel\"></button>\n   <button class=\"hold_panel\"></button>\n        <button class=\"operator_panel\"></button>\n        <!--<button class=\"callbox_action\" data-dropdown=\"#dropdown-1_";
  if (stack1 = helpers.callbox_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.callbox_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\"></button>-->\n        <button class=\"callbox_action\"></button>\n    </div>\n    <div id=\"dropdown-1_";
  if (stack1 = helpers.callbox_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.callbox_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\" class=\"asterisk-dropdown-menu has-tip dropdown-hidden\"> <!-- left: 746px; top: 631px; display: block; -->\n        <ul>\n            <li class=\"ul_relate_to_contact\"><a href=\"#\" class=\"relate_to_contact\">";
  if (stack1 = helpers.relate_to_contact_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.relate_to_contact_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</a></li>\n            <li class=\"ul_relate_to_account\"><a href=\"#\" class=\"relate_to_account\">";
  if (stack1 = helpers.relate_to_account_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.relate_to_account_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  + "</a></li>\n            <li class=\"ul_relate_to_case\"><a href=\"#\" class=\"relate_to_case\">";
  if (stack1 = helpers.relate_to_case_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.relate_to_case_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</a></li>\n            \n            <li class=\"ul_create_contact\"><a href=\"#\" class=\"create_contact\">";
  if (stack1 = helpers.create_new_contact_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.create_new_contact_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)+
  
   "</a></li>\n            \n            <li class=\"ul_create_lead\"><a href=\"#\" class=\"create_lead\">";
  if (stack1 = helpers.create_new_lead_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.create_new_lead_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  +
  
  
  
  
    "</a></li>\n            \n            <li class=\"ul_create_schedule\"><a href=\"#\" class=\"create_schedule\">";
  if (stack1 = helpers.create_new_schedule_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.create_new_schedule_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  +
  
  
  
  
  
      "</a></li>\n            \n            <li class=\"ul_create_task\"><a href=\"#\" class=\"create_task\">";
  if (stack1 = helpers.create_new_task_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.create_new_task_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  +
  
  
  
  
  
  
  
  
    "</a></li>\n            \n            <li class=\"ul_create_case\"><a href=\"#\" class=\"create_case\">";
  if (stack1 = helpers.create_new_case_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.create_new_case_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  +
  
   "</a></li>\n            \n            <li class=\"ul_create_account\"><a href=\"#\" class=\"create_account\">";
  if (stack1 = helpers.create_new_account_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.create_new_account_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  
  + "</a></li>\n            \n            <li class=\"ul_open_account\"><a href=\"#\" class=\"open_account\">";
  if (stack1 = helpers.open_new_account_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.open_new_account_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  
  + "</a></li>\n            \n            <li class=\"ul_open_lead\"><a href=\"#\" class=\"open_lead\">";
  if (stack1 = helpers.open_new_lead_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.open_new_lead_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  
  + "</a></li>\n            \n            <li class=\"ul_open_contact\"><a href=\"#\" class=\"open_contact\">";
  if (stack1 = helpers.open_new_contact_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.open_new_contact_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  
  
  
    + "</a></li>\n            \n        </ul>\n    </div>\n    <div class=\"callboxcontent\">\n        <div class=\"asterisk_info\">\n            <h4 class=\"call_type\">";
  if (stack1 = helpers.call_type) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.call_type; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</h4>\n            <div>\n                <table class=\"asterisk_data\">\n                    <tr class=\"multiplematchingcontacts\">\n                        <td colspan=\"2\">\n                            <b>";
  if (stack1 = helpers.select_contact_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.select_contact_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</b>\n                            ";
  stack1 = helpers.each.call(depth0, depth0.beans, {hash:{},inverse:self.noop,fn:self.program(1, program1, data),data:data});
  if(stack1 || stack1 === 0) { buffer += stack1; }
  buffer += "\n                        </td>\n                    </tr>\n                    <tr class=\"singlematchingcontact\">\n                        <td>";
  if (stack1 = helpers.name_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.name_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</td>\n                        <td><a class=\"contact_id\" href=\"";
  if (stack1 = helpers.bean_link) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.bean_link; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">\n                            <span class=\"call_contacts\">";
  if (stack1 = helpers.bean_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.bean_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</span>\n                        </a>\n <!-- <button class=\"unrelate_contact\"></button> -->\n </td>\n </tr>\n <tr class=\"\">\n                        <td>";
  if (stack1 = helpers.company_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.company_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</td>\n                        <td><a class=\"company\" href=\"";
  if (stack1 = helpers.parent_link) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.parent_link; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">";
  if (stack1 = helpers.parent_name) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.parent_name; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</a></td>\n                    </tr>\n                    <tr class=\"caller_id_box\">\n                        <td class=\"caller_id_label\">";
  if (stack1 = helpers.caller_id_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.caller_id_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + ":</td>\n                        <td class=\"caller_id\">";
  if (stack1 = helpers.caller_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.caller_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</td>\n                    </tr>\n                    <tr class=\"phone_number_box\">\n                        <td class=\"phone_number_label\">";
  if (stack1 = helpers.phone_number_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.phone_number_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + ":</td>\n                        <td class=\"phone_number\">";
  if (stack1 = helpers.phone_number) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.phone_number; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</td>\n                    </tr>\n                    <tr class=\"call_duration_box\">\n                        <td class=\"call_duration_label\">";
  if (stack1 = helpers.duration_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.duration_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + ":</td>\n                        <td>\n                            <span class=\"call_duration\">";
  if (stack1 = helpers.duration) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.duration; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  
  
  
  
     + "</td>\n                    </tr>\n                    <tr class=\"call_description_box\">\n                        <td class=\"call_description_label\">";
  if (stack1 = helpers.description_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.description_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + ":</td>\n                        <td>\n                            <span class=\"call_description\">";
  if (stack1 = helpers.description) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.description; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
  
  
  
  
    + "</span>\n                        </td>\n                    </tr>\n                    <!--<tr class=\"call_time_box\">-->\n                        <!--<td class=\"call_time_label\">";
  if (stack1 = helpers.call_time_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.call_time_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + ":</td>-->\n                        <!--<td>-->\n                            <!--<span class=\"call_duration\">";
  if (stack1 = helpers.call_time) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.call_time; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</span>-->\n                        <!--</td>-->\n                    <!--</tr>-->\n                </table>\n            </div>\n        </div>\n    </div>\n    <div class=\"callboxinput\">\n        <textarea rows=\"4\" cols=\"30\" class=\"callboxtextarea callboxtextareaselected\"></textarea>\n        <div class=\"callboxbuttons\">\n            <table width=\"100%\">\n                <tbody>\n                <tr>\n                    <td valign=\"bottom\">\n                        <button class=\"save_memo\">";
  if (stack1 = helpers.save_label) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.save_label; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "</button>\n                    </td>\n                </tr>\n                </tbody>\n            </table>\n        </div>\n    </div>\n    <form class=\"call_record_id\" name=\"";
  if (stack1 = helpers.call_record_id) { stack1 = stack1.call(depth0, {hash:{},data:data}); }
  else { stack1 = depth0.call_record_id; stack1 = typeof stack1 === functionType ? stack1.apply(depth0) : stack1; }
  buffer += escapeExpression(stack1)
    + "\">\n        <input type='hidden' name=\"relateContactId\"/>\n        <input type='hidden' name=\"relateContactFirstName\"/>\n        <input type='hidden' name=\"relateContactLastName\"/>\n        <input type='hidden' name=\"relateAccountId\"/>\n        <input type='hidden' name=\"relateAccountName\"/>\n    </form>\n</div>\n\n";
  return buffer;
  });
})(Handlebars);
