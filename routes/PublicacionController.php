<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Publicacion;
use App\Habitante;
/** permite el redicreccionamiento*/use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\PublicacionesCreateRequest;

class PublicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
 
    {
        if($request)
            {
            $query=trim($request->get('searchText'));

            $publicacion=Publicacion::where('titulo','LIKE','%'.$query.'%')
            ->orwhere('titulo','LIKE','%'.$query.'%')
            ->orwhere('cuerpo','LIKE','%'.$query.'%')
            ->orderBy('id','DESC')->paginate(3);
            //return view('propietario.index', compact('propietarios'));
            return view('publicacion.index',["publicacion"=>$publicacion,"searchText"=>$query]);
                }
            }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publicacion = Habitante::orderBy('id','DESC')
        ->select('habitantes.correo', 'habitantes.id')
    /**linea para que no traiga vehiculo que se este en salida 
        ->whereNotIn('vehiculos.id', function ($query) {
            $query->select('salida.vehiculos_id')
                ->from('salida_vehiculos');
        })*/
        ->get();
        
    return view('publicacion.create')->with('publicacion', $publicacion);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublicacionesCreateRequest $request)
    {
        $publicacion = new Publicacion;
        $publicacion->titulo = $request->get('titulo');
        $publicacion->cuerpo = $request->get('cuerpo');
        $publicacion->habitantes_id = $request->get('habitantes_id');
        $publicacion->save();
        return Redirect::to('publicacion');
 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $publicacion = Publicacion::findOrFail($id);
        $habitantes = Habitante::all();
        return view("publicacion.edit", ["publicacion" => $publicacion,"habitantes" => $habitantes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $publicacion=Publicacion::findOrFail($id);
            $publicacion->titulo = $request->get('titulo');
            $publicacion->cuerpo = $request->get('cuerpo');
            $publicacion->habitantes_id = $request->get('habitantes_id');
            $habitantes->update();
            return Redirect::to('publicacion');
            }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $publicacion=Publicacion::findOrFail($id);
        $publicacion->delete();
         return Redirect::to('publicacion');
    }
}