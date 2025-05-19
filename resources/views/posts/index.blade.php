<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="m-20 p-5 rounded-md shadow-lg bg-gray-200">
        <div>
            <h1 class="text-2xl text-center font-semibold text-purple-500"><span>All posts</span></h1>
            <div class="pt-5">
                <table class="border border-collapse border-gray-400 w-full">
                    <thead>
                        <tr>
                            <th class="border bg-purple-500 text-white border-gray-400 p-2 capitalize">Sr.</th>
                            <th class="border bg-purple-500 text-white border-gray-400 p-2 capitalize">Title</th>
                            <th class="border bg-purple-500 text-white border-gray-400 p-2 capitalize">Category</th>
                            <th class="border bg-purple-500 text-white border-gray-400 p-2 capitalize">Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td class="border border-gray-400 p-2">{{$post->id}}</td>
                            <td class="border border-gray-400 p-2">{{$post->title}}</td>
                            <td class="border border-gray-400 p-2">{{$post->category}}</td>
                            <td class="border border-gray-400 p-2">{{$post->description}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="px-4 pt-4">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</body>

</html>