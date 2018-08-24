<?php

namespace Modules\SalleReservation\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\SalleReservation\Entities\Room;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $rooms = Room::get();
        
        return view('sallereservation::rooms.index',compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('sallereservation::rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $room = new Room;
        $room->name = $request->name;
        $room->slug = $request->slug;
        $room->size = $request->size;
        if($request->image != null){
            $room->image = App::make('ImageResize')->imageStore($request->image, 'public', 400, null);
        }
        if($room->save()){
            return redirect()->route('rooms.index');
        }
        else{
            return redirect()->route('rooms.index');
        };
       
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('sallereservation::calendar.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Room $room)
    {

        return view('sallereservation::rooms.edit',compact('room'));
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
