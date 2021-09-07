<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Encryption
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{url('css/encryptStyle.css')}}">
</head>
<body>
<header>
    <div class="tophead">
        <div class="left_area">
            <h3>Encryption</h3>
        </div>
    </div>
</header>
<div class="navigate" id="navbar">

    <a href="{{route('encrypt.md5',['algorithms'=> 'md5'])}}"><span> md5</span></a>
    <a href="{{route('encrypt.sha1',['algorithms'=> 'sha1'])}}"><span> sha1</span></a>
    <a href="{{route('encrypt.base64',['algorithms'=> 'base64'])}}"><span> base64</span></a>
    <a href="{{route('encrypt.bcrypt',['algorithms'=> 'bcrypt'])}}"><span> bcrypt</span></a>

</div>
@if(isset($algorithms))
    <div>This value will be encrypt by using {{$algorithms}} algorithm</div>
@endif

            <form method="post" id="encrypt" action="{{route('encryption')}}">

            @csrf
                <label for="str-value">String Value:</label><br>
                @if(isset($algorithms))
                <input type="hidden" name="algorithms" value={{$algorithms}} />
                @endif
                <input type="text"  name="value" placeholder=" " required>
                <div style="color:red">@error('value'){{$message}} @enderror </div>
                <div style="color:red">@error('algorithms'){{$message}} @enderror </div>

                <br>
                <button form="encrypt" type="submit" >hash!</button>
            </form>


<p>Click <a href="{{route('page.validate')}}"><span>here</span></a> to go back to validation page</p>
<p>Click <a href="{{route('password-main')}}"><span>here</span></a> to go to Password generation page</p>


    @if(Session::has('data'))
        <div class="alert alert-success">
            {{Session::get('data')}}
        </div>
    @endif



</body>
</html>
