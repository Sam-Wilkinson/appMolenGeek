
@extends('adminlte::page')


@section('content')
@php($rowCount = 0)
<div class="row">
    <div class="col-sm-3">
        <div class="info-box">
            <a class="btn" href="{{route('rooms.create')}}">
                <!-- Apply any bg-* class to to the icon to color it -->
                <span class="info-box-icon bg-green"><i class="fa fa-star-o"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Room</span>
                    <span class="info-box-number">Create a Room!</span>
                </div><!-- /.info-box-content -->
            </a>
        </div><!-- /.info-box -->
    </div>
</div>

<div class="row">
    @foreach($rooms as $room)

        <div class="col-md-4" style="padding-bottom:15px">
            <div class="">
                <div class="box box-default collapsed-box   ">
                    <div class="box-header with-border">
                    <h3 class="box-title">{{$room->name}}</h3>/
                    <h4 class="box-title">{{$room->size}}</h4>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
                    </div><!-- /.box-tools -->
                    </div><!-- /.box-header -->
                    <div class="box-body">
                    <a href="">
                        <img src="{{Storage::disk('public')->url('conference-room.jpg')}}" alt="" class="img-responsive">
                    </a>
                    <div class="" style="margin-top:5px;">
                        
                        <a href="{{route('rooms.edit',['room'=>$room->id])}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('rooms.destroy',['room'=>$room->id])}}" class="btn btn-danger" style="float:right;">Delete</a>
                    </div>

                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div>
        </div>
        @php($rowCount++)
        @if($rowCount / 3 == 1)
</div>
<div class="row">
    @php($rowCount = 0)
    @endif
    @endforeach
</div>
@stop