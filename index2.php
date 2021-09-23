<?php

// use phpCAS;
/**
 * Example that changes html of phpcas messages
 *
 * PHP Version 7
 *
 * @file     example_html.php
 * @category Authentication
 * @package  PhpCAS
 * @author   Joachim Fritschi <jfritschi@freenet.de>
 * @author   Adam Franco <afranco@middlebury.edu>
 * @license  http://www.apache.org/licenses/LICENSE-2.0  Apache License 2.0
 * @link     https://wiki.jasig.org/display/CASC/phpCAS
 */

// Load the settings from the central config file
// require_once 'config.php';
// Load the CAS lib
require_once 'vendor/bssn-sso/phpcas/source/CAS.php';
// Enable debugging
phpCAS::setLogger();
// Enable verbose error messages. Disable in production!
phpCAS::setVerbose(true);


// Initialize phpCAS
phpCAS::client('2.0', 'dev-sso.bssn.go.id', 443, 'cas');

// For production use set the CA certificate that is the issuer of the cert
// on the CAS server and uncomment the line below
// phpCAS::setCasServerCACert($cas_server_ca_cert_path);

// For quick testing you can disable SSL validation of the CAS server.
// THIS SETTING IS NOT RECOMMENDED FOR PRODUCTION.
// VALIDATING THE CAS SERVER IS CRUCIAL TO THE SECURITY OF THE CAS PROTOCOL!
phpCAS::setNoCasServerValidation();

phpCAS::logout();
// force CAS authentication
phpCAS::forceAuthentication();

// at this step, the user has been authenticated by the CAS server
// and the user's login name can be read with phpCAS::getUser().

// for this test, simply print that the authentication was successfull
?>
<html>
  <head>
    <title>phpCAS simple client with HTML output customization</title>
  </head>
  <body>
    <h1>Successfull Authentication!</h1>
    <dl style='border: 1px dotted; padding: 5px;'>
      <dt>Current script</dt><dd><?php print basename($_SERVER['SCRIPT_NAME']); ?></dd>
      <dt>session_name():</dt><dd> <?php print session_name(); ?></dd>
      <dt>session_id():</dt><dd> <?php print session_id(); ?></dd>
      <dt>check():</dt><dd> <?php print_r (phpCAS::checkAuthentication()); ?></dd>
      <dt>attributes():</dt><dd> <?php print_r( phpCAS::getAttributes()); ?></dd>
      <!-- <dt>auth():</dt><dd> <?php // print_r( phpCAS::forceAuthentication() ); ?></dd> -->
    </dl>
    <p>the user's login is <b><?php echo phpCAS::getUser(); ?></b>.</p>
    <p>phpCAS version is <b><?php echo phpCAS::getVersion(); ?></b>.</p>
  </body>
</html>
