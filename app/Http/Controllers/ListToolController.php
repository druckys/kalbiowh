<?php

namespace App\Http\Controllers;

use App\Models\ListTool;
use Illuminate\Http\Request;
use App\Imports\ListToolImport;
use Maatwebsite\Excel\Facades\Excel;

class ListToolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list_tools = ListTool::all();
        return view('list_tools.index', compact('list_tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function import()
	{
		return view('list_tools.import');
	}

    // for import excel file
    public function uploadHistory()
	{
        Excel::import(new ListToolImport,request()->file('file'));

		// return redirect()->route('history.import')->with('toast_info', 'Tabel berhasil diupload!');
        // return back();
        return redirect('/list-tool')->with('toast_success', 'Imported!');
	}
}
