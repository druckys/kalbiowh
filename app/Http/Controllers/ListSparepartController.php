<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListSparepart;
use App\Imports\ListSparepartImport;
use Maatwebsite\Excel\Facades\Excel;

class ListSparepartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listsparepart = ListSparepart::all();
        return view('list_spareparts.index', compact('listsparepart'));
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

    // for export excel file
    // public function export()
	// {
	// 	return Excel::download(new HistoryMaterialExport, 'History_LogMaterial.xlsx');
        
	// }

    public function import()
	{
		return view('list_spareparts.import');
	}

    // for import excel file
    public function uploadHistory()
	{
        Excel::import(new ListSparepartImport,request()->file('file'));

		// return redirect()->route('history.import')->with('toast_info', 'Tabel berhasil diupload!');
        // return back();
        return redirect('/list-sparepart')->with('toast_success', 'Imported!');
	}
}
