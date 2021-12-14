@extends('layouts.admin.app')
@section('content')
<div class="container">
  <h4>Create Student</h4>
  <div class="row">
    <form action="{{route('student.store')}}" method="POST" id="form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="POST" />
      <div class="row col-md-6">
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control required" name="name" value="{{old('name')}}" id="name" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="age">Age</label>
            <input type="number" class="form-control required" name="age" min="0" max="100" value="{{old('age')}}" id="age" />
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="gender">Gender</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="radio1" name="gender" value="Male" checked>
              <label class="form-check-label" for="radio1">Male</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" id="radio1" name="gender" value="Female">
              <label class="form-check-label" for="radio1">Female</label>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="teacher">Reporting Teacher</label>
            <select class="form-control required" name="teacher">
              <option value="">--Select--</option>
              @foreach($teachers as $teacher)
                <option value="{{$teacher->id}}">{{$teacher->name}}</option>
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