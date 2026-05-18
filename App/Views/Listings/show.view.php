<?php
    use Framework\Authorization;

    loadPartial('head');
    loadPartial('navbar');
    loadPartial('topBanner');
?>

<section>
  <div class="container listing-show-shell mx-auto p-4 mt-4">

    <?php loadPartial('message'); ?>

    <div class="listing-show-card bg-white rounded-lg shadow-md p-8">
      <div class="listing-show-header">
        <a href="/listings" class="listing-back-link">
          <i class="fa fa-arrow-circle-left"></i> Back To Listings
        </a>

        <?php if (Authorization::isOwner($listing->user_id)) : ?>
          <div class="listing-actions">
            <a href="/listings/edit/<?= $listing->id ?>"
              class="listing-action-btn listing-action-edit px-5 py-2.5 shadow-sm rounded border text-base font-medium text-white bg-yellow-500 hover:bg-yellow-600">
              Edit
            </a>

            <form method="POST" action="/listings/<?= $listing->id ?>">
              <input type="hidden" name="_method" value="DELETE">
              <button type="submit"
                class="listing-action-btn listing-action-delete px-5 py-2.5 shadow-sm rounded border text-base font-medium text-white bg-red-500 hover:bg-red-600"
                onclick="return confirm('Are you sure you want to delete this listing?')">
                Delete
              </button>
            </form>
          </div>
        <?php endif; ?>
      </div>

      <div class="listing-show-intro">
        <h2 class="text-3xl font-bold mb-4"><?= $listing->title ?></h2>
        <p class="text-gray-700 text-lg mb-4"><?= $listing->description ?></p>
      </div>

      <ul class="listing-meta-panel my-4 bg-gray-100 p-8 rounded">
        <li class="mb-2">
          <strong>Salary:</strong> <?= formatSalary($listing->salary) ?>
        </li>
        <li class="mb-2">
          <strong>Location:</strong> <?= $listing->city ?>, <?= $listing->state ?>
        </li>
        <?php if (!empty($listing->tags)) : ?>
        <li class="mb-2">
          <strong>Tags:</strong> <?= $listing->tags ?>
        </li>
        <?php endif; ?>
        <?php if (!empty($listing->company)) : ?>
        <li class="mb-2">
          <strong>Company:</strong> <?= $listing->company ?>
        </li>
        <?php endif; ?>
        <?php if (!empty($listing->phone)) : ?>
        <li class="mb-2">
          <strong>Phone:</strong> <?= $listing->phone ?>
        </li>
        <?php endif; ?>
      </ul>
    </div>

    <h3 class="listing-detail-heading">Job Details</h3>

    <div class="listing-detail-panel bg-white rounded-lg shadow-md p-8">
      <?php if (!empty($listing->requirements)) : ?>
        <div class="listing-detail-block">
          <strong>Requirements:</strong>
          <p><?= $listing->requirements ?></p>
        </div>
      <?php endif; ?>

      <?php if (!empty($listing->benefits)) : ?>
        <div class="listing-detail-block">
          <strong>Benefits:</strong>
          <p><?= $listing->benefits ?></p>
        </div>
      <?php endif; ?>

      <?php if (!empty($listing->email)) : ?>
        <div class="listing-detail-block">
          <strong>Email:</strong>
          <p><a href="mailto:<?= $listing->email ?>"><?= $listing->email ?></a></p>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>
