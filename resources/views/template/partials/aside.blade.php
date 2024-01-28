<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{route('dashboard')}}" class="app-brand-link">
        <span class="app-brand-logo demo">
            <img src="{{url('/assets/img/icons/logo.png')}}" width="40px" alt="">
        </span>
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Inventory</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-2">
      <!-- Dashboard -->
      <li class="menu-item {{request()->is('dashboard') ? 'active' : ''}}">
        <a href="{{route('dashboard')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-home"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <!-- Layouts -->


      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">MENU</span>
      </li>
      <li class="menu-item  {{(request()->is('units') || request()->is('categories') || request()->is('stocks')) ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bxs-package"></i>
          <div data-i18n="Account Settings">Master Barang</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{request()->is('stocks') ? 'active' : ''}}">
            <a href="{{route('stock')}}" class="menu-link">
              <div data-i18n="Account">Stok</div>
            </a>
          </li>
          <li class="menu-item {{request()->is('units') ? 'active' : ''}}">
            <a href="{{route('unit')}}" class="menu-link">
              <div data-i18n="Notifications">Satuan</div>
            </a>
          </li>
          <li class="menu-item {{request()->is('categories') ? 'active' : ''}}">
            <a href="{{route("category")}}" class="menu-link">
              <div data-i18n="Connections">Kategori</div>
            </a>
          </li>
        </ul>
      </li>

      <li class="menu-item {{(request()->is('transaction/in') || request()->is('transaction/out')) ? 'active' : ''}}">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-transfer"></i>
          <div data-i18n="Misc">Transaksi</div>
        </a>
        <ul class="menu-sub">
          <li class="menu-item {{request()->is('transaction/in') ? 'active' : ''}}">
            <a href="{{route('inTransaction')}}" class="menu-link">
              <div >Barang Masuk</div>
            </a>
          </li>
          <li class="menu-item {{request()->is('transaction/out') ? 'active' : ''}}">
            <a href="{{route('outTransaction')}}" class="menu-link">
              <div >Barang Keluar</div>
            </a>
          </li>
        </ul>
      </li>



      {{-- khusus admin --}}

      @if (auth()->user()->role == "admin")

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Admin</span>
      </li>
      <!-- Cards -->
      <li class="menu-item {{request()->is('admin/users') ? 'active' : ''}}">
        <a wire:navigation="{{@route('admin.user')}}"  href="{{@route('admin.user')}}" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-user"></i>
          <div data-i18n="Basic">Users</div>
        </a>
      </li>
      <li class="menu-item">
        <a href="cards-basic.html" class="menu-link">
          <i class="menu-icon tf-icons bx bxs-cog"></i>
          <div data-i18n="Basic">Setting</div>
        </a>
      </li>

      @endif

    </ul>
  </aside>
