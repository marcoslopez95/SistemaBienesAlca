<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienNacionalRequest;
use App\Http\Requests\BienNacionalUpdateRequest;
use App\Models\Bienes;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Session;
use Mpdf\Mpdf;

class BienNacionalyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['filtro'] = [
            'status' => [
                'Operativo',
                'No Existe',
                'Inoperativo',
                'En Reparación',
                'Por Verificar',
            ],
            'departamentos' => Departamento::all(),
            'categorias' => Categoria::all(),
            'subcategorias' => SubCategoria::all(),
        ];
        Session::put('filter',json_encode($request->all()));
        $data['bienes'] = Bienes::with('departamento','subcategoria.categoria')
                            ->filter($request)->get();


        return view('bienes.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['status'] = [
            'Operativo',
            'No Existe',
            'Inoperativo',
            'En Reparación',
            'Por Verificar',
        ];
        $data['categorias'] = Categoria::all();
        $data['subcategorias'] = (SubCategoria::all());
        $data['departamentos'] = Departamento::all();
        return view('bienes.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BienNacionalRequest $request)
    {
        $request->merge([
            'acta_bien' => $request->file('file1')->store('/public/bienes'),
            'foto_bien' => $request->file('file2')->store('/public/actas'),
            'codigo_usu'   => Auth::user()->codigo_usu,
        ]);

        Bienes::create($request->all()); // $request->all() -> DEVOLVER UN ARRAY;

        return redirect(route('bienes-nacionales.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bienes $bienes_nacionale)
    {
        $data['status'] = [
            'Operativo',
            'No Existe',
            'Inoperativo',
            'En Reparación',
            'Por Verificar',
        ];
        $data['categorias'] = Categoria::all();
        $data['subcategorias'] = (SubCategoria::all());
        $data['departamentos'] = Departamento::all();
        $data['bien'] = $bienes_nacionale;
        return view('bienes.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BienNacionalUpdateRequest $request, Bienes $bienes_nacionale)
    {
        if($request->file1){
            $request['acta_bien'] = $request->file('file1')->store('/public/bienes');
        }
        if($request->file2){
            $request['foto_bien'] = $request->file('file2')->store('/public/actas');
        }
        $request->merge([
            'codigo_usu'   =>Auth::user()->codigo_usu,
        ]);

        $bienes_nacionale->update($request->all());

        return redirect(route('bienes-nacionales.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bienes $bienes_nacionale)
    {
        $bienes_nacionale->delete();

        return redirect(route('bienes-nacionales.index'));
    }

    public function report(Request $request) {
        $info = json_decode(Session::get('filter'));
        foreach($info as $key => $value) {
            $request[$key] = $value;
        }
        $data['bienes'] = Bienes::with('departamento','subcategoria.categoria')
                            ->filter($request)->get();

        $html = view('reports.bienes-report',$data);
        $nombre_archivo = 'reporte-bienes-nacionales-'.date('Y-m-d_H:i');
        $pdf = new Mpdf();
        $pdf->WriteHTML($html);
        header('Content-Type: application/pdf');
        header("Content-Disposition: inline; filename='$nombre_archivo.pdf'");
        return $pdf->Output("$nombre_archivo.pdf", 'I');
    }
}

