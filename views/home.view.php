<?php LoadPartial('head'); ?>
<?php LoadPartial('navbar'); ?>
<?php LoadPartial('showcase'); ?>
<?php LoadPartial('top-banner'); ?>

<section>
  <div class="container mx-auto p-4 mt-3">
    <div class="text-center text-3xl mb-3 font-bold border border-gray-300 p-2.5">Recent Jobs</div>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mb-5">
      <?php foreach ($listings as $listing): ?>
        <div class="rounded-lg shadow-md bg-white">
          <div class="p-3">
            <h2 class="text-xl font-semibold"><?= htmlspecialchars($listing['title']) ?></h2>
            <p class="text-gray-700 text-lg mt-2"><?= htmlspecialchars($listing['description']) ?></p>
            <ul class="my-3 bg-gray-100 p-3 rounded">
              <li class="mb-1.5"><strong>Salary:</strong> <?= htmlspecialchars(formatSalary($listing['salary'])) ?></li>
              <li class="mb-1.5"><strong>Location:</strong> <?= htmlspecialchars($listing['location']) ?></li>
              <li class="mb-2">
                <strong>Tags:</strong> <span><?= htmlspecialchars(implode(', ', $listing['tags'])) ?></span>
              </li>
            </ul>
            <a href="<?= appUrl('listings/' . $listing['id']) ?>" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
              Details
            </a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <a href="<?= appUrl('listings') ?>" class="block text-xl text-center mt-1">
      <i class="fa fa-arrow-alt-circle-right"></i>
      Show All Jobs
    </a>
  </div>
</section>

<?php LoadPartial('bottom-banner'); ?>
<?php LoadPartial('footer'); ?>
