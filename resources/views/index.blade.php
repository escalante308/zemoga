@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-2">
            <div class="profile-img">
                <img class="rounded-circle img-thumbnail img-responsive" src="{{ $user->portfolio->image }}" alt=""
                onError="this.onerror=null;this.src='https://via.placeholder.com/350';" />
            </div>
        </div>
        <div class="col-md-10">
            <div class="profile-head">
                <h2> {{ $user->first_name }} {{ $user->last_name }} </h2>
                <hr>
                <h5> {{ $user->portfolio->title }} </h5>
                <p class="proile-rating">
                    {{ $user->portfolio->description }}
                </p>
                <hr>
                Email: {{ $user->email }}
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-md-12">
    @if(isset($tweets))
        <table class="table">
  <thead>
    <tr>
      <th scope="col" style="width:80%">Text</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($tweets as $tweet)
    <tr>
      <td>{{ $tweet->text }}</td>
      <td>{{ \Carbon\Carbon::parse($tweet->created_at)->toDayDateTimeString() }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
        @endif
        </div>
    </div>

</div>
@endsection
