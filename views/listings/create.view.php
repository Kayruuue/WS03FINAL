<?php LoadPartial('head'); ?>
<?php LoadPartial('navbar'); ?>

<?php $listing = $listing ?? []; ?>
<?php $errors = $errors ?? []; ?>

<section class="flex justify-center items-center mt-14">
  <div class="bg-white p-6 rounded-lg shadow-md w-full max-w-3xl mx-5">
    <h2 class="text-4xl text-center font-bold mb-3">Create Job Listing</h2>
    <?php if (!empty($errors)): ?>
      <div class="mb-5 rounded border border-red-200 bg-red-50 p-3 text-red-700">
        <?php foreach ($errors as $error): ?>
          <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>

    <form method="POST" action="<?= appUrl('listings') ?>">
      <h3 class="text-2xl font-bold mb-5 text-center text-gray-500">Job Info</h3>
      <div class="mb-3">
        <input type="text" name="title" value="<?= htmlspecialchars($listing['title'] ?? '') ?>" placeholder="Job Title" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <textarea name="description" placeholder="Job Description" class="w-full px-3 py-2 border rounded focus:outline-none"><?= htmlspecialchars($listing['description'] ?? '') ?></textarea>
      </div>
      <div class="mb-3">
        <input type="text" name="salary" value="<?= htmlspecialchars($listing['salary'] ?? '') ?>" placeholder="Annual Salary" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="text" name="tags" value="<?= htmlspecialchars($listing['tags'] ?? '') ?>" placeholder="Tags (comma separated)" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="text" name="requirements" value="<?= htmlspecialchars($listing['requirements'] ?? '') ?>" placeholder="Requirements" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="text" name="benefits" value="<?= htmlspecialchars($listing['benefits'] ?? '') ?>" placeholder="Benefits" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>

      <h3 class="text-2xl font-bold mb-5 mt-1 text-center text-gray-500">Company Info & Location</h3>
      <div class="mb-3">
        <input type="text" name="company" value="<?= htmlspecialchars($listing['company'] ?? '') ?>" placeholder="Company Name" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="text" name="address" value="<?= htmlspecialchars($listing['address'] ?? '') ?>" placeholder="Address" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="text" name="city" value="<?= htmlspecialchars($listing['city'] ?? '') ?>" placeholder="City" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="text" name="state" value="<?= htmlspecialchars($listing['state'] ?? '') ?>" placeholder="State" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="text" name="phone" value="<?= htmlspecialchars($listing['phone'] ?? '') ?>" placeholder="Phone" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>
      <div class="mb-3">
        <input type="email" name="email" value="<?= htmlspecialchars($listing['email'] ?? '') ?>" placeholder="Email Address For Applications" class="w-full px-3 py-2 border rounded focus:outline-none" />
      </div>

      <button class="w-full bg-green-500 hover:bg-green-600 text-white px-4 py-2 my-2 rounded focus:outline-none">
        Save
      </button>
      <a href="<?= appUrl() ?>" class="block text-center w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded focus:outline-none">
        Cancel
      </a>
    </form>
  </div>
</section>

<?php LoadPartial('bottom-banner'); ?>
<?php LoadPartial('footer'); ?>
