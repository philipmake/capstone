<?php
session_start();
$page = 'auth';

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';

require_once __DIR__ . '/../database/User.php';
require_once __DIR__ . '/../database/ParentProfile.php';

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
            // Expectation: login returns user record array on success, false otherwise.
            $u = $user->login($email, $password);
            if ($u) {
                // store session
                $_SESSION['id'] = $u['id'];
                $_SESSION['role'] = $u['role'];
                $_SESSION['fullname'] = $u['fullname'] ?? null;

                // If parent, try to load parent profile id and store parent_id
                if ($u['role'] === 'parent') {
                    $pp = new ParentProfile();
                    $parentRecord = $pp->getByUserId($u['id']);
                    if ($parentRecord && isset($parentRecord['id'])) {
                        $_SESSION['parent_id'] = $parentRecord['id'];
                    }
                }

                $success = "Login successful";
                if ($u['role'] == "tutor") {
                    header("Location: tutor_profile.php");
                    exit;
                } elseif ($u['role'] == "parent") {
                    header("Location: parent_profile.php");
                    exit;
                } else {
                    // default landing
                    header("Location: index.php");
                    exit;
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
    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form action="" method="post">
        <label for="email">Email
            <input type="email" name="email" id="email" required>
        </label>

        <label for="password">Password
            <input type="password" name="password" id="password" required>
        </label>
        <a href="#">Forgot password?</a>

        <p>Don't have an account? Create one <a href="register.php">here</a></p>

        <button type="submit" name="submit">Login</button>
    </form>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.navlinks');
    hamburger && hamburger.addEventListener('click', () => navLinks.classList.toggle('active'));
</script>
</body>
</html>
