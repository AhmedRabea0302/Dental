@foreach($blog->comments as $comment)
    <div class="comment-item-img">
        <img src="{{ asset('assets/site/images/safe_image(9).jpg') }}">
    </div>
    <div class="comment-item-content">
        <h3 class="title title-sm">{{ $comment->name }}</h3>
        <span class="blog-date">{{ $comment->created_at->format('M d ,Y') }}</span>
        <p>
            {{ $comment->message }}
        </p>
    </div>
@endforeach