<?php

namespace App\Controller;

use App\Http\ResponseInterface;
use App\Database\PDOHandler;

    class Controller implements ControllerInterface
    {
        private $response;

        public function __construct(ResponseInterface $response)
        {
            $this->response = $response;
        }

        public function render(string $path, array $data = []): ResponseInterface
        {
            $filename = __DIR__ . "/../../template/" . $path;
            if (!is_file($filename)){
                throw new RunTimeException('Template not found :' . $filename);
            }

            extract($data);
            ob_start();
            include $filename;
            $body = ob_get_clean();
            $this->response->setBody($body);
            return $this->response;
        }


        protected function getPdo(): \PDO
        {
            return PDOHandler::getPDO();
        }
    }