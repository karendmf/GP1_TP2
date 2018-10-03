<?php
namespace App\Http\Controllers;
use App\Informe;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
     
     $informes = Informe::all();
     return response()->json($informes);
    }
     public function create(Request $request)
     {
        $informe = new Informe;
        $informe->titulo= $request->titulo;
        $informe->fechalimite = $request->fechalimite;
        $informe->descripcion= $request->descripcion;
       
       $informe->save();
       return response()->json($informe, 201);
     }
     public function show($id)
     {
        $informe = Informe::find($id);
        return response()->json($informe);
     }
     public function update(Request $request, $id)
     { 
        $informe= Informe::find($id);
        
        $informe->titulo = $request->input('titulo');
        $informe->fechalimite = $request->input('fechalimite');
        $informe->descripcion = $request->input('descripcion');
        $informe->save();
        return response()->json($informe, 200);
     }
     public function destroy($id)
     {
        $informe = Informe::find($id);
        $informe->delete();
         return response()->json('Informe eliminado', 200);
     }
    }