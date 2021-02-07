<?php

namespace App\Http\Controllers;

use App\Models\Appel;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct()

    {

        $this->middleware('auth');

    }
    public function dashboard(){

        $product =Product::all();
        $appels = Appel::all();
        $users = User::all();
        if (Gate::allows('is-admin') ||('is-niveau1') || ('is-niveau2')|| ('is-niveau3')){

            return view('admin.dashboard',compact('product','users','appels'));
        }
        abort(404,'tu me peux pas acceder a ce dashboard');
    }
    public function settings(){
        return view('admin.settings');
    }
}
