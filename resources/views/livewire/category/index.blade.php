
<div>

    <div class="row align-items-center">
        <div class="col-7 col-md-9">
            <h5 class="card-header">Kategori</h5>
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
                <th>Actions</th>
              </tr>
            </thead>

            <tbody class="table-border-bottom-0">

                @foreach ($categories as $category)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$category->name}}</strong></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="">
                            <button class="dropdown-item" wire:click.prevent="show({{$category->id}})" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                            <button class="dropdown-item" wire:click.="delete({{$category->id}})"><i class="bx bx-trash me-1"></i> Delete</button>
                            </div>
                        </div>
                        </td>

                </tr>

                @endforeach

            </tbody>


          </table>



            {{-- modal-edit --}}

            {{$categories->links()}}



    </div>

    {{-- modal create --}}
<div>
    <div class="modal fade" id="modalCreate" tabindex="-1" style="display: none;" aria-modal="true" role="dialog" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah Kategori</h5>
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
                <h5 class="modal-title" id="modalCenterTitle">Edit Kategori</h5>
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
