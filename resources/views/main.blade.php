<div class="container">
    <div class="row">
        <div class="col"></div>
        <div class="col-md-10">
            <div class="d-flex justify-content-between hbar">
                <h3>Versenyek</h3>
                <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#newCompetitionModal">
                    <i class="bi bi-plus"></i>
                </button>
            </div>
            <div class="d-grid gap-3">
                @forelse($this->get_competitions() as $c)
                    <livewire:competition-card :comp="$c" :wire:key="$c->id"/>
                @empty
                    <p>Ez a lista üres</p>
                @endforelse
            </div>
        </div>
        <div class="col"></div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="newCompetitionModal" aria-labelledby="newCompetitionModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newCompetitionModalTitle">Új verseny felvétele</h5>
                </div>
                <div class="modal-body vstack gap-3">
                    <div class="d-flex container-fluid gap-3">
                        <label for="comp_name" class="flex-grow-1">
                            <span>Verseny neve</span>
                            <input class="form-control" wire:model="new_name">
                        </label>
                        <label>
                            <span>Verseny éve</span>
                            <input type="number" min="1900" max="2100" wire:model="new_year" class="form-control">
                        </label>
                    </div>
                    <div class="container-fluid d-flex">
                        <label class="flex-grow-1">
                            <span>Tematika</span>
                            <input class="form-control" wire:model="new_theme">
                        </label>
                    </div>
                    <div class="container-fluid vstack gap-2">
                        <label class="flex-grow-1">
                            <span>Pontszám jó válasz esetén</span>
                            <input type="number" class="form-control" wire:model="new_p_correct">
                        </label>
                        <label class="flex-grow-1">
                            <span>Pontszám üres válasz esetén</span>
                            <input type="number" value="0" class="form-control" wire:model="new_p_empty">
                        </label>
                        <label class="flex-grow-1">
                            <span>Pontszám rossz válasz esetén</span>
                            <input type="number" value="0" class="form-control" wire:model="new_p_incorrect">
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal" wire:click="save_new">Mentés</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                </div>
            </div>
        </div>
    </div>
</div>


