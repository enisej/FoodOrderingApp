@csrf
<form method="POST"  class="p-6">
<div class="container mx-auto">
    @csrf
    @method('POST')
    <x-input-label for="name">
        Name
    </x-input-label>
    <x-text-input
        id="name"
        name="name"
        type="text"
        class="mt-1 block w-3/4"
        placeholder="Name"
    />

    <x-input-label for="price">
        Price
    </x-input-label>
    <x-text-input
        id="price"
        name="price"
        type="text"
        class="mt-1 block w-3/4"
        placeholder="Price"
    />


    <x-input-label>
        Available
    </x-input-label>
    <x-text-input
        id="status"
        name="status"
        type="checkbox"
        class="mt-1 block "
    />
        <x-secondary-button x-on:click="$dispatch('close')">
            {{ __('Cancel') }}
        </x-secondary-button>

        <button class="ml-3 bg-green-600 rounded-lg px-3 py-2 text-white hover:bg-green-700">
            {{ __('Create') }}
        </button>
</div>

</form>
