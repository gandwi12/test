<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APQC</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-6xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">APQC Processes & Metrics</h1>
            <a href="/" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Back to Home</a>
        </div>

        <div class="mb-6">
            {{ $processes->links() }}
        </div>

        <div class="space-y-6">
            @foreach($processes as $process)
                <div class="bg-white p-6 rounded-lg shadow">
                    
                    <div class="border-b pb-4 mb-4">
                        <span class="bg-blue-100 text-blue-800 text-sm font-semibold px-2 py-1 rounded">
                            Level {{ $process->level }}
                        </span>
                        <h2 class="text-2xl font-bold text-gray-800 mt-2">
                            {{ $process->pcf_id }} - {{ $process->hierarchy_id }} - {{ $process->name }}
                        </h2>
                        <p class="text-gray-600 mt-2 text-sm">{{ $process->element_description }}</p>
                    </div>

                    <h3 class="font-bold text-gray-700 mb-2">Metrics ({{ $process->metrics->count() }})</h3>
                    
                    @if($process->metrics->isEmpty())
                        <p class="text-gray-500 italic text-sm">No metrics assigned to this process.</p>
                    @else
                        <ul class="list-disc pl-5 space-y-2">
                            @foreach($process->metrics as $metric)
                                <li class="text-sm text-gray-700">
                                    <span class="font-semibold">{{ $metric->metric_id }}:</span> 
                                    {{ $metric->metric_name }} 
                                    <span class="text-gray-400">({{ $metric->metric_category }})</span>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $processes->links() }}
        </div>

    </div>

</body>
</html>