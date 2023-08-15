@if($errors->any())
<div class="alert alert-danger">
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
    <p>{{ session('error') }}</p>
</div>
@endif

@if(session()->has('success'))
<div class="alert alert-success">
    <p>{{ session('success') }}</p>
</div>
@endif
