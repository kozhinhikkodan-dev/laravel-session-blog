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

			<x-blog-post
				id="1"
				image="images/blog/1.jpg"
				category="Technology, Finance"
				comments-count="5"
				date="28th January"
				title="Improve design with typography?"
				description="Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium pariatur repudiandae!"
			/>

			<x-blog-post
				id="2"
				image="images/blog/2.jpg"
				category="Design"
				comments-count="10"
				date="15th February"
				title="Interactivity design may connect consumer"
				description="Iste, rerum beatae repellat tenetur incidunt quisquam libero dolores laudantium. Nesciunt quis itaque quidem, voluptatem autem eos animi laborum iusto expedita sapiente."
			/>

			<x-blog-post
				id="3"
				image="images/blog/3.jpg"
				category="Marketing"
				comments-count="8"
				date="20th March"
				title="Marketing Strategy to bring more affect"
				description="Quam maiores perspiciatis temporibus odio reiciendis error alias debitis atque consequuntur natus iusto recusandae numquam corrupti facilis blanditiis."
			/>

			<x-blog-post
				id="4"
				image="images/blog/4.jpg"
				category="Design"
				comments-count="12"
				date="12th April"
				title="How to improve design with ui/ux"
				description="Consectetur adipisicing elit. Iste, rerum beatae repellat tenetur incidunt quisquam libero dolores laudantium. Nesciunt quis itaque quidem, voluptatem autem eos animi laborum iusto expedita sapiente."
			/>

			<x-blog-post
				id="5"
				image="images/blog/5.jpg"
				category="Marketing"
				comments-count="9"
				date="19th May"
				title="The best way to marketing in 2020"
				description="Quam maiores perspiciatis temporibus odio reiciendis error alias debitis atque consequuntur natus iusto recusandae numquam corrupti facilis blanditiis."
			/>

			<x-blog-post
				id="6"
				image="images/blog/6.jpg"
				category="Design"
				comments-count="11"
				date="15th June"
				title="How to improve design with web development"
				description="Iste, rerum beatae repellat tenetur incidunt quisquam libero dolores laudantium. Nesciunt quis itaque quidem, voluptatem autem eos animi laborum iusto expedita sapiente."
			/>

			<x-blog-post
				id="7"
				image="images/blog/7.jpg"
				category="Marketing"
				comments-count="7"
				date="10th July"
				title="The best way to improve design with marketing"
				description="Non illo quas blanditiis repellendus laboriosam minima animi. Consectetur accusantium pariatur repudiandae!"
			/>

			<x-blog-post
				id="8"
				image="images/blog/8.jpg"
				category="Design"
				comments-count="13"
				date="28th August"
				title="Improve design with typography?"
				description="Quam maiores perspiciatis temporibus odio reiciendis error alias debitis atque consequuntur natus iusto recusandae numquam corrupti facilis blanditiis."
			/>

			<x-blog-post
				id="9"
				image="images/blog/8.jpg"
				category="Design"
				comments-count="13"
				date="28th August"
				title="Improve design with typography?"
				description="Quam maiores perspiciatis temporibus odio reiciendis error alias debitis atque consequuntur natus iusto recusandae numquam corrupti facilis blanditiis."
			/>
		
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