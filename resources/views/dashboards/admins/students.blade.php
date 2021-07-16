@extends('dashboards.admins.admin_layouts.admin-nav')

@section('title')
  PUP Student Portal | Students  
@endsection

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
              <div class="lg:mt-2">
                  <div class="lg:px-4">
                      <table class="display nowrap uk-table uk-table-hover uk-table-striped" id="student_table" style="width: 100%">
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
    var studentTable = $('#student_table').DataTable({
      dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
      "processing":true,
      // info:true,
      "serverSide":true,
      responsive: true,
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
    new $.fn.dataTable.FixedHeader( studentTable );

// Get all details of student
    $(document).on('click', '#viewStudentBtn', function(e){
      const studentid = $(this).data('id');
      $.get("{{ route('get.student.detail') }}",{id:studentid},function(data){
          // alert(data.details.firstname);
          $('.viewStudent').find('form')[0].reset();
          $('.viewStudent').find('input[name="cid"]').val(data.details.id);
          $('.viewStudent').find('span[name="lastname"]').text(data.details.lastname);
          $('.viewStudent').find('span[name="firstname"]').text(data.details.firstname);
          $('.viewStudent').find('span[name="middlename"]').text(data.details.middlename[0]);
          $('.viewStudent').find('iframe[name="picture"]').attr('src',data.details.picture);
          $('.viewStudent').find('span[name="email"]').text(data.details.email);
          $('.viewStudent').find('span[name="gender"]').text(data.details.gender);
          $('.viewStudent').find('span[name="civil_status"]').text(data.details.civil_status);
          $('.viewStudent').find('span[name="birthday"]').text(data.details.birthday);
          $('.viewStudent').find('span[name="birthplace"]').text(data.details.birthplace);
          $('.viewStudent').find('span[name="religion"]').text(data.details.religion);
          $('.viewStudent').find('span[name="nationality"]').text(data.details.nationality);
          $('.viewStudent').find('span[name="address"]').text(data.details.address);
          $('.viewStudent').find('span[name="city"]').text(data.details.city);
          $('.viewStudent').find('span[name="province"]').text(data.details.province);
          $('.viewStudent').find('span[name="zipcode"]').text(data.details.zipcode);
          $('.viewStudent').find('span[name="guardianName"]').text(data.details.guardianName);
          $('.viewStudent').find('span[name="guardianNumber"]').text(data.details.guardianNumber);
          $('.viewStudent').find('span[name="guardianEmail"]').text(data.details.guardianEmail);
          $('.viewStudent').find('span[name="guardianAddress"]').text(data.details.guardianAddress);

          $('.viewStudent').modal('show');
        },'json');

    });

    // delete student record
    $(document).on('click', '#deleteStudentBtn', function(e){
      const studentid = $(this).data('id');
      const url = "{{ route('delete.student') }}";

      Swal.fire({
        title: 'Are you sure?',
        html: 'Do you want to <b>delete</b> this profile',
        showCancelButton: true,
        showCloseButton: true,
        cancelButtonText: 'Cancel',
        confirmButtonText: 'Yes, Delete',
        cancelButtonColor: '#d33',
        confirmButtonColor: '#2E8B57',
        allowOutsideClick:false,
      }).then(function(result){
        if(result.value){
          $.post(url,{id:studentid}, function(data){
            if(data.code ==1){
              $('#student_table').DataTable().ajax.reload(null, false);
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top',
                  width:500,
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
              })

              Toast.fire({
                  icon: 'success',
                  title: data.msg
              })
            }else{
              const Toast = Swal.mixin({
                  toast: true,
                  position: 'top',
                  width:500,
                  showConfirmButton: false,
                  timer: 3000,
                  timerProgressBar: true,
              })

              Toast.fire({
                  icon: 'error',
                  title: data.msg
              })
            }
          })
        }
      });
    });
  });
</script>
@endsection
