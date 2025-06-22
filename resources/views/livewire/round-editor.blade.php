<div>
    <div class="modal-content" id="main">
        <div class="modal-header">
            <h5 class="modal-title">Forduló szerkesztése</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="vstack gap-3">
                <label>
                    <span>Forduló neve</span>
                    <input class="form-control" wire:model="name">
                </label>
                <label>
                    <span>Forduló időpontja</span>
                    <input class="form-control" type="date" wire:model="date">
                </label>
            </div>
            <hr>
            <p><b>Versenyzők</b></p>
            <div class="vstack gap-2">
                <ul class="list-group">
                    <li class="list-group-item btn justify-content-start d-flex gap-2" wire:click="$js.showAddDialog()">
                        <i class="bi bi-plus"></i>
                        Versenyző hozzáadása...
                    </li>
                    @if ($round != null)
                        @foreach($round->competitors()->get() as $c)
                            <livewire:round-participant-list-item wire:key="{{$c->id}}" :competitor="$c" round_id="{{$value}}"/>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" wire:click="$js.save">Mentés</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
        </div>
    </div>
    <div class="modal-content" id="add-form" style="display: none">
        <div class="modal-header">
            <h5 class="modal-title">Versenyző kiválasztása</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="list-group">
                @foreach(\App\Models\Competitor::all() as $comp)
                    @if ($round != null && !$round->hasCompetitor($comp->id))
                        <span data-competitor-id="{{$comp->id}}" class="list-group-item btn d-flex justify-content-start" wire:click="$js.addCompetitor($event)">{{$comp->name}}</span>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-secondary" wire:click="$js.cancelAdd()">Mégse</button>
        </div>
    </div>
</div>

@script
<script>
    $js("save", ()=>{
        $wire.save().then(()=>{
            showSnackBar("Sikeres mentés.", 2500);
        });
    })

    $js("showAddDialog", ()=>{
        document.getElementById("main").style.display = "none";
        document.getElementById("add-form").style.display = "block";
    });

    $js("addCompetitor", ($event)=>{
        $wire.addCompetitor($event.target.getAttribute("data-competitor-id")).then(()=>{
            $js.cancelAdd();
        });
    });

    $js("cancelAdd",()=>{
        document.getElementById("main").style.display = "block";
        document.getElementById("add-form").style.display = "none";
    })
</script>
@endscript
