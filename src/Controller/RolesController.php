<?php

namespace App\Controller;

use App\Model\Role;

class RolesController extends Controller {

    public function roles()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT * FROM app_roles';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $roles = $sth->fetchAll(\PDO::FETCH_CLASS, Role::class);

        return $this->render("roles/index.html.php", [
            'roles' => $roles,
            'token' => $this->getToken(),
        ]);       
    }


    public function delete($id)
    {
        if (!$this->isCsrfTokenValid()){
            throw new \UnexpectedValueException("Invalide token");
        }
        $sql = "DELETE FROM app_roles WHERE app_roles . id=:id";
        $sth = $this->getPdo()->prepare($sql);
        $sth->bindValue(":id", (int) $id, \PDO::PARAM_INT);
        $sth->execute();       
        $response = $this->getResponse();
        $response->setHeader([
            "Location" => "./../../roles"
        ]);
        return $response;
    }

    public function create()
    {
        if (!$this->isCsrfTokenValid()){
            throw new \UnexpectedValueException("Invalide token");
        }

        $name = $this->get("name", Role::NAME);
        $value = $this->get("value", Role::VALUE);
        if ($name && $value) {
            $sql = "INSERT INTO app_roles(name, value) VALUE (:name, :value)";
            $sth = $this->getPdo()->prepare($sql);
            $sth->bindValue(":name", $name, \PDO::PARAM_STR);
            $sth->bindValue(":value", $value, \PDO::PARAM_STR);
            $sth->execute();   
            $response = $this->getResponse();
            $response->setHeader([
                "Location" => "./../roles"
            ]);
            return $response;        
        }

            // ci-dessus raccoucie de ci-dessous point N°1:
        // $name = filter_input(INPUT_POST, "name", FILTER_VALIDATE_REGEXP, [
        //     "options"=> [
        //         "regexp"=> Role::NAME
        //         ]
        // ]);
        // $value = filter_input(INPUT_POST, "value", FILTER_VALIDATE_REGEXP, [
        //     "options"=> [
        //         "regexp"=> Role::VALUE
        //         ]
        // ]);

            var_dump($name);
            var_dump($value);
        exit;

        // if (!$this->isCsrfTokenValid()){
        //     throw new \UnexpectedValuueException("Invalide token");
        // }
        // $sql = "CREATE  FROM app_roles WHERE app_roles . id=:id";
        // $sth = $this->getPdo()->prepare($sql);
        // $sth->bindValue(":id", (int) $id, \PDO::PARAM_INT);
        // $sth->execute();       
        // $response = $this->getResponse();
        // $response->setHeader([
        //     "Location" => "./../../roles"
        // ]);
        // return $response;
    }
}