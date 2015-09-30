<?php
require_once 'lib/autoload.inc';                                                //SYSTEM Classes
require_once 'uvote/autoload.inc';                                         //Project Classes
require_once '/home/web/web/config/get_config.php';

\SYSTEM\system::start(\WEBCRAFT\get_config(dirname(__FILE__)));
\SYSTEM\system::include_ExceptionShortcut();
\SYSTEM\system::include_ResultShortcut();
\SYSTEM\system::register_errorhandler_dbwriter();
\SYSTEM\system::register_errorhandler_jsonoutput();

echo \SYSTEM\SQL\setup::install();