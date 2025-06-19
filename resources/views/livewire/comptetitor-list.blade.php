<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between hbar">
                <h3>Versenyzők</h3>
                @if(Auth::check() && Auth::user()->is_admin)
                <button type="button" class="btn btn-light" wire:click="$js.show_dialog">
                    <i class="bi bi-plus"></i>
                </button>
                @endif
            </div>

            <div class="vstack gap-3">
                @forelse($this->get_competitors() as $c)
                    <!--<p >{{$c->name}} ({{$c->birth}}, {{$c->address}})</p>-->
                    <livewire:competitor-card :wire:key="$c->id" :competitor="$c"/>
                @empty
                    <livewire:no-data-view hint="A fenti hozzáadás gomb megnyomásával új versenyzőt rögzíthet a rendszerben."/>
                @endforelse
            </div>


        </div>
        <div class="col"></div>
    </div>

    <div wire:ignore.self class="modal fade" role="dialog" tabindex="-1" id="newCompetitorModal" aria-labelledby="newCompetitorModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCompetitionModalTitle">Új versenyző felvétele</h5>
                </div>
                <div class="modal-body vstack gap-3">
                    <div class="d-flex container-fluid gap-3">
                        <label class="flex-grow-1">
                            <span>Név</span>
                            <input class="form-control" wire:model="new_name">
                        </label>
                    </div>
                    <div class="d-flex container-fluid gap-3">
                        <label class="flex-grow-1">
                            <span>Születési dátum</span>
                            <input type="date" class="form-control" wire:model="new_birth">
                        </label>
                    </div>
                    <div class="d-flex container-fluid gap-3">
                        <label class="flex-grow-1">
                            <span>Lakcím</span>
                            <input class="form-control" wire:model="new_address">
                        </label>
                    </div>
                    <div class="container-fluid">
                        <p class="alert alert-danger" id="error">Error</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" wire:click="$js.save">Mentés</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                </div>
            </div>
        </div>
    </div>

</div>
@script
<script>
    $js('show_dialog', ()=>{
        var modal = new bootstrap.Modal(document.getElementById("newCompetitorModal"));
        modal.show();
        document.getElementById("error").style.display = "none";
    })
    $js('save', ()=>{
        $wire.save_new().then((result)=>{
            if (result === true) {
                bootstrap.Modal.getInstance(document.getElementById("newCompetitorModal")).hide();
            } else {
                document.getElementById("error").style.display = "block";
                document.getElementById("error").innerText = result;
            }
        });
    })
</script>
@endscript
