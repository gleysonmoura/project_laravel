@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Anotações'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12 mx-auto">
            <div class="card card-body mt-4">
                <div class="card-header d-flex justify-content-between">
                    <h6 class="mb-0">Anotações</h6>
                    @foreach ($atividadeshow as $item)
                    <p class="text-sm mb-0">Assunto - {{ $item->assunto_nome }}</p>
                    @endforeach
                </div>
                <hr class="horizontal my-3 light">
                <form method="POST" action="{{ route('anotacao.storeanotacao', $item->id) }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-12">
                            <div class="rating-wrapper" data-id="raiders">
                                <label class="mt-4">Nível de importância</label>
                                <div class="star-wrapper">
                                    <i class="fa-regular fa-star" value='1'></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                    <i class="fa-regular fa-star"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="mt-4">Titulo da anotação</label>
                            <input type="text" class="form-control value=" {{ old('titulo_anotacao') }}"
                                id="titulo_anotacao" name="titulo_anotacao">
                            @error('titulo_anotacao') <p class="text-danger text-xs pt-1"> {{$message}} </p>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label class="mt-4">Observação</label>
                            <div class="form-group">
                                <textarea class="form-control" id="descricao_anotacao" name="descricao_anotacao"
                                    rows="3"></textarea>
                                @error('descricao_anotacao') <p class="text-danger text-xs pt-1"> {{$message}} </p>
                                @enderror
                            </div>

                        </div>
                    </div>
                    <div class="d-flex justify-content-end mt-4">
                        <button type="button" name="button" class="btn btn-sm btn-light m-0">Cancel</button>
                        <button type="submit" name="button" class="btn btn-sm bg-gradient-primary m-0 ms-2">Criar
                            Anotação</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
</div>


<script>
    $("div.star-wrapper i").on("mouseover", function () {
if ($(this).siblings("i.vote-recorded").length == 0) {
$(this).prevAll().addBack().addClass("fa-solid yellow").removeClass("fa-regular");
$(this).nextAll().removeClass("fa-solid yellow").addClass("fa-regular");
}
});

   
</script>


@endsection