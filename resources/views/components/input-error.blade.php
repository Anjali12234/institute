@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="text-red-700 text-lg">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    
@endif
