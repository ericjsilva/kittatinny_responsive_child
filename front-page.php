<?php
// Exit if accessed directly
if ( !defined('ABSPATH')) exit;
/**
 * Home Page
 *
 * Note: You can overwrite home.php as well as any other Template in Child Theme.
 * Create the same file (name) include in /responsive-child-theme/ and you're all set to go!
 * @see            http://codex.wordpress.org/Child_Themes
 *
 * @file           home.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2012 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/home.php
 * @link           http://codex.wordpress.org/Template_Hierarchy
 * @since          available since Release 1.0
 */
?>
<?php get_header(); ?>
        <div id="featured" class="grid col-940">
        
        <div class="grid col-460">
            <?php $options = get_option('responsive_theme_options');
            // First let's check if headline was set
                if ($options['home_headline']) {
                    echo '<h1 class="featured-title">'; 
                    echo $options['home_headline'];
                    echo '</h1>'; 
            // If not display dummy headline for preview purposes
                  } else { 
                    echo '<h1 class="featured-title">';
                    echo __('Hello, World!','responsive');
                    echo '</h1>';
                  }
            ?>
                    
            <?php $options = get_option('responsive_theme_options');
            // First let's check if headline was set
                if ($options['home_subheadline']) {
                    echo '<h2 class="featured-subtitle">'; 
                    echo $options['home_subheadline'];
                    echo '</h2>'; 
            // If not display dummy headline for preview purposes
                  } else { 
                    echo '<h2 class="featured-subtitle">';
                    echo __('Your H2 subheadline here','responsive');
                    echo '</h2>';
                  }
            ?>
            
            <?php $options = get_option('responsive_theme_options');
            // First let's check if content is in place
                if (!empty($options['home_content_area'])) {
                    echo '<p>'; 
                    echo do_shortcode($options['home_content_area']);
                    echo '</p>'; 
            // If not let's show dummy content for demo purposes
                  } else { 
                    echo '<p>';
                    echo __('Your title, subtitle and this very content is editable from Theme Option. Call to Action button and its destination link as well. Image on your right can be an image or even YouTube video if you like.','responsive');
                    echo '</p>';
                  }
            ?>
            
            <?php $options = get_option('responsive_theme_options'); ?>
            <?php if ($options['cta_button'] == 0): ?>     
            <div class="call-to-action">
            <?php $options = get_option('responsive_theme_options');
            // First let's check if headline was set
                if (!empty($options['cta_url']) && $options['cta_text']) {
                    echo '<a href="'.$options['cta_url'].'" class="blue button">'; 
                    echo $options['cta_text'];
                    echo '</a>';
            // If not display dummy headline for preview purposes
                  } else { 
                    echo '<a href="#nogo" class="blue button">'; 
                    echo __('Call to Action','responsive');
                    echo '</a>';
                  }
            ?>  
            
            </div><!-- end of .call-to-action -->
            <?php endif; ?>         
            
        </div><!-- end of .col-460 -->
        <div id="featured-image" class="grid col-460 fit"> 
                           
            <?php $options = get_option('responsive_theme_options');
            // First let's check if image was set
                if (!empty($options['featured_content'])) {
                    echo do_shortcode($options['featured_content']);
            // If not display dummy image for preview purposes
                  } else {             
                    echo '<img class="aligncenter" src="'.get_stylesheet_directory_uri().'/images/featured-image.png" width="440" height="300" alt="" />'; 
                  }
            ?> 
                                   
        </div><!-- end of #featured-image --> 
        
        </div><!-- end of #featured -->

        <!-- Start: Display Recent Posts -->
        <div id="wrapper-two" class="clearfix">
        <?php query_posts('posts_per_page=6'); ?>

        <div id="content-archive" class="grid col-620">

        <?php if (have_posts()) : ?>
        
        <?php $options = get_option('responsive_theme_options'); ?>
        <?php if ($options['breadcrumb'] == 0): ?>
        <?php echo responsive_breadcrumb_lists(); ?>
        <?php endif; ?>
                    
        <?php while (have_posts()) : the_post(); ?>
        
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf(__( 'Permanent Link to %s', 'responsive' ), the_title_attribute( 'echo=0' )); ?>"><?php the_title(); ?></a></h1>
                
                <div class="post-meta">
                <?php responsive_post_meta_data(); ?>
                
                    <?php if ( comments_open() ) : ?>
                        <span class="comments-link">
                        <span class="mdash">&mdash;</span>
                    <?php comments_popup_link(__('No Comments &darr;', 'responsive'), __('1 Comment &darr;', 'responsive'), __('% Comments &darr;', 'responsive')); ?>
                        </span>
                    <?php endif; ?> 
                </div><!-- end of .post-meta -->
                
                <div class="post-entry">
                    <?php if ( has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
                    <?php the_post_thumbnail('thumbnail', array('class' => 'alignleft')); ?>
                        </a>
                    <?php endif; ?>
                    <?php the_excerpt(); ?>
                    <?php wp_link_pages(array('before' => '<div class="pagination">' . __('Pages:', 'responsive'), 'after' => '</div>')); ?>
                </div><!-- end of .post-entry -->
                
            <div class="post-edit"><?php edit_post_link(__('Edit', 'responsive')); ?></div>             
            </div><!-- end of #post-<?php the_ID(); ?> -->                        
            
        <?php endwhile; ?> 
        
        <?php else : ?>

        <h1 class="title-404"><?php _e('404 &#8212; Fancy meeting you here!', 'responsive'); ?></h1>
                    
        <p><?php _e('Don&#39;t panic, we&#39;ll get through this together. Let&#39;s explore our options here.', 'responsive'); ?></p>
                    
        <h6><?php printf( __('You can return %s or search for the page you were looking for.', 'responsive'),
                sprintf( '<a href="%1$s" title="%2$s">%3$s</a>',
                    esc_url( get_home_url() ),
                    esc_attr__('Home', 'responsive'),
                    esc_attr__('&larr; Home', 'responsive')
                    )); 
             ?></h6>
                    
        <?php get_search_form(); ?>

<?php endif; ?>  
      
        </div>
        <?php get_sidebar(); ?>
    </div><!-- End: Display Recent Posts -->

<?php get_footer(); ?>