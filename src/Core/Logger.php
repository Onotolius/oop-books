<?php

namespace App\Core;

trait Logger
{
    public function log(string $msg): string
    {
        $currentTime = date("Y-m-d H:i:s");
        return "[{$currentTime}]: " . "$msg";
    }
}
