<div class="modal fade editSubject" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
          <div class="flex w-full justify-between">
            <div class="form-group flex-1">
              <label for="" class="">Abbreviation</label>
              <input class="form-control @error('subject_abbreviation') border-red-accent @enderror" type="text" name="subject_abbreviation" placeholder="Enter Abbreviation">
              <small class="text-danger error-text subject_abbreviation_error"></small>
            </div>
            <div class="form-group ml-2">
              <label for="" class="">Unit</label>
              <input class="form-control @error('subject_unit') border-red-accent @enderror" type="number" name="subject_unit"  placeholder="Enter Unit"></input>
              <small class="text-danger error-text subject_unit_error"></small>
            </div>
          </div>

          <div class="form-group">
            <label for="" class="">Title</label>
            <input class="form-control @error('subject_title') border-red-accent @enderror" type="text" name="subject_title"  placeholder="Enter Title"></input>
            <small class="text-danger error-text subject_title_error"></small>

          </div>

          <div class="form-group">
            <label for="" class="">Description</label>
            <input class="form-control @error('subject_description') border-red-accent @enderror" type="text" name="subject_description"  min="1" max="4"  placeholder="Enter Description"></input>
            <small class="text-danger error-text subject_description_error"></small>
          </div>
          {{-- <div class="modal-footer"> --}}

          <div class="col">
            <div class="form-group">
              <label class="">Professor
              </label>
              <select class="prof-picker" name="professor" style="width: 100%" >
                <option value="disable" disabled selected>Select a Professor</option>
                  @foreach($professors as $professor)
                    <option value="{{ $professor->id }}" id="{{ $professor->id }}">{{ $professor->professor_name }}</option>
                  @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="" class="">Days of the week</label>
              <select class="day_of_week" id="day_of_week" name="day_of_week[]" multiple="true" style="width: 100%">
                <option value="Mon" {{ old('day_of_week') == "Mon" ? "selected" : "" }}>Monday</option>
                <option value="Tue">Tuesday</option>
                <option value="Wed">Wednesday</option>
                <option value="Thurs">Thursday</option>
                <option value="Fri">Friday</option>
                <option value="Sat">Saturday</option>
              </select>
            </div>

            <div class="mt-4 flex justify-around w-full">
              <div class="col">
                <label for="" class="">Start Time</label>
                <input name="start_time" type="date" class="border p-2" id="startTime">
              </div>
              <div class="col">
                <label for="" class="">End Time</label>
                <input name="end_time" type="date" class="border p-2" id="endTime">
              </div>
            </div>
          </div>
        </div>
          <div class="form-group">
            <button type="submit" class="btn btn-block bg-red-accent mt-3">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
