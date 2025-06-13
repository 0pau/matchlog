<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{ $comp->name." ".$comp->year  }}</h5>
        <div class="card-text">
            <p class="competition-attribute">
                <i class="bi bi-flag-fill"></i>
                {{ $comp->getRoundsCount() }}
            </p>
            <a class="hidden-link stretched-link" wire:navigate href="competitions/{{$comp->id}}">Megtekintés</a>
        </div>
    </div>
</div>
