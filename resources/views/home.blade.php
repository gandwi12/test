<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-10">

    <div class="max-w-5xl mx-auto">
        <h1 class="text-4xl font-bold text-gray-800 mb-10">menu</h1>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            
            <a href="{{ route('apqc.app') }}" class="block bg-white p-6 rounded-lg shadow-md border-t-4 border-blue-500 hover:shadow-lg transition">
                <h2 class="text-xl font-bold text-gray-800">APQC Framework</h2>
                <p class="text-gray-600 mt-2">APQC</p>
                <span class="inline-block mt-4 text-blue-500 font-semibold">Open &rarr;</span>
            </a>

            <!-- <div class="block bg-white p-6 rounded-lg shadow-md border-t-4 border-gray-300 opacity-50">
                <h2 class="text-xl font-bold text-gray-800">Future Menu</h2>
                <p class="text-gray-600 mt-2">More data modules will be added here later.</p>
            </div> -->

        </div>
    </div>

</body>
</html>