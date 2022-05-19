<div class="max-w-md">
    <div class="flex flex-row">
        <div class="pr-4">
            <input type="search" id="search-title" list="title-list" name="searchtitle"
            class="shadow w-96 h-8">
            <datalist id="title-list">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
            </datalist>
        </div>
    </div>
</div>


        
        <div class="pr-4">
            <select id="searchjobcat" name="states[]"
            class="select2-jobcat-multiple w-full" multiple
            placeholder="Search news">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex">
            <select id="searchjobtype" name="states[]"
            class="select2-jobtype-multiple w-full" multiple
            placeholder="Search news">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
            </select>
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







        <div>
    <input type="text" name="name" placeholder="Search..."
        class="w-1/3 py-2 border-b-2 border-gray-600 outline-none focus:border-green-400">
</div>
<div>
    <input type="text" name="name" placeholder="Search..."
        class="w-1/3 py-2 border-b-2 border-green-600 outline-none focus:border-blue-400">
</div>
<div>
    <input type="text" name="name" placeholder="Search..."
        class="w-1/3 py-2 border-b-2 border-blue-600 outline-none focus:border-yellow-400">
</div>
</div>

<br><br><br><br>

<div class="w-full md:w-2/3 shadow p-5 rounded-lg bg-white">
  <div class="relative">
	<div class="absolute flex items-center ml-2 h-full">
	  <svg class="w-4 h-4 fill-current text-primary-gray-dark" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
		<path d="M15.8898 15.0493L11.8588 11.0182C11.7869 10.9463 11.6932 10.9088 11.5932 10.9088H11.2713C12.3431 9.74952 12.9994 8.20272 12.9994 6.49968C12.9994 2.90923 10.0901 0 6.49968 0C2.90923 0 0 2.90923 0 6.49968C0 10.0901 2.90923 12.9994 6.49968 12.9994C8.20272 12.9994 9.74952 12.3431 10.9088 11.2744V11.5932C10.9088 11.6932 10.9495 11.7869 11.0182 11.8588L15.0493 15.8898C15.1961 16.0367 15.4336 16.0367 15.5805 15.8898L15.8898 15.5805C16.0367 15.4336 16.0367 15.1961 15.8898 15.0493ZM6.49968 11.9994C3.45921 11.9994 0.999951 9.54016 0.999951 6.49968C0.999951 3.45921 3.45921 0.999951 6.49968 0.999951C9.54016 0.999951 11.9994 3.45921 11.9994 6.49968C11.9994 9.54016 9.54016 11.9994 6.49968 11.9994Z"></path>
	  </svg>
	</div>

	<input type="text" placeholder="Search by listing, location, bedroom number..." 
    class="px-8 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
	  </div>

	<div class="flex items-center justify-between mt-4">
	  <p class="font-medium">
		Filters
	  </p>

	  <button class="px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 text-sm font-medium rounded-md">
		Reset Filter
	  </button>
	</div>

	<div>
	  <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-4 mt-4">
		<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm ">
		        <option value="">All Job Categories</option>
		  @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
		  <!-- <option value="for-sale">For Sale</option> -->
		</select>

		<select id="searchtitle" name="states[]" class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Furnish Type</option>
		  <option value="fully-furnished">Fully Furnished</option>
		  <option value="partially-furnished">Partially Furnished</option>
		  <option value="not-furnished">Not Furnished</option>
		</select>

		<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Any Price</option>
		  <option value="1000">RM 1000</option>
		  <option value="2000">RM 2000</option>
		  <option value="3000">RM 3000</option>
		  <option value="4000">RM 4000</option>
		</select>

		<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Floor Area</option>
		  <option value="200">200 sq.ft</option>
		  <option value="400">400 sq.ft</option>
		  <option value="600">600 sq.ft</option>
		  <option value="800 sq.ft">800</option>
		  <option value="1000 sq.ft">1000</option>
		  <option value="1200 sq.ft">1200</option>
		</select>

		<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Bedrooms</option>
		  <option value="1">1 bedroom</option>
		  <option value="2">2 bedrooms</option>
		  <option value="3">3 bedrooms</option>
		  <option value="4">4 bedrooms</option>
		  <option value="5">5 bedrooms</option>
		</select>

		<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Bathrooms</option>
		  <option value="1">1 bathroom</option>
		  <option value="2">2 bathrooms</option>
		  <option value="3">3 bathrooms</option>
		  <option value="4">4 bathrooms</option>
		  <option value="5">5 bathrooms</option>
		</select>

		<select class="px-4 py-3 w-full rounded-md bg-gray-100 border-transparent focus:border-gray-500 focus:bg-white focus:ring-0 text-sm">
		  <option value="">Bathrooms</option>
		  <option value="1">1 space</option>
		  <option value="2">2 space</option>
		  <option value="3">3 space</option>
		</select>
	  </div>
	</div>
  </div>

<script>
    $(document).ready(function(){
        $("#searchmodaltitle").hide();
        $("#searchtitle").on('keyup',function(){
            $("#searchmodaltitle").show();
        });
        $('.select2-title-single').select2({
            placeholder: "Select your Location"
        });
        $('.select2-jobcat-multiple').select2({
            placeholder: "Select your Location"
        });
        $('.select2-jobtype-multiple').select2({
            placeholder: "Select your Location"
        });
    });
</script>