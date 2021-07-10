<div class="modal fade viewStudent" tabindex="-1" role="dialog" aria-labelledby="studentModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="studentModalLabel">Student Profile</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="">
          <input type="hidden" name="cid">
          <div class="form-group flex items-center justify-content-center ">
            {{-- <label for="" class="">Email:</label> --}}
            <div style="200px; height:200px; overflow:hidden; padding: 0;"  >
              <iframe frameborder="0" scrolling="no" border="0" cellspacing="0" name="picture" id="picture" allowfullscreen style="border-style: none; width:200px; height: 200px; " ></iframe>
            </div>
          </div>
          <div class="form-group">
            <label for="" class="">Name:</label>
            <span name="firstname" id="firstname"></span>
            <span name="middlename" id="middlename"></span>
            <span name="lastname" id="lastname"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Email:</label>
            <span name="email" id="email"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Gender:</label>
            <span name="gender" id="gender"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Civil Status:</label>
            <span name="civil_status" id="civil_status"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Birthday:</label>
            <span name="birthday" id="birthday"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Birthplace:</label>
            <span name="birthplace" id="birthplace"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Religion:</label>
            <span name="religion" id="religion"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Nationality:</label>
            <span name="nationality" id="nationality"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Address:</label>
            <span name="address" id="address"></span>
            <span name="city" id="city"></span>
            <span name="province" id="province"></span>
            <span name="zipcode" id="zipcode"></span>
          </div>
          <div class="modal-footer"></div>
          <div class="form-group">
            <label for="" class="">Guardian Name:</label>
            <span name="guardianName" id="guardianName"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Email:</label>
            <span name="guardianEmail" id="guardianEmail"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Contact Number:</label>
            <span name="guardianNumber" id="guardianNumber"></span>
          </div>
          <div class="form-group">
            <label for="" class="">Address:</label>
            <span name="guardianAddress" id="guardianAddress"></span>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>