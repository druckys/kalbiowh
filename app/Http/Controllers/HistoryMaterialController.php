<?php

namespace App\Http\Controllers;

use App\Models\LogMaterial;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\HistoryMaterialExport;
use App\Imports\HistoryMaterialImport;

class HistoryMaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $LogMaterials = LogMaterial::all();
        return view('history_materials.index', compact('LogMaterials'));
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
    public function export()
	{
		return Excel::download(new HistoryMaterialExport, 'History_LogMaterial.xlsx');
        
	}

    public function import()
	{
		return view('history_materials.import');
	}

    // for import excel file
    public function uploadHistory()
	{
        Excel::import(new HistoryMaterialImport,request()->file('file'));

		// return redirect()->route('history.import')->with('toast_info', 'Tabel berhasil diupload!');
        // return back();
        return redirect('/history-materials')->with('toast_success', 'Imported!');
	}

}
