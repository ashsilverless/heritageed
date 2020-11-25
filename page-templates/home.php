<?php
/**
 * ============== Template Name: Home Page
 *
 * @package heritageed
 */
get_header();?>

<div class="mobile-nav">
    <a href="#" class="close-mobile-nav"><i class="fas fa-times"></i></a>
    <div class="mobile-nav__inner">
        <?php get_template_part('template-parts/nav-bottom-row');?>
        <?php get_template_part('template-parts/nav-top-row');?>
        <a href="#contact" class="book-now-cta">Book Now</a>
    </div>
</div>

<div class="nav-overlay">
    <a href="" class="nav-trigger"><i class="fas fa-bars"></i></a>
    <nav>
    <?php get_template_part('template-parts/nav-top-row');?>
    <?php get_template_part('template-parts/nav-bottom-row');?>
    </nav>
    <a href="#contact" class="book-now-cta">Book Now</a>
</div>

<div class="top-section">
    <!--<nav>
        <?php get_template_part('template-parts/nav-top-row');?>
        <?php get_template_part('template-parts/nav-bottom-row');?>
        <a href="#contact" class="book-now-cta">Book Now</a>
    </nav>-->
    <div class="hero">
        <div class="container">
                <?php get_template_part ('inc/img/hed-logo');?>
                <div class="headings">
                    <?php if( have_rows('hero_section') ):
                    while( have_rows('hero_section') ): the_row(); ?>
                        <h2 class="heading heading__5"><?php the_sub_field('pre_heading');?></h2>
                        <h2 class="heading heading__1"><?php the_sub_field('heading');?></h2>
                        <h2 class="heading heading__5 heading__300"><?php the_sub_field('sub_heading');?></h2>
                    <?php endwhile; endif;?>
                </div>
        </div>
        <div class="brand-device"></div>      
    </div>
</div>

<section class="introduction" id="intro">
    <?php if( have_rows('introduction') ):
    while( have_rows('introduction') ): the_row(); 
    $introImage = get_sub_field('image');?>
    <div class="upper">
        <div class="intro-image" style="background:url(<?php echo $introImage['url'];?>);"></div>
        <div class="intro-text">
            <?php the_sub_field('introduction_text');?>
        </div>
        <a href="" class="read-more expand">Read More<i class="fas fa-chevron-down"></i></a>
    </div>
    <div class="lower">
        <div class="intro-text more">
            <?php the_sub_field('introduction_text-more');?>
            <a href="" class="read-more remove">Read Less<i class="fas fa-chevron-up"></i></a> 
        </div>   
    </div>
    <?php endwhile; endif;?>    
</section>

<section class="what-we-do" id="what">
    <h2 class="heading heading__2 heading__700">What We Do</h2>
    
    <div class="vertical-tabs">
        <div class="vertical-tabs__tabs">
            <div class="sticky">
            <?php if( have_rows('what_we_do') ):
            $tabNumber = 1;
            while( have_rows('what_we_do') ): the_row(); ?>
                <h2 class="heading heading__6" id="tab<?=$tabNumber;?>"><?php the_sub_field('title');?></h2>
            <?php $tabNumber++; endwhile;  endif;?>
            </div>
        </div>
        <div class="vertical-tabs__content">
            <?php if( have_rows('what_we_do') ):
            $tabNumber = 1;
            while( have_rows('what_we_do') ): the_row(); 
            $tabImage = get_sub_field('image');?>
                <div class="item tab<?=$tabNumber;?>">
                    <img src="<?php echo $tabImage['url'];?>" alt="<?php echo $tabImage['alt'];?>"/>
                    <h2 class="heading heading__6 heading__400"><?php the_sub_field('title');?></h2>
                    <?php the_sub_field('text');?>
                </div>
            <?php $tabNumber++; endwhile; endif;?> 
        </div>       
    </div>
    <div class="brand-device"></div>
</section>
    
<section class="process" id="process">
    <h2 class="heading heading__2 heading__700">The Process</h2>
</section>
<section>
    <div class="container">
        <div class="process-carousel owl-carousel">
            <?php if( have_rows('process') ):
            $slideNumber = 1;
            while( have_rows('process') ): the_row(); ?>
                <div class="item">
                    <?php the_sub_field('icon');?>
                    <div class="inner">
                        <h2 class="heading heading__6 heading__400"><span><?=$slideNumber;?>.</span><?php the_sub_field('title');?></h2>
                        <p><?php the_sub_field('text');?></p>    
                    </div>
                </div>
            <?php $slideNumber++; endwhile; endif;?> 
        </div>  
    </div>
</section>
<section class="what-they-say" id="say">
    <div class="container">
        <h2 class="heading heading__2 heading__700">What They Say</h2>
        <div class="testimonial-carousel owl-carousel">
            <?php if( have_rows('what_they_say') ):
            $slideNumber = 1;
            while( have_rows('what_they_say') ): the_row(); ?>
                <div class="item">
                    <?php the_sub_field('testimonial');?>
                    <?php the_sub_field('attributed_to');?>   
                </div>
            <?php $slideNumber++; endwhile; endif;?> 
        </div>
        <div class="brand-device"></div>
    </div>
</section>

<section class="faq" id="faq">
    <div class="container">
        <h2 class="heading heading__2 heading__700">FAQ</h2>
        <div class="toggle toggle-faq">
            <?php if( have_rows('faq') ):
            $toggleNumber = 1;
            while( have_rows('faq') ): the_row(); ?>
                <div class="item">
                    <div class="question">
                        <span>Q<?=$toggleNumber;?>.</span>
                        <?php the_sub_field('question');?>
                        <i class="fas fa-chevron-down"></i>
                    </div>
                    <div class="answer">
                        <?php the_sub_field('answer');?>
                    </div>   
                </div>
            <?php $toggleNumber++; endwhile; endif;?> 
        </div>
    </div>
</section>

<section class="documents" id="documents">
    <div class="container">
        <h2 class="heading heading__2 heading__700">The Science</h2>
        <div class="documents-inner">
            <?php if( have_rows('documents') ):
            $toggleNumber = 1;
            while( have_rows('documents') ): the_row(); ?>
                <div class="item">
                        <h3 class="heading heading__6 heading__400"><?php the_sub_field('title');?></h3>
                        <?php the_sub_field('description');?>
                        
                        <?php $document = get_sub_field('document');?>
                        <a href="<?=$document['url'];?>" alt="<?=$document['alt'];?>" traget="_blank"><i class="fas fa-file-alt"></i></a>
                </div>
            <?php $toggleNumber++; endwhile; endif;?> 
        </div>
    </div>
    <div class="brand-device"></div>
</section>

<section class="contact" id="contact">
    <div class="container">
        <h2 class="heading heading__2 heading__700">Contact Us</h2>
        <div class="contact-inner">
            <p><?php the_field('phone', 'options');?></p>
            <p><?php the_field('email', 'options');?></p>
            <?php echo do_shortcode('[contact-form-7 id="10" title="Contact form 1"]');?>

        </div>
    </div>
    <div class="brand-device"></div>
</section>

<?php get_footer();?>