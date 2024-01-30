<div>

    <div class="row {{auth()->user()->role != "admin" ? "justify-content-center" : ""}}">
        <div class="col-md-3 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <a href="{{ route('stock')}}" class="btn btn-outline-danger" disabled>
                    <i class='bx bxs-box fs-4'></i>
                  </a>
                </div>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3" style="">
                    <a class="dropdown-item" href="{{route('stock')}}">View More</a>
                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                  </div>
                </div>
              </div>
              <span class="fw-semibold d-block mb-1">Stok</span>
              <h3 class="card-title mb-2">{{$stock}}</h3>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <a href="{{route("outTransaction")}}" class="btn btn-outline-warning" disabled>
                        <i class='bx bxs-archive-out fs-4'></i>
                    </a >
                  </div>
                  <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3" style="">
                      <a class="dropdown-item" href="javascript:void(0);">View More</a>
                      <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                  </div>
                </div>
                <span class="fw-semibold d-block mb-1">Barang Keluar</span>
                <h3 class="card-title mb-2">{{$outTransaction}}</h3>

              </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                    <a href="{{route('inTransaction')}}" class="btn btn-outline-success" disabled>
                        <i class='bx bxs-archive-in fs-4'></i>
                    </a>
                    </div>
                    <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3" style="">
                        <a class="dropdown-item" href="{{route('inTransaction')}}">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">Barang Masuk</span>
                <h3 class="card-title mb-2">{{$inTransaction}}</h3>

                </div>
            </div>
        </div>

        @if (auth()->user()->role == "admin")

        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                    <a href="{{route('admin.user')}}" class="btn btn-outline-primary" disabled>
                        <i class='bx bxs-user fs-4'></i>
                    </a>
                    </div>
                    <div class="dropdown">
                    <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3" style="">
                        <a class="dropdown-item" href="{{route('admin.user')}}">View More</a>
                        <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                    </div>
                    </div>
                </div>
                <span class="fw-semibold d-block mb-1">User</span>
                <h3 class="card-title mb-2">{{$user}}</h3>

                </div>
            </div>
        </div>

        @endif

    </div>

    <div class="row">
        <div class="col-md-6 col-12  mb-4">
            <div class="card h-auto">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Transaksi barang masuk</h5>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <ul class="p-0 m-0">

                    @foreach ($inTransactions as $in_tr)

                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <img src="../assets/img/icons/unicons/cc-success.png" alt="User" class="rounded">
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">{{$in_tr->name}}</h6>
                            <small class="text-muted d-block mb-1">{{$in_tr->updated_at}}</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">+ {{$in_tr->total_item}}</h6>
                          <span class="text-muted">{{$in_tr->unit}}</span>
                        </div>
                      </div>
                    </li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>

        <div class="col-md-6 col-12  mb-4">
            <div class="card h-auto">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Transaksi barang keluar</h5>
                <div class="dropdown">
                  <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="bx bx-dots-vertical-rounded"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                    <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                    <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <ul class="p-0 m-0">

                    @foreach ($outTransactions as $out_tr)

                    <li class="d-flex mb-4 pb-1">
                      <div class="avatar flex-shrink-0 me-3">
                        <img src="../assets/img/icons/unicons/cc-warning.png" alt="User" class="rounded">
                      </div>
                      <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                        <div class="me-2">
                            <h6 class="mb-0">{{$out_tr->name}}</h6>
                            <small class="text-muted d-block mb-1">{{$out_tr->updated_at}}</small>
                        </div>
                        <div class="user-progress d-flex align-items-center gap-1">
                          <h6 class="mb-0">- {{$out_tr->total_item}}</h6>
                          <span class="text-muted">{{$out_tr->unit}}</span>
                        </div>
                      </div>
                    </li>
                    @endforeach
                </ul>
              </div>
            </div>
        </div>
    </div>

    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
</div>
