
@if (session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif

@if (session('not-found'))
<div class="alert alert-danger">
    {{ session('not-found') }}
</div>
@endif

@if (session('success'))
	<div class="alert alert-success">
	      <p>{{ session('success') }}</p>
	</div>
@endif

@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="list-style: none;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif