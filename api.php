<?php

require_once '../system/autoload.inc.php';                                         //SYSTEM Classes
require_once 'uVote/autoload.inc.php';                                           //Project Classes
require_once '../system/log/register_exception_shortcut.php';                      //allow ERROR() instead of \SYSTEM\LOG\ERROR()
require_once '../system/log/register_errorhandler_jsonoutput.php';                 //print errors as json to caller
require_once '../system/log/register_result_shortcut.php'; 

require_once 'config.php';
SYSTEM\system::start($uvote_config);

$api = new \SYSTEM\API\Api (new SYSTEM\verifyclass(), new ApiClass());
echo $api->CALL(array_merge($_POST,$_GET));