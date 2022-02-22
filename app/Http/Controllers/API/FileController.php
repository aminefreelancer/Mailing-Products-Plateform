<?php

namespace App\Http\Controllers\API;

use App\File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $attributes = $request->validate([
            'pdf' => ['required', 'unique:files', 'mimes:pdf'],
            'product' =>['required']
        ]);

        $pdfName = $request->pdf->getClientOriginalName();

        $file = File::where('pdf', $pdfName)->get();
        
        if(!count($file)) {
            if($request->pdf->move(public_path('upload'), $pdfName)) {
                $file = File::create([
                    'pdf' => $pdfName,
                    'product_id' => $request->product['id']
                ]);
                return response()->json(['message'=>'You have successfully upload file.']);
            }
            return response()->json(['message'=>'Chargement PDF echoué !'], 422);
        }
        return response()->json(['message'=>'PDF existe déjà !'], 422);
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
