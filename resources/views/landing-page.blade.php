<!DOCTYPE html>
<html dir="rtl" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="مرحبا بك لعالم تكنوسكيتش الرقمي، حيث التقنية والفن يأخذانك لآفاق جديدة خلابة. في تجربة تقنية فنية فريدة من نوعها">
    <!-- Favicon icon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/favicon/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('assets/favicon/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('assets/favicon/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('assets/favicon/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('assets/favicon/safari-pinned-tab.svg')}}" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <title>الرئيسية</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full"  >
    <div class="page-wrapper page-wrapper-landing " >

        <div class="container-fluid-landing">
            <div class="row landing-sec1">
                <img src="{{asset('assets/images/pattren.png')}}" alt="" class="pattren z-1">
                <img src="{{asset('assets/images/logo.png')}}"   alt="" class="logo z-1">
                <div class="circle"></div>
                <div class="container-fluid-inner">
                    <div class="col-12 col-lg-12 col-md-6 z-1 position-relative">

                        <p class="mt-5 text-white w-85">
                            مرحبا بك لعالم تكنوسكيتش الرقمي، حيث التقنية والفن يأخذانك لآفاق جديدة خلابة. في تجربة تقنية فنية فريدة من نوعها
                        </p>
                        <p class="mt-5 text-white medium-font" >ماذا تنتظر؟ احجز مقعدك</p>
                    </div>

                    <div class="col-12 col-lg-6 col-md-6 text-center ">
                        <div class="form-group text-center d-grid gap-2 mt-5 m-5">
                            {{-- <a href="#" class="btn btn-light z-1 medium-font btn-r-p-custom" role="button" > إنشاء حساب</a> --}}
                            <a href="{{ route('login') }}" class="btn btn-light2 z-1 medium-font btn-r-p-custom" role="button" >تسجيل الدخول</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="row landing-sec2 z-1 position-relative">
                <div class="container-fluid-inner">
                    <div class="col-12 col-lg-12 col-md-6 position-relative">
                        <p class="text-black medium-font" >معرض تكنوسكيتش</p>
                    </div>
                    <div id="event-container" class="col-12 text-center mt-3">
                        @if($event)
                            <div id="countdown" class="d-flex justify-content-center align-items-center mt-3 countdown" >
                                <div class="countdown-section " >
                                <span id="days" class="h1 days text-white">-</span>
                                <div class="text-center mt-2 text-white">أيام</div>
                                </div>
                                <div class="countdown-section">
                                <span id="hours" class="h1 hours text-white">-</span>
                                <div class="text-center mt-2 text-white">ساعات</div>
                                </div>
                                <div class="countdown-section">
                                <span id="minutes" class="h1 minutes text-white">-</span>
                                <div class="text-center mt-2 text-white">دقائق</div>
                                </div>
                                <div class="countdown-section">
                                <span id="seconds" class="h1 seconds text-white">-</span>
                                <div class="text-center mt-2 text-white">ثواني</div>
                                </div>
                            </div>
                        @else
                        {{-- <h3 class="medium-font">لم يبدأ العد التنازلي للمعرض !</h3>
                        <p> انتظرونا قريبا لنتحفكم بتجربة فنية لاتنسى</p> --}}
                        <h3 class="medium-font">انتهى المعرض</h3>
                        <p> تابعونا لمعرفة المزيد عن فعالياتنا القادمة</p>
                        @endif
                    </div>
                        <div class="row d-flex flex-wrap justify-content-center step-row mt-5 row-gap-2" style="margin: 0 auto;">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center animate-from-right">
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
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center animate-from-left">
                                <div class="d-flex flex-col column-gap-3 flex-md-row-reverse flex-lg-row-reverse">
                                    <div class="">
                                        <h3 class="bold-font text-black text-end">اكتشف المزيد</h3>
                                        <p class="text-end">امسح رمز الاستجابة السريعة الموضوع على كل لوحة لمعرفة المزيد عن فناني تكنوسكيتش وأعمالهم</p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                        <img src="{{asset('assets/images/qr-code 2.png')}}" width="35px" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center animate-from-right">
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
            <div class="row landing-sec3 position-relative " style="    padding-bottom: 20px;">
                <img src="{{asset('assets/images/pattren2.png')}}" alt="" class="pattren">
                <img src="{{asset('assets/images/Ellipse 49.png')}}" alt="" class="circle">
                <div class="container-fluid-inner" style="padding: 0px 35px 0px 35px !important;">
                    <div class="col-12 col-lg-12 col-md-6 z-1 position-absolute top-0 pt-4 ">
                        <p class=" text-white" >إحصائيات تكنوسكيتش</p>
                    </div>
                    <div class=" row d-flex flex-wrap justify-content-center step-row row-gap-2 static-container">
                        <div class=" col-4 col-lg-4 col-md-4">
                            <div class=" d-flex  align-items-center flex-column">
                                <span class="bold-font z-1 num" >15</span>
                                <div class=" text-white z-1">فنان تشكيلي</div>
                            </div>
                        </div>
                        <div class="col-4 col-lg-4 col-md-4">
                            <div class=" d-flex  align-items-center flex-column ">
                                <span class="bold-font z-1 num">20</span>
                                <div class=" text-white z-1">عمل فني</div>
                            </div>
                        </div>
                        <div class="col-4 col-lg-4 col-md-4">
                            <div class=" d-flex align-items-start flex-column ">
                                <span class="bold-font z-1 num">{{$visitorCount}}</span>
                                <div class=" text-white z-1">زائر لمعرض تكنوسكيتش</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row landing-sec2">
                <div class="container-fluid-inner">
                    <div class="col-12 col-lg-12 col-md-6 position-relative">
                        <p class="text-black medium-font" >شركاء تكنوسكيتش</p>
                    </div>
                    <div class="col-12 d-flex justify-content-start justify-content-lg-center align-items-center mt-3 me-3">
                        <img src="{{asset('assets/images/Leapat.png')}}" width="75" alt="" class="">
                        <img src="{{asset('assets/images/Seraj.png')}}" width="75" alt="" class="">
                        <img src="{{asset('assets/images/HCF.png')}}" width="75" alt="" class="">
                        <img src="{{asset('assets/images/BC-LOGO.png')}}" width="75" alt="" class=" me-2">
                    </div>
                    <div class=" d-flex me-3 mt-2 justify-content-lg-center">
                        مشروع "تكنوسكيتش" يأتي بدعم من برنامج منح مسارات اليمن المقدمة من المجلس الثقافي البريطاني وبالشراكة مع مؤسسة حضرموت للثقافة.
                    </div>

                </div>
            </div>
        </div>

         <footer class="footer text-center text-muted">
             &copy; 2024 بواسطة <a href="{{ route('landing.page') }}">تكنوسكيتش</a>
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
   document.addEventListener("DOMContentLoaded", function() {
        @if($event)
        function updateCountdown() {
            var eventDate = new Date("{{ $event->end_date }} {{ $event->end_time }}").getTime();
            var eventStart = new Date("{{ $event->start_date }} {{ $event->start_time }}").getTime();
            var now = new Date().getTime();
            const countdown = document.getElementById("countdown");
            // Check if the current time is after the start of the event
            if (now >= eventStart) {

                // Display the countdown timer
                if(countdown){
                    countdown.style.display = "block";

                }

                // Check if the event has ended
                if (now > eventDate) {
                    // Display a message indicating that the event has ended
                    if(countdown){
                        countdown.style.display = "none";
                    }
                    document.getElementById("event-container").innerHTML = `
                    <h3 class="medium-font">انطلق المعرض!</h3>
                    <p>استمتع بتجربة فنية لا تُنسى</p>`;
                    return;
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
                countdown.style.display = "none";

                // document.getElementById("event-container").innerHTML = `<h3 class="medium-font">لم يبدأ العد التنازلي للمعرض !</h3>
                //         <p> انتظرونا قريبا لنتحفكم بتجربة فنية لاتنسى</p>`;
                document.getElementById("event-container").innerHTML = `<h3 class="medium-font">انتهى المعرض</h3>
                        <p> تابعونا لمعرفة المزيد عن فعالياتنا القادمة</p>`;
            }
        }
        // Call the updateCountdown function immediately
        updateCountdown();

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        @endif

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        });
        document.querySelectorAll('.animate-from-right, .animate-from-left').forEach(element => {
            observer.observe(element);
        });
    });
    </script>


</body>
</html>
