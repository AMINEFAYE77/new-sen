@extends('layouts.adminLayouts.admin_content')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nouveau produit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Nouveau produit</li>
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
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Ajouter un utilisateur</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{route('users.store')}}" method="post" >
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nom </label>
                                        <input type="text"  name="name" value="{{old('name')}}" class="form-control" id="name"  placeholder="Nom ">
                                        @if($errors->any('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Email</label>
                                        <input type="email"  name="email" value="{{old('email')}}" class="form-control" id="email"  placeholder="Email">
                                        @if($errors->any('email'))
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Mot de passe</label>
                                        <input type="password" name="password" value="{{old('password')}}" class="form-control" id="password"  placeholder="Mot de passe">
                                        @if($errors->any('password'))
                                            <span class="text-danger">{{$errors->first('password')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Roles</label>
                                        <select class="form-control" id="role" name="role[]" multiple>
                                            <option value="">Selectionner un role</option>
                                            @if(count($roles))
                                                @foreach($roles as $role)
                                                    <option value="{{$role->id}}" {{(old('role') && old('role') == $role->id) ? 'selected':''}}>{{$role->libelle}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                        @if($errors->any('role'))
                                            <span class="text-danger">{{$errors->first('role')}}</span>
                                        @endif
                                    </div>

                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary ">Enregistre</button>
                                    <a class="btn btn-danger float-right" href="{{route('users.index')}}"> <i class="fas fa-arrow-left"></i>Retour</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
