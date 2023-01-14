@extends('template.app')
@section('style')
    <style>
        .form-select:focus{
            color:#6e707e;
            background-color:#fff;
            border-color:#bac8f3;
            outline:0;
            box-shadow:0 0 0 0.2rem rgb(78 115 223 / 25%);
        }

        .form-select{
            width:100%;
            border:1px solid #d1d3e2;
            padding: 0.9rem;
        }
    </style>
@endsection
@section('content')
<div class="card shadow mb-4 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Crear Sub-Categoria</h6>
    </div>
    <div class="card-body">
        <form class="user" action="{{route('subcategoria.store')}}" method="post">
            @csrf
            <div class="form-group row">
                <div class="col-sm-6">
                    <input type="text" name="nombre_subcat" class="form-control form-control-user" id="exampleLastName"
                    placeholder="Nombre">
                </div>
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <select name="codigo_cat" class="form-control-user form-select" style="
            padding: 0.9rem;
                    ">
                        <option value="">Seleccione</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{$categoria->codigo_cat}}">
                                {{$categoria->nombre_cat}}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="descri_subcat" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="descripcion">
            </div>

            <div class="row">

                <a href="{{route('subcategoria.index')}}" class="btn btn-danger btn-user ">
                    Atrás
                </a>
                <div class="col"></div>
                <button type="submit" class="btn btn-primary btn-user ">
                    <i class="fas fa-list"></i> Crear SubCategoria
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
