<h3>{$pageTitle}</h3>
<div class="crm-content-block crm-block">
  <div class="crm-submit-buttons">
    <span class="crm-button">
      <input id="done-drill" class="form-button" type="button" value="Done" name="done" onclick="window.location='{$doneUrl}'">
    </span>
    {if $permission EQ 'edit'}
        {capture assign=newDocumentURL}{crmURL p="civicrm/documents/document" q="reset=1&action=add&entity_id=`$projectId`&entity=project"}{/capture}
        <div class="action-link">
            <a accesskey="N" href="{$newDocumentURL}" class="button">
                <span><div class="icon add-icon"></div>{ts}New document{/ts}</span>
            </a>
        </div>
    {/if}
  </div>            
  <div id="project-document-wrapper" class="dataTables_wrapper">
    <table>
    <thead>
        <tr>
            <th class="ui-state-default">{ts}Subject{/ts}</th>
            <th class="ui-state-default">{ts}Contacts{/ts}</th>
            <th class="ui-state-default">{ts}Date modified{/ts}</th>
            <th class="ui-state-default">{ts}Modified by{/ts}</th>
            <th class="no-sort ui-state-default"></th>
        </tr>
     </thead>
     <tbody>
        
        {foreach from=$documents item=doc}
            <tr class="{cycle values="odd,even"}">
                <td>{$doc->getSubject()}</td>
                <td>{$doc->getFormattedContacts()}</td>
                <td>{$doc->getFormattedDateUpdated()}</td>
                <td>{$doc->getFormattedUpdatedBy()}</td>
                <td>
                    {include file=CRM/Documents/actionlinks.tpl contactId=$clientId entity=project entity_id=$projectId}
                </td>
            </tr>
        {/foreach}
    </tbody>
</table>
  </div>
  <div class="crm-submit-buttons">
    <span class="crm-button">
      <input id="done-drill" class="form-button" type="button" value="Done" name="done" onclick="window.location='{$doneUrl}'">
    </span>
    {if $permission EQ 'edit'}
        {capture assign=newDocumentURL}{crmURL p="civicrm/documents/document" q="reset=1&action=add&entity_id=`$projectId`&entity=project"}{/capture}
        <div class="action-link">
            <a accesskey="N" href="{$newDocumentURL}" class="button">
                <span><div class="icon add-icon"></div>{ts}New document{/ts}</span>
            </a>
        </div>
    {/if}
  </div>            
</div>