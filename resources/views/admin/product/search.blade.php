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

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Type de produit</label>
                                                <select class="form-control" id="type_product">
                                                    <option></option>
                                                    @if(count($type_products))
                                                        @foreach($type_products as $type_product)
                                                            <option value="{{$type_product->libelle}}" {{(Request::query('type_product')) && (Request::query('type_product') == $type_product->libelle)?'selected':'' }} >{{$type_product->libelle}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label>Commune</label>
                                                <select class="form-control" id="commune" >
                                                    <option></option>
                                                    @if(count($communes))
                                                        @foreach($communes as $commune)
                                                            <option value="{{$commune->libelle}}" {{(Request::query('commune')) && (Request::query('commune') == $commune->libelle)?'selected':''}} >{{$commune->libelle}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Regions</label>
                                                <select class="form-control" id="region">
                                                    <option></option>
                                                    @if(count($regions))
                                                        @foreach($regions as $region)
                                                            <option value="{{$region->libelle}}" {{(Request::query('region')) && (Request::query('region') == $region->libelle)?'selected':''}} >{{$region->libelle}}</option>
                                                        @endforeach
                                                    @endif
                                                </select>
                                            </div>


                                        </div>

                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Prix</label>
                                                <input type="text" class="form-control"  id="price" placeholder="Prix">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Superficie</label>
                                                <input type="text" class="form-control" id="superficie" placeholder="Superficie">
                                            </div>
                                        </div>

                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Lieu</label>
                                                <input type="text" class="form-control" id="lieu" placeholder="Lieu">
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <!-- select -->
                                            <div class="form-group">
                                                <label>Status</label>
                                                <input type="text" class="form-control" id="status" placeholder="Lieu">
                                            </div>
                                        </div>


                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <!-- select -->
                                            <div class="form-group">
                                                <button class="btn bg-blue" onclick="search_product()" type="button" >recherche</button>

                                            </div>
                                        </div>
                                    @if(Request::query('commune') || Request::query('region') || Request::query('type_product') || Request::query('price') || Request::query('lieu') || Request::query('superficie'))
                                        <!-- select -->
                                            <div class="form-group">
                                                <a class="btn bg-red " href="{{route('search_product')}}" type="button">clear</a>
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
                                <h3 class="card-title">Recherche Produit</h3>
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
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($products))
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
                                                    <form  id="product_delete" action="" method="POST">

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
                                    @else
                                        <tr>
                                            <td colspan="6">pas de produit disponible</td>
                                        </tr>
                                    @endif




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
                                <a class="btn btn-danger " href="{{route('products.index')}}"> <i class="fas fa-arrow-left"></i>Retour</a>

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
