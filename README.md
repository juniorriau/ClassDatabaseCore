ClassDatabaseCore
=================

Simple Class for interactive with database

How to use this class?

- include file needed

require_once 'config.php';
require_once 'classDatabase.php';
require_once 'sampleClass.php';

- create variable as new class;
$var = new sampleClass();

/*
 * untuk penggunaan query insert, update, delete
 */
$query1 = "query insert";
$run = $var->runQuery($query1);
if($run)
{
    echo "Query success";
}
else
{
    echo "Query failed";
}


/*
 *  untuk penggunaan query select 1 record
 */
$query2 = "query select 1 record";
$run2 = $var->runQuery($query2);
if(is_array($run2))
{
    echo "Query success<br>";
    echo $run2['fieldname'];
}
else
{
    echo "Query failed";
}


/*
 *  untuk penggunaan query select banyak record
 */
$query3 = "query select banyak record";
$run3 = $var->runQuery($query3);
if(is_array($run3))
{
    echo "Query success<br>";
    foreach ($run3 as $data)
    {
        //index array berupa angka misal 0, untuk column pertama hasil select
        echo $run3[indexarray]; 
    }
}
else
{
    echo "Query failed";
}