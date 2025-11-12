<div class="bg-light border-end vh-100 p-3" style="width: 220px;">
    <h5 class="mb-4">Menu</h5>

    <ul class="nav flex-column nav-pills">
        <li class="nav-item mb-2">
            <a href="/rumahsakit" class="nav-link {{ request()->routeIs('rumahsakit.*') ? 'active' : '' }}">
                Rumah Sakit
            </a>
        </li>
        <li class="nav-item mb-2">
            <a href="/pasien" class="nav-link {{ request()->routeIs('pasien.*') ? 'active' : '' }}">
                Pasien
            </a>
        </li>
        <li class="nav-item mt-3">
            <form action="{{ route('logout') }}" method="POST">

                @csrf
                <button type="submit" class="btn btn-outline-danger w-100">Logout</button>
            </form>
        </li>
    </ul>
</div>
