/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  Arun Singh <aks2@ysg.co.in>
 * Created: 11 Jun, 2017
 */

DROP TABLE IF EXISTS `civicrm_membershiprenewallog`;


-- /*******************************************************
-- *
-- * civicrm_membershiprenewallog
-- *
-- * FIXME
-- *
-- *******************************************************/
CREATE TABLE `civicrm_membershiprenewallog` (


     `id` int unsigned NOT NULL AUTO_INCREMENT  COMMENT 'Unique MembershipRenewalLog ID',
     `membership_id` int unsigned    COMMENT 'FK to Membership',
     `contact_id` int unsigned    COMMENT 'FK to Contact',
     `start_date` date NOT NULL   COMMENT 'Renewal Start Date',
     `end_date` date NOT NULL   COMMENT 'Renewal End Date',
     `contribution_id` int unsigned    COMMENT 'FK to Contribution',
     `modified_date` date NOT NULL   COMMENT 'Modified Date' 
,
        PRIMARY KEY (`id`)
 
,          CONSTRAINT FK_civicrm_membershiprenewallog_contact_id FOREIGN KEY (`contact_id`) REFERENCES `civicrm_contact`(`id`) ON DELETE CASCADE 
,          CONSTRAINT FK_civicrm_membershiprenewallog_membership_id FOREIGN KEY (`membership_id`) REFERENCES `civicrm_membership`(`id`) ON DELETE CASCADE
,          CONSTRAINT FK_civicrm_membershiprenewallog_contribution_id FOREIGN KEY (`contribution_id`) REFERENCES `civicrm_contribution`(`id`) ON DELETE CASCADE  
)  ENGINE=InnoDB DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci  ;
