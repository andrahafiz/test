<div>
    @switch($type)
        @case('Request')
        @case('Terima (RSCM)')
            <button class="btn btn-secondary" type="button">{{ $type }}</button>
        @break

        @case('Done')
            <button class="btn btn-primary" type="button">{{ $type }}</button>
        @break

        @case('Progress')
            <button class="btn btn-warning" type="button">{{ $type }}</button>
        @break

        @case('Gagal')
            <button class="btn btn-danger" type="button">{{ $type }}</button>
        @break

        @case('Tolak (Habis)')
            <button class="btn btn-danger" type="button">{{ $type }}</button>
            <small>Telah penuh</small>
        @break

        @default
            <button class="btn btn-light disabled" type="button">{{ $type ?? '-' }}</button>
    @endswitch
</div>
