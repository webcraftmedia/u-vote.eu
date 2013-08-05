<?php
require_once '../system/autoload.inc.php';                                         //SYSTEM Classes
require_once 'uVote/autoload.inc.php';                                           //Project Classes

require_once 'config.php';
SYSTEM\system::start($uvote_config);
\SYSTEM\system::include_ExceptionShortcut();
\SYSTEM\system::include_ResultShortcut();
\SYSTEM\system::register_errorhandler_dbwriter();
\SYSTEM\system::register_errorhandler_jsonoutput();

echo \SYSTEM\API\api::run('\SYSTEM\API\verify','api_uvote',array_merge($_POST,$_GET));