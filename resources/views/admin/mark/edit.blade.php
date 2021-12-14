@extends('layouts.admin.app')
@section('content')
<div class="container">
  <h4>Create Student Mark</h4>
  <div class="row">
    <form action="{{route('studentMark.update',$mark->id)}}" method="POST" id="form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="_method" value="PUT" />
      <div class="row col-md-6">
        <div class="col-md-12">
          <div class="form-group">
            <label for="name">Student</label>
            <select class="form-control required" name="student">
              <option value="">--Select--</option>
              @foreach($students as $student)
              <option value="{{$student->id}}" {{($student->id==$mark->student->id)?'selected="selected"':''}}>{{$student->name}}</option>
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
              <option value="{{$term->id}}" {{($term->id==@$mark->term->id)?'selected="selected"':''}}>{{@$term->name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-md-12 mt-5">
          <table class="table table-striped table-bordered" id="field">
            <thead>
              <th>Subject</th>
              <th>Mark</th>
            </thead>
            <tbody id="result">
              <?php
              $total = 0;
              ?>
              @foreach($subjects as $subject)
              <?php
              $bool=false;
              ?>
              <tr>
                <td>{{$subject->name}}<input type="hidden" name="subject[]" value="{{$subject->id}}" /></td>
                @foreach($mark->mark as $markVal)
                @if($subject->id == $markVal->subject_id)
                <?php
                $bool = true;
                $total += $markVal->mark;
                ?>
                <td><input type="number" name="mark[]" min="0" max="100" value="{{$markVal->mark}}" class="form-control mark_calculation required" required /></td>
              </tr>
              @endif
              @endforeach
              @if($bool == false)
              <td><input type="number" name="mark[]" min="0" max="100" value="" class="form-control mark_calculation required" required /></td>
              @endif
              @endforeach
              <tr>
                <td>Total Marks</td>
                <td id="total_marks">{{$total}}</td>
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