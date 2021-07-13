<div class="modal fade editProfessor" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Edit Professor</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="update-professor-form" >
          @csrf
          {{-- @method('PATCH') --}}
          <input type="hidden" name="cid">
          <div class="form-group">
            <label for="" class="">Name</label>
            <input class="form-control @error('professor_n') border-red-accent @enderror" type="text" name="professor_n" placeholder="Enter name">
            <small class="text-danger error-text professor_n_error"></small>
            {{-- @error('professor_n')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror --}}
          </div>

          <div class="form-group">
            <label for="" class="">Email:</label>
            <input class="form-control @error('professor_e') border-red-accent @enderror" type="text" name="professor_e" id="professor_e" placeholder="Enter email"></input>
            <small class="text-danger error-text professor_e_error"></small>
            @error('professor_e')
            <p class="text-red-500 text-xs italic mt-4">
                {{ $message }}
            </p>
            @enderror
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-block bg-red-accent mt-3">Save Changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
