@extends('layouts.app')

@section('content')
<div class="container text-center">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>You are logged in!</p>
                    <a class="btn btn-dark" href="/questionnaires/create">Create new questionnaire</a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header">My questionnaires</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($questionnaires as $questionnaire)
                            <li class="list-group-item">
                                <a href="{{$questionnaire->path()}}">{{$questionnaire->title}}</a>
                                <div class="mt-2">
                                    <small class="font-weight-bold">Share URL</small>
                                    <p>
                                        <a href="{{$questionnaire->publicPath()}}">{{$questionnaire->publicPath()}}</a>
                                    </p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
