<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Management</title>
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
</head>
<style>
  .header-menu {
    margin-top: 20px;
    margin-bottom: 20px;
  }

  .bill-basic-details {
    padding-top: 10px;
  }

  .grant-total {
    display: inline;
  }
  .col-md-12{
    margin-top: 10px;
  }
</style>

<body>
  <div class="container">
    <div class="row">
      <div class="header-menu">
        <a href="{{route('student.create')}}" class="btn btn-primary">Add Student</a>
        <a href="{{route('student.index')}}" class="btn btn-primary">List Student</a>
        <a href="{{route('studentMark.create')}}" class="btn btn-primary">Add Student Mark</a>
        <a href="{{route('studentMark.index')}}" class="btn btn-primary">List Student Mark</a>
      </div>
    </div>
    <div class="row">
      @if(session()->has('success'))
      <div class="col-md-12 alert alert-success">
        {{ session()->get('success') }}
      </div>
      @endif
      @if(session()->has('error'))
      <div class="col-md-12 alert alert-danger">
        {{ session()->get('error') }}
      </div>
      @endif
      @if ($errors->any())
      <div class="col-md-12 alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
    </div>
  </div>
  @yield('content')
</body>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/jquery.validate.min.js')}}"></script>
<script>
  $(document).ready(function() {
    $(".mark_calculation").on("input", function() {
      let sum = 0;
      $('.mark_calculation').each(function() {
        if ($(this).val()) {
          sum += parseFloat($(this).val());
        }
      });
      $('#total_marks').html(sum);
    });
    $('#form').validate({
      ignore: [],
      debug: false,
      rules: {
        name: {
          required: true
        }
      },
      messages: {

      },
      errorElement: 'span',
      errorPlacement: function(error, element) {
        error.addClass('invalid-feedback');
        element.closest('.form-group').append(error);
      },
      highlight: function(element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function(element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
  });
</script>

</html>