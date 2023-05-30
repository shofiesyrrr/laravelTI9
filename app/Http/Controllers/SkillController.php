<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('biodata');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ar_lokasi = ['Jakarta','Bekasi','Depok','Solo','Bandung'];
        $ar_skill = ['PHP','MySQL','Javascript','HTML','CSS'];
        return view('biodata',['lokasi'=>$ar_lokasi,'skill'=>$ar_skill]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|min:5|max:20',
            'lokasi' => 'required',
            'jenis_kelamin' => 'required',
            'skill' => 'required',
        ]);
        return view('hasil', ['data' => $request]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
