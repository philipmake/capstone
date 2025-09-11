<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/capstone/css/style.css">
    <title>Tutors Connect</title>

    <?php if ($page == 'auth'):  ?>
        <link rel="stylesheet" href="/capstone/css/auth.css">
    <?php elseif ($page == 'profile'): ?>
        <link rel="stylesheet" href="/capstone/css/profile.css">
    <?php elseif ($page == 'search'): ?>
        <link rel="stylesheet" href="/capstone/css/search.css">
    <?php endif; ?>

    <?php if (session_status() === PHP_SESSION_NONE) {
        session_start();
    } 
    ?>
</head>
<body>
