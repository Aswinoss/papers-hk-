<?php
$connect_error = 'Sorry we\'re experiencing connectivity issues!.';

mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('login') or die($connect_error);

?>