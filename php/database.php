<?php

class Database
{
    private static $dbHost = "sql25";
    private static $dbName = "dcu96791";
    private static $dbUsername = "dcu96791";
    private static $dbUserpassword = "iyCC7qgyxcqR";
    private static $connection = null;
    public static function connect()
    {
        if(self::$connection == null)
        {
            try
            {

             self::$connection = new PDO("mysql:host=" . self::$dbHost . ";dbname=" . self::$dbName ,self::$dbUsername,self::$dbUserpassword);
            }
            catch(PDOException $e)
            {
                die($e->getMessage());
            }
        }
        return self::$connection;
    }
    
    public static function disconnect()
    {
        self::$connection = null;
    }

}
?>
