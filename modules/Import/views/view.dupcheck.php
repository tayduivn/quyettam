<?php
if(!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');
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

/*********************************************************************************

 * Description: view handler for step 1 of the import process
 * Portions created by SugarCRM are Copyright (C) SugarCRM, Inc.
 * All Rights Reserved.
 ********************************************************************************/
require_once('modules/Import/views/ImportView.php');
require_once('modules/Import/sources/ImportFile.php');
require_once('modules/Import/ImportFileSplitter.php');
require_once('modules/Import/ImportCacheFiles.php');
require_once('modules/Import/ImportDuplicateCheck.php');

require_once('include/upload_file.php');

class ImportViewDupcheck extends ImportView
{
    protected $pageTitleKey = 'LBL_STEP_DUP_TITLE';

 	/**
     * @see SugarView::display()
     */
 	public function display()
    {
        global $mod_strings, $app_strings, $current_user;
        global $sugar_config;

        $has_header = $_REQUEST['has_header'] == 'on' ? TRUE : FALSE;

        $this->instruction = 'LBL_SELECT_DUPLICATE_INSTRUCTION';
        $this->ss->assign('INSTRUCTION', $this->getInstruction());

        $this->ss->assign("MODULE_TITLE", $this->getModuleTitle(false));
        $this->ss->assign("DELETE_INLINE_PNG",  SugarThemeRegistry::current()->getImage('delete_inline','align="absmiddle" alt="'.$app_strings['LNK_DELETE'].'" border="0"'));
        $this->ss->assign("PUBLISH_INLINE_PNG",  SugarThemeRegistry::current()->getImage('publish_inline','align="absmiddle" alt="'.$mod_strings['LBL_PUBLISH'].'" border="0"'));
        $this->ss->assign("UNPUBLISH_INLINE_PNG",  SugarThemeRegistry::current()->getImage('unpublish_inline','align="absmiddle" alt="'.$mod_strings['LBL_UNPUBLISH'].'" border="0"'));
        $this->ss->assign("IMPORT_MODULE", $_REQUEST['import_module']);
        $this->ss->assign("CURRENT_STEP", $this->currentStep);
        $this->ss->assign("JAVASCRIPT", $this->_getJS());

        $content = $this->ss->fetch('modules/Import/tpls/dupcheck.tpl');
        $this->ss->assign("CONTENT", $content);
        $this->ss->display('modules/Import/tpls/wizardWrapper.tpl');
    }

    private function getImportMap()
    {
        if( !empty($_REQUEST['source_id']) )
        {
            $import_map_seed = new ImportMap();
            $import_map_seed->retrieve($_REQUEST['source_id'], false);

            return $import_map_seed->getMapping();
        }
        else
        {
            return array();
        }
    }

    /**
     * Returns JS used in this view
     */
    private function _getJS()
    {
        global $mod_strings, $sugar_config;

        $has_header = $_REQUEST['has_header'] == 'on' ? TRUE : FALSE;
        $uploadFileName = "upload://".basename($_REQUEST['tmp_file']);
        $splitter = new ImportFileSplitter($uploadFileName, $sugar_config['import_max_records_per_file']);
        $splitter->splitSourceFile( $_REQUEST['custom_delimiter'], html_entity_decode($_REQUEST['custom_enclosure'],ENT_QUOTES), $has_header);
        $count = $splitter->getFileCount()-1;
        $recCount = $splitter->getRecordCount();

        //BEGIN DRAG DROP WIDGET
        $idc = new ImportDuplicateCheck($this->bean);
        $dupe_indexes = $idc->getDuplicateCheckIndexes();

         //grab all the import enabled fields and the field map
         $field_map = $this->getImportMap();
         $import_fields = $idc->getDuplicateCheckIndexedFiles();

         //check for saved entries from mapping
         $dupe_disabled =  array();
         $dupe_enabled =  array();
         $mapped_fields = array('full_name');

         //grab the list of user mapped fields
         foreach($_REQUEST as $req_k => $req_v){
             if(strpos($req_k,'olnum')>0){
                 if(empty($req_v) || $req_v != '-1'){
                     $mapped_fields[] = $req_v;
                 }
             }
         }

         foreach($import_fields as $ik=>$iv){

             //grab the field value from the key
             $ik_field = explode('::', $ik);

             //field is not a custom field and was not included in the key, or was not in mapped fields, so skip
             if(strpos($ik_field[0],'ustomfield::')>0 || (empty($ik_field[1]) || !in_array($ik_field[1], $mapped_fields))){
             //skip indexed fields that are not defined in user mapping or
                continue;
             }

             if(isset($field_map['dupe_'.$ik])){
                //index is defined in mapping, so set this index as enabled if not already defined
                $dupe_enabled[] =  array("dupeVal" => $ik, "label" => $iv);
            }else{
                //index is not defined in mapping, so display as disabled if not already defined
                $dupe_disabled[] =  array("dupeVal" => $ik, "label" => $iv);
            }
        }

        $enabled_dupes = json_encode($dupe_enabled);
        $disabled_dupes = json_encode($dupe_disabled);

        $stepTitle4 = $mod_strings['LBL_IMPORT_RECORDS'];

        $dateTimeFormat = $GLOBALS['timedate']->get_cal_date_time_format();
        $type = (isset($_REQUEST['type'])) ? $_REQUEST['type'] : '';
        $lblUsed = str_replace(":","",$mod_strings['LBL_INDEX_USED']);
        $lblNotUsed = str_replace(":","",$mod_strings['LBL_INDEX_NOT_USED']);
        return <<<EOJAVASCRIPT




/**
 * Singleton to handle processing the import
 */
ProcessImport = new function()
{
    /*
     * number of file to process processed
     */
    this.fileCount         = 0;

    /*
     * total files to processs
     */
    this.fileTotal         = {$count};

    /*
     * total records to process
     */
    this.recordCount       = {$recCount};

    /*
     * maximum number of records per file
     */
    this.recordThreshold   = {$sugar_config['import_max_records_per_file']};

    /*
     * submits the form
     */
    this.submit = function()
    {
        document.getElementById("importstepdup").tmp_file.value =
            document.getElementById("importstepdup").tmp_file_base.value + '-' + this.fileCount;
        YAHOO.util.Connect.setForm(document.getElementById("importstepdup"));
        YAHOO.util.Connect.asyncRequest('POST', 'index.php',
            {
                success: function(o) {
                    if (o.responseText.replace(/^\s+|\s+$/g, '') != '') {
                        this.failure(o);
                    }
                    else {
                        var locationStr = "index.php?module=Import"
                            + "&action=Last"
                            + "&current_step=" + document.getElementById("importstepdup").current_step.value
                            + "&type={$type}"
                            + "&import_module={$_REQUEST['import_module']}"
                            + "&has_header=" +  document.getElementById("importstepdup").has_header.value ;
                        if ( ProcessImport.fileCount >= ProcessImport.fileTotal ) {
                        	YAHOO.SUGAR.MessageBox.updateProgress(1,'{$mod_strings['LBL_IMPORT_COMPLETED']}');
                        	SUGAR.util.hrefURL(locationStr);
                        }
                        else {
                            document.getElementById("importstepdup").save_map_as.value = '';
                            ProcessImport.fileCount++;
                            ProcessImport.submit();
                        }
                    }
                },
                failure: function(o) {
                	YAHOO.SUGAR.MessageBox.minWidth = 500;
                	YAHOO.SUGAR.MessageBox.show({
                    	type:  "alert",
                    	title: '{$mod_strings['LBL_IMPORT_ERROR']}',
                    	msg:   o.responseText,
                        fn: function() { window.location.reload(true); }
                    });
                }
            }
        );
        var move = 0;
        if ( this.fileTotal > 0 ) {
            move = this.fileCount/this.fileTotal;
        }
        YAHOO.SUGAR.MessageBox.updateProgress( move,
            "{$mod_strings['LBL_IMPORT_RECORDS']} " + ((this.fileCount * this.recordThreshold) + 1)
                        + " {$mod_strings['LBL_IMPORT_RECORDS_TO']} " + Math.min(((this.fileCount+1) * this.recordThreshold),this.recordCount)
                        + " {$mod_strings['LBL_IMPORT_RECORDS_OF']} " + this.recordCount );
    }

    /*
     * begins the form submission process
     */
    this.begin = function()
    {
        datestarted = '{$mod_strings['LBL_IMPORT_STARTED']} ' +
                YAHOO.util.Date.format('{$dateTimeFormat}');
        YAHOO.SUGAR.MessageBox.show({
            title: '{$stepTitle4}',
            msg: datestarted,
            width: 500,
            type: "progress",
            closable:false,
            animEl: 'importnow'
        });
        SUGAR.saveConfigureDupes();
        this.submit();
    }
}

//begin dragdrop code
	var enabled_dupes = {$enabled_dupes};
	var disabled_dupes = {$disabled_dupes};
	var lblEnabled = '{$lblUsed}';
	var lblDisabled = '{$lblNotUsed}';


	SUGAR.enabledDupesTable = new YAHOO.SUGAR.DragDropTable(
		"enabled_div",
		[{key:"label",  label: lblEnabled, width: 225, sortable: false},
		 {key:"module", label: lblEnabled, hidden:true}],
		new YAHOO.util.LocalDataSource(enabled_dupes, {
			responseSchema: {
			   resultsList : "dupeVal",
			   fields : [{key : "dupeVal"}, {key : "label"}]
			}
		}),
		{
			height: "300px",
			group: ["enabled_div", "disabled_div"]
		}
	);
	SUGAR.disabledDupesTable = new YAHOO.SUGAR.DragDropTable(
		"disabled_div",
		[{key:"label",  label: lblDisabled, width: 225, sortable: false},
		 {key:"module", label: lblDisabled, hidden:true}],
		new YAHOO.util.LocalDataSource(disabled_dupes, {
			responseSchema: {
			   resultsList : "dupeVal",
			   fields : [{key : "dupeVal"}, {key : "label"}]
			}
		}),
		{
			height: "300px",
		 	group: ["enabled_div", "disabled_div"]
		 }
	);
	SUGAR.enabledDupesTable.disableEmptyRows = true;
    SUGAR.disabledDupesTable.disableEmptyRows = true;
    SUGAR.enabledDupesTable.addRow({module: "", label: ""});
    SUGAR.disabledDupesTable.addRow({module: "", label: ""});
	SUGAR.enabledDupesTable.render();
	SUGAR.disabledDupesTable.render();


	SUGAR.saveConfigureDupes = function()
	{
		var enabledTable = SUGAR.enabledDupesTable;
		var dupeVal = [];
		for(var i=0; i < enabledTable.getRecordSet().getLength(); i++){
			var data = enabledTable.getRecord(i).getData();
			if (data.dupeVal && data.dupeVal != '')
			    dupeVal[i] = data.dupeVal;
		}
		    YAHOO.util.Dom.get('enabled_dupes').value = YAHOO.lang.JSON.stringify(dupeVal);

        var disabledTable = SUGAR.disabledDupesTable;
		var dupeVal = [];
		for(var i=0; i < disabledTable.getRecordSet().getLength(); i++){
			var data = disabledTable.getRecord(i).getData();
			if (data.dupeVal && data.dupeVal != '')
			    dupeVal[i] = data.dupeVal;
		}
			YAHOO.util.Dom.get('disabled_dupes').value = YAHOO.lang.JSON.stringify(dupeVal);
	}




document.getElementById('goback').onclick = function(){
    document.getElementById('importstepdup').action.value = 'step3';
    document.getElementById('importstepdup').to_pdf.value = '0';
        var success = function(data) {
			var response = YAHOO.lang.JSON.parse(data.responseText);
			importWizardDialogDiv = document.getElementById('importWizardDialogDiv');
			importWizardDialogTitle = document.getElementById('importWizardDialogTitle');
			submitDiv = document.getElementById('submitDiv');
			importWizardDialogDiv.innerHTML = response['html'];
			importWizardDialogTitle.innerHTML = response['title'];
			SUGAR.util.evalScript(response['html']);
			submitDiv.innerHTML = response['submitContent'];
			eval(response['script']);

		}

        var formObject = document.getElementById('importstepdup');
		YAHOO.util.Connect.setForm(formObject);
		var cObj = YAHOO.util.Connect.asyncRequest('POST', "index.php", {success: success, failure: success});
}

document.getElementById('importnow').onclick = function(){
    SUGAR.saveConfigureDupes();

    var form = document.getElementById('importstepdup');
    // Move on to next step
    document.getElementById('importstepdup').action.value = 'Step4';
    ProcessImport.begin();
}


enableQS(false);

EOJAVASCRIPT;
    }
}

?>
