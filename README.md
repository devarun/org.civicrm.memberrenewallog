# CiviCRM Membership Renewal Log

A CiviCRM native extension to records all renewal periods for a membership.

i.e. 

If a membership commenced on 1 Jan 2014 and each term was of 12 months in length, by 1 Jan 2016 the member would be renewing for their 3rd term. The terms would be:
 
Term/Period 1: 1 Jan 2014 - 31 Dec 2015
Term/Period 2: 1 Jan 2015 - 31 Dec 2016
Term/Period 3: 1 Jan 2016 - 31 Dec 2017
 
The aim of this extension is to extend the CiviCRM membership component so that when a membership is created or renewed a record for the membership “period” is recorded.

## Installation

https://wiki.civicrm.org/confluence/display/CRMDOC/Extensions#Extensions-Installinganewextension

## Tested Compatibility

* [Drupal 7](https://ftp.drupal.org/files/projects/drupal-7.55.zip)
* [CiviCRM 4.7](https://download.civicrm.org/civicrm-4.7.20-drupal.tar.gz)

## Known & Possible Improvements

* Conditions used for identifying create & renewal of membership could be improved.
* The test class is not tested yet due to https://github.com/totten/civix/issues/58 needs more work.
* Review and improve wherever it needed



