<?php
$page = 'home';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

    <section class="hero">
        <h1>Find the Perfect Tutor for Your Child</h1>
        <h4>Trained tutors. Tailored learning. All in one place.</h4>
        <p>We connect parents with verified, top-rated tutors to help every child achieve their learning goals with confidence.</p>

        <div class="cta">
            <a class="cta-1" href="/capstone/pages/search.php">Find a Tutor</a>
            <a class="cta-2" href="/capstone/pages/register.php">Become a Tutor</a>
        </div>
    </section>

    <section class="features">
        <h3>What We Provide</h3>
        <div class="wrapper">
            <div class="card">
                <h4>Experienced Tutors</h4>
                <p>Work with qualified professionals who specialize in different subjects and grade levels to provide the best learning experience for your child.</p>
            </div>

            <div class="card">
                <h4>Verified & Background-Checked</h4>
                <p>Every tutor goes through a strict verification and background check process to ensure safety and reliability.</p>
            </div>

            <div class="card">
                <h4>Flexible Scheduling</h4>
                <p>Choose the days and times that work best for you. Our platform makes it easy to reschedule and manage your lessons.</p>
            </div>

            <div class="card">
                <h4>Personalized Learning Plans</h4>
                <p>Lessons are tailored to each student’s strengths, weaknesses, and goals for maximum results.</p>
            </div>
        </div>
    </section>

        <section class="how-it-works">
        <h3>How It Works</h3>
        <p>Getting started is simple. Follow these easy steps to connect with the right tutor for your child:</p>
        <div class="wrapper">
            
            <div class="step">
                <i class="fa-solid fa-user-plus fa-2x"></i>
                <h4>1. Sign Up</h4>
                <p>Create a free account as a parent or tutor in just a few minutes.</p>
            </div>

            <div class="step">
                <i class="fa-solid fa-magnifying-glass fa-2x"></i>
                <h4>2. Search or Get Matched</h4>
                <p>Browse through available tutors or let us recommend one based on your needs.</p>
            </div>

            <div class="step">
                <i class="fa-solid fa-comments fa-2x"></i>
                <h4>3. Connect with a Tutor</h4>
                <p>Chat, schedule, and discuss learning goals directly with your chosen tutor.</p>
            </div>

            <div class="step">
                <i class="fa-solid fa-book-open-reader fa-2x"></i>
                <h4>4. Start Learning!</h4>
                <p>Begin your personalized lessons and track progress along the way.</p>
            </div>

        </div>
    </section>

    <section class="social-proof">
        <h3>What Parents & Students Say...</h3>
        <div class="wrapper">
            <div class="card-2">
                <p>“This platform made it so easy to find a reliable tutor for my son. His grades improved in just one term!”</p>
                <span>- Grace A., Parent</span>
            </div>
            <div class="card-2">
                <p>“I love the flexibility. I can schedule classes around my daughter’s busy extracurricular activities.”</p>
                <span>- David K., Parent</span>
            </div>
            <div class="card-2">
                <p>“As a tutor, I’ve been able to connect with amazing students and grow my teaching experience.”</p>
                <span>- Sarah M., Tutor</span>
            </div>
            <div class="card-2">
                <p>“Very secure and professional. I had peace of mind knowing all tutors were verified.”</p>
                <span>- Philip G., Parent</span>
            </div>
        </div>
    </section>

    <section class="cta-bottom">
        <h3>Ready to Get Started?</h3>
        <p>Sign up today and give your child the advantage of personalized learning.</p>
        <a class="cta-1" href="/capstone/pages/search.php">Find a Tutor Now</a>
    </section>

    <?php include __DIR__ . '/includes/footer.php'; ?>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.querySelector('.navlinks');

        if (hamburger) {
            hamburger.addEventListener('click', () => {
                navLinks.classList.toggle('active');
            });
        }
    </script>
</body>
</html>
