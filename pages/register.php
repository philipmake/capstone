<?php
$page = 'auth';

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/User.php';

$error = '';
$success = '';

// process user registration
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $role = trim($_POST['role']);
        $fullname = trim($_POST['fullname']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $alt_phone = trim($_POST['alt_phone']);
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST['confirm_password']);

        if (empty($role) || empty($fullname) || empty($email) || empty($phone) || empty($password) || empty($confirm_password)) {
            $error = "Please fill all the fields!";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Enter a valid email address!";
        } elseif ($confirm_password !== $password) {
            $error = "Passwords do not match!";
        } else {
            $user = new User();
            $current_user = $user->signup($role, $fullname, $email, $phone, $alt_phone, $password);
            
            $_SESSION['id'] = $current_user['id'];  // add userid for other database access in the web application specific to the user

            if ($current_user) {
                $success = "Registration successful";
                if ($role == "tutor") {
                    header("Location: tutor_reg.php");
                } elseif ($role == "parent") {
                    header("Location: parent_reg.php");
                }
            } else {
                $error = "Registration failed";
            }
        }
    }
   
}

?>

 <section class="auth-wrapper">
        <h3>Register</h3>
        <form action="" method="post" id="authform">
            <label for="fullname">Fullname
                <input type="text" name="fullname" id="fullname">
            </label>

            <label for="email">Email
                <input type="email" name="email" id="email">
            </label>

            <label for="phone">Phone
                <input type="text" name="phone" id="phone" placeholder="whatsapp number">
            </label>

            <label for="alt_phone">Alternate Phone
                <input type="text" name="alt_phone" id="alt_phone" placeholder="optional">
            </label>

            <label for="password">Password
                <input type="password" name="password" id="password">
            </label>

            <label for="confirm_password">Confirm Password
                <input type="password" name="confirm_password" id="confirm_password">
            </label>

            <label for="profile_pic">upload profile picture
                <input type="file" name="profile_pic" id="profile_pic">
            </label>

            <p>Are you a parent or a tutor?</p>
            <select name="role" id="role">
                <option value="">--select role--</option>
                <option value="tutor">Tutor</option>
                <option value="parent">Parent</option>
            </select>
            <p>Already have an account? Login <a href="login.html">here</a></p>
            <button type="submit" name="submit">Next &rarr;</button>
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