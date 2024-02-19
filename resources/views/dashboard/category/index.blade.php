@extends('dashboard.layout')

@section('content')

<a class="my-3 btn btn-success " href="{{route("category.create") }}">Crear</a>

    <table class="table mb-3">
        <tr>
            <thead>
            <th>
                Titulo
            </th>
            <th>
                Acciones
            </th>
        </thead>
    </tr>

        <tbody>

            @foreach ($categories as $c )
            <tr>
                <td>
                {{ $c->title}}
            </td>
            <td>
                <a class="mt-2 btn btn-primary " href="{{route("category.edit", $c) }}">Editar</a>
                <a class="mt-2 btn btn-primary " href="{{route("category.show", $c)}}">Ver</a>

                <form action="{{route("category.destroy", $c) }}" method="post">
                 @method("DELETE")
                 @csrf
                <button class="mt-2 btn btn-danger " type="submit">Eliminar</button>
            </form>
            </td>
        </tr>
            @endforeach

        </tbody>

    </table>

    {{ $categories->links()}}
@endsection
