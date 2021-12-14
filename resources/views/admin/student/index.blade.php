@extends('layouts.admin.app')
@section('content')
<div class="container">
<div class="row">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Name</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Reporting Teacher</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    @if(count($students)>0)
    @foreach($students as $student)
      <tr>
        <td>{{$student->name}}</td>
        <td>{{$student->age}}</td>
        <td>{{$student->gender}}</td>
        <td>{{$student->gender}}</td>
        <td><a href="{{url('student/'.$student->id.'/edit')}}">Edit</a>
        &nbsp;&nbsp;
        <a href="{{url('student/delete/'.$student->id)}}">Delete</a></td>
      </tr>
    @endforeach
    @else
      <td colspan="5" class="text-center"><h4>No Details Available!!!<h4></td>        
    @endif
    </tbody>
  </table>
</div>
</div>
@endsection