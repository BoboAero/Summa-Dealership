<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Car;
use App\Models\User;
use App\Models\Part;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repairs = Repair::all();
        return view("dashboard.repairs.index", compact("repairs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $repairs = Repair::all();
        $cars = Car::whereDoesntHave("repairs")->get();
        $users = User::all();
        $parts = Part::all();

        return view( "dashboard.repairs.create", compact("repairs", "cars", "users", "parts"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "description" => ["required", "string", "max:255", "min:1"],
            "user_id" => ["required", "integer"],
            "car_id" => ["required", "integer", "unique:repairs,car_id"],
            "parts" => ["nullable", "array"],
            "parts.*" => ["integer", "exists:parts,id"],
        ]);

        $repair = Repair::create([
            "description" => $request->description,
            "user_id" => $request->user_id,
            "car_id" => $request->car_id,
        ]);

        $repair->parts()->sync($request->parts ?? []);

        return redirect()->route("repairs.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Repair $repair)
    {
        return view("dashboard.repairs.show", compact("repair"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Repair $repair)
    {
        $cars = Car::whereDoesntHave("repairs")->orWhere("id", $repair->car_id)->get();
        $users = User::all();
        $parts = Part::all();

        return view(
            "dashboard.repairs.edit",
            compact("repair", "cars", "users", "parts"),
        );
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repair $repair)
    {
        $request->validate([
            "description" => ["required", "string", "max:255", "min:1"],
            "user_id" => ["required", "integer"],
            "car_id" => [
                "required",
                "integer",
                "unique:repairs,car_id," . $repair->id,
            ],
            "parts" => ["nullable", "array"],
            "parts.*" => ["integer", "exists:parts,id"],
        ]);

        $repair->update([
            "description" => $request->description,
            "user_id" => $request->user_id,
            "car_id" => $request->car_id,
        ]);

        $repair->parts()->sync($request->parts ?? []);

        return redirect()->route("repairs.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repair $repair)
    {
        $repair->parts()->detach();
        $repair->delete();
        return redirect()->route("repairs.index");
    }
}
