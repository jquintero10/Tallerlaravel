<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public static function Mensaje()
    {
        return "Mensaje de mi proyecto Laravel 7 desde el modelo";
    }
}
