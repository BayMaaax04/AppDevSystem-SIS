@extends('dashboards.admins.admin_layouts.admin-nav')

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
                  <a class="navbar-brand ml-4" href="javascript:;">Professors List</a>
              </div>
              <button class="btn btn-sm mr-4 sm:mr-2 bg-red-accent hover:border-red-800 mx-2 absolute right-0" id="addProfessorBtn">add professor</button>
          </div>

          
          

          <div class="col">
              <div class="mt-4">
                  <div class="lg:px-4">
                      <table class="display nowrap uk-table uk-table-hover uk-table-striped" id="professor_table" style="width: 100%">
                        <thead class="text-red-accent">
                            <th>#</th>
                            <th>Name</th>
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
@include('dashboards.admins.professors.add-professor-modal')
@include('dashboards.admins.professors.edit-professor-modal')


@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({
                headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            });
            // Add new professor
            $('#add-professor-form').on('submit', function(e){
                e.preventDefault();
                let form = this;
                let datas = new FormData(form);
                $.ajax({
                    url:'/administrator/add_professor',
                    method:'POST',
                    data:{
                        professor_name: $(this).find('input[name="professor_name"]').val(),
                        professor_email: $(this).find('input[name="professor_email"]').val()
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
                            $('#professor_table').DataTable().ajax.reload(null,false);
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
                            $('.addProfessor').modal('hide');
                        }
                    }
                })
                
            });

            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            // Update professor details
            $(document).on('submit', '#update-professor-form', function(e){
               e.preventDefault();
               let form = this;
                // let datas = new FormData(form);
                const data = {
                    cid: $(this).find('input[name="cid"]').val(),
                    professor_n: $(this).find('input[name="professor_n"]').val(),
                    professor_e: $(this).find('input[name="professor_e"]').val()
                }
                $.ajax({
                    url:'/administrator/update_professors_details',
                    // method:$(form).attr('method'),
                    type:'POST',
                    // method:"PATCH",
                    data:{
                        "_token": "{{ csrf_token() }}",
                        cid:$(this).find('input[name="cid"]').val(),
                        professor_n: $(this).find('input[name="professor_n"]').val(),
                        professor_e: $(this).find('input[name="professor_e"]').val()
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
                            $('.editProfessor').modal('hide');
                            $('.editProfessor').find('form')[0].reset();
                            // location.reload();
                            $('#professor_table').DataTable().ajax.reload(null,false);
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
            $(document).on('click','#deleteProfessorBtn', function(){
                const professorid = $(this).data('id');
                const url = "{{ route('delete.professor.detail') }}" ;

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
                        $.post(url,{id:professorid}, function(data){
                            if(data.code ==1){
                                $('#professor_table').DataTable().ajax.reload(null, false);
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
            


            var professorTable = $('#professor_table').DataTable({
                "processing":true,
                "serverSide":true,
                responsive: true,
                "ajax":"{{ route('get.professor.list') }}",
                "pageLength":10,
                "aLengthMenu":[[10,25,50,-1],[10,25,50,"All"]],
                "columns":[
                    {"data": "DT_RowIndex", "name": "DT_RowIndex"},
                    {"data": "professor_name", "name": "professor_name"},
                    {"data": "professor_email", "name": "professor_email"},
                    {"data": "actions", "name": "actions"},
                ]

            });
            new $.fn.dataTable.FixedHeader( professorTable );

            $(document).on('click', '#addProfessorBtn', function(){
                $('.addProfessor').modal('show');
            });

            $(document).on('click', '#editProfessorBtn', function(){
                const professorid = $(this).data('id');
                $('.editProfessor').find('form')[0].reset();
                $('.editProfessor').find('span.error-text').text('');

                $.post("{{ route('get.professor.detail') }}",{id:professorid},function(data){
                    $('.editProfessor').find('input[name="cid"]').val(data.details.id);
                    $('.editProfessor').find('input[name="professor_n"]').val(data.details.professor_name);
                    $('.editProfessor').find('input[name="professor_e"]').val(data.details.professor_email);
                    $('.editProfessor').modal('show');
                },'json')
            });


            
        });
    </script>
@endsection