@extends('layouts.admin.app')
@section('content')
<div class="container">
  <div class="row">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Student</th>
          @foreach($subjects as $subject)
          <th>{{$subject->name}}</th>
          @endforeach
          <th>Term</th>
          <th>Total Marks</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @if(count($marks)>0)
        @foreach($marks as $mark)
        <?php
        $total = 0;
        ?>
        <tr>
          <td>{{@$mark->student->name}}</td>
          @foreach($subjects as $subject)
          <?php
          $bool = false;
          ?>
          @foreach($mark->mark as $markVal)
          @if($subject->id == $markVal->subject_id)
          <td>{{$markVal->mark}}</td>
          <?php
          $bool = true;
          $total += $markVal->mark;
          ?>
          @endif
          @endforeach
          @if($bool == false)
          <td></td>
          @endif
          @endforeach
          <td>{{$mark->term->name}}</td>
          <td>{{$total}}</td>
          <td><a href="{{url('studentMark/'.$mark->id.'/edit')}}">Edit</a>
            &nbsp;&nbsp;
            <a href="{{url('studentMark/delete/'.$mark->id)}}">Delete</a>
          </td>
        </tr>
        @endforeach
        @else
        <td colspan="5" class="text-center">
          <h4>No Details Available!!!<h4>
        </td>
        @endif
      </tbody>
    </table>
  </div>
</div>
@endsection