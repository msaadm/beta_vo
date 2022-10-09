<form action="{{ route('admin.principals.products.store', [$principal]) }}" method="POST" x-data="{ rows:1 }">
    @csrf
    <input type="hidden" name="rows" x-bind:value="rows">
    <button type="button" class="btn btn-primary mb-5" @click="rows++">+ Add Row</button>
    <table class="table table-compact w-full" >
        <thead>
        <tr>
            <td>Product Name</td>
            <td>Generic Name</td>
            <td>Strength</td>
            <td>Pack Size</td>
            <td>Carton Size</td>
        </tr>
        </thead>
        <tbody>
        <template x-for="i in rows" >
        <tr>
            <td><input type="text" name="name[]" required="required" minlength="3" placeholder="Product Name" class="input input-bordered w-full max-w-sm" /></td>
            <td><input type="text" name="generic_name[]" required="required" minlength="3" placeholder="Generic Name" class="input input-bordered w-full max-w-sm" /></td>
            <td><input type="text" name="strength[]" required="required" minlength="3" placeholder="Strength" class="input input-bordered w-full max-w-sm" /></td>
            <td><input type="text" name="pack_size[]" required="required" minlength="3" placeholder="Pack Size" class="input input-bordered w-full max-w-sm" /></td>
            <td><input type="number" name="carton_size[]" required="required" min="1" step="1" placeholder="Carton Size" class="input input-bordered w-full max-w-sm" /></td>
        </tr>
        </template>
        </tbody>
    </table>

    <div class="mt-5">
        <a href="{{ route('admin.principals.products.index', [$principal]) }}">
            <button class="btn" type="button">Cancel</button>
        </a>
        <button class="btn btn-primary">Add Product</button>
    </div>
</form>
