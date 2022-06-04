
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Filters
    </h2>
</x-slot>
<x-slot name="footer">
</x-slot>
<div class="py-12">
    <!-- Jenis Kerja -->
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message_jk'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message_jk') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <p>Jenis Pekerjaan</p>
            <button
                data-name="jk"
                class="content-filters inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Create New
            </button>
                @include('livewire.filter.create')
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($jenkers as $jenker)
                    <tr>
                        <td class="border px-4 py-2"><?php echo $count++; ?></td>
                        <td class="border px-4 py-2">{{ $jenker->name_jk }}</td>
                        <td class="border px-4 py-2">
                        <button
                            data-name="jk" data-val="{{ $jenker->name_jk }}" data-id="{{ $jenker->id }}"
                            class="get-edti-val inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </button>
                        <a href="{{ url('dashboard/berita/jk_send='. $jenker->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Show All Posts
                        </a>
                        <button
                            wire:click="delete_jk({{ $jenker->id }})"
                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            Delete
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Jenis Kerja -->

    <!-- Kualifiaksi Lulus -->
    <div class="mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message_kl'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message_kl') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <p>Kualifikasi Lulusan</p>
            <button
                data-name="kl"
                class="content-filters inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Create New
            </button>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($kualifs as $kualif)
                    <tr>
                        <td class="border px-4 py-2"><?php echo $count++; ?></td>
                        <td class="border px-4 py-2">{{ $kualif->name_kl }}</td>
                        <td class="border px-4 py-2">
                        <button
                            data-name="kl" data-val="{{ $kualif->name_kl }}" data-id="{{ $kualif->id }}"
                            class="get-edti-val inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </button>
                        <a href="{{ url('dashboard/berita/kl_send='. $kualif->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Show All Posts
                        </a>
                        <button
                            wire:click="delete_kl({{ $kualif->id }})"
                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            Delete
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Kualifikasi Lulus -->

    <!-- Pengalaman Kerja -->
    <div class="mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message_pk'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message_pk') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <p>Pengalaman Kerja</p>
            <button
                data-name="pk"
                class="content-filters inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Create New
            </button>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($pengkerjas as $pengkerja)
                    <tr>
                        <td class="border px-4 py-2"><?php echo $count++; ?></td>
                        <td class="border px-4 py-2">{{ $pengkerja->name_pk }}</td>
                        <td class="border px-4 py-2">
                        <button
                            data-name="pk" data-val="{{ $pengkerja->name_pk }}" data-id="{{ $pengkerja->id }}"
                            class="get-edti-val inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </button>
                        <a href="{{ url('dashboard/berita/pk_send='. $pengkerja->id)}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Show All Posts
                        </a>
                        <button
                            wire:click="delete_pk({{ $pengkerja->id }})"
                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            Delete
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Pengalaman Kerja -->

    <!-- Spesialis Kerja -->
    <div class="mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message_sk'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message_sk') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <p>Spesialis Kerja</p>
            <button
                data-name="sk"
                class="content-filters inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Create New
            </button>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($spesialises as $spesialis)
                    <tr>
                        <td class="border px-4 py-2"><?php echo $count++; ?></td>
                        <td class="border px-4 py-2">{{ $spesialis->name_sk }}</td>
                        <td class="border px-4 py-2">
                        <button
                            data-name="sk" data-val="{{ $spesialis->name_sk }}" data-id="{{ $spesialis->id }}"
                            class="get-edti-val inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </button>
                        <a href="{{ url('dashboard/berita/sk_send='. $spesialis->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Show All Posts
                        </a>
                        <button
                            wire:click="delete_sk({{ $spesialis->id }})"
                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            Delete
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Spesialis Kerja -->

    <!-- Tingkat Kerja -->
    <div class="mt-4 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message_tk'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message_tk') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <p>Tingkat Kerja</p>
            <button
                data-name="tk"
                class="content-filters inline-flex items-center px-4 py-2 my-3 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                Create New
            </button>
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Title</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 1; ?>
                    @foreach($tingkers as $tingker)
                    <tr>
                        <td class="border px-4 py-2"><?php echo $count++; ?></td>
                        <td class="border px-4 py-2">{{ $tingker->name_tk }}</td>
                        <td class="border px-4 py-2">
                        <button
                            data-name="tk" data-val="{{ $tingker->name_tk }}" data-id="{{ $tingker->id }}"
                            class="get-edti-val inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </button>
                        <a href="{{ url('dashboard/berita/tk_send='. $tingker->id) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                            Show All Posts
                        </a>
                        <button
                            wire:click="delete_tk({{ $tingker->id }})"
                            class="inline-flex items-center justify-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-600 transition ease-in-out duration-150">
                            Delete
                        </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /Tingkat Kerja -->
</div>

<script>
    $(document).ready(function(){
        var btn_save;
        $('.content-filters').click(function(){
            var name_filter = $(this).attr('data-name');
            // console.log(name_filter)
            switch(name_filter){
                case 'jk':
                    btn_save = "store_jk()";
                    break;
                case 'kl':
                    btn_save = "store_kl()";
                    break;
                case 'pk':
                    btn_save = "store_pk()";
                    break;
                case 'sk':
                    btn_save = "store_sk()";
                    break;
                case 'tk':
                    btn_save = "store_tk()";
                    break;
            }
            // console.log(btn_save)
            $('.input-filter').val('');
            $('.btn-save').attr('wire:click.prevent', btn_save);
            $('.create-modals').show();
        })
        $('.get-edti-val').click(function(){
            var name_filter = $(this).attr('data-name');
            var data_id = $(this).attr('data-id');
            var data_val = $(this).attr('data-val');
            // console.log(data_val)
            switch(name_filter){
                case 'jk':
                    btn_save = "edit_jk("+data_id+")";
                    break;
                case 'kl':
                    btn_save = "edit_kl("+data_id+")";
                    break;
                case 'pk':
                    btn_save = "edit_pk("+data_id+")";
                    break;
                case 'sk':
                    btn_save = "edit_sk("+data_id+")";
                    break;
                case 'tk':
                    btn_save = "edit_tk("+data_id+")";
                    break;
            }
            $('.input-filter').val(data_val);
            $('.btn-save').attr('wire:click.prevent', btn_save);
            $('.create-modals').show();
        })
        $('.close-create-modal').click(function(){
            $('.create-modals').hide();
        })
        $('.save-create-modal').click(function(){
            $('.create-modals').hide();
        })

    });
</script>