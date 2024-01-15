<div class="navbar-bottom">
    <div class="navbar-bottom-inner">
        <a class="text-custom-secondary nav-link {{ (request()->is('/')) ? 'active-menu' : '' }}" aria-current="page" href="/" style="border-right:1px solid rgba(255, 255, 255, 0.13)">
            <i class="fa-solid fa-house" style="font-size:18px"></i><br>
            <small>{{ __('Home') }}</small>
        </a>
        <a class="text-custom-secondary nav-link {{ (request()->is('blogs')) ? 'active-menu' : '' }}" href="/blogs" style="border-right:1px solid rgba(255, 255, 255, 0.13)">
            <i class="fa-brands fa-blogger-b" style="font-size:18px"></i><br>
            <small>{{ __('Blogs') }}</small>
        </a>
        <a class="text-custom-secondary nav-link {{ (request()->is('links')) ? 'active-menu' : '' }}" href="/links" style="border-right:1px solid rgba(255, 255, 255, 0.13)">
            <i class="fa-solid fa-link" style="font-size:18px"></i><br>
            <small>{{ __('Links') }}</small>
        </a>
        <a class="text-custom-secondary nav-link {{ (request()->is('promo/results')) ? 'active-menu' : '' }}" href="/promo/results">
            <i class="fa-solid fa-trophy" style="font-size:18px"></i><br>
            <small>{{ __('Results') }}</small>
        </a>
    </div>
</div>