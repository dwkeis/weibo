@extends('layouts.default')

@section('content')
  @if (Auth::check())
    <div class="row">
      <div class="col-md-8">
        <section class="status_form">
          @include('shared._status_form')
        </section>
        <h4>Weibo List</h4>
        <hr>
        @include('shared._feed')
      </div>
      <aside class="col-md-4">
        <section class="user_info">
          @include('shared._user_info', ['user' => Auth::user()])
        </section>
        <section class="stats mt-2">
          @include('shared._stats', ['user' => Auth::user()])
        </section>
      </aside>
    </div>
  @else
	<div class="jumbotron">
		<h1>Home Page</h1>
		<p class="lead">
			Now you watching is <a href="https://learnku.com/courses/laravel-essential-training">Laravel intro</a>'s sample home page
		</p>
		<p>
			Everything, strat from here.
		</p>
		<p>
			<a class="btn btn-lg btn-success" href="{{ route('signup') }}" role="button">Register now</a>
		</p>
	</div>
	@endif
@stop
