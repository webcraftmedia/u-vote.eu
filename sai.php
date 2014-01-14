<?php
require_once '../system/autoload.inc.php';                                         //SYSTEM Classes
require_once 'uVote/autoload.inc.php';                                        //Project Classes

require_once 'config.php';                                                      //Server config
SYSTEM\system::start($uvote_config);                                          //Start System time + config
SYSTEM\system::include_ExceptionShortcut();                                     //allow ERROR() instead of \SYSTEM\LOG\ERROR()
SYSTEM\system::include_ResultShortcut();                                        //allow JsonResult() instead of \SYSTEM\LOG\JsonResult()
SYSTEM\system::register_errorhandler_dbwriter();                                //write errors to database (must be first errorhandler to register)
SYSTEM\system::register_errorhandler_jsonoutput();                              //print errors as json to caller

require_once '../system/sai/autoload.inc.php';
require_once 'uVote/sai/autoload.inc.php';
require_once 'uVote/sai/register_modules.php';

$sai = new SYSTEM\SAI\saigui();
echo $sai->html();