@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Dashboard</h2>
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon primary">
                            <i data-feather="bar-chart-2" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">1478 286</p>
                            <p class="stat-cards-info__title">Total visits</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon warning">
                            <i data-feather="file" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">1478 286</p>
                            <p class="stat-cards-info__title">Total visits</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon purple">
                            <i data-feather="file" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">1478 286</p>
                            <p class="stat-cards-info__title">Total visits</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit danger">
                                    <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon success">
                            <i data-feather="feather" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">1478 286</p>
                            <p class="stat-cards-info__title">Total visits</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit warning">
                                    <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="chart">
                        <canvas id="myChart" aria-label="Site statistics" role="img"></canvas>
                    </div>
                    <div class="users-table table-wrapper">
                        <table class="posts-table">
                            <thead>
                                <tr class="users-table-info">
                                    <th>
                                        <label class="users-table__checkbox ms-20">
                                            <input type="checkbox" class="check-all">Thumbnail
                                        </label>
                                    </th>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <label class="users-table__checkbox">
                                            <input type="checkbox" class="check">
                                            <div class="categories-table-img">
                                                <picture>
                                                    <source srcset="./img/categories/01.webp" type="image/webp"><img
                                                        src="./img/categories/01.jpg" alt="category">
                                                </picture>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        Starting your traveling blog with Vasco
                                    </td>
                                    <td>
                                        <div class="pages-table-img">
                                            <picture>
                                                <source srcset="{{ asset('images/avatar/avatar-face-04.webp') }}"
                                                    type="image/webp"><img
                                                    src="{{ asset('images/avatar/avatar-face-04.png') }}" alt="User Name">
                                            </picture>
                                            Jenny Wilson
                                        </div>
                                    </td>
                                    <td><span class="badge-pending">Pending</span></td>
                                    <td>17.04.2021</td>
                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button" title="More info">
                                                <div class="sr-only">More info</div>
                                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                                <li><a href="##">Edit</a></li>
                                                <li><a href="##">Quick edit</a></li>
                                                <li><a href="##">Trash</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="users-table__checkbox">
                                            <input type="checkbox" class="check">
                                            <div class="categories-table-img">
                                                <picture>
                                                    <source srcset="{{ asset('images/categories/02.webp') }}"
                                                        type="image/webp"><img src="{{ asset('images/categories/02.jpg') }}"
                                                        alt="category">
                                                </picture>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        Start a blog to reach your creative peak
                                    </td>
                                    <td>
                                        <div class="pages-table-img">
                                            <picture>
                                                <source srcset="{{ asset('images/avatar/avatar-face-03.webp') }}"
                                                    type="image/webp"><img
                                                    src="{{ asset('images/avatar/avatar-face-03.png') }}" alt="User Name">
                                            </picture>
                                            Annette Black
                                        </div>
                                    </td>
                                    <td><span class="badge-pending">Pending</span></td>
                                    <td>23.04.2021</td>
                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button"
                                                title="More info">
                                                <div class="sr-only">More info</div>
                                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                                <li><a href="##">Edit</a></li>
                                                <li><a href="##">Quick edit</a></li>
                                                <li><a href="##">Trash</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="users-table__checkbox">
                                            <input type="checkbox" class="check">
                                            <div class="categories-table-img">
                                                <picture>
                                                    <source srcset="{{ asset('images/categories/03.webp') }}"
                                                        type="image/webp"><img
                                                        src="{{ asset('images/categories/03.jpg') }}" alt="category">
                                                </picture>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        Helping a local business reinvent itself
                                    </td>
                                    <td>
                                        <div class="pages-table-img">
                                            <picture>
                                                <source srcset="{{ asset('images/avatar/avatar-face-02.webp') }}"
                                                    type="image/webp"><img
                                                    src="{{ asset('images/avatar/avatar-face-02.png') }}" alt="User Name">
                                            </picture>
                                            Kathryn Murphy
                                        </div>
                                    </td>
                                    <td><span class="badge-active">Active</span></td>
                                    <td>17.04.2021</td>
                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button"
                                                title="More info">
                                                <div class="sr-only">More info</div>
                                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                                <li><a href="##">Edit</a></li>
                                                <li><a href="##">Quick edit</a></li>
                                                <li><a href="##">Trash</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="users-table__checkbox">
                                            <input type="checkbox" class="check">
                                            <div class="categories-table-img">
                                                <picture>
                                                    <source srcset="{{ asset('images/categories/04.webp') }}"
                                                        type="image/webp"><img
                                                        src="{{ asset('images/categories/04.jpg') }}" alt="category">
                                                </picture>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        Caring is the new marketing
                                    </td>
                                    <td>
                                        <div class="pages-table-img">
                                            <picture>
                                                <source srcset="{{ asset('images/avatar/avatar-face-05.webp') }}"
                                                    type="image/webp"><img
                                                    src="{{ asset('images/avatar/avatar-face-05.png') }}"
                                                    alt="User Name">
                                            </picture>
                                            Guy Hawkins
                                        </div>
                                    </td>
                                    <td><span class="badge-active">Active</span></td>
                                    <td>17.04.2021</td>
                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button"
                                                title="More info">
                                                <div class="sr-only">More info</div>
                                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                                <li><a href="##">Edit</a></li>
                                                <li><a href="##">Quick edit</a></li>
                                                <li><a href="##">Trash</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="users-table__checkbox">
                                            <input type="checkbox" class="check">
                                            <div class="categories-table-img">
                                                <picture>
                                                    <source srcset="./img/categories/01.webp" type="image/webp"><img
                                                        src="./img/categories/01.jpg" alt="category">
                                                </picture>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        How to build a loyal community online and offline
                                    </td>
                                    <td>
                                        <div class="pages-table-img">
                                            <picture>
                                                <source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img
                                                    src="./img/avatar/avatar-face-03.png" alt="User Name">
                                            </picture>
                                            Robert Fox
                                        </div>
                                    </td>
                                    <td><span class="badge-active">Active</span></td>
                                    <td>17.04.2021</td>
                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button"
                                                title="More info">
                                                <div class="sr-only">More info</div>
                                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                                <li><a href="##">Edit</a></li>
                                                <li><a href="##">Quick edit</a></li>
                                                <li><a href="##">Trash</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="users-table__checkbox">
                                            <input type="checkbox" class="check">
                                            <div class="categories-table-img">
                                                <picture>
                                                    <source srcset="./img/categories/03.webp" type="image/webp"><img
                                                        src="./img/categories/03.jpg" alt="category">
                                                </picture>
                                            </div>
                                        </label>
                                    </td>
                                    <td>
                                        How to build a loyal community online and offline
                                    </td>
                                    <td>
                                        <div class="pages-table-img">
                                            <picture>
                                                <source srcset="./img/avatar/avatar-face-03.webp" type="image/webp"><img
                                                    src="./img/avatar/avatar-face-03.png" alt="User Name">
                                            </picture>
                                            Robert Fox
                                        </div>
                                    </td>
                                    <td><span class="badge-active">Active</span></td>
                                    <td>17.04.2021</td>
                                    <td>
                                        <span class="p-relative">
                                            <button class="dropdown-btn transparent-btn" type="button"
                                                title="More info">
                                                <div class="sr-only">More info</div>
                                                <i data-feather="more-horizontal" aria-hidden="true"></i>
                                            </button>
                                            <ul class="users-item-dropdown dropdown">
                                                <li><a href="##">Edit</a></li>
                                                <li><a href="##">Quick edit</a></li>
                                                <li><a href="##">Trash</a></li>
                                            </ul>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-3">
                    <article class="customers-wrapper">
                        <canvas id="customersChart" aria-label="Customers statistics" role="img"></canvas>
                    </article>
                    <article class="white-block">
                        <div class="top-cat-title">
                            <h3>Top categories</h3>
                            <p>28 Categories, 1400 Posts</p>
                        </div>
                        <ul class="top-cat-list">
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Lifestyle <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Dailiy lifestyle articles <span class="purple">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Tutorials <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Coding tutorials <span class="blue">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Technology <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Dailiy technology articles <span class="danger">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        UX design <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        UX design tips <span class="success">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Interaction tips <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Interaction articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        App development <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Mobile development articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Nature <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Wildlife animal articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Geography <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Geography articles <span class="primary">+472</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
