<?php

require_once('./views/HTMLheader.php');
require_once('./models/db.connect.php');
require_once('./controllers/funkcijos.php');
require_once('./models/irasuskaicius.php');
require_once('./models/metuMenesiuFiltrai.php');
require_once('./views/HTMLfooter.php');

$connection->close();
