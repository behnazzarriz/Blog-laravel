
@foreach($comments as $comment)
    <div class="media mb-4 mr-4 media-comment">
        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
        <div class="media-body">
            <h5 class="mt-0">Gest</h5>
            {{$comment->description}}
            <div class=" mt-2 mr-4">
                <button id="reply-{{$comment->id}}" class="btn-reply btn btn-success mb-4">reply</button>


               <div id="form-reply-{{$comment->id}}" class="form-reply" style="display: none">
                   {!! Form::open(['route' => 'frontend.comments.reply', 'method' => 'post']) !!}

                   {!! Form::hidden('parent_id',$comment->id) !!}
                   {!! Form::hidden('post_id',$post->id) !!}

                   <div class="form-group">
                       {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
                   </div>
                   <div class="form-group">
                       {!! Form::submit('Submit reply', ['class' => 'btn btn-primary']) !!}
                   </div>
                   {!! Form::close() !!}
               </div>


                    @if($comment->replies->count())

                    @include('partials.comments',['comments'=>$comment->replies])

                     @endif




            </div>
        </div>
    </div>
@endforeach
<script src="{{ asset('js/comment.js') }}"></script>
