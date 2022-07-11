

            <div class="p-6">

                <div class="slider">

                    @foreach ($trend as $postrend)

                        <div data-mdb-ripple="true"
				data-mdb-ripple-color="light" class="max-w-sm h-96 rounded overflow-hidden shadow-xl hover:bg-gray-300 mt-12 m-8
                        rounded-lg hover:text-blue-600 transition duration-150 transform hover:scale-110 hover:-translate-y-2 ">
                                <a  href="{{ url('dashboard/posts', $postrend->id) }}">

                                    <img class="object-cover h-48 w-96" src="{{ url($postrend->url) }}">

                                    <div class="p-6">
                                        <div wire:ignore class="slider2 text-gray-900 text-xl -ml-4 font-semibold mb-4">
                                            @php
                                            $postt = $postrend->postTitles;
                                            @endphp
                                            @for($i=0;$i < count($postt);$i++)
                                                <div>
                                                    {{$postt[$i]->title}}
                                                </div>
                                            @endfor
                                        </div>
                                        <h5 class="text-gray-900 text-md font-medium">
                                            {{ $postrend->first_name . ' ' . $postrend->last_name }}
                                        </h5>
                                        <h5 class="text-gray-900 text-md font-medium">
                                            @if($postrend->salary_check == 1)
                                            Rp {{ number_format($postrend->salary_start,0,',','.').' - Rp '.number_format($postrend->salary_end,0,',','.') }}
                                            @endif
                                        </h5>
                                        <h5 class="text-gray-900 text-md font-medium mb-2">
                                            @php
                                            $regens = $postrend->regency;
                                            for($i=0;$i < count($regens);$i++){
                                                if($i+1 == count($regens)){
                                                    echo ucwords(strtolower($regens[$i]->name));
                                                }else{
                                                    echo ucwords(strtolower($regens[$i]->name.", "));
                                                }
                                            }
                                            @endphp
                                        </h5>

                                        <div class="font-medium text-sm text-gray-400">

                                        <p>
                                            @php
                                            $minutes = $thistime->diffInMinutes($postrend->updated_at);
                                            $hours = $thistime->diffInHours($postrend->updated_at);
                                            $days = $thistime->diff($postrend->updated_at)->days;
                                            $weeks = $thistime->diffInWeeks($postrend->updated_at);
                                            $months = $thistime->diffInMonths($postrend->updated_at);
                                            $years = $thistime->diffInYears($postrend->updated_at);
                                            @endphp
                                            @if($minutes <= 60)
                                                {{$minutes}} menit yang lalu
                                            @elseif($hours <= 24)
                                                {{$hours}} jam yang lalu
                                            @elseif($days <= 7)
                                                {{$days}} hari yang lalu
                                            @elseif($weeks <= 4)
                                                {{$weeks}} minggu yang lalu
                                            @elseif($months <= 12)
                                                {{$months}} bulan yang lalu
                                            @else
                                                {{$years}} tahun yang lalu
                                            @endif

                                        </p>

                                        </div>

                                    </div>

                                </a>

                            

                        </div>

                @endforeach

                </div>

            </div>