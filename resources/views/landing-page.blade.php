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
    <title>الرئيسية</title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full"  >
    <div class="page-wrapper page-wrapper-landing " >

        <div class="container-fluid-landing">
            <div class="row landing-sec1 landing-sec1-pattren">
                <img src="{{asset('assets/images/pattren.png')}}" alt="" class="pattren">
                <img src="{{asset('assets/images/logo.png')}}"   alt="" class="logo">
                <img src="{{asset('assets/images/Ellipse 48.png')}}" alt="" class="circle">
                <div class="container-fluid-inner">
                    <div class="col-12 col-lg-12 col-md-6 z-1 position-relative">

                        <p class="mt-5 text-white w-85">
                            مرحبا بك لعالم تكنوسكيتش الرقمي، حيث التقنية والفن يأخذانك لآفاق جديدة خلابة. في تجربة تقنية فنية فريدة من نوعها
                        </p>
                        <p class="mt-5 text-white medium-font" >ماذا تنتظر؟ احجز مقعدك</p>
                    </div>

                    <div class="col-12 col-lg-12 col-md-6 text-center ">
                        <div class="form-group text-center d-grid gap-2 mt-5 m-5">
                            <a href="{{ route('register') }}" class="btn btn-light z-1 medium-font btn-r-p-custom" role="button" > إنشاء حساب</a>
                            <a href="{{ route('login') }}" class="btn btn-light2 z-1 medium-font btn-r-p-custom" role="button" >تسجيل الدخول</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row landing-sec2">
                <div class="container-fluid-inner">
                    <div class="col-12 col-lg-12 col-md-6 position-relative">
                        <p class="text-black medium-font" >معرض تكنوسكيتش</p>
                    </div>
                    <div class="col-12 text-center mt-3">
                        @if($event)
                            <div id="countdown" class="d-flex justify-content-center align-items-center mt-3 countdown" >
                                <div class="countdown-section" >
                                <span id="days" class="h1 days">-</span>
                                <div class="text-center mt-2 ">أيام</div>
                                </div>
                                <div class="countdown-section">
                                <span id="hours" class="h1 hours">-</span>
                                <div class="text-center mt-2 ">ساعات</div>
                                </div>
                                <div class="countdown-section">
                                <span id="minutes" class="h1 minutes">-</span>
                                <div class="text-center mt-2 ">دقائق</div>
                                </div>
                                <div class="countdown-section">
                                <span id="seconds" class="h1 seconds">-</span>
                                <div class="text-center mt-2 ">ثواني</div>
                                </div>
                            </div>
                        @else
                        <div>لا يوجد حدث متاح حالياً</div>
                        @endif
                    </div>
                        <div class="row d-flex flex-wrap justify-content-center step-row mt-5 row-gap-2">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center ftco-animate fadeInUp ftco-animated">
                                <div class="d-flex flex-col column-gap-3">
                                    <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                        <img src="{{asset('assets/images/enter 2.png')}}" width="35px" alt="">
                                    </div>
                                    <div class="">
                                        <h3 class="bold-font text-black text-end">انضم إلى معرضنا</h3>
                                        <p class="text-end">قم بإنشاء حساب لحجز مقعدك والانضمام لمعرض تكنوسكيتش</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center ftco-animate fadeInUp ftco-animated">
                                <div class="d-flex flex-col column-gap-3">
                                    <div class="">
                                        <h3 class="bold-font text-black text-end">اكتشف المزيد</h3>
                                        <p class="text-end" style="width: 318px;">امسح رمز الاستجابة السريعة الموضوع على كل لوحة لمعرفة المزيد عن فناني تكنوسكيتش وأعمالهم</p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                        <img src="{{asset('assets/images/qr-code 2.png')}}" width="35px" alt="">
                                    </div>
                                </div>
                            </div> <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center ftco-animate fadeInUp ftco-animated">
                                <div class="d-flex flex-col column-gap-3">
                                    <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                        <img src="{{asset('assets/images/like 2.png')}}" width="35px" alt="">
                                    </div>
                                    <div class="">
                                        <h3 class="bold-font text-black text-end">أبدِ إعجابك</h3>
                                        <p class="text-end">أظهر دعمك لفناني تكنوسكيتش من خلال إبداء الإعجاب بأعمالهم</p>
                                    </div>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>

         <footer class="footer text-center text-muted">
             &copy; 2024 بواسطة <a href="#">تكنو سكيتش</a>
         </footer>

     </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.1/feather.min.js"></script>
      <script src="{{asset('assets/js/custom.js')}}"></script>
      <script src="{{asset('assets/js/sidebarmenu.js')}}"></script>
      <script src="{{asset('assets/js/app-style-switcher.min.js')}}"></script>

      <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>


    <script>
        @if($event)
        function updateCountdown() {
            var eventDate = new Date("{{ $event->end_date }} {{ $event->end_time }}").getTime();
            var eventStart = new Date("{{ $event->start_date }} {{ $event->start_time }}").getTime();
            var now = new Date().getTime();

            // Check if the current time is after the start of the event
            if (now >= eventStart) {
                // Display the countdown timer
                document.getElementById("countdown").style.display = "block";

                // Check if the event has ended
                if (now > eventDate) {
                    // Display a message indicating that the event has ended
                    document.getElementById("countdown").innerHTML = "انتهى العد التنازلي";
                } else {
                    // Calculate the remaining time until the event ends
                    var distance = eventDate - now;
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                    // Display the remaining time in the countdown timer
                    document.getElementById("days").innerText = days;
                    document.getElementById("hours").innerText = hours;
                    document.getElementById("minutes").innerText = minutes;
                    document.getElementById("seconds").innerText = seconds;
                }
            } else {
                // Hide the countdown timer if the event has not started yet
                document.getElementById("countdown").style.display = "none";
            }
        }
        // Call the updateCountdown function immediately
        updateCountdown();

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        @endif
    </script>


</body>
</html>
