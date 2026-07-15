<details class="mb-2 bg-white rounded-lg shadow-sm border border-gray-200">
    
    <summary class="cursor-pointer p-4 font-semibold text-gray-800 hover:bg-gray-50 flex items-center justify-between">
        <div>
            <span class="text-sm bg-blue-100 text-blue-800 px-2 py-1 rounded mr-2">Level {{ $process->level }}</span>
            {{ $process->hierarchy_id }} - {{ $process->name }} ({{$process->pcf_id}})
        </div>
    </summary>

    <div class="p-4 border-t border-gray-100 bg-gray-50 ml-4 border-l-2 border-blue-200">
        
        @if($process->element_description)
            <p class="text-md text-gray-600 mb-4">{{ $process->element_description }}</p>
        @endif

        @if($process->metrics->isNotEmpty())
            <details class="mb-4 bg-blue-50 p-3 rounded border border-blue-200">
                <summary class="cursor-pointer p-2 text-sm font-bold text-blue-800 mb-2 hover:bg-gray-10 bg-blue-50 rounded mb-2">
                    Metrics:
                </summary>
                    <div class="mb-4 bg-blue-50 p-3 rounded border">
                        <!-- <h4 class="text-sm font-bold text-blue-800 mb-2">Metrics for this level:</h4> -->
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach($process->metrics as $metric)
                                <li class="text-sm text-gray-700">
                                    <strong>{{ $metric->metric_id }}</strong>: {{ $metric->metric_name }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
            </details>
        @endif

        @if($process->children->isNotEmpty())
            <div class="mt-2">
                @foreach($process->children as $child)
                    @include('apqc.node', ['process' => $child])
                @endforeach
            </div>
        @endif

    </div>
</details>