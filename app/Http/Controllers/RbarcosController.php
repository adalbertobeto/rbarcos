<?php

namespace App\Http\Controllers;

use App\Rbarcos;
use Illuminate\Http\Request;

class RbarcosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rbarcos = Rbarcos::latest()->paginate(5);

        return view('rbarcos.index', compact('rbarcos'))->with('i', (request()->input('page', 1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rbarcos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        Rbarcos::create($request->all());
   
        return redirect()->route('rbarcos.index')
                        ->with('success','Rbarcos created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rbarcos  $rbarcos
     * @return \Illuminate\Http\Response
     */
    public function show(Rbarcos $rbarco)
    {
        return view('rbarcos.show',compact('rbarco'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rbarcos  $rbarcos
     * @return \Illuminate\Http\Response
     */
    public function edit(Rbarcos $rbarco)
    {
        return view('rbarcos.edit',compact('rbarco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rbarcos  $rbarcos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rbarcos $rbarco)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
  
        $rbarco->update($request->all());
  
        return redirect()->route('rbarcos.index')
                        ->with('success','Rbarco updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rbarcos  $rbarcos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rbarcos $rbarco)
    {
        $rbarco->delete();
  
        return redirect()->route('rbarcos.index')
                        ->with('success','Rbarcos deleted successfully');
    }
    
}
