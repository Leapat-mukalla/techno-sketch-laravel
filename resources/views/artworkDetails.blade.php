@extends('layouts.main-visitors')

@section('content')
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
                </div>

            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <img class="img-thumbnail" src="{{ Storage::disk('s3')->temporaryUrl($artwork->artwork_photo, '+2 minutes') }}"  alt="Artwork Photo">

                <div class="mt-2 ">
                    <img class="rounded-circle" src="{{ Storage::disk('s3')->temporaryUrl($artwork->artist_photo, '+2 minutes') }}" width="35" height="35"   alt="Artwork Photo">
                    <span class="me-2 text-black">{{ $artwork->artist }}</span>
                    <div class=" float-start d-flex justify-content-center align-items-center mt-1">
                        @if($likedByUser)
                        <button  id="likeButton" onclick="toggleLikeArtwork({{ $artwork->id }})" type="button" class="btn" >
                            <i id="likeIcon" data-feather="thumbs-up" class="feather-icon text-primary"></i>
                        </button>
                        @else
                        <button  id="likeButton" onclick="toggleLikeArtwork({{ $artwork->id }})" type="button" class="btn" >
                            <i  id="likeIcon" data-feather="thumbs-up" class="feather-icon "></i>
                        </button>
                        @endif
                        <sapn class="text-black me-2">{{$likeCount}}</sapn>
                    </div>

                </div>
                <p class="mt-4"> {{ $artwork->description }}</p>
               </div>

        </div>
        <div class="card-footer bg-transparent">
            <a href="{{ route('visitors-scan') }}" class="btn btn-primary"> العودة الى المسح </a>
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
                // var likeButton = $('#likeButton');
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
                displayErrorModal('حدث خطأ أثناء تنفيذ العملية. حاول مرة اخرى.');

                // console.error('Error toggling like for artwork:', error);
            }
        });
    }
</script>
@endsection

