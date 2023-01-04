@if ($notification = Session::get('success'))
<div class="alert alert-success" role="alert">
    <span class="alert-text">{{ $notification }}</span>
</div>
@endif


@if ($notification = Session::get('error'))
<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $notification }}</strong>
</div>
@endif


@if ($notification = Session::get('warning'))
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $notification }}</strong>
</div>
@endif


@if ($notification = Session::get('info'))
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>{{ $notification }}</strong>
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert">×</button>
    Please check the form under for errors
</div>
@endif

<script type="text/javascript">
    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    $(this).remove();
    });
    }, 4000);
</script>