<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Persona;//aquíimportamoselmodelo
class PersonaController extends Controller
{
    public function inicio()
    {
        return view('index',["datos"=>Persona::Mensaje()]);
    }
}