@extends('layouts.admin.app')
@section('content')
<div class="container">
  <h4>Edit Student</h4>
  <div class="row">
    <form action="{{route('student.update',$student->id)}}" method="POST" id="form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="PUT" />
      <div class="row col-md-6">
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control required" name="name" value="{{$student->name}}" id="name" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Age</label>
            <input type="number" class="form-control required" name="age" value="{{$student->age}}" id="age" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Gender</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="radio1" name="gender" value="Male" {{($student->gender=='Male')?'checked':''}}>
              <label class="form-check-label" for="radio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="radio1" name="gender" value="Female" {{($student->gender=='Female')?'checked':''}}>
              <label class="form-check-label" for="radio1">Female</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Reporting Teacher</label>
            <select class="form-control required" name="teacher">
              <option value="">--Select--</option>
              @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}" {{($teacher->id==$student->teacher->id)?'selected="selected"':''}}>{{$teacher->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
