
<div class="view-content">
{if $renewalLog}
<div id="memberships">
    <div class="form-item">
        {strip}
        <table>
        <tr class="columnheader">
            <th>{ts}Membership ID{/ts}</th>
            <th>{ts}Start Date{/ts}</th>
            <th>{ts}End Date{/ts}</th>
            <th>{ts}Renewal Date{/ts}</th>
            <th>{ts}Contribution{/ts}</th>
            <th></th>
        </tr>
        {foreach from=$renewalLog item=log}
        <tr class="{cycle values="odd-row,even-row"}">
          <td>{$log.membership_id}</td>
          <td>{$log.start_date|crmDate}</td>
          <td>{$log.end_date|crmDate}</td>
          <td>{$log.modified_date|crmDate}</td>
          <td><a class="crm-popup" href='{crmURL p="civicrm/contact/view/contribution" q="reset=1&cid=`$log.contact_id`&id=`$log.contribution_id`&action=view&context=contribution&selectedChild=contribute"}'>Contribution</a></td>        </tr>
        </tr>
        {/foreach}
        </table>
        {/strip}

    </div>
</div>
{else}
    <div id="memberships">No renewals found!</div>
{/if}
</div>
