<div class="wrap">
    <h1>Settings</h1>
    <?php settings_errors(); ?>
    <div class="settings-section">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-1"><i class="fa-solid fa-gear"></i> Manage Settings</a></li>
            <li><a href="#tab-2"><i class="fa-brands fa-discord"></i> Discord</a></li>
        </ul>
        <div class="tab-content">
            <div id="tab-1" class="tab-pane active">
                <form action="options.php" method="POST">
                    <?php
                    settings_fields('a2d_options_setting');
                    do_settings_sections('a2d_settings');
                    submit_button();
                    ?>
                </form>
            </div>
            <div id="tab-2" class="tab-pane">
                <form action="options.php" method="POST">
                    <?php
                    settings_fields('discord_setting');
                    do_settings_sections('a2d_discord');
                    submit_button();
                    ?>
                </form>
            </div>
        </div>
    </div>
</div>