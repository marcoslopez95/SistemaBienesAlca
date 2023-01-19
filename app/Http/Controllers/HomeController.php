<?php

namespace App\Http\Controllers;

use App\Models\Bienes;
use App\Models\Departamento;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(Request $request)
    {
        $departamentos = Departamento::withCount('bienes')->get('nombre_dep');
        $data['departamentos'] = $departamentos->pluck('nombre_dep');
        $data['conteo'] = $departamentos->pluck('bienes_count');
        $data['bienes'] = Bienes::all()->countBy('satus_bien')->toArray();
        $data['status'] = collect([
            'Operativo',
            'No Existe',
            'Inoperativo',
            'En Reparación',
            'Por Verificar',
        ]);
        $data['bienes_n'] = collect([]);
        foreach($data['status'] as $item){
            $num = 0;
            if(array_key_exists($item,$data['bienes'])){
                $num = $data['bienes'][$item];
            }
            $data['bienes_n'][] = $num;
        }
        // return $data;
        return view('dashboard',$data);
    }
}
