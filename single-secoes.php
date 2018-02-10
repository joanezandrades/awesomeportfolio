<?php
/**
* Awesome Portfolio single-secoes.
*
* @package Awesome Portfolio
*/
// Meta    
$subtitle = get_post_meta($post->ID, 'subtitle_id', true);
?>
<div class="section-wrapper">
    <header class="header-section-primary">
        <h2 class="title-secondary" title="<?= the_title(); ?>"><?= the_title(); ?></h2>
        <p class="subtitle-primary"><?= $subtitle ?></p>
    </header>
</div>

