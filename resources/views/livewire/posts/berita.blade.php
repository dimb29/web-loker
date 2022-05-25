
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Tags
    </h2>
</x-slot>
<x-slot name="footer">
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <input type="text"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    id="title" placeholder="Enter Title" wire:model="title">
                @error('title') <span class="text-red-500">{{ $message }}</span>@enderror
            </div>

            <div class="mb-4">
                <label for="contentku" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                <textarea name="contentku" class="contentku" id="contentku" cols="30" rows="10"></textarea>
            </div>
          </div>
        </div>

        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
            <button
                wire:click.prevent="store()"
                type="button"
                class="inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
              Save
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
            <button
                wire:click="closeModal()"
                type="button"
                class="inline-flex items-center px-4 py-2 my-3 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:text-gray-800 active:bg-gray-50 transition ease-in-out duration-150">
              Cancel
            </button>
          </span>
          </form>
        </div>
      </div>
    </div>
  </div>
<script src="https://cdn.ckeditor.com/ckeditor5/29.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#contentku' ) )
        .catch( error => {
            console.error( error );
        } );
</script>