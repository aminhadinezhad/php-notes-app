<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main>
    <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
        <p class="mb-6">
            <a class="text-blue-500 hover:underline" href="/note?id=<?= $note['id'] ?>s">
                ← Go back
            </a>
        </p>
        <div class="max-w-2xl rounded-md bg-white p-6 shadow-md">
            <form method="POST" action="/note">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">

                <div class="grid grid-cols-1 gap-y-6">
                    <div>
                        <label for="body" class="block text-sm font-medium text-gray-900">
                            About
                        </label>
                        <div class="mt-2">
                            <textarea
                                placeholder="Here's an idea for note ..."
                                id="body"
                                name="body"
                                rows="3"
                                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-blue-600 sm:text-sm/6"><?= isset($errors['body']) ? $_POST['body'] : $note['body'] ?></textarea>
                        </div>
                        <?php if (isset($errors['body'])) : ?>
                            <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                        <?php endif ?>
                    </div>
                </div>
                <div class="mt-6 flex justify-end gap-x-2">
                    <a
                        href="/note?id=<?= $note['id'] ?>"
                        class="inline-flex justify-center rounded-md bg-gray-500 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-400 cursor-pointer">
                        Cancel
                    </a>
                    <button
                        type="submit"
                        class="inline-flex justify-center rounded-md bg-blue-600 px-4 py-2 text-sm font-semibold text-white hover:bg-blue-500 cursor-pointer">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</main>

<?php require base_path('views/partials/foot.php') ?>