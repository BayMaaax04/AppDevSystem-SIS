@extends('dashboards.admins.admin_layouts.admin-nav')

@section('title')
  PUP Student Portal | Subjects  
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
                <a class="navbar-brand ml-4" href="javascript:;">Subjects List</a>
            </div>
            <button class="btn btn-sm mr-4 sm:mr-2 bg-red-accent hover:border-red-800 mx-2 absolute right-0" id="addSubjectBtn" >add new subject</button>
        </div>

      
          <div class="col">
            <div class="mt-4">
                <div class="lg:px-4 mt-4">
                  <div class="text-red-accent px-2">
                    <h5 class="text-uppercase font-normal text-gray-500" style="font-size: 0.875rem;">Courses</h5>
                  </div>
                    <div class="d-flex align-items-start">
                      <div class="nav flex-column nav-pills mt-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        @foreach ($courses as $course)
                          <button data-course-id="{{ $course->id }}" class="nav-link {{ $loop->first ? 'active' : '' }}" id="v-pills-{{ $course->id }}-tab" data-bs-toggle="pill" data-bs-target="#v-pills-{{ $course->id }}" type="button" role="tab" aria-controls="v-pills-{{ $course->id }}" aria-selected="true">{{ $course->course_abbreviation }}</button>
                        @endforeach
                      </div>

                      <div class="tab-content ml-5 w-full border p-3" id="v-pills-tabContent">
                        @foreach($courses as $course)
                            
                          <div class="tab-pane fade show w-full {{ $loop->first ? 'active' : '' }} table-responsive" id="v-pills-{{ $course->id }}" role="tabpanel" aria-labelledby="v-pills-{{ $course->id }}-tab">
                            
                            <table class="display nowrap uk-table uk-table-hover uk-table-striped subject_tables responsive" id="subject_table_{{$course->id}}" style="width: 100%">
                              <thead class="text-red-accent">
                                <tr>
                                  <th>Subject</th>
                                  <th>Title</th>
                                  <th>Unit</th>
                                  <th>Description</th>
                                  <th>Professor</th>
                                  <th>Day of the week</th>
                                  <th>Start Time</th>
                                  <th>End Time</th>
                                  <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                  @foreach($course->subjects as $subject)
                                  <tr>
                                    <td> {{ $subject->subject_abbreviation}} </td>
                                    <td> {{ $subject->subject_title}} </td>
                                    <td> {{ $subject->subject_unit}} </td>
                                    <td> {{ $subject->subject_description}} </td>
                                    <td>
                                      @foreach($subject->professors as $prof)
                                      {{$prof->professor_name}} @if(!$loop->last),@endif
                                      @endforeach
                                    </td>
                                    <td> {{ $subject->day_of_week }} </td>
                                    <td> {{ $subject->start_time}} </td>
                                    <td> {{ $subject->end_time}} </td>
                                    <td>
                                        <button data-id="{{$subject->id}}" data-placement="bottom" id="editSubjectBtn"><i class="material-icons text-warning mr-2">edit</i></button>

                                        <button data-id="{{$subject->id}}" data-placement="bottom" id="deleteSubjectBtn"><i class="material-icons text-danger" >delete</i></button>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        
                          </div>
                        @endforeach

                      </div>
                    </div>
                </div>
            </div>
          </div>

        </div>
        
      </div>
  </div>
</main>
@include('dashboards.admins.subjects.add-subject-modal')
@include('dashboards.admins.subjects.edit-subject-modal')

@endsection

@section('scripts')
<script type="text/javascript">
  $(document).ready(function(){
      $.ajaxSetup({
          headers:{
          'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
          }
      });
      const subjectTables = document.querySelectorAll('.subject_tables');

      $("#day_of_week option:selected").text()

      subjectTables.forEach((item)=>{
        const data = $(`#${item.id}`).DataTable({
          responsive: true
        });
        new $.fn.dataTable.FixedHeader(data);
      })
     
      
      $('.day_of_week').select2({
        placeholder: "Select the Working Days",
        tags: true,
        tokenSeparators: ['/',',',','," "],
        dropdownParent: $('.editSubject')
      });

      $('.prof-picker').select2({
        placeholder: "Select the Working Days",
      });

      flatpickr("#startTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
      });
      flatpickr("#endTime", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
      });
  });

  // Add new subject
  $('#add-subject-form').on('submit', function(e){
    e.preventDefault();
    let form = this;
    let datas = new FormData(form);

    $.ajax({
        url:'/administrator/add_subject',
        method:'POST',
        data:{
            course_id: $(this).find('input[name="course_id"]').val(),
            subject_abbreviation: $(this).find('input[name="subject_abbreviation"]').val(),
            subject_title: $(this).find('input[name="subject_title"]').val(),
            subject_unit: $(this).find('input[name="subject_unit"]').val(),
            subject_description: $(this).find('input[name="subject_description"]').val()
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
                $('.addSubject').modal('hide');
                setTimeout(function(){
                  location.reload();
                },1500)
            }
        }
    })
    
  });



  $(document).on('click', '#addSubjectBtn', function(){
      const cour = $('.nav-link.active').attr('data-course-id');
      $('#selected_course').val(cour);
      $('.addSubject').modal('show');
  });

  // Edit subject
  $(document).on('click', '#editSubjectBtn', function(){
      const subjectid = $(this).data('id');
      $('.editSubject').find('form')[0].reset();
      $('.editSubject').find('span.error-text').text('');
     

      $.post("{{ route('get.subject.detail') }}",{id:subjectid},function(data){
          $('.editSubject').find('input[name="cid"]').val(data.details.id);
          $('.editSubject').find('input[name="subject_abbreviation"]').val(data.details.subject_abbreviation);
          $('.editSubject').find('input[name="subject_title"]').val(data.details.subject_title);
          $('.editSubject').find('input[name="subject_unit"]').val(data.details.subject_unit);
          $('.editSubject').find('input[name="subject_description"]').val(data.details.subject_description);
          $('.editSubject').find('select[name="professor"]').val(data.details.professor);
          $('.editSubject').find('input[name="start_time"]').val(data.details.start_time);
          $('.editSubject').find('input[name="end_time"]').val(data.details.end_time);
          $('.editSubject').find('select[name="day_of_week[]"]').val(data.details.day_of_week);
;
          $('.editSubject').modal('show');
      },'json')
  });


  // Update professor details
  $(document).on('submit', '#update-subject-form', function(e){
    e.preventDefault();
    let form = this;
 
   
    const data = $(this).find('select[name="professor"]').val()
            
    // console.log(data);
    // return;

    $.ajax({
        url:'/administrator/update_subjects_details',
        // method:$(form).attr('method'),
        type:'POST',
        // method:"PATCH",
        data:{
            "_token": "{{ csrf_token() }}",
            cid:$(this).find('input[name="cid"]').val(),
            subject_abbreviation: $(this).find('input[name="subject_abbreviation"]').val(),
            subject_title: $(this).find('input[name="subject_title"]').val(),
            subject_unit: $(this).find('input[name="subject_unit"]').val(),
            subject_description: $(this).find('input[name="subject_description"]').val(),
            start_time: $(this).find('input[name="start_time"]').val(),
            end_time: $(this).find('input[name="end_time"]').val(),
            day_of_week: $(this).find('select[name="day_of_week[]"]').val().toString(),
            professor:$(this).find('select[name="professor"]').val()
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
                $('.editSubject').modal('hide');
                $('.editSubject').find('form')[0].reset();
                // location.reload();
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
                setTimeout(function(){
                  location.reload();
                },1500)
            }
        }
    });
  });


    // Delete Professor record
    $(document).on('click','#deleteSubjectBtn', function(){
      const subjectid = $(this).data('id');
      const url = "{{ route('delete.subject.detail') }}" ;

      Swal.fire({
          title: 'Are you sure?',
          html: 'Do you want to <b>delete</b> this subject',
          showCancelButton: true,
          showCloseButton: true,
          cancelButtonText: 'Cancel',
          confirmButtonText: 'Yes, Delete',
          cancelButtonColor: '#d33',
          confirmButtonColor: '#2E8B57',
          allowOutsideClick:false,
      }).then(function(result){
          if(result.value){
              $.post(url,{id:subjectid}, function(data){
                  if(data.code ==1){
                      // $('#table_subject').DataTable().ajax.reload(null, false);
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
                      setTimeout(function(){
                        location.reload();
                      },1500)
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

</script>
@endsection