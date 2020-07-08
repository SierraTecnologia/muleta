<?php

namespace SiObjects\Support\Trabalhando\Database;

use Exception;
use Siravel\Exception\NoFaceException;

class MysqlImport
{

    public function run()
    {
                        
        try 
        {
            $connection = new PDO("mysql:host=$host", $username, $password, $options);
            $sql = file_get_contents("data/first.sql");
            $connection->exec($sql);
            
            echo "Database and table users created successfully.";
        }
        catch(PDOException $error)
        {
            echo $sql . "<br>" . $error->getMessage();
        }
    }
}