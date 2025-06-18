<div class="card">
    <div class="card-body">
        @if ($isBeingEdited)
            <form>
                <input>
                <input>
                <input>
                <button>Mentés</button>
            </form>
        @else
        <h5 class="card-title">{{$competitor->name}}</h5>
        <p class="card-text">
            <strong>Születési dátum: </strong>{{$competitor->birth}}<br>
            <strong>Lakcím: </strong>{{$competitor->address}}
        </p>
        <a class="btn btn-light" wire:click="edit"><i class="bi bi-pencil"></i></a>
        <a class="btn btn-danger"><i class="bi bi-trash"></i></a>
        @endif
    </div>
</div>
