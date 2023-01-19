@extends('reports.base')

@section('body')
    @php
        $status = ['Operativo', 'No Existe', 'Inoperativo', 'En Reparación', 'Por Verificar'];
    @endphp
    <tbody>
        @foreach ($departamentos as $departamento)
            <tr>
                <td colspan="7" align="center">
                    <b>{{ Str::upper($departamento->nombre_dep) }}</b>
                </td>
            </tr>
            <tr>
                <td>
                    <b>Categoria</b>
                </td>
                @foreach ($status as $sta)
                    <td align="center">
                        {{ $sta }}
                    </td>
                @endforeach
            </tr>
            @foreach ($categorias as $categoria)
                <tr>
                    <td align="" width="150px">{{ $categoria->nombre_cat }}</td>
                    @foreach ($status as $sta)
                        <td align="center" width="120px">
                            {{ ($bienes->where('codigo_dep', $departamento->codigo_dep)->where('codigo_cat',$categoria->codigo_cat)->where('satus_bien', $sta))->count() }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
            <tr>
                <td style="height: 20px"></td>
            </tr>
        @endforeach
    </tbody>
@endsection
