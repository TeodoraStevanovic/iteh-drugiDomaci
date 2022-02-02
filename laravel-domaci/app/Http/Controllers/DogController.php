<?php

namespace App\Http\Controllers;

use App\Http\Resources\DogCollection;
use App\Http\Resources\DogResource;
use App\Models\Dog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dogs = Dog::all();
        //return $dogs;
        return new DogCollection($dogs);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'date_of_birth' => 'required',
            'age' => 'required',
            'breed_id' => 'required'
        ]);

        if ($validator->fails())
            return response()->json($validator->errors());

        $dog = Dog::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'age' => $request->age,
            'breed_id' => $request->breed_id,
            'user_id' => Auth::user()->id,
        ]);

        return response()->json(['Dog is created successfully!', new DogResource($dog)]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function show(Dog $dog)
    {
      
        return new DogResource($dog);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function edit(Dog $dog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dog $dog)
    {
       $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:100',
            'date_of_birth' => 'required',
            'age' => 'required',
            'breed_id' => 'required'

    ]);

    if ($validator->fails())
        return response()->json($validator->errors());

    
        $dog-> name = $request->name;
        $dog-> date_of_birth = $request->date_of_birth;
        $dog-> age = $request->age;
        $dog-> breed_id = $request->breed_id;
        $dog-> save();

    return response()->json(['dog is updated successfully!', new DogResource($dog)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dog  $dog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dog $dog)
    {
        $dog->delete();

        return response()->json('Dog is deleted successfully!');
    }
}
