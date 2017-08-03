<?php

class CRM_Memberrenewallog_BAO_MembershipRenewalLog extends CRM_Memberrenewallog_DAO_MembershipRenewalLog {

  /**
   * Create a new MembershipRenewalLog based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_Memberrenewallog_DAO_MembershipRenewalLog|NULL
   *
  public static function create($params) {
    $className = 'CRM_Memberrenewallog_DAO_MembershipRenewalLog';
    $entityName = 'MembershipRenewalLog';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

}
