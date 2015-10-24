<?php
\SYSTEM\autoload::registerFolder(dirname(__FILE__));
\SYSTEM\autoload::registerFolder(dirname(__FILE__).'/saimod_uvote_vote_edit', 'SAI');
\SYSTEM\SAI\sai::register('\SAI\saimod_uvote_vote_edit');
