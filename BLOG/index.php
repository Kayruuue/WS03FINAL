<?php
$title = "Ajin";
$footerT = "AjinBlog";
$title2 = "Blog";
$description = 'John Christopher Depp II is an American actor, producer, and musician known for his portrayals of eccentric, larger-than-life characters.';
$name = "Johnny Depp";

$skills = ['Acting', 'Character Transformation', 'Versatility', 'Musicianship', 'Direction & Production', 'Academy Awards Nominations'];

$posts = [
    [
        'pagetitle' => 'Day Drinker Filming Update | AjinBlog',
        'date'      => 'Jan 26, 2026',
        'title'     => 'Day Drinker Filming Update',
        'author'    => 'Ajin',
        'excerpt'   => 'Johnny is currently filming the action-thriller "Day Drinker" alongside Penelope Cruz. This marks his first major studio lead role in nearly a decade.',
        'body'      => 'Johnny Depp is currently filming "Day Drinker" alongside Penelope Cruz, a project that signals a major return to leading studio roles. The film has already generated strong interest because of the pairing and the momentum around Depp\'s renewed screen presence.',
        'label'     => 'MOVIES'
    ],
    [
        'pagetitle' => 'Ebenezer: A Christmas Carol | AjinBlog',
        'date'      => 'Jan 10, 2026',
        'title'     => 'Ebenezer: A Christmas Carol',
        'author'    => 'Ajin',
        'excerpt'   => 'Paramount has officially slated Ti West\'s "Ebenezer" for a November 13, 2026 release, starring Depp as a darker, reimagined Scrooge.',
        'body'      => 'This reimagining of Scrooge gives Depp the chance to step into a darker literary role with a modern cinematic edge. With Ti West directing, the adaptation stands out as one of the more intriguing upcoming projects connected to Depp\'s comeback period.',
        'label'     => 'UPCOMING'
    ],
    [
        'pagetitle' => 'The Master and Margarita | AjinBlog',
        'date'      => 'Dec 11, 2025',
        'title'     => 'The Master and Margarita',
        'author'    => 'Ajin',
        'excerpt'   => 'Depp\'s production company IN.2 Film has greenlit the first English adaptation of the Russian classic; production begins late 2026.',
        'body'      => 'Through IN.2 Film, Depp continues to expand his influence behind the camera by backing ambitious literary material. The first English adaptation of this classic adds a more artistic and international dimension to the overall direction of his recent work.',
        'label'     => 'PRODUCTION'
    ],
    [
        'pagetitle' => 'Modi U.S. Premiere | AjinBlog',
        'date'      => 'Nov 07, 2025',
        'title'     => 'Modi U.S. Premiere',
        'author'    => 'Ajin',
        'excerpt'   => 'Johnny\'s latest directorial effort, "Modi: Three Days on the Wings of Madness," starring Al Pacino, has finally arrived in North American theaters.',
        'body'      => 'The North American release of "Modi" highlights Depp\'s continued evolution as a director. Rather than relying only on acting roles, he is shaping a broader creative identity through projects that focus on historical figures, style, and performance-driven storytelling.',
        'label'     => 'DIRECTOR'
    ]
];

$gallery_images = [
    [
        'src' => 'assets/images/depp1.png',
        'alt' => 'Young Johnny Depp in a classic black tuxedo at a formal event',
        'description' => 'A formal red-carpet style portrait showing a younger Johnny Depp in a black tuxedo, capturing the polished early-Hollywood image that helped define his rise in the 1990s.'
    ],
    [
        'src' => 'assets/images/depp2.png',
        'alt' => 'Johnny Depp collage featuring magazines, film roles, and media imagery',
        'description' => 'A stylized collage that mixes magazine covers, iconic roles, and pop-culture references to show how Johnny Depp became both a movie star and a media fascination.'
    ],
    [
        'src' => 'assets/images/depp3.png',
        'alt' => 'Johnny Depp collage featuring different roles and eras of his career',
        'description' => 'A career-spanning montage highlighting Depp\'s many screen identities, from eccentric dramatic characters to the instantly recognizable Captain Jack Sparrow era.'
    ],
    [
        'src' => 'assets/images/depp4.png',
        'alt' => 'Johnny Depp in a black tuxedo and round glasses at a formal gala backdrop',
        'description' => 'A modern formal-event portrait of Johnny Depp in a tuxedo and tinted glasses, emphasizing the refined, fashion-forward persona he often brings to public appearances.'
    ]
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
                    <p class="text-sm uppercase tracking-[0.2em] text-zinc-400 mt-3">
                        By <?= $post['author'] ?>
                    </p>
                    <p class="text-zinc-500 mt-4 leading-relaxed"><?= $post['excerpt'] ?></p>
                    <p class="text-zinc-600 mt-4 leading-relaxed"><?= $post['body'] ?></p>
                    <p class="text-xs text-zinc-300 font-mono mt-6"><?= $post['pagetitle'] ?></p>
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
                <div class="group relative h-64 bg-zinc-200 rounded-xl overflow-hidden ring-1 ring-zinc-200 shadow-sm">
                    <img
                        src="<?= $img['src'] ?>"
                        alt="<?= $img['alt'] ?>"
                        title="<?= $img['description'] ?>"
                        class="w-full h-full object-cover transition duration-500 group-hover:scale-105"
                    >
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/25 to-transparent opacity-0 transition duration-300 group-hover:opacity-100"></div>
                    <div class="absolute inset-x-0 bottom-0 p-4 opacity-0 translate-y-3 transition duration-300 group-hover:opacity-100 group-hover:translate-y-0">
                        <p class="text-white text-sm leading-relaxed">
                            <?= $img['description'] ?>
                        </p>
                    </div>
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
