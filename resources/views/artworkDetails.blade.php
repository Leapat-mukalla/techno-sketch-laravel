@extends('layouts.main-visitors')

@section('content')
<div class="container-fluid">
    <div class="row artwork-page">
        <div class=" col-12 col-lg-12 col-md-6">
            <img class="rounded-circle" src="{{ Storage::disk('s3')->temporaryUrl($artwork->artist_photo, '+2 minutes') }}" width="48px" height="48px"   alt="Artwork Photo">
            <span class="me-2 text-black medium-font">{{ $artwork->artist }}</span>
        </div>
        <div class=" col-12 col-lg-12 col-md-6 mt-4">
            <img class="img-thumbnail" src="{{ Storage::disk('s3')->temporaryUrl($artwork->artwork_photo, '+2 minutes') }}"  alt="Artwork Photo">
        </div>
        <div class=" col-12 col-lg-12 col-md-6 mt-5 d-flex justify-content-between align-items-center ">
            <h4 class="medium-font text-black pt-3">{{ $artwork->title }}</h4>
            <div class=" float-start d-flex justify-content-center align-items-center column-gap-2">
                <img src="{{asset('assets/images/Like 1.png')}}" width="30" alt="">
                <sapn class="text-black font-20 medium-font pt-2">{{$likeCount}}</sapn>
            </div>
        </div>
        <div class=" col-12 col-lg-12 col-md-6 mt-3">
            <p class=""> {{ $artwork->description }}</p>
        </div>
        <div class="col-12 col-lg-12 col-md-6 mt-5">
            @if($likedByUser)
            <button  id="likeButton" onclick="toggleLikeArtwork({{ $artwork->id }})" type="button" class="btn btn-light6 medium-font btn-r-p-custom d-flex justify-content-center align-items-center column-gap-4 w-100" >
                <img src="{{asset('assets/images/Like 1.png')}}" width="30" alt="" class="white-icon">
                <span class=" like-text">ألغِ إعجابك بالعمل</span>
            </button>
            @else
            <button  id="likeButton" onclick="toggleLikeArtwork({{ $artwork->id }})" type="button" class="btn btn-light7  btn-r-p-custom d-flex justify-content-center align-items-center column-gap-4 w-100" >
                <img src="{{asset('assets/images/Like 2.png')}}" width="30" alt="" class="white-icon">
                <span class=" like-text">أبدِ إعجابك بالعمل</span>
            </button>
            @endif
        </div>

    </div>

</div>

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
                var likeText = $('.like-text');
                var likeIcon = likeButton.find('img');
                if (response.liked) {
                    // Artwork is liked
                    likeButton.removeClass('btn-light7 ').addClass('btn-light6');
                    likeText.text('ألغِ إعجابك بالعمل');
                    likeIcon.attr('src', '{{asset('assets/images/Like 1.png')}}');
                    // location.reload();

                } else {
                    // Artwork is disliked
                    likeButton.removeClass('btn-light6').addClass('btn-light7 ');
                    likeText.text('أبدِ إعجابك بالعمل');
                    likeIcon.attr('src', '{{asset('assets/images/Like 2.png')}}');
                    // location.reload();
                }
            },
            error: function(xhr, status, error) {
                displayErrorModal('حدث خطأ أثناء تنفيذ العملية. حاول مرة اخرى.');
            }
        });
    }
</script>
@endsection

