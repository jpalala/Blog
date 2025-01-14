<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body>
<header>
    <h1>Joes Joernal</h1>
</header>

    <body>
        <div class="text-center blog">
               @if(isset($posts))
                    @foreach ($posts as $post)
                        <li>
                            <a href="{{ url("post/{$post->slug}") }}">{{ $post->title }}</a></li>
                    @endforeach
                @else
                    <li> No posts yet </li>
                @endif
                </ul>
            </div>
        <footer>&copy; @php echo date('Y') @endphp</footer>
    </body>
</html>
