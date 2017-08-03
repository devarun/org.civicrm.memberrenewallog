<?php

/**
 * FIXME - Add test description.
 *
 * Tips:
 *  - With HookInterface, you may implement CiviCRM hooks directly in the test class.
 *    Simply create corresponding functions (e.g. "hook_civicrm_post(...)" or similar).
 *  - With TransactionalInterface, any data changes made by setUp() or test****() functions will
 *    rollback automatically -- as long as you don't manipulate schema or truncate tables.
 *    If this test needs to manipulate schema or truncate tables, then either:
 *       a. Do all that using setupHeadless() and Civi\Test.
 *       b. Disable TransactionalInterface, and handle all setup/teardown yourself.
 *
 * @group headless
 */
class CRM_Memberrenewallog_BAO_MembershipRenewalLogTest extends CiviUnitTestCase {

    public function setUp() {
        parent::setUp();

        $params = array(
            'contact_type_a' => 'Individual',
            'contact_type_b' => 'Organization',
            'name_a_b' => 'Test Employee of',
            'name_b_a' => 'Test Employer of',
        );
        $this->_relationshipTypeId = $this->relationshipTypeCreate($params);
        $this->_orgContactID = $this->organizationCreate();
        $this->_financialTypeId = 1;

        $params = array(
            'name' => 'test type',
            'description' => NULL,
            'minimum_fee' => 10,
            'duration_unit' => 'year',
            'member_of_contact_id' => $this->_orgContactID,
            'period_type' => 'fixed',
            'duration_interval' => 1,
            'financial_type_id' => $this->_financialTypeId,
            'relationship_type_id' => $this->_relationshipTypeId,
            'visibility' => 'Public',
            'is_active' => 1,
        );
        $ids = array();
        $membershipType = CRM_Member_BAO_MembershipType::add($params, $ids);
        $this->_membershipTypeID = $membershipType->id;
        $this->_mebershipStatusID = $this->membershipStatusCreate('test status');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    public function tearDown() {
        $this->relationshipTypeDelete($this->_relationshipTypeId);
        $this->membershipTypeDelete(array('id' => $this->_membershipTypeID));
        $this->membershipStatusDelete($this->_mebershipStatusID);
        $this->contactDelete($this->_orgContactID);
    }

    /**
     *  Test add()
     */
    public function testadd() {
        $contactId = $this->individualCreate();

        $params = array(
            'contact_id' => $contactId,
            'membership_type_id' => $this->_membershipTypeID,
            'join_date' => date('Ymd', strtotime('2006-01-21')),
            'start_date' => date('Ymd', strtotime('2006-01-21')),
            'end_date' => date('Ymd', strtotime('2006-12-21')),
            'source' => 'Payment',
            'is_override' => 1,
            'status_id' => $this->_mebershipStatusID,
        );

        $ids = array();
        $membership = CRM_Member_BAO_Membership::create($params, $ids);
        $this->assertDBNotNull('CRM_Memberrenewallog_BAO_MembershipRenewalLog', $membership->id, 'membership_id', 'id', 'Database checked on membership renewal log record.'
        );

        $this->membershipDelete($membership->id);
        $this->contactDelete($contactId);
    }

}
