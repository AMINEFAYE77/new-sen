@extends('layouts.adminLayouts.admin_content')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Detail produit</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Detail produit</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <a class="btn btn-danger mb-3 " href="{{route('products.index')}}"> <i class="fas fa-arrow-left"></i> Retour</a>
            <div class="row">
                <div class="col-lg-12">
                    @can('managers-admin')
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('products.validate',$product->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    @if($product->status == false)
                                        <button class="btn btn-success" type="submit">Valider le produit</button>
                                    @else
                                        <button class="btn btn-danger" type="submit">Invalider le produit</button>
                                    @endif
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>
            </div>
            <!-- Default box -->
            <div class="card card-solid">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-6">
                            <h3 class="d-inline-block d-sm-none"></h3>
                            <div class="col-12">
                                <img src="{{asset('product_image/'.$product->image)}}" class="product-image" alt="Product Image">
                            </div>

                        </div>
                        <div class="col-12 col-sm-6">
                            <h1  class="my-3">{{$product->name}}</h1>

                            <strong >Region :</strong>
                            <br>
                            <h4>{{$product->region->libelle}}</h4>
                            <hr>
                            <strong>Commune :</strong>
                            <br>
                            <h4>{{$product->commune->libelle}}</h4>
                            <hr>

                            <strong>Lieu :</strong>
                            <br>
                            <h4>{{$product->lieu}}</h4>

                            <hr>

                            <strong>Superficie :</strong>
                            <br>
                            <h4>{{$product->superficie}}</h4>
                            <hr>

                            <strong>Type de produit :</strong>
                            <br>
                            <h4>{{$product->type_product->libelle}}</h4>
                            <hr>
                            <strong>Prix :</strong>
                            <br>
                            <div class="bg-gray py-2 px-3 mt-4">

                                <h2 class="mb-0">
                                    {{$product->price}} francs
                                </h2>

                            </div>

                            <br>
                            <br>

                        </div>

                        <div >
                            <h2 class="badge badge-info" >Date de creation :</h2>
                            <br>
                            <h4>{{$product->created_at}}</h4>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <nav class="w-100">
                            <div class="nav nav-tabs" id="product-tab" role="tablist">
                                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>

                            </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">{{$product->description}} </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
@endsection
