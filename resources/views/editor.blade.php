<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Editor</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body class="bg-gray-100 p-6">
    <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg p-6">
        <h1 class="text-2xl font-bold mb-4">File Editor</h1>

        @if (session('success'))
            <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('editor.update') }}" method="POST">
            @csrf

            <input type="hidden" name="filePath" value="{{ $filePath }}">

            <div class="mb-4">
                <label for="content" class="block text-gray-700 font-semibold mb-2">File Content:</label>
                <textarea
                    name="content"
                    id="content"
                    rows="20"
                    class="w-full p-4 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                >{{ old('content', $content) }}</textarea>
            </div>

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
                    Save Changes
                </button>
            </div>
        </form>
    </div>
</body>
</html>
