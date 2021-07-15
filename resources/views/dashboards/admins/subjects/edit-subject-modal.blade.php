<div class="modal fade editSubject" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Edit Subject</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="update-subject-form" >
          @csrf
          {{-- @method('PATCH') --}}
          <input type="hidden" name="cid">
          <div class="form-group">
            <label for="" class="">Abbreviation</label>
            <input class="form-control @error('subject_abbreviation') border-red-accent @enderror" type="text" name="subject_abbreviation" placeholder="Enter Abbreviation">
            <small class="text-danger error-text subject_abbreviation_error"></small>
          </div>

          <div class="form-group">
            <label for="" class="">Title</label>
            <input class="form-control @error('subject_title') border-red-accent @enderror" type="text" name="subject_title"  placeholder="Enter Title"></input>
            <small class="text-danger error-text subject_title_error"></small>

          </div>
          <div class="form-group">
            <label for="" class="">Unit</label>
            <input class="form-control @error('subject_unit') border-red-accent @enderror" type="number" name="subject_unit"  placeholder="Enter Unit"></input>
            <small class="text-danger error-text subject_unit_error"></small>

          </div>
          <div class="form-group">
            <label for="" class="">Description</label>
            <input class="form-control @error('subject_description') border-red-accent @enderror" type="text" name="subject_description"  min="1" max="4"  placeholder="Enter Description"></input>
            <small class="text-danger error-text subject_description_error"></small>

          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-block bg-red-accent mt-3">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
