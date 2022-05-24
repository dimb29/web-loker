<x-slot name="header">
    <div class="flex flex-col h-48">
    <img class="object-cover h-48 w-full" src="http://localhost:8000/storage/photos/jobicon.jpg">
    </div>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12 bg-yellow">
<div class="flex-auto ">
<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 -mt-40">
            <div class=" justify-center">
                <livewire:search-index>
            </div>
        </div>
</div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-15">
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


            <div class="p-6">
                <div class="slider ">
                    @foreach ($trend as $post)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg hover:bg-gray-300 m-8
                        rounded-lg hover:text-blue-600 hover:scale-110 transition duration-300 ease-in-out">
                                <a wire:click="countview({{ $post->id}})" href="{{ url('dashboard/posts', $post->id) }}">
                                    
                                    <img class="object-cover h-48 w-96" src="{{ $post->url }}">
                                    <div class="p-6">
                                        <h5 class="text-gray-900 text-xl font-medium mb-2 h-16 pb-4">{{ $post->title }}</h5>
                                        <p class="text-gray-500 text-base mb-4">
                                        PT Istana Kemakmuran Motor
                                        </p>
                                    </div>
                                    <div div="grid grid-cols-2 gap-4">
                                        <div class="p-6 font-medium text-sm text-gray-400">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            SMA/SMK
                                        </div>
                                        <div class="p-6 font-medium text-sm text-gray-400">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            SMA/SMK
                                        </div>
                                    </div>
                                </a>
                            
                        </div>
                @endforeach
                </div>
            </div>
</div>
            





<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8">
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
                
                <div class="flex-auto m-2 space-x-8 w-96">
                    <div class="flex flex-col">
                        <div class="flex-auto m-1">
                            <div class="flex flex-col">
                                    @foreach ($posts as $post)
                                        <div data-id="{{ $post->id}}" class="daft-job rounded-lg shadow-xl my-6 hover:scale-110 transition duration-300 ease-in-out 
                                                text-grey-500 hover:text-blue-500 cursor-pointer transition border-b border-r" data-mdb-ripple="true" data-mdb-ripple-color="light">
                                                <img class="object-cover h-48 w-96 rounded-lg"src="{{ $post->url }}">
                                                <div class="p-6 -mt-4">
                                                    <h5 class="text-gray-900 text-xl font-medium mb-2 h-16 pb-4 mb-8">
                                                        {{ $post->title }}
                                                    </h5>
                                                <p>
                                                    @php
                                                    $minutes = $thistime->diffInMinutes($post->updated_at);
                                                    $hours = $thistime->diffInHours($post->updated_at);
                                                    $days = $thistime->diff($post->updated_at)->days;
                                                    $weeks = $thistime->diffInWeeks($post->updated_at);
                                                    $months = $thistime->diffInMonths($post->updated_at);
                                                    $years = $thistime->diffInYears($post->updated_at);
                                                    @endphp
                                                    @if($minutes <= 60)
                                                        {{$minutes}} menit yang lalu
                                                    @elseif($hours <= 24)
                                                        {{$hours}} jam yang lalu
                                                    @elseif($days <= 7)
                                                        {{$days}} hari yang lalu
                                                    @elseif($weeks <= 4)
                                                        {{$weeks}} minggu yang lalu
                                                    @elseif($months <= 12)
                                                        {{$months}} bulan yang lalu
                                                    @else
                                                        {{$years}} tahun yang lalu
                                                    @endif
                                                </p>
                                                </div>
                                            </div>
                                    @endforeach
                                    <div>
                                        <div colspan="2">
                                            <button class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                                Selengkapnya
                                            </button>
</div>
</div>
</div>
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
    if($('.myframe').is(":visible")){
        $('.slider').slick({
            arrows: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            draggable: true,
            touchMove: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }else{
        $('.slider').slick({
            arrows: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            touchMove: true,
            autoplay: true,
            autoplaySpeed: 2000,
        });
    }

        (function(){
            var width = screen.width,
            height = screen.height;
            
            setInterval(function () {
                if (screen.width !== width || screen.height !== height) {
                    width = screen.width;
                    height = screen.height;
                    $(window).trigger('resolutionchange');
                    alert("resolution change")
                }
            }, 50);
        }());
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>