<!DOCTYPE html>
<html>
<head>
    <title>Blog</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="{{ route('blog.show', $post['post_id']) }}">{{ $post['title'] }}</a>
                <p><small>{{ $post['date'] }} by {{ $post['author'] }}</small></p>
            </li>
        @endforeach
    </ul>
</body>
</html>
