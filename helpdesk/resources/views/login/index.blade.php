<!DOCTYPE html>
<html>

<head>
    <title>Login | BMBBD</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="shortcut icon" href="../../../../images/favicon.ico" />
    <style>
        .swal-modal {
            background-color: rgba(240, 128, 128, 0.8);
            width: 230px !important;
            height: 55px !important;
            border-radius: 10px;
            margin-left: 42% !important;
            float: left;
        }

        .swal-icon {
            opacity: 0.4;
            padding: 2px 0 0 0px !important;
            margin: 0 0 0 43% !important;
            width: 30px;
        }

        .swal-title {
            padding: 0px;
            margin: 0px;
            font-size: 16px;
            opacity: 0.6;
        }
    </style>
</head>

<body style="background-image: url(/images/white.jpg); background-size: cover;">
    <div class="col d-flex justify-content-center">
        <div class="card  border-light" style="margin-top: 90px; padding:12px; width: 420px; height :435px; background: #FBFBFA; box-shadow: 0px 0px 25px 10px #EDEDEC; border-radius: 15px;">
            <div class="card-body">
                <img width="200px" height="84px" style="margin-left:90px;" src="/images/bmb_logo.png" alt="logo">
                <br>
                <h2 style="text-align:center; padding-top:15px; padding-bottom:15px">Login</h2>
                <?php if (session('loginError') != null) {  ?>
                    <script>
                        swal({
                            title: 'Username / Password Salah',
                            icon: '../../../../images/sad.png',
                            buttons: false,
                        });
                    </script>
                <?php } ?>
                <form action="/login" method="post">
                    @csrf
                    <div class="form-group pb-2">
                        <label for="username" class="pb-1">Username</label>
                        <input type="text" class="form-control  @error('username') is-invalid @enderror" name="username" id="username" placeholder="username" autocomplete="on" value="{{ old('username') }}" autofocus>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password" class="pb-1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <br>
                    <div class="text-center">
                        <button type="submit" name="submit" class="btn btn-success ">Masuk</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>