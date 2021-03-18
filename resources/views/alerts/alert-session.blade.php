@if (Session::has('message'))
<div class="box-body">
    <div class="alert alert-{{ Session::get('type') }} alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4>{{ Session::get('type') }}!</h4>
        {{ Session::get('message') }}
    </div>
</div>
@endif