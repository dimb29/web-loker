<x-slot name="header">
    <div class="flex flex-col">
        <div class="m-2 w-32 border border-black">
            <h2 class="font-semibold text-xl text-gray-800t">
                Dashboard
            </h2>
        </div>
        <div class="flex-auto border border-black">
            <div class="hidden sm:-my-px sm:ml-10 sm:flex">
                <livewire:search-index>
            </div>
        </div>
    </div>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12 bg-yellow">
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
            


            <div class="flex flex-row">
                <div class="flex-auto m-2 w-96">
                    <div class="flex flex-col">
                        
                        <div class="flex-auto m-1">
                            <table class="table-auto">
                                <tbody>
                                    @foreach ($posts->skip(0)->take(5) as $post)
                                        <tr class="hover:bg-gray-300 text-slate-500 transition duration-150 transform hover:scale-90 border-b">
                                        <td class="w-60 pr-4">
                                            <a wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}" target="jobdesc">
                                            <img class="object-cover h-36 w-64"src="{{ $post->url }}">
                                            </a>
                                        </td>
                                        <td>
                                            <a class="text-slate-500 hover:text-blue-600" wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}" target="jobdesc">
                                            {{ $post->title }}
                                            <p>
                                                {!!Str::words($post->content, 20, '...') !!}
                                            </p>
                                            </a>
                                        </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">
                                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Selengkapnya
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                

                <div class="flex-auto m-2 w-96">

            <iframe name="jobdesc" class="h-full w-full" src="{{ url('dashboard/posts', $post->id) }}"></iframe>


</div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>