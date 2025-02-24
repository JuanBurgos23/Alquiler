<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuarto, App\Models\Dimension;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;

class CuartoController extends Controller
{
    public function index()
    {
        $cuartos = Cuarto::with('dimension')->get();
        return view('cuartoview.cuarto', compact('cuartos'));
    }
    public function getImagenes($cuartoId)
    {
        $cuarto = Cuarto::with('imagenes')->findOrFail($cuartoId);
        return response()->json(['imagenes' => $cuarto->imagenes]);
    }

    public function store(Request $request)
    {
        $dimension = new Dimension();
        $dimension->largo = $request->largo;
        $dimension->ancho = $request->ancho;
        $dimension->save();

        // Obtener el ID de la dimension
        $idDimension = $dimension->id;
        $cuarto = new Cuarto();
        $cuarto->precio = $request->precio;
        $cuarto->estado = $request->estado;
        $cuarto->id_dimension = $idDimension;
        $cuarto->save();
        // Guardar las evidencias
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $file) {
                $imagen = new Imagen();

                $destinoPath = 'cuarto_imagenes/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($destinoPath, $filename);

                // Guarda la ruta en la base de datos solo si la subida fue exitosa
                if ($uploadSuccess) {
                    $imagen->nombre = $destinoPath . $filename;
                    $imagen->save();

                    // Asociar la imagen al cuarto
                    $cuarto->imagenes()->attach($imagen->id);
                }
            }
        }


        return redirect()->route('mostrar_cuarto')->with('success', 'Cuarto agregado exitosamente.');
    }

    public function edit($id)
    {
        // Carga el cuarto junto con sus relaciones de dimension e imagenes
        $cuarto = Cuarto::with(['dimension', 'imagenes'])->find($id);

        // Verifica si el cuarto fue encontrado
        if (!$cuarto) {
            return response()->json(['error' => 'Cuarto no encontrado'], 404);
        }

        // Devuelve el cuarto como respuesta JSON
        return response()->json($cuarto);
    }

    public function update(Request $request, $id)
    {
        $cuarto = Cuarto::find($id);

        if (!$cuarto) {
            return redirect()->back()->with('error', 'Cuarto no encontrado');
        }

        $cuarto->precio = $request->precio;
        $cuarto->estado = $request->estado;

        // Actualizar las dimensiones
        $dimension = $cuarto->dimension;
        $dimension->largo = $request->largo;
        $dimension->ancho = $request->ancho;
        $dimension->save();

        // Subir nuevas imágenes
        if ($request->hasFile('imagenes')) {
            foreach ($request->file('imagenes') as $file) {
                $imagen = new Imagen();

                $destinoPath = 'cuarto_imagenes/';
                $filename = time() . '-' . $file->getClientOriginalName();
                $uploadSuccess = $file->move($destinoPath, $filename);

                // Guarda la ruta en la base de datos solo si la subida fue exitosa
                if ($uploadSuccess) {
                    $imagen->nombre = $destinoPath . $filename;
                    $imagen->save();

                    // Asociar la imagen al cuarto
                    $cuarto->imagenes()->attach($imagen->id);
                }
            }
        }

        $cuarto->save();

        return redirect()->back()->with('success', 'Cuarto actualizado correctamente');
    }
}
