<?php
    loadPartial('head');
    loadPartial('navbar');
    loadPartial('showcase');
    loadPartial('topBanner');
?>

<!-- Job Listings -->
<section>
  <div class="container home-listings-shell mx-auto p-4 mt-3">
    <div class="section-shell">
    <div class="section-heading text-center text-3xl mb-4 font-bold border border-gray-300 p-3">Recent Jobs</div>
    <div class="job-grid grid grid-cols-1 md:grid-cols-3 mb-6">

      <?php foreach ($listings as $listing) : ?>
      <div class="job-card rounded-lg shadow-md bg-white">
        <div class="job-card-body p-4">
          <h2 class="job-title text-xl font-semibold"><?= $listing->title ?></h2>
          <p class="job-description text-gray-700 text-lg">
            <?= $listing->description ?>
          </p>
          <ul class="job-meta my-4 bg-gray-100 p-4 rounded">
            <li class="mb-2"><strong>Salary:</strong> <?= formatSalary($listing->salary) ?></li>
            <li class="mb-2">
              <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
              <span class="job-chip ml-2">Local</span>
            </li>
            <?php if (!empty($listing->tags)) : ?>
            <li class="mb-2">
              <strong>Tags:</strong> <span class="job-tags"><?= $listing->tags ?></span>
            </li>
            <?php endif; ?>
          </ul>
          <a href="/listings/<?= $listing->id ?>"
            class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
            Details
          </a>
        </div>
      </div>
      <?php endforeach; ?>

    </div>
    <a href="/listings" class="show-all-link block text-xl text-center">
      <i class="fa fa-arrow-alt-circle-right"></i>
      Show All Jobs
    </a>
    </div>
  </div>
</section>

<?php
    loadPartial('bottomBanner');
    loadPartial('footer');
?>
