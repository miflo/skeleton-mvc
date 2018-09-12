<?php

namespace App\Controller;

use App\Model\Role;

class RolesController extends Controller {

    public function roles()
    {
        $pdo = $this->getPdo();
        $sql = 'SELECT value FROM app_roles';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $roles = $sth->fetchAll(\PDO::FETCH_CLASS, Role::class);

        return $this->render("roles/index.html.php", [
            'roles' => $roles,
        ]);       
    }


    public function delete($id)
    {
        //TODO delete a role for the ID
        die("hello");
    }
}