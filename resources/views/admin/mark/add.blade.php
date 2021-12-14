@extends('layouts.admin.app')
@section('content')
<div class="container">
  <h4>Create Student Mark</h4>
  <div class="row">
    <form action="{{route('studentMark.store')}}" method="POST" id="form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="POST" />
      <div class="row col-md-6">
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Student</label>
            <select class="form-control required" name="student">
              <option value="">--Select--</option>
              @foreach($students as $student)
                <option value="{{$student->id}}">{{$student->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Term</label>
            <select class="form-control required" name="term">
              <option value="">--Select--</option>
              @foreach($terms as $term)
                <option value="{{$term->id}}">{{$term->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12 mt-5">
                    <table class="table table-striped table-bordered" id="field">
                        <thead>
                            <th>Subject</th>
                            <th>Mark</th>
                            <th>
                            </th>
                        </thead>
                        <tbody id="result">
                            @foreach($subjects as $subject)
                            <tr>
                                <td>{{$subject->name}}<input type="hidden" name="subject[]" value="{{$subject->id}}"/></td>
                                <td><input type="number" name="mark[]" min="0" max="100" class="form-control mark_calculation required" required/></td>
                            </tr>
                            @endforeach
                            <tr>
                              <td>Total Marks</td>
                              <td id="total_marks"></td>
                            </tr>
                        </tbody>
                    </table>
</div>
        <div class="col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection