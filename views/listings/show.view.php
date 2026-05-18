<?php LoadPartial('head'); ?>
<?php LoadPartial('navbar'); ?>
<?php LoadPartial('top-banner'); ?>

<?php $listing = $listing ?? []; ?>

<section class="container mx-auto p-4 mt-4">
  <div class="rounded-lg shadow-md bg-white p-3">
    <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
      <a class="block p-4 text-blue-700" href="<?= appUrl('listings') ?>">
        <i class="fa fa-arrow-alt-circle-left"></i>
        Back To Listings
      </a>
    </div>
    <div class="p-4">
      <h2 class="text-xl font-semibold"><?= htmlspecialchars($listing['title'] ?? '') ?></h2>
      <p class="text-gray-700 text-lg mt-2"><?= htmlspecialchars($listing['description']) ?></p>
      <ul class="my-4 bg-gray-100 p-4 rounded">
        <li class="mb-2"><strong>Salary:</strong> <?= htmlspecialchars(formatSalary($listing['salary'] ?? '')) ?></li>
        <li class="mb-2"><strong>Location:</strong> <?= htmlspecialchars($listing['location'] ?? '') ?></li>
        <li class="mb-2">
          <strong>Tags:</strong> <span><?= htmlspecialchars(implode(', ', $listing['tags'] ?? [])) ?></span>
        </li>
        <?php if (!empty($listing['company'])): ?>
          <li class="mb-2"><strong>Company:</strong> <?= htmlspecialchars($listing['company']) ?></li>
        <?php endif; ?>
        <?php if (!empty($listing['phone'])): ?>
          <li class="mb-2"><strong>Phone:</strong> <?= htmlspecialchars($listing['phone']) ?></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</section>

<section class="container mx-auto p-4">
  <h2 class="text-xl font-semibold mb-4">Job Details</h2>
  <div class="rounded-lg shadow-md bg-white p-4">
    <h3 class="text-lg font-semibold mb-2 text-blue-500">Job Requirements</h3>
    <p><?= htmlspecialchars($listing['requirements'] ?? '') ?></p>
    <h3 class="text-lg font-semibold mt-4 mb-2 text-blue-500">Benefits</h3>
    <p><?= htmlspecialchars($listing['benefits'] ?? '') ?></p>
  </div>
  <p class="my-5">Put "Job Application" as the subject of your email and attach your resume.</p>
  <a href="mailto:<?= htmlspecialchars($listing['email'] ?? '') ?>" class="block w-full text-center px-5 py-2.5 shadow-sm rounded border text-base font-medium cursor-pointer text-indigo-700 bg-indigo-100 hover:bg-indigo-200">
    Apply Now
  </a>
</section>

<?php LoadPartial('bottom-banner'); ?>
<?php LoadPartial('footer'); ?>
