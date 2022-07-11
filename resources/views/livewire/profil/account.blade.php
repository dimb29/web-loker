<x-slot name="header">

</x-slot>

<x-slot name="footer">
</x-slot>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
</head>
<style>
.reveal {
  position: relative;
  opacity: 0;
}

.reveal.active {
  opacity: 1;
}
.active.fade-bottom {
  animation: fade-bottom 1s ease-in;
}
.active.fade-left {
  animation: fade-left 1s ease-in;
}
.active.fade-right {
  animation: fade-right 1s ease-in;
}
@keyframes fade-bottom {
  0% {
    transform: translateY(200px) scaleX(3);
    opacity: 0;
  }
  100% {
    transform: translateY(0);
    opacity: 1;
  }
}
@keyframes fade-left {
  0% {
    transform: translateX(-100px);
    opacity: 0;
  }
  100% {
    transform: translateX(0);
    opacity: 1;
  }
}

@keyframes fade-right {
  0% {
    transform: translateX(100px);
    opacity: 0;
  }
  100% {
    transform: translateX(0);
    opacity: 1;
  }
}

</style>

<div class=" bg-white">
      <section class="py-0" id="home">
        <div class="absolute top-0 left-0 w-full h-full bg-no-repeat z-0 mt-16" style="background-image:url(http://sayarajin.com/jobest/public/assets/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-sm-none" style="background-image:url(http://sayarajin.com/jobest/public/assets/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container py-72">
          <div class="flex flex-row">
            <div class="ml-2 sm:ml-48">
              <h1 class="mt-0 sm:mt-24 font-semibold text-4xl sm:text-6xl text-blue-800 text-center sm:text-left">Find your job better <br class="d-block d-lg-none d-xl-block" />and faster</h1>
              <p class="mx-2 sm:mx-0 text-2xl text-center sm:text-left mt-4">Find your best job better and faster with Sayarajin</p>

            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <div class="absolute w-full h-full bg-no-repeat z-0" style="background-image:url(http://sayarajin.com/jobest/public/assets/img/illustrations/bg.png);background-position:left top;background-size:initial;margin-top:-180px;">
        </div>
        <!--/.bg-holder-->

        <div class="container mx-auto reveal fade-left">
          <div class="flex flex-col sm:flex-row justify-center mx-8 sm:mx-48">
            <div class="w-full sm:w-1/2 animate__animated animate__bounceInLeft">
              <img class="img-fluid mb-4" src="{{ asset('jobest/public/assets/img/illustrations/passion.png') }}" alt="" />
            </div>
            <div class="ml-0 sm:ml-8 w-full sm:w-1/2 my-auto">
              <h6 class="text-4xl font-semibold text-blue-800 text-center sm:text-left">Find your passion and<br />achieve success</h6>
              <br>
              <p class="w-full sm:w-4/5 text-xl text-center sm:text-left"> find a job that suits your interests and talents. A high salary is not the top priority. Most importantly,You can work according to your heart's desire.</p>
            </div>
          </div>
        </div>
      </section>
      <section class="py-0">

        <div class="container mx-auto">


          <!-- ============================================-->
          <!-- <section> begin ============================-->
          <section class="py-12 sm:py-72">

            <div class="container reveal fade-right mx-auto">
              <div class="flex flex-col sm:flex-row justify-center mx-8 sm:mx-48">
                <div class="w-full sm:w-1/2 ml-0 sm:ml-38">
                  <img class="img-fluid mb-4 ml-0 sm:ml-72" src="{{ asset('jobest/public/assets/img/illustrations/jobs.png') }} " alt="" />
                </div>
                <div class="w-full sm:w-1/2 my-auto ml-0 sm:-ml-48">
                  <h6 class="w-full sm:w-4/5 text-4xl font-semibold text-blue-800 text-center sm:text-left ml-0 sm:-ml-80">Million of jobs, finds <br> the one thats rights for you</h6>
                  <p class="w-full sm:w-4/5 text-xl text-center sm:text-left ml-0 sm:-ml-80">Get your blood tests delivered at home collect a sample from the news your blood tests.</p>
                </div>
              </div>
            </div>
            <!-- end of .container-->

          </section>
          <!-- <section> close ============================-->
          <!-- ============================================-->


        </div>
        <!-- end of .container-->

      </section>
      <section class="py-12 reveal fade-bottom">
        <img class="w-100" src="{{ asset('jobest/public/assets/img/illustrations/come-on-join.png') }} " alt="" />
        <div class="container mx-auto">
          <div class="flex flex-col sm:flex-row justify-center">
            <div class="text-center">
              <h6 class="font-bold text-3xl sm:text-4xl">Come on, join with us !</h6>
              <p class="text-lg">Create an account and refer your friend </p>
            </div>
          </div>
        </div>
      </section>
  <section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
      <div class="flex flex-wrap w-full">
        <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 1</h2>
              <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
            </div>
          </div>
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 2</h2>
              <p class="leading-relaxed">Vice migas literally kitsch +1 pok pok. Truffaut hot chicken slow-carb health goth, vape typewriter.</p>
            </div>
          </div>
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <circle cx="12" cy="5" r="3"></circle>
                <path d="M12 22V8M5 12H2a10 10 0 0020 0h-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 3</h2>
              <p class="leading-relaxed">Coloring book nar whal glossier master cleanse umami. Salvia +1 master cleanse blog taiyaki.</p>
            </div>
          </div>
          <div class="flex relative pb-12">
            <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
              <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
            </div>
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">STEP 4</h2>
              <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
            </div>
          </div>
          <div class="flex relative">
            <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                <path d="M22 4L12 14.01l-3-3"></path>
              </svg>
            </div>
            <div class="flex-grow pl-4">
              <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
              <p class="leading-relaxed">Pitchfork ugh tattooed scenester echo park gastropub whatever cold-pressed retro.</p>
            </div>
          </div>
        </div>
        <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="https://dummyimage.com/1200x500" alt="step">
      </div>
    </div>
  </section>
</div>


<div class="sm:hidden flex flex-row fixed justify-center left-0 right-0 bottom-0">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/stylee.css') }}">

</head>

<bodyy>

    <ul class="nav">
        <span class="nav-indicator"></span>
        <li>
            <a class="animate-bounce nav-item-active" href="https://sayarajin.com/dashboard/account">
                <i class='bx bxs-contact' ></i>
                <span class="title">About Us</span>
            </a>
        </li>
        <li>
            <a href="https://sayarajin.com/dashboard/berita/sj_send=">
                <i class='bx bx-search'></i>
                <span class="title">Search</span>
            </a>
        </li>
        <li>
            <a href="https://sayarajin.com/">
            <i class="fa-regular fa-house-blank"></i>
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
  function reveal() {
  var reveals = document.querySelectorAll(".reveal");

  for (var i = 0; i < reveals.length; i++) {
    var windowHeight = window.innerHeight;
    var elementTop = reveals[i].getBoundingClientRect().top;
    var elementVisible = 150;

    if (elementTop < windowHeight - elementVisible) {
      reveals[i].classList.add("active");
    } else {
      reveals[i].classList.remove("active");
    }
  }
}

window.addEventListener("scroll", reveal);




let nav = document.querySelector('.nav')

nav.querySelectorAll('li a').forEach((a, i) => {
a.onclick = (e) => {
if (a.classList.contains('nav-item-active')) return

nav.querySelectorAll('li a').forEach(el => {
    el.classList.remove('nav-item-active')
})

a.classList.add('nav-item-active')

let nav_indicator = nav.querySelector('.nav-indicator')

nav_indicator.style.left = `calc(${(i * 80) + 40}px - 45px)`
}
})

</script>