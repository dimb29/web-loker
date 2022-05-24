
                            <table class="table-auto overflow-scroll">
                                <tbody>
                                    @foreach ($posts->skip(0)->take(5) as $post)
                                        <tr data-id="{{ $post->id}}" class="daft-job hover:bg-gray-300 text-grey-500 hover:text-blue-500 cursor-pointer transition duration-150 transform hover:scale-90 border-b border-r">
                                            <td class="pr-4 py-8">
                                                <img class="object-cover"src="{{ $post->url }}">
                                                <p>
                                                    {{ $post->title }}
                                                </p>
                                                <p>
                                                    @php
                                                    $minutes = $thistime->diffInMinutes($post->updated_at);
                                                    $hours = $thistime->diffInHours($post->updated_at);
                                                    $days = $thistime->diff($post->updated_at)->days;
                                                    $weeks = $thistime->diffInWeeks($post->updated_at);
                                                    $months = $thistime->diffInMonths($post->updated_at);
                                                    $years = $thistime->diffInYears($post->updated_at);
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
                                            </td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td colspan="2">
                                            <button class="load-more bg-transparent hover:bg-indigo-400 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-indigo-400 hover:border-transparent rounded">
                                                Selengkapnya
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>