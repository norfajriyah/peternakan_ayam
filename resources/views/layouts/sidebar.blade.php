<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Karang Broiler <sup>Indah</sup></div>
  </a>
  
  <!-- Divider -->
  <hr class="sidebar-divider my-0">
  
  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('dashboard') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  
  <!-- Heading for Catatan Kandang -->
  <div class="sidebar-heading">
    Catatan Peternakan Ayam
  </div>

  <!-- Nav Item - DOC -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('products.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>DOC</span></a>
  </li>

  <!-- Nav Item - Perkembangan -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('perkembangan.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Perkembangan</span></a>
  </li>

  <!-- Nav Item - Pakan -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('pakan.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Pakan</span></a>
  </li>

  <!-- Nav Item - Kesehatan -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('kesehatan.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Kesehatan</span></a>
  </li>

  <!-- Nav Item - Penjualan -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('penjualan.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Penjualan</span></a>
  </li>

  <!-- Nav Item - Indeks Performa -->
  <li class="nav-item">
    <a class="nav-link" href="{{ route('hasil.index') }}">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Indeks Performa</span></a>
  </li>

  <!-- Heading for Profiel -->
  <div class="sidebar-heading">
    Kelola Profile Peternak
  </div>

  <!-- Nav Item - Profile -->
  <li class="nav-item">
    <a class="nav-link" href="/profile">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Profile</span></a>
  </li>
  
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">
  
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
