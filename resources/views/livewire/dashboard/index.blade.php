<div>

    <div class="row">
        <div class="col-md-3 col-6 mb-4">
          <div class="card">
            <div class="card-body">
              <div class="card-title d-flex align-items-start justify-content-between">
                <div class="avatar flex-shrink-0">
                  <button class="btn btn-outline-success" disabled>
                    <i class='bx bxs-box fs-4'></i>
                  </button>
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
              <h3 class="card-title mb-2">20</h3>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
            <div class="card">
              <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                  <div class="avatar flex-shrink-0">
                    <button class="btn btn-outline-danger" disabled>
                        <i class='bx bxs-archive-out fs-4'></i>
                    </button>
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
                <h3 class="card-title mb-2">40</h3>

              </div>
            </div>
        </div>

        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                    <button class="btn btn-outline-warning" disabled>
                        <i class='bx bxs-archive-in fs-4'></i>
                    </button>
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
                <h3 class="card-title mb-2">23</h3>

                </div>
            </div>
        </div>

        @if (auth()->user()->role == "admin")

        <div class="col-md-3 col-6 mb-4">
            <div class="card">
                <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="avatar flex-shrink-0">
                    <button class="btn btn-outline-primary" disabled>
                        <i class='bx bxs-user fs-4'></i>
                    </button>
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
                <h3 class="card-title mb-2">3</h3>

                </div>
            </div>
        </div>

        @endif

    </div>

    <div class="row">
        <div class="col-md-6 col-12  mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Transaksi</h5>
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
                  <li class="d-flex mb-4 pb-1">
                    <div class="avatar flex-shrink-0 me-3">
                      <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <small class="text-muted d-block mb-1">Paypal</small>
                        <h6 class="mb-0">Send money</h6>
                      </div>
                      <div class="user-progress d-flex align-items-center gap-1">
                        <h6 class="mb-0">+82.6</h6>
                        <span class="text-muted">USD</span>
                      </div>
                    </div>
                  </li>
                  <li class="d-flex mb-2 ">
                    <div class="avatar flex-shrink-0 me-3">
                      <img src="../assets/img/icons/unicons/wallet.png" alt="User" class="rounded">
                    </div>
                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                      <div class="me-2">
                        <small class="text-muted d-block mb-1">Wallet</small>
                        <h6 class="mb-0">Mac'D</h6>
                      </div>
                      <div class="user-progress d-flex align-items-center gap-1">
                        <h6 class="mb-0">+270.69</h6>
                        <span class="text-muted">USD</span>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
      </div>

    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
</div>
