 @extends('layouts.website')

 @section('content')
    <div class=" bg-light">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span>Category</span>
            <h3>{{ $category->name}}</h3>
            @if($category->description)
            <p>{{ $category->description }}</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-white">
      <div class="container">
      @if($posts->count() > 0)
        <div class="row">
          @foreach( $posts as $post)
          <div class="col-lg-4 mb-4">
            <div class="entry2">
              <a href="{{route('post',['slug' => $post->slug])}}"><img src="{{$post->image}}" alt="Image" class="img-fluid rounded"></a>
              <div class="excerpt">
              <span class="post-category text-white bg-success mb-3">{{$post->category->name}}</span>

              <h2><a href="{{route('post',['slug' => $post->slug])}}">{{$post->title}}</a></h2>
              <div class="post-meta align-items-center text-left clearfix">
                <figure class="author-figure mb-0 mr-3 float-left"><img src="{{asset('images/person_1.jpg')}}" alt="Image" class="img-fluid"></figure>
                <span class="d-inline-block mt-1">By <a href="#">{{$post->user->name}}</a></span>
                <span>&nbsp;-&nbsp; {{$post->created_at->format('M d, Y')}}</span>
              </div>
              
                <p>{{ Str::limit($post->description,120) }}</p>
                <p><a href="#">Read More</a></p>
              </div>
            </div>
          </div>
          @endforeach
        </div>
        <div class="row text-center pt-5 border-top">
          {{ $posts->links() }}
       </div>
      @else
        <h5 class="alert alert-danger"><span class="icon-exclamation-triangle p-2"></span></i> This is no post for this category!.</h5>
      @endif()
    </div>
  </div>
  
@endsection