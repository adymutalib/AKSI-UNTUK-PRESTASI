<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
                * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }

        .judul {
            color: #fff;

        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #7AA874;
        }

        .containerall{
            background-color: #7AA874;
        }

        .container {
            width: 100%;
            display: flex;
            max-width: 850px;
            background: #fff;
            border-radius: 15px;
            box-shadow: 0 20px 15px rgba(0, 0, 0, 0.1);
        }

        .login {
            width: 400px;
        }

        form {
            width: 250px;
            margin: 60px auto;
        }

        h2, h1 {
            margin: 20px;
            text-align: center;
            font-weight: bolder;
            text-transform: uppercase;
        }

        hr {
            border-top: 2px solid #7AA874;
        }

        p {
            text-align: center;
            margin: 10px;
        }

        .right img {
            width: 450px;
            height: 100%;
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        form label {
            display: block;
            font-size: 16px;
            font-weight: 600;
            padding: 5px;
        }

        input {
            width: 100%;
            margin: 2px;
            border: none;
            outline: none;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid gray;
        }

        button {
            border: none;
            outline: none;
            padding: 8px;
            width: 252px;
            color: #fff;
            font-size: 16px;
            cursor: pointer;
            margin-top: 20px;
            border-radius: 5px;
            background: #7AA874;
        }

        button:hover {
            background: #609966;
        }


        @media (max-width: 880px) {
            .container {
                width: 100%;
                max-width: 750px;
                margin-left: 20px;
                margin-right: 40px;
            }
            .judul {
                margin-left: 10%;
            }

            form {
                width: 280px;
                margin: 20px;
            }

            .login {
                width: 300px;
                padding: 20px;
            }

            button {
                width: 100%;
            }

            .right img {

                display: none;
            }
        }

        .register{
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="containerall">
        <h1 class="judul">AKSI UNTUK PRESTASI</h1>
        <div class="container">
            <div class="login">
                <form method="post" action="{{ route('login.auth') }}">
                    @csrf
                    <h2>Login</h2>
                    <div class="mb-3">
                        <label for="email" class="form-label"><b>Email</b></label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label"><b>Password</b></label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="row text-end">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="right">
                <img src="{{ asset('assets/img/bg_2.jpg') }}" alt="SMA">
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>


{{-- <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <style>
            body{
                background-image: url("/img/BG.jpg");

            }
            .containerall{
                margin-top: 150px;
            }



        </style>
    </head>
    <body>
        <div class="containerall">
        <div class="container p-3">
            <h1 class="text-center mt-5">LOGIN</h1>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="form">
                        <form method="post" action="#">
                            @csrf

                            <div class="mb-3">
                                <label for="email" class="form-label"><b>Email</b></label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label"><b>Password</b></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="row text-end">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a href="#" class="btn btn-success">Register</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html> --}}

{{-- <!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    
    </head>
    <body>
        <div class="container p-3">
            <h1 class="text-center">Login</h1>
            <div class="row justify-content-center mt-5">
                <div class="col-md-5">
                    <div class="form">
                        <form method="post" action="{{ route('login.auth') }}">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                            
                                @enderror
                            </div>
                            
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>                            
                                @enderror
                            </div>                         

                            <div class="row text-end">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                    <a href="{{ route('register.show') }}" class="btn btn-success">Register</a>
                                    {{-- <a href="{{ route('index') }}" class="btn btn-success">Back to Home</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html> --}}
