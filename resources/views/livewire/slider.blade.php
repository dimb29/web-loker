
            <div class="p-6">
                <div class="slider">
                    @foreach ($trend as $postrend)
                        <div class="max-w-sm rounded overflow-hidden shadow-lg hover:bg-gray-300 m-8
                        rounded-lg hover:text-blue-600 transition duration-150 transform hover:scale-110 hover:-translate-y-2 ">
                                <a wire:click="countview({{ $postrend->id}})" href="{{ url('dashboard/posts', $postrend->id) }}">
                                    
                                    <img class="object-cover h-48 w-96" src="{{ $postrend->url }}">
                                    <div class="p-6">
                                        <h5 class="text-gray-900 text-xl font-medium mb-2 h-16 pb-4">{{ $postrend->title }}</h5>
                                        <p class="text-gray-500 text-base mb-4">
                                        PT Istana Kemakmuran Motor
                                        </p>
                                    </div>
                                    <div div="grid grid-cols-2 gap-4">
                                        <div class="p-6 font-medium text-sm text-gray-400">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            SMA/SMK
                                        </div>
                                        <div class="p-6 font-medium text-sm text-gray-400">
                                            <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                                            SMA/SMK
                                        </div>
                                    </div>
                                </a>
                            
                        </div>
                @endforeach
                </div>
            </div>