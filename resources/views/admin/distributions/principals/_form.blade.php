<form action="{{ route('admin.distributions.principals.store', [$distribution]) }}" method="POST">
    @csrf
    <div class="form-control w-full max-w-sm mb-5">
        <label class="label">
            <span class="label-text">Principal</span>
        </label>
        <select name="principal" required="required" class="select select-bordered w-full max-w-sm">
            <option value="" selected>Select Principal</option>
            @foreach($principals as $principal)
                <option value="{{ $principal->id }}">{{$principal->name}}</option>
            @endforeach
        </select>
    </div>

    <div class="mt-5">
        <a href="{{ route('admin.distributions.principals.index', [$distribution]) }}">
            <button class="btn" type="button">Cancel</button>
        </a>
        <button class="btn btn-primary">Connect Principal</button>
    </div>
</form>
