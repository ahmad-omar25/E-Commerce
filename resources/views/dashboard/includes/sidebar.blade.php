<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true">
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a href="{{route('admin.dashboard')}}"><i class="la la-home"></i><span class="menu-title" data-i18n="nav.scrumboard.main">{{__('dashboard.home')}}</span></a></li>
            <li class="nav-item has-sub"><a href="#"><i class="la la-th-large"></i><span class="menu-title" data-i18n="nav.datatable_extensions.main">{{__('dashboard.settings.name')}}</span></a>
                <ul class="menu-content" style="">
                    <li class="has-sub"><a class="menu-item" href="#" data-i18n="nav.datatable_extensions.datatable_buttons.main">{{__('dashboard.settings.means_of_delivery')}}</a>
                        <ul class="menu-content" style="">
                            <li class=""><a class="menu-item" href="{{route('shipping.edit.methods', 'free')}}" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_basic">{{__('dashboard.settings.free_delivery')}}</a>
                            </li>
                            <li class=""><a class="menu-item" href="{{route('shipping.edit.methods', 'inner')}}" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_html_5_data_export">{{__('dashboard.settings.internal_delivery')}}</a>
                            </li>
                            <li class=""><a class="menu-item" href="{{route('shipping.edit.methods', 'outer')}}" data-i18n="nav.datatable_extensions.datatable_buttons.dt_extensions_buttons_flash_data_export">{{__('dashboard.settings.external_delivery')}}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
