<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Post
    </h2>
</x-slot>

<x-slot name="footer">
</x-slot>
<div class="py-12" >
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="py-12">
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
            
            


           
                <div class="flex-auto m-1">
                    <div class="grid grid-flow-col">
                    @foreach ($post->images as $image)
                        <div class="py-4">
                            <img class="h-72" src="{{ $image->url }}" alt="{{ $image->description }}" width="100%">
                        </div>
                    @endforeach
                </div>
                <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                <div class="flex">
                    by&nbsp;<span class="italic">{{ $post->author->first_name . ' ' . $post->author->last_name }}</span>
                    &nbsp;in&nbsp;<a href="{{ url('dashboard/categories/' . $post->category->id . '/posts') }}"
                        class="underline">{{ $post->category->title }}</a>
                    &nbsp;on&nbsp;{{ $post->updated_at->format('F, d Y') }}
                </div>
                
                <div id="content" class="text-gray-700 text-base m-auto" readonly="readonly">
                    <p>{!! $post->content !!}</p>
                </div>



                <div class="flex m-5">
                    @php
                    $tags=$post->tags->pluck('id', 'title');
                    @endphp
                    @if (count($tags) > 0)
                        @foreach ($tags as $key => $tag)
        <table>
		<tr>
			<td>Informasi Tambahan :</td>
			
		</tr>
		<tr>
			<td class="w-64 h-24">
            <p class="font-bold"> Tingkat Pekerjaan </p>
            <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                class="underline px-1">{{ $key }}
            </a>
            </td>
			<td class="w-64 h-24">
            <p class="font-bold"> Pengalaman kerja </p>
            <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                class="underline px-1">{{ $key }}
            </a>
            </td>
		</tr>
		<tr>
        <td class="w-64 h-24">
        <p class="font-bold"> Kualifikasi </p>
            <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                class="underline px-1">{{ $key }}
            </a>
            </td>
			<td class="w-64 h-24">
            <p class="font-bold"> Jenis Pekerjaan </p>
            <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                class="underline px-1">{{ $key }}
            </a>
            </td>
		</tr>
        <tr>
            <td class="w-64 h-24">
            <p class="font-bold"> Spesialisasi pekerjaan </p>
            <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                class="underline px-1">{{ $key }}
            </a>
            </td>
			<td class="w-64 h-24">
            <p class="font-bold"> Industri </p>
            <a href="{{ url('dashboard/tags/' . $tag . '/posts') }}"
                class="underline px-1">{{ $key }}
            </a>
            </td>
		</tr>
	</table>
                            
                        @endforeach
                    @endif
                </div>
                
            
                        
                        <div>
                        </div>
    
                            
                        </div>
                    </div>
                </div>
   
            </div>
        </div>
    </div>
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
    $('#comment_like').on('click',function(){
        $('#comment_like').removeClass('fa-regular');
        $('#comment_like').addClass('fa-solid');
        console.log(<?php $post->comment ?> + 'bisa yok');
    });
});
</script>