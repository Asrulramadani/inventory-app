

<div>

    <div class="row align-items-center">
        <div class="col-7 col-md-9">
            <h5 class="card-header">User</h5>
        </div>
        <div class="col-5 col-md-3">
            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modalCreate" wire:click.prevent='resetForm'>
                <i class='bx bx-plus'></i> tambah
            </button>

        </div>
    </div>
    @if (session()->has('message'))
    <div class="alert-container">
        <div class="alert alert-success">{{session('message')}}</div>
    </div>
    @endif

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
              <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody class="table-border-bottom-0">

                @foreach ($users as $user)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$user->name}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$user->email}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i>
                        <span class="badge @if ($user->role =="operator")
                        bg-label-primary
                        @endif
                        @if ($user->role =="admin")
                        bg-label-danger
                        @endif
                        "><strong>{{$user->role}}</strong></span>
                        </td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="">
                            <button class="dropdown-item" wire:click.prevent="show({{$user->id}})" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                            <button class="dropdown-item" wire:click.="delete({{$user->id}})"><i class="bx bx-trash me-1"></i> Delete</button>
                            </div>
                        </div>
                        </td>

                </tr>

                @endforeach

            </tbody>


          </table>



            {{-- modal-edit --}}

            {{$users->links()}}



    </div>

    {{-- modal create --}}
<div>
    <div class="modal fade" id="modalCreate" tabindex="-1" style="display: none;" aria-modal="true" role="dialog" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="create">
                    @csrf
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Name</label>
                        <input type="text" id="nameWithTitle" class="form-control
                        " placeholder="Enter Name" wire:model="name" required autofocus>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" class="form-control
                        " placeholder="Enter Password" wire:model="password" required>
                    </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                          <label for="emailWithTitle" class="form-label">Email</label>
                          <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx" wire:model="email" required>
                        </div>
                        <div class="col mb-0">
                          <label for="dobWithTitle" class="form-label">Role</label>
                          <select class="form-select" id="inputGroupSelect01" wire:model="role" required>
                            <option selected="">Choose...</option>
                            <option value="operator">Operator</option>
                            <option value="admin">Admin</option>
                          </select>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- modal edit --}}
<div>
    <div class="modal fade" id="modalEdit" tabindex="-1" style="display: none;" aria-modal="true" role="dialog" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    @csrf
                <div class="row">
                    <div class="col mb-3">
                        <label for="nameWithTitle" class="form-label">Name</label>
                        <input type="text" id="nameWithTitle" class="form-control
                        " placeholder="Enter Name" wire:model="name" required autofocus>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col mb-3">
                        <label for="password" class="form-label">New Password</label>
                        <input type="password" id="password" class="form-control
                        " placeholder="Enter Password" wire:model="newPassword" >
                    </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                          <label for="emailWithTitle" class="form-label">Email</label>
                          <input type="email" id="emailWithTitle" class="form-control" placeholder="xxxx@xxx.xx" wire:model="email" required>
                        </div>
                        <div class="col mb-0">
                          <label for="dobWithTitle" class="form-label">Role</label>
                          <select class="form-select" id="inputGroupSelect01" wire:model="role" required>

                            <option value="operator" @selected($user->role=="operator")>Operator</option>
                            <option value="admin" @selected($user->role=="operator")>Admin</option>
                          </select>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                    Close
                    </button>
     @push('scripts')
    <script>
        Livewire.on('syncUpdate',()=>{
            Livewire.emit('show', {{$idEdit}} )
            Livewire.emit('validateUpdate')
        })
    </script>
    @endpush
                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="Livewire.emit('syncUpdate')">Save changes</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
