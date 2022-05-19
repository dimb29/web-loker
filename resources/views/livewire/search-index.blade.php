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