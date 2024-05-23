@extends('layouts.main-admin')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">الأعمال الفنية</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a class="text-muted">إدارة الأعمال الفنية</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">الأعمال الفنية</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-5 align-self-center">
            <div class="customize-input float-start text-center">
                <form method="GET" action="{{ route('admin.artworks.index') }}" id="sort-form">
                    @csrf
                    <select name="sort_by" onchange="document.getElementById('sort-form').submit()" class="custom-select custom-select-set form-control bg-white border-0 custom-shadow custom-radius text-center">
                        <option selected="">فرز</option>
                        <option value="more">الأكثر اعجاباً</option>
                        <option value="less">الأقل اعجاباً</option>
                    </select>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center m-2">
                    <div class="col-6">
                    </div>
                    <div class="col-6">
                            <a href="{{ route('admin.artworks.new') }}" class="btn btn-info btn-circle float-start ms-2" data-bs-toggle="tooltip" data-bs-placement="top" title="إضافة">
                                <i data-feather="plus" class="svg-icon"></i>
                            </a>
                    </div>
                </div>
                @if(session('success'))
                <div class="alert alert-success mt-2">
                    {{ session('success') }}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger mt-2">
                    {{ session('error') }}
                </div>
                @endif

                <!-- Display validation errors -->
                @if ($errors->any())
                <div class="alert alert-danger mt-2">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="border-0">
                                <th class="border-0 font-14 font-weight-medium text-dark">#</th>
                                <th class="border-0 font-14 font-weight-medium text-dark">العنوان</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">صورة العمل</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">الفنان</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">صورة الفنان</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">الوصف</th>
                                <th class="border-0 font-14 font-weight-medium text-dark ">عدد الإعجابات</th>
                                <th class="border-0 font-14 font-weight-medium text-dark">عمليات</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($artworks as $artwork)
                            <tr>
                                <td class="border-top-0 border-bottom-0 font-14 ">{{ $loop->iteration }}</td>
                                <td class="border-top-0 border-bottom-0  font-14">{{ $artwork->title }}</td>
                                {{-- <td class="border-top-0 border-bottom-0  px-2 py-4 font-14">{{ $artwork->artwork_photo }}</td> --}}
                                <td class="border-top-0 border-bottom-0   font-14">
                                    {{-- <img src="{{ asset('storage/artwork_photos/' . $artwork->artwork_photo) }}" width="45" height="40" alt="Artwork Photo"> --}}
                                    {{-- <img src="{{ Storage::disk('s3')->url($artwork->artwork_photo) }}" width="45" height="40" alt="Artwork Photo"> --}}
                                    <img src="{{ Storage::disk('s3')->temporaryUrl($artwork->artwork_photo, '+2 minutes') }}" width="45" height="40" alt="Artwork Photo">

                                </td>
                                <td class="border-top-0 border-bottom-0  font-14">{{ $artwork->artist }}</td>
                                {{-- <td class="border-top-0 border-bottom-0  px-2 py-4 font-14">{{ $artwork->artist_photo }}</td> --}}
                                <td class="border-top-0 border-bottom-0  font-14">
                                    {{-- <img src="{{ asset('storage/artist_photos/' . $artwork->artist_photo) }}" width="45" height="40" alt="Artwork Photo"> --}}
                                    <img src="{{ Storage::disk('s3')->temporaryUrl($artwork->artist_photo, '+2 minutes') }}" width="45" height="40" alt="Artwork Photo">

                                </td>

                                <td class="border-top-0 border-bottom-0   font-14" >{{ $artwork->description }}</td>
                                <td class="border-top-0 border-bottom-0  font-14"> {{ $artwork->like_count }}</td>
                                <td class="font-weight-medium nowrap text-dark border-top-0 border-bottom-0 ">
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="تعديل">
                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#editArtworkModal{{$artwork->id}}">
                                            <i data-feather="edit" class="svg-icon" ></i>
                                        </a>
                                    </span>
                                    <div id="editArtworkModal{{$artwork->id}}" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="topModalLabel">تعديل عمل فني</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form method="POST" action="{{ route('admin.artwork.edit', ['id' => $artwork->id]) }}" id="edit" class="ps-3 pe-3" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')

                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="name">عنوان العمل</label>
                                                            <input class="form-control" type="text" id="title" name="title"
                                                                required placeholder=" " value="{{ $artwork->title }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="name">صورة العمل</label>
                                                            <input class="form-control" type="file" id="artwork_photo" name="artwork_photo" accept=".png,.jpeg,.jpg"  value="{{ old('artwork_photo') }}">

                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="name">الفنان</label>
                                                            <input class="form-control" type="text" id="artist" name="artist"
                                                                required placeholder=" " value="{{ $artwork->artist }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="name">صورة الفنان</label>
                                                            <input class="form-control" type="file" id="artist_photo" name="artist_photo" accept=".png,.jpeg,.jpg"  value="{{ old('artist_photo') }}">
                                                        </div>
                                                        <div class="form-group mb-3">
                                                            <label class="form-label" for="name">الوصف</label>
                                                            <textarea class="form-control" id="description" name="description" required>{{ $artwork->description }}</textarea>
                                                        </div>

                                                        <div class="form-group mb-3 text-center">
                                                            <button class="btn btn-primary" type="submit">تعديل</button>
                                                            <button class="btn btn-outline-primary" type="button" data-bs-dismiss="modal">الغاء</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                    </div><!-- /.modal -->
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف">
                                        <a href="" class="ms-2" data-bs-toggle="modal" data-bs-target="#deleteArtworkModal{{$artwork->id}}">
                                            <i data-feather="trash" class="svg-icon" ></i>
                                        </a>
                                    </span>
                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" title="نسخ الرابط">
                                        <a href="#" class="ms-2" onclick="copyArtworkURL({{ $artwork->id }})">
                                            <i data-feather="clipboard" class="svg-icon" ></i>
                                        </a>
                                    </span>



                                    <div id="deleteArtworkModal{{$artwork->id}}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="fill-primary-modalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content modal-filled bg-primary">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="fill-primary-modalLabel">حذف عمل فني</h4>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-hidden="true"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>هل انت متأكد بأنك تريد حذف هذا العمل؟</p>

                                                </div>
                                                <div class="modal-footer justify-content-center">
                                                    <form action="{{ route('admin.artworks.delete', ['id' => $artwork->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="action" value="inactive" id="action{{$artwork->id}}">
                                                        <button type="submit" class="btn  btn-light ">حذف</button>
                                                    </form>
                                                    <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">الغاء</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
            <div class="card-footer bg-transparent">
                <div class="d-flex justify-content-between align-items-center">

                    <div class="d-flex justify-content-center align-items-center">
                        {{ $artworks->links('pagination::bootstrap-4') }}
                    </div>
                    <p class="text-start mb-0">
                        عرض {{ $artworks->firstItem() }} الى {{ $artworks->lastItem() }}
                        من إجمالي {{ $artworks->total() }} أعمال فنية
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="toast-container position-fixed bottom-0 start-0 p-3 ">
    <div class="toast align-items-start text-white bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="d-flex align-items-center">
        <button type="button" class="btn-close btn-close-white me-2 " data-bs-dismiss="toast" aria-label="Close"></button>

        <div class="toast-body">
          <span class="toast-message"></span>
        </div>
      </div>
    </div>
</div>
<script>

function copyArtworkURL(artworkId) {
    try {
        // Construct the artwork URL
        var artworkURL = "https://technosketch.art/artworks/" + artworkId;
        var toastMessage = document.querySelector('.toast-message');
        var toast = new bootstrap.Toast(document.querySelector('.toast'));

        // Create a temporary textarea element to hold the URL
        var textarea = document.createElement('textarea');
        textarea.value = artworkURL;

        // Append the textarea to the body
        document.body.appendChild(textarea);

        // Select the URL inside the textarea
        textarea.select();

        // Copy the URL to the clipboard
        var successful = document.execCommand('copy');

        // Remove the textarea from the body
        document.body.removeChild(textarea);

        if (successful) {
            // Show a message indicating that the URL has been copied
            toastMessage.innerText = 'تم نسخ رابط العمل بنجاح.';
            toast.show();
        } else {
            // Show a message indicating that the URL could not be copied
            toastMessage.innerText = 'فشل في نسخ رابط العمل.';
            toast.show();
        }
    } catch (error) {
        // Show a message indicating the error
        console.error('Error copying artwork URL:', error);
        toastMessage.innerText = 'حدث خطأ أثناء نسخ رابط العمل.';
        toast.show();
    }
}

</script>
@endsection
