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
                     <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)">
                         <i data-feather="menu" class="feather-icon"></i>

                     </a>
                     <!-- ============================================================== -->
                     <!-- Logo -->
                     <!-- ============================================================== -->
                     {{-- <div class="navbar-brand">
                         <a href="#">
                             <img src="{{asset('assets/images/logo.png')}}" alt="" class="img-fluid" style="max-width: 65%;margin-right: 21px;">
                         </a>
                     </div> --}}

                     <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                         data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                         aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i data-feather="more-horizontal" class="feather-icon"></i>

                     </a>
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


                             <li class="nav-item ">

                             </li>
                         </ul>
                 </div>
             </nav>
         </header>
         <div class="page-wrapper page-wrapper-visitor" >
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        @php
                        $currentUserName = \App\Services\AccountService::getCurrentUserName();
                        @endphp
                        @if ($currentUserName)
                        <h3 class="page-title text-nowrap text-dark font-weight-medium mb-1">    مرحباً، {{ $currentUserName }} 🧑🏻‍🎨💥</h3>
                        @else
                        <h3 class="page-title text-nowrap text-dark font-weight-medium mb-1">    مرحباً 🧑🏻‍🎨💥</h3>
                        @endif
                        {{-- <h3 class="page-title text-nowrap text-dark font-weight-medium mb-1">    مرحباً، {{ $currentUserName }} 🧑🏻‍🎨💥</h3> --}}

                    </div>
                    <div class="col-5 align-self-center">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="card card-block card-stretch card-height ">
                            <div class="card-body align-self-center">
                                @if(session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif

                                <!-- Display validation errors -->
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                {{-- <form method="POST" class="ps-3 pe-3 col-12 col-lg-6 col-md-6" action="{{ route('createVisitorScan') }}">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <input class="form-control" type="text"  name="user_id"
                                            required value="9">
                                    </div>
                                    <div class="form-group mb-4  text-center d-grid gap-2">
                                        <button class="btn btn-primary" type="submit">اضافة</button>
                                        <button class="btn waves-effect waves-light btn-light " type="reset">الغاء</button>
                                    </div>

                                </form> --}}
                                <div class=" " style=" ">
                                    <video class=" " id="camera" autoplay></video>
                                </div>
                            </div>
                            <div class=" card-footer bg-transparent text-center">
                                <button class=" btn btn-primary " id="captureButton">التقاط</button>
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


     <script src="https://cdn.jsdelivr.net/npm/jsqr@latest/dist/jsQR.js"></script>
    <script>
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
            scanQRCode();
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
                var userId = parseInt(code.data);
                // Perform an AJAX request to check if the user ID exists in the database
                $.ajax({
                    url: '/checkUserId',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        userId: userId
                    },
                    success: function(response) {
                        if (response.exists) {
                            // If the user ID exists, ask for confirmation from the user
                            var confirmAttendance = confirm('Do you want to confirm visitor attendance?');
                            if (confirmAttendance) {
                                // If confirmed, create a new entry in the visitors table
                                $.ajax({
                                    url: '/createVisitorScan',
                                    type: 'POST',
                                    data: {
                                        _token: '{{ csrf_token() }}',
                                        userId: userId
                                    },
                                    success: function() {
                                        alert('Visitor attendance confirmed successfully.');
                                    },
                                    // error: function(xhr, status, error) {
                                    //     console.error('Error creating visitor scan:', error);
                                    //     alert('Error confirming visitor attendance. Please try again.');
                                    // }
                                    error: function(xhr, status, error) {
                                    console.error('Error creating visitor scan:', error);
                                    if (xhr.responseJSON && xhr.responseJSON.error) {
                                        alert('Error confirming visitor attendance: ' + xhr.responseJSON.error);
                                    } else {
                                        alert('Error confirming visitor attendance. Please try again.');
                                    }
                                }
                                });
                            }
                        } else {
                            // If the user ID does not exist, display an error message to the user
                            alert('User with ID ' + userId + ' not found. Please try again.');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error checking user ID:', error);
                        alert('Error checking user ID. Please try again.');
                    }
                });

            }
        }


    </script>



 </body>
 </html>
