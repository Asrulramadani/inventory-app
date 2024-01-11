<div class="card">
    <div class="card-body">
      <!-- Logo -->
      <div class="app-brand justify-content-center">


          <h3 class="app-brand-text demo text-body fw-bolder">Login</h3>
      </div>
      <!-- /Logo -->
      <h4 class="mb-2">Welcome to Inventory App! 👋</h4>
      @if (session('error'))
          <div class="alert alert-danger">{{session("error")}}</div>
      @endif

      <form id="formAuthentication" class="mb-3" wire:submit.prevent="login">
        <div class="mb-3">
          <label for="email" class="form-label">Username</label>
          <input
            type="text"
            class="form-control"
            id="email"
            name="username"
            placeholder="Enter your username"
            autofocus
            required
            wire:model="username"
          />
        </div>
        <div class="mb-3 form-password-toggle">
          <div class="d-flex justify-content-between">
            <label class="form-label" for="password">Password</label>

          </div>
          <div class="input-group input-group-merge">
            <input
              type="password"
              id="password"
              class="form-control"
              name="password"
              placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
              aria-describedby="password"
              required
              wire:model="password"
            />
            <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
          </div>
        </div>
        <div class="mb-3">
          <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
        </div>
      </form>

    </div>
  </div>
