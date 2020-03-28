@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Crete question</div>
                    <form action="/questionnaires/{{$questionnaire->id}}/questions" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="question">Question</label>
                            <input type="text" class="form-control" id="question" name="question[question]" value="{{old('question.question')}}" aria-describedby="questionHelp" place-holder="Enter question">
                            <small id="questionHelp" class="form-text text-muted">Ask simple and to-the-point questions for best results.</small>
                            @error('question.question')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <legend>Choices</legend>
                                <small id="choicesHelp" class="form-text text-muted">Give choices that give you the most insight into your question.</small>
                                <div class="form-group">
                                    <label for="answer1">Choice 1</label>
                                    <input type="text" class="form-control" id="answer1" name="answers[][answer]" value="{{old('answer.0.answer')}}" place-holder="Enter choice 1">
                                    @error('answers.0.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="answer2">Choice 2</label>
                                    <input type="text" class="form-control" id="answer2" name="answers[][answer]" value="{{old('answer.1.answer')}}" place-holder="Enter choice 2">
                                    @error('answers.1.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="answer3">Choice 3</label>
                                    <input type="text" class="form-control" id="answer3" name="answers[][answer]" value="{{old('answer.2.answer')}}" place-holder="Enter choice 3">
                                    @error('answers.2.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="answer4">Choice 4</label>
                                    <input type="text" class="form-control" id="answer4" name="answers[][answer]" value="{{old('answer.3.answer')}}" place-holder="Enter choice 4">
                                    @error('answers.3.answer')
                                        <small class="text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </fieldset>
                        </div>
                        <button type="submit" class="btn btn-primary">Create question</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
