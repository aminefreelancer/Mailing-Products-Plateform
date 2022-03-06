<?php

namespace App\Http\Controllers\API;

use App\Log;
use App\File;
use App\Mail\DocMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class LogController extends Controller
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
        
        $attributes = $this->validate($request, [
            'to' => ['required'],
            'subject' => ['required', 'string', 'max:255'],
            'docs' => ['required'],
            'format' => ['required', 'string']
        ]);

        $products = [];
        foreach($request->docs as $doc){
            $products[] = $doc['id'];
        }

        $files = File::whereIn('product_id', $products)->pluck('pdf');

        foreach($request->to as $doctor){
            $log = Log::create([
                'email' => $doctor['email'],
                'subject' => $request->subject,
                'format'  => $request->format,
                'doctor_id' => $doctor['id']
            ]);

            Mail::to($request->user())->send(new DocMail($request->subject, $request->format, $files));
        }

        return response()->json(['message'=>'You have successfully send emails.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function show(Log $log)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function edit(Log $log)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Log $log)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Log  $log
     * @return \Illuminate\Http\Response
     */
    public function destroy(Log $log)
    {
        //
    }
}
