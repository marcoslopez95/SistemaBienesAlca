@extends('template.app')

@section('style')
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
@endsection
@section('content')
    <!-- Page Heading -->
    <div class="row">
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Departamentos</h1>
        </div>
        <div class="col"></div>
        <div class="col text-right">
            <a href="{{route('departamento.create')}}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-list"></i>

                </span>
                <span class="text">Crear Departamento</span>
            </a>
        </div>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Director</th>
                            {{-- <th>Descripcion</th> --}}
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Director</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($items as $departamento)
                            <tr>
                                <td>{{$departamento->codigo_dep}}</td>
                                <td>{{$departamento->nombre_dep}}</td>
                                <td>
                                    @if ($departamento->director)
                                    {{$departamento->director->full_name}}
                                    @endif
                                </td>
                                <td>
                                    <div class="row mx-auto">
                                        <div class="mx-2">
                                            <a href="{{route('departamento.show',['departamento'=>$departamento->codigo_dep])}}" class="btn btn-sm btn-info btn-circle" title="editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <form action="{{route('departamento.destroy',['departamento'=>$departamento->codigo_dep])}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-circle" title="eliminar">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
