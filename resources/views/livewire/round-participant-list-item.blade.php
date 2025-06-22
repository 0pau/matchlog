<li class="list-group-item d-flex align-items-center">
    <span class="flex-grow-1">{{$competitor->name}} ({{$competitor->birth}})</span>
    <button class="btn btn-light" wire:click="removeSelf()" data-competitor-id="{{$competitor->id}}"><i class="bi bi-trash"></i></button>
</li>
