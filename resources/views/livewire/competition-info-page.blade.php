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
                <div class="dropdown">
                    <button type="button" class="btn btn-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-sort-up"></i>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item disabled">Rendezés</a></li>
                        <li><a class="dropdown-item @if($roundSortColumn == 'name') active @endif" wire:click="setRoundSortColumn('name')">Név szerint</a></li>
                        <li><a class="dropdown-item @if($roundSortColumn == 'date') active @endif" wire:click="setRoundSortColumn('date')">Dátum szerint</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion" id="rounds">
                <form wire:submit="$js.addRound" class="list-group-item d-flex gap-3">
                    <input class="form-control flex-grow-1" placeholder="Új forduló neve" wire:model="newRoundName">
                    <button class="btn btn-outline-dark"><i class="bi bi-plus"></i></button>
                </form>
                @forelse($competition->rounds()->orderBy($roundSortColumn)->get() as $round)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="round_heading_{{$round->id}}">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" aria-expanded="false" data-bs-target="#round_{{$round->id}}" aria-controls="round_{{$round->id}}">
                                {{ $round->name }}
                            </button>
                        </h2>
                        <div class="accordion-collapse collapse" id="round_{{$round->id}}" data-bs-parent="#rounds" aria-labelledby="round_heading_{{$round->id}}">
                            <div class="accordion-body">
                                <p><strong>Dátum:</strong>
                                    @if($round->date != null)
                                        {{ $round->date  }}
                                    @else
                                        Nincs megadva
                                    @endif
                                </p>
                                <p><strong>Versenyzők:</strong> Nincsenek versenyzők</p>
                                <div class="btn-group" role="group" aria-label="Basic outlined example">
                                    <button type="button" class="btn btn-outline-primary">Szerkesztés</button>
                                    <button data-round-id="{{$round->id}}" type="button" class="btn btn-outline-primary" wire:click="$js.deleteRound($event)">Törlés</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
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

@script
<script>

    $js('addRound', ()=>{
        if ($wire.newRoundName.trim() === "") {
            showSnackBar("Adja meg az új forduló nevét!", 2500);
            $wire.commit();
            return;
        }
        $wire.addNewRound().then(()=>{
           showSnackBar("Az új forduló sikeresen létre lett hozva.", 3000)
        });
    });

    $js('deleteRound', (event)=>{
        $wire.deleteRound(event.target.getAttribute("data-round-id")).then(()=>{
            showSnackBar("A forduló törlésre került.", 3000);
        });
    });
</script>
@endscript
