<div class="py-2">
    @if(session('success'))
    <p class="alert alert-success">
        {{ session('success' )}}
    </p>
    @elseif(session('error'))
    <p class="alert alert-danger">
        {{ session('error' )}}
    </p>
    @endif

    <!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
</div>