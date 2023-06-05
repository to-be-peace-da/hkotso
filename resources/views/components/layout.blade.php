<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Хабаровский колледж отраслевых технологий и сферы обслуживания</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

<header>
    <x-flash-message/>
    <div class="container">
        <nav>
            <div class="logo">
                <a href="/">
                    <img src="{{ asset('storage/images/hkotso-logo-v7.svg') }}" alt="hkotso-logo">
                </a>
            </div>
            @if(auth()->check() && auth()->user()->is_admin)
                <ul>
                    <li><a href="{{ route('admin.index') }}">Админ панель</a></li>
                    <li>
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button type="submit">Выйти</button>
                        </form>
                    </li>
                </ul>
            @endif
            <ul class="nav">
                <li><a href="{{ route('news.index') }}">Новости</a></li>
                <li><a href="{{ route('schedule.index') }}">Расписание</a></li>
            </ul>
            <button class="hamburger">
                <div class="bar"></div>
            </button>
        </nav>
        <nav class="mobile-nav">
            <div class="admin">
                @if(auth()->check() && auth()->user()->is_admin)
                    <a href="{{ route('admin.index') }}">Админ панель</a>
                    <a>
                        <form action="{{ route('admin.logout') }}" method="post">
                            @csrf
                            <button type="submit">Выйти</button>
                        </form>
                    </a>
                @endif
            </div>
            <div class="items">
                <a href="{{ route('news.index') }}">Новости</a>
                <a href="{{ route('schedule.index') }}">Расписание</a>
            </div>
        </nav>
    </div>
</header>

<main>
    {{ $slot }}
</main>

<footer>
    <div class="even">
        <div class="container">
            <div class="footer">
                <div class="addresses">
                    <div class="footer-title">
                        <h1>Наш адрес (места осуществления образовательной деятельности)</h1>
                    </div>
                    <div class="content">
                        <div class="item">
                            <div class="address">
                                <p>Россия, г. Хабаровск, ул. Волочаевская 1 (главный корпус)</p>
                            </div>
                            <div class="number">
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 22-04-68</p>
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 36-38-08</p>
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 36-36-08</p>
                            </div>
                            <div class="mail">
                                <p><i class="fa-solid fa-envelope"></i>hkotso@edu.27.ru</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="address">
                                <p>Россия, г. Хабаровск, ул. Краснореченская, 58</p>
                            </div>
                            <div class="number">
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 52-48-01</p>
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 52-45-18</p>
                            </div>
                            <div class="mail">
                                <p><i class="fa-solid fa-envelope"></i>hkotso@edu.27.ru</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="address">
                                <p>Россия, г. Хабаровск, ул. Советская, 24</p>
                            </div>
                            <div class="number">
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 56-37-73</p>
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 56-38-53</p>
                                <p><i class="fa-solid fa-phone"></i>8 (4212) 56-40-34</p>
                            </div>
                        </div>
                    </div>
                    <div class="copyright-logo-links">
                        <div class="copyright">
                            <p>&copy; "Хабаровский колледж отраслевых технологий и сферы обслуживания"
                                КГБ ПОУ ХКОТСО 2023</p>
                        </div>
                        <div class="logo">
                            <img src="{{ asset('storage/images/hkotso-logo-v7.svg') }}" alt="hkotso-logo">
                        </div>
                        <div class="links">
                            <ul>
                                <li><a target="_blank" href="https://vk.com/stimulcollege"><i
                                            class="fa-brands fa-vk"></i>ВКонтакте</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
