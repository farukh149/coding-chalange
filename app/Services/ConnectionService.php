<?php

namespace App\Services;

use App\Models\Connections;

class ConnectionService{

    public function createConnection(){
        Connections::create();
    }
}