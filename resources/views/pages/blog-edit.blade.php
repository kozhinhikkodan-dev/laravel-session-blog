@extends('layouts.main')

@section('content')

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                 <form id="contact-forms" class="00" method="post" action="{{route('blogs.update',['blog'=>$blog->id])}}">
                @csrf
                @method('PUT')
                 <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <span class="text-color">Edit Blog</span>
                    <h3 class="text-md mb-4">New Blog post</h3>
                    <div class="form-group">
                        <input name="title" value="{{$blog->title}}" type="text" class="form-control" placeholder="Title">
                        @error('title')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email Address">
                    </div> -->
                    <div class="form-group-2 mb-4">
                        <textarea name="description" class="form-control" rows="7" placeholder="Description">{{$blog->description}}</textarea>
                        @error('description')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                    <select name="tags[]" class="form-control select2" multiple>
                    <!-- <option value="0">Invalid</option> -->

                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>   

                    @error('category_id')
                            <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                </div>
                
                    <button class="btn btn-main" name="submit" type="submit">Update</button>
                </form>
            </div>

            <div class="col-lg-5 col-sm-12">
                <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
                    <span class="text-muted">We are Professionals</span>
                    <h2 class="mb-5 mt-2">Don’t Hesitate to contact with us for any kind of information</h2>

                    <ul class="address-block list-unstyled">
                        <li>
                            <i class="ti-direction mr-3"></i>North Main Street,Brooklyn Australia
                        </li>
                        <li>
                            <i class="ti-email mr-3"></i>Email: contact@mail.com
                        </li>
                        <li>
                            <i class="ti-mobile mr-3"></i>Phone:+88 01672 506 744
                        </li>
                    </ul>

                    <ul class="social-icons list-inline mt-5">
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="http://www.themefisher.com"><i class="fab fa-linkedin-in"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection