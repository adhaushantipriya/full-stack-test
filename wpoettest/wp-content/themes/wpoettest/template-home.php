<?php /* Template Name: Homepage */ ?>

<?php get_header(); ?>

<div class="delphianlogic-services-wrap d-flex align-items-center">
    <div class="container">
        <h1 class="text-center mb-3 font-weight-normal">DelphianLogic in Action</h1>
        <p class="text-center mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aenean commodo</p>
        <!-- Desktop View Services -->
        <div class="row d-none d-lg-flex no-gutters">
            <div class="col col-4 col-xl-3 service-type-list-wrap">
                <ul class="service-type-list nav-tabs">
                    <?php
                        $taxonomies = get_terms( array(
                            'taxonomy' => 'service_type',
                            'orderby' => 'id',
                            'hide_empty' => false
                        ) );

                        if ( !empty($taxonomies) ) :
                            foreach( $taxonomies as $category ) {
                                if( $category->parent == 0 ) {
                                    $cat_id = $category->term_id;
                                    $image_id = get_term_meta($cat_id, 'showcase-taxonomy-image-id', true);
                                    $output.= '<li class="service-type-item d-flex align-items-center"><a href="#'. lcfirst(esc_attr( $category->name )) .'">';
                                    $output.= wp_get_attachment_image ( $image_id, 'full' );
                                    $output.= esc_attr( $category->name );
                                    $output.= '</a></li>';
                                }
                            }
                            echo $output;
                        endif;
                    ?>
                </ul>
            </div>
            <div class="col col-8 col-xl-9 service-type-item-content tab-content">
                <?php
                    if ( !empty($taxonomies) ) :
                        foreach( $taxonomies as $category1 ) {
                            if( $category1->parent == 0 ) {
                                $output1.='<div class="tab-pane h-100" id="' . lcfirst(esc_attr( $category1->name )) . '">';
                                wp_reset_query();
                                $args = array('post_type' => 'services',
                                    'orderby' => 'id',
                                    'order' => 'ASC',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'service_type',
                                            'field' => 'slug',
                                            'terms' => $category1->slug,
                                        ),
                                    ),
                                );
                                $loop = new WP_Query($args);
                                if($loop->have_posts()) {
                                    while($loop->have_posts()) : $loop->the_post();
                                $output1.='<div class="services-post-item"><div class="row no-gutters align-items-center h-100">
                                <div class="col col-6 service-post-list-wrap">
                                    <div class="service-post-list text-center">
                                        <h2 class="mb-4"><a href="'.get_permalink().'">'. get_the_title() .'</a></h2>
                                        <a href="'.get_permalink().'">Learn More <?xml version="1.0" encoding="utf-8"?>
                                        <!-- Generator: Adobe Illustrator 17.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                        <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                        <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             width="18px" height="18px" viewBox="0 0 18 18" enable-background="new 0 0 18 18" xml:space="preserve">
                                        <path fill="#fff" d="M11,4l-0.883,0.883l3.492,3.492H2v1.25h11.608l-3.492,3.492L11,14l5-5L11,4z"/>
                                        </svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="col col-6 service-post-image-list-wrap h-100">
                                    <div class="service-post-image-list">
                                        <div class="service-post-image" style="background-image:url('.get_the_post_thumbnail_url().');"></div>
                                    </div>
                                </div>
                            </div></div>';
                            endwhile;
                        }
                                $output1.='</div>';
                            }
                        }
                        echo $output1;
                    endif;
                ?>

            </div>
        </div>
        <!-- Mobile View Services -->
        <div class="d-block d-lg-none mobile-services-wrap">
            <div id="accordion">
                <?php
                    $taxonomies = get_terms( array(
                        'taxonomy' => 'service_type',
                        'orderby' => 'id',
                        'hide_empty' => false
                    ) );

                    if ( !empty($taxonomies) ) :
                        foreach( $taxonomies as $category ) {
                            if( $category->parent == 0 ) {
                                $cat_id = $category->term_id;
                                $image_id = get_term_meta($cat_id, 'showcase-taxonomy-image-id', true);
                                $output3.= '<div class="card">
                                <div class="card-header" id="'. lcfirst(esc_attr( $category->name )) .'-heading">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link" data-toggle="collapse" href="#'. lcfirst(esc_attr( $category->name )) .'" aria-expanded="false" aria-controls="'. lcfirst(esc_attr( $category->name )) .'">
                                        '. wp_get_attachment_image ( $image_id, 'full' ) .'
                                        '. esc_attr( $category->name ) .'
                                        </a>
                                    </h5>
                                </div>
                                <div id="'. lcfirst(esc_attr( $category->name )) .'" class="collapse" aria-labelledby="'. lcfirst(esc_attr( $category->name )) .'-heading" data-parent="#accordion">
                                    <div class="card-body">';
                                                $args = array('post_type' => 'services',
                                                    'orderby' => 'id',
                                                    'order' => 'ASC',
                                                    'tax_query' => array(
                                                        array(
                                                            'taxonomy' => 'service_type',
                                                            'field' => 'slug',
                                                            'terms' => $category->slug,
                                                        ),
                                                    ),
                                                );
                                                $loop = new WP_Query($args);
                                                if($loop->have_posts()) {
                                                    while($loop->have_posts()) : $loop->the_post();
                                                    $output3.='<div class="mobile-service-post-list-wrap" style="background-image:url('.get_the_post_thumbnail_url().');"><h4 class="mb-4"><a href="'.get_permalink().'">'. get_the_title() .'</a></h4>
                                                    <a href="'.get_permalink().'">Learn More <?xml version="1.0" encoding="utf-8"?>
                                                    <!-- Generator: Adobe Illustrator 17.0.0, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                                                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                         width="18px" height="18px" viewBox="0 0 18 18" enable-background="new 0 0 18 18" xml:space="preserve">
                                                    <path fill="#fff" d="M11,4l-0.883,0.883l3.492,3.492H2v1.25h11.608l-3.492,3.492L11,14l5-5L11,4z"/>
                                                    </svg></a></div>';
                                                    endwhile;
                                                }
                                    $output3.='</div>
                                </div>
                            </div>';
                            }
                        }
                        echo $output3;
                    endif;
                ?>

            </div>
        </div>
    </div>
</div>