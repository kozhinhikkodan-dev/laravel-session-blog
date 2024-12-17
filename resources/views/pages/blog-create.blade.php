@extends('layouts.main')

@section('content')

@php
dump(session()->all());

@endphp

<section class="contact-form-wrap section">
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-md-12 col-sm-12">
                <form enctype="multipart/form-data" id="contact-forms" class="00" method="post" action="{{route('blogs.store')}}">
                    @csrf

                    <!-- form message -->
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-success contact__msg" style="display: none" role="alert">
                                Your message was sent successfully.
                            </div>
                        </div>
                    </div>
                    <!-- end message -->
                    <span class="text-color">Add New Blog</span>
                    <h3 class="text-md mb-4">New Blog post</h3>
                    <div class="form-group">
                        <input name="title" value="{{ old('title') }}" type="text" class="form-control" placeholder="Title">
                        @error('title')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>
                    <!-- <div class="form-group">
                        <input name="email" type="email" class="form-control" placeholder="Email Address">
                    </div> -->
                    <div class="form-group-2">
                        <textarea name="description" class="form-control" rows="7" placeholder="Description">{{ old('description') }}</textarea>
                        @error('description')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="category_id" class="form-control">
                            <!-- <option value="0">Invalid</option> -->

                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>

                        @error('category_id')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="author_id" class="form-control">
                        <option value="0" disabled selected>Choose Author</option>
                            @foreach (App\Models\User::all() as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach
                        </select>

                        @error('author_id')
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



                    <div class="form-group">
                        <input name="image" type="file" class="form-control" placeholder="Title">
                        @error('image')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <h5>SEO</h5>

                    <div class="form-group">
                        <input name="meta_title" type="text" class="form-control" placeholder="Meta Title">
                        @error('meta_title')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input name="meta_description" type="text" class="form-control" placeholder="Meta Description">
                        @error('meta_description')
                        <div class="alert alert-danger mt-3">{{ $message }}</div>
                        @enderror
                    </div>




                    <button class="btn btn-main" name="submit" type="submit">Create</button>




                </form>
            </div>

            <div class="col-lg-5 col-sm-12">



                <!-- <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
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
                </div> -->
            </div>
        </div>
    </div>
</section>

@endsection