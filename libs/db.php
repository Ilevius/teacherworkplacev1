<?php
require 'rb/rb-postgres.php';
$db = parse_url(getenv("DATABASE_URL"));
$db["path"] = ltrim($db["path"], "/");
$constr='pgsql:host='.$db['host'].';dbname='.$db['path'];
R::setup( $constr, $db['user'], $db['pass'] );




?>