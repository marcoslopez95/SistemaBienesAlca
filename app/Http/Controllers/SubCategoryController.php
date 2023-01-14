<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubCategoriaRequest;
use App\Models\Categoria;
use App\Models\SubCategoria;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['items'] = SubCategoria::with('categoria')->get();
        return view('subcategoria.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categorias'] = Categoria::all();
        return view('subcategoria.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubCategoriaRequest $request)
    {
        $SubCategoria = SubCategoria::create($request->all());

        return redirect(route('subcategoria.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategoria $subcategorium)
    {
        $data['subcategoria'] = $subcategorium;
        $data['categorias'] = Categoria::all();

        return view('subcategoria.show', $data);
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
    public function update(SubCategoriaRequest $request, SubCategoria $subcategorium)
    {
        $subcategorium->update($request->all());

        return redirect(route('subcategoria.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategoria $subcategorium)
    {
        $subcategorium->delete();

        return redirect(route('subcategoria.index'));
    }
}
