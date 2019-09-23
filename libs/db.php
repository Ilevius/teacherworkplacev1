<?php
require 'rb/rb.php';
$db = parse_url(getenv("DATABASE_URL"));
$db["path"] = ltrim($db["path"], "/");
$constr='pgsql:host='.$db['host'].';dbname='.$db['path'];
R::setup( $constr, $db['user'], $db['pass'] );

/*R::setup( 'mysql:host=localhost;dbname=refactoring',
'root', 'TheriON9' ); //for both mysql or mariaDB*/


?>