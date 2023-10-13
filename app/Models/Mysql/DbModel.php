<?php

namespace App\Models\Mysql;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DbModel extends Model
{
    public $pdo;

    function __construct()
    {
        $this->pdo = DB::connection('mysql')->getPdo();
    }
}
