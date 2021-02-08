<?php

namespace App\Http\Controllers;

use App\Models\Appel;
use Illuminate\Http\Request;

class AppelController extends Controller
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
        $appels = Appel::latest()->paginate(5);

        return view('admin.appel.index',compact('appels'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.appel.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'numero' => 'required|min:9'
        ]);

        $appels = Appel::create([
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'numero'=>$request->numero,

            'user_id'=>auth()->id(),
        ]);

        return redirect()->route('appels.index')
            ->with('success','Appel cree avec success.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Appel $appel)
    {
        return view('admin.appel.show',compact('appel'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Appel $appel)
    {
        return view('admin.appel.edit',compact('appel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Appel $appel
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, Appel $appel)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
            'numero' => 'required|min:9'
        ]);

        $appel->update($request->all());

        return redirect()->route('appels.index')
            ->with('success','Appel mise a jour avec success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function destroy(Appel $appel)
    {
        $appel->delete();

        return redirect()->route('appels.index')
            ->with('success','Appel surpprime avec success');
    }

    public function search(Request $request){


        $appel_query = Appel::where('user_id',auth()->id());

        if ($request->nom){
            $appel_query->where('nom','LIKE','%'.$request->nom. '%');
        }
        if ($request->prenom){
            $appel_query->where('prenom','LIKE','%'.$request->prenom. '%');
        }
        if ($request->numero){
            $appel_query->where('numero','LIKE','%'.$request->numero. '%');
        }
        $data['appels']=$appel_query->orderBy('id','desc')->get();
        $appels = Appel::latest()->paginate(5);
        return view('admin.appel.search',$data)
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }
}
