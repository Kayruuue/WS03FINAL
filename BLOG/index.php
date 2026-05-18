<?php
$title = "Ajin";
$footerT = "AjinBlog";
$title2 = "Blog";
$description = 'John Christopher Depp II is an American actor, producer, and musician known for his portrayals of eccentric, larger-than-life characters.';
$name = "Johnny Depp";

$skills = ['Acting', 'Character Transformation', 'Versatility', 'Musicianship', 'Direction & Production','Academy Awards Nominations'];

$posts = [
    [
        'date'    => 'Jan 26, 2026',
        'title'   => 'Day Drinker Filming Update',
        'excerpt' => 'Johnny is currently filming the action-thriller "Day Drinker" alongside Penelope Cruz. This marks his first major studio lead role in nearly a decade.',
        'label'   => 'MOVIES'
    ],
    [
        'date'    => 'Jan 10, 2026',
        'title'   => 'Ebenezer: A Christmas Carol',
        'excerpt' => 'Paramount has officially slated Ti West’s "Ebenezer" for a November 13, 2026 release, starring Depp as a darker, reimagined Scrooge.',
        'label'   => 'UPCOMING'
    ],
    [
        'date'    => 'Dec 11, 2025',
        'title'   => 'The Master and Margarita',
        'excerpt' => 'Depp’s production company IN.2 Film has greenlit the first English adaptation of the Russian classic; production begins late 2026.',
        'label'   => 'PRODUCTION'
    ],
    [
        'date'    => 'Nov 07, 2025',
        'title'   => 'Modi U.S. Premiere',
        'excerpt' => 'Johnny’s latest directorial effort, "Modi: Three Days on the Wings of Madness," starring Al Pacino, has finally arrived in North American theaters.',
        'label'   => 'DIRECTOR'
    ]
];

$gallery_images = [
    "assets/images/depp1.png",
    "assets/images/depp2.png",
    "assets/images/depp3.png",
    "assets/images/depp4.png"
];
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        ::-webkit-scrollbar { width: 5px; }
        ::-webkit-scrollbar-track { background: #f4f4f5; }
        ::-webkit-scrollbar-thumb { background: #1d1d1d; }
    </style>
</head>
<body class="bg-[#fafafa] text-zinc-800 font-sans">

    <nav class="fixed top-0 w-full bg-white/80 backdrop-blur-md border-b border-zinc-200 z-50">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#home" class="text-xl font-bold text-zinc-800 font-mono tracking-tighter"><?= $title ?><span class="text-zinc-400"><?= $title2 ?></span></a>
            <div class="hidden md:flex space-x-8 text-sm uppercase tracking-widest font-semibold">
                <a href="#about" class="text-zinc-600 hover:text-zinc-800 transition">About</a>
                <a href="#blog" class="text-zinc-600 hover:text-zinc-800 transition">Blog</a>
                <a href="#gallery" class="text-zinc-600 hover:text-zinc-800 transition">Gallery</a>
            </div>
        </div>
    </nav>

    <section id="home" class="min-h-screen flex items-center justify-center pt-20 pb-12 bg-white">
    <div class="container mx-auto px-6 max-w-6xl">
        <div class="flex flex-col md:flex-row items-end gap-6 md:gap-12">
            
            <div class="w-full md:w-2/3">
                <div class="relative overflow-hidden rounded-sm ring-1 ring-zinc-100 shadow-xl">
                    <img src="assets/images/jon.png" 
                         alt="Profile Portrait" 
                         class="w-full h-auto grayscale hover:grayscale-0 transition duration-700 brightness-105">
                </div>
            </div>

            <div class="w-full md:w-1/3">
                <h1 class="text-7xl md:text-8xl lg:text-9xl font-black leading-[0.8] tracking-tighter text-zinc-900">
                    <?php 
                        echo str_replace(' ', '<br>', $name); 
                    ?>
                </h1>
            </div>
        </div>

                <div class="mt-12">
                    <div class="w-full max-w-4xl"> 
                        <p class="text-zinc-500 text-lg md:text-xl leading-relaxed mb-8">
                            <?= $description ?>
                        </p>
                    </div>
                </div>
            </div>
        </section>

    <section id="about" class="min-h-screen py-32 bg-zinc-50/50">
    <div class="container mx-auto px-6 max-w-6xl"> <div class="grid md:grid-cols-12 gap-12 lg:gap-16 items-center">
            
            <div class="md:col-span-7">
                <img src="assets/images/jon1.png" alt="Profile" class="w-full h-auto grayscale rounded hover:grayscale-0 transition duration-700 brightness-105">
            </div>
            
            <div class="md:col-span-5 flex flex-col justify-center">
                <h2 class="text-5xl font-bold mb-4 text-zinc-900"><?= $name ?></h2>
                
                <p class="text-zinc-400 font-mono text-sm mb-6 uppercase tracking-widest">
                    June 9, 1963
                </p>
                <p class="text-zinc-600 mb-8 text-xl leading-relaxed">
                    Since his breakout in the 1980s, he has specialized in "chameleon" roles, often collaborating with director Tim Burton to create iconic figures like Edward Scissorhands and Captain Jack Sparrow. 2026 marks his major return to Hollywood studio features.
                </p>
                
                <div class="flex flex-wrap gap-2">
                    <?php foreach($skills as $skill): ?>
                        <span class='bg-zinc-100 border border-zinc-200 px-3 py-1.5 rounded text-xs font-bold text-black shadow-sm'>
                            #<?= strtoupper($skill) ?>
                        </span>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    </section>

    <section id="blog" class="min-h-screen py-32 bg-white">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-bold mb-12 text-zinc-900">Latest Logs</h2>
            <div class="grid md:grid-cols-2 gap-8">
                
                <?php foreach($posts as $post): ?>
                <div class="group p-8 bg-white rounded-2xl border border-zinc-100 hover:border-zinc-200 transition shadow-sm hover:shadow-md">
                    <div class="flex justify-between items-start mb-2">
                        <span class="text-zinc-600 font-mono text-sm"><?= $post['date'] ?></span>
                        <span class="text-[10px] bg-zinc-50 text-zinc-700 border border-zinc-100 px-2 py-1 rounded tracking-widest font-bold"><?= $post['label'] ?></span>
                    </div>
                    <h3 class="text-2xl font-bold mt-2 text-zinc-900 group-hover:text-zinc-600 transition">
                        <?= $post['title'] ?>
                    </h3>
                    <p class="text-zinc-500 mt-4 leading-relaxed"><?= $post['excerpt'] ?></p>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    <section id="gallery" class="min-h-screen py-32 bg-zinc-50/50">
        <div class="container mx-auto px-6 max-w-5xl text-center">
            <h2 class="text-4xl font-bold mb-12 text-zinc-900">Life in Frames</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <?php foreach($gallery_images as $img): ?>
                <div class="h-64 bg-zinc-200 rounded-xl overflow-hidden ring-1 ring-zinc-200 shadow-sm">
                    <img src="<?= $img ?>" class="w-full h-full object-cover hover:scale-105 transition duration-500">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <footer class="py-10 text-center border-t border-zinc-100 bg-white">
        <p class="text-zinc-400 text-sm">
            &copy; <?= date("Y"); ?> <?= $footerT ?>.
        </p>
    </footer>

</body>
</html>