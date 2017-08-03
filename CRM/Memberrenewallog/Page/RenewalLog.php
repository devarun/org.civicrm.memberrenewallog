<?php

class CRM_Memberrenewallog_Page_RenewalLog extends CRM_Core_Page {

    /**
     * List memberships for the UF user.
     *
     */
    public function listRenewalLog() {

        // Set the page-title dynamically
        CRM_Utils_System::setTitle(ts('Renewal Log'));

        // Get value of membership_id from the query string
        $id = CRM_Utils_Request::retrieve('membership_id', 'Positive', $this);
        
        $membership = array();
        $dao = new CRM_Memberrenewallog_DAO_MembershipRenewalLog();
        $dao->is_test = 0;
        if ($id) {
            $dao->whereAdd("membership_id = " . $id);
        }
        // Get all membership renewals matching with the data
        $dao->find();

        // Create array of membership renewals to be displayed in UI
        while ($dao->fetch()) {
            $membership[$dao->id]['membership_id'] = $dao->membership_id;
            $membership[$dao->id]['contact_id'] = $dao->contact_id;
            $membership[$dao->id]['start_date'] = $dao->start_date;
            $membership[$dao->id]['end_date'] = $dao->end_date;
            $membership[$dao->id]['modified_date'] = $dao->modified_date;
            $membership[$dao->id]['contribution_id'] = $dao->contribution_id;
            //var_dump($dao);
        }
        
        // Assign membership renewals to UI variable
        $this->assign('renewalLog', $membership);
    }

    public function run() {
        $this->listRenewalLog();
        parent::run();
    }

}
