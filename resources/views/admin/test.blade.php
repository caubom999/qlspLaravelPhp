<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$title}}</title>
</head>
<body>
<div class="form-group">
    <label for="menu">Ảnh SP</label>
    <input type="file" class="form-control" id="test">
    <div id="image_show">
    </div>
    <input type="hidden" name="file" id="file">
</div>

@csrf
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="/test.js"></script>
</body>
</html>
