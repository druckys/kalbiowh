<?php

namespace App\Http\Controllers;

use App\Models\ListTool;
use App\Models\Tool;
use App\Models\LogBook;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogBooks = LogBook::all();
        return view('peminjaman.index', compact('LogBooks'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_tools = ListTool::all();
        return view ('peminjaman.create', compact('list_tools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'nama' => 'required|max:255',
    		'borrow_date' => 'required',
    		'initial_name' => 'required|max:3|min:3|string|regex:/^([A-Z]+)$/',
    	]);
        
        LogBook::create($request->except(['_token']));
        return redirect('/peminjaman')->with('toast_success', 'Berhasil Ditambahkan!');
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
        $LogBooks = LogBook::find($id);
        $list_tools = ListTool::all();
        return view('peminjaman.edit', compact(['LogBooks', 'list_tools']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request, $id)
    {
        $LogBooks = LogBook::find($id);
        $LogBooks->update($request->except(['_token']));
        return redirect('/peminjaman')->with('toast_info', 'Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $LogBooks = LogBook::find($id);
        $LogBooks->delete();
        
        return redirect('/peminjaman')->with('toast_error', 'Data Berhasil Dihapus!');
    }
}
