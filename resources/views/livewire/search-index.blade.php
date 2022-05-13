<div class="max-w-md">
    <div class="flex flex-row">
        <div class="flex-auto">
            <input id="searchtitle" wire:model="searchtitle" data-toggle="modal" data-target="#searchmodaltitle" type="text" class="mt-3 mb-2 shadow appearance-none border rounded w-full max-w-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search news">
        </div>
        <div class="flex-auto">
            <input id="searchloc" wire:model="searchloc" data-toggle="modal" data-target="#searchmodalloc" type="text" class="mt-3 mb-2 shadow appearance-none border rounded w-full max-w-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search news">
        </div>
        <div class="flex-auto">
            <input id="searchjob" wire:model="searchjob" data-toggle="modal" data-target="#searchmodaljob" type="text" class="mt-3 mb-2 shadow appearance-none border rounded w-full max-w-md py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Search news">
        </div>
    </div>
    <div id="searchmodaltitle" class="fixed modal z-10 bg-white rounded rounded-b">
        <div class="bg-white py-3 px-2 shadow focus:shadow-outline">
            <table class="table-auto">
                <tbody>
                    @foreach ($postsearch as $post)
                    <livewire:search-single :search="$post" :key="$post->id"/>
                    @endforeach
                </tbody>
            </table>
            {{$posts->links()}}
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
    $("#searchmodaltitle").hide();
    $("#searchtitle").on('keyup',function(){
        $("#searchmodaltitle").show();
    });
});
</script>