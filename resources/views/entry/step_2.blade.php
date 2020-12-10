@extends('layouts.app')

@push('stylesheets')

@endpush

@section('content')
 <div class="sidenav">
        <div class="login-main-text">
            <h2>{{ __('dashboard.entry_form.step_2.header', ["full_name" => $step["full_name"]]) }}</h2>
            <p>{{ __('dashboard.entry_form.step_2.checkin_date') }} {{ $step["checkin_date"]->toDayDateTimeString() }}</p>
        </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
              <img src="{{ url('/scanner.jpg') }}" alt="scanner"/>
               <form action="{{ route('entry.entry-form.2.store')}} " method="POST">
                @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <h1>{{ __('dashboard.entry_form.step_2.check_temperature') }}</h1>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">{{ __('general.button.start') }}</button>
                    <a href="{{ route('entry.entry-form.1.index') }}" class="btn btn-light float-right mr-2">{{ __('general.button.back') }}</a>
               </form>
            </div>
         </div>
      </div>
@endsection

@push('scripts')

@endpush
