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
     <title> تكنو سكيتش</title>
     {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}

     <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
 </head>
 <body>
     <div class="preloader">
         <div class="lds-ripple">
             <div class="lds-pos"></div>
             <div class="lds-pos"></div>
         </div>
     </div>

     <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
         data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full" >
         <header class="topbar" data-navbarbg="skin6">
             <nav class="navbar top-navbar navbar-expand-lg">
                 <div class="navbar-header" data-logobg="skin6">

                     <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="#">
                         <i data-feather="menu" class="feather-icon"></i>

                     </a>
                     <!-- ============================================================== -->
                     <!-- Logo -->
                     <!-- ============================================================== -->
                     <div class="navbar-brand">
                         <a href="#">
                             <img src="{{asset('assets/images/logo.png')}}" alt="" class="img-fluid" style="max-width: 55%;margin-right: 21px;">
                         </a>
                     </div>

                     <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                         data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i data-feather="more-horizontal" class="feather-icon"></i>

                     </a>

                     {{-- @php
                     $currentUserName = \App\Services\AccountService::getCurrentUserName();
                     @endphp
                     @if ($currentUserName)
                     <p class="page-title text-nowrap text-dark font-weight-medium">    مرحباً، {{ $currentUserName }} </p>
                     @else
                     <p class="page-title text-nowrap text-dark font-weight-medium ">    مرحباً</p>
                     @endif --}}
                 </div>

                 <div class="navbar-collapse collapse navbar-collapse-visitor" id="navbarSupportedContent">

                     <ul class="navbar-nav float-end">


                          <li class="nav-item d-flex align-items-center">
                             <form method="POST" action="{{ route('logout') }}">
                                 @csrf
                             <a class="nav-link dropdown-toggle" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                 <i data-feather="power" class="svg-icon"></i>
                             </a>
                             </form>
                         </li>

                          </ul>
                          <ul class="navbar-nav float-start me-auto ms-3 pe-1">


                            @php
                            $currentUserName = \App\Services\AccountService::getCurrentUserName();
                            @endphp

                        <li class="nav-item ">
                            <a class="nav-link ">

                                <span class="d-none d-lg-inline-block">اهلاً,</span>
                                @if ($currentUserName)
                                    <span class="text-dark">{{ $currentUserName }}</span>
                                @else
                                    <span>زائر</span>
                                @endif
                            </a>
                        </li>
                         </ul>
                 </div>
             </nav>
         </header>
         <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf <!-- Add CSRF token -->
                                <a class="sidebar-link sidebar-link" href="#" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i data-feather="log-out" class="feather-icon"></i>
                                    <span class="hide-menu">تسجيل الخروج</span>
                                </a>
                            </form>
                        </li>


                    </ul>
                </nav>
            </div>
        </aside>
         <div class="page-wrapper page-wrapper-visitor" >
            <div class="page-breadcrumb">
                <div class="row">

                    <div class="col-5 align-self-center">
                    </div>
                </div>
            </div>
            {{-- <div class="container-fluid">
                <div class="row"> --}}
                    @yield('content')


                        {{-- @if(!$visitorScan)
                        <div class="col-12 align-self-center mb-4 ">
                            <h4 style="color: #212529"> العد التنازلي للمعرض</h4>
                        </div>
                        <div class="col-12">
                            <div id="countdown">
                                <span id="days">00</span> ايام
                                <span id="hours">00</span> ساعات
                                <span id="minutes">00</span> دقائق
                                <span id="seconds">00</span> ثواني
                            </div>
                       </div>
                       <div class="col-12 align-self-center mb-4 mt-5">
                            <h4 style="color: #212529">  رمز الاستجابة الخاصة بك</h4>
                        </div>
                        <div class="col-12">
                            <div class="card card-block card-stretch card-height ">
                                <div class="card-body  align-self-center">
                                    <div id="countdown"></div>
                                <div class=" ">
                                    {!! $qrCode !!}

                                </div>

                                </div>
                            </div>
                        </div>
                        @else
                        <div class="col-12 align-self-center mb-4 ">
                            <h4 style="color: #212529">قم بمسح رمز استجابة الأعمال الفنية</h4>
                        </div>
                        <div class="col-12">
                            <div class=" d-flex flex-column align-items-center justify-content-center" style=" ">
                                <video class="w-100  " id="camera" autoplay style="  height: 55vh;



                                object-fit: cover;"></video>
                                <button class=" btn btn-primary mt-2" id="captureButton">مسح</button>

                            </div>
                        </div>

                        @endif --}}
                {{-- </div> --}}
            {{-- </div> --}}

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
       {{-- <script src="{{asset('assets/js/updateCountdown.js')}}"></script> --}}
       {{-- <script src="{{asset('assets/js/scanArtworks.js')}}"></script> --}}
       {{-- <script src="{{asset('assets/js/visitor_custom.js')}}"></script> --}}

       <script src="{{asset('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js')}}"></script>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/jsqr@latest/dist/jsQR.js"></script>

    {{-- <script>


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

        @if(isset($visitorScan->user_id))

        function fetchUpdatedData() {
            $.ajax({
                url: '/getUpdatedVisitorsScan',
                type: 'GET',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    // Check if visitor status has changed
                    if (response.visitorScan) {
                        // Refresh the page or update specific content
                        location.reload(); // Refresh the entire page
                    }
                }
            });
        }
        // Poll for updated data every 30 seconds (adjust as needed)
        setInterval(fetchUpdatedData, 30000);
        @endif




        // Get access to the user's camera
        navigator.mediaDevices.getUserMedia({ video: { facingMode: 'environment' } })
                    .then(function(stream) {
                        // Set the camera stream as the source for the video element
                        var video = document.getElementById('camera');
                        video.srcObject = stream;
                        video.play();
                    })
                    .catch(function(err) {
                        console.error('Error accessing camera:', err);
                        // Display error message to the user
                        alert('Error accessing camera. Please check your camera permissions and try again.');
                    });

                // Initialize variables for video, canvas, and context
                var video = document.getElementById('camera');
                var canvas = document.createElement('canvas');
                canvas.willReadFrequently = true; // Set the willReadFrequently attribute to true
                var context = canvas.getContext('2d');

                // Listen for the 'loadedmetadata' event on the video element
                video.addEventListener('loadedmetadata', function() {
                    // Set the canvas dimensions to match the video dimensions
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                });

                // Listen for clicks on the "capture" button
                document.getElementById('captureButton').addEventListener('click', function() {
                    // Start scanning for QR codes when the "capture" button is clicked
                    // scanQRCode();
                    $.ajax({
                            url: '/getArtworkDetails',
                            type: 'GET',
                            data: {
                                artworkId: 3
                            },
                            success: function(response) {
                                // Handle successful response
                                // Redirect the user to the page with artwork details
                                window.location.href = '/artworks/' + response.artwork.id;
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error('Error fetching artwork details:', error);
                            }
                        });
                });

                function scanQRCode() {
                    // Draw the current frame from the video onto the canvas
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);

                    // Get the image data from the canvas
                    var imageData = context.getImageData(0, 0, canvas.width, canvas.height);

                    // Use jsQR to detect QR codes
                    var code = jsQR(imageData.data, imageData.width, imageData.height);

                    if (code) {
                        // If a QR code is detected, handle it
                        handleQRCode(code);
                    }
                    // } else {
                        // If no QR code is detected, display a message to the user
                        // alert('No QR code detected. Please try again.');
                    // }

                    // Call scanQRCode() recursively to continuously scan for QR codes
                    requestAnimationFrame(scanQRCode);
                }

                function handleQRCode(code) {
                    // Check if the QR code data is empty or not an integer
                    if (!code.data || isNaN(parseInt(code.data))) {
                        // Display a message to the user indicating that the QR code data is invalid
                        alert('Invalid QR code data. Please try again.');
                    } else {
                        // If the QR code data is valid, do whatever you want with it
                        console.log('Detected QR code:', code.data);
                        var artworkId = parseInt(code.data);
                        // Perform an AJAX request to check if the user ID exists in the database
                        $.ajax({
                            url: '/getArtworkDetails',
                            type: 'GET',
                            data: {
                                artworkId: artworkId
                            },
                            success: function(response) {
                                // Handle successful response
                                // Redirect the user to the page with artwork details
                                window.location.href = '/artworks/' + response.artwork.id;
                            },
                            error: function(xhr, status, error) {
                                // Handle error
                                console.error('Error fetching artwork details:', error);
                            }
                        });

                    }
                }
    </script> --}}
 </body>
 </html>
