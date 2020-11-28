<?php
require_once 'vendor/autoload.php';

use PlayStation\Client;

$client = new Client();
//                           v code from above
$client->loginWithNpsso('<oVQEPKLo6Ohm5TBUepQ1zCEnEaIAcjMTRpl1OKMgWFCqU31rTVbaPc4fKwf3nxe8>');

$refreshToken = $client->refreshToken(); // Save this code somewhere (database, file, cache) and use this for future logins
?>