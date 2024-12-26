@extends('layouts.app')

@section('content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog')</title>
    @vite(['resources/css/edit-create.css'])

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-100">
    <div class="container py-5">
        <div class="judul text-center mb-5">
            <h1 class="text-3xl font-bold text-gray-800">Edit Blog</h1>
        </div>
        
        @if($errors->any())
        <div class="alert alert-danger bg-red-100 text-red-800 p-4 rounded-lg mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('blogs.update', $blog) }}" method="POST" enctype="multipart/form-data" class="row g-4">
            @csrf
            @method('PUT')

            <!-- Kolom Kiri (Content) -->
            <div class="col-md-8 bg-white p-4 rounded-lg shadow-sm order-1">
                <div class="form-group">
                <label for="content" class="block text-gray-700 font-semibold mb-2">Content:</label>
                <textarea name="content" id="content" 
                          class="w-full p-3 rounded-2xl bg-teal-100 border-none focus:outline-none h-32" 
                          placeholder="Write your blog content here..." required>{{ $blog->content }}</textarea>
                </div>
            </div>

            <!-- Kolom Kanan (Form Judul & Submit) -->
            <div class="col-md-4 bg-white p-4 rounded-lg shadow-sm order-2 order-md-3">
                <div class="form-group mb-4">
                <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
                <input type="text" name="title" id="title" 
                       class="w-full p-3 rounded-full bg-teal-100 border-none focus:outline-none" 
                       placeholder="Enter blog title" value="{{ $blog->title }}" required>
                </div>

                <div class="form-group mb-4">
                <label for="image" class="block text-gray-700 font-semibold mb-2">Image (optional):</label>
                <input type="file" name="image" id="image" 
                       class="w-full p-3 rounded-full bg-teal-100 border-none focus:outline-none">
                </div>

                <button type="submit" 
                    class="w-full px-6 py-3 rounded-full bg-teal-400 text-white font-bold hover:bg-teal-500">Update Blog</button>
            </div>
        </form>
    </div>
</body>
@endsection
