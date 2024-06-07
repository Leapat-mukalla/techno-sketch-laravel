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
    <title>الإحصائيات</title>
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full"  >
    <div class="page-wrapper page-wrapper-landing " >

        <div class="container-fluid-landing position-relative">
            <div class="row landing-sec1 z-1 pb-3" style="overflow: hidden;">
                <img src="{{asset('assets/images/Rectangle (1).png')}}" alt="" class="pattren z-1">
                <img src="{{asset('assets/images/logo.png')}}"   alt="" class="logo-status z-1">
                <div class="circle-status"></div>
                <div class="container-fluid-inner">
                    <div class="col-12 col-lg-12 col-md-6 z-1 position-relative">
                        <h1 class="mt-5 text-white w-85 bold-font font-21">
                            مرحبا بكم في معرض تكنوسكيتش!
                        </h1>
                        <p class=" text-white w-50 pt-2 font-18" >
                            نحن سعداء بوجودكم معنا في معرض تكنوسكيتش، حيث التقنية والفن يأخذانك لآفاق جديدة خلابة. استمتعوا بـ تجربة تقنية فنية فريدة من نوعها.                        </p>
                    </div>

                    <div class="col-12 col-lg-12 col-md-6 z-1 top-0 pt-2  position-relative">
                        <p class=" text-white medium-font underline-head "  >إحصائيات تكنوسكيتش</p>
                    </div>
                    <div class=" row d-flex flex-wrap justify-content-center step-row row-gap-2 static-container">
                        <div class="col-4 col-lg-4 col-md-4">
                            <div class=" d-flex  align-items-center flex-column ">
                                <span class="bold-font z-1 num">20</span>
                                <div class=" text-white z-1">عمل فني</div>
                            </div>
                        </div>
                        <div class="col-4 col-lg-4 col-md-4">
                            <div class=" d-flex align-items-center flex-column ">
                                <span class="bold-font z-1 num">{{$visitorCount}}</span>
                                <div class=" text-white z-1">زائر لمعرض تكنوسكيتش</div>
                            </div>
                        </div>
                        <div class=" col-4 col-lg-4 col-md-4">
                            <div class=" d-flex  align-items-center flex-column">
                                <span class="bold-font z-1 num" >{{$likesCount}}</span>
                                <div class=" text-white z-1">عدد الإعجابات للأعمال الفنية</div>
                            </div>
                        </div>
                    </div>


                    <div class="col-12 col-lg-12 col-md-6 top-0 pt-2  position-relative ">
                        <p class="text-white  medium-font underline-head" >إرشادات المعرض</p>
                    </div>
                        <div class="row d-flex flex-wrap justify-content-center step-row mt-5 row-gap-2 z-1  position-relative me-4" style="margin: 0 auto;">
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center ">
                                <div class="d-flex flex-col column-gap-3">
                                    <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                        <img src="{{asset('assets/images/wifi.png')}}" width="35px" alt="">
                                    </div>
                                    <div class="text-white">
                                        <h3 class="bold-font text-end">شبكة Wi-Fi</h3>
                                        <p class="text-end">لراحتكم، تم توفير شبكة وايفاي مجانية </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center ">
                                <div class="d-flex flex-col column-gap-3 flex-md-row-reverse flex-lg-row-reverse">
                                    <div class="text-white">
                                        <h3 class="bold-font text-end">اكتشف المزيد</h3>
                                        <p class="text-end">
                                            امسح رمز الاستجابة السريعة الموضوع بجانب كل عمل فني لمعرفة المزيد عن الفنان و عمله                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                        <img src="{{asset('assets/images/qr-code 2.png')}}" width="35px" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center ">
                                <div class="d-flex flex-col column-gap-3">
                                    <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                        <img src="{{asset('assets/images/like 2.png')}}" width="35px" alt="">
                                    </div>
                                    <div class="text-white">
                                        <h3 class="bold-font   text-end">أبدِ إعجابك</h3>
                                        <p class="text-end">أظهر دعمك لفناني تكنوسكيتش من خلال إبداء الإعجاب بأعمالهم</p>
                                    </div>
                                </div>
                            </div>
                    </div>



                    <div class="col-12 col-lg-12 col-md-6 position-relative pt-2">
                        <p class="text-white medium-font underline-head" >شركاء تكنوسكيتش</p>
                    </div>
                    <div class="col-12 d-flex justify-content-start justify-content-lg-center align-items-center mt-3 me-3 column-gap-70">
                        <img src="{{asset('assets/images/Leapat.png')}}" width="150" alt="" class="white-icon">
                        <img src="{{asset('assets/images/Seraj.png')}}" width="150" alt="" class="white-icon">
                        <img src="{{asset('assets/images/HCF.png')}}" width="150" alt="" class="white-icon">
                        <img src="{{asset('assets/images/BC-LOGO.png')}}" width="150" alt="" class=" me-2 white-icon">
                    </div>


                </div>
            </div>


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
        setTimeout(function() {
                    location.reload();
                }, 180000);
    </script>


</body>
</html>

