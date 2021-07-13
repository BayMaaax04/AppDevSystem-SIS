<div class="modal addCourses" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Add New Course</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="add-course-form">
          @csrf
          <div class="form-group">
            <label for="" class="">Abbreviation</label>
            <input class="form-control" type="text" name="course_abbreviation" id="course_abbreviation" placeholder="Enter Abbreviation">
            <small class="text-danger error-text course_abbreviation_error"></small>
            {{-- @error('professor_name')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror --}}
          </div>

          <div class="form-group">
            <label for="" class="">Title</label>
            <input class="form-control" type="text" name="course_title" id="course_titles" placeholder="Enter Title"></input>
            <small class="text-danger error-text course_title_error"></small>
            {{-- @error('professor_email')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror --}}
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-block bg-red-accent mt-3">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
