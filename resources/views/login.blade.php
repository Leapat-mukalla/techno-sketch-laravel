<!DOCTYPE html>
<html dir="rtl" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>تسجيل الدخول</title>
    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>

</head>
<body>
    <div class="container center-content">


        <div class="card col-12 col-lg-6  col-md-9 ">
            <div class="card-body">
                <div class="text-center mt-2 mb-4">
                    <a  class="text-success">
                        <span>
                            <img class="me-2" src="{{asset('assets/images/logo.png')}}" alt="" height="120">
                        </span>
                    </a>
                </div>
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif

                <!-- Display any error message -->
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                @endif

                <!-- Display validation errors -->
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif


                <form id="myForm" method="POST" action="{{ route('login.submit') }}" class="ps-3 pe-3">
                    @csrf



                    <div class="form-group mb-3">
                        <label class="form-label" for="phone">رقم الجوال</label>
                        <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        pattern="^(77|78|73|70)[0-9]{7}$" maxlength="9" placeholder="" required>
                    </div>



                    <div class="form-group mb-3">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <input class="form-control" name="password" type="password" required
                        minlength="8" maxlength="250" id="password" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input"
                                id="remember" name="remember">
                            <label class="form-label" class="custom-control-label"
                                for="remember">تذكرني </label>
                        </div>
                    </div>

                    <div class="form-group mb-3 text-center">
                        <button class="btn btn-primary" id="submitButton" type="submit">الدخول</button>
                    </div>

                </form>
                <div class="form-group text-center">
                    لا يوجد لدي حساب ؟ <a href="{{route('register')}}" class="">التسجيل</a>
                </div>

            </div>

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            // Disable the submit button to prevent multiple submissions
            document.getElementById('submitButton').disabled = true;
        });
    </script>
</body>
</html>
