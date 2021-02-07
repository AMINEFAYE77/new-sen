@extends('layouts.adminLayouts.admin_content')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Liste des produits</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Liste des produits</li>
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

                        <a class="btn btn-primary mb-2 " href="{{route('products.create')}}"><i class="fas fa-plus"></i> Ajouter un produit</a>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Liste Produit</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Descriptiom</th>
                                        <th>lieu</th>
                                        <th>Superficie</th>
                                        <th>Image</th>
                                        <th>Region</th>
                                        <th>Commune</th>
                                        <th>Type de produit</th>
                                        <th>Prix</th>
                                        <th>Date de creation</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->lieu}}</td>
                                            <td>{{$product->superficie}}</td>
                                            <td><img class="rounded float-rigt" src="{{asset('product_image/'.$product->image)}}" width="80" alt=""></td>
                                            <td>{{$product->region->libelle}}</td>
                                            <td>{{$product->commune->libelle}}</td>
                                            <td>{{$product->type_product->libelle}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                @if($product->status == false)
                                                    <i class="badge bg-danger">Invalide</i>
                                                @else
                                                    <i class="badge bg-success">Valide</i>
                                                @endif
                                            </td>
                                            <td>
                                                <form id="product_delete" action="" method="POST">

                                                    <a href="{{ route('products.show', $product->id) }}" title="show">
                                                        <i class="fas fa-eye text-success  fa-lg"></i>
                                                    </a>

                                                    <a href="{{ route('products.edit', $product->id) }}">
                                                        <i class="fas fa-edit  fa-lg"></i>

                                                    </a>

                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="javascript:delete_product('{{ route('products.destroy', $product->id) }}')">
                                                        <i class="fas fa-trash fa-lg text-danger"></i>
                                                    </a>

                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach







                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Descriptiom</th>
                                        <th>lieu</th>
                                        <th>Superficie</th>
                                        <th>Image</th>
                                        <th>Region</th>
                                        <th>Commune</th>
                                        <th>Type de produit</th>
                                        <th>Prix</th>
                                        <th>Status</th>
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


@endsection
