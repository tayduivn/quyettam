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

	

$mod_strings = array (
  'DEF_CREATE_LOG' => 'Document Created',
  'ERR_DELETE_CONFIRM' => 'Do you want to delete this document revision?',
  'ERR_DELETE_LATEST_VERSION' => 'You are not allowed to delete the latest revision of a document.',
  'ERR_DOC_ACTIVE_DATE' => 'Publication Date',
  'ERR_DOC_EXP_DATE' => 'Expiration Date',
  'ERR_DOC_NAME' => 'Document Name',
  'ERR_DOC_VERSION' => 'Document Version',
  'ERR_FILENAME' => 'File name',
  'LBL_ACTIVE_DATE' => 'Publish Date',
  'LBL_AND' => 'and',
  'LBL_APPLYING_TAGS_TO_ARTICLES' => 'Applying tags on articles ...',
  'LBL_APPLY_TAG' => 'Apply Tag',
  'LBL_ARTICLES_IN_TREE_HOVER' => 'Articles',
  'LBL_ARTICLE_APPROVED_BY' => 'Approver:',
  'LBL_ARTICLE_AUTHOR' => 'Author:',
  'LBL_ARTICLE_AUTHOR_LIST' => 'Author',
  'LBL_ARTICLE_BODY' => 'Article Body:',
  'LBL_ARTICLE_IN_TREE_HOVER' => 'Article',
  'LBL_ARTICLE_PREVEW_UNAVAILABLE_NO_CONTENT' => 'Preview is not available, Document exists, but no content has been created yet.',
  'LBL_ARTICLE_PREVEW_UNAVAILABLE_NO_DOCUMENT' => 'Preview is not available, Document record was not found.',
  'LBL_ARTICLE_TITLE' => 'Title:',
  'LBL_ATTACHMENTS' => 'Attachments:',
  'LBL_CASES' => 'Cases',
  'LBL_CASES_SUBPANEL_TITLE' => 'Related Cases',
  'LBL_CATEGORY' => 'Category',
  'LBL_CATEGORY_VALUE' => 'Category:',
  'LBL_CAT_OR_SUBCAT_UNSPEC' => 'Unspecified',
  'LBL_CHANGE_LOG' => 'Change Log',
  'LBL_CHILD_TAGS_IN_TREE_HOVER' => 'Child Tags',
  'LBL_CHILD_TAG_IN_TREE_HOVER' => 'Child Tag',
  'LBL_CLEAR' => 'Clear',
  'LBL_CLICK_APPLY_TAG' => 'Click Apply Tag',
  'LBL_CONTAINING_THESE_WORDS' => 'Containing these words:',
  'LBL_CONTRACTS' => 'Contracts',
  'LBL_CONTRACTS_SUBPANEL_TITLE' => 'Related Contracts',
  'LBL_CONTRACT_NAME' => 'Contract Name:',
  'LBL_CREATED' => 'Created by',
  'LBL_CREATED_BY' => 'Created by',
  'LBL_CREATED_BY_NAME' => 'LBL_CREATED_BY_NAME',
  'LBL_CREATE_NEW_TAG' => 'Create New Tag',
  'LBL_CREATING_NEW_TAG' => 'Creating New Tag...',
  'LBL_DATE_ENTERED' => 'Date Entered',
  'LBL_DATE_MODIFIED' => 'Date Modified',
  'LBL_DEFAULT_ADMIN_MESSAGE' => 'Select an action from the dropdown list',
  'LBL_DELETE' => 'Delete',
  'LBL_DELETED' => 'Deleted',
  'LBL_DELETE_TAG' => 'Delete Tag',
  'LBL_DESCRIPTION' => 'Description',
  'LBL_DET_IS_TEMPLATE' => 'Template? :',
  'LBL_DET_RELATED_DOCUMENT' => 'Related Document:',
  'LBL_DET_RELATED_DOCUMENT_VERSION' => 'Related Document&#39;s Revision:',
  'LBL_DET_TEMPLATE_TYPE' => 'Document Type:',
  'LBL_DOCUMENT' => 'Related Document',
  'LBL_DOC_ACTIVE_DATE' => 'Publish Date:',
  'LBL_DOC_DESCRIPTION' => 'Description:',
  'LBL_DOC_EXP_DATE' => 'Expiration Date:',
  'LBL_DOC_NAME' => 'Document Name:',
  'LBL_DOC_REV_HEADER' => 'Document Revisions',
  'LBL_DOC_STATUS' => 'Status:',
  'LBL_DOC_VERSION' => 'Revision:',
  'LBL_DOWNNLOAD_FILE' => 'Attachments:',
  'LBL_EDIT_INLINE' => 'Edit',
  'LBL_EMAILS' => 'Emails',
  'LBL_EMAILS_SUBPANEL_TITLE' => 'Related Emails',
  'LBL_EMBEDED_IMAGES' => 'Embedded Images:',
  'LBL_ERROR_NOT_A_FILE_INPUT_ELEMENT' => 'Error: Not a file input element',
  'LBL_EXCLUDING_THESE_WORDS' => 'Excluding these words:',
  'LBL_EXPIRATION_DATE' => 'Expiration Date',
  'LBL_EXPIRES' => 'Expires:',
  'LBL_FAQ_TAG_NOT_RENAME_MESSAGE' => 'FAQs Tag can not be renamed',
  'LBL_FILENAME' => 'File Name:',
  'LBL_FILE_EXTENSION' => 'File Extension',
  'LBL_FTS_EMPTY_STRING' => 'Cannot perform full text search on an empty string',
  'LBL_HEAD_TAGS' => 'Tags',
  'LBL_HIDE_ARTICLE_DETAILS' => 'Hide Details',
  'LBL_HIDE_TAGS' => 'Hide Tags',
  'LBL_ID' => 'ID',
  'LBL_IS_EXTERNAL_ARTICLE' => 'External Article? :',
  'LBL_IS_TEMPLATE' => 'Is a Template',
  'LBL_KBDOCUMENTS_KBTAGS_ID' => 'LBL_KBDOCUMENTS_KBTAGS_ID',
  'LBL_KBDOCUMENT_ID' => 'Document Id',
  'LBL_KBDOCUMENT_REVISION_NUMBER' => 'KBDocument Revision Number',
  'LBL_KBDOC_APPROVED_BY' => 'Approved By:',
  'LBL_KBDOC_ATTACHMENT' => 'Kbdoc_attahment',
  'LBL_KBDOC_ATTS_TITLE' => 'Download Attachments:',
  'LBL_KBDOC_BODY' => 'Body:',
  'LBL_KBDOC_SUBJECT' => 'Subject:',
  'LBL_KBDOC_TAGS' => 'Tags:',
  'LBL_KB_NOTIFICATION' => 'Document has been published',
  'LBL_KB_PUBLISHED_REQUEST' => 'has assigned a document to you for approval and publishing.',
  'LBL_KB_STATUS_BACK_TO_DRAFT' => 'Document status has been changed back to draft',
  'LBL_KEYWORDS' => 'Keywords:',
  'LBL_KNOWLEDGE_BASE_ADMIN' => 'Knowledge Base Admin',
  'LBL_KNOWLEDGE_BASE_ADMIN_MENU' => 'Administer Knowledge Base',
  'LBL_KNOWLEDGE_BASE_SEARCH' => 'Knowledge Base',
  'LBL_LAST_REV_CREATE_DATE' => 'Last Revision Create Date',
  'LBL_LAST_REV_CREATOR' => 'Revision Created By:',
  'LBL_LAST_REV_DATE' => 'Revision Date:',
  'LBL_LATEST_REVISION' => 'Latest Revision Id',
  'LBL_LATEST_REVISION_NAME' => 'Latest Revision Name',
  'LBL_LAUNCHING_TAG_BROWSING' => 'Launching Tag Browsing ...',
  'LBL_LIST_ACTIVE_DATE' => 'Publish Date',
  'LBL_LIST_ARTICLES' => 'View Articles',
  'LBL_LIST_CATEGORY' => 'Category',
  'LBL_LIST_DOCUMENT' => 'Document',
  'LBL_LIST_DOCUMENT_NAME' => 'Document Name',
  'LBL_LIST_DOWNLOAD' => 'Download',
  'LBL_LIST_EXP_DATE' => 'Expiration Date',
  'LBL_LIST_FORM_TITLE' => 'Document List',
  'LBL_LIST_IS_TEMPLATE' => 'Template?',
  'LBL_LIST_KBDOC_APPROVER_NAME' => 'Approver Name',
  'LBL_LIST_LAST_REV_CREATOR' => 'Published By',
  'LBL_LIST_LAST_REV_DATE' => 'Revision Date',
  'LBL_LIST_LATEST_REVISION' => 'Latest Revision',
  'LBL_LIST_MOST_RECENT' => 'Most Recent Articles',
  'LBL_LIST_MOST_VIEWED' => 'Most Viewed Articles',
  'LBL_LIST_REVISION' => 'Revision',
  'LBL_LIST_SELECTED_REVISION' => 'Selected Revision',
  'LBL_LIST_STATUS' => 'Status',
  'LBL_LIST_SUBCATEGORY' => 'Sub Category',
  'LBL_LIST_TEMPLATE_TYPE' => 'Document Type',
  'LBL_LIST_VIEWING_FREQUENCY' => 'Frequency',
  'LBL_LIST_VIEW_DOCUMENT' => 'View',
  'LBL_MAIL_MERGE_DOCUMENT' => 'Mail Merge Template:',
  'LBL_MENU_FTS' => 'Full Text Search',
  'LBL_MIME' => 'Mime Type',
  'LBL_MISMATCH_QUOTES_ERR' => 'Your query will not work as entered.  There must be a closing double quote for every opening double quote to make a pair.  If you wish to search for a string with a double quote, the escape it with a backslash (\\")',
  'LBL_MODIFIED' => 'Modified by id',
  'LBL_MODIFIED_USER' => 'Modified by',
  'LBL_MODULE_NAME' => 'Knowledge Base',
  'LBL_MODULE_NAME_SINGULAR' => 'KBDocument',
  'LBL_MODULE_TITLE' => 'Knowledge Base Article',
  'LBL_MOVE' => 'Move',
  'LBL_MOVING_ARTICLES_TO_TAG' => 'Moving articles to tag...',
  'LBL_NAME' => 'Document Name:',
  'LBL_NEW_TAG_NAME' => 'New Tag Name:',
  'LBL_NOT_AN_ADMIN_USER' => 'Not an admin user',
  'LBL_NOT_A_VALID_FILE' => 'Not a valid file',
  'LBL_NUMBER' => 'LBL_NUMBER',
  'LBL_PARENT_TYPE' => 'Parent Type',
  'LBL_PREVIOUS_SAVED_SEARCH' => 'Previous Saved Searches:',
  'LBL_PREVIOUS_SAVED_SEARCH_HELP' => 'Edit or Delete an existing Saved Search.',
  'LBL_PUBLISHED' => 'Published:',
  'LBL_RELATED_DOCUMENT_ID' => 'Related Dcocument Id',
  'LBL_RELATED_DOCUMENT_REVISION_ID' => 'Related Document Revision Id',
  'LBL_REMOVE' => 'Remove',
  'LBL_REVISION' => 'Revision',
  'LBL_REVISION_NAME' => 'Revision Number',
  'LBL_ROOT_TAG_CAN_NOT_BE_RENAMED' => 'Root tag cannot be renamed',
  'LBL_ROOT_TAG_MESSAGE' => 'Root tag cannot be selected/linked to article',
  'LBL_SAVE_SEARCH_AS' => 'Save this search as:',
  'LBL_SAVE_SEARCH_AS_HELP' => 'This saves your specified entries as a Saved Search filter for Knowledge Base.',
  'LBL_SAVING_THE_TAG' => 'Saving the Tag...',
  'LBL_SEARCH' => 'Search',
  'LBL_SEARCH_FORM_TITLE' => 'Document Search',
  'LBL_SEARCH_TAG' => 'Search',
  'LBL_SEARCH_WITHIN' => 'Search within:',
  'LBL_SELECTED_REVISION_NAME' => 'Selected Revision Name',
  'LBL_SELECT_ARTICLES_TO_APPLY_TAGS' => 'Select Articles To Apply Tags',
  'LBL_SELECT_ARTICLES_TO_BE_MOVED_TO_OTHER_TAG' => 'Select Articles First',
  'LBL_SELECT_ARTICLES_TO_DELETE' => 'Select Articles First',
  'LBL_SELECT_A_NODE_FROM_TREE' => 'Create New Tag',
  'LBL_SELECT_A_TAG_FROM_TREE' => 'Select A Tag From Tree',
  'LBL_SELECT_PARENT_TAG_MESSAGE' => 'Select the parent tag from tree',
  'LBL_SELECT_PARENT_TREE_NOTICE' => 'Select the parent tag, from tree',
  'LBL_SELECT_TAG' => 'Select Tag',
  'LBL_SELECT_TAGS_FROM_TREE' => 'Select Tags From Tree',
  'LBL_SELECT_TAGS_TO_DELETE' => 'Select tags to be deleted',
  'LBL_SELECT_TAG_BUTTON_TITLE' => 'Select',
  'LBL_SELECT_TAG_TO_BE_DELETED_FROM_TREE' => 'Select tag(s) to be deleted from tree',
  'LBL_SELECT_TAG_TO_BE_RENAMED_FROM_TREE' => 'Select the tag to be renamed from tree',
  'LBL_SEND_EMAIL' => 'Send Email',
  'LBL_SF_ACTIVE_DATE' => 'Publish Date:',
  'LBL_SF_CATEGORY' => 'Category:',
  'LBL_SF_DOCUMENT' => 'Document Name:',
  'LBL_SF_EXP_DATE' => 'Expiration Date:',
  'LBL_SF_SUBCATEGORY' => 'Sub Category:',
  'LBL_SHOW_ARTICLE_DETAILS' => 'Show More Details',
  'LBL_SHOW_MORE' => 'Show More Articles',
  'LBL_SHOW_OPTIONS' => 'More Options',
  'LBL_SHOW_SYNTAX_HELP' => 'Syntax Help',
  'LBL_SHOW_TAGS' => 'Show More Tags',
  'LBL_SOURCE_AND_TARGET_TAGS_ARE_SAME' => 'Source and Target tags are same',
  'LBL_STATUS' => 'Status',
  'LBL_SUBCATEGORY' => 'Sub Category',
  'LBL_SUBCATEGORY_VALUE' => 'Sub Category:',
  'LBL_SYNTAX_CHEAT_SHEET' => '<B>Query Syntax Help:</b><P><br />        <ol><br /><li>The plus (+) sign indicates the results "must have" this term.</li><br /><li>The minus (-) sign indicates the results "should not have" the term.  The minus (-) sign is not necessary if you are filling in the text field for words to be excluded.</li><br /><li>Multiple words within double quotation marks ("example1 example2") are treated as a single search term. There must be an opening set and closing set of quotation marks or the search will not run.<br>To search on quotation marks themselves, use a backslash-quote (\\") instead.</li><br /><li>A single quotation mark (&#39;) will be searched on as-is, and not as a grouping.</li></ol><br /><br />        </p><br /><br />        <p><b>Example: </b><br><br><br />        To query for all articles with the words "Sugar" or "CRM that must have the worlds "Knowledge Base" and "cool," but should not have the words "demo" or "past tense," enter the following string:<br>&nbsp;&nbsp;&nbsp;&nbsp;Sugar CRM +"Knowledge Base" +cool -demo -"Past Tense"</p><br><br /><br />        <p><b>Notes: </b><br><br /><ol><li>Case does not matter.</li><br /><li>Spaces and commas are both acceptable delimiters.</li><br /><li>Do not put a space between the plus (+) or minus (-) signs and the words they detail.</li></ol><br /></p>',
  'LBL_TAB_ADVANCED' => 'Advanced',
  'LBL_TAB_BROWSE' => 'Browse',
  'LBL_TAB_SEARCH' => 'Search',
  'LBL_TAGS' => 'Tags:',
  'LBL_TAGS_ROOT_LABEL' => 'Tags',
  'LBL_TAG_ALREADY_EXISTS' => 'Tag already exists',
  'LBL_TAG_ID' => 'LBL_TAG_ID',
  'LBL_TAG_NAME' => 'Tag Name:',
  'LBL_TEAM' => 'Team:',
  'LBL_TEMPLATE_TYPE' => 'Document Type',
  'LBL_TEXT_BODY' => 'LBL_TEXT_BODY',
  'LBL_THERE_WAS_AN_ERROR_HANDLING_TAGS' => 'There was an error handling this request for tags.',
  'LBL_THIS_TAG_CONTAINS_TREE_HOVER' => 'This tag contains',
  'LBL_TIMES_VIEWED' => 'Viewing Frequency:',
  'LBL_TOP_TEN_LIST_TITLE' => 'Top Ten Most Viewed Articles',
  'LBL_TREE_TITLE' => 'Documents',
  'LBL_TYPE_NEW_NODE_NAME' => 'Please enter a tag name',
  'LBL_TYPE_TAG_NAME_TO_SEARCH' => 'Type tag name to be searched',
  'LBL_TYPE_THE_NEW_TAG_NAME' => 'Type the new tag name',
  'LBL_UNDER_THIS_TAG' => 'Using This Tag:',
  'LBL_UNTAGGED_ARTICLES_NODE' => 'Untagged Articles',
  'LBL_UPDATE' => 'Update',
  'LNK_KBDOCUMENT_LIST' => 'View Documents',
  'LNK_NEW_ARTICLE' => 'Create Article',
  'LNK_NEW_MAIL_MERGE' => 'Mail Merge',
);
