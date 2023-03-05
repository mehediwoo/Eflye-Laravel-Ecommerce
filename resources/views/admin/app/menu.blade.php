<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
      <a href="{{ route('dashboard') }}" class="app-brand-link">
        <span class="app-brand-text demo menu-text fw-bolder ms-2">Eflyer</span>
      </a>

      <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
        <i class="bx bx-chevron-left bx-sm align-middle"></i>
      </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
      <!-- Dashboard -->
      <li class="menu-item {{ (request()->is('admin/dashboard*')) ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-home-circle"></i>
          <div data-i18n="Analytics">Dashboard</div>
        </a>
      </li>

      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Category</span>
      </li>
      <!-- Category -->
      <li class="menu-item {{ (request()->is('admin/category*')) ? 'active' : '' }}">
        <a href="{{ route('category.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Category</div>
        </a>
      </li>

      <li class="menu-item {{ (request()->is('admin/sub-category*')) ? 'active' : '' }}">
        <a href="{{ route('sub-category.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Sub Category</div>
        </a>
      </li>
      <!-- Products -->
      <li class="menu-header small text-uppercase">
        <span class="menu-header-text">Products</span>
      </li>
      <li class="menu-item {{ (request()->is('admin/product*')) ? 'active' : '' }}">
        <a href="{{ route('product.index') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Account">Products</div>
        </a>
      </li>

      <!-- Order -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Orders</span></li>
      <!-- Cards -->
      <li class="menu-item {{ (request()->is('admin/pending-order*')) ? 'active' : '' }}">
        <a href="{{ route('pending.order') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Pending Order</div>
        </a>
      </li>

      <li class="menu-item">
        <a href="{{ route('complete.order') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Complete Order</div>
        </a>
      </li>

      <!-- Log Out -->
      <li class="menu-header small text-uppercase"><span class="menu-header-text">Log Out</span></li>
      <li class="menu-item">
        <a href="{{ route('admin.logout') }}" class="menu-link">
          <i class="menu-icon tf-icons bx bx-collection"></i>
          <div data-i18n="Basic">Log Out</div>
        </a>
      </li>
    </ul>
  </aside>
