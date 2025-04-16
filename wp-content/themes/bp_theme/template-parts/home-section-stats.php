<?php
$stats = get_field('section_stats');
if ($stats): ?>
    <div class="home-stats">
        <div class="container">
            <div class="home-stats__holder">
                <?php foreach ($stats as $stat):
                    $stat_title = $stat['section_stats_title'];
                    $stat_description = $stat['section-stats-description'];
                    ?>
                    <div class="home-stats__holder--item">
                        <?php if ($stat_title): ?>
                            <span>
                                <?php echo esc_html($stat_title); ?>
                            </span>
                        <?php endif; ?>

                        <?php if ($stat_description): ?>
                            <p class="body-regular-two">
                                <?php echo esc_html($stat_description); ?>
                            </p>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>