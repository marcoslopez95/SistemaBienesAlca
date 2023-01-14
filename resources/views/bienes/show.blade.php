@extends('template.app')
@section('style')
    <style>
        .form-select:focus {
            color: #6e707e;
            background-color: #fff;
            border-color: #bac8f3;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgb(78 115 223 / 25%);
        }

        .form-select {
            width: 100%;
            border: 1px solid #d1d3e2;
            padding: 0.9rem;
        }

        #file1,
        #file2 {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div class="card shadow mb-4 mx-5">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Registro de Bien Nacional</h6>
        </div>
        <div class="card-body">

            <form enctype="multipart/form-data" class="user" action="{{ route('bienes-nacionales.update',['bienes_nacionale'=>$bien->id_bien]) }}" method="post">
                @csrf
                @method('post')
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="text" name="codigo_bien" class="form-control form-control-user" id="exampleFirstName"
                            placeholder="Código" value="{{$bien->codigo_bien}}">
                    </div>
                    <div class="col-sm-6">
                        <input type="text" name="nombre_bien" class="form-control form-control-user" id="exampleLastName"
                            placeholder="Nombre" value="{{$bien->nombre_bien}}">
                    </div>
                    <div class="col-sm-6">
                        <label>Fecha de Recepción</label>
                        <input type="date" name="fecha_bien" class="form-control form-control-user" id="exampleLastName"
                            placeholder="Nombre" value="{{\Carbon\Carbon::parse($bien->fecha_bien)->format('Y-m-d')}}">
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="codigo_cat">Status:</label>
                        <select name="satus_bien" class="form-control-user form-select" style="padding: 0.9rem;">
                            <option value="">Seleccione...</option>
                            @foreach ($status as $sta)
                                <option value="{{ $sta }}"
                                @if ($bien->satus_bien == $sta)
                                    selected
                                @endif
                                >
                                    {{ $sta }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="codigo_cat">Departamento:</label>
                        <select name="codigo_dep" class="form-control-user form-select" style="padding: 0.9rem;">
                            <option value="">Seleccione...</option>
                            @foreach ($departamentos as $departamento)
                                <option value="{{ $departamento->codigo_dep }}"
                                    @if ($bien->codigo_dep == $departamento->codigo_dep)
                                        selected
                                    @endif
                                    >
                                    {{ $departamento->nombre_dep }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="codigo_cat">Categoria:</label>
                        <select name="codigo_cat" id="codigo_cat" class="form-control-user form-select"
                            style="padding: 0.9rem;">
                            <option value="">Seleccione</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->codigo_cat }}"
                                    @if ($bien->codigo_cat == $categoria->codigo_cat)
                                        selected
                                    @endif
                                    >
                                    {{ $categoria->nombre_cat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <label for="codigo_subcat">Subcategoria:</label>
                        <select name="codigo_subcat" id="codigo_subcat" class="form-control-user form-select"
                            style="padding: 0.9rem;">
                            @foreach ($subcategorias as $sub)
                                <option value="{{ $sub->codigo_subcat }}"
                                    @if ($bien->codigo_subcat == $sub->codigo_subcat)
                                        selected
                                    @endif
                                    >
                                    {{ $sub->nombre_subcat }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{-- Images --}}
                <hr>
                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Foto del Bien Nacional
                        <label for="file2">
                            <img id="img2" src="/{{$bien->foto_bien}}" width="200px" height="200px">
                        </label>
                        <input type="file" id="file2" name="file2" />
                    </div>
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        Foto del acta de recepción
                        <label for="file1">
                            <img id="img" src="/{{$bien->acta_bien}}" width="200px" height="200px">
                        </label>
                        <input type="file" id="file1" name="file1" />
                    </div>
                </div>
                <hr>

                <div class="row">

                    <a href="{{ route('bienes-nacionales.index') }}" class="btn btn-danger btn-user ">
                        Atrás
                    </a>
                    <div class="col"></div>
                    <button type="submit" class="btn btn-primary btn-user ">
                        <i class="fas fa-list"></i> Registrar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        let subcategorias = JSON.parse(("{{ $subcategorias }}").replaceAll("&quot;", "\""))

        let cat = document.querySelector('#codigo_cat').addEventListener('change', function() {
            let val = document.querySelector('#codigo_cat')
            let subcat = subcategorias.filter(item => item.codigo_cat == val.value)
            // console.log(subcat)
            let selectSubcat = document.querySelector('#codigo_subcat')

            for (let item of selectSubcat.children) {
                selectSubcat.removeChild(item)
            }
            let options = ''

            subcat.map(item => {
                let option = document.createElement('option')
                option.value = item.codigo_subcat
                option.text = item.nombre_subcat

                selectSubcat.appendChild(option)
            })

            selectSubcat.addChild
        })

        const fileInput  = document.getElementById("file1");
        const fileInput2 = document.getElementById("file2");

        fileInput.addEventListener('change', e => {
            var src     = URL.createObjectURL(e.target.files[0]);
            var preview = document.getElementById("img");
            preview.src = src;
        });

        fileInput2.addEventListener('change', e => {
            var src     = URL.createObjectURL(e.target.files[0]);
            var preview = document.getElementById("img2");
            preview.src = src;
        });
    </script>
@endsection
