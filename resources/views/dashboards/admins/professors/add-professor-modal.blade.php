<div class="modal addProfessor" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Add New Professor</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="add-professor-form">
          @csrf
          <div class="form-group">
            <label for="" class="">Name</label>
            <input class="form-control" type="text" name="professor_name" id="professor_name" placeholder="Enter name">
            <small class="text-danger error-text professor_name_error"></small>
            {{-- @error('professor_name')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror --}}
          </div>

          <div class="form-group">
            <label for="" class="">Email:</label>
            <input class="form-control" type="text" name="professor_email" id="professor_email" placeholder="Enter email"></input>
            <small class="text-danger error-text professor_email_error"></small>
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
