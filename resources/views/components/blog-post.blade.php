<div class="col-lg-6 col-md-6 mb-5">
    <div class="blog-item">
        <img src="{{asset($image)}}" alt="" class="img-fluid rounded">
        <div class="blog-item-content bg-white p-5">
            <div class="blog-item-meta bg-gray py-1 px-2">
                <span class="text-muted text-capitalize mr-3"><i class="ti-pencil-alt mr-2"></i>{{$category}}</span>
                <span class="text-muted text-capitalize mr-3"><i class="ti-comment mr-2"></i>{{$commentsCount}} Comments</span>
                <span class="text-black text-capitalize mr-3"><i class="ti-time mr-1"></i> {{$date}}</span>
            </div>
            <h3 class="mt-3 mb-3"><a href="{{route('blogs.show',['blog'=>$id])}}">{{$title}}</a></h3>
            <p class="mb-4">{{$description}}</p>
            <a href="{{route('blogs.show',['blog'=>$id])}}" class="btn btn-small btn-main btn-round-full">Learn More</a>
        </div>
    </div>
</div>