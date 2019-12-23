<?php
return array(
/** set your paypal credential **/
'client_id' =>'ARP5TfQES3p8lkQPEIJPlXh1djX-8Udo0uRVelhloy-uOUKFclsI6OOsqp4e4rKOS6BA2q8FQbVl1ugm',
'secret' => 'ELFzwMlwoIlHDXWaeEvC_V_pUulkjbGrkawPgb31zpAOC7VThyUdkMp0WypNTRXyGZdz0_kksLg6rsnh',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);
?>