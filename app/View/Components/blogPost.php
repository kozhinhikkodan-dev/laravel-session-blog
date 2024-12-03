<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blogPost extends Component
{
    /**
     * Create a new component instance.
     */


    //  id="1"
	// 			image="images/blog/1.jpg"
	// 			category="Creativity"
	// 			comments-count="5"
	// 			date="28th January"
	// 			title="Improve design with typography?"
	// 			description=""

    public $id;
    public $slug;
    public $image;
    public $category;
    public $commentsCount;
    public $date;
    public $title;
    public $description;

    public function __construct($id, $slug,$image, $category, $commentsCount, $date, $title, $description)
    {
        $this->id = $id;
        $this->slug = $slug;
        $this->image = $image;
        $this->category = $category;
        $this->commentsCount = $commentsCount;
        $this->date = $date;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.blog-post');
    }
}
