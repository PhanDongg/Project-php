
<?php
get_header();
?>

    <article class="content px-3 py-5 p-md-5">
        
        <?php 
        
            if( have_posts() ) {//điều kiện nếu có bài viết
                
                while( have_posts() ) {//lặp qua tất cả bài viết
                    
                    the_post();//để check xem post nào đã đăng và sẽ ko bị lặp lại
//                    the_content();
                    
                    get_template_part( 'template-parts/content', 'article' );
                }
                
            }
        ?>
        
    </article>


<?php
get_footer();
?>



