@extends('layouts.adminLayouts.admin_content')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Modification produit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Modification produit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
    @endif
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <a class="btn btn-danger " href="{{route('products.index')}}"> <i class="fas fa-arrow-left"></i> Retour</a>
                <br>
                <br>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Modifier Utilsateur</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{route('users.update', $user)}}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    {{--<div class="form-group">
                                        <label for="exampleInputEmail1">Nom Utilisateur</label>
                                        <input type="text"  name="name" value="{{old('name') ? old('name') : $user->name }}" class="form-control" id="name"  placeholder="Nom Utilisateur">
                                        @if($errors->any('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Adresse email</label>
                                        <input type="email"  name="lieu" value="{{old('email') ? old('email') : $user->email }}" class="form-control" id="exampleInputEmail1"  placeholder="Email">
                                        @if($errors->any('email'))
                                            <span class="text-danger">{{$errors->first('email')}}</span>
                                        @endif

                                    </div>--}}

                                   {{-- <div class="form-group">
                                        <label for="exampleInputPassword1">superficie</label>
                                        <input type="number" name="superficie" value="{{old('superficie') ? old('superficie') : $product->superficie }}" class="form-control" id="superficie"  placeholder="Superficie">
                                        @if($errors->any('superficie'))
                                            <span class="text-danger">{{$errors->first('superficie')}}</span>
                                        @endif
                                    </div>

--}}                              @foreach($roles as $role)
                                        <div class="row">
                                            <div class="form-group clearfix">
                                                <div class="icheck-primary d-inline">
                                                    <input type="checkbox" id="{{$role->id}}" name="roles[]" value="{{$role->id}}" @foreach($user->roles as $usersRoles) @if($usersRoles->id === $role->id) checked @endif @endforeach>
                                                    <label for="{{$role->id}}" class="form-check-label">
                                                        {{$role->libelle}}
                                                    </label>
                                                    </div>

                                                    </div>
                                                    </div>
                                                    @endforeach

                                                    </div>
<!-- /.card-body -->
<div class="card-footer">
<button type="submit" class="btn btn-primary">Enregistre</button>
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
