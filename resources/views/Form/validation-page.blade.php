<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Encryption
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ url('css/encryptStyle.css') }}">
</head>

<body>
    <header>
        <div class="tophead">
            <div class="left_area">
                <h3>Validation</h3>
            </div>
        </div>

    </header>
    <div class="navigate" id="navbar">

        <a href="{{ route('md5.validation', ['algorithms' => 'md5']) }}"><span> md5</span></a>
        <a href="{{ route('sha1.validation', ['algorithms' => 'sha1']) }}"><span> sha1</span></a>
        <a href="{{ route('base64.validation', ['algorithms' => 'base64_encode']) }}"><span> base64</span></a>
        <a href="{{ route('bcrypt.validation', ['algorithms' => 'bcrypt']) }}"><span> bcrypt</span></a>

    </div>

    @if (isset($algorithms))
        <div>This value will be validate by using {{ $algorithms }} algorithm</div>
    @endif
    <form method="post" id="decrypt" action="{{ route('validation') }}">

        @csrf

        <label for="hash-Value">Hash Value:</label><br>
        <input type="text" name="encryptValue" placeholder=" ">
        <div style="color:red">@error('encryptValue'){{ $message }} @enderror </div>
        <br>
        <label for="str-value">String Value:</label><br>
        @if (isset($algorithms))
            <input type="hidden" name="algorithms" value={{ $algorithms }} />
        @endif
        <input type="text" name="strValue" placeholder=" " required>
        <div style="color:red">@error('value'){{ $message }} @enderror </div>
        <div style="color:red">@error('algorithms'){{ $message }} @enderror </div>
        <br>
        <button form="decrypt" type="submit">test</button>

    </form>
    <div class="menu">
        <p>Click <a href="{{ route('page.encrypt') }}"><span>here</span></a> to go back to encryption page</p>
        <p>Click <a href="{{ route('password-main') }}"><span>here</span></a> to go to Password generation page</p>

    </div>
    @if (Session::has('matched'))
        <div class="alert alert-success">
            {{ Session::get('matched') }}
        </div>
    @endif

    @if (Session::has('do not matched'))
        <div class="alert alert-danger">
            {{ Session::get('do not matched') }}
        </div>
    @endif


</body>

</html>
