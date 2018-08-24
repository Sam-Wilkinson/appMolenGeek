
@extends('adminlte::page')


@section('content')
<div class="container" style="border: 1px solid grey; border-radius:25px;padding: 3%;">
    <form method="POST" action="{{route('rooms.edit',['room'=>$room->image])}}" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div class="form-group">
          <label for="exampleInputEmail1">Room Name</label>
          <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Name" name="name"
          value="{{old('name',$room->name)}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Room Shorthand</label>
            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Slug" name="slug"
            value="{{old('slug',$room->slug)}}">
          </div>
        <div class="form-group">
            <label for="exampleInputFile">File input</label>
            <input type="file" id="exampleInputFile" name="image">
            @if($room->image != null)
                <p class="help-block">The old Image</p>
                <img src="{{$room->image ? Storage::disk('public')->url($room->image):Storage::disk('public')->url('conference-room.jpg')}}" alt="" class="img-responsive">
            @endif
        </div>
        <div class="form-inline"></div>
        <div class="form-group">
            <div class="input-group">
                <input type="number" class="form-control" id="exampleInputAmount" placeholder="Amount" name="size"
                value="{{old('size',$room->size)}}">
                <div class="input-group-addon bg-blue">Size of Rooms</div>
            </div>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>
@stop