<?php
session_start();
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/Ward.php';

$errors = [];
$success = '';

if (!isset($_SESSION['parent_id'])) {
    header("Location: login.php");
    exit;
}

$parent_id = $_SESSION['parent_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['submit'])) {
        // $parent_id = $_SESSION['pid'];
        $name = trim($_POST['wfullname']);
        $age = trim($_POST['w_age']);
        $gender = trim($_POST['gender']); 
        $school_level = trim($_POST['level']);
        $subject = trim($_POST['subject']);
        $learning_needs = trim($_POST['needs']);
        $goals = trim($_POST['goals']);
        $preferred_schedule = trim($_POST['pref_sched']);

        if (empty($parent_id)) {
            $errors[] = "Missing parentID";
        } elseif (empty($name)) {
            $errors[] = "Enter Ward name";
        } elseif (empty($gender)) {
            $errors[] = "Ward's age missing.";
        } elseif (empty($learning_needs)) {
            $errors[] = "Learning needs fields missing";
        } elseif (empty($school_level)) {
            $errors[] = "School level missing";
        } elseif (empty($goals)) {
            $errors[] = "Goals field empty";
        } elseif (empty($preferred_schedule)) {
            $errors[] = "Preferred schedule field missing";
        } elseif (empty($age)) {
            $errors[] = "Ward's age field missing";
        } elseif (empty($subject)) {
            $errors[] = "Subjetct empty";
        } else {
            $ward = new Ward();
            $w = $ward->create($parent_id, $name, $age, $gender, $school_level, $subject, $learning_needs, $goals, $preferred_schedule);
           
            if ($w) {
                $success = "Successfull profile creation";
                header("Location: parent_profile.php");
            } else {
                $errors[] = "Error adding ward to profile";
            }
        }
    }
}


?>
    <section class="auth-wrapper">
        <h3> Ward profile setup </h3>

        <!-- Display success or error messages -->
        <?php if (!empty($errors)): ?>
            <div class="error" style="color: gray; padding: 5px;">
                <ul style="list-style:none;">
                    <?php foreach ($errors as $err): ?>
                        <li><?= htmlspecialchars($err) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <?php if (!empty($success)): ?>
            <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
        <?php endif; ?>

        <form action="" method="post">
            <label for="wfullname">Enter your ward's fullname
                <input type="text" name="wfullname" id="wfullname">
            </label>

            <label for="w_age">Age
                <input type="number" name="w_age" id="w_age">
            </label>

            <h4>Gender</h4>
            <div class="gender-area" style="display: flex; gap: 3rem;">

                <div class="male" style="display: flex; gap: 1rem; align-items: center;">
                    <input type="radio" name="gender" id="male" value="male">
                    <label for="male">Male</label>
                </div>

                <div class="female" style="display: flex; gap: 1rem; align-items: center;">
                    <input type="radio" name="gender" id="female" value="female">
                    <label for="female">Female</label>
                </div>

            </div>


            <label for="level">School Level
                <select name="level" id="level">
                    <option value="" selected>--select level--</option>
                    <option value="nursery">Nursery</option>
                    <option value="primary">Primary</option>
                    <option value="junior_secondary">Junior Secondary</option>
                    <option value="senior_secondary">Senior Secondary</option>
                    <option value="other">Other</option>
                </select>
            </label>

            <label for="needs">Learning needs
                <input type="text" name="needs" id="needs" placeholder=" e.g. struggles with math basics, exam prep">
            </label>

            <label for="subject">Needed subject
                <input type="text" name="subject" id="subject" placeholder=" e.g. Mathematics, English Language etc">
            </label>

            <label for="goals">Goals
                <input type="text" name="goals" id="goals" placeholder="e.g Prepare for WAEC, Improve English speaking">
            </label>

            <label for="pref_sched">Preferred Schedule
                <input type="text" name="pref_sched" id="pref_sched" placeholder="e.g weekends, afer School 4-6 PM etc.">
            </label>

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


