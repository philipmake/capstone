<?php
session_start();
$page = "profile";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';

require_once __DIR__ . '/../database/TutorProfile.php';
require_once __DIR__ . '/../database/User.php';
require_once __DIR__ . '/../database/Subject.php';
require_once __DIR__ . '/../database/Days.php';
require_once __DIR__ . '/../database/Review.php';


$tutor_id = null;
if (!empty($_GET['tutor_id'])) {
    $tutor_id = intval($_GET['tutor_id']);
} elseif (!empty($_SESSION['id'])) {
    $tutor_id = intval($_SESSION['id']);
}

$userData = new User();
$u = $userData->getUserById($tutor_id);
// print_r($u);

$tutorData = null;
if ($tutor_id) {
    $tp = new TutorProfile();
    $tutorData = $tp->getByTutorId($tutor_id);
    // print_r($tutorData);
}

// Get tutor subjects
$tutorSubjects = new Subject();
$subjects = $tutorSubjects->getSubjectsByTutor($tutor_id);

// Get tutor availability
$availability = new Days();
$availableDays = $availability->getByTutorId($tutor_id);

// Get reviews
$reviewData = new Review();
$reviews = $reviewData->getByTutorId($tutor_id);


?>
    <div class="profile">

        <div class="top">
            <div class="top-image">
                <img src="/capstone/assets/PG.png" alt="tutor_profile_picture" />
            </div>
            <div class="top-text">
                <h1><?= ($u['fullname'] ?? '') ?></h1>
                <h5>Location: <?= ($tutorData['address'] ?? 'Not specified') ?></h5>
                <h5>Email: <?= ($u['email'] ?? '') ?></h5>
                <h5>Phone: <?= ($u['phone'] ?? '') ?></h5>
                <h4>Subjects</h4>
                <div class="subjects">
                    <?php if (!empty($subjects)): ?>
                        <?php foreach ($subjects as $s): ?>
                            <p id="subject-<?= $s['id'] ?>">
                                <?= htmlspecialchars($s['name']) ?>
                            </p>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No subjects listed</p>
                    <?php endif; ?>
                </div>

            </div>
        </div>

        <div class="main-area">

            <div class="top-main-area">
                <?php if(isset($_SESSION['role']) && ($_SESSION['role'] == 'parent')): ?>                    
                    <a class="book_btn" href="book.php?tutor_id=<?= htmlspecialchars($tutor_id ?? '') ?>">Book</a>
                <?php elseif(isset($_SESSION['role']) && ($_SESSION['id'] == $tutor_id)): ?>
                    <a class="book_btn" href="view_booking.php">View Bookings</a>
                    <a href="tutor_subject.php" class="book_btn">Manage Subjects</a>
                    <a href="tutor_available_days.php" class="book_btn">Manage Availability</a>
                <?php else: ?>
                    <a class="book_btn" href="book.php?tutor_id=<?= htmlspecialchars($tutor_id ?? '') ?>">Book</a>
                <?php endif; ?>
                    
                <h4>Rating :<?= ($tutorData['rating'] ?? 'N/A') ?></h4>
            </div>

            <div class="information">
                <h5><strong>Rate:</strong> $<?= ($tutorData['hourly_rate'] ?? '') ?>/hr</h5>
                <h5><strong>Education:</strong> <?= ($tutorData['education'] ?? '') ?></h5>
            </div>

            <div class="about">
                <h3>About Me</h3>
                <p>
                    <?= ($tutorData['bio'] ?? '') ?>
                </p>
            </div>

            <div class="days">
                <h3>Available Days</h3>
                <?php if (!empty($availableDays)): ?>
                    <?php foreach ($availableDays as $day): ?>
                        <p id="day-<?= $day['id'] ?>">
                            <?= htmlspecialchars($day['day']) ?> (<?= $day['start_time'] ?> - <?= $day['end_time'] ?>)
                        </p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No availability listed</p>
                <?php endif; ?>
            </div>

            <div class="additional-info">
                <h3>Additional Information</h3>
                <p>
                    None
                </p>
            </div>

            <div class="reviews">
                <h3>Reviews</h3>
                <div class="wrapper">
                    <?php if (!empty($reviews)): ?>
                        <?php foreach ($reviews as $r): ?>
                            <div class="review-card">
                                <p><?= htmlspecialchars($r['comment']) ?></p>
                                <h4>- <?= htmlspecialchars($r['parent_name']) ?> (Rating: <?= $r['rating'] ?>/5)</h4>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>No reviews yet.</p>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>


<?php include __DIR__ . '/../includes/footer.php'; ?>

<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.navlinks');

    hamburger?.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });

</script>

</body>

</html>


