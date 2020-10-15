<?php include 'includes/header.php'; ?>

    <main>

        <?php include 'includes/nav.php'; ?>

        <div class="container">
            <form action="/login" method="post" class="form-signin">
                <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="text" name="login" class="form-control" placeholder="login" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            </form>
        </div>
    </main>

<?php include 'includes/footer.php'; ?>