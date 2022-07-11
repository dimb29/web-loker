
<x-slot name="header">
<div class="flex flex-col h-48">
    <img class="object-cover h-48 w-full" src="http://sayarajin.com/storage/photos/bghd.svg">
    </div>
</x-slot>
<x-slot name="footer">
</x-slot>

<div class="py-12 bg-yellow">
    <section class="h-52 -mt-40">
        <div class="flex sm:hidden max-w-full zind mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:search-index2>
        </div>
    </section>
    <section class="h-52 -mt-40">
        <div class="hidden sm:flex sticky max-w-full zind mx-auto px-4 sm:px-6 lg:px-8">
            <livewire:search-index>
        </div>
    </section>
    <div wire:loading wire:target="postDetail,delSaveJob,saveJob" class="fixed z-20 inset-0 place-content-center ">
        <div class="fixed justify-center h-full w-full opacity-25 bg-slate-300"> </div>
            <div class="flex justify-center my-72">
                <div class="my-48 dots">
                </div>
            </div>
    </div> 
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 pt-8">
    <div class="flex flex-row">
        <div class="flex-auto m-2 space-x-8 w-96">
            <div class="flex flex-col">
                <div class="flex-auto m-1">
                    <div class="flex flex-col">
                        @if($posts != '')
                            @foreach ($posts as $post)
                            <div class="mb-8 bg-white rounded-lg shadow-xl 
                                    mt-4 transition duration-150 transform hover:scale-110 hover:-translate-y-2 
                                    text-grey-500 hover:text-blue-500 cursor-pointer transition border-b border-r" 
                                    data-mdb-ripple="true" data-mdb-ripple-color="light">
                                <div wire:click="postDetail({{$post->id}})"
                                data-id="{{ $post->id}}" class="daft-job">
                                    <img class="object-cover h-48 w-screen rounded-lg"src="{{ url($post->images['0']['url']) }}">
                                    <div class="pt-6 px-6 -mt-4">
                                        <div wire:key="slider" id="slider" class="slider text-gray-900 text-xl -ml-4 font-semibold h-4">
                                            @php
                                            $postt = $post->postTitles;
                                            @endphp
                                            @for($i=0;$i < count($postt);$i++)
                                                <span>
                                                    {{$postt[$i]->title}}
                                                </span>
                                            @endfor
                                        </div>
                                        <h5 class="text-gray-900 text-md font-medium">
                                            {{ $post->author->first_name . ' ' . $post->author->last_name }}
                                        </h5>
                                        <h5 class="text-gray-900 text-md font-medium">
                                            @if($post->salary_check == 1)
                                            Rp {{ number_format($post->salary_start,0,',','.').' - Rp '.number_format($post->salary_end,0,',','.') }}
                                            @endif
                                        </h5>
                                        <h5 class="text-gray-900 text-md font-medium mb-8">
                                            @php
                                            $regens = $post->regency;
                                            for($i=0;$i < count($regens);$i++){
                                                if($i+1 == count($regens)){
                                                    echo ucwords(strtolower($regens[$i]->name));
                                                }else{
                                                    echo ucwords(strtolower($regens[$i]->name.", "));
                                                }
                                            }
                                            @endphp
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
                                @if(Auth::user() != null)
                                @php $getpostid = null @endphp
                                @foreach($simpan_job as $simjob)
                                @if($simjob->post_id == $post->id)
                                @php $getpostid = $simjob->post_id @endphp
                                @endif
                                @endforeach
                                @if($getpostid == $post->id)
                                    <div class="mb-2 text-right z-10 px-4">
                                        <button wire:click="delSaveJob({{$post->id}})" class="w-10 h-10 focus:outline-none rounded-3xl hover:bg-gray-300">
                                            <i class="fa-solid fa-bookmark"></i>
                                        </button>
                                    </div>
                                @else
                                    <div class="mb-2 text-right z-10 px-4">
                                        <button wire:click="saveJob({{$post->id}})" class="w-10 h-10 focus:outline-none rounded-3xl hover:bg-gray-300">
                                            <i class="fa-regular fa-bookmark"></i>
                                        </button>
                                    </div>
                                @endif
                                @endif
                            </div>
                            @endforeach
                        @endif
                    </div>
                    <span>
                        {{-- Next Page Link --}}
                        @if ($posts->hasMorePages())
                            <button wire:loading.attr="disabled" rel="next" class="nextpage relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                {!! __('pagination.next') !!}
                            </button>
                        @else
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                {!! __('pagination.next') !!}
                            </span>
                        @endif
                    </span>
                </div>
            </div>
        </div> 
                    @if($post_detail != null)

                        <div class="hidden space-x-8 sm:flex w-4/5 myframe">

                            

                            <div class="child top-0">

                            <livewire:post-data :post="$post_detail" :key="$post_detail['id']"/>

                            </div>

                        </div>

                    @else

                        <div class="hidden flex flex-col bg-white shadow-xl sm:rounded-lg mx-12 my-8 space-x-8 sm:flex w-4/5 myframe">

                            <div>

                                <img class="mx-72 mt-48 h-48 w-48" src="https://th.jobsdb.com/assets/2982a5e7e83c56a68c79.png">

                            </div>

                            <div class="w-full sm:m-10">

                            <h5 class="font-bold font-serif text-xl text-center mr-12">

                                We have 30,226 jobs for you

                            </h5>

                            <h5 class="font-medium font-serif text-xl text-center mr-12">

                                Select a job to view details

                            </h5>

                            </div>

                        </div>

                    @endif

                   

        </div>

    </div>

</div>


<div class="banner sm:hidden flex flex-row fixed justify-center left-0 right-0 bottom-0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylee.css') }}">

</head>

<bodyy>

    <ul class="nav">
        <span class="nav-indicator2"></span>
        <li>
            <a class="animate-bounce">
                <i class='bx bxs-contact' ></i>
                <span class="title">About Us</span>
            </a>
        </li>
        <li>
            <a href="https://sayarajin.com/dashboard/berita/sj_send=" class="nav-item-active">
                <i class='bx bx-search'></i>
                <span class="title">Search</span>
            </a>
        </li>
        <li>
            <a  href="https://sayarajin.com/">
                <i class='bx bx-home'></i>
                <span class="title">Homepage</span>
            </a>
        </li>
        <li>
            <a href="https://sayarajin.com/user/saveloker">
                <i class='bx bx-bookmark'></i>
                <span class="title">Bookmark</span>
            </a>
        </li>
        <li>
            <a >
                <i class='bx bx-user'></i>
                <span class="title">Account</span>
            </a>
        </li>
    </ul>


    <!-- https://css-tricks.com/gooey-effect/ -->

    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" id="filter-svg">
        <defs>
            <filter id="goo">
                <feGaussianBlur in="SourceGraphic" stdDeviation="10" result="blur" />
                <feColorMatrix in="blur" mode="matrix" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 18 -7" result="goo" />
                <feBlend in="SourceGraphic" in2="goo" />
            </filter>
        </defs>
    </svg>

    

</bodyy>
</div>
<script>
    document.addEventListener("nextPage", () => {
        Livewire.hook('component.initialized', (component) => {
        $('.slider').slick({
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            touchMove: true,
            autoplay: true,
            autoplaySpeed: 1000,
        });
        })
    })
$('.nextpage').click(function(){
    window.livewire.emit('nextPage');
})
    $(document).ready(function(){
    var myId = 1;
    window.livewire.on('nextPage', myId =>{
        $('.slider').slick({
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            draggable: true,
            touchMove: true,
            autoplay: true,
            autoplaySpeed: 1000,
        });
    })
    Livewire.hook('component.initialized', component => {
    //
})

        $('.daft-job').click(function(){

            var dataId = $(this).attr("data-id");

            console.log(dataId);

            var url = "{{url('dashboard/posts/')}}/"+dataId+" #post-frame";

            console.log(url);

            if($('.myframe').is(":visible")){

                // $('.myframe').load("{{url('dashboard/posts/')}}/"+dataId+" #post-frame");

            } else{

                window.open("{{url('dashboard/posts/')}}/"+dataId,'_blank');

            }

        })

            // window.onscroll = function (ev) {

            //     if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {

            //         $('.loadjob').show()

            //         window.livewire.emit('post-data');

            //     }

            // };

    });



var stickyOffset = $('.sticky').offset().top;

$(window).scroll(function(){
  var sticky = $('.sticky'),
      scroll = $(window).scrollTop();
    
  if (scroll >= stickyOffset) sticky.addClass('fixeddd');
  else sticky.removeClass('fixeddd');
});


let nav = document.querySelector('.nav')

nav.querySelectorAll('li a').forEach((a, i) => {
a.onclick = (e) => {
if (a.classList.contains('nav-item-active')) return

nav.querySelectorAll('li a').forEach(el => {
    el.classList.remove('nav-item-active')
})

a.classList.add('nav-item-active')

let nav_indicator = nav.querySelector('.nav-indicator2')

nav_indicator.style.left = `calc(${(i * 80) + 40}px - 45px)`
}
})

var lastScrollTop = 0;
$(window).scroll(function(){
  var st = $(this).scrollTop();
  var banner = $('.banner');
  setTimeout(function(){
    if (st > lastScrollTop){
      banner.addClass('hide');
    } else {
      banner.removeClass('hide');
    }
    lastScrollTop = st;
  }, 100);
});

</script>

<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/index.min.js"></script>

@livewireScripts