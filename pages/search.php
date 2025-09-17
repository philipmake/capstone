<?php
session_start();
$page = "search";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';
require_once __DIR__ . '/../database/Database.php';

// for users table information for tutors only
try {
    $db = new Database();
    $conn = $db->connect();

    $sql = "SELECT u.id, u.fullname, t.tutor_id, t.bio, t.rating 
            FROM tutor t 
            JOIN users u ON t.tutor_id = u.id 
            WHERE u.role = :role";

    $stmt = $conn->prepare($sql);
    $stmt->execute([":role"=>"tutor"]);
    $tutors = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($tutors);

} catch (PDOException $e) {
    echo $e->getMessage();
    $tutors = [];
}
?>

<div class="search_page_banner">
    <h3>Find a tutor near you</h3>
</div>


<section class="search_wrapper">
    <?php if (!empty($tutors)): ?>
        <?php foreach ($tutors as $t): ?>
            <div class="tutor_card">
                <div class="tutor-card_1">
                    <img src="/capstone/assets/PG.png" alt="">
                    <h3><?= htmlspecialchars($t['fullname'] ?? 'Tutor') ?></h3>
                    <p>rating: <?= htmlspecialchars($t['rating'] ?? 'N/A') ?></p>
                </div>
                <p><?= htmlspecialchars($t['bio'] ?? 'No description') ?></p>

                <div class="subjects">
                    <?php
                    if (!empty($t['subjects'])) {
                        $subjArr = explode(',', $t['subjects']);
                        foreach ($subjArr as $s) {
                            echo '<p>' . htmlspecialchars(trim($s)) . '</p>';
                        }
                    }
                    ?>
                </div>

                <div class="tutor_card_2">
                    <p><?= htmlspecialchars($t['location'] ?? '') ?></p>
                    <a class="cta-3" href="tutor_profile.php?tutor_id=<?= htmlspecialchars($t['tutor_id'] ?? '') ?>">View Profile</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No tutors found.</p>
    <?php endif; ?>
</section>

<?php include __DIR__ . '/../includes/footer.php'; ?>
<script>
    const hamburger = document.getElementById('hamburger');
    const navLinks = document.querySelector('.navlinks');
    hamburger && hamburger.addEventListener('click', () => navLinks.classList.toggle('active'));
</script>
</body>
</html>
