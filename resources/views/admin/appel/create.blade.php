@extends('layouts.adminLayouts.admin_content')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nouveau Appel</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Nouveau Appel</li>
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
                                <h3 class="card-title">Ajouter Appel</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{route('appels.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nom </label>
                                        <input type="text"  name="nom" value="{{old('nom')}}" class="form-control" id="nom"  placeholder="Nom ">
                                        @if($errors->any('nom'))
                                            <span class="text-danger">{{$errors->first('nom')}}</span>
                                            @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="">Prenom </label>
                                        <input type="text"  name="prenom" value="{{old('prenom')}}" class="form-control" id="prenom"  placeholder="Prenom ">
                                        @if($errors->any('prenom'))
                                            <span class="text-danger">{{$errors->first('prenom')}}</span>
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label for="">Numero de telephone </label>
                                        <input type="number"  name="numero" value="{{old('numero')}}" class="form-control" id="numero"  placeholder="Numero de telephone ">
                                        @if($errors->any('numero'))
                                            <span class="text-danger">{{$errors->first('numero')}}</span>
                                        @endif

                                    </div>



                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Enregistre</button>
                                    <a class="btn btn-danger float-right" href="{{route('products.index')}}"> <i class="fas fa-arrow-left"></i>Retour</a>
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
