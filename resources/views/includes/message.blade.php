@section('message')
    <div class="card-footer d-flex flex-column">
        <p class="d-flex justify-content-between"><span class="h5">{{ $message->title }}</span>
            <span class="text-black-50">{{ $message->user_id }}</span></p>
        <div class="align-self-start">{{ $message->message }}</div>
        @if($message->user_id)
        @endif
        <br>
        <input type="checkbox" name="commentId[]" id="task{{ $message->id }}"
               value="{{ $message->id }}">
    </div>
@endsection
