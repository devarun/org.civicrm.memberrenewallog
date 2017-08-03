<?php

require_once 'memberrenewallog.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function memberrenewallog_civicrm_config(&$config) {
    _memberrenewallog_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function memberrenewallog_civicrm_xmlMenu(&$files) {
    _memberrenewallog_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function memberrenewallog_civicrm_install() {
    _memberrenewallog_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function memberrenewallog_civicrm_postInstall() {
    _memberrenewallog_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function memberrenewallog_civicrm_uninstall() {
    _memberrenewallog_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function memberrenewallog_civicrm_enable() {
    _memberrenewallog_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function memberrenewallog_civicrm_disable() {
    _memberrenewallog_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function memberrenewallog_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
    return _memberrenewallog_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function memberrenewallog_civicrm_managed(&$entities) {
    _memberrenewallog_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function memberrenewallog_civicrm_caseTypes(&$caseTypes) {
    _memberrenewallog_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function memberrenewallog_civicrm_angularModules(&$angularModules) {
    _memberrenewallog_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function memberrenewallog_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
    _memberrenewallog_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
  function memberrenewallog_civicrm_preProcess($formName, &$form) {

  } // */
/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
  function memberrenewallog_civicrm_navigationMenu(&$menu) {
  _memberrenewallog_civix_insert_navigation_menu($menu, NULL, array(
  'label' => ts('The Page', array('domain' => 'org.civicrm.memberrenewallog')),
  'name' => 'the_page',
  'url' => 'civicrm/the-page',
  'permission' => 'access CiviReport,access CiviContribute',
  'operator' => 'OR',
  'separator' => 0,
  ));
  _memberrenewallog_civix_navigationMenu($menu);
  } // */

/**
 * Registering new entity to store data for members renewal log using hook_civicrm_entityTypes
 * 
 * @param array $entityTypes
 */
function memberrenewallog_civicrm_entityTypes(&$entityTypes) {
    $entityTypes[] = array(
        'name' => 'MembershipRenewalLog',
        'class' => 'CRM_Memberrenewallog_DAO_MembershipRenewalLog',
        'table' => 'civicrm_membershiprenewallog',
    );
}

/**
 * Implementation of hook_civicrm_post
 */
function memberrenewallog_civicrm_post($op, $objectName, $objectId, &$objectRef) {
    //print_r($objectRef);
    $file = '/tmp/objectNamePost.log';
    $paramTxt = get_class($objectRef);
    $message = strtr("Performed \"@op\" at @time on @objectName #@id\n @params \n", array(
        '@op' => $op,
        '@time' => date('Y-m-d H:i:s'),
        '@id' => $id,
        '@objectName' => $objectName,
        '@params' => $paramTxt,
    ));
    file_put_contents($file, $message, FILE_APPEND);
    switch ($objectName) {
        // check if the the object if for Membership
        case 'Membership':
            // Fix Me: Improve the check to make it more robust
            if (($op == 'create' && (get_class($objectRef) == 'CRM_Member_BAO_Membership')) || ($op == 'edit' && (get_class($objectRef) == 'CRM_Member_DAO_Membership'))) {
                
                // Get Membership Type
                $membershipType = civicrm_api3('MembershipType', 'get', array(
                    'id' => "{$objectRef->membership_type_id}",
                    'options' => array('limit' => 1),
                    'sequential' => 1,
                ));
                $membershipTypeDetails = $membershipType['values'][0];
                
                // Reverse calculate the start date in case of create & renewal of membership
                if ($objectRef->end_date) {
                    $date = explode('-', $objectRef->end_date);
                    $year = $date[0];
                    $month = $date[1];
                    $day = $date[2];
                    $numRenewTerms = 1;

                    switch ($membershipTypeDetails['duration_unit']) {
                        case 'year':
                            $year = $year - ($numRenewTerms * $membershipTypeDetails['duration_interval']);
                            //extend membership date by duration interval.
                            if ($fixed_period_rollover) {
                                $year -= 1;
                            }
                            break;

                        case 'month':
                            $month = $month - ($numRenewTerms * $membershipTypeDetails['duration_interval']);
                            //duration interval is month
                            if ($fixed_period_rollover) {
                                $month -= 1;
                            }
                            break;

                        case 'day':
                            $day = $day - ($numRenewTerms * $membershipTypeDetails['duration_interval']);

                            if ($fixed_period_rollover) {
                                //Fix Me: Currently not allowed when duration is day
                            }
                            break;
                    }
                }
                
                // Create start date
                if ($membershipTypeDetails['duration_unit'] == 'lifetime') {
                    $endDate = NULL;
                } else {
                    $endDate = date('Y-m-d', mktime(0, 0, 0, $month, $day + 1, $year));
                }
                
                // Add new membership renewal log
                $result = civicrm_api3('MembershipRenewalLog', 'create', array(
                    'contact_id' => $objectRef->contact_id,
                    'membership_id' => $objectRef->id,
                    'start_date' => $endDate,
                    'end_date' => $objectRef->end_date,
                    'contribution_id' => null,
                    'modified_date' => date('Y-m-d'),
                    'sequential' => 1,
                ));
            }
            break;
        case 'MembershipPayment':
            // If membership payment is received try updating the unmapped membership renewal log
            if ($objectRef instanceof CRM_Member_DAO_MembershipPayment) {
                
                // get contribution details
                $contribution = civicrm_api3('Contribution', 'get', array(
                    'id' => "{$objectRef->contribution_id}",
                    'options' => array('limit' => 1),
                    'sequential' => 1,
                ));
                $contributionDetails = $contribution['values'][0];
                
                // Check if a membership renewal log exists with contribution_id = null
                $memberRenewal = civicrm_api3('MembershipRenewalLog', 'get', array(
                    'membership_id' => "{$objectRef->membership_id}",
                    'contribution_id' => null,
                    'options' => array('limit' => 1),
                    'sequential' => 1,
                ));
                $memberRenewalDetails = $memberRenewal['values'][0];
                
                // Check if contribution is for "Member Dues" and membership renewal with null contribution exists
                if ($contributionDetails['financial_type_id'] == 2 && $memberRenewalDetails) {
                    
                    // Map payment to membership renewal contribution
                    $result = civicrm_api3('MembershipRenewalLog', 'create', array(
                        'id' => $memberRenewalDetails['id'],
                        'contribution_id' => $objectRef->contribution_id,
                        'sequential' => 1,
                    ));
                }
            }
            break;
        default:
            // Do Nothing
            break;
    }
}

/**
 * Add new link to display membership renewal log using hook_civicrm_links
 * 
 * @param string $op
 * @param string $objectName
 * @param int $objectId
 * @param array $links
 * @param array $mask
 * @param array $values
 */
function memberrenewallog_civicrm_links($op, $objectName, $objectId, &$links, &$mask, &$values) {
    switch ($objectName) {
        case 'Membership':
            switch ($op) {
                case 'membership.selector.row':
                    $links[] = array(
                        'name' => ts('Renewal Log'),
                        'url' => 'civicrm/membershiprenewallog',
                        'title' => 'View Membership Renewal Log',
                        'qs' => 'membership_id=%%membership_id%%',
                        'class' => 'crm-popup',
                    );
                    $values['membership_id'] = $objectId;
                    break;
            }
            break;
        default:
            // Do Nothing
            break;
    }
}

/**
 * Add new tab to the contact page to show member renewals
 * 
 * @param array $tabs
 * @param int $contactID
 */
function memberrenewallog_civicrm_tabs(&$tabs, $contactID) {

    $url = CRM_Utils_System::url('civicrm/all/membershiprenewallog', "reset=1&snippet=1&force=1&cid=$contactID");
    $renewalTab = array(
        'id' => 'membershiprenewallog',
        'url' => $url,
        'title' => 'Membership Renewals',
        'weight' => 30,
        'class' => 'livePage',
    );
    $tabs[] = $renewalTab;
}

