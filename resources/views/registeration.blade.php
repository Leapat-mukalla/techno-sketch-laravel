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
    <title>التسجيل</title>

    <!-- Custom CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <style>
        .center-content {
            display: flex;
            justify-content: center;
            align-items: center;
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


                <form id="myForm" method="POST" action="{{ route('register') }}" class="ps-3 pe-3">
                    @csrf


                    <div class="form-group mb-3">
                        <label class="form-label" for="name">الاسم</label>
                        <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}"
                          maxlength="250"  required placeholder="">

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="gender">الجنس</label>
                            <input class="form-check-input" type="radio" name="gender" value="female" id="female">
                            <label class="form-check-label" for="female">انثى</label>
                            <input class="form-check-input" type="radio" name="gender" value="male" id="male" checked>
                            <label class="form-check-label" for="male">ذكر</label>

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="age">العمر</label>
                        <input class="form-control" type="text" name="age" id="age" value="{{ old('age') }}"
                        pattern="[0-9٠-٩]+" required placeholder="">

                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="address">العنوان</label>
                        <input class="form-control" type="text" name="address" id="address" value="{{ old('address') }}"
                          maxlength="250" placeholder="">
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label" for="phone">رقم الجوال</label>
                        <input class="form-control" type="text" name="phone" id="phone" value="{{ old('phone') }}"
                        pattern="^(77|78|73|70)[0-9]{7}$" maxlength="9" placeholder="">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="email">البريد الالكتروني</label>
                        <input class="form-control" type="email" id="email"  name="email" value="{{ old('email') }}"
                        maxlength="250"  placeholder="john@deo.com">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="password">كلمة المرور</label>
                        <input class="form-control" name="password" type="password" required
                        minlength="8" maxlength="250" id="password" placeholder="">
                    </div>

                    <div class="form-group mb-3">
                        <label class="form-label" for="confirm-password">تأكيد كلمة المرور</label>
                        <input class="form-control" name="password_confirmation" type="password" required minlength="8" maxlength="250" id="confirm-password" placeholder="">

                    </div>


                    <div class="form-group mb-3 text-center">
                        <button class="btn btn-primary" id="submitButton" type="submit">التسجيل</button>
                    </div>

                </form>
                <div class="form-group text-center">
                      لدي حساب بالفعل ؟ <a href="{{route('login')}}" class="">تسجيل الدخول</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
