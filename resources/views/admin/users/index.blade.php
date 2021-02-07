@extends('layouts.adminLayouts.admin_content')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des users</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Liste des users</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <script>
            @if(session('success'))

            swal({
                title: "{{session('success')}}",
                text: "{{session('status')}}",
                icon: "success",
                button: "OK",
            });
            @endif
        </script>

        <script>
            @if(session('error'))

            swal({
                title: "{{session('error')}}",
                text: "{{session('status')}}",
                icon: "error",
                button: "OK",
            });
            @endif

        </script>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <a class="btn btn-primary mb-2 " href="{{route('users.create')}}"><i class="fas fa-plus"></i> Ajouter un users</a>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste des Utilisateurs</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->id}}</td>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{implode(',',$user->roles()->get()->pluck('libelle')->toArray())}}</td>
                                            <td>
                                                <form id="product_delete" action="" method="POST">

                                                   {{-- <a href="{{ route('users.show', $user->id) }}" title="show">
                                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                                    </a>--}}

                                                    <a href="{{ route('users.edit', $user->id) }}">
                                                        <i class="fas fa-edit  fa-lg"></i>

                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:delete_product('{{ route('users.destroy', $user->id) }}')">
                                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                                    </a>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach







                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Numero</th>
                                        <th>Nom</th>
                                        <th>Email</th>
                                        <th>Roles</th>
                                        <th>Action</th>


                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
