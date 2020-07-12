@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">

			<h1>Dashboard Panel</h1>

			@if (!empty($success))
			<div class="alert alert-success alert-block">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<hr>

			{!! Form::open(['url' => '/users/'.$user->id, 'class' => 'form-horizontal']) !!}

			<fieldset>

				<legend>User Info</legend>

				<div class="form-group">
					{!! Form::label('text', 'First Name'); !!}
					<div class="col-lg-6">
						{!! Form::text('first_name', $value = $user->first_name, ['class' => 'form-control', 'placeholder' => "User's first name"]) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('text', 'Last Name'); !!}
					<div class="col-lg-6">
						{!! Form::text('last_name', $value = $user->last_name, ['class' => 'form-control', 'placeholder' => "User's last name", 'required' => 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('email', 'Email'); !!}
					<div class="col-lg-6">
						{!! Form::email('email', $value = $user->email, ['class' => 'form-control', 'placeholder' => "User's email", 'required' => 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						{!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
					</div>
				</div>

			</fieldset>

			{!! Form::close() !!}

			<hr>

			{!! Form::open(['url' => '/dashboard', 'class' => 'form-horizontal']) !!}

			<fieldset>

				<legend>Portfolio Info</legend>

				<div class="form-group">
					{!! Form::label('text', 'Description'); !!}
					<div class="col-lg-6">
						{!! Form::text('description', $value = $user->portfolio->description, ['class' => 'form-control', 'placeholder' => 'A short description', 'required' => 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('text', 'Image URL'); !!}
					<div class="col-lg-6">
						{!! Form::text('image_url', $value = $user->portfolio->image, ['class' => 'form-control', 'placeholder' => 'A link to a image', 'required' => 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('text', 'Twitter Username'); !!}
					<div class="col-lg-6">
						{!! Form::text('twitter_user_name', $value = $user->portfolio->twitter_user_name, ['class' => 'form-control', 'placeholder' => 'The username used on Twitter', 'required' => 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					{!! Form::label('text', 'Title'); !!}
					<div class="col-lg-6">
						{!! Form::text('title', $value = $user->portfolio->title, ['class' => 'form-control', 'value' => 'A Title to refer the portfolio', 'required' => 'required']) !!}
					</div>
				</div>

				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-2">
						{!! Form::submit('Submit', ['class' => 'btn btn-lg btn-info pull-right'] ) !!}
					</div>
				</div>

			</fieldset>

			{!! Form::close() !!}

		</div>
	</div>
</div>
@endsection