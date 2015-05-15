<?php
/**
 * The template for displaying Author Archive pages.
 *
 * Used to display archive-type pages for posts by an author.
 *
 */
get_header(); ?>
<div class="page-title">
  <div class="container">
    <div class="row">
      <div class="col-md-6  col-sm-6 ">
        <p class="redpro-post-title"><?php _e('Author ','redpro'); echo ":". __('All posts by ','redpro'), get_the_author(); ?></p>
      </div>
      <div class="col-md-6  col-sm-6 ">
        <ol class="breadcrumb  pull-right">
          <li><a href="<?php echo site_url();?>"><?php _e('Home','redpro') ?></a></li>
          <li class="active"><a href="<?php echo site_url().'/author/'.get_the_author();?>"><?php echo get_the_author();?></a></li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!--end / page-title-->
<div class="main-container">
  <div class="container"> 
    <!-- Example row of columns -->
    <div class="row">
      <div class="col-md-8 main">
        <?php if (have_posts() ) : ?>
        <?php while (have_posts()) : the_post(); ?>
        <article class="post">
          <h2 class="post-title"><a href="#"></a> </h2>
          <div class="post-meta">
            <div class="post-date"> <span class="day"><?php echo get_the_time('d'); ?></span> <span class="month"><?php echo get_the_time('M'); ?></span> </div>
            <!--end / post-date-->
            
            <div class="post-meta-author">
              <div class="post-author-name">
                <h5><a href="<?php the_permalink(); ?>"> <?php the_title(); ?></a></h5>
               </div>
              <?php redpro_entry_meta(); ?>
              <div class="clear-fix"></div>
			  <?php the_tags(); ?>
            </div>
            <!--end / post-meta--> 
            
          </div>
          <figure class="feature-thumbnail-large">
            <?php $id = get_the_ID();
				  $feat_image = wp_get_attachment_url(get_post_thumbnail_id($id)); 
				  if($feat_image!="") { ?>
            <a href="<?php echo $feat_image ?>"> <img src="<?php echo $feat_image ?>" class="img-responsive" alt="<?php echo get_the_title();?>" /> </a>
            <?php } ?>
          </figure>
          <div class="post-content">
            <?php the_excerpt(); ?>
          </div>
          <!--end / post-content--> 
        </article>
        <?php endwhile; endif; ?>
        
        <!--end / article--> 
     
        <!--Pagination Start-->
        <?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); ?>
        <?php if(is_plugin_active('faster-pagination/ft-pagination.php')) {?>
            <?php faster_pagination();?>
        <?php }else { ?>
        <?php if(get_option('posts_per_page ') < $wp_query->found_posts) { ?>
          <nav class="redpro-nav">
                <span class="redpro-nav-previous"><?php previous_posts_link(); ?></span>
                <span class="redpro-nav-next"><?php next_posts_link(); ?></span>
			</nav>
        <?php } ?>
        <?php }//is plugin active ?>
        <!--Pagination End-->
      </div>
      <!--end / main-->
      <div class="col-md-3 col-md-offset-1 sidebar">
      	<?php get_sidebar(); ?>
      </div>
    </div>
  </div>
  
  <!-- /container --> 
</div>
<?php get_footer(); ?>
