<div class="card">
    <div class="card-body">
        <h5 class="card-title">{{$competitor->name}}</h5>
        <p class="card-text">
            <strong>Születési dátum: </strong>{{$competitor->birth}}<br>
            <strong>Lakcím: </strong>{{$competitor->address}}
        </p>
        <a href="#" class="btn btn-light"><i class="bi bi-pencil"></i></a>
        <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
    </div>
</div>
