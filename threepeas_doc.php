<?php

require_once 'threepeas_doc.civix.php';

/**
 * Implementation of hook_civicrm_config
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function threepeas_doc_civicrm_config(&$config) {
  _threepeas_doc_civix_civicrm_config($config);
}

/**
 * Implementation of hook_civicrm_xmlMenu
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function threepeas_doc_civicrm_xmlMenu(&$files) {
  _threepeas_doc_civix_civicrm_xmlMenu($files);
}

/**
 * Implementation of hook_civicrm_install
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function threepeas_doc_civicrm_install() {
  //check required extensions
  if (!threepeas_doc_civicrm_checkextensions()) {
    return;
  }  
  return _threepeas_doc_civix_civicrm_install();
}

function threepeas_doc_civicrm_checkextension($extension) {
  $extensionParams = array('full_name' => $extension);
  $extensionDefaults = array();
  $countryApiExtension = CRM_Core_BAO_Extension::retrieve($extensionParams, $extensionDefaults);
  if (empty($countryApiExtension) || !$countryApiExtension->is_active) {
    CRM_Core_Error::fatal("Could not enable extension, the required extension ".$extension." is not active in this environment!");
    return false;
  }
  return true;
}

function threepeas_doc_civicrm_checkextensions() {
  $extensionlist = array('org.civicoop.documents', 'nl.pum.threepeas');
  foreach($extensionlist as $extension) {
    if (!threepeas_doc_civicrm_checkextension($extension)) {
      return false;
    }
  }
  return true;
}

/**
 * Implementation of hook_civicrm_uninstall
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function threepeas_doc_civicrm_uninstall() {
  return _threepeas_doc_civix_civicrm_uninstall();
}

/**
 * Implementation of hook_civicrm_enable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function threepeas_doc_civicrm_enable() {
  //check required extensions
  if (!threepeas_doc_civicrm_checkextensions()) {
    return;
  }
  return _threepeas_doc_civix_civicrm_enable();
}

/**
 * Implementation of hook_civicrm_disable
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function threepeas_doc_civicrm_disable() {
  return _threepeas_doc_civix_civicrm_disable();
}

/**
 * Implementation of hook_civicrm_upgrade
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed  based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function threepeas_doc_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _threepeas_doc_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implementation of hook_civicrm_managed
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function threepeas_doc_civicrm_managed(&$entities) {
  return _threepeas_doc_civix_civicrm_managed($entities);
}

/**
 * Implementation of hook_civicrm_caseTypes
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function threepeas_doc_civicrm_caseTypes(&$caseTypes) {
  _threepeas_doc_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implementation of hook_civicrm_alterSettingsFolders
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function threepeas_doc_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _threepeas_doc_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

function threepeas_doc_civicrm_threepeas_projectactions($project) {
  $url = CRM_Utils_System::url('civicrm/documents/threepeas/project', "pid=".$project['id'], true);
  $link = '<a class="action-item" title="Documents" href="'.$url.'">Documents</a>';
  $return['threepeas_doc_civicrm_threepeas_projectactions'] = $link;
  return $return;
}

function threepeas_doc_civicrm_documents_entity_ref_spec() {
    return array('project' => new CRM_ThreepeasDocuments_ProjectRefSpec());
}