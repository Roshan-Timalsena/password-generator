<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body align="center" class="bg-light bg-gradient">

    <div class="container" style="margin-top: 35px;">
        <form method="POST" id="password-form">
            @csrf
            <h2>Generate A Password</h2>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="chk1" value="capital" id="capital"> Include Capital Letters
                </label>
                <br>
                <label>
                    <input type="checkbox" name="chk2" value="small" id="small"> Include Small Letters
                </label>
                <br>
                <label>
                    <input type="checkbox" name="chk3" value="num"> Include Numbers
                </label>
                <br>
                <label>
                    <input type="checkbox" name="chk4" value="sym"> Include Symbols
                </label>
            </div>
            <br>
            <input type="submit" value="Generate New" class="btn btn-primary">
    </div>
    </form>
    </div>

    <br>
    <div>
        Your New Password: &nbsp;&nbsp;&nbsp;<input id="pass" class="bg-info bg-gradient" type="text"
            value="{{ $password }}">
    </div>
    <br>
    <p id="fail" style="color: red"></p>

    <script>
        $("#password-form").on('submit', function(e) {
            e.preventDefault();
            let formData = $("#password-form").serialize();
            submitForm(formData);
        });

        function submitForm(formData) {

            $.ajax({
                url: "{{ route('password') }}",
                method: "POST",
                data: formData,
                dataType: "JSON",
                success: function(res) {
                    if (res.message == 'success') {
                        $("#pass").val(res.password);
                    } else{
                        $("#fail").html(res.message);
                    }
                }
            });

        }
    </script>
</body>

</html>
