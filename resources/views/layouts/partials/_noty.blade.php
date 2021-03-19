@if(Session::has('success'))
    new Noty({
    type: 'success',
    layout: 'bottomLeft',
    text: '{{Session::get('success') }}',
    theme: 'metroui'
    }).show();

@elseif(Session::has('warning'))
        new Noty({
        type: 'warning',
        layout: 'bottomLeft',
        text: '{{Session::get('warning') }}',
        theme: 'metroui'
        }).show();

@elseif(Session::has('error'))
    new Noty({
    type: 'error',
    layout: 'bottomLeft',
    text: '{{Session::get('error') }}',
    theme: 'metroui'
    }).show();
@endif