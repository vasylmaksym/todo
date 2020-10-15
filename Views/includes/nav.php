<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/cms">Admin</a>
            </li>
            <?php if (!empty($user)): ?>
                <li class="nav-item">
                    <form action="/logout" method="post">
                        <button class="nav-link" type="submit">Logout</button>
                    </form>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>