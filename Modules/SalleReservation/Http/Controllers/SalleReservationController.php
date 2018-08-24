<?php

namespace Modules\SalleReservation\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Auth;
use Calendar;

class SalleReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $loggedInUser = Auth::user();

        $events = [];

        $events[] = Calendar::event(
            "Event One",
            "true",
            "2018-08-16T0900",
            "2018-08-16T0800",
            0
        );

        $calendar = Calendar::addEvents($events)->setOptions([
            'first Day' => 1
        ])->setCallbacks([]);

        
        return view('sallereservation::calendar.index',compact('loggedInUser','calendar'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('sallereservation::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('sallereservation::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('sallereservation::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }
}
