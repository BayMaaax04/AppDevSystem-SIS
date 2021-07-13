<div class="modal fade editCourse" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Edit Course</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="update-course-form" >
          @csrf
          {{-- @method('PATCH') --}}
          <input type="hidden" name="cid">
          <div class="form-group">
            <label for="" class="">Course</label>
            <input class="form-control @error('course_abbreviation') border-red-accent @enderror" type="text" name="course_abbreviation" placeholder="Enter Course">
            <small class="text-danger error-text course_abbreviation_error"></small>
          </div>

          <div class="form-group">
            <label for="" class="">Title</label>
            <input class="form-control @error('course_title') border-red-accent @enderror" type="text" name="course_title" id="course_title" placeholder="Enter Title"></input>
            <small class="text-danger error-text course_title_error"></small>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-block bg-red-accent mt-3">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
