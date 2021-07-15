<div class="modal addSubject" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">New Subject</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="add-subject-form">
          @csrf
          <input type="hidden" name="course_id" id='selected_course'>
          <div class="flex w-full justify-between">

            <div class="form-group flex-1">
              <label for="" class="">Abbreviation</label>
              <input class="form-control" type="text" name="subject_abbreviation" id="subject_abbreviation" placeholder="Enter Abbreviation">
              <small class="text-danger error-text subject_abbreviation_error"></small>
            </div>
            <div class="form-group  ml-3">
              <label for="" class="">Unit</label>
              <input class="form-control" type="number" name="subject_unit" id="subject_unit" placeholder="Unit"  min="1" max="4"></input>
              <small class="text-danger error-text subject_unit_error"></small>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="">Title</label>
            <input class="form-control" type="text" name="subject_title" id="subject_title" placeholder="Enter Title"></input>
            <small class="text-danger error-text subject_title_error"></small>
          </div>
          <div class="form-group">
            <label for="" class="">Description</label>
            <input class="form-control" type="text" name="subject_description" id="subject_description" placeholder="Enter Description"></input>
            <small class="text-danger error-text subject_description_error"></small>
          </div>

 
          <div class="form-group">
            <button type="submit" class="btn btn-block bg-red-accent mt-3">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
