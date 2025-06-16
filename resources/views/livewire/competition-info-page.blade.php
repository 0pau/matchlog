<div class="container">
    <div class="row">
        <div class="col"></div>
        @if($competition !== null)
        <div class="col-md-10">
            <div class="d-flex justify-content-between hbar">
                <h3> {{$competition->name." ".$competition->year}} </h3>
                <div class="dropdown">
                    <button type="button" class="btn btn-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Szerkesztés</a></li>
                        <li><a class="dropdown-item" wire:click="delete">Törlés</a></li>
                    </ul>
                </div>
            </div>
            <h5>Alapvető információk</h5>
            <table class="table">
                <tr>
                    <td>Tematika</td>
                    <td>{{ $competition->theme }}</td>
                </tr>
                <tr>
                    <td>Pontszám jó válasz esetén</td>
                    <td>{{ $competition->p_correct }}</td>
                </tr>
                <tr>
                    <td>Pontszám üres válasz esetén</td>
                    <td>{{ $competition->p_empty }}</td>
                </tr>
                <tr>
                    <td>Pontszám rossz válasz esetén</td>
                    <td>{{ $competition->p_incorrect }}</td>
                </tr>
            </table>
            <div class="d-flex justify-content-between hbar">
                <h5>Fordulók</h5>
                <button type="button" class="btn btn-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-plus"></i>
                </button>
            </div>
            <div class="accordion" id="rounds">
                @forelse($competition->rounds()->get() as $round)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="round_heading_{{$round->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#round_{{$round->id}}" aria-controls="round_{{$round->id}}">
                                {{ $round->name }}
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" id="round_{{$round->id}}" data-bs-parent="#rounds" aria-labelledby="round_heading_{{$round->id}}">
                            <div class="accordion-body">
                                <p><strong>Dátum:</strong> {{ $round->date  }}</p>
                                <p><strong>Versenyzők:</strong> Nincsenek versenyzők</p>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary">Szerkesztés</button>
                                    <button type="button" class="btn btn-outline-primary">Törlés</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <livewire:no-data-view title="Ehhez a versenyhez nincsenek fordulók rendelve." hint="Új fordulót a feljebb lévő hozzáadás gombbal rendelhet ehhez a versenyhez."/>
                @endforelse
            </div>
        </div>
        @else
        <div class="col-md-10">
            <livewire:no-data-view title="A kért verseny nem található." hint="Ez van.."/>
        </div>
        @endif
        <div class="col"></div>
    </div>
</div>
