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
     <title> تكنوسكيتش</title>
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
         data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full" class="main-wrapper-visitor">

         <header class="topbar-visitor " data-navbarbg="skin6">
             <nav class="navbar top-navbar p-3 " style="flex-wrap: unset;">
                {{-- <div class="position-absolute"> --}}
                    <div class=" float-end w-25">
                        <a href="#" class=" ">
                            <img src="{{asset('assets/images/techno-logo.png')}}" alt="" class="img-fluid p-lg-4 p-md-4" style="min-width: 140px;">
                        </a>
                    </div>
                    <div class=" float-start d-flex column-gap-2 justify-content-center align-items-center ">
                            @php
                            $currentUserName = \App\Services\AccountService::getCurrentUserName();
                            @endphp
                                <a class=" text-white visitor-name">
                                    <span class=" ">اهلاً,</span>
                                    @if ($currentUserName)
                                        <span class="">{{ $currentUserName }}</span>
                                    @else
                                        <span>زائر</span>
                                    @endif
                                </a>

                                <a class="dropdown-toggle" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal" >
                                    <img src="{{asset('assets/images/out 1.png')}}" alt="" class="svg-icon">
                                </a>



                                <div id="logoutModal" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="fill-primary-modalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content modal-filled bg-white" style="    border-radius: 8px;
                                        ">
                                            <div class="modal-header border-bottom border-dark-subtle ms-3 me-3">
                                                <h4 class="modal-title medium-font font-20" id="fill-primary-modalLabel" style="color: #0C23FB"> تسجيل الخروج</h4>
                                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-hidden="true"></button> --}}
                                            </div>
                                            <div class="modal-body">
                                                <p class=" text-black">هل أنت متأكد من أنك تريد تسجيل الخروج؟</p>

                                            </div>
                                            <div class="modal-footer justify-content-center">
                                                <form action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                    <div class="form-group text-center d-grid gap-2 ">
                                                        <button type="submit" class="btn btn-light4 medium-font btn-r-p-custom">تسجيل الخروج</button>
                                                        <button type="button" class="btn btn-light5 medium-font btn-r-p-custom" data-bs-dismiss="modal">إلغاء الأمر</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    </div>
                {{-- </div> --}}

             </nav>
         </header>

         <div class="page-wrapper  page-wrapper-landing" >

                    @yield('content')

             <footer class="footer text-center text-muted">
                 &copy; 2024 بواسطة <a href="{{ route('landing.page') }}">تكنوسكيتش</a>
             </footer>

         </div>

     </div>
<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="errorModalLabel">حدث خطأ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Error message will be displayed here -->
                <p id="errorMessage"></p>
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
    // Function to display error message in modal
    function displayErrorModal(message) {
                        // Set the error message in the modal body
                        document.getElementById('errorMessage').innerText = message;
                        // Trigger the modal to display
                        var modal = new bootstrap.Modal(document.getElementById('errorModal'));
                        modal.show();
                    }

                    // Call this function to open the modal with the specified message
                    function openErrorModal(message) {
                        // Display the button to trigger the modal
                        document.getElementById('openModalButton').click();
                        // Display the error message in the modal
                        displayErrorModal(message);
                    }
    </script>
 </body>
 </html>
