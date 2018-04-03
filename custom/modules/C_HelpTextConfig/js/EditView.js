var HelpTextConfig={};HelpTextConfig.emptyRow={field_name:'',label:'',help_text:''};SUGAR.util.doWhen(function(){return $('#appliedFieldCol')[0]!=null&&$('#availableFieldCol')[0]!=null;},function(){initAppliedFieldsWidget();initAvailableFieldsWidget();});$(function(){$('#frmEditHelpText').find('#helpTextEditor').ckeditor({toolbarGroups:[{name:'clipboard',groups:['clipboard','undo']},{name:'insert'},{name:'basicstyles',groups:['basicstyles','cleanup']},{name:'editing',groups:['find','selection','spellchecker']},'/',{name:'paragraph',groups:['list','indent','blocks','align']},{name:'links'},{name:'styles'},{name:'colors'},]});var helpTextEditor=$('#frmEditHelpText').dialog({autoOpen:false,width:905,height:400,modal:true,buttons:{'OK':function(){var selectedIndex=helpTextEditor.dialog('option','selectedIndex');var helpText=$('#frmEditHelpText').find('#helpTextEditor').val();helpTextEditor.dialog('close');helpTextEditor.find('#helpTextEditor').html(helpText);saveHelpText(selectedIndex,helpText);},}});$('#target_module').bind('focus, click',function(){$(this).attr('cur-data',$(this).val());});$('#target_module').change(function(e){var targetModule=$(this).val();var appliedFields=getAppliedFields();if(appliedFields.length>0){if(confirm(SUGAR.language.get('C_HelpTextConfig','LBL_TARGET_MODULE_CHANGE_CONFIRM_MSG'))){ajaxLoadAvailableFields(targetModule);}else{var curValue=$(this).attr('cur-data');$(this).val(curValue);}}else{ajaxLoadAvailableFields(targetModule);}});$('.action_buttons').find('.button.primary').each(function(){var curClickLogic=$(this).attr('onclick');$(this).attr('onclick','SUGAR.saveAppliedFields(); '+curClickLogic);});$('#appliedFieldCol').find('.helpText').live('click',function(e){var recordSet=SUGAR.appliedFieldsWidget.getRecordSet();var row=$(this).closest('tr');var selectedIndex=$(this).closest('tbody').find('tr').index(row);var selectedRecord=recordSet.getRecord(selectedIndex);var data=selectedRecord.getData();var title=SUGAR.language.get('C_HelpTextConfig','LBL_HELP_TEXT_EDITOR_TITLE')+data.label;helpTextEditor.dialog('option','title',title);helpTextEditor.dialog('open');helpTextEditor.find('#helpTextEditor').val(data.help_text);helpTextEditor.dialog('option','selectedIndex',selectedIndex);});});function ajaxLoadAvailableFields(moduleName){$.ajax({'url':'index.php?module=C_HelpTextConfig&action=ajaxloadavailablefields&sugar_body_only=true','type':'POST','dataType':'json','data':{'moduleName':moduleName},'success':function(fields){console.log(fields);SUGAR.appliedFieldsWidget.deleteRows(0,SUGAR.appliedFieldsWidget.getRecordSet().getLength());SUGAR.appliedFieldsWidget.addRow(HelpTextConfig.emptyRow);SUGAR.appliedFieldsWidget.render();SUGAR.availableFieldsWidget.deleteRows(0,SUGAR.availableFieldsWidget.getRecordSet().getLength());SUGAR.availableFieldsWidget.addRows(fields);}});}
function initAppliedFieldsWidget(){YAHOO.widget.DataTable.Formatter.helpText=function(elLiner,oRecord,oColumn,oData){if(oRecord.getData('field_name')!=''){var helpText=(oData!=null)?oData:'';var view='<div class="helpTextHolder">';view+='<div type="text" class="helpText">'+helpText+'</div>';view+='</div>';elLiner.innerHTML=view;}};SUGAR.appliedFieldsWidget=new YAHOO.SUGAR.DragDropTable('appliedFieldCol',[{key:"label",label:lblAppliedField,width:200,sortable:false},{key:"field_name",label:lblAppliedFieldName,width:200},{key:"help_text",label:lblHelpText,width:320,formatter:'helpText'}],new YAHOO.util.LocalDataSource(appliedFields,{responseSchema:{resultsList:"fields",fields:[{key:'field_name'},{key:'label'},{key:'help_text'}]}}),{width:'750x',height:"300px",group:["appliedFieldCol","availableFieldCol"]});SUGAR.appliedFieldsWidget.disableEmptyRows=true;SUGAR.appliedFieldsWidget.addRow(HelpTextConfig.emptyRow);SUGAR.appliedFieldsWidget.render();}
function initAvailableFieldsWidget(){SUGAR.availableFieldsWidget=new YAHOO.SUGAR.DragDropTable('availableFieldCol',[{key:"label",label:lblAvailableFields,width:200,sortable:false},{key:"field_name",label:lblAvailableFields,hidden:true},{key:"help_text",label:lblHelpText,hidden:true}],new YAHOO.util.LocalDataSource(availableFields,{responseSchema:{resultsList:"fields",fields:[{key:'field_name'},{key:'label'},{key:'help_text'}]}}),{height:"300px",group:["appliedFieldCol","availableFieldCol"]});SUGAR.availableFieldsWidget.disableEmptyRows=true;SUGAR.availableFieldsWidget.addRow(HelpTextConfig.emptyRow);SUGAR.availableFieldsWidget.render();}
function saveHelpText(selectedIndex,helpText){var recordSet=SUGAR.appliedFieldsWidget.getRecordSet();var selectedRecord=recordSet.getRecord(selectedIndex);recordSet.updateRecordValue(selectedRecord,'help_text',helpText);SUGAR.appliedFieldsWidget.refreshView();}
function getAppliedFields(){var appliedFieldsSet=SUGAR.appliedFieldsWidget.getRecordSet();var fields={};for(var i=0;i<appliedFieldsSet.getLength();i++){var data=appliedFieldsSet.getRecord(i).getData();if(data.field_name&&data.field_name!=''){var field={};field.field_name=data.field_name;field.help_text=data.help_text;fields[data.field_name]=field;}}
return fields;}
SUGAR.saveAppliedFields=function(){var fields=getAppliedFields();var selectedFields='';if(!$.isEmptyObject(fields))selectedFields=YAHOO.lang.JSON.stringify(fields);YAHOO.util.Dom.get('target_fields').value=selectedFields;}