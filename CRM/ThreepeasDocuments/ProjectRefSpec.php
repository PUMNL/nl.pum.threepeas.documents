<?php

/* 
 * Class which holds the specifications of the project entity
 */

class CRM_ThreepeasDocuments_ProjectRefSpec implements CRM_Documents_Interface_EntityRefSpec {
  
  public function getSystemName() {
    return 'project';
  }
  
  public function getHumanName() {
    return 'Project';
  }
  
  public function getBAO() {
    'CRM_Threepeas_BAO_PumProject';
  }
  
  public function getEntityTableName() {
    return 'civicrm_project';
  }
  
  public function getActiveEntities() {
    $projects = CRM_Threepeas_BAO_PumProject::getValues(array('is_active' => '1'));
    $return = array();
    foreach($projects as $project) {
      $return[$project['id']] = $project['title'];
    }
    return $return;
  }
  
  public function getEntityLabelByEntityId($entity_id) {
    $dao = new CRM_Threepeas_BAO_PumProject();
    $dao->id = $entity_id;
    if ($dao->find(true)) {
      return $dao->title;
    }
    return false;
  }
  
  public function isSingleEntity() {
    return true;
  }
}

