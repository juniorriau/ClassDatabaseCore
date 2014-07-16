<?php

/* 
 * Copyright 2014 juniorriau18 <juniorriau18@gmail.com>
 * Simple class database for run query, fetch data.
 * This script under GPL v2 License.
 */

class sampleClass extends classDatabase
{
    private $temp;
    public function __construct() 
    {
        $this->openConnection();
    }
    
    public function getData($sql)
    {
        $this->temp=$this->fetchAll($sql);
        if(is_array($this->temp))
        {
            return $this->temp;
        }
        else
        {
            return FALSE;
        }
    }
    public function getOne($sql)
    {
        $this->temp=$this->fetchOne($sql);
        if(is_array($this->temp))
        {
            return $this->temp;
        }
        else
        {
            return FALSE;
        }
    }
    public function runQuery($sql)
    {
        $this->temp=$this->execSql($sql);
        if($this->temp)
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
    }

    public function __destruct()
    {
        $this->closeConnection();
    }
}