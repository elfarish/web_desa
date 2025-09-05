<nav class="navbar navbar-light bg-white shadow-sm px-4 d-flex justify-content-between">
    <span class="navbar-text">
        Halo, <strong>{{ Auth::user()->name ?? 'Admin' }}</strong>
    </span>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-sm btn-danger">
            <i class="bi bi-box-arrow-right me-1"></i> Logout
        </button>
    </form>
</nav>
