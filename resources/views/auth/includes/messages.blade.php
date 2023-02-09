@if ($errors->any())
    <div class="alert alert-danger alert-icon text-14 text-start" role="alert">
        <i class="uil uil-times-circle"></i> {{ __('global.something_went_wrong') }}
        @if (count($errors->all()) === 1)
            {{ current($errors->all()) }}
        @else
            <br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{!! $error !!}</li>
                @endforeach
            </ul>
        @endif
    </div>
@elseif (session()->get('flash_success'))
    <div class="alert alert-success alert-icon text-14 text-start" role="alert">
        <i class="uil uil-check-circle"></i>
        @if (is_array(json_decode(session()->get('flash_success'), true)))
            {!! implode('', session()->get('flash_success')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_success') !!}
        @endif
    </div>
@elseif (session()->get('flash_warning'))
	<div class="alert alert-warning alert-icon text-14 text-start" role="alert">
        <i class="uil uil-exclamation-triangle"></i>
        @if (is_array(json_decode(session()->get('flash_warning'), true)))
            {!! implode('', session()->get('flash_warning')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_warning') !!}
        @endif
    </div>
@elseif (session()->get('flash_info'))
	<div class="alert alert-info alert-icon text-14 text-start" role="alert">
        <i class="uil uil-exclamation-circle"></i>
        @if (is_array(json_decode(session()->get('flash_info'), true)))
            {!! implode('', session()->get('flash_info')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_info') !!}
        @endif
    </div>
@elseif (session()->get('flash_danger'))
	<div class="alert alert-danger alert-icon text-14 text-start" role="alert">
        <i class="uil uil-times-circle"></i>
        @if (is_array(json_decode(session()->get('flash_danger'), true)))
            {!! implode('', session()->get('flash_danger')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_danger') !!}
			@if (session()->get('flash_message'))
                Message: {!! session()->get('flash_message') !!}
            @endif
        @endif
    </div>
@elseif (session()->get('flash_message'))
	<div class="alert alert-info alert-icon text-14 text-start" role="alert">
        <i class="uil uil-exclamation-circle"></i>
        @if (is_array(json_decode(session()->get('flash_message'), true)))
            {!! implode('', session()->get('flash_message')->all(':message<br/>')) !!}
        @else
            {!! session()->get('flash_message') !!}
        @endif
    </div>
@endif
