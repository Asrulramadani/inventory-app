<div class="row">
    <div class="col-md-8">
      <ul class="nav nav-pills flex-column flex-md-row mb-3">
        <li class="nav-item" wire:click=enableEdit>
          <a class="nav-link active" href="#"><i class="bx bx-user me-1"></i> {{$btnEditText}}</a>
        </li>
      </ul>
      @if (session()->has('message'))
      <div class="alert-container">
          <div class="alert alert-success">{{session('message')}}</div>
      </div>
      @endif
      <div class="card mb-4">
        <h5 class="card-header">Profile Details</h5>
        <!-- Account -->
        <form id="formAccountSettings" wire:submit.prevent="update">
            <div class="card-body">
              <div class="d-flex align-items-start align-items-sm-center gap-4">
                <img src="{{$photo ? url('storage/'.$photo) : url("/assets/img/avatars/1.png")}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                @if ($isEdit)
                <div class="button-wrapper">
                    <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                      <span class="d-none d-sm-block">Upload new photo</span>
                      <i class="bx bx-upload d-block d-sm-none"></i>
                      <input type="file" id="upload" class="account-file-input" wire:model="newPhoto" hidden="" @disabled(!$isEdit)>
                    </label>
                    @error('photo')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror

                    <p class="text-muted mb-0">Format yang di izinkan JPG, JPEG atau PNG. Max. Ukuran 3MB</p>
                  </div>
                @endif
              </div>
            </div>
            <hr class="my-0">

            <div class="card-body">
                <div class="row">
                  <div class="mb-3 col-md-12">
                    <label for="username" class="form-label">Username</label>
                    <input class="form-control" type="text" id="username" name="username" wire:model="username" placeholder="Username" autofocus required @disabled(!$isEdit)>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="email" class="form-label">Email</label>
                    <input class="form-control" type="email" id="email" name="email" wire:model="email" placeholder="xyz@gmail.com" required @disabled(!$isEdit)>
                  </div>
                  <div class="mb-3 col-md-12">
                    <label for="newPassword" class="form-label">New Password</label>
                    <input class="form-control" type="password" id="newPassword" name="newPassword"
                    wire:model="newPassword" placeholder="********" @disabled(!$isEdit)>
                  </div>
                </div>
                  <button type="submit" class="btn btn-primary me-2" @disabled(!$isEdit)>Simpan</button>
                  <button type="reset" class="btn btn-outline-secondary" @disabled(!$isEdit)>Cancel</button>
                </div>
            </div>

        </form>
        <!-- /Account -->
      </div>
    </div>
  </div>
