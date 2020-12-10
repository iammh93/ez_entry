@extends('layouts.app')

@push('stylesheets')

@endpush

@section('content')
 <div class="sidenav" style="{{ $step["temperature"] >= 37.5 ? 'background-color: #FF0000' : 'background-color: #3CB043'}}">
        <div class="login-main-text">
          @if($step["temperature"] >= 37.5)
            <h2>{{ __("dashboard.entry_form.step_3.warning", ["full_name" => $step["full_name"]]) }}</h2>
          @else
            <h2>{{ __("dashboard.entry_form.step_3.success") }}</h2>
          @endif()
        </div>
      </div>
      <div class="main">
        <div class="col-md-6 col-sm-12">
            <div class="login-form">
              <div class="form-group">
                  <div class="form-group">
                      <h1>{{ __("dashboard.entry_form.step_3.info_message") }}</h1>
                  </div>
              </div>
              <form action="{{ route('entry.entry-form.3.store')}} " method="POST">
                @csrf
                <button type="submit" class="btn btn-primary float-right">Check In</button>
              </form>
            </div>
        </div>
      </div>
@endsection

@push('scripts')

@endpush
