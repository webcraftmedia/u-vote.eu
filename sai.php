<?php
require_once 'lib/system/autoload.inc';                                         //SYSTEM Classes
require_once 'uvote/autoload.inc';                                              //Project Classes
require_once '/home/web/web/config/get_config.php';

\SYSTEM\system::start(\WEBCRAFT\get_config(dirname(__FILE__)));
SYSTEM\system::include_ExceptionShortcut();                                     //allow ERROR() instead of \SYSTEM\LOG\ERROR()
SYSTEM\system::include_ResultShortcut();                                        //allow JsonResult() instead of \SYSTEM\LOG\JsonResult()
SYSTEM\system::register_errorhandler_dbwriter();                                //write errors to database (must be first errorhandler to register)
SYSTEM\system::register_errorhandler_jsonoutput();                              //print errors as json to caller

$sai = new SYSTEM\SAI\saigui();
echo $sai->html();