<?php

/* 
 * Copyright 2014 juniorriau18 <juniorriau18@gmail.com>
 * Simple class database for run query, fetch data.
 * This script under GPL v2 License.
 */
class classDatabase
{
    public static $mysqli;
    
    public static function connect()
    {
        if(!isset(self::$mysqli)){
          
            try{
                self::$mysqli = new mysqli(dbhost, dbuser, dbpass, dbname, dbport);
            }catch(mysqli_sql_exception $e){
                self::disconnect();
                echo $e;
            }
        }
        return self::$mysqli;
    }
    public static function disconnect()
    {
        self::$mysqli=null;
    }
    
    public static function execute($sql)
    {
        /*
         * untuk run sql query insert/update/delete
         */
        $q=self::connect();
        $temp=$q->query($sql);
        if($temp)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
        self::disconnect();
    }
    public static function fetchAll($sql)
    {
        /*
         * untuk run sql query select
         */
        $result=array();
        $q=self::connect();
        $temp=$q->query($sql);
        $data=$temp->num_rows;
        if($data===0)
        {
            return FALSE;
        }
        else
        {   
            /*
             * return value dengan array in array, untuk multiple record as object
             */
            while ($obj = $temp->fetch_object()) {
                array_push($result,$obj);
            }

            return $result;
        }
        self::disconnect();
    }
    public static function fetchOne($sql)
    {
        /*
         * untuk run sql query select
         */
        $q=self::connect();
        $temp=$q->query($sql);
        $data=$temp->num_rows;
        if($data===0)
        {
            return FALSE;
        }
        else
        {   
            /*
             * return value array untuk single record
             */
            $data=$temp->fetch_object();
            return $data;
        }
        self::disconnect();
    }
}