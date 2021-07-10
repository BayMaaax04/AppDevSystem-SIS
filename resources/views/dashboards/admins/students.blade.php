@extends('dashboards.admins.admin_layouts.admin-nav')

@section('styles')
{{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css"> --}}
@endsection

@section('content')
<main class="main-panel">
    <div class="w-full">

        @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <div class="content main-content">
          <div class="container-fluid py-3">
              <div class="navbar-wrapper">
                  <a class="navbar-brand ml-4" href="javascript:;">Student List</a>
              </div>
          </div>
          <div class="col">
              <div class="mt-2">
                  <div class="table-responsive px-4">
                      <table class="uk-table uk-table-hover uk-table-striped w-full " id="student_table" >
                        <thead class="text-red-accent">
                            <th>#</th>
                            <th>Lastname</th>
                            <th>Firstname</th>
                            <th>Middlename</th>
                            {{-- <th>Gender</th> --}}
                            <th>Email</th>
                            <th>Actions</th>
                          </thead>
                          <tbody>
                          </tbody>
                            {{-- @foreach ($students as $student)
                            <tr>
                              <td> {{ $student->firstname}} </td>
                              <td> {{ $student->gender}} </td>
                              <td> {{ $student->email}} </td>
                            </tr>
                            @endforeach --}}
                      </table>
                  </div>
              </div>
            </div>
        </div>
    </div>
</main>

@include('dashboards.admins.students.view-student-modal')

@endsection

@section('scripts')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
{{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script> --}}


<script type="text/javascript">
  // Get all students
  $(document).ready(function(){
    $('#student_table').DataTable({
      "processing":true,
      // info:true,
      "serverSide":true,
      "ajax":"{{ route('get.student.list') }}",
      "pageLength":10,
      "aLengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
      "columns":[
        {"data": "DT_RowIndex", "name": "DT_RowIndex"},
        {"data": "lastname", "name": "lastname"},
        {"data": "firstname", "name": "firstname"},
        {"data": "middlename", "name": "middlename"},
        // {"data": "gender", "name": "gender"},
        {"data": "email", "name": "email"},
        {"data": "actions", "name": "actions"},
      ]

    });

    $(document).on('click', '#viewStudentBtn', function(e){
      const studentid = $(this).data('id');
      $.get("{{ route('get.student.detail') }}",{id:studentid},function(data){
          // alert(data.details.firstname);
          
          $('.viewStudent').find('input[name="cid"]').val(data.details.id);
          $('.viewStudent').find('span[name="lastname"]').text(data.details.lastname);
          $('.viewStudent').find('span[name="firstname"]').text(data.details.firstname);
          $('.viewStudent').find('span[name="middlename"]').text(data.details.middlename);

          $('.viewStudent').modal('show');
        },'json');

    });
  });
</script>
@endsection
