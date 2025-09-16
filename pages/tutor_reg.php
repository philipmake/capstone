<?php
session_start();
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/TutorProfile.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $tutor_id = $_SESSION['id'] ?? null;
        $address = trim($_POST['address']);
        $bio = trim($_POST['bio']);
        $hourly_rate = trim($_POST['rate']); 
        $experience_yrs = trim($_POST['exp']);
        $education = trim($_POST['education']);

        if (empty($tutor_id) || empty($address) || empty($bio) || empty($hourly_rate) || empty($experience_yrs) || empty($education)) {
            $error = "All fields are required";
        } else {
            $tutor = new TutorProfile();
            $t = $tutor->create($tutor_id, $address, $bio, $hourly_rate, $experience_yrs, $education);
            if ($t) {
                $success = "Successful profile creation";
                header("Location: tutor_profile.php");
                exit;
            } else {
                $error = "Error creating tutor profile";
            }
        }
    }
}
?>

<section class="auth-wrapper">
    <h3>Tutor profile setup . (1)</h3>

    <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <?php if (!empty($success)): ?>
        <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <form action="" method="post">
        <label for="address">Enter address
            <input type="text" name="address" id="address" required>
        </label>

        <label for="bio">Write a descriptive essay on yourself
            <input type="text" name="bio" id="bio" required>
        </label>

        <label for="rate"> How much will you charge per hour?
            <input type="number" name="rate" id="rate" placeholder="e.g 500 naira" required>
        </label>

        <label for="exp">Years of experience as a Tutor
            <input type="number" name="exp" id="exp" required>
        </label>

        <label for="education">Education background
            <input type="text" name="education" id="education" required>
        </label>

        <label for="information">
            Information
            <textarea name="information" id="information" style="width: 100%; resize: vertical;" rows="4" placeholder="Enter any additional information here..."></textarea>
        </label>

        <button type="submit" name="submit">Submit profile setup</button>
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
