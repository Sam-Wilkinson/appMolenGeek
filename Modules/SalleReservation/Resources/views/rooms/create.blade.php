
@extends('adminlte::page')


@section('content')
<div class="container" style="border: 1px solid grey; border-radius:25px;padding: 3%;">
    <form method="POST" action="{{route('rooms.store')}}" enctype="multipart/form-data" >
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="exampleInputEmail1">Room Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Room Shorthand</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slug" name="slug">
          </div>
        <div class="form-group">
          <label for="exampleInputFile">File input</label>
          <input type="file" id="exampleInputFile" name="image">
          <p class="help-block">Add an image of the room</p>
        </div>
        <div class="form-inline"></div>
        <div class="form-group">
            <div class="input-group">
                <input type="number" class="form-control" id="exampleInputAmount" placeholder="Amount" name="size">
                <div class="input-group-addon bg-blue">Size of Rooms</div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@stop