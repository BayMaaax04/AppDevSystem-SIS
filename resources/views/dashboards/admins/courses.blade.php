@extends('dashboards.admins.admin_layouts.admin-nav')

@section('title')
  PUP Student Portal | Courses 
@endsection

@section('content')
<main class="main-panel">
    <div class="w-full">

        {{-- @if (session('status'))
            <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
                {{ session('status') }}
            </div>
        @endif --}}

        <div class="content main-content">
          <div class="container-fluid py-3 relative">
              <div class="navbar-wrapper">
                  <a class="navbar-brand ml-4" href="javascript:;">Course List</a>
              </div>
              <button class="btn btn-sm mr-4 sm:mr-2 bg-red-accent hover:border-red-800 mx-2 absolute right-0" id="addCourseBtn">add new course</button>
          </div>

          
          

          <div class="col">
              <div class="mt-4">
                  <div class="lg:px-4">
                      <table class="display nowrap uk-table uk-table-hover uk-table-striped" id="course_table" style="width: 100%">
                        <thead class="text-red-accent">
                            <th>#</th>
                            <th>Course</th>
                            <th>Title</th>
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
@include('dashboards.admins.courses.add-courses-modal')
@include('dashboards.admins.courses.edit-courses-modal')

@endsection


@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){

        $.ajaxSetup({
            headers:{
            'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        });

        // Add new course
        $('#add-course-form').on('submit', function(e){
            e.preventDefault();
            let form = this;
            let datas = new FormData(form);
            $.ajax({
                url:'/administrator/add_course',
                method:'POST',
                data:{
                    course_abbreviation: $(this).find('input[name="course_abbreviation"]').val(),
                    course_title: $(this).find('input[name="course_title"]').val()
                },
                beforeSend:function(){
                    $(form).find('small.error-text').text('');
                },
                success:function(data){
                    console.log(data);
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('small.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $(form)[0].reset();
                        $('#course_table').DataTable().ajax.reload(null,false);
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
                        $('.addCourses').modal('hide');
                    }
                }
            })
            
        });

        // Update professor details
        $(document).on('submit', '#update-course-form', function(e){
            e.preventDefault();
            let form = this;
            // let datas = new FormData(form);
            const data = {
                cid: $(this).find('input[name="cid"]').val(),
                course_abbreviation: $(this).find('input[name="course_abbreviation"]').val(),
                course_title: $(this).find('input[name="course_title"]').val()
            }
            $.ajax({
                url:'/administrator/update_courses_details',
                // method:$(form).attr('method'),
                type:'POST',
                // method:"PATCH",
                data:{
                    "_token": "{{ csrf_token() }}",
                    cid:$(this).find('input[name="cid"]').val(),
                    course_abbreviation: $(this).find('input[name="course_abbreviation"]').val(),
                    course_title: $(this).find('input[name="course_title"]').val()
                    },
                beforeSend:function(){
                    $(form).find('small.error-text').text('');
                },
                success:function(data){
                    console.log(data);
                    if(data.code == 0){
                        $.each(data.error, function(prefix, val){
                            $(form).find('small.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        $('.editCourse').modal('hide');
                        $('.editCourse').find('form')[0].reset();
                        // location.reload();
                        $('#course_table').DataTable().ajax.reload(null,false);
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
                        
                        
                    }
                }
            });
        });


        // Delete Professor record
        $(document).on('click','#deleteCourseBtn', function(){
            const courseid = $(this).data('id');
            const url = "{{ route('delete.course.detail') }}" ;

            Swal.fire({
                title: 'Are you sure?',
                html: 'Do you want to <b>delete</b> this course',
                showCancelButton: true,
                showCloseButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Yes, Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#2E8B57',
                allowOutsideClick:false,
            }).then(function(result){
                if(result.value){
                    $.post(url,{id:courseid}, function(data){
                        if(data.code ==1){
                            $('#course_table').DataTable().ajax.reload(null, false);
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
                    },'json');
                }

            })
        })


        var courseTable = $('#course_table').DataTable({
                "processing":true,
                "serverSide":true,
                responsive: true,
                "ajax":"{{ route('get.course.list') }}",
                "pageLength":10,
                "aLengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
                "columns":[
                    {"data": "DT_RowIndex", "name": "DT_RowIndex"},
                    {"data": "course_abbreviation", "name": "course_abbreviation"},
                    {"data": "course_title", "name": "course_title"},
                    {"data": "actions", "name": "actions"},
                ]
            });
            new $.fn.dataTable.FixedHeader( courseTable );

    });

    $(document).on('click', '#addCourseBtn', function(){
        $('.addCourses').modal('show');
    });

    $(document).on('click', '#editCourseBtn', function(){
        const courseid = $(this).data('id');
        $('.editCourse').find('form')[0].reset();
        $('.editCourse').find('span.error-text').text('');

        $.post("{{ route('get.course.detail') }}",{id:courseid},function(data){
            $('.editCourse').find('input[name="cid"]').val(data.details.id);
            $('.editCourse').find('input[name="course_abbreviation"]').val(data.details.course_abbreviation);
            $('.editCourse').find('input[name="course_title"]').val(data.details.course_title);
            $('.editCourse').modal('show');
        },'json')
    });


</script>
@endsection