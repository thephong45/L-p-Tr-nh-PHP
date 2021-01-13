<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.tiny.cloud/1/fzkpap92ytrq3ik87fzdt7o0pmohw06do3r76l4n03xwj0z5/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>


    {{--    Tích hợp trình soạn thảo --}}
    {{--    <script>tinymce.init({--}}
    {{--            selector:'textarea',--}}
    {{--            height: 300,--}}
    {{--            plugins: [--}}
    {{--                'advlist autolink link image lists charmap print preview hr anchor pagebreak',--}}
    {{--                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',--}}
    {{--                'table emoticons template paste help'--}}
    {{--            ],--}}
    {{--            toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | ' +--}}
    {{--                'bullist numlist outdent indent | link image | print preview media fullpage | ' +--}}
    {{--                'forecolor backcolor emoticons | help',--}}
    {{--            menu: {--}}
    {{--                favs: {title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons'}--}}
    {{--            },--}}
    {{--            menubar: 'favs file edit view insert format tools table help',--}}
    {{--            content_css: 'css/content.css'--}}
    {{--    });--}}
    {{--    </script>--}}

    {{--    Tích hợp trình quản lý file --}}
    <script>

            var editor_config = {
            path_absolute : "http://localhost/LavavelPro/laravel-unitop.vn/public/",
            selector: 'textarea',
            relative_urls: false,
            plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table directionality",
            "emoticons template paste textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
            file_picker_callback : function(callback, value, meta) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
            if (meta.filetype == 'image') {
            cmsURL = cmsURL + "&type=Images";
        } else {
            cmsURL = cmsURL + "&type=Files";
        }

            tinyMCE.activeEditor.windowManager.openUrl({
            url : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no",
            onMessage: (api, message) => {
            callback(message.content);
        }
        });
        }
        };

            tinymce.init(editor_config);
    </script>


    <title>Thêm bài viết</title>
</head>
<body>
<div class="container">
    <h1>Thêm bài viết</h1>


    {{-- @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>

      </div> --}}
    {{-- @endif --}}


    {!! Form::open(['url' => 'post/store', 'method'=>'POST', 'files'=>true]) !!}
    <div class="form-group">
        {!! Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Tiêu đề']) !!}
        @error('title')
        <small class="form-text text-danger">{{$message}}</small>
        @enderror

    </div>

    <div class="form-group">
        {!! Form::textarea('content', "", ['class'=> 'form-control', 'placeholder'=>'Nội dung']) !!}
        @error('content')
        <small class="form-text text-danger">{{$message}}</small>

        @enderror
    </div>

    <div class="form-group">
        {!! Form::file('file', ['class'=>'form-control-file']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Thêm mới', ['name'=>'sm-sdd', 'class'=>'btn btn-dark']) !!}
    </div>

    {!! Form::close() !!}

</div>

</body>
</html>
