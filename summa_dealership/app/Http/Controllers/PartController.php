<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Car;
use App\Models\User;
use App\Models\Part;
use Illuminate\Http\Request;

class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parts = Part::all();
        return view('dashboard.parts.index', compact('parts'));
    }

    /**
     * Show the form for creating a new resource.
     */
  public function create()
    {
        $parts = Part::all();


        return view( "dashboard.parts.create", compact("parts", "name", "price", "stock"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            "name" => ["required", "varchar", "max:255"],
            "price" => ["required", "double"],
            "stock" => ["required", "integer"],
            
        ]);

        $part = Part::create([
            "name" => $request->name,
            "price" => $request->price,
            "stock" => $request->stock,
        ]);

        return redirect()->route("parts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Part $part)
    {
        return view("dashboard.parts.show", compact("part"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Part $part)
    {
        $parts = Part::all();

        return view(
            "dashboard.parts.edit",
            compact("part", "name", "price", "stock"),
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Part $part)
    {
         $request->validate([
            "name" => ["required", "varchar", "max:255"],
            "price" => ["required", "double"],
            "stock" => ["required", "integer"],
                
            ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Part $part)
    {
        $part->delete();
        return redirect()->route("parts.index");
    }
}
