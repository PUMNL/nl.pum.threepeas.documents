<?php

require_once 'CRM/Core/Page.php';

class CRM_Documents_Page_ProjectDocuments extends CRM_Core_Page {
  
  protected $projectId;
  
  function run() {
    // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
    CRM_Utils_System::setTitle(ts('Project documents'));
    
    $this->projectId = CRM_Utils_Request::retrieve('pid', 'Positive', $this);
    $project = CRM_Threepeas_BAO_PumProject::getValues(array('id'=> $this->projectId));
    $pageTitle = "Project ".$project[$this->projectId]['title'];
    $this->assign('pageTitle', $pageTitle);
    $this->assign('projectId', $this->projectId);
    
    $documentRepo = CRM_Documents_Entity_DocumentRepository::singleton();
    $documents = $documentRepo->getDocumentsByEntityId('civicrm_project', $this->projectId);
    
    $this->assign('documents', $documents);    
    $this->assign('permission', 'edit');
    
    $doneUrl = CRM_Utils_System::url('civicrm/projectlist');
    $this->assign('doneUrl', $doneUrl);
    
    $this->setUserContext();

    parent::run();
  }
  
  protected function setUserContext() {    
    $session = CRM_Core_Session::singleton();
    $userContext = CRM_Utils_System::url('civicrm/documents/threepeas/project', 'pid='.$this->projectId);
    $session->pushUserContext($userContext);
  }
}
