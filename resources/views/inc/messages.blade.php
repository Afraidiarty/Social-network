@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        @foreach ($errors->all() as $error)
            <span>{{ $error }}</span><br>
        @endforeach
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success" role="alert">
        {{ session('success') }}
    </div>
@endif

@if(session('failed'))
<div class="alert alert-danger">
    {{ session('failed') }}
</div>
@endif