<?php
get_header(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-12 text-center">
            <h1 class="error-title">404 - Page Not Found</h1>
            <p class="error-message">Sorry, the page you are looking for does not exist.</p>
            <a href="<?php echo home_url(); ?>" class="btn btn-primary">Go to Home</a>
        </div>
    </div>
<?php get_footer(); ?>