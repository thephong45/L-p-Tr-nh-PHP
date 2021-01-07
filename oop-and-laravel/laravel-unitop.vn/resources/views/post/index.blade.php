<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Danh sách bài viết</h1>
<ul>
    @foreach($posts as $post)
        <li>
            <a href="">{{$post->title}}</a><br>
{{--            <img src="{{url($post->thumbnail)}}" alt=""><br>--}}
            <p>{{$post->content}}</p><br>
            <p>Tỉ lệ vote: {{$post->votes}}</p>

        </li>
    @endforeach

</ul>

</body>
</html>
