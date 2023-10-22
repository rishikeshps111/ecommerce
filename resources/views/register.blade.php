<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Montserrat:400,500&display=swap');

        body {
            font-family: Montserrat, Arial, Helvetica, sans-serif;
            background-color: #f7f7f7;
        }

        * {
            box-sizing: border-box
        }

        /* Add padding to container elements */
        .container {
            padding: 20px;
            width: 500px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #ccc;
            border-radius: 10px;
            background: white;
            -webkit-box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
            -moz-box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
            box-shadow: 2px 1px 21px -9px rgba(0, 0, 0, 0.38);
        }

        /* Full-width input fields */
        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f7f7f7;
            font-family: Montserrat, Arial, Helvetica, sans-serif;
        }

        select {
            width: 18%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f7f7f7;
            font-family: Montserrat, Arial, Helvetica, sans-serif;
        }

        input[type=phone] {
            width: 81%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f7f7f7;
        }

        input[type=text]:focus,
        input[type=password]:focus,
        input[type=phone]:focus,
        select:focus {
            background-color: #ddd;
            outline: none;
        }



        /* Set a style for all buttons */
        button {
            background-color: #D19C97;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
            font-size: 16px;
            font-family: Montserrat, Arial, Helvetica, sans-serif;
            border-radius: 10px;
        }

        button:hover {
            opacity: 1;
        }


        /* Change styles for signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .signupbtn {
                width: 100%;
            }
        }

        .youtubeBtn {
            position: fixed;
            right: 20px;
            transform: translatex(-50%);
            top: 20px;
            cursor: pointer;
            transition: all .3s;
            vertical-align: middle;
            text-align: center;
            display: inline-block;
            background: #000;
            padding: 2px 10px;
            border-radius: 5px;
        }

        .youtubeBtn i {
            font-size: 20px;
            float: left;
        }

        .youtubeBtn a {
            color: #ff0000;
            animation: youtubeAnim 1000ms linear infinite;
            float: right;
        }

        .youtubeBtn a:hover {
            color: #c9110f;
            transition: all .3s ease-in-out;
        }

        .youtubeBtn i:active {
            transform: scale(.9);
            transition: all .3s ease-in-out;
        }

        .youtubeBtn span {
            font-family: 'Lato';
            font-weight: bold;
            color: #fff;
            display: block;
            font-size: 12px;
            float: right;
            line-height: 20px;
            padding-left: 5px;

        }

        @keyframes youtubeAnim {

            0%,
            100% {
                color: #c9110f;
            }

            50% {
                color: #ff0000;
            }
        }
    </style>
    <title>Reistration Form</title>
</head>

<body>
    <form action="{{ route('user_register') }}" method="POST">
        @csrf
        <div class="container">
            <h1>Sign Up</h1>
            @if ($message = Session::get('success'))
                <p class="alert alert-info">{{ $message }}</p>
            @else
                <p>Please fill in this form to create an account.</p>
            @endif

            <label for="name"><b>Name</b></label>
            <input class="@error('name') is-invalid @enderror" type="text" name="name" placeholder="Enter Username" >
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span><br>
            @endif
            <label for="email"><b>Email</b></label>
            <input class="@error('email') is-invalid @enderror" type="text" placeholder="Enter Email" name="email" >
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span><br>
            @endif
            <label for="phone"><b>Phone</b></label>
            <input class="@error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Enter Phone" >
            @if ($errors->has('phone'))
                <span class="text-danger">{{ $errors->first('phone') }}</span><br>
            @endif
            <label for="password"><b>Password</b></label>
            <input class="@error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter Password" >
            @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
            <label for="cars">Choose a Type:</label>

            <select name="user_type" id="type" class="form-select">
                <option value="Customer">User</option>
                <option value="Admin">Admin</option>
            </select>

            <p style="padding-left: 90px">Already Have an Account?<a href="{{ route('login') }}"
                    style="color:dodgerblue;text-decoration: none">Sign in</a>.</p>

            <div class="clearfix">

                <button type="submit" class="button">Sign Up</button>
            </div>
        </div>
    </form>


</body>

</html>
