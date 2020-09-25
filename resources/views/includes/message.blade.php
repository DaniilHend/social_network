@foreach($comments as $message)
    @if($userId == $sessionUserId)
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5">{{ $message->title }}</span>
                <span class="text-black-50">{{ $message->user_id }}</span>
            </p>
            <div class="align-self-start">{{ $message->message }}</div>
            <br>
            <div>
                <form action="{{ route('deleteComment') }}" method="POST"
                      class="text-left">
                    @csrf
                    <input type="number" class="d-none" name="commentId"
                           id="task{{ $message->id }}"
                           value="{{ $message->id }}">
                    <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                    </button>
                </form>
                @foreach($responses as $response)
                    @if($response->message_id == $message->id)
                        <div class="card-footer d-flex flex-column">
                            <p class="d-flex justify-content-between">
                                <span class="h5">{{ $response->title }}</span>
                                <span class="text-black-50">{{ $response->user_id }}</span>
                            </p>
                            <div class="align-self-start">{{ $response->message }}</div>
                            <br>
                            <form action="{{ route('deleteComment') }}" method="POST"
                                  class="text-left">
                                @csrf
                                <input type="number" class="d-none" name="commentId"
                                       id="task{{ $response->id }}"
                                       value="{{ $response->id }}">
                                <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                </button>
                            </form>
                        </div>
                    @endif
                @endforeach
                <form action="{{ route('createComment') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="number" class="d-none" name="commentId"
                           id="task{{ $message->id }}"
                           value="{{ $message->id }}">
                    <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
                    <input name="title" type="text" class="form-control mb-2"
                           placeholder="Заголовок комментария">
                    <textarea name="message" class="form-control mb-2"
                              placeholder="Текст комментария"></textarea>
                    <button name="send" class="btn btn-primary btn-block mb-2" type="submit">
                        Ответить
                    </button>
                </form>
            </div>

        </div>
    @elseif($message->user_id == $sessionUserId && $sessionUserId)
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5">{{ $message->title }}</span>
                <span class="text-black-50">{{ $message->user_id }}</span>
            </p>
            <div class="align-self-start">{{ $message->message }}</div>
            <br>
            <div>
                <form action="{{ route('deleteComment') }}" method="POST" id="comments"
                      class="text-left">
                    @csrf
                    <input type="number" class="d-none" name="commentId"
                           id="task{{ $message->id }}"
                           value="{{ $message->id }}">
                    <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                    </button>
                </form>
                @foreach($responses as $response)
                    @if($response->message_id == $message->id)
                        <div class="card-footer d-flex flex-column">
                            <p class="d-flex justify-content-between">
                                <span class="h5">{{ $response->title }}</span>
                                <span class="text-black-50">{{ $response->user_id }}</span>
                            </p>
                            <div class="align-self-start">{{ $response->message }}</div>
                            @if($response->user_id == $sessionUserId && $sessionUserId)
                                <br>
                                <form action="{{ route('deleteComment') }}" method="POST"
                                      class="text-left">
                                    @csrf
                                    <input type="number" class="d-none" name="commentId"
                                           id="task{{ $response->id }}"
                                           value="{{ $response->id }}">
                                    <button name="delete" class="btn btn-danger btn-block" type="submit">Удалить
                                    </button>
                                </form>
                            @endif
                        </div>
                    @endif
                @endforeach
                <form action="{{ route('createComment') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="number" class="d-none" name="commentId"
                           id="task{{ $message->id }}"
                           value="{{ $message->id }}">
                    <input name="profile_id" type="number" class="d-none" value="{{ $userId }}">
                    <input name="title" type="text" class="form-control mb-2"
                           placeholder="Заголовок комментария">
                    <textarea name="message" class="form-control mb-2"
                              placeholder="Текст комментария"></textarea>
                    <button name="send" class="btn btn-primary btn-block mb-2" type="submit">
                        Ответить
                    </button>
                </form>
            </div>

        </div>
    @else
        <div class="card-footer d-flex flex-column">
            <p class="d-flex justify-content-between">
                <span class="h5">{{ $message->title }}</span>
                <span class="text-black-50">{{ $message->user_id }}</span>
            </p>
            <div class="align-self-start">{{ $message->message }}</div>
            <br>
            @foreach($responses as $response)
                @if($response->message_id == $message->id)
                    <div class="card-footer d-flex flex-column">
                        <p class="d-flex justify-content-between">
                            <span class="h5">{{ $response->title }}</span>
                            <span class="text-black-50">{{ $response->user_id }}</span>
                        </p>
                        <div class="align-self-start">{{ $response->message }}</div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
@endforeach
