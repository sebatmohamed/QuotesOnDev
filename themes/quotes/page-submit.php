<?php get_header(); ?>

<?php
if ( is_user_logged_in() ) {?>

<section id="submit-content">

    <h1>Submit a Quote</h1>

    <form>
        <p>Author of Quote</p>
        <input id="quote-title" type="text"/>

        <p>Quote</p>
        <textarea id="quote" type="text"></textarea>

        <p>Where did you find this quote? (e.g. book name)</p>
        <input id="quote-source" type="text"/>

        <p>Provide the URL of the quote source, if available.</p>
        <input id="quote-url" type="text"/>
    </form>

    <section class="add-quote">
        <button id="add-quote">Submit Quote</button>
    </section>

</section>

<?php 
} else {?>
    
    <section id="login">
        <h1>Submit a Quote</h1>
        <h3> Sorry, you must be logged in to submit a quote!</h3>
        <a href="http://localhost:8888/quotesOnDev/wp-login.php?redirect_to=http%3A%2F%2Flocalhost%3A8888%2FquotesOnDev%2Fwp-admin%2F&reauth=1">
            <h4>Click here to login.</h4>
        </a>
    </section>

<?php }?>

<?php get_footer();?>