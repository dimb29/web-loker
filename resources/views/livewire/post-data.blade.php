<div class="mb-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="post-frame">
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
                <div class="daft-job flex-auto m-1">
                    <div class="grid grid-flow-col">
                        @foreach ($post['images'] as $image)
                            <div class="py-4">
                                <img class="h-72" src="{{ url($image->url) }}" alt="{{ $image->description }}" width="100%">
                            </div>
                        @endforeach
                    </div>
                    <div class="font-bold text-xl mb-2">
                        @php
                        $postt = $post->postTitles;
                        for($i=0;$i < count($postt);$i++){
                            if($i+1 == count($postt)){
                                echo $postt[$i]->title;
                            }else{
                                echo $postt[$i]->title." - ";
                            }
                        }
                        @endphp
                    </div>
                    <div class="text-md">
                        @if($post->salary_check == 1)
                        Rp {{ number_format($post->salary_start,0,',','.').' - Rp '.number_format($post->salary_end,0,',','.') }}
                        @endif
                    </div>
                    <div class="flex">
                        by&nbsp;<span class="italic">{{ $post->author->first_name . ' ' . $post->author->last_name }}</span>
                        &nbsp;on&nbsp;{{ $post->updated_at->format('F, d Y') }}
                    </div>
                    <div id="content" class="text-gray-700 text-base m-auto" readonly="readonly">
                        <p>{!! $post->content !!}</p>
                    </div>

                    <div class="flex m-5">
                        <div class="flex flex-col">
                            <div class="flex flex-auto mt-10">
                                <div class="text-xl font-medium">Informasi Tambahan :</div>
                                
                            </div>
                            <div class="flex flex-row mt-5">
                                <div class="w-96 h-24">
                                    <p class="font-bold"> Tingkat Pekerjaan </p>
                                    @php
                                    $tingkatkerja = $post->tingkatkerja;
                                    @endphp
                                    @for($i=0;$i < count($tingkatkerja);$i++)
                                        @if($i+1 == count($tingkatkerja))
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$tingkatkerja[$i]->name_tk}}
                                        </a>
                                            @else
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$tingkatkerja[$i]->name_tk}}
                                        </a>
                                        <br>
                                        @endif
                                    @endfor
                                </div>
                                <div class="w-64 h-24">
                                    <p class="font-bold"> Pengalaman kerja </p>
                                    @php
                                    $pengalamankerja = $post->pengalamankerja;
                                    @endphp
                                    @for($i=0;$i < count($pengalamankerja);$i++)
                                        @if($i+1 == count($pengalamankerja))
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$pengalamankerja[$i]->name_pk}}
                                        </a>
                                            @else
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$pengalamankerja[$i]->name_pk}}
                                        </a>
                                        <br>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-96 h-24">
                                    <p class="font-bold"> Kualifikasi </p>
                                    @php
                                    $kualifikasilulus = $post->kualifikasilulus;
                                    @endphp
                                    @for($i=0;$i < count($kualifikasilulus);$i++)
                                        @if($i+1 == count($kualifikasilulus))
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$kualifikasilulus[$i]->name_kl}}
                                        </a>
                                            @else
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$kualifikasilulus[$i]->name_kl}}
                                        </a>
                                        <br>
                                        @endif
                                    @endfor
                                </div>
                                <div class="w-64 h-24">
                                    <p class="font-bold"> Jenis Pekerjaan </p>
                                    <a href="{{ url('dashboard/tags/posts') }}"
                                        class="underline px-1">
                                        @foreach($post->jeniskerja as $jeniskerja)
                                        {{$jeniskerja->name_jk}}
                                        @endforeach
                                    </a>
                                </div>
                            </div>
                            <div class="flex flex-row">
                                <div class="w-96 h-24">
                                    <p class="font-bold"> Spesialisasi pekerjaan </p>
                                    @php
                                    $spesialiskerja = $post->spesialiskerja;
                                    @endphp
                                    @for($i=0;$i < count($spesialiskerja);$i++)
                                        @if($i+1 == count($spesialiskerja))
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$spesialiskerja[$i]->name_sk}}
                                        </a>
                                            @else
                                        <a href="{{ url('dashboard/tags/posts') }}"
                                            class="underline px-1">
                                                {{$spesialiskerja[$i]->name_sk}}
                                        </a>
                                        <br>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                                <div class="flex flex-row">
                                    <div class="w-96 h-24">
                                    <p class="font-bold"> 
                                        <i class="fa-solid fa-share-nodes"></i> Bagikan
                                    </p>
                                    <button id="copy_link" data-link="{{url('dashboard/posts/'.$post->id)}}" class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-indigo-700 rounded-3xl focus:shadow-outline hover:bg-indigo-800">
                                        <i class="fa-solid fa-link"></i>
                                    </button>
                                    <a href="https://twitter.com/intent/tweet?original_referer=http%3A%2F%2Flocalhost%3A8000%2F&ref_src=twsrc%5Etfw%7Ctwcamp%5Ebuttonembed%7Ctwterm%5Eshare%7Ctwgr%5E&text=Lowongan Kerja Sebagai {{$post->title}} di &url={{url('dashboard/posts/'.$post->id)}}">
                                        <button class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-indigo-700 rounded-3xl focus:shadow-outline hover:bg-indigo-800">
                                            <i class="fa-brands fa-twitter"></i>
                                        </button>
                                    </a>
                                    <a href="https://api.whatsapp.com/send/?text=Lowongan Kerja Sebagai {{$post->title}} di | {{url('dashboard/posts/'.$post->id)}}" data-action="share/whatsapp/share" target="_blank">
                                    <button class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-green-400 rounded-3xl focus:shadow-outline hover:bg-indigo-800">
                                        <i class="fa-brands fa-whatsapp"></i>
                                    </button>    
                                    </a>
                                    <a href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u={{url('dashboard/posts/'.$post->id)}}&display=popup&ref=plugin&src=share_button" target="_blank">    
                                    <button class="w-8 h-8 text-indigo-100 transition-colors p-1 duration-150 bg-indigo-700 rounded-3xl focus:shadow-outline hover:bg-indigo-800">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </button>  
                                    </a>
                                    </div>
                                </div>
                                <div class="flex flex-row">
                                    <div id="copy_notif" class="flex items-center bg-blue-500 text-white text-sm font-bold px-4 py-3" role="alert">
                                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.432 0c1.34 0 2.01.912 2.01 1.957 0 1.305-1.164 2.512-2.679 2.512-1.269 0-2.009-.75-1.974-1.99C9.789 1.436 10.67 0 12.432 0zM8.309 20c-1.058 0-1.833-.652-1.093-3.524l1.214-5.092c.211-.814.246-1.141 0-1.141-.317 0-1.689.562-2.502 1.117l-.528-.88c2.572-2.186 5.531-3.467 6.801-3.467 1.057 0 1.233 1.273.705 3.23l-1.391 5.352c-.246.945-.141 1.271.106 1.271.317 0 1.357-.392 2.379-1.207l.6.814C12.098 19.02 9.365 20 8.309 20z"/></svg>
                                        <p>Tautan berhasil disalin.</p>
                                    </div>
                                </div>
                        </div>
                </div>
        </div>
    </div>
</div>

<div class="mb-12 mt-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" id="post-frame">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
                <div class="flex flex-col sm:w-full overflow-x-auto sm:overflow-hidden">
                    <div class="flex flex-auto my-4">
                        <p class="text-xl font-medium ml-4">Kirim Lamaran</p>                
                    </div>
                    <div class="flex flex-row ml-4 sm:w-full">
                        <div class="place-self-center">
                            <i class="place-self-center fa-solid fa-envelope text-lg"></i>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">Email</p>
                        </div>
                        <div>
                            <p class="ml-12 text-lg">:</p>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">{{ $post->email}}</p>
                        </div>
                    </div>
                    <div class="flex flex-row ml-4 sm:w-full">
                        <div class="place-self-center">
                            <i class="place-self-center fa-brands fa-whatsapp fa-lg"></i>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">Whatsapp</p>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">:</p>
                        </div>
                        <div>
                            <p class="ml-2 text-lg">{{ $post->wa}}</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
<a href="#top">
<lord-icon
    src="https://cdn.lordicon.com/msoeawqm.json"
    trigger="loop"
    colors="primary:#ffffff,secondary:#08a88a"
    style="width:32px;height:32px"
    class="ml-4 -mb-16">
</lord-icon>
<button type="button" class="w-full text-white bg-gradient-to-r from-cyan-400 via-cyan-500 to-cyan-600 hover:shadow-lg shadow-cyan-500/50 hover:from-cyan-500 hover:to-cyan-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">
Cari Loker Lainnya</button>
</a>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .then( editor => {
            const toolbarElement = editor.ui.view.toolbar.element;
            toolbarElement.style.display = "none";
            editor.enableReadOnlyMode( '#content' );
        } )
        .catch(error => {
            console.error(error);
        });

$(document).ready(function(){
    $('#copy_notif').hide();
    $('#comment_like').on('click',function(){
        $('#comment_like').removeClass('fa-regular');
        $('#comment_like').addClass('fa-solid');
        console.log(<?php $post->comment ?> + 'bisa yok');
    });
    $('#copy_link').on('click',function(){
        var copyText = $(this).attr('data-link')
        navigator.clipboard.writeText(copyText);
        $('#copy_notif').fadeIn();
        $('#copy_notif').delay(1000).fadeOut();

    })
});
</script>