<?php 
include 'header.php';
include 'fonts.php';
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Story - Devsun</title>
</head>
<body>

<div class="story-container">
    <div class="divider mb-5">
        <div class="divider-element"></div>
        <div class="divider-text">Our Story</div>
        <div class="divider-element"></div>
    </div>

    <div class="content-wrapper">
        <div class="story-content">
            <div class="story-text">
                <p>As someone who loves clothes and is really into alternative fashion, I always find it super hard to find clothes I love where I live. A lot of the stuff here just isn’t my style, and I figured I couldn’t be the only one feeling that way.

That’s what gave me the idea to start Devsun — a little clothing store I made for people like me who love alternative styles and want something different.

I really hope you like the stuff I’ve put together and that the website makes it easy (and fun) to look around.

Thanks for checking it out.</p>
                <p>I hope you like the products and the experience the website offers.</p>
                <p class="emphasis">Enjoy shopping!</p>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>

<style>
body {
    overflow-x: hidden;
    width: 100%;
    min-height: 100vh;
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    margin: 0;
    padding: 0;
    font-family: 'Roboto', sans-serif;
}

.story-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 4rem 2rem;
    font-family: 'Prata', serif;
}

.content-wrapper {
    display: flex;
    flex-direction: column;
    gap: 4rem;
    margin-top: 2rem;
}

.story-content {
    text-align: center;
    max-width: 800px;
    margin: 0 auto;
}

.story-text {
    font-size: 1.2rem;
    line-height: 1.8;
    color: #333;
}

.story-text p {
    margin-bottom: 1.5rem;
}

.emphasis {
    font-size: 1.5rem;
    font-style: italic;
    margin-top: 2rem;
}

.divider {
    margin: 2rem 0;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 3rem;
    padding: 0 10%;
    position: relative;
}

.divider-element {
    height: 3px;
    background: repeating-linear-gradient(90deg, black, black 15px, transparent 15px, transparent 20px);
    flex-grow: 1;
    position: relative;
}

.divider-text {
    font-family: "UnifrakturMaguntia", cursive;
    font-size: 3rem;
    padding: 0 2rem;
    position: relative;
}

.divider-text::before,
.divider-text::after {
    content: '×';
    position: absolute;
    font-size: 2rem;
    top: 50%;
    transform: translateY(-50%);
    color: black;
}

.divider-text::before {
    left: 0;
}

.divider-text::after {
    right: 0;
}

@media (max-width: 992px) {
    .story-container {
        padding: 3rem 1.5rem;
    }
    
    .story-text {
        font-size: 1.1rem;
    }
    
    .emphasis {
        font-size: 1.3rem;
    }
}

@media (max-width: 768px) {
    .divider {
        gap: 1.5rem;
        padding: 0 5%;
    }
    
    .divider-text {
        font-size: 2.5rem;
    }
    
    .content-wrapper {
        gap: 3rem;
    }
}

@media (max-width: 576px) {
    .story-container {
        padding: 2rem 1rem;
    }
    
    .story-text {
        font-size: 1rem;
    }
    
    .emphasis {
        font-size: 1.2rem;
    }
    
    .divider {
        gap: 1rem;
    }
    
    .divider-text {
        font-size: 2rem;
        padding: 0 1rem;
    }
    
    .divider-element {
        height: 2px;
        background: repeating-linear-gradient(90deg, black, black 10px, transparent 10px, transparent 15px);
    }
}

.nav-tabs {
    border-bottom: none !important;
}

header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 20px;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

nav ul li {
    margin-right: 10px;
}

nav ul li:last-child {
    margin-right: 0;
}

li {
    margin-left: 20px;
}

a {
    color: black;
    text-decoration: none;
    font-family: 'Prata', serif;
}

.shopping-cart {
    width: 35px;
    height: 35px;
    margin-top: -7px;
    margin-right: 80px;
}

.logo {
    font-size: 70px;
    font-weight: 400;
    text-align: center;
    margin-left: 20px;
}

.logo-link {
    text-decoration: none;
    color: black;
    font-family: "UnifrakturMaguntia", cursive;
}

.header-container {
    display: flex;
    justify-content: flex-start;
    align-items: center;
    padding: 20px 20px;
    width: 100%;
    gap: 80px;
}

.nav-item {
    margin-left: 20px;
}

.nav-link, .dropdown-item {
    font-family: 'Prata', serif;
    font-size: 1.2rem;
}

.dropdown-item {
    font-size: 1rem;
    padding: 8px 20px;
}

.dropdown-item:focus,
.dropdown-item:active {
    background-color: transparent !important;
    color: #666 !important;
}

.dropdown-item:hover {
    background-color: transparent;
    color: #666;
}

.nav-link:hover, .dropdown-item:hover {
    color: #666 !important;
}

.nav-item.dropdown:hover .dropdown-menu {
    display: block;
    margin-top: 0;
    animation: fadeIn 0.2s ease-in-out;
}

.dropdown-menu {
    border-radius: 0;
    border: 1px solid black;
    background-color: white;
    min-width: 200px;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.nav-link.dropdown-toggle::after {
    transition: transform 0.2s ease;
}

.nav-item.dropdown:hover .dropdown-toggle::after {
    transform: rotate(180deg);
}

@media (max-width: 768px) {
    .header-container {
        flex-direction: column;
        padding: 20px;
        gap: 20px;
    }
    
    .nav-item {
        margin-left: 15px;
    }
    
    header {
        flex-direction: column;
        align-items: center;
    }

    .logo {
        margin: 10px 0;
    }

    nav {
        margin-top: 20px;
    }

    nav ul {
        flex-direction: column;
        text-align: center;
    }

    nav ul li {
        margin: 10px 0;
    }

    .shopping-cart {
        margin: 10px 0;
    }
}
</style> 