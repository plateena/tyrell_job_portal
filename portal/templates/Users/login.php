<main class="form-signin mt-5 pt-12">
    <?php echo $this->Form->create() ?>
        <!--img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57" -->
        <div class="text-center">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        </div>

        <div class="form-floating mt-4">
          <input type="email" class="form-control" id="floatingInput" name=email placeholder="Email">
          <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
          <input type="password" class="form-control" id="floatingPassword" name="password" placeholder="Password">
          <label for="floatingPassword">Password</label>
        </div>

        <div class="checkbox mb-3">
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
        <div class="text-center">
            <p class="mt-5 mb-3 text-muted">&copy; 2024</p>
        </div>
    <?php echo $this->Form->end() ?>
</main>
