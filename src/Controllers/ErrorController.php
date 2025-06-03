<?php

namespace App\Controllers;

class ErrorController
{
    public function notFound()
    {
        http_response_code(404);
        require __DIR__ . "/../Views/404.php";
    }
}
