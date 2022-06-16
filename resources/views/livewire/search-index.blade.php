<div class="flex justify-center ...">
<div class="w-full md:w-5/6 shadow-xl p-5 rounded-lg bg-white">
  <div class="relative">
	<div class="absolute flex items-center ml-2 h-full">
	  <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
	  </svg>
	</div>

	<input type="search" id="search-title" list="title-list" wire:model="searchjob" name="searchjob" type="text" placeholder="Cari berdasarkan posisi pekerjaan, kata kunci, atau nama perusahaan" 
	class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
	<datalist id="title-list">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
            </datalist>
	  </div>

	<div class="flex items-center justify-between mb-6 mt-4">
	
		
		<button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md active:shadow-lg transition duration-150 ease-in-out" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
			Filters
		</button>
		
		<button wire:click="searchJob()" data-mdb-ripple="true"
			data-mdb-ripple-color="light"
			class="w-48 justify-end inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-md shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800">
			SEARCH
		</button>
		
	</div>
	<!-- px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md -->
	<!-- inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 -->

	<div class="collapse collapse-horizontal" id="collapseWidthExample">
	

	<div>
	  <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
		<input type="search" id="search-title" list="job-list" wire:model.defer="locations" name="locations" type="text" placeholder=" Semua Lokasi" 
		class="px-4 py-3 pholderc w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		<datalist id="job-list">
			@foreach($cities as $kota)
				<option value="{{ ucwords(strtolower($kota['name'])) }}">
					{{ ucwords(strtolower($kota['name'])) }}
				</option>
			@endforeach
		</datalist>

		<select wire:model.defer="kualif_lulus"
		class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Semua Lulusan</option>
			@foreach ($kualifs as $kualif)
                <option value="{{$kualif->id}}">{{$kualif->name_kl}}</option>
        	@endforeach
		</select>

		<select wire:model.defer="jenis_kerja"
		class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Semua Jenis Pekerjaan</option>
			@foreach ($jenkers as $jenker)
                <option value="{{$jenker->id}}">{{$jenker->name_jk}}</option>
        	@endforeach
		  </select>

		<button
				type="button"
				data-mdb-ripple="true"
				data-mdb-ripple-color="light"
				wire:click="resetFilter()"
				class="px-4 py-3 w-full rounded-md border-transparent focus:border-gray-500 focus:ring-0 text-sm inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md
				hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out"
			>Reset Filter
		</button>
	  </div>
	</div>
  </div>
</div>
</div>
<script>
$(document).ready(function() {
    $('.sel-loc').select2();
});
</script>