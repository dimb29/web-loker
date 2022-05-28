
<x-slot name="header">
<div class="sticky top-0 justify-center">
                <livewire:search-index>
            </div>
</x-slot>
<x-slot name="footer">
</x-slot>
            

<div class="flex flex-row mx-52">
                        
                        <div class="flex-auto m-2 space-x-8 w-96">
                            <div class="flex flex-col">
                                <div class="flex-auto m-1">
                                    <div class="flex flex-col">
                                            @foreach ($posts as $post)
                                                <div wire:click="postDetail({{$post->id}})"
                                                data-id="{{ $post->id}}" class="daft-job bg-white rounded-lg shadow-xl my-6 transition duration-150 transform hover:scale-110 hover:-translate-y-2 
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
                        @if($post_detail != null)
                        <div class="hidden space-x-8 sm:flex w-4/5">
                            <div class="child top-0">
                            <livewire:post-data :post="$post_detail" :key="$post_detail['id']"/>
                            </div>
                        </div>
                        @else
                            <div class="hidden space-x-8 sm:flex w-4/5 myframe">
                                <!-- <iframe name="jobdesc" class="h-full w-full" src="{{ url('dashboard/posts', $post->id,'#post-frame') }}"></iframe> -->
                            </div>
                        @endif
                    </div>
                </div>
            </div>

<script>
    $(document).ready(function(){
        // $('.daft-job').click(function(){
        //     var dataId = $(this).attr("data-id");
        //     console.log(dataId);
        //     var url = "{{url('dashboard/posts/')}}/"+dataId+" #post-frame";
        //     console.log(url);
        //     if($('.myframe').is(":visible")){
        //         $('.myframe').load("{{url('dashboard/posts/')}}/"+dataId+" #post-frame");
        //     } else{
        //         window.open("{{url('dashboard/posts/')}}/"+dataId,'_blank');
        //     }
        // })
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
        var ApiWilIndo = "https://dev.farizdotid.com/api/daerahindonesia/"
        $.get(ApiWilIndo + 'provinsi',  // url
        function (data, textStatus, jqXHR) {  // success callback
            console.log(data)
            var i;
            for(i=0; i < data.provinsi.length; i++){
                // console.log(data.provinsi[i])
                datprov = data.provinsi[i]
                var apdata = '<option value="'+datprov.id+'">'+datprov.nama+'</option>'
                // console.log(apdata)
                $('#sel-loc').append(apdata)
            }
        });
            window.onscroll = function (ev) {
                if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
                    window.livewire.emit('post-data');
                }
            };
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>
@livewireScripts