<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'DTX') }}</title>
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="/" class="logo-wrapper" title="Home">
                        <span class="sr-only">Home</span>
                        <img class="icon me-2" aria-hidden="true" src="{{ asset('images/logo_white.png') }}"
                            height="49" width="54">
                        <div class="logo-text">
                            <span class="logo-title">Deriv</span>
                            <span class="logo-subtitle">Traderx</span>
                        </div>

                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="active" href="/"><span class="icon home"
                                    aria-hidden="true"></span>Dashboard</a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon document" aria-hidden="true"></span>Posts
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="posts.html">All Posts</a>
                                </li>
                                <li>
                                    <a href="new-post.html">Add new post</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon folder" aria-hidden="true"></span>Categories
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="categories.html">All categories</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon image" aria-hidden="true"></span>Media
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="media-01.html">Media-01</a>
                                </li>
                                <li>
                                    <a href="media-02.html">Media-02</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon paper" aria-hidden="true"></span>Pages
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="pages.html">All pages</a>
                                </li>
                                <li>
                                    <a href="new-page.html">Add new page</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="comments.html">
                                <span class="icon message" aria-hidden="true"></span>
                                Comments
                            </a>
                            <span class="msg-counter">7</span>
                        </li>
                    </ul>
                    <span class="system-menu__title">system</span>
                    <ul class="sidebar-body-menu">
                        <li>
                            <a href="appearance.html"><span class="icon edit" aria-hidden="true"></span>Appearance</a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon category" aria-hidden="true"></span>Extentions
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="extention-01.html">Extentions-01</a>
                                </li>
                                <li>
                                    <a href="extention-02.html">Extentions-02</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="##">
                                <span class="icon user-3" aria-hidden="true"></span>Users
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="users-01.html">Users-01</a>
                                </li>
                                <li>
                                    <a href="users-02.html">Users-02</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="##"><span class="icon setting" aria-hidden="true"></span>Settings</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer">
                <a href="##" class="sidebar-user">
                    <span class="sidebar-user-img">
                        <picture>
                            <source srcset="{{ asset('images/avatar/avatar-illustrated-01.webp') }}"
                                type="image/webp"><img src="{{ asset('images/avatar/avatar-illustrated-01.png') }}"
                                alt="User name">
                        </picture>
                    </span>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user__title">Nafisa Sh.</span>
                        <span class="sidebar-user__subtitle">Support manager</span>
                    </div>
                </a>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">

                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>
                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>
                        <div class="notification-wrapper">
                            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                                <span class="sr-only">To messages</span>
                                <span class="icon notification active" aria-hidden="true"></span>
                            </button>
                            <ul class="users-item-dropdown notification-dropdown dropdown">
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">System just updated</span>
                                            <span class="notification-dropdown__subtitle">The system has been
                                                successfully upgraded. Read more
                                                here.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon danger">
                                            <i data-feather="info" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">The cache is full!</span>
                                            <span class="notification-dropdown__subtitle">Unnecessary caches take up a
                                                lot of memory space and
                                                interfere ...</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="##">
                                        <div class="notification-dropdown-icon info">
                                            <i data-feather="check" aria-hidden="true"></i>
                                        </div>
                                        <div class="notification-dropdown-text">
                                            <span class="notification-dropdown__title">New Subscriber here!</span>
                                            <span class="notification-dropdown__subtitle">A new subscriber has
                                                subscribed.</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a class="link-to-page" href="##">Go to Notifications page</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-user-wrapper">
                            <button href="##" class="nav-user-btn dropdown-btn" title="My profile"
                                type="button">
                                <span class="sr-only">My profile</span>
                                <span class="nav-user-img">
                                    <picture>
                                        <source srcset="{{ asset('images/avatar/avatar-illustrated-02.webp') }}"
                                            type="image/webp">
                                        <img src="{{ asset('images/avatar/avatar-illustrated-02.png') }}"
                                            alt="User name">
                                    </picture>
                                </span>
                            </button>
                            <ul class="users-item-dropdown nav-user-dropdown dropdown">
                                <li><a href="##">
                                        <i data-feather="user" aria-hidden="true"></i>
                                        <span>Profile</span>
                                    </a></li>
                                <li><a href="##">
                                        <i data-feather="settings" aria-hidden="true"></i>
                                        <span>Account settings</span>
                                    </a></li>
                                <li><a class="danger" href="##">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        <span
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                            out</span>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            @yield('content')

            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2022 &copy; Derivtraderx</p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="{{ url('/') }}">Home</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <!-- Chart library -->
    <script src="{{ asset('plugins/chart.min.js') }}"></script>
    <!-- Icons library -->
    <script src="{{ asset('plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
