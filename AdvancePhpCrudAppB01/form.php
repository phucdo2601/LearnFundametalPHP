<div class="modal fade" id="usermodal">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="usermodalLabel">Adding or Updating Users</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <form action="" id="addform" method="POST" enctype="multipart/form-data">
            <div class="modal-body">

              <!-- Username -->
              <div class="form-group">
                <label for="">Name:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark">
                      <i class="fas fa-user-alt text-light"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter your username..." autocomplete="off" required="required" id="username" name="username">
                </div>
              </div>

              <!-- email -->
              <div class="form-group">
                <label for="">Email:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark">
                      <i class="fas fa-envelope-open text-light"></i>
                    </span>
                  </div>
                  <input type="email" class="form-control" placeholder="Enter your email..." autocomplete="off" required="required" id="email" name="email">
                </div>
              </div>

              <!-- mobile -->
              <div class="form-group">
                <label for="">Mobile:</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text bg-dark">
                      <i class="fas fa-phone text-light"></i>
                    </span>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter your mobile..." autocomplete="off" required="required" id="mobile" name="mobile" maxlength="10" minlength="5">
                </div>
              </div>

              <!-- photo -->
              <div class="form-group">
                <label>Photo:</label>
                <div class="input-group">
                  <label class="custom-file-label" for="userphoto">Choose File:</label>
                  <input type="file" class="custom-file-input" name="photo" id="userphoto">
                </div>
              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-dark">Submit</button>

              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
          </form>

        </div>
      </div>
    </div>