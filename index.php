<?php

require_once '../system/autoload.inc.php';                                         //SYSTEM Classes
require_once 'uVote/autoload.inc.php';                                           //Project Classes
require_once '../system/log/register_exception_shortcut.php';                      //allow ERROR() instead of \SYSTEM\LOG\ERROR()
require_once '../system/log/register_errorhandler_jsonoutput.php';                 //print errors as json to caller
       
SYSTEM\system::start(array( array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING,  E_ALL | E_STRICT),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL,    'http://www.mojotrollz.eu/web/uVote/'),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH,   '/home/web/webdir/uVote/'),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE,         SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE_MYS),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST,         '127.0.0.1'),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT,         ''),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER,         'mojotrolls_dev'),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PASSWORD,     'dsjgfasudzfsvad'),
                            array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME,       'host_uVote')));

$page = new \SYSTEM\PAGE\PageApi(new SYSTEM\verifyclass(), new PageApi());
echo $page->CALL(array_merge($_POST,$_GET))->html();