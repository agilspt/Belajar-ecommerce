<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Http\Requests\BarangRequest;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Barang;
        $datas = Barang::all(); //SELECT * FROM barang
        return view('barang.index', compact(
            'datas', 'model'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Barang;
        return view('barang.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BarangRequest $request)
    {
        $model= new Barang;
        $model->kode_barang =$request->get('kode_barang');
        $model->nama =$request->get('nama');
        $model->harga =$request->get('harga');
        $model->deskripsi =$request->get('deskripsi');
        $model->jumlah =$request->get('jumlah');
        $model->created_by = 1;
        $model->updated_by = 1;
        $model->save();
        //INSERT INTO barang (kode_barang, nama, ....)
        //VALUES ($request->get(kode_barang), ....)
        
        return redirect('barang')->with('success', 'Data berhasil ditambahkan');
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
        $model = Barang::find($id); //SELECT * FROM barang WHERE id=...
        return view('barang.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BarangRequest $request, $id)
    {
        $model= Barang::find($id);
        $model->kode_barang =$request->get('kode_barang');
        $model->nama =$request->get('nama');
        $model->harga =$request->get('harga');
        $model->deskripsi =$request->get('deskripsi');
        $model->jumlah =$request->get('jumlah');
        $model->updated_by = 1;
        $model->save();
        //INSERT INTO barang (kode_barang, nama, ....)
        //VALUES ($request->get(kode_barang), ....)
        
        return redirect('barang')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {    
        $model = Barang::find($id);
        $model->delete();
        return redirect('barang');
    }
}