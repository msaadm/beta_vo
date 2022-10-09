<form action="{{ route('admin.principals.store') }}" method="POST">
    @csrf
    <div class="form-control w-full max-w-sm">
        <label class="label">
            <span class="label-text">Principal Name</span>
        </label>
        <input type="text" name="name" required="required" minlength="3" placeholder="Type Principal Name here" class="input input-bordered w-full max-w-sm" />
    </div>
    <div class="form-control w-full max-w-sm">
        <label class="label">
            <span class="label-text">Email</span>
        </label>
        <input type="email" name="email" required="required"  placeholder="Type Email here" class="input input-bordered w-full max-w-sm" />
    </div>

    <div class="alert alert-info shadow-lg mt-5">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-current flex-shrink-0 w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
            <span class="font-bold">Notice! Principal Password will be set to "abcd1234"</span>
        </div>
    </div>

    <div class="mt-5">
        <a href="{{ route('admin.principals.index') }}">
            <button class="btn" type="button">Cancel</button>
        </a>
        <button class="btn btn-primary">Add Principal</button>
    </div>
</form>
