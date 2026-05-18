<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-listing-section flex justify-center">
  <div class="create-listing-card bg-white p-8 rounded-lg shadow-md w-full max-w-lg mt-8">
    <h2 class="create-listing-title text-4xl text-center font-bold mb-4">Create Job Listing</h2>

    <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

    <form method="POST" action="/listings">
      <!-- Job Info -->
      <h2 class="create-listing-subtitle text-2xl font-bold mb-6 text-center text-gray-500">
        Job Info
      </h2>

      <div class="mb-4">
        <input
          type="text"
          name="title"
          placeholder="Job Title"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->title ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <textarea
          name="description"
          class="create-listing-input create-listing-textarea border rounded w-full py-2 px-3"
          rows="4"
          placeholder="Job Description"
        ><?= isset($listing) ? $listing->description ?? '' : '' ?></textarea>
      </div>

      <div class="mb-4">
        <input
          type="number"
          name="salary"
          placeholder="Annual Salary"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->salary ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <input
          type="text"
          name="tags"
          placeholder="Tags (comma separated)"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->tags ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <textarea
          name="requirements"
          class="create-listing-input border rounded w-full py-2 px-3"
          rows="2"
          placeholder="Requirements"
        ><?= isset($listing) ? $listing->requirements ?? '' : '' ?></textarea>
      </div>

      <div class="mb-4">
        <textarea
          name="benefits"
          class="create-listing-input border rounded w-full py-2 px-3"
          rows="2"
          placeholder="Benefits"
        ><?= isset($listing) ? $listing->benefits ?? '' : '' ?></textarea>
      </div>

      <!-- Company Info -->
      <h2 class="create-listing-subtitle text-2xl font-bold mb-6 text-center text-gray-500">
        Company Info &amp; Location
      </h2>

      <div class="mb-4">
        <input
          type="text"
          name="company"
          placeholder="Company Name"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->company ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <input
          type="text"
          name="address"
          placeholder="Address"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->address ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <input
          type="text"
          name="city"
          placeholder="City"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->city ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <input
          type="text"
          name="state"
          placeholder="State"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->state ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <input
          type="text"
          name="phone"
          placeholder="Phone"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->phone ?? '' : '' ?>"
        />
      </div>

      <div class="mb-4">
        <input
          type="email"
          name="email"
          placeholder="Email Address For Applications"
          class="create-listing-input border rounded w-full py-2 px-3"
          value="<?= isset($listing) ? $listing->email ?? '' : '' ?>"
        />
      </div>

      <div class="create-listing-actions">
        <button
          class="create-listing-save w-full bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded focus:outline-none"
          type="submit"
        >
          Save
        </button>
        <a href="/listings" class="create-listing-cancel block text-center text-gray-500 mt-4">
          Cancel
        </a>
      </div>
    </form>
  </div>
</section>

<?php loadPartial('footer'); ?>
