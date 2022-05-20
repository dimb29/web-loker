<x-slot name="header">
    <div class="flex flex-col h-48">
    <img class="object-cover h-48 w-fit" src="https://cdn.vectorstock.com/i/1000x1000/17/52/professional-workers-different-jobs-professionals-vector-31651752.webp">
    </div>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12 bg-yellow">
<div class="flex-auto ">
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 -mt-48">
            <div class="sm:-my-px sm:ml-10 sm:flex">
                <livewire:search-index>
            </div>
        </div>
</div>
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
            <div class="p-4">
                <div class="slider grid grid-flow-row grid-cols-4 m-4 gap-4">
                    @foreach ($trend as $post)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg hover:bg-gray-300">
                            <div class="p-2 rounded-lg text-slate-500 hover:text-blue-600 transition duration-150 transform hover:scale-90">
                                <a wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}">
                                    <p class="text-gray-400 font-medium">Dibutuhkan</p>
                                    <p class="w-18 overflow-hidden h-5 font-bold">{{ $post->title }}</p>
                                    <img class="object-cover h-48 w-96" src="{{ $post->url }}">
                                    <div class="font-bold text-sm mb-2 truncate">
                                        <i class="fa-solid fa-gopuram"></i>
                                        {{ $post->title }}
                                    </div>
                                </a>
                            </div>
                        </div>
                @endforeach
                </div>
            </div>
            


            <div class="flex flex-row">
                <div class="flex-auto"></div>
                <div class="flex-auto m-2 w-1/4">
                    <div class="flex flex-col">
                        <div class="flex-auto m-1">
                            <table class="table-auto">
                                <tbody>
                                    @foreach ($posts->skip(0)->take(5) as $post)
                                        <tr data-id="{{ $post->id}}" class="daft-job hover:bg-gray-300 text-grey-500 hover:text-blue-500 cursor-pointer transition duration-150 transform hover:scale-90 border-b border-r">
                                            <td class="w-72 pr-4 py-8">
                                                <img class="object-cover h-36 w-64" src="{{ $post->url }}">
                                            
                                            
                                                {{ $post->title }}
                                                <p>
                                                    by {!! $post->first_name !!} {!! $post->last_name !!}
                                                    &nbsp;on&nbsp;{{ $post->updated_at->format('Y-m-d H:i:s') }}
                                    <br>                
                                    {{gmdate('i',$thistime->diffInSeconds($post->updated_at))}} menit yang lalu
                                    <br>                
                                    {{gmdate('H',$thistime->diffInSeconds($post->updated_at))}} jam yang lalu
                                    <br>
                                    {{gmdate('z',$thistime->diffInSeconds($post->updated_at))}} hari yang lalu
                                    <br>
                                    {{gmdate('m',$thistime->diffInSeconds($post->updated_at))}} bulan yang lalu
                                                </p>
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
                <div class="hidden space-x-8 sm:flex w-4/5 myframe">
                    <!-- <iframe name="jobdesc" class="h-full w-full" src="{{ url('dashboard/posts', $post->id,'#post-frame') }}"></iframe> -->
                </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){
        $('.daft-job').click(function(){
            var dataId = $(this).attr("data-id");
            console.log(dataId);
            var url = "{{url('dashboard/posts/')}}/"+dataId+" #post-frame";
            console.log(url);
            if($('.myframe').is(":visible")){
                $('.myframe').load("{{url('dashboard/posts/')}}/"+dataId+" #post-frame");
            } else{
                window.open("{{url('dashboard/posts/')}}/"+dataId,'_blank');
            }
        })
    $('.slider').slick({
        arrows: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        draggable: true,
        touchMove: true,
        autoplay: true,
        autoplaySpeed: 2000,
    });
    });
</script>