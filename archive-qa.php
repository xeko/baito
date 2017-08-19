<?php get_header(); ?>

<main role="main">
    <!-- section -->
    <section>

        <h1><?php _e('Archives', 'html5blank'); ?></h1>

        <?php get_template_part('loop'); ?>

        <?php get_template_part('pagination'); ?>

    </section>
    <!-- /section -->

    <ul id="" class="cd-faq-group">
        <li class="cd-faq-title"><h2>Basics</h2></li>
        <li>
            <a class="cd-faq-trigger" href="#0">How do I change my password?</a>
            <div class="cd-faq-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae quidem blanditiis delectus corporis, possimus officia sint sequi ex tenetur id impedit est pariatur iure animi non a ratione reiciendis nihil sed consequatur atque repellendus fugit perspiciatis rerum et. Dolorum consequuntur fugit deleniti, soluta fuga nobis. Ducimus blanditiis velit sit iste delectus obcaecati debitis omnis, assumenda accusamus cumque perferendis eos aut quidem! Aut, totam rerum, cupiditate quae aperiam voluptas rem inventore quas, ex maxime culpa nam soluta labore at amet nihil laborum? Explicabo numquam, sit fugit, voluptatem autem atque quis quam voluptate fugiat earum rem hic, reprehenderit quaerat tempore at. Aperiam.</p>
            </div> <!-- cd-faq-content -->
        </li>

        <li>
            <a class="cd-faq-trigger" href="#0">How do I sign up?</a>
            <div class="cd-faq-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi cupiditate et laudantium esse adipisci consequatur modi possimus accusantium vero atque excepturi nobis in doloremque repudiandae soluta non minus dolore voluptatem enim reiciendis officia voluptates, fuga ullam? Voluptas reiciendis cumque molestiae unde numquam similique quas doloremque non, perferendis doloribus necessitatibus itaque dolorem quam officia atque perspiciatis dolore laudantium dolor voluptatem eligendi? Aliquam nulla unde voluptatum molestiae, eos fugit ullam, consequuntur, saepe voluptas quaerat deleniti. Repellendus magni sint temporibus, accusantium rem commodi?</p>
            </div> <!-- cd-faq-content -->
        </li>

        <li>
            <a class="cd-faq-trigger" href="#0">Can I remove a post?</a>
            <div class="cd-faq-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
            </div> <!-- cd-faq-content -->
        </li>

        <li>
            <a class="cd-faq-trigger" href="#0">How do reviews work?</a>
            <div class="cd-faq-content">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis provident officiis, reprehenderit numquam. Praesentium veritatis eos tenetur magni debitis inventore fugit, magnam, reiciendis, saepe obcaecati ex vero quaerat distinctio velit.</p>
            </div> <!-- cd-faq-content -->
        </li>
    </ul>
    <style>
        @media only screen and (min-width: 768px) {
            .cd-faq-group > li {
                background: #ffffff;
                margin-bottom: 6px;
                box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
                -webkit-transition: box-shadow 0.2s;
                -moz-transition: box-shadow 0.2s;
                transition: box-shadow 0.2s;
            }
            .cd-faq-trigger {
                font-size: 24px;
                font-size: 1.5rem;
                font-weight: 300;
                padding: 24px 72px 24px 24px;
                position: relative;
                display: block;
                line-height: 1.2;
            }
            .cd-faq-trigger::before, .cd-faq-trigger::after {
                position: absolute;
                right: 24px;
                top: 50%;
                height: 2px;
                width: 13px;
                background: #cfdca0;
                -webkit-backface-visibility: hidden;
                backface-visibility: hidden;
                -webkit-transition-property: -webkit-transform;
                -moz-transition-property: -moz-transform;
                transition-property: transform;
                -webkit-transition-duration: 0.2s;
                -moz-transition-duration: 0.2s;
                transition-duration: 0.2s;
            }

        }
    </style>
</main>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
