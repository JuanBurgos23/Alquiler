<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ImagenController extends Controller
{
    public function destroy($id)
    {
        $imagen = Imagen::find($id);

        if (!$imagen) {
            return response()->json(['success' => false, 'message' => 'Imagen no encontrada'], 404);
        }

        // Eliminar las referencias en la tabla 'imagen_cuarto'
        DB::table('imagen_cuarto')->where('id_imagen', $id)->delete();

        // Eliminar la imagen del almacenamiento
        Storage::delete($imagen->nombre);

        // Eliminar el registro de la base de datos
        $imagen->delete();

        return response()->json(['success' => true, 'message' => 'Imagen eliminada correctamente']);
    }
}
