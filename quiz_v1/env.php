<?php
#############################################################################################
#
#stores variables that are not related to classes
#
#
#
############################################################################################

/* relative path to file (for calls in form action)
* htmlspecialchars to avoid simple hacking via URL-params
*/
//$m_sScriptname = htmlspecialchars($_SERVER['PHP_SELF']);

define ("SCRIPTNAME", htmlspecialchars($_SERVER['PHP_SELF']));

define("QUIZ_VERSION", "1,2");


?>