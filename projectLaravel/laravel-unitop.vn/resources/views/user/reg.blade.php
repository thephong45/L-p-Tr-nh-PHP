<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Thêm bài viết</title>
</head>
<body>
    <div class="container">
        <h1>Đăng kí</h1>
        {!! Form::open(['url' => "user/store", 'method'=>"POST"]) !!}
            <div class="form-group">
                {!! Form::label('username', 'Tên đăng nhập') !!}
                {!! Form::text('username', '', ['class'=>'form-control', 'id'=>'username']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('password', 'Mật khẩu') !!}
                {!! Form::password('password', ['class'=>'form-control', 'id'=>'password']) !!}
    
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email') !!}
                {!! Form::email('email', "", ['class'=>'form-control', 'id'=>'email']) !!}
    
            </div>

            <div class="form-group">
                {!! Form::label('city', 'Thành phố') !!}
                {!! Form::select('city', [0=>'--Chọn--',1 => 'Hà Nội', 2 => 'HCM', 3 => 'Đà Nẵng'], "", ['class' => 'form-control', 'id'=>'city']) !!}
    
            </div>

            <div class="form-group">
                {!! Form::label('gender', 'Giới tính') !!}
                <div class="form-check">
                    {!! Form::radio('gender', 'male', 'checked', ['class'=>'form-check-input', 'id' => 'male']) !!}
                    {!! Form::label('male', 'Nam', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::radio('gender', 'female', '', ['class'=>'form-check-input', 'id' => 'female']) !!}
                    {!! Form::label('female', 'Nữ', ['class' => 'form-check-label']) !!}
                </div>
              
            </div>

            <div class="form-group">
                {!! Form::label('skills', 'Kĩ năng') !!}
                <div class="form-check">
                    {!! Form::checkbox('skills', 'html', "", ['class'=>'form-check-input', 'id' => 'html']) !!}
                    {!! Form::label('html', 'HTML', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills', 'css', "", ['class'=>'form-check-input', 'id' => 'css']) !!}
                    {!! Form::label('css', 'CSS', ['class' => 'form-check-label']) !!}
                </div>
                <div class="form-check">
                    {!! Form::checkbox('skills', 'php', "", ['class'=>'form-check-input', 'id' => 'php']) !!}
                    {!! Form::label('php', 'PHP', ['class' => 'form-check-label']) !!}
                </div>
              
            </div>


            <div class="form-group">
                {!! Form::label('birth', 'Ngày sinh') !!}
                {!! Form::date('birth', '', ['class'=>'form-control']) !!}

            </div>

            <div class="form-group">
                {!! Form::label('intro', 'Giới thiệu bản thân') !!}
                {!! Form::textarea('intro', '', ['class' => 'form-control', 'id'=>'intro']) !!}
            </div>

           <div class="form-group">
             {!! Form::submit('Đăng kí', ['name'=>'sm-reg', 'class'=>'btn btn-dark']) !!}
           </div>
            
        {!! Form::close() !!}

    </div>
    
</body>
</html>