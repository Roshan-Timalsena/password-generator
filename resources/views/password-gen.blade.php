<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- fontawesome Icons link  -->
    <script src="https://kit.fontawesome.com/1b72455679.js" crossorigin="anonymous"></script>

    <!-- boostrap link  -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script defer src="js/bootstrap.bundle.min.js"></script>

    <!-- css link  -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- js link  -->
    <script defer src="js/script.js"></script>

    <title>Password Generator</title>
</head>

<body>
    <!-- Navigation bar START  -->
    <nav class="navbar navbar-expand-md navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="image/Turtle-Logo-low.png" alt="Turtle innovation logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse nav--lists" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link" href="#">Menu 1</a>
                    <a class="nav-link" href="#">Menu 2</a>
                    <a class="nav-link" href="#">Menu 3</a>
                    <a class="nav-link" href="#">Menu 4</a>
                    <a class="nav-link" href="#">Menu 5</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Navigation bar END  -->

    <!-- Password Generator section START  -->
    <section class="pw--generator container">
        <div class="row">
            <div class="heading-sec col-12 col-lg-6 d-flex justify-content-center flex-column">
                <div class="image">
                    <img src="image/Turtle-Logo-low.png" alt="Turtle Innovation logo" />
                </div>
                <h1>Generate Strong Password</h1>
                <p>To stay more secure and safe online</p>
            </div>

            <div class="pw-generator-sec col-12 col-lg-6">
                <div class="input-group">
                    <input type="text" id="copy-pass" class="form-control" />
                    <i class="far fa-clone" onclick="copy()"></i>
                    <i class="fas fa-sync" onclick="refresh()"></i>
                </div>
                <hr />
                <form method="post" id="password-form">
                    @csrf
                    <div class="checkbox-sec">
                        <div>
                            <input class="form-check-input" type="checkbox" name="chk4" id="symbol" />
                            <label for="">Symbols and Ambiguous Characters ( ! @ # $ % {} [] '' "" <> ; ) </label>
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" name="chk3" id="numbers" />Numbers ( 12345 )
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" name="chk5" id="similar" />Similar
                            Characters (
                            o,O,0,i,I,l.L,1 )
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" name="chk2" id="lcase" />Lowercase Letters (
                            abcde )
                        </div>
                        <div>
                            <input class="form-check-input" type="checkbox" name="chk1" id="ucase" />Uppercase Letters (
                            ABCDE )
                        </div>

                        <div class="pw-length-generate row">
                            <div class="length-input-sec col-2">
                                <input name="length" id="pw-length-input" />
                            </div>
                            <div class="col-10">
                                Password Length
                                <div class="d-flex justify-content-between">
                                    <p>10</p>
                                    <input class="slider-range" type="range" name="pw-length" id="pw-length"
                                        value="15" min="10" max="50" />
                                    <p>50</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pw-generate-btn-sec">
                        {{-- <button type="submit">Generate Password</button> --}}
                        <input type="submit" value="Generate Password" class="btn btn-success">

                    </div>
                    <div>
                        <p class="text-danger" id='fail'></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Password generator section END  -->

    <!-- Footer Section START -->
    <div class="footer-section">
        <div class="container">
            <div class="main-footer">
                <div class="social-link">
                    <a href="#"><i class="fab ig fa-instagram"></i></a>
                    <a href="#"><i class="fab fb fa-facebook-square"></i></a>
                    <a href="#"><i class="fab tw fa-twitter-square"></i></a>
                </div>
            </div>
        </div>
        <div class="copy-right-sec">
            Copyright © 2021 TurtleAuth.com. All Rights Reserved.
        </div>
    </div>
    <!-- Footer Section END -->

    <script>
        function copy() {
            var copyPass = document.getElementById("copy-pass");

            copyPass.select();
            copyPass.setSelectionRange(0, 99999);

            navigator.clipboard.writeText(copyPass.value);
        }

        function refresh(){
            $("#password-form").submit();
        }
        
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
                        $("#copy-pass").val(res.password);
                        $("#fail").html('');
                    } else {
                        $("#fail").html(res.message);
                    }
                }
            });

        }
    </script>
</body>

</html>
