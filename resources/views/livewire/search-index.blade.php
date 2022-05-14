<div class="max-w-md">
    <div class="flex flex-row">
        <div class="flex-auto">
            <select id="searchtitle" name="states[]"
            class="select2-title-single shadow hover:text-blue" style="width:50%"
            placeholder="Search news">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-auto">
            <select id="searchjobcat" name="states[]"
            class="select2-jobcat-multiple" multiple
            placeholder="Search news">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-auto">
            <select id="searchjobtype" name="states[]"
            class="select2-jobtype-multiple" multiple
            placeholder="Search news">
                 @foreach ($postsearch as $post)
                <option value="{{$post->title}}">{{$post->title}}</option>
                @endforeach
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