<?php
    use Framework\Session;
?>

<header class="site-header">
  <div class="container mx-auto p-5">
    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between py-4">
      <a href="/" class="brand text-white text-4xl font-bold">Prosple</a>
      <div class="nav-actions">
        <?php if (Session::has('user')) : ?>
          <div class="flex flex-wrap items-center gap-4">
            <span class="text-white">Welcome, <?= Session::get('user')['name'] ?></span>
            <form method="POST" action="/logout" style="display:inline">
              <button type="submit" class="text-white hover:underline">Logout</button>
            </form>
            <a href="/listings/create" class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded"><i class="fa fa-edit"></i> Post a Job</a>
          </div>
        <?php else : ?>
          <div class="flex flex-wrap items-center gap-4">
            <a href="/login" class="text-white hover:underline">Login</a>
            <a href="/register" class="text-white hover:underline">Register</a>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>
<main class="site-main">
