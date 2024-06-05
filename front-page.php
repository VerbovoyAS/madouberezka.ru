<?php get_header();?>

    <div class="p-slider">

        <ul id="scene">
            <li class="layer layer_1" data-depth="0.15"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-1-new.svg';?>" alt=""></li>
            <li class="layer layer_2" data-depth="0.20"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-2-new.svg';?>" alt=""></li>
            <li class="layer layer_3" data-depth="0.25"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-3-new.svg';?>" alt=""></li>
            <li class="layer layer_4" data-depth="0.30"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-4-new.svg';?>" alt=""></li>
            <li class="layer layer_5" data-depth="0.35"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-5-new.svg';?>" alt=""></li>
            <li class="layer layer_6" data-depth="0.40"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-6-new.svg';?>" alt=""></li>
            <li class="layer layer_7" data-depth="0.45"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-7-new.svg';?>" alt=""></li>
            <li class="layer layer_8" data-depth="0.50"><img src="<?= get_template_directory_uri(). '/assets/img/site/sheet-8-new.svg';?>" alt=""></li>
            <li class="layer layer_9" data-depth="0.10"><h2 class="fs-2 text-white text-center main-header">Муниципальное автономное <br>дошкольное образовательное учреждение<br>г. Хабаровска</h2></li>
            <li class="layer layer_10" data-depth="0.10"><h1 class="fs-1 text-white text-center text-uppercase main-header">«Детский сад комбинированного вида № 55<br>«Березка»</h1></li>

        </ul>
    </div>

    <section class="main-content container">
        <?php the_content();?>
    </section>

<?php get_footer();?>

<script type="text/javascript">
    var scene = document.getElementById('scene');
    var parallaxInstance = new Parallax(scene);
</script>
