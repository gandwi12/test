<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>APQC Framework</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* A tiny css trick to remove the default HTML dropdown arrow so it looks cleaner */
        details > summary { list-style: none; }
        details > summary::-webkit-details-marker { display: none; }
    </style>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-6xl mx-auto">
        
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">APQC Process</h1>
            <a href="/" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Back to Home</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-4 text-gray-700">13 Categories</h2>
            
            <!-- This loops through your 13 Level 1 categories and starts the dropdown chain -->
            <div class="space-y-2">
                @foreach($processes as $process)
                    @include('apqc.node', ['process' => $process])
                @endforeach
            </div>

        </div>
    </div>

</body>
</html>