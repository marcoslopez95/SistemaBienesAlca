@extends('template.app')

@section('content')
<div class="card shadow mb-4 mx-5">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Crear Departamento</h6>
    </div>
    <div class="card-body">
        <form class="user" action="{{route('departamento.store')}}" method="post">
            @csrf
            <div class="form-group row">
                {{-- <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" name="codigo_cat" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="Código">
                </div> --}}
                <div class="col-sm-6">
                    <input type="text" name="nombre_dep" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Nombre de la oficina o departamento">
                </div>
            </div>
            <hr />
            <div class="row text-center mb-3">
                <h6 class="m-0 font-weight-bold text-primary mx-auto">Datos del Director</h6>
            </div>
            <div class="form-group row gap-3">
                <div class="col-sm-6">
                    <input type="text" name="director[nombre_dire]" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Nombres">
                </div>
                <div class="col-sm-6">
                    <input type="text" name="director[apelli_dire]" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Apellidos">
                </div>
            </div>
            <div class="form-group row gap-3">
                <div class="col-sm-6">
                    <input type="text" name="director[cedula_dire]" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Cedula de identidad">
                </div>
            </div>

            <div class="row">

                <a href="{{route('departamento.index')}}" class="btn btn-danger btn-user ">
                    Atrás
                </a>
                <div class="col"></div>
                <button type="submit" class="btn btn-primary btn-user ">
                    <i class="fas fa-list"></i> Crear Departamento
                </button>
            </div>

        </form>
    </div>
</div>
@endsection
