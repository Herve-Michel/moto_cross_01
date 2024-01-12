<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schedules = Schedule::all();
        return view('schedule.index')->with(["schedules" => $schedules]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $circuits = Training::all();
        return view('schedule.create')->with(["circuits" => $circuits]);;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return "Coucou";

        $request->validate([
            'id_training' => 'required',
            'start_date' => 'required',
            'end_date' => 'required'
        ]);

        if ($request->start_date <= $request->end_date) {
            Schedule::create([
                "id_training" => $request->id_training,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date
            ]);
            return redirect()->route('lister_les_creneaux');
        } else {
            return Redirect::back()->withErrors(['msg' => 'Erreur sur les dates....']);
        }
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
    public function edit($id)
    {
        $schedule = Schedule::find($id);
        return view('schedule.edit', ['schedule' => $schedule]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $schedule = Schedule::find($id);
        $schedule->update([
            "id_training" => $request->id_training,
            "created_at" => $request->created_at,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date
        ]);

        return redirect()->route('lister_les_creneaux');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Schedule::find($id)->delete();
        return redirect()->route('lister_les_creneaux');
    }
}
