<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\reservation as Reservation;
use Illuminate\Support\Carbon;
use PDO;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Reservation::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($studentCode, $item)
    {
        $newItem = new Reservation;
        $newItem->item_id = $item['id'];
        $newItem->student_code = $studentCode;
        $newItem->claim_on = Carbon::now()->addDays(7);
        $newItem->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newItem = new Reservation;
        $newItem->item_id = $request->reservation['item_id'];
        $newItem->student_code = $request->reservation['student_code'];
        $newItem->claim_on = Carbon::now()->addDays(7);
        $newItem->save();

        return "Reservation Successful";
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
        $existingItem = Reservation::find($id);

        if (!$existingItem) {
            return "Reservation does not exist";
        }

        $existingItem->claim_on = Carbon::parse($request->reservation['claim_on']);
        $existingItem->save();

        return "Claim date changed";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingItem = Reservation::find($id);

        if (!$existingItem) {
            return "Reservation does not exist";
        }

        $existingItem->delete();

        return "Reservation Deleted";
    }
}
