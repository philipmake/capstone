<?php
session_start();
$page = "auth";

include __DIR__ . '/../includes/header.php';
include __DIR__ . '/../includes/navbar.php';

require_once __DIR__ . '/../database/Subject.php';
require_once __DIR__ . '/../database/User.php';

if (!isset($_SESSION['id'])) {
    header("Location: login.php");
    exit;
}

$tutor_id = $_SESSION['id'];
$subjectDb = new Subject();
$allSubjects = $subjectDb->getAllSubjects();
$tutorSubjects = $subjectDb->getSubjectsByTutor($tutor_id);

// Handle add
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subject_id'])) {
    $subjectDb->addSubject($tutor_id, $_POST['subject_id']);
    header("Location: tutor_subject.php");
    exit;
}

// Handle delete
if (isset($_GET['remove'])) {
    $subjectDb->removeSubject($tutor_id, intval($_GET['remove']));
    header("Location: tutor_subject.php");
    exit;
}
?>
<section class="auth-wrapper">
    <h2>Manage Subjects</h2>
    <div class="tutor_subjects_list">
        <?php if(empty($tutorSubjects)): ?>
            <p>You haven't added any subject.</p>
        <?php else: ?>
            <?php foreach ($tutorSubjects as $s): ?>
                <div class="subject_list_row"><?= htmlspecialchars($s['name']) ?>
                    <a class="auth_btn" href="?remove=<?= $s['id'] ?>">Remove</a>
            </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
   
    

    <form method="POST">
        <h4>Select subject</h4>
        <select name="subject_id">
            <?php foreach ($allSubjects as $s): ?>
                <option value="<?= $s['id'] ?>"><?= htmlspecialchars($s['name']) ?></option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Add Subject</button>
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