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
            <li class="nav-item has-sub"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">{{__('dashboard.categories.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Category::parent()->count()}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('main_categories.index')}}" data-i18n="nav.navbars.nav_light">{{__('dashboard.categories.view_all')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('main_categories.create')}}" data-i18n="nav.navbars.nav_dark">{{__('dashboard.categories.create')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">{{__('dashboard.subCategories.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Category::child()->count()}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('sub_categories.index')}}" data-i18n="nav.navbars.nav_light">{{__('dashboard.subCategories.view_all')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('sub_categories.create')}}" data-i18n="nav.navbars.nav_dark">{{__('dashboard.subCategories.create')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">{{__('dashboard.brands.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Brand::count()}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('brands.index')}}" data-i18n="nav.navbars.nav_light">{{__('dashboard.brands.view_all')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('brands.create')}}" data-i18n="nav.navbars.nav_dark">{{__('dashboard.brands.create')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">{{__('dashboard.tags.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Tag::count()}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('tags.index')}}" data-i18n="nav.navbars.nav_light">{{__('dashboard.tags.view_all')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('tags.create')}}" data-i18n="nav.navbars.nav_dark">{{__('dashboard.tags.create')}}</a>
                    </li>
                </ul>
            </li>
            <li class="nav-item has-sub"><a href="#"><i class="la la-navicon"></i><span class="menu-title" data-i18n="nav.navbars.main">{{__('dashboard.products.title')}}</span><span class="badge badge badge-info badge-pill float-right mr-2">{{\App\Models\Product::count()}}</span></a>
                <ul class="menu-content" style="">
                    <li class=""><a class="menu-item" href="{{route('products.index')}}" data-i18n="nav.navbars.nav_light">{{__('dashboard.products.view_all')}}</a>
                    </li>
                    <li class=""><a class="menu-item" href="{{route('products.create')}}" data-i18n="nav.navbars.nav_dark">{{__('dashboard.products.create')}}</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
