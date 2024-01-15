
    <div class="row h-100">
        <div class="sidebar">
            <div class="pt-3 pb-5 text-start px-3">
                @if(Auth::user()->isSuperAdmin())
                    <img style="width:180px" src="{{url('images/logo/k8-airdrop-super-admin.png')}}" alt="">
                @else
                    <img style="width:180px" src="{{url('images/logo/k8-airdrop-admin.png')}}" alt="">
                @endif
            </div>

            <div class="px-3 pb-4">
                <div class="mb-2 fw-bold text-dark"><small>SEARCH</small> </div>
                <input class="form-control" type="text" name="q" placeholder="search here">
            </div>
            <nav class="px-3">
                <div class="mb-2 fw-bold text-dark"><small>MENU</small> </div>
                <ul class="list-group">
                    <li class="{{ (request()->is('admin/dashboard*')) ? 'bg-sidebar-active' : 'bg-transparent' }} fw-bold rounded ps-3 border-0 list-group-item">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark pe-1 fa-solid fa-chart-simple"></i></div>
                            <div style="display:table-cell; width:200px"><a href="/admin/dashboard">Dashboard</a></div>
                         </div>
                    </li>

                    <li class="{{ (request()->is('admin/airdrop*')) ? 'bg-sidebar-active' : 'bg-transparent' }} fw-bold ps-3 border-0 list-group-item rounded">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark pe-1 fa-solid fa-rocket"></i></div>
                            <div style="display:table-cell; width:200px"><a data-bs-toggle="collapse" href="#collapseAirdrop" role="button" aria-expanded="false" aria-controls="collapseAirdrop" href="/admin/dashboard">Airdrop</a></div>
                         </div>

                        <div class="collapse mt-2 rounded" id="collapseAirdrop">
                            <div class="border-0 card card-body rounded p-2 ps-3">
                                <ul  class="list-group">
                                    <li class="m-0 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-award"></i>
                                        <a href="/admin/airdrop/promo">Promo</a>
                                    </li>
                                    <li class="mt-3 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-language"></i>
                                        <a href="{{ route('admin.languages.index')}}">Language</a>
                                    </li>
                                    <li class="mt-3 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-ad"></i>
                                        <a href="{{ route('admin.ads.index')}}">Advertisement</a>
                                    </li>
                                    <li class="mt-3 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-ad"></i>
                                        <a href="{{ route('admin.subscriptions.index')}}">Subscription</a>
                                    </li>
                                    @if(Auth::user()->isSuperAdmin())
                                    <li class="mt-3 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-border-all"></i>
                                        <a href="/admin/airdrop/platform">Platform</a>
                                    </li>
                                    @endif
                                    <li class="mt-3 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-box"></i>
                                        <a href="/admin/airdrop/promo/archive">Archive</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>


                    <li class="{{ (request()->is('admin/blog*')) ? 'bg-sidebar-active' : 'bg-transparent' }} fw-bold ps-3 border-0 list-group-item rounded">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark pe-1 fa-solid fa-rocket"></i></div>
                            <div style="display:table-cell; width:200px"><a data-bs-toggle="collapse" href="#collapseArticle" role="button" aria-expanded="false" aria-controls="collapseArticle" href="/admin/dashboard">Articles</a></div>
                         </div>
                        <div class="collapse mt-2 rounded" id="collapseArticle">
                            <div class="border-0 card card-body rounded p-2 ps-3">
                                <ul  class="list-group">
                                    <li class="m-0 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-award"></i>
                                        <a href="{{ route('admin.blog') }}">Blog</a>
                                    </li>
                                    <li class="mt-3 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-language"></i>
                                        <a href="{{ route('admin.category') }}">Categories</a>
                                    </li>
                                    <li class="mt-3 p-0 list-group-item rounded border-0 list-group-item bg-transparent fw-bold">
                                        <i class="text-dark pe-1 fa-solid fa-ad"></i>
                                        <a href="{{ route('admin.tag') }}">Tags</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>


                    {{-- <li class="{{ (request()->is('admin/links*')) ? 'bg-sidebar-active' : 'bg-transparent' }} ps-3 border-0 list-group-item rounded bg-transparent fw-bold">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark fa-solid fa-trophy"></i></i></div>
                            <div style="display:table-cell; width:200px"><a href="/admin/links">K8 links</a></div>
                         </div>
                    </li> --}}

                    <li class="{{ (request()->is('admin/banners*')) ? 'bg-sidebar-active' : 'bg-transparent' }} ps-3 border-0 list-group-item rounded bg-transparent fw-bold">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark fa-solid fa-trophy"></i></i></div>
                            <div style="display:table-cell; width:200px"><a href="{{ route('admin.banners.index') }}">Banners</a></div>
                         </div>
                    </li>

                    <li class="{{ (request()->is('admin/carousels*')) ? 'bg-sidebar-active' : 'bg-transparent' }} ps-3 border-0 list-group-item rounded bg-transparent fw-bold">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark fa-solid fa-trophy"></i></i></div>
                            <div style="display:table-cell; width:200px"><a href="{{ route('admin.carousels.index') }}">Carousels</a></div>
                         </div>
                    </li>

                    {{-- <li class="{{ (request()->is('admin/users*')) ? 'fw-bold' : '' }} ps-3 border-0 list-group-item rounded bg-transparent fw-bold">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark fa-sharp fa-solid fa-ticket-simple"></i></div>
                            <div style="display:table-cell; width:200px"><a href="/admin/users">Promo Codes</a></div>
                         </div>
                    </li> --}}

                    @if(Auth::user()->isSuperAdmin())
                    <li class="{{ (request()->is('admin/users*')) ? 'bg-sidebar-active' : 'bg-transparent' }} ps-3 border-0 list-group-item rounded fw-bold">
                        <div style="display:table">
                            <div style="display:table-cell; width:30px"><i class="text-dark pe-1 fa-solid fa-user"></i></div>
                            <div style="display:table-cell; width:200px"><a href="/admin/users">Users Management</a></div>
                         </div>
                    </li>
                    @endif



                    <li class="ps-3 border-0 border-0 list-group-item rounded bg-transparent fw-bold">
                        <div class="col">
                            <form action="/admin/logout" method="post">
                                @csrf
                                <i class="text-dark pe-1 fa-solid fa-right-from-bracket d-inline"></i>
                                <button type="submit" style="background:none" class="text-dark d-inline border-0 pe-0 fw-bold">Logout</button>
                            </form>
                        </div>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="content">
