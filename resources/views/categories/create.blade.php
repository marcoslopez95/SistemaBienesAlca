@extends('template.app')

@section('content')
<div class="card shadow mb-4 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Crear Categoria</h6>
    </div>
    <div class="card-body">
        <form class="user" action="{{route('categoria.store')}}" method="post">
            @csrf
            <div class="form-group row">
                {{-- <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="codigo_cat" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Código">
                </div> --}}
                <div class="col-sm-6">
                    <input type="text" name="nombre_cat" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Nombre">
                </div>
            </div>
            <div class="form-group">
                <input type="text" name="descri_cat" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="descripcion">
            </div>

            <div class="row">

                <a href="{{route('categoria.index')}}" class="btn btn-danger btn-user ">
                    Atrás
                </a>
                <div class="col"></div>
                <button type="submit" class="btn btn-primary btn-user ">
                    <i class="fas fa-list"></i> Crear Categoria
                </button>
            </div>
        </form>
    </div>
</div>
@endsection