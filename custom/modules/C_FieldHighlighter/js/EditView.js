var FieldHighlighter={};FieldHighlighter.emptyRow={field_name:'',label:'',applied_style:''};SUGAR.util.doWhen(function(){return $('#appliedFieldCol')[0]!=null&&$('#availableFieldCol')[0]!=null;},function(){initAppliedFieldsWidget();initAvailableFieldsWidget();});$(function(){$('#target_module').bind('focus, click',function(){$(this).attr('cur-data',$(this).val());});$('#target_module').change(function(e){var targetModule=$(this).val();var appliedFields=getAppliedFields();if(appliedFields.length>0){if(confirm(SUGAR.language.get('C_FieldHighlighter','LBL_TARGET_MODULE_CHANGE_CONFIRM_MSG'))){ajaxLoadAvailableFields(targetModule);}else{var curValue=$(this).attr('cur-data');$(this).val(curValue);}}else{ajaxLoadAvailableFields(targetModule);}});$('.action_buttons').find('.button.primary').each(function(){var curClickLogic=$(this).attr('onclick');$(this).attr('onclick','SUGAR.saveAppliedFields(); '+curClickLogic);});$('#appliedFieldCol').find('.appliedStyleDisplay').live('click',function(e){e.stopPropagation();$(this).closest('.appliedStyleHolder').find('.appliedStyleOptions').slideDown('fast');});$('#appliedFieldCol').find('.appliedStyleOptions').find('li').live('click',function(e){e.stopPropagation();var row=$(this).closest('tr');var selectedIndex=$(this).closest('tbody').find('tr').index(row);var selectedValue=$(this).attr('data-key');var recordSet=SUGAR.appliedFieldsWidget.getRecordSet();var selectedRecord=recordSet.getRecord(selectedIndex);recordSet.updateRecordValue(selectedRecord,'applied_style',selectedValue);$(this).slideUp();SUGAR.appliedFieldsWidget.refreshView();});$('body').click(function(){$('.correctionTypeOptions').hide();});});function ajaxLoadAvailableFields(moduleName){$.ajax({'url':'index.php?module=C_FieldHighlighter&action=ajaxloadavailablefields&sugar_body_only=true','type':'POST','dataType':'json','data':{'moduleName':moduleName},'success':function(fields){console.log(fields);SUGAR.appliedFieldsWidget.deleteRows(0,SUGAR.appliedFieldsWidget.getRecordSet().getLength());SUGAR.appliedFieldsWidget.addRow(FieldHighlighter.emptyRow);SUGAR.appliedFieldsWidget.render();SUGAR.availableFieldsWidget.deleteRows(0,SUGAR.availableFieldsWidget.getRecordSet().getLength());SUGAR.availableFieldsWidget.addRows(fields);}});}
function initAppliedFieldsWidget(){YAHOO.widget.DataTable.Formatter.appliedStyle=function(elLiner,oRecord,oColumn,oData){if(oRecord.getData('field_name')!=''){var selectedOption=(oData!=null)?oData:'blue';var view='<div class="appliedStyleHolder">';view+='<input type="text" style="width:120px" class="appliedStyleDisplay highlight_'+selectedOption+'" value="'+styleOptions[selectedOption]+'" readonly/>';view+='<input type="hidden" style="width:120px" class="appliedStyle" value="'+selectedOption+'"/>';view+='<ul style="display:none" class="appliedStyleOptions">';for(key in styleOptions){view+='<li class="highlight_'+key+'" data-key="'+key+'">'+styleOptions[key]+'</li>';}
view+='</ul>';view+='</div>';elLiner.innerHTML=view;}};SUGAR.appliedFieldsWidget=new YAHOO.SUGAR.DragDropTable('appliedFieldCol',[{key:"label",label:lblAppliedField,width:200,sortable:false},{key:"field_name",label:lblAppliedFieldName,width:200},{key:"applied_style",label:lblAppliedStyle,width:150,formatter:'appliedStyle'}],new YAHOO.util.LocalDataSource(appliedFields,{responseSchema:{resultsList:"fields",fields:[{key:'field_name'},{key:'label'},{key:'applied_style'}]}}),{width:'600px',height:"300px",group:["appliedFieldCol","availableFieldCol"]});SUGAR.appliedFieldsWidget.disableEmptyRows=true;SUGAR.appliedFieldsWidget.addRow(FieldHighlighter.emptyRow);SUGAR.appliedFieldsWidget.render();}
function initAvailableFieldsWidget(){SUGAR.availableFieldsWidget=new YAHOO.SUGAR.DragDropTable('availableFieldCol',[{key:"label",label:lblAvailableFields,width:200,sortable:false},{key:"field_name",label:lblAvailableFields,hidden:true},{key:"applied_style",label:lblAppliedStyle,hidden:true}],new YAHOO.util.LocalDataSource(availableFields,{responseSchema:{resultsList:"fields",fields:[{key:'field_name'},{key:'label'},{key:'applied_style'}]}}),{height:"300px",group:["appliedFieldCol","availableFieldCol"]});SUGAR.availableFieldsWidget.disableEmptyRows=true;SUGAR.availableFieldsWidget.addRow(FieldHighlighter.emptyRow);SUGAR.availableFieldsWidget.render();}
function getAppliedFields(){var appliedFieldsSet=SUGAR.appliedFieldsWidget.getRecordSet();var fields={};for(var i=0;i<appliedFieldsSet.getLength();i++){var data=appliedFieldsSet.getRecord(i).getData();if(data.field_name&&data.field_name!=''){var field={};field.field_name=data.field_name;field.applied_style=data.applied_style;fields[data.field_name]=field;}}
return fields;}
SUGAR.saveAppliedFields=function(){var fields=getAppliedFields();var selectedFields='';if(!$.isEmptyObject(fields))selectedFields=YAHOO.lang.JSON.stringify(fields);YAHOO.util.Dom.get('target_fields').value=selectedFields;}