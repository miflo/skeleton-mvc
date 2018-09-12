<?php

namespace App\Controller;

    class AppController extends Controller {
        
        public function show()
        {
            $pdo = $this->getPdo();
            

            return $this->render("app/index.html.php", [
                "message" => "Hello world !!",
                "suite" => "Encore un nouveau message"
            ]);
        }
    }