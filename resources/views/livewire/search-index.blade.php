<div class="max-w-md">
    <div class="flex flex-row">
        <div class="pr-4">
            <select id="searchtitle" name="states[]"
            class="select2-title-single shadow hover:text-blue w-full"
            placeholder="Search news">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
            </select>
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