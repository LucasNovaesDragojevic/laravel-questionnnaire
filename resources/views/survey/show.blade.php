@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>{{$questionnaire->title}}</h1>
            <form action="/surveys/{{$questionnaire->id}}-{{Str::slug($questionnaire->title)}}" method="post">
                @csrf
                @foreach($questionnaire->questions as $key => $question)
                    <div class="card mt-4">
                        <div class="card-header"><strong>{{$key + 1}}</strong> {{$question->question}}</div>
                        <div class="card-body">
                            @error('responses.' . $key . '.answer_id')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                            <ul class="list-group">
                                @foreach($question->answers as $answer)
                                    <label for="answer{{$answer->id}}">
                                        <li class="list-group-item">
                                            <input class="mr-2" type="radio" name="responses[{{$key}}][answer_id]" id="answer{{$answer->id}}" value="{{$answer->id}}" {{(old('responses.' .$key. '.answer_id') == $answer->id) ? 'checked' : ''}}>
                                            {{$answer->answer}}
                                        </li>
                                        <input type="hidden" name="responses[{{$key}}][question_id]" value="{{$question->id}}">
                                    </label>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
                <div class="card mt-4">
                    <div class="card-header">Your information</div>
                    <div class="form-group">
                        <label for="name">Your name</label>
                        <input class="form-control" type="text" name="survey[name]" id="name" aria-describedby="nameHelp" placeholder="Enter name">
                        <small class="form-text text-muted" id="nameHelp">Hello! Whats your name?</small>
                        @error('name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Your e-mail</label>
                        <input class="form-control" type="email" name="survey[email]" id="email" aria-describedby="emailHelp" placeholder="Enter e-mail">
                        <small class="form-text text-muted" id="emailHelp">Hello! Whats your name?</small>
                        @error('email')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-dark" type="submit">Complete survey</button>
            </form>
        </div>
    </div>
</div>
@endsection
