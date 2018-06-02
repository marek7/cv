<?php get_header(); ?>

<?php

// check if the flexible content field has rows of data
if( have_rows('flexible_content') ): ?>

  <div class="main-content">

  <?php
  // loop through the rows of data
  while ( have_rows('flexible_content') ) : the_row();  
    

    //if( get_row_layout() == 'banner' ):      
    $layout = get_row_layout();

    // BANNER SECTION START
    if( $layout == 'banner_section' ):

      $img = get_sub_field( 'image' );
      $txt = get_sub_field( 'text' ); 

    ?> 
      <div class="hero top-bottom-gap">
        <?php if(!empty($img)): ?>
          <img src="<?php echo $img['sizes'] ['baner']; ?>" alt="<?php echo $img['alt']; ?>">
        <?php endif; ?>
        <?php echo $txt; ?>
      </div>     

    <?php endif; //END BANNER SECTION?>
      
    <?php

    //ABOUT SECTION START
    if ($layout == 'about_section'): ?>

      <div class= "about-section top-bottom-gap" >
        <div class="section-heading"> 
          <h2><strong>About me</strong></h2>    
          <hr>
        </div>  
        
        <?php if( have_rows( 'about_repeater' ) ): //ABOUT SECTION REPEATER START ?>

          <ul class="about-list">

            <?php while( have_rows( 'about_repeater' ) ): the_row(); 

            $naziv = get_sub_field( 'naziv_polja' );
            $vrijednost = get_sub_field( 'vrijednost_polja' ); ?>

            <li>
              <span class="field"><strong><?php echo $naziv ?>: </strong></span>
              <span class="value"><?php echo $vrijednost ?></span>
            </li>

            <?php endwhile; ?>

          </ul>

        <?php endif; //END ABOUT SECTION REPEATER ?>

      </div>

    <?php endif; //END ABOUT SECTION  ?>      

  <?php endwhile; ?> 

  </div>

<?php endif; ?>  

<?php get_footer(); ?>