@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@inject('carbon', 'Carbon\Carbon')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Anotações'])

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