<?php
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/TutorProfile.php';

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        $tutor_id = $_SESSION['id'];
        $address = trim($_POST['address']);
        $bio = trim($_POST['bio']);
        $hourly_rate = trim($_POST['rate']); 
        $experience_yrs = trim($_POST['exp']);
        $education = trim($_POST['education']);

        if (empty($address) || empty($bio) || empty($hourly_rate) || empty($experience_yrs) || empty($education)) {
            $error = "All fields are required";
        } else {
            $tutor = new TutorProfile();
            $t = $tutor->create($tutor_id, $address, $bio, $hourly_rate, $experience_yrs, $education);
            if ($t) {
                $success = "Successfull profile creation";
                header("Location: tutor_profile.php");
            } else {
                $error = "Error creating tutor profile";
            }
        }
    }
}

?>

    <section class="auth-wrapper">
        <h3>Tutor profile setup . (1)</h3>

        <!-- Display success or error messages -->
        <?php if (!empty($error)): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <label for="address">Enter address
                <input type="text" name="address" id="address">
            </label>

            <label for="bio">Write a descriptive esaay on yourself
                <input type="text" name="bio" id="bio">
            </label>

            <label for="rate"> How much will your charge per hour?
                <input type="number" name="rate" id="rate" placeholder="e.g 500 naira">
            </label>

            <label for="exp">Years or experience as a Tutor
                <input type="number" name="exp" id="exp">
            </label>

            <label for="education">Education background
                <input type="text" name="education" id="education">
            </label>

            <label for="information">
                Information
                <textarea name="information" id="information" style="width: 100%; resize: vertical;" rows="4"
                    placeholder="Enter any additional information here..."></textarea>
            </label>


            <!-- add availiability toggle here -->

            <!-- payment stuff comes here -->
             
            <button type="submit" name="submit">Submit profile setup</button>
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


