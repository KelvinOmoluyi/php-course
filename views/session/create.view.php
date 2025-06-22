<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/nav.php') ?>
<?php require base_path('views/partials/banner.php') ?>

<main style="width: 100%; height: 100%; display: flex; justify-content: center; padding-top: 2rem;">
    <form action="/session" method="POST" style="width: 28rem; height:20rem;">
        <div class="form-heading" style="width: 100%; text-align: center;">
            <h2 style="font-size: 2.2rem; font-weight:700;">Login Form</h2>
        </div>
        <div class="form-inputs" style="margin-top: 2rem;">
            <input type="email" name="email" id="email" placeholder="Email address" style="width: 100%; height: 3rem; border: 1px solid gray; border-radius: 10px; margin-bottom: 0.1rem">
            <!-- error handler -->
            <?php if (isset($errors['email'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['email'] ?></p>
            <?php endif; ?>
            
            <br>

            <input type="password" name="password" id="password" placeholder="Password..." style="width: 100%; height: 3rem; border: 1px solid gray; border-radius: 10px;">
            <!-- error handler -->
            <?php if (isset($errors['password'])) : ?>
                <p class="text-red-500 text-xs mt-2"><?= $errors['password'] ?></p>
            <?php endif; ?>
        </div>
        <button type="submit" style="margin-top: 3rem; width: 100%; background-color: blue; padding: 0.5rem 0; border-radius: 0.5rem; color: white;">
            Login
        </button>
    </form>

</main>

<?php require base_path('views/partials/footer.php') ?>
