<?php

if (!defined("WP_UNINSTALL_PLUGIN")) {
    die;
}

delete_option("dataset_url");
delete_option("graph_options");
delete_option("provence_colors");

?>
