@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Anotações'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-9 col-12 mx-auto">
            <div class="card card-body mt-4">
                <h6 class="mb-0">Nova Anotação</h6>
                @foreach ($atividadeshow as $item)
                <p class="text-sm mb-0">Assunto - {{ $item->assunto_nome }}</p>
                @endforeach
                <hr class="horizontal my-3 light">
                <div class="rating-wrapper" data-id="raiders">
                    <label class="mt-4">Nivel de importância</label>
                    <div class="star-wrapper">
                        <i class="fa-regular fa-star" value='1'></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                        <i class="fa-regular fa-star"></i>
                    </div>
                </div>
                <label class="mt-4">Titulo da anotação</label>
                <input type="text" class="form-control" id="titulo_anotacao">


                <label class="mt-4">Descrição</label>
                <div class="row">
                    <div class="col-12">
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>


                </div>
                <div class="row">
                    <div class="col-6">
                        <label class="form-label">Start Date</label>
                        <input class="form-control datetimepicker flatpickr-input" type="text"
                            placeholder="Please select start date" data-input="" onfocus="focused(this)"
                            onfocusout="defocused(this)">
                    </div>

                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="button" name="button" class="btn btn-light m-0">Cancel</button>
                    <button type="button" name="button" class="btn bg-gradient-primary m-0 ms-2">Create
                        Project</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mb-5">

    <div class="col-lg-9 mt-lg-0 mt-4">
        <div class="card mt-4">
            <div class="card-header d-flex justify-content-between">
                <h6>Atividades</h6>
            </div>
            <form method="POST" action="{{ route('notas.store') }}" id="identifier">
                {{ csrf_field() }}

                <div class="quill-textarea"></div>

                <textarea style="display: none" id="detail" name="detail">

                </textarea>



                <br>
                <div class="d-flex justify-content-end mt-4">
                    <button type="button" name="button" class="btn btn-light m-0">Cancel</button>
                    <button type="submit" name="button" class="btn bg-gradient-primary m-0 ms-2">Criar
                        Atividade</button>
                </div>
            </form>


        </div>
        @foreach ($notas as $item)
        {{ $item->tag_notas }}
        @endforeach
    </div>

</div>

<script>
    $("div.star-wrapper i").on("mouseover", function () {
if ($(this).siblings("i.vote-recorded").length == 0) {
$(this).prevAll().addBack().addClass("fa-solid yellow").removeClass("fa-regular");
$(this).nextAll().removeClass("fa-solid yellow").addClass("fa-regular");
}
});

    var quill = new Quill('.quill-textarea', {
    placeholder: 'Enter Detail',
    theme: 'snow',
    modules: {
    toolbar: [
    ['bold', 'italic', 'underline', 'strike'],
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    [{ 'indent': '-1'}, { 'indent': '+1' }]
    ]
    }
    });
    
    quill.on('text-change', function(delta, oldDelta, source) {
    console.log(quill.container.firstChild.innerHTML)
    $('#detail').val(quill.container.firstChild.innerHTML);
    });
    /* var quill = new Quill('#editorcontainer', {
    modules: {
    toolbar: [
    ['bold', 'italic'],
    ['link', 'blockquote', 'code-block', 'image'],
    [{ list: 'ordered' }, { list: 'bullet' }]
    ]
    },
    placeholder: 'Compose an epic...',
    theme: 'snow'
    });
    
    var form = document.querySelector('form');
    form.onsubmit = function() {
    // Populate hidden form on submit
    var about = document.querySelector('input[name=about]');
    about.value = JSON.stringify(quill.getContents());
    console.log(about);
    
    console.log("Submitted", $(form).serialize(), $(form).serializeArray());
    
    // No back end to actually submit to!
    alert('Open the console to see the submit data!')
    return false;
    }; */
</script>


@endsection