
    <nav>
        <a href="/capstone/index.php" class="logo">tutors connect</a>


        <div class="navlinks">
            <ul>
                <li><a href="#">blog</a></li>
                <li><a href="/capstone/pages/search.php">search</a></li>

                <?php if (isset($_SESSION['fullname'])): ?>
                    <li><span class="username">Hello, <?= htmlspecialchars($_SESSION['fullname']) ?></span></li>
                    <li><a class="cta-1" href="/capstone/pages/logout.php">logout</a></li>
                <?php else: ?>
                    <li><a class="cta-1" href="/capstone/pages/register.php">sign up</a></li>
                    <li><a class="cta-1" href="/capstone/pages/login.php">sign in</a></li>
                <?php endif; ?>
            </ul>
        </div>

        <div class="hamburger" id="hamburger">
            &#9776;
        </div>
    </nav>

    