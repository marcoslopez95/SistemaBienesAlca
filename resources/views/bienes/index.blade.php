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
            <h1 class="h3 mb-2 text-gray-800">Bienes Nacionales</h1>
        </div>
        <div class="col"></div>
        <div class="col text-right">
            <a href="{{ route('bienes-nacionales.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-list"></i>

                </span>
                <span class="text">Registrar</span>
            </a>
        </div>
    </div>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <a href="#collapseCardExample" class="btn btn-primary btn btn-sm d-none d-sm-inline-block shadow-sm" data-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="collapseCardExample">
                        Filtro
                    </a>
                </div>
                <div class="col text-center">
                    <a href="{{ route('bienes-nacionales.report',["type_report"=> 'estadistica']) }}" target="_blank"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Estadísticas</a>
                </div>
                <div class="col text-right">

                    <a href="{{ route('bienes-nacionales.report') }}" target="_blank"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Reporte</a>
                </div>
            </div>
            <div class="collapse" id="collapseCardExample" aria-expanded="false">
                <div class="card-body">
                    <form action="{{ route('bienes-nacionales.index') }}">
                        <div class="row">
                            <span class="font-weight-bold">Estatus:</span>
                            @foreach ($filtro['status'] as $item)
                                <span class="mx-1">
                                    <input type="checkbox" id="status-{{ $item }}" name="status[]"
                                        value="{{ $item }}" />
                                    <label for="status-{{ $item }}">{{ $item }}</label>
                                </span>
                            @endforeach
                        </div>
                        <div class="row">
                            <span class="font-weight-bold">Departamentos:</span>
                            @foreach ($filtro['departamentos'] as $item)
                                <span class="mx-1">
                                    <input type="checkbox" id="dep-{{ $item->codigo_dep }}" name="codigo_dep[]"
                                        value="{{ $item->codigo_dep }}" />
                                    <label for="dep-{{ $item->codigo_dep }}">{{ $item->nombre_dep }}</label>
                                </span>
                            @endforeach
                        </div>
                        <div class="row">
                            <span class="font-weight-bold">Categorias:</span>
                            @foreach ($filtro['categorias'] as $item)
                                <span class="mx-1">
                                    <input type="checkbox" id="cat-{{ $item->codigo_cat }}" name="codigo_cat[]"
                                        value="{{ $item->codigo_cat }}" />
                                    <label for="cat-{{ $item->codigo_cat }}">{{ $item->nombre_cat }}</label>
                                </span>
                            @endforeach
                        </div>
                        <div class="row">
                            <span class="font-weight-bold">Subcategorias:</span>
                            @foreach ($filtro['subcategorias'] as $item)
                                <span class="mx-1">
                                    <input type="checkbox" id="sub-{{ $item->codigo_subcat }}" name="codigo_subcat[]"
                                        value="{{ $item->codigo_subcat }}" />
                                    <label for="sub-{{ $item->codigo_subcat }}">{{ $item->nombre_subcat }}</label>
                                </span>
                            @endforeach
                        </div>
                        <div class="row">
                            <button class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                    class="fas fa-search"></i>Filtrar Ahora</button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> --}}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Acta</th>
                            <th>Fecha Llegada</th>
                            <th>Departamento</th>
                            <th>Categoria</th>
                            <th>Subcategoria</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Foto</th>
                            <th>Acta</th>
                            <th>Fecha Llegada</th>
                            <th>Departamento</th>
                            <th>Categoria</th>
                            <th>Subcategoria</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($bienes as $bien)
                            <tr>
                                <td>{{ $bien->codigo_bien }}</td>
                                <td>{{ $bien->nombre_bien }}</td>
                                <td>
                                    <a target="_blank" href="{{ $bien->foto_bien }}"
                                        class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </td>
                                <td>
                                    <a target="_blank" href="{{ $bien->acta_bien }}"
                                        class="btn btn-primary btn-circle btn-sm">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                </td>
                                <td>{{ $bien->fecha_bien }}</td>
                                <td>{{ $bien->departamento->nombre_dep }}</td>
                                <td>{{ $bien->subcategoria->categoria->nombre_cat }}</td>
                                <td>{{ $bien->subcategoria->nombre_subcat }}</td>
                                <td>{{ $bien->satus_bien }}</td>
                                {{-- <td>{{$categoria->descri_cat}}</td> --}}
                                <td>
                                    <div class="row mx-auto">
                                        <div class="mx-2">
                                            <a href="{{ route('bienes-nacionales.show', ['bienes_nacionale' => $bien->id_bien]) }}"
                                                class="btn btn-sm btn-info btn-circle" title="editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </div>
                                        <form
                                            action="{{ route('bienes-nacionales.destroy', ['bienes_nacionale' => $bien->id_bien]) }}"
                                            method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger btn-circle"
                                                title="eliminar">
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
