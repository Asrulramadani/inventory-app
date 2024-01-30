
<div>

    <div class="row align-items-center">
        <div class="col-7 col-md-9">
            <h5 class="card-header">Barang Keluar</h5>
        </div>
        <div class="col-5 col-md-3">
            <button type="button" class="btn btn-primary ms-auto" data-bs-toggle="modal" data-bs-target="#modalCreate">
                <i class='bx bx-plus'></i> tambah
            </button>

        </div>
    </div>
    @if (session()->has('message'))
    <div class="alert-container">
        <div class="alert {{session()->has('alert-class') ? session('alert-class') : "alert-success"}}">{{session('message')}}</div>
    </div>
    @endif

    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
              <tr>
                <th>Kode transaksi</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Kategori</th>
                <th>Keterangan</th>
                <th>Actions</th>
              </tr>
            </thead>

            <tbody class="table-border-bottom-0">

                @foreach ($transactions as $tr)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$tr->transaction_code}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$tr->name ?? ""}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$tr->total_item}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$tr->unit ?? ""}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$tr->category ?? ''}}</strong></td>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$tr->information != null ? $tr->information : '-'}}</strong></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu" style="">
                            <button class="dropdown-item" wire:click="show({{$tr->id}})" data-bs-toggle="modal" data-bs-target="#modalEdit"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                            <button class="dropdown-item" wire:click.="delete({{$tr->id}})"><i class="bx bx-trash me-1"></i> Delete</button>
                            </div>
                        </div>
                        </td>

                </tr>

                @endforeach

            </tbody>


          </table>



            {{-- modal-edit --}}

            {{$transactions->links()}}



    </div>

    {{-- modal create --}}
<div>
    <div class="modal fade" id="modalCreate" tabindex="-1" style="display: none;" aria-modal="true" role="dialog" wire:ignore>
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Tambah transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="create">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleDataList" class="form-label">Nama Barang</label>

                            <select class="form-control" id="datalistOptions" wire:model="id_stock" wire:change="getStockInformation">
                                <option value="" selected>Pilih nama barang</option>
                                @foreach ($stocks as $stock)
                                <option value="{{$stock->id}}">{{$stock->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="row gap-2">
                        <div class="col mb-3">
                            <label class="form-label" for="dobWithTitle" class="form-label">Kategori</label>
                            <input class="form-control" type="string" wire:model="stockCategory"value="{{$stockCategory}}" disabled>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="dobWithTitle" class="form-label">Satuan</label>
                            <input class="form-control" type="string" wire:model="stockUnit"value="{{$stockUnit}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="dobWithTitle" class="form-label">Jumlah item</label>
                            <input class="form-control" type="number" wire:model="total_item" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="dobWithTitle" class="form-label">Keterangan</label>
                            <textarea class="form-control" type="number" wire:model="information" rows="3"></textarea>
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
                <h5 class="modal-title" id="modalCenterTitle">Edit transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="update">
                    @csrf
                    <div class="row">
                        <div class="mb-3">
                            <label for="exampleDataList" class="form-label">Nama Barang</label>

                            <select class="form-control" id="datalistOptions" wire:model="id_stock" wire:change="getStockInformation" disabled>
                                @foreach ($stocks as $stock)
                                <option value="{{$stock->id}}"
                                    >{{$stock->name}}</option>
                                @endforeach
                            </select>
                          </div>
                    </div>
                    <div class="row gap-2">
                        <div class="col mb-3">
                            <label class="form-label" for="dobWithTitle" class="form-label">Kategori</label>
                            <input class="form-control" type="string" wire:model="stockCategory"value="{{$stockCategory}}" disabled>
                        </div>
                        <div class="col mb-3">
                            <label class="form-label" for="dobWithTitle" class="form-label">Satuan</label>
                            <input class="form-control" type="string" wire:model="stockUnit"value="{{$stockUnit}}" disabled>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label class="form-label" for="dobWithTitle" class="form-label">Jumlah item</label>
                            <input class="form-control" type="number" wire:model="total_item" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="dobWithTitle" class="form-label">Keterangan</label>
                            <textarea class="form-control" type="number" wire:model="information" rows="3"></textarea>
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
</div>
