@extends('layouts.master')
@section('contentheader_title')
{{session('title')}}
@endsection 
@section('styles')
<style>
    .pull-right{
        float: right;
    }
</style>
@endsection
@section('content')
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right mb-2">                
                <a class="btn btn-success" href="{{route(session('create_route_name'))}}"> Create New</a>               
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ELEMENT CODE</th>
            <th>ELEMENT DESCRIPTION</th>
            <th>COST / M2 GFA</th>
            <th>UNIT / M2</th>
            <th>COST/SF GFA</th>
            <th>UNIT/SF</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($entries as $entry)
        <tr>
            <td>{{$entry->element_code}}</td>
            <td>{{ $entry->description }}</td>
            <td>${{ number_format($entry->cost_ms,2) }}</td>
            <td>{{ $entry->unit_m2 }}</td>
            <td>${{ number_format($entry->cost_ms,2) }}</td>
            <td>{{ $entry->unit_sf }}</td>
            <td>
                <form action="{{route(session::get('destroy_route_name'),$entry->id)}}" method="POST">                    
                    <a class="btn btn-primary" href="{{route(session::get('edit_route_name'),$entry->id)}}">Edit</a>
                    @csrf
                    @method('DELETE')      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $entries->links() !!}
@endsection