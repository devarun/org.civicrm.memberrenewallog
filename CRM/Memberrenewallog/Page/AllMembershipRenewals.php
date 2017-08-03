<?php

class CRM_Memberrenewallog_Page_AllMembershipRenewals extends CRM_Core_Page {

    public function run() {
        // Example: Set the page-title dynamically; alternatively, declare a static title in xml/Menu/*.xml
        CRM_Utils_System::setTitle(ts('Membership Renewals'));
        
        // Get contact id from query string
        $cid = CRM_Utils_Request::retrieve('cid', 'Positive', $this);
        
        // Find all membership mapped to the contact
        $dao_membership = new CRM_Member_DAO_Membership();
        $dao_membership->is_test = 0;
        if ($cid) {
            $dao_membership->whereAdd("contact_id = " . $cid);
        }
        $dao_membership->find();

        // Get membership types of all membership mapped to the contact
        $membershipIds = array();
        $membershiptypes = array();
        while ($dao_membership->fetch()) {
            $membershipIds[] = $dao_membership->id;
            $membershiptypes[$dao_membership->id] = $dao_membership->membership_type_id;
        }

        // Get membership type details 
        $dao_subscription_type = new CRM_Member_DAO_MembershipType();
        $dao_subscription_type->is_test = 0;
        $dao_subscription_type->whereAdd("id IN (" . implode(', ', $membershiptypes) . ")");
        $dao_subscription_type->find();
        
        $memberType = array();
        while ($dao_subscription_type->fetch()) {
            $memberType[$dao_subscription_type->id] = $dao_subscription_type->name;
        }
        
        // get renewal log for the memberships mapped to the contact
        $dao = new CRM_Memberrenewallog_DAO_MembershipRenewalLog();
        $dao->is_test = 0;
        $dao->whereAdd("membership_id IN (" . implode(', ', $membershipIds) . ")");
        $dao->find();
        
        // Create array of data to be displayed in UI
        $membership = array();
        while ($dao->fetch()) {
            $membership[$dao->id]['membership_id'] = $dao->membership_id;
            $membership[$dao->id]['contact_id'] = $dao->contact_id;
            $membership[$dao->id]['membership_type'] = $memberType[$membershiptypes[$dao->membership_id]];
            $membership[$dao->id]['start_date'] = $dao->start_date;
            $membership[$dao->id]['end_date'] = $dao->end_date;
            $membership[$dao->id]['modified_date'] = $dao->modified_date;
            $membership[$dao->id]['contribution_id'] = $dao->contribution_id;
            //var_dump($dao);
        }
        $this->assign('renewalLog', $membership);

        parent::run();
    }

}
