@foreach($comments as $message)
    @if($userId == $sessionUserId)
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5">{{ $message->title }}</span>
                <span class="text-black-50">{{ $message->user_id }}</span>
            </p>
            <div class="align-self-start">{{ $message->message }}</div>
            <br>
            <input type="checkbox" name="commentId[]" id="task{{ $message->id }}"
                   value="{{ $message->id }}">
        </div>
    @elseif($message->user_id == $sessionUserId && $sessionUserId)
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5">{{ $message->title }}</span>
                <span class="text-black-50">{{ $message->user_id }}</span>
            </p>
            <div class="align-self-start">{{ $message->message }}</div>
            <br>
            <input type="checkbox" name="commentId[]" id="task{{ $message->id }}"
                   value="{{ $message->id }}">
        </div>
    @else
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5">{{ $message->title }}</span>
                <span class="text-black-50">{{ $message->user_id }}</span>
            </p>
            <div class="align-self-start">{{ $message->message }}</div>
        </div>
    @endif
@endforeach
