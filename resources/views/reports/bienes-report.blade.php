@extends('reports.base')

@section('body')
    <tbody>
        <tr>
            <th align="center" width="150px">Codigo</th>
            <th align="center" width="150px">Nombre</th>
            <th align="center" width="150px">Fecha Llegada</th>
            <th align="center" width="150px">Departamento</th>
            <th align="center" width="150px">Categoria</th>
            <th align="center" width="150px">Subcategoria</th>
            <th align="center" width="150px">Status</th>
        </tr>
        @foreach ($bienes as $bien)
            <tr>
                <td align="center">{{ $bien->codigo_bien }}</td>
                <td align="center">{{ $bien->nombre_bien }}</td>
                <td align="center">{{ $bien->fecha_bien }}</td>
                <td align="center">{{ $bien->departamento->nombre_dep }}</td>
                <td align="center">{{ $bien->subcategoria->nombre_subcat }}</td>
                <td align="center">{{ $bien->subcategoria->categoria->nombre_cat }}</td>
                <td align="center">{{ $bien->satus_bien }}</td>
            </tr>
        @endforeach
    </tbody>
@endsection
