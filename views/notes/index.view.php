<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>
<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note): ?>
            <li>
                <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                    <?= htmlspecialchars($note['body']) ?>
                </a>
            </li>
        <?php endforeach ?>
        <p class="mt-6">
            <a href="/notes/create" class="mt-6 text-blue-500 hover:underline">
                Create New Note +
            </a>
        </p>
    </div>
</main>
<?php require base_path('views/partials/foot.php') ?>