<?php
$page = 'home';

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/navbar.php';
?>

    <section class="hero">
        <h1>Find a tutor for your Child</h1>

        <div class="cta">
            <a class="cta-1" href="#">Find a tutor</a>
        </div>
    </section>

    <section class="features">
        <h3>What we provide</h3>
        <div class="wrapper">
            <div class="card">
                <h4>Find experienced tutors</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ullam mollitia in tempora enim
                    adipisci.</p>
            </div>

            <div class="card">
                <h4>Find experienced tutors</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ullam mollitia in tempora enim
                    adipisci.</p>
            </div>

            <div class="card">
                <h4>Find experienced tutors</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos ullam mollitia in tempora enim
                    adipisci.</p>
            </div>
        </div>
    </section>

    <section class="social-proof">
        <h3>Hear what others say about us...</h3>
        <div class="wrapper">
            <div class="card-2">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, consectetur?</p>
                <span> - Philip G.</span>
            </div>
            <div class="card-2">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, consectetur?</p>
                <span> - Philip G.</span>
            </div>
            <div class="card-2">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, consectetur?</p>
                <span> - Philip G.</span>
            </div>
            <div class="card-2">
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eligendi, consectetur?</p>
                <span> - Philip G.</span>
            </div>
        </div>

    </section>


    <?php include __DIR__ . '/includes/footer.php'; ?>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.querySelector('.navlinks');

        hamburger.addEventListener('click', () => {
            navLinks.classList.toggle('active');
        });

    </script>
</body>

</html>
