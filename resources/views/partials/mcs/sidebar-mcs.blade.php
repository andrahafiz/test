<header class="main-nav">
    <div class="sidebar-user text-center">
        <a class="setting-primary" href=""><i data-feather="settings"></i></a>
        <img class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        {{-- @if (auth()->user()->foto_warga == 'no-image.png')
            <img class="img-90 rounded-circle" src="{{ asset('assets/images/dashboard/1.png') }}" alt="" />
        @else
            <img class="img-90 rounded-circle" src="{{ asset('storage/' . auth()->user()->foto_warga) }}"
                alt="" />
        @endif --}}
        <div class="badge-bottom"><span class="badge badge-primary">MCS</span></div>
        <a href="">
            <h6 class="mt-3 f-14 f-w-600">{{ auth()->user()->name }}</h6>
        </a>
    </div>
    <nav>
        <div class="main-navbar">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="mainnav">
                <ul class="nav-menu custom-scrollbar">
                    <li class="back-btn">
                        <div class="mobile-back text-end"><span>Kembali</span><i class="fa fa-angle-right ps-2"
                                aria-hidden="true"></i></div>
                    </li>
                    <li class="sidebar-main-title">
                        <div>
                            <h6>Menu</h6>
                        </div>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav {{ routeActive('mcs.request-gas.*') }}"
                            href="{{ route('mcs.request-gas.index') }}">
                            <i data-feather="send"></i><span>Request Gas</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav {{ routeActive('mcs.sending.gas') }}"
                            href="{{ route('mcs.sending.gas') }}">
                            <i data-feather="send"></i><span>Pengiriman Gas</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav {{ routeActive('mcs.demand.request') }}"
                            href="{{ route('mcs.demand.request') }}">
                            <i data-feather="check-square"></i><span>Approval Permintaan</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav {{ routeActive('mcs.demand.index') }}"
                            href="{{ route('mcs.demand.index') }}">
                            <i data-feather="rotate-ccw"></i><span>Riwayat Permintaan Gas</span></a>
                    </li>
                    {{-- <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{ routeActive('warga.home') }}"
                            href="{{ route('warga.home') }}"><i data-feather="home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title  {{ prefixActive('warga.surat.*') }}"><i
                                data-feather="inbox"></i><span>Surat</span></a>
                        <ul class="nav-submenu menu-content" style="display:{{ prefixBlock('warga.surat.*') }};">
                            <li><a href="{{ route('warga.surat.index') }}"
                                    class="{{ prefixActive('warga.surat.index') }}">Daftar Pengajuan Surat</a></li>
                            <li><a href="{{ route('warga.surat.form.surat_keterangan') }}"
                                    class="{{ prefixActive('warga.surat.form.surat_keterangan') }}">Surat
                                    Keterangan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title {{ prefixActive('warga.pengaduan.*') }}"
                            href="javascript:void(0)"><i data-feather="archive"></i><span>Pengaduan</span></a>
                        <ul class="nav-submenu menu-content" style="display: {{ prefixBlock('warga.pengaduan.*') }};">
                            <li><a href="{{ route('warga.pengaduan.index') }}"
                                    class="{{ routeActive('warga.pengaduan.index') }}">Pengaduan Gas</a></li>
                            <li><a href="{{ route('warga.pengaduan.pribadi') }}"
                                    class="{{ routeActive('warga.pengaduan.pribadi') }}">Pengaduan Pribadi</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link menu-title link-nav {{ routeActive('warga.kegiatan') }}"
                            href="{{ route('warga.kegiatan_warga.index') }}"><i
                                data-feather="calendar"></i><span>Kegiatan</span></a>
                        <a class="nav-link menu-title link-nav {{ routeActive('warga.pengumuman') }}"
                            href="{{ route('warga.pengumuman_warga.index') }}"><i
                                data-feather="airplay"></i><span>Pengumuman</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav {{ routeActive('warga.rw-rt') }}"
                            href="{{ route('warga.rw-rt') }}"><i data-feather="users"></i><span>Profile RT
                                RW</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title  link-nav {{ prefixActive('warga.fasilitaswarga.*') }}"
                            href="{{ route('warga.fasilitaswarga.index') }}"><i
                                data-feather="map"></i><span>Fasilitas</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title  link-nav {{ prefixActive('warga.persyaratan') }}"
                            href="{{ route('warga.persyaratan') }}"><i data-feather="file-text"></i><span>Persyaratan
                                Administratif</span></a>
                    </li> --}}
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
