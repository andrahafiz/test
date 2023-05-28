<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-10">
                {{ $breadcrumb_title ?? '' }}
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('mcs.home') }}">Beranda</a></li>
                    {{ $slot ?? '' }}
                </ol>
            </div>
            <div class="col-lg-2">
                <div class="bookmark">
                </div>
            </div>
        </div>
    </div>
</div>
