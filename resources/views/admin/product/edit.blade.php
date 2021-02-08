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
                <a class="btn btn-danger " href="{{route('products.index')}}"> <i class="fas fa-arrow-left"></i> Retour</a>
                <br>
                <br>
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Modifier Produit</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form id="quickForm" action="{{route('products.update', $product->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nom produit</label>
                                        <input type="text"  name="name" value="{{old('name') ? old('name') : $product->name }}" class="form-control" id="name"  placeholder="Nom produit">
                                        @if($errors->any('name'))
                                            <span class="text-danger">{{$errors->first('name')}}</span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">description</label>
                                        <textarea class="form-control"  name="description" rows="3" placeholder="La description ...">{{old('description') ? old('description') : $product->description }}</textarea>
                                        @if($errors->any('description'))
                                            <span class="text-danger">{{$errors->first('description')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">lieu</label>
                                        <input type="text"  name="lieu" value="{{old('lieu') ? old('lieu') : $product->lieu }}" class="form-control" id="exampleInputEmail1"  placeholder="Lieu">
                                        @if($errors->any('lieu'))
                                            <span class="text-danger">{{$errors->first('lieu')}}</span>
                                        @endif

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Image</label>
                                        <input type="file" name="image"  class="form-control" id="image"  placeholder="Image">


                                        {{--<div class="form-group mt-2">
                                            <span class=>Apercu Image</span>
                                            <img src="{{asset('product_image/'.$product->image)}}" width="200" alt="">
                                        </div>--}}
                                        @if($errors->any('image'))
                                            <span class="text-danger">{{$errors->first('image')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <button type="button" data-toggle="collapse" class="btn bg-success mt-2" data-target="#demo">Afficher l'image</button>

                                        <div id="demo" class="collapse m-1">
                                            <img class="rounded float-rigt" src="{{asset('product_image/'.$product->image)}}" width="200" alt="">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">prix</label>
                                        <input type="number" name="price" value="{{old('price') ? old('price') : $product->price }}" class="form-control" id="price"  placeholder="Prix">
                                        @if($errors->any('price'))
                                            <span class="text-danger">{{$errors->first('price')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">superficie</label>
                                        <input type="number" name="superficie" value="{{old('superficie') ? old('superficie') : $product->superficie }}" class="form-control" id="superficie"  placeholder="Superficie">
                                        @if($errors->any('superficie'))
                                            <span class="text-danger">{{$errors->first('superficie')}}</span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label>Regions</label>
                                        <select class="form-control" id="region" name="region">
                                            <option value="">Selectionner une region</option>
                                            @if(count($regions))
                                                @foreach($regions as $region)
                                                    <option value="{{$region->id}}"
                                                    @if(old('region') && old('region') == $region->id)
                                                        {{'selected'}}
                                                        @elseif($product->region_id=$region->id)
                                                        {{'selected'}}
                                                        @endif

                                                    >{{$region->libelle}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                        @if($errors->any('region'))
                                            <span class="text-danger">{{$errors->first('region')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Communes</label>
                                        <select class="form-control" id="commune" name="commune">
                                            <option value="">Selectionner une commune</option>
                                            @if(count($communes))
                                                @foreach($communes as $commune)
                                                    <option value="{{$commune->id}}"
                                                    @if(old('commune') && old('commune') == $commune->id)
                                                        {{'selected'}}
                                                        @elseif($product->commune_id==$commune->id)
                                                        {{'selected'}}
                                                        @endif
                                                    >{{$commune->libelle}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                        @if($errors->any('commune'))
                                            <span class="text-danger">{{$errors->first('commune')}}</span>
                                        @endif


                                    </div>
                                    <div class="form-group">
                                        <label>Type de produit</label>
                                        <select class="form-control" id="type_product" name="type_product">
                                            <option value="">Selectionner une type product</option>
                                            @if(count($type_products))
                                                @foreach($type_products as $type_product)
                                                    <option value="{{$type_product->id}}"
                                                    @if(old('type_product') && old('type_product') == $type_product->id)
                                                        {{'selected'}}
                                                        @elseif($product->type_product_id==$type_product->id)
                                                        {{'selected'}}
                                                        @endif
                                                    >{{$type_product->libelle}}</option>
                                                @endforeach
                                            @endif

                                        </select>
                                        @if($errors->any('type_product'))
                                            <span class="text-danger">{{$errors->first('type_product')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" id="status" name="status">


                                            <option value="0">Activer</option>
                                            <option value="1">Desactiver</option>


                                        </select>
                                        @if($errors->any('status'))
                                            <span class="text-danger">{{$errors->first('status')}}</span>
                                        @endif
                                    </div>
                                    {{-- <div class="form-group">
                                         <label>Tag</label>
                                         <select class="form-control" id="tags" name="tags[]" multiple>
                                             <option value="">Selectionner un tag</option>
                                             @if(count($tags))
                                                 @foreach($tags as $tag)
                                                     <option value="{{$tag->id}}"
                                                     @if(old('tag') && old('tag') == $tag->id)
                                                         {{'selected'}}
                                                         @elseif($product->tag_id==$tag->id)
                                                         {{'selected'}}
                                                         @endif
                                                     >{{$tag->libelle}}</option>
                                                 @endforeach
                                             @endif

                                         </select>
                                         @if($errors->any('tags'))
                                             <span class="text-danger">{{$errors->first('tags')}}</span>
                                         @endif
                                     </div>--}}
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
