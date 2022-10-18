<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/buses') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.bus.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/seats') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.seat.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/stations') }}"><i class="nav-icon icon-plane"></i> {{ trans('admin.station.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/trips') }}"><i class="nav-icon icon-ghost"></i> {{ trans('admin.trip.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/stations-trips') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.stations-trip.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
