<?php
/*
  Plugin Name: WP Mass Delete
  Version: 1.3
  Author: CyberSEO.NET
  Author URI: http://www.cyberseo.net/
  Plugin URI: http://www.cyberseo.net/wp-mass-delete/
  Description: This plugin allows one to mass delete WordPress posts and pages according to the specified rules. Please use it very carefully!
 */

if (!function_exists("get_option") || !function_exists("add_filter")) {
    die();
}

function wpmd_show_menu() {
    global $wpdb, $wp_version;
    ?>
    <div class="wrap">
        <div style="background-color:#FFFFCC; padding:5px; border:1px solid #ddd;">
            <table border="0" cellspacing="10px">
                <tr>
                    <td valign="top">
                        <a href="http://nanacast.com/vp/112924/471762/" target="_blank"><img src="<?php echo WP_PLUGIN_URL; ?>/wp-mass-delete/images/pac.jpg" alt="" width="250" height="42" /></a>
                        <br />
                        <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" height="31" width="250">
                            <param name="allowscriptaccess" value="always">
                            <param name="movie" value="http://ezs3.s3.amazonaws.com/player/510/player.swf">
                            <param name="wmode" value="opaque">
                            <param name="allowfullscreen" value="true">
                            <param name="timed_link" value="0">
                            <param name="flashvars" value="lightcolor=000099&amp;dock=false&amp;icons=true&amp;mute=false&amp;backcolor=000000&amp;aboutlink=http://www.ezs3.com/about&amp;controlbar=bottom&amp;autostart=false&amp;stretching=uniform&amp;frontcolor=ffffff&amp;screencolor=000000&amp;repeat=none&amp;file=http://ezs33f0d2d67c22a19ef8bc6d7c90662b8be.s3.amazonaws.com/ezs3js/6054754001-616859-16.mp3&amp;provider=audio&amp;abouttext=eZs3&amp;skin=http://ezs3.s3.amazonaws.com/player/skins/Stijl.swf">
                            <embed height="31" width="250" allowscriptaccess="always" src="http://ezs3.s3.amazonaws.com/player/510/player.swf" wmode="opaque" allowfullscreen="true" timed_link="0" flashvars="lightcolor=000099&amp;dock=false&amp;icons=true&amp;mute=false&amp;backcolor=000000&amp;aboutlink=http://www.ezs3.com/about&amp;controlbar=bottom&amp;autostart=false&amp;stretching=uniform&amp;frontcolor=ffffff&amp;screencolor=000000&amp;repeat=none&amp;file=http://ezs33f0d2d67c22a19ef8bc6d7c90662b8be.s3.amazonaws.com/ezs3js/6054754001-616859-16.mp3&amp;provider=audio&amp;abouttext=eZs3&amp;skin=http://ezs3.s3.amazonaws.com/player/skins/Stijl.swf">
                        </object>
                    </td>
                    <td>
                        "Are you ready for a business that can be run from anywhere, doesn't involve you shipping anything 
                        to customers, and is virtually competition proof?"
                        <br />
                        <strong>Does this course work? We've got plenty of proof for you starting with this:</strong>
                        Listen to this live testimonial from one of our students living outside the U.S. on an ISLAND! 
                        You'll meet Barrington. He took the PAC course and put it to work. With $200K in sales on Amazon on a 
                        product he simply ships into Amazon.com over and over. From a beach in Jamaica he's growing a $1Million business!
                        <br />
                        <a href="http://nanacast.com/vp/112924/471762/" target="_blank"><strong>What is the "Proven Amazon Course"?</strong></a>
                    </td>
                </tr>
            </table>
        </div>
        <h2>WP Mass Delete</h2>
        <p>The plugin allows one to mass delete WordPress posts and pages.
            Please use it very carefully!</p>
        <table class="form-table" style="margin-top: .5em" width="100%">
            <tbody>
                <tr>
                    <td>
                        <form method="post">
                            <table class="widefat">
                                <tr valign="top">
                                    <th align="left">Date interval</th>
                                    <td align="left"><input type="text" name="start_date" value=""
                                                            size="10"> - <input type="text" name="end_date" value=""
                                                            size="10"> - set the date interval, or leave these fields blank
                                        to select all posts. The dates must be specified in the
                                        following format: <strong>YYYY-MM-DD</strong>
                                    </td>
                                </tr>
                                <?php
                                if (version_compare($wp_version, '2.1', '>=')) {
                                    ?>
                                    <tr valign="top">
                                        <th align="left">Type of items to delete</th>
                                        <td align="left"><input type="checkbox" name="posts" checked> - posts
                                            &nbsp;&nbsp; <input type="checkbox" name="pages"> - pages</td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                <tr valign="top">
                                    <th align="left">Post status</th>
                                    <td align="left"><input type="checkbox" name="publish" checked> -
                                        published &nbsp;&nbsp; <input type="checkbox" name="future"> -
                                        scheduled &nbsp;&nbsp; <input type="checkbox" name="pending"> -
                                        pending &nbsp;&nbsp; <input type="checkbox" name="draft"> -
                                        draft &nbsp;&nbsp; <input type="checkbox" name="private"> -
                                        private</td>
                                </tr>
                                <tr valign="top">
                                    <th align="left">If post contains</th>
                                    <td align="left"><input type="text" name="content" value=""
                                                            size="60"> then <select name="action">
                                            <option selected value="delete">Delete it</option>
                                            <option value="do_not_delete">Don't delete it</option>
                                        </select> <br />
                                    </td>
                                </tr>
                                <?php
                                if (version_compare($wp_version, '2.9', '>=')) {
                                    ?>
                                    <tr valign="top">
                                        <th align="left">Bypass trash and force deletion</th>
                                        <td align="left"><input type="checkbox" name="force_delete"> -
                                            enable this option to completely delete the specified posts.

                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <br />
                            <div align="center">
                                <input type="submit" name="delete" class="button-primary"
                                       value="Delete the posts" />&nbsp;&nbsp;<input type="button"
                                       name="cancel" value="Cancel" class="button"
                                       onclick="javascript:history.go(-1)" />
                            </div>
                        </form>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
    if (isset($_POST ['delete'])) {
        $type = array();
        if (@$_POST ['posts'] == "on") {
            $type [] = "'post'";
        }
        if (@$_POST ['pages'] == "on") {
            $type [] = "'page'";
        }
        $status = array();
        if (@$_POST ['publish'] == "on") {
            $status [] = "'publish'";
        }
        if (@$_POST ['pending'] == "on") {
            $status [] = "'pending'";
        }
        if (@$_POST ['draft'] == "on") {
            $status [] = "'draft'";
        }
        if (@$_POST ['private'] == "on") {
            $status [] = "'private'";
        }
        if (@$_POST ['future'] == "on") {
            $status [] = "'future'";
        }
        if ((count($type) || version_compare($wp_version, '2.1', '<')) && count($status)) {
            @set_time_limit(60 * 30);
            $query = "SELECT ID FROM $wpdb->posts WHERE post_status IN (" . implode(",", $status) . ")";
            if (version_compare($wp_version, '2.1', '>=')) {
                $query .= " AND post_type IN (" . implode(",", $type) . ")";
            }
            if ($_POST ['start_date'] != "") {
                $query .= " AND post_date >= '" . $_POST ['start_date'] . " 00:00:00'";
            }
            if ($_POST ['end_date'] != "") {
                $query .= " AND post_date <= '" . $_POST ['end_date'] . " 23:59:59'";
            }
            if ($_POST ['content'] != "") {
                $content = $wpdb->escape($_POST ['content']);
                if ($_POST ['action'] == "delete") {
                    $query .= " AND post_content LIKE '%{$content}%'";
                } else {
                    $query .= " AND post_content NOT LIKE '%{$content}%'";
                }
            }
            $post_ids = $wpdb->get_col($query);
            $cnt = count($post_ids);
            if ($cnt) {
                echo "<br \><div id=\"message\" class=\"updated fade\">Deleting <strong>$cnt</strong> items...";
                foreach ($post_ids as $id) {
                    if (version_compare($wp_version, '2.9', '>=')) {
                        wp_delete_post($id, @$_POST ['force_delete'] == "on");
                    } else {
                        wp_delete_post($id);
                    }
                }
                echo "Done!</div><br \>";
                return;
            }
        }
        echo "<br \><div id=\"message\" class=\"updated fade\">Nothing to delete.</div><br \>";
    }
}

function wpmd_main_menu() {
    if (function_exists('add_options_page')) {
        add_options_page(__('WP Mass Delete'), __('WP Mass Delete'), 'manage_options', 'wp_mass_delete', 'wpmd_show_menu');
    }
}

if (is_admin()) {
    add_action('admin_menu', 'wpmd_main_menu');
}
?>