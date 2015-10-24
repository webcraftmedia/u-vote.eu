<?php
\SYSTEM\autoload::registerFolder(dirname(__FILE__),'SQL');
\SYSTEM\autoload::registerFolder(dirname(__FILE__).'/tbl/','SQL');
\SYSTEM\autoload::registerFolder(dirname(__FILE__).'/qq/','SQL');

\SYSTEM\SQL\setup::register('SQL\\DATA_UVOTE');