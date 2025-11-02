<!-- Modernized Front-End for Northampton News -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Northampton News - Home</title>
    
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Optional custom CSS -->
    <link rel="stylesheet" href="main.css">
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- HEADER -->
    <header class="bg-blue-900 text-white py-6 shadow-lg">
        <div class="max-w-6xl mx-auto flex flex-col md:flex-row items-center justify-between px-4">
            <h1 class="text-3xl md:text-4xl font-bold italic tracking-wide">Northampton News</h1>
            <p class="text-gray-300 text-sm mt-2 md:mt-0">Your trusted source for the latest updates</p>
        </div>
    </header>

    <!-- NAVIGATION -->
    <nav class="bg-gray-900 text-white">
        <ul class="flex flex-wrap justify-center max-w-6xl mx-auto px-4">
            <li><a href="index.php" class="block px-4 py-3 hover:bg-blue-800">Home</a></li>
            <li><a href="latest.php" class="block px-4 py-3 hover:bg-blue-800">Latest Articles</a></li>
            <li><a href="contact.php" class="block px-4 py-3 hover:bg-blue-800">Contact Us</a></li>
            <li class="relative group">
                <a href="#" class="block px-4 py-3 hover:bg-blue-800">Categories ▾</a>
                <ul class="absolute hidden group-hover:block bg-gray-800 w-48">
                    <?php
                        require 'connect.php';
                        include('navigation.php');
                    ?>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- BANNER -->
    <div class="w-full overflow-hidden">
        <img src="images/banners/randombanner.php" alt="Banner" class="w-full h-64 object-cover">
    </div>

    <!-- MAIN CONTENT -->
    <main class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 py-10 px-4">
        <!-- MAIN ARTICLE LIST -->
        <section class="md:col-span-2">
            <h2 class="text-2xl font-semibold border-b-2 border-blue-700 pb-2 mb-6">Top Stories</h2>
            
            <?php
            $print = $pdo->prepare("SELECT * FROM article ORDER BY podate DESC");
            $print->execute();

            while($line = $print->fetch(PDO::FETCH_ASSOC)) {
                $title = htmlspecialchars($line['title']);
                $date = htmlspecialchars($line['podate']);
                $content = nl2br(htmlspecialchars(substr($line['content'], 0, 300))) . '...';
                $author = htmlspecialchars($line['author']);
            ?>
                <article class="bg-white p-5 rounded-lg shadow-md hover:shadow-lg transition mb-6">
                    <h3 class="text-xl font-bold text-blue-900 mb-2"><?= $title ?></h3>
                    <p class="text-sm text-gray-500 mb-2"><?= $date ?> • by <?= $author ?></p>
                    <p class="text-gray-700 mb-3"><?= $content ?></p>
                    <a href="article.php?title=<?= urlencode($title) ?>" class="text-blue-700 font-semibold hover:underline">Read more →</a>
                    <?php include 'social.php'; ?>
                </article>
            <?php } ?>
        </section>

        <!-- SIDEBAR -->
        <aside class="bg-white p-5 rounded-lg shadow-md">
            <h3 class="text-xl font-bold border-b-2 border-blue-700 pb-2 mb-4">Follow Us</h3>
            <div class="space-y-4">
                <a href="https://twitter.com/prayash_karki" target="_blank" class="block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Twitter</a>
                <a href="https://www.facebook.com/crackercreesh80" target="_blank" class="block bg-blue-700 text-white px-4 py-2 rounded hover:bg-blue-800">Facebook</a>
            </div>
            
            <h3 class="text-xl font-bold border-b-2 border-blue-700 pb-2 mt-8 mb-4">Popular Categories</h3>
            <ul class="list-disc list-inside text-gray-700">
                <?php include('navigation.php'); ?>
            </ul>
        </aside>
    </main>

    <!-- FOOTER -->
    <footer class="bg-gray-900 text-gray-400 text-center py-4 mt-10">
        &copy; Northampton News <?= date("Y"); ?>. All Rights Reserved.
    </footer>
</body>
</html>
