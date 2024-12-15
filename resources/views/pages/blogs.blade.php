@extends('layouts.main')

@section('content')
<section class="page-title bg-1">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="block text-center">
					<span class="text-white">Our blog</span>
					<h1 class="text-capitalize mb-4 text-lg">Blog articles</h1>
					<ul class="list-inline">
						<li class="list-inline-item"><a href="index.html" class="text-white">Home</a></li>
						<li class="list-inline-item"><span class="text-white">/</span></li>
						<li class="list-inline-item"><a href="#" class="text-white-50">Our blog</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="section blog-wrap bg-gray">
	<div class="container">
		<div class="row">

		<div class="col-lg-8">
			Hello
			{{session('success')}}
		</div>



			@foreach ($blogs as $blog)
				<x-blog-post
					id="{{$blog->id}}"
					slug="{{$blog->slug}}"
					image="images/blog/1.jpg"
					category="Technology, Finance"
					comments-count="5"
					date="28th January"
					title="{{$blog->title}}"
					description="{{$blog->description}}"/>
			@endforeach


		</div>

		<div class="row justify-content-center mt-5">
			<div class="col-lg-6 text-center">
				<nav class="navigation pagination d-inline-block">
					<div class="nav-links">
						<a class="prev page-numbers" href="#">Prev</a>
						<span aria-current="page" class="page-numbers current">1</span>
						<a class="page-numbers" href="#">2</a>
						<a class="next page-numbers" href="#">Next</a>
					</div>
				</nav>
			</div>
		</div>
	</div>
</section>
@endsection