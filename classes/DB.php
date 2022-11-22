<?php

session_start();

class DB
{
    static private $connection;

    CONST DB_TYPE = "mysql";
    CONST DB_HOST = "localhost";
    CONST DB_NAME = "thecoffeehouse";
    CONST USER_NAME = "root";
    CONST USER_PASSWORD = "";


    static public function getConnection(){        
        if(static::$connection == null)
        {
            // // cách 1: 
            // static::$connection = new PDO(
            //     self::DB_TYPE.":host=".self::DB_HOST. ";dbname=" .self::DB_NAME,
            //     self::USER_NAME, 
            //     self::USER_PASSWORD
            // );

            // cách 2:
            try{
                static::$connection = new PDO(
                    self::DB_TYPE.":host=".self::DB_HOST. ";dbname=" .self::DB_NAME,
                    self::USER_NAME, 
                    self::USER_PASSWORD
                );
            } catch(Exception $exception){
                throw new Exception("connection fail");
            }
        }
        return static::$connection;
    }

    static public function execute($sql, $data = [])
    {
        $statement = DB::getConnection()->prepare($sql);
        $statement->setFetchMode(PDO::FETCH_ASSOC);

        $statement->execute($data);
        $result =[];

        while($item = $statement->fetch()) {
            $result[]=$item; 
        }
        return $result;  
    }
}
