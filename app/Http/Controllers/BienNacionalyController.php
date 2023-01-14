<?php

namespace App\Http\Controllers;

use App\Http\Requests\BienNacionalRequest;
use App\Models\Bienes;
use App\Models\Categoria;
use App\Models\Departamento;
use App\Models\SubCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BienNacionalyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bienes'] = Bienes::with('departamento','subcategoria.categoria')->get();
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
            'foto_bien' => $request->file('file1')->store('/public/bienes'),
            'acta_bien' => $request->file('file2')->store('/public/actas'),
            'codigo_usu'   =>Auth::user()->codigo_usu,
        ]);

        Bienes::create($request->all());

        return redirect(route('bienes-nacionales.index'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
