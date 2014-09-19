<?php

/* 
 * Copyright 2014 juniorriau18 <juniorriau18@gmail.com>
 * Simple class database for run query, fetch data.
 * This script under GPL v2 License.
 */
require_once 'config.php';
require_once 'classDatabase.php';

classDatabase::execute("INSERT INTO classdb(value) values('xxx')");
$d= classDatabase::fetchOne("SELECT * FROM classdb WHERE id=1");
$datas= classDatabase::fetchAll("SELECT * FROM classdb");
echo "Fetch one data : <br> ";
echo $d->id." ->> ".$d->value;
echo "<br>";
echo "Fetch all data : <br> ";
foreach ($datas as $d)
{
    echo "ID : ".$d->id;
    echo " Value : ".$d->value;
    echo "<br>";
}
/*while($data=  mysqli_fetch_object($datas))
{
    echo $data->id. " --> ".$data->value;
    echo "<br>";
}*/
