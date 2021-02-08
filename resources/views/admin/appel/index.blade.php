@extends('layouts.adminLayouts.admin_content')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des Appels</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Liste des appels</li>
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

                        <a class="btn btn-primary " href="{{route('appels.create')}}"> Ajouter un appel</a>
                        <br>
                        <br>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste appel</h3>

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>prenom</th>
                                        <th>Numero telephone</th>
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
                                               <form id="post_delete" action="" method="POST">

                                                   <a href="{{ route('appels.show', $appel->id) }}" title="show">
                                                       <i class="fas fa-eye text-success  fa-lg"></i>
                                                   </a>

                                                   <a href="{{ route('appels.edit', $appel->id) }}">
                                                       <i class="fas fa-edit  fa-lg"></i>

                                                   </a>

                                                   @csrf
                                                   @method('DELETE')
                                                   <a href="javascript:delete_appel('{{ route('appels.destroy', $appel->id) }}')">
                                                       <i class="fas fa-trash fa-lg text-danger"></i>
                                                   </a>

                                               </form>
                                           </td>
                                       </tr>
                                   @endforeach
                                   @endif




                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>prenom</th>
                                        <th>Numero telephone</th>
                                        <th>Date de creation</th>
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

    <script>
        function delete_appel(url){
            swal({
                title: "Vous etes sur?",
                text: "Une fois supprimé, vous ne pourrez plus récupérer cet appel!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#post_delete').attr('action',url);
                        $('#post_delete').submit();
                    }
                });
        }
    </script>

@endsection
