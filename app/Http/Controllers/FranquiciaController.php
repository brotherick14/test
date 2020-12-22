<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Franquicia;

class FranquiciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contacts = Franquicia::all();
        if ($contacts === []) {
            return response($contacts, 200);
          } else {
            return response()->json([
              "message" => "Franquicia not found"
            ], 404);
          }
    }

    public function getToken(){
        return csrf_token(); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('franquicia.create');
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
            'name'=>'required',
            'phone'=>'required'
        ]);
        $contact = new Franquicia([
            'name' => $request->get('name'),
            'phone' => $request->get('phone'),
        ]);
        $contact->save();
        return response()->json([
            "message" => "Franquicia guardada"
          ], 201);
          
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Franquicia::find($id);
        return $contact;

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Franquicia::find($id);
        return view('franquicia.edit', compact('franquicia'));    
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
        $request->validate([
            'name'=>'required',
            'phone'=>'required'
        ]);

        $contact = Franquicia::find($id);
        $contact->name =  $request->get('name');
        $contact->phone = $request->get('phone');
        $contact->save();

        return redirect('/franquicia')->with('success', 'Franquicia updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Franquicia::find($id);
        $contact->delete();
    }
}
