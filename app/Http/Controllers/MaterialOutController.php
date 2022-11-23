<?php

namespace App\Http\Controllers;

use App\Models\LogMaterial;
use Illuminate\Http\Request;

class MaterialOutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogMaterial = LogMaterial::all();
        return view('materialout.index', compact('LogMaterial'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('materialout.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        LogMaterial::create($request->except(['_token']));
        return redirect('/materialout')->with('toast_success', 'Berhasil Ditambahkan!');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $LogMaterial = LogMaterial::find($id);
        return view('materialout.edit', compact(['LogMaterial']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $LogMaterial = LogMaterial::find($id);
        $LogMaterial->update($request->except(['_token']));
        return redirect('/materialout')->with('toast_info', 'Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LogMaterial = LogMaterial::find($id);
        $LogMaterial->delete();
        
        return redirect('/materialout')->with('toast_error', 'Data Berhasil Dihapus!');
    }
}
