<?php
$page = 'auth';

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';

require_once __DIR__ . '/../database/User.php';

$error = '';
$success = '';

// process user login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email) || empty($password)) {
            $error = "Please fill all the fields!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Enter a valid email address!";
        } else {
            $user = new User();
            $u = $user->login($email, $password);
            if ($u) {
                $success = "Login successful";
                if ($u['role'] == "tutor") {
                    header("Location: tutor_profile.php");
                } elseif ($u['role'] == "parent") {
                    header("Location: parent_profile.php");
                }
            } else {
                $error = "Login failed";
            }
        }
    }
   
}
?>

    <section class="auth-wrapper">
        <h3>Login</h3>
        <form action="" method="post">
            <label for="email">Email
                <input type="email" name="email" id="email">
            </label>

            <label for="password">Password
                <input type="password" name="password" id="password">
            </label>
            <a href="#">Forgot password?</a>

            <p>Don't have an account? Create one <a href="register.html">here</a></p>

            <button type="submit" name="submit">Login</button>
        </form>
    </section>


    <?php include __DIR__ . '/../includes/footer.php'; ?>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.querySelector('.navlinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });
    </script>
</body>
</html>
