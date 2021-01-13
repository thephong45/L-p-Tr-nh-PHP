@for($i = 2; $i < $n ;$i++)
    <p>Gia trị i là : {{$i}}</p>
@endfor

<hr>
{{--@foreach($users as $user)--}}
{{--    <p>Tên là: {{$user['name']}}</p>--}}

{{--@endforeach--}}


{{-- code php trong template--}}
@php
    $users = !empty($users) ? $users : "" ;
    foreach($users as $user){
        echo "Ten user la:" . $user['name'] . '<br>';
}
@endphp

<hr>
@include('inc/comment',['title'=>'Bình luận về các bài viết'])
