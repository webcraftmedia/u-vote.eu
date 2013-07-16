<?php

$autoload = SYSTEM\autoload::getInstance();

$autoload->registerFolder(dirname(__FILE__),'');
$autoload->registerFolder(dirname(__FILE__).'/default_page','');
$autoload->registerFolder(dirname(__FILE__).'/default_myvote','');
$autoload->registerFolder(dirname(__FILE__).'/default_register','');
$autoload->registerFolder(dirname(__FILE__).'/default_openinfo','');
