<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a class="text-blue-500 hover:underline" href="/notes">
                ← Go back
            </a>
        </p>
        <p>
            <?= htmlspecialchars($note['body']) ?>
        </p>
        <div class="mt-6">
            <a href="/note/edit?id=<?= $note['id'] ?>"
                class="rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 cursor-pointer">
                Edit
            </a>
        </div>
        <form method="POST" action="">
            <div class="mt-4">
                <input type="hidden" name="_method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button
                    class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white hover:bg-red-500 cursor-pointer">
                    Delete
                </button>
            </div>
        </form>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>