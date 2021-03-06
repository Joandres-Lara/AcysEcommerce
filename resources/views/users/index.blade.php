@extends('layouts.dashboard');

@section('title','Dashboard |' .config('app.name'))

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    @include('includes.flash-messages')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Listado de usuarios</h1>
    @can('products.create')
    <a href="{{ route('products.create')  }} " class=" btn btn-success bt-lg pull-right"><i
            class="far fa-plus-square">&nbsp;</i>Crear</a>
    @endcan
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary"></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Rut</th>
                            <th>Telefonó</th>
                            <th>Dirección</th>
                            <th>Email</th>
                            <th>Creado</th>
                            <th>Acciones</th>
                        </tr>
                        @foreach($users as $user)
                        <tr>
                            <th>{{ $user->id }}</th>
                            <th>{{ $user->name }} </th>
                            <th>{{ $user->lastname }}</th>
                            <th>{{ $user->rut }} </th>
                            <th>{{ $user->phone }} </th>
                            <th>{{ $user->address }} </th>
                            <th>{{ $user->email }} </th>
                            <th>{{ $user->created_at }} </th>
                            <th>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        @can('users.show')
                                        <a href="{{ route('users.show', $user->id) }}"
                                            class="dropdown-item btn btn-primary" type="button"><i
                                                class="far fa-eye"></i>
                                            Ver</a>
                                        @endcan
                                        @can('users.edit')
                                        <a href="{{ route('users.edit', $user->id) }}"
                                            class="dropdown-item btn btn-warning" type="button"><i
                                                class="far fa-edit"></i>
                                            Editar</a>
                                        @endcan
                                        @can('users.destroy')
                                        <form action=" {{ route('users.destroy', $user->id) }}" method="POST">
                                            @csrf @method('DELETE')
                                            <button class="dropdown-item btn btn-danger" type="submit"><i
                                                    class="fas fa-trash"></i>
                                                Borrar</button>
                                        </form>
                                        @endcan
                                    </div>
                            </th>
                        </tr>
                        @endforeach
                        </tbody>
                </table>
                <div class="align-content-md-center">
                    {{$users->links() }}
                </div>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection