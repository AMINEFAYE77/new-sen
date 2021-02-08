@extends('layouts.adminLayouts.admin_content')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Recherche Avancée</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Recherche Avancée</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">

                <div class="row">

                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-sm-12">

                        <!-- general form elements disabled -->
                        <div class="card card-red">
                            <div class="card-header">
                                <h3 class="card-title">Filtre </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <form>

                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" class="form-control"  id="nom" placeholder="Nom">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Prenom</label>
                                                <input type="text" class="form-control" id="prenom" placeholder="Prenom">
                                            </div>
                                        </div>
                                    <div class="col-sm-3">
                                        <!-- select -->
                                        <div class="form-group">
                                            <label>Numero telephone</label>
                                            <input type="text" class="form-control" id="numero" placeholder="Numero de telephone">
                                        </div>
                                    </div>



                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <!-- select -->
                                            <div class="form-group">
                                                <button class="btn bg-blue" onclick="search_appel()" type="button" >recherche</button>

                                            </div>
                                        </div>
                                    @if(Request::query('nom') || Request::query('prenom') || Request::query('numero') )
                                        <!-- select -->
                                            <div class="form-group">
                                                <a class="btn bg-red " href="{{route('search_appel')}}" type="button">Reinitialiser</a>
                                            </div>
                                        @endif
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-body -->
                        </div>

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recherche Appels</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Numero de Telephone</th>
                                        <th>Date de creation</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($appels))
                                        @foreach($appels as $appel)
                                            <tr>
                                                <td>{{$appel->nom}}</td>
                                                <td>{{$appel->prenom}}</td>
                                                <td>{{$appel->numero}}</td>
                                                <td>{{$appel->created_at}}</td>
                                                <td>
                                                    <form  id="appel_delete" action="" method="POST">

                                                        <a href="{{ route('appels.show', $appel->id) }}" title="show">
                                                            <i class="fas fa-eye text-success  fa-lg"></i>
                                                        </a>

                                                        <a href="{{ route('appels.edit', $appel->id) }}">
                                                            <i class="fas fa-edit  fa-lg"></i>

                                                        </a>

                                                        @csrf
                                                        @method('DELETE')

                                                        <a href="javascript:delete_product('{{ route('appels.destroy', $appel->id) }}')">
                                                            <i class="fas fa-trash fa-lg text-danger"></i>
                                                        </a>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="6">pas d'appel disponible</td>
                                        </tr>
                                    @endif




                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>Numero de Telephone</th>
                                        <th>Date de creation</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <div class="card">
                            <div class="card-header">
                                <a class="btn btn-danger " href="{{route('appels.index')}}"> <i class="fas fa-arrow-left"></i>Retour</a>

                            </div>
                        </div>
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
<script>
    var query =<?php echo json_encode((object)Request::query());?>;
    function search_appel(){
        Object.assign(query,{'nom':$('#nom').val()});
        Object.assign(query,{'prenom':$('#prenom').val()});
        Object.assign(query,{'numero':$('#numero').val()});


        window.location.href="{{route('search_appel')}}?"+$.param(query);
    }

    function delete_appel(url){
        swal({
            title: "Vous etes sur?",
            text: "Une fois supprimé, vous ne pourrez plus récupérer ce produit!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $('#appel_delete').attr('action',url);
                    $('#appel_delete').submit();
                }
            });
    }
</script>
{{--@push('stable_script')
    <script>
        const table = $('#')
    </script>
    @endpush--}}
