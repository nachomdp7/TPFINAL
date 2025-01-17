<?php

namespace DAO;

use DAO\IAdminDAO as IAdminDAO;
use Exception;
use Models\Admin as Admin;
use DAO\Connection as Connection;

    class AdminDAO implements IAdminDAO
    {
        private $connection;
        private $tableName = "Admin_";


        public function __construct()
        {
            
        }


public function Add(Admin $admin){


    try
    {
        $query = "INSERT INTO ".$this->tableName." (email, passwordS,roles,nameA) 
        VALUES (:email, :passwordS, :roles, :nameA);";
        $parameters["email"] = $admin->getEmail();
        $parameters["passwordS"] = $admin->getPasword();
        $parameters["roles"] = $admin->getRole();
        $parameters["nameA"] = $admin->getName();
        


        $this->connection = Connection::GetInstance();
    
        
        $this->connection->ExecuteNonQuery($query, $parameters);
    
    }
    catch(Exception $ex)
    {
        throw $ex;
    }

}

public function GetAll()
{
    
}
        
// si existe debe retornar el admin
// o nulo en caso de no existir

public function AdminExist($email){


    echo "entre a register admin existe<br>";

    try
    {

    $query = "SELECT * FROM ".$this->tableName. " WHERE email"."=".":email";

        var_dump($query);
    echo "hago la query<br>";

    // SELECT * FROM passwordStudent WHERE password = :password
         $parameters["email"] = $email;

        $this->connection = Connection::GetInstance();

        $this->connection->Execute($query,$parameters);
    
        return ($this->connection->Execute($query,$parameters));

    }
    catch(Exception $ex)
    {
        throw $ex;
    }


}













    }

    

   
?>