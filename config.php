<?php

$uvote_config = array(  array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_ERRORREPORTING,      E_ALL | E_STRICT),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEURL,        'http://www.mojotrollz.eu/web/uVote/'),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_BASEPATH,       '/home/web/webdir/uVote/'),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE,             SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_TYPE_MYS),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_HOST,             '127.0.0.1'),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PORT,             ''),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_USER,             'mojotrolls_dev'),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_PASSWORD,         'dsjgfasudzfsvad'),
                        array(SYSTEM\CONFIG\config_ids::SYS_CONFIG_DB_DBNAME,           'host_uVote'),
                        array(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_PATH_SYSTEMPATHREL, '../system/'),
                            array(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_NAVIMG,         '/web/system/sai/page/default_page/img/logo.png'),//not working, cuz paths are not set yet! \SYSTEM\WEBPATH(new \SYSTEM\PSAI(),'page/default_page/img/logo.png')),
                            array(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_BASEURL,        'http://mojotrollz.eu/web/uVote/sai.php?'),
                            array(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_TITLE,          'mojotrollz - Admin Area'),
                            array(\SYSTEM\CONFIG\config_ids::SYS_SAI_CONFIG_COPYRIGHT,      '<a href="http://www.mojotrollz.eu/web/uVote/" target="_blank">uVote</a>, &copy; WebCraft Media 2013'),
                        
                        array(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_LANGS,              array('deDE', 'enUS')),
                        array(\SYSTEM\CONFIG\config_ids::SYS_CONFIG_DEFAULT_LANG,       'deDE'));   