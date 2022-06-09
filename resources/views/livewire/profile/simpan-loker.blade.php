<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    <livewire:profil-nav/>
    </h2>
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
            <div class="grid grid-flow-row grid-cols-1 sm:grid-cols-3  gap-4">
                @foreach ($posts as $post)
                    @if($post->author->user_type == Auth::user()->user_type)
                    <div data-mdb-ripple="true"
				        data-mdb-ripple-color="light" class="max-w-full sm:max-w-sm rounded overflow-hidden shadow-lg hover:bg-gray-300 m-2
                        rounded-lg hover:text-blue-600 transition cursor-pointer duration-150 transform hover:scale-110 hover:-translate-y-2 ">
                        <div class="job-list " data-id="{{$post->id}}">
                            <div class="px-6 py-4">
                                <img class="object-cover h-48 w-96" src="{{ $post->url }}">
                                <div class="font-bold text-xl mb-2">
                                    <input class="w-80 bg-transparent cursor-pointer" readonly type="text" value="{{ $post->title }}">
                                </div>
                                <p class="text-gray-700 text-base">
                                    {{$post->per_nama}}
                                </p>
                            </div>
                        </div>
                        <div class="m-2 px-4 top-0">
                            <button wire:click="delSaveJob({{$post->post_id}})"
                                class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                                    <i class="fa-solid fa-trash-can"></i> | 
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
        $('.job-list').on('click', function(){
            var dataId = $(this).attr('data-id')
            window.open("{{url('dashboard/posts/')}}/"+dataId,'_blank');
        })
    })
</script>