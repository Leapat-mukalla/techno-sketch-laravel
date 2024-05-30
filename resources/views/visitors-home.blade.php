@extends('layouts.main-visitors')

@section('content')
<div class="container-fluid-landing">
    @if($userStatus == 'مرفوض')
        <p class=" text-black text-center p-5">
            عذراً، حسابك غير نشط
        </p>
    @else
        <div class="row landing-sec2">
            <div class="container-fluid-inner">
                <div class="col-12 col-lg-12 col-md-6 position-relative">
                    <p class="text-black medium-font" >معرض تكنوسكيتش</p>
                </div>
                <div id="event-container" class="col-12 text-center mt-3">
                    @if($event)
                        <div id="countdown"  class="countdown d-flex justify-content-center align-items-center" >
                            <div id="countdown-container" class="d-flex justify-content-center align-items-center text-white">
                                <div class="countdown-section " >
                                    <span id="days" class="h1 days ">-</span>
                                    <div class="text-center mt-2 text-white">أيام</div>
                                    </div>
                                    <div class="countdown-section">
                                    <span id="hours" class="h1 hours">-</span>
                                    <div class="text-center mt-2 text-white">ساعات</div>
                                    </div>
                                    <div class="countdown-section">
                                    <span id="minutes" class="h1 minutes">-</span>
                                    <div class="text-center mt-2 text-white">دقائق</div>
                                    </div>
                                    <div class="countdown-section">
                                    <span id="seconds" class="h1 seconds">-</span>
                                    <div class="text-center mt-2 text-white">ثواني</div>
                                    </div>
                            </div>

                        </div>
                    @else
                    <h3 class="medium-font">لم يبدأ العد التنازلي للمعرض !</h3>
                    <p> انتظرونا قريبا لنتحفكم بتجربة فنية لاتنسى</p>
                    @endif
                </div>
                    <div class="row d-flex flex-wrap justify-content-center step-row mt-5 row-gap-2" style="margin: 0 auto;">
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
                            <div class="d-flex flex-col column-gap-3">
                                <div class="d-flex justify-content-center align-items-center bg-white sec2-icon-bg">
                                    <img src="{{asset('assets/images/Techno-icon.png')}}" width="40px" alt="">
                                </div>
                                <div class="">
                                    <h3 class="bold-font text-black text-end">مرحبا بك في تكنوسكيتش!</h3>
                                    <p class="text-end">
                                        لقد قمت بحجز مقعدك في معرضنا بنجاح. استعد لاكتشاف مجموعة رائعة من الأعمال الفنية
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
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
                        <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
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
        <div class="row landing-sec3 position-relative " style="padding-bottom: 20px;">
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
                    <img src="{{asset('assets/images/Leapat.png')}}" width="85" alt="" class="">
                    <img src="{{asset('assets/images/Seraj.png')}}" width="85" alt="" class="">
                    <img src="{{asset('assets/images/HCF.png')}}" width="85" alt="" class="">
                </div>
                <div class=" d-flex me-3 mt-2 justify-content-lg-center">
                    مشروع "تكنوسكيتش" يأتي بدعم من برنامج منح مسارات اليمن المقدمة من المجلس الثقافي البريطاني وبالشراكة مع مؤسسة حضرموت للثقافة.
                </div>

            </div>
        </div>
    @endif
</div>
<script>
document.addEventListener("DOMContentLoaded", function() {
        @if($event)
        function updateCountdown() {
            var eventDate = new Date("{{ $event->end_date }} {{ $event->end_time }}").getTime();
            var eventStart = new Date("{{ $event->start_date }} {{ $event->start_time }}").getTime();
            var now = new Date().getTime();
            var event_container = document.getElementById("event-container");
            var countdownElement = document.getElementById("countdown");


            // Check if the current time is after the start of the event
            if (now >= eventStart) {
                // Display the countdown timer
                if(countdownElement){
                    countdownElement.style.display = "block";
                }

                // Check if the event has ended
                if (now > eventDate) {
                    // Display a message indicating that the event has ended
                    if(countdownElement){
                        countdownElement.style.display = "none";
                    }
                    // countdownElement.classList.remove('d-flex', 'justify-content-center', 'align-items-center');

                    event_container.innerHTML = `
                    <div class="d-flex column-gap-2 justify-content-center align-items-center p-2">
                        <p class="event-container-text">تعرف على فنانينا وأعمالهم عن طريق <span class=" medium-font" >مسح رمز الاستجابة السريعة QR Code</span>  الموضوع بجانب كل عمل فني</p>
                        <img src="{{asset('assets/images/QR Code.png')}}" width="80px" alt="">

                    </div>
                    `;
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
                countdownElement.style.display = "none";

                event_container.innerHTML = `<h3 class="medium-font">لم يبدأ العد التنازلي للمعرض !</h3>
                        <p> انتظرونا قريبا لنتحفكم بتجربة فنية لاتنسى</p>`;
            }
        }
        // Call the updateCountdown function immediately
        updateCountdown();

        // Update countdown every second
        setInterval(updateCountdown, 1000);
        @endif
    });
</script>

@endsection
