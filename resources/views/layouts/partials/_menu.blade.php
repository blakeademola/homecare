<li class="{{ active('dashboard') ? 'active' : '' }}">
    <a href="{{ route('dashboard') }}">
        <i class="fas fa-tachometer-alt"></i>Dashboard
    </a>
</li>

@foreach(provMenu() as $key=>$menu)

    <li class=""><a href="{{ route($menu['link']) }}"><i class="{{$menu['icon']}}"></i>{{$menu['name']}}</a></li>
@endforeach
