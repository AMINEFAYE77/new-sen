<?php

namespace App\Http\Controllers;

use App\Models\Appel;
use App\Models\Commune;
use App\Models\Product;
use App\Models\Region;
use App\Models\Role;
use App\Models\Tag;
use App\Models\TypeProduct;
use App\Models\User;
use App\Notifications\NewProductsCreated;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
       // $products = Product::latest()->paginate(5);
        $products = Product::where('user_id',$user->id)->orderBy('id','desc')->get();
        return view('admin.product.index',compact('products','user'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['communes']=Commune::orderBy('id','desc')->get();
        $data['regions']=Region::orderBy('id','desc')->get();
        $data['type_products']=TypeProduct::orderBy('id','desc')->get();

        return view('admin.product.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
           'name' =>'required|min:5',
           'description' =>'required|min:10',
           'lieu' =>'required',
           'price' =>'required|numeric',
           'superficie' =>'required|numeric',
           'image' =>'required|mimes:jpeg,jpg,png',
           'commune' =>'required',
           'region' =>'required',
           'type_product' =>'required',
          [
               'commune.required'=>'veuillez selectionner un categorie',
               'region.required'=>'veuillez selectionner une region',
               'type_product.required'=>'veuillez selectionner un type de produit',

            ]
        ]);
        if ($request->hasFile('image')){
            $image= $request->file('image');
            $image_name=time().'.'.$image->extension();
            $image_name=time().'.'.$image->extension();
            $image->move(public_path('product_image'),$image_name);
        }
        $products = Product::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'lieu'=>$request->lieu,
            'price'=>$request->price,
            'superficie'=>$request->superficie,
            'image'=>$image_name,
            'user_id'=>auth()->id(),
            'region_id'=>$request->region,
            'commune_id'=>$request->commune,
            'type_product_id'=>$request->type_product,

        ]);
       // $users = User::where('role_id',2)->get();
        $admin =  Role::find(1);
        $users = $admin->users;
       // $users= $user->roles()->where('libelle','admin')->get();
        Notification::send($users, new NewProductsCreated($products));

        Session::flash('status','success');
        return redirect()->route('products.index')->with('success','Produit cree avec success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $data['product']=Product::findOrFail($id);
        return view('admin.product.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['product']=Product::findOrFail($id);
        $data['communes']=Commune::orderBy('id','desc')->get();
        $data['regions']=Region::orderBy('id','desc')->get();
        $data['type_products']=TypeProduct::orderBy('id','desc')->get();
        return view('admin.product.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'name' =>'required|min:5',
            'description' =>'required|min:10',
            'lieu' =>'required',
            'price' =>'required|numeric',
            'superficie' =>'required|numeric',
            'image' =>'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'commune' =>'required',
            'region' =>'required',
            'type_product' =>'required',
            [
                'commune.required'=>'veuillez selectionner un categorie',
                'region.required'=>'veuillez selectionner une region',
                'type_product.required'=>'veuillez selectionner un type de produit',

            ]
        ]);
        if ($request->hasFile('image')){
            $image= $request->file('image');
            $image_name=time().'.'.$image->extension();
            $image_name=time().'.'.$image->extension();
            $image->move(public_path('product_image'),$image_name);
            $old_path = public_path().'product_image/'.$product->image;
            if (\File::exists($old_path)){
                \File::delete($old_path);

        }
        }else
        {
            $image_name =$product->image;
        }
        $product->update([
            'name'=>$request->name,
            'description'=>$request->description,
            'lieu'=>$request->lieu,
            'price'=>$request->price,
            'superficie'=>$request->superficie,
            'image'=>$image_name,
            'user_id'=>auth()->id(),
            'region_id'=>$request->region,
            'commune_id'=>$request->commune,
            'type_product_id'=>$request->type_product,
        ]);
        Session::flash('status','info');

        return redirect()->route('products.index')->with('success','Produit modifier avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::findOrFail($id);
        $old_path = public_path().'product_image/'.$product->image;
        if (\File::exists($old_path)) {
            \File::delete($old_path);
        }
        $product->delete();
        Session::flash('status','info');

        return redirect()->route('products.index')
            ->with('success','Produit supprime avec success');
    }
    public function search(Request $request){

        $data['communes']=Commune::orderBy('id','desc')->get();
        $data['regions']=Region::orderBy('id','desc')->get();
        $data['type_products']=TypeProduct::orderBy('id','desc')->get();
        $products_query = Product::where('user_id',auth()->id())->where('status',true);

        if ($request->commune){
            $products_query->whereHas('commune',function($q) use($request){
                $q->where('libelle',$request->commune);
            });
        }
        if ($request->region){
            $products_query->whereHas('region',function($q) use($request){
                $q->where('libelle',$request->region);
            });
        }
        if ($request->type_product){
            $products_query->whereHas('type_product',function($q) use($request){
                $q->where('libelle',$request->type_product);
            });
        }
        if ($request->price){
            $products_query->where('price','LIKE','%'.$request->price. '%');
        }
        if ($request->lieu){
            $products_query->where('lieu','LIKE','%'.$request->lieu. '%');
        }
        if ($request->superficie){
            $products_query->where('superficie','LIKE','%'.$request->superficie. '%');
        }
        $data['products']=$products_query->orderBy('id','desc')->get();
        $products = Product::latest()->paginate(5);
        return view('admin.product.search',$data)
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function validationproduit(Request $request,$id)
    {
        $product = Product::find($id);
        if($product->status == false)
        {
            $product->update([
                'status' => true
            ]);
        }else{
            $product->update([
                'status' => false
            ]);
        }

            return redirect()->route('products.index')->with('success','Statut mise a jour avec success');

    }

    public function allProduct()
    {

         $products = Product::actif()->get();

        return view('admin.product.mesProducts',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function showFromNotifications(Product $product, DatabaseNotification $notifications){

        $notifications->markAsRead();
        return view('admin.product.show',compact('product'));

    }

}
