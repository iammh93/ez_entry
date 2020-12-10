@extends('layouts.app')

@push('stylesheets')

@endpush

@section('content')
 <div class="sidenav">
        <div class="login-main-text">
            <h2>{{ __("dashboard.side_bar.header") }}</h2>
            <p>{{ __("dashboard.side_bar.sub_header") }}</p>
        </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
               <form action="{{ route('entry.entry-form.1.store')}} " method="POST">
                @csrf
                    <div class="form-group">
                        <div class="form-group">
                            <label>{{ __('dashboard.entry_form.step_1.full_name.label')}}<span class="require-field-symbol"> *</span></label>
                            <input type="text" name="full_name" class="form-control{{ $errors->has('full_name') ? ' is-invalid' : '' }}" value="{{ old('full_name') ?: $step->full_name }}" placeholder="{{ __('dashboard.entry_form.step_1.full_name.tooltip')}}">
                            @if ($errors->has('full_name'))
                                <div class="invalid-feedback">
                                    <strong>{{ $errors->first('full_name') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">{{ __('general.button.next') }}</button>
               </form>
            </div>
         </div>
      </div>
@endsection

@push('scripts')

@endpush
