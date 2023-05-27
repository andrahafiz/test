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
        <div class="badge-bottom"><span class="badge badge-primary">RSCM</span></div>
        <a href="#">
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
                        <a class="nav-link menu-title link-nav {{ routeActive('rscm.demand.request') }}"
                            href="{{ route('rscm.demand.request') }}">
                            <i data-feather="box"></i><span>Pengajuan Gas</span></a>
                    </li>
                    <li>
                        <a class="nav-link menu-title link-nav {{ routeActive('rscm.demand.index') }}"
                            href="{{ route('rscm.demand.index') }}">
                            <i data-feather="rotate-ccw"></i><span>Riwayat Permintaan Gas</span></a>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </div>
    </nav>
</header>
