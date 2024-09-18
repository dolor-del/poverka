 <ul class="sidebar-menu">
    @if(Auth::user()->role->value === \App\Enums\UserRole::ADMIN || Auth::user()->role->value === \App\Enums\UserRole::DISPATCHER)
    <li class="header">ОСНОВНАЯ НАВИГАЦИЯ</li>
    <li><a href="{{route('orders.index')}}"><i class="fa fa-list-ul"></i> <span>Заявки</span></a></li>
    @endif
    @if(Auth::user()->role->value === \App\Enums\UserRole::ADMIN || Auth::user()->role->value === \App\Enums\UserRole::WORKER)
    <li class="header">ПОВЕРИТЕЛЯМ</li>
    <li><a href="{{route('itinerary.index')}}"><i class="fa fa-map-marker"></i> <span>Маршрут</span></a></li>
    <li><a href="{{route('meters.index')}}"><i class="fa fa-tachometer"></i> <span>Счетчики</span></a></li>
    @endif
    @if(Auth::user()->role->value === \App\Enums\UserRole::ADMIN)
    <li class="header">АДМИНИСТРИРОВАНИЕ</li>
    <li><a href="{{route('users.index')}}"><i class="fa fa-users"></i> <span>Пользователи</span></a></li>
    @endif
    <li class="header">АРХИВЫ</li>
    <li><a href="{{route('archive.index')}}"><i class="fa fa-archive"></i> <span>Архив</span></a></li>
    <li><a href="{{route('trash.index')}}"><i class="fa fa-trash"></i> <span>Корзина</span></a></li>
</ul>
