<div class="card d-flex flex-row align-items-center">
    <div class="card-body">
        <h5 class="card-title">{{$competitor->name}}</h5>
        <p class="card-text">
            <strong>Születési dátum: </strong>{{$competitor->birth}}<br>
            <strong>Lakcím: </strong>{{$competitor->address}}
        </p>
    </div>
    <div class="p-3 gap-2 d-flex">
        <a class="btn btn-light" wire:click="requestEdit"><i class="bi bi-pencil"></i></a>
        <a class="btn btn-danger" wire:click="delete"><i class="bi bi-trash"></i></a>
    </div>
</div>
