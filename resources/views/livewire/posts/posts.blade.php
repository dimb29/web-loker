<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Upload Berita
    </h2>
<div class="loading-div fixed z-20 inset-0 place-content-center opacity-25 bg-gray-400" hidden>
    <div class="flex justify-center mt-56">
            <img class="object-cover w-36" src="http://localhost:8000/storage/loaders/rings.svg">
    </div>
</div>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3"
                    role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif
            @if (Request::getPathInfo() == '/dashboard/posts')
                <button wire:click="create()"
                    class="loadings inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                    Create New Post
                </button>
            @endif

            @if ($isOpen)
                @include('livewire.posts.create')
            @endif
            <div class="grid grid-flow-row grid-cols-1 sm:grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    @if($post->author->user_type == Auth::user()->user_type)
                    <div class="max-w-full sm:max-w-sm rounded overflow-hidden shadow-lg">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                            <p class="text-gray-700 text-base">
                                {!! Str::words($post->content, 20, '...') !!}
                            </p>
                        </div>
                        <div class="px-6 pt-4 pb-2">
                            <a href="{{ url('dashboard/posts', $post->id) }}"
                                class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Read post
                            </a>
                            <button wire:click="edit({{ $post->id }})"
                                class="loadings inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                Edit
                            </button>
                            <button wire:click="delete({{ $post->id }})"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                Delete
                            </button>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
        <div class="py-4">
            {{ $posts->links() }}
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.loadings').click(function(){
            $('.loading-div').show();
            $('.loading-div').delay(4000).fadeOut();
        })
    })
</script>