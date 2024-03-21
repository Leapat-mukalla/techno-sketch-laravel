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
       <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-transparent">
                    <div class="row ">
                        <div class="col-6">
                            {{-- <div class="float-end"> --}}
                                <h4 class="card-title">{{ $artwork->title }}</h4>
                            {{-- </div> --}}
                        </div>
                        <div class="col-3">

                        </div>
                        <div class="col-3 d-flex justify-content-end">
                        @if($likedByUser)
                        <button  id="likeButton" onclick="toggleLikeArtwork({{ $artwork->id }})" type="button" class="btn btn-info" >
                            <i data-feather="thumbs-up" class="feather-icon"></i>
                        </button>
                        @else
                        <button  id="likeButton" onclick="toggleLikeArtwork({{ $artwork->id }})" type="button" class="btn btn-light" >
                            <i data-feather="thumbs-up" class="feather-icon"></i>
                        </button>
                        @endif
                        </div>

                    </div>
                </div>

                <div class="card-body">
                    <div class="row">
                        <img class="img-thumbnail" src="{{ route('photo', ['type' => 'artwork', 'filename' => $artwork->artwork_photo]) }}" alt="Artwork Photo">
                        <div class="mt-2 ">
                            <img class="rounded-circle" src="{{ route('photo', ['type' => 'artist', 'filename' => $artwork->artist_photo]) }}" width="35" height="35" alt="Artwork Photo">
                            <span class="me-2 text-black">{{ $artwork->artist }}</span>
                            <div class=" float-start d-flex justify-content-center align-items-center mt-1">
                                <i data-feather="heart" class="feather-icon text-danger"></i>
                                <sapn class="text-black me-2">{{$likeCount}}</sapn>
                            </div>

                        </div>
                        <p class="mt-4"> {{ $artwork->description }}</p>
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
        // Function to handle toggle like action
        function toggleLikeArtwork(artworkId) {
            $.ajax({
                url: '/toggleLikeArtwork',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    artworkId: artworkId
                },
                success: function(response) {
                    // Update UI to reflect toggle like action
                    // Toggle between thumbs-up and thumbs-down icons based on response
                    var likeButton = $('#likeButton');
                    if (response.liked) {
                        // Artwork is liked
                        likeButton.removeClass('btn-light').addClass('btn-info');
                        location.reload();

                    } else {
                        // Artwork is disliked
                        likeButton.removeClass('btn-info').addClass('btn-light');
                        location.reload();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error toggling like for artwork:', error);
                }
            });
        }
    </script>
</body>
</html>

