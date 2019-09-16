<?php

add_action('admin_menu', 'name_directory_register_menu_entry');
add_action('wp_ajax_name_directory_ajax_names', 'name_directory_names');
add_action('wp_ajax_name_directory_switch_name_published_status', 'name_directory_ajax_switch_name_published_status');


/**
 * Add a menu entry on options
 */
function name_directory_register_menu_entry()
{
    add_menu_page(
        __('Glossary', 'myl-glossary'),
        __('Glossary', 'myl-glossary'),
        'manage_options',
        'myl-glossary',
        'name_directory_options',
        'dashicons-index-card',
        22);

    add_submenu_page(
        'myl-glossary',
        __('Add Glossary', 'myl-glossary'),
        __('Add Glossary', 'myl-glossary'),
        'manage_options',
        'admin.php?page=myl-glossary&sub=new-directory');
}


/**
 * This is a little router for the
 * myl-glossary plugin
 */
function name_directory_options()
{
    if (!current_user_can('manage_options'))
    {
        wp_die( __('You do not have sufficient permissions to access this page.', 'myl-glossary') );
    }

    $sub_page = '';
    if(! empty($_GET['sub']))
    {
        $sub_page = $_GET['sub'];
    }
    switch($sub_page)
    {
        case 'manage-directory':
            name_directory_names();
            break;
        case 'edit-directory':
            name_directory_edit();
            break;
        case 'new-directory':
            name_directory_edit('new');
            break;
        case 'import':
            name_directory_import();
            break;
        case 'export':
            name_directory_export();
            break;
        default:
            name_directory_show_list();
            break;
    }

}


/**
 * Show the list of directories and all of the
 * links to manage the directories
 */
function name_directory_show_list()
{
    global $wpdb;
    global $name_directory_table_directory;
    global $name_directory_table_directory_name;

    if(! empty($_GET['delete_dir']) && is_numeric($_GET['delete_dir']))
    {
        $name = $wpdb->get_var(sprintf("SELECT `name` FROM %s WHERE id=%d", $name_directory_table_directory, $_GET['delete_dir']));
        $wpdb->delete($name_directory_table_directory, array('id' => $_GET['delete_dir']), array('%d'));
        $wpdb->delete($name_directory_table_directory_name, array('directory' => $_GET['delete_dir']), array('%d'));
        echo "<div class='updated'><p><strong>"
            . sprintf(__('Glossary %s and all entries deleted', 'myl-glossary'), "<i>" . $name . "</i>")
            . "</strong></p></div>";
    }

    $wp_file = admin_url('admin.php');
    $wp_page = $_GET['page'];
    $wp_url_path = sprintf("%s?page=%s", $wp_file, $wp_page);
    $wp_new_url = sprintf("%s&sub=%s", $wp_url_path, 'new-directory');


    echo '<div class="wrap">';
    echo "<h2>"
        . __('Glossary management', 'myl-glossary')
        . " <a href='" . $wp_new_url . "' class='add-new-h2'>" . __('Add Glossary', 'myl-glossary') . "</a>"
        . "</h2>";

    if(! empty($_POST['mode']) && ! empty($_POST['dir_id']))
    {
        $wpdb->update(
            $name_directory_table_directory,
            array(
                'name'                    => $_POST['name'],
                'description'             => $_POST['description'],
                'show_title'              => $_POST['show_title'],
                'show_description'        => $_POST['show_description'],
                'show_submit_form'        => $_POST['show_submit_form'],
                'show_search_form'        => $_POST['show_search_form'],
                'show_submitter_name'     => $_POST['show_submitter_name'],
                'show_line_between_names' => $_POST['show_line_between_names'],
                'show_all_names_on_index' => $_POST['show_all_names_on_index'],
                'show_all_index_letters'  => $_POST['show_all_index_letters'],
                'jump_to_search_results'  => $_POST['jump_to_search_results'],
                'nr_columns'              => $_POST['nr_columns'],
                'nr_most_recent'          => intval($_POST['nr_most_recent']),
                'nr_words_description'    => intval($_POST['nr_words_description']),
            ),
            array('id' => intval($_POST['dir_id']))
        );

        echo "<div class='updated'><p>"
            . sprintf(__('Glossary %s updated.', 'myl-glossary'), "<i>" . esc_sql($_POST['name']) . "</i>")
            . "</p></div>";

        unset($_GET['dir_id']);
    }
    elseif(! empty($_POST['mode']) && $_POST['mode'] == "new")
    {
        $wpdb->insert(
            $name_directory_table_directory,
            array(
                'name'                    => $_POST['name'],
                'description'             => $_POST['description'],
                'show_title'              => $_POST['show_title'],
                'show_description'        => $_POST['show_description'],
                'show_submit_form'        => $_POST['show_submit_form'],
                'show_search_form'        => $_POST['show_search_form'],
                'show_submitter_name'     => $_POST['show_submitter_name'],
                'show_line_between_names' => $_POST['show_line_between_names'],
                'show_all_names_on_index' => $_POST['show_all_names_on_index'],
                'show_all_index_letters'  => $_POST['show_all_index_letters'],
                'jump_to_search_results'  => $_POST['jump_to_search_results'],
                'nr_columns'              => $_POST['nr_columns'],
                'nr_most_recent'          => $_POST['nr_most_recent'],
                'nr_words_description'     => $_POST['nr_words_description'],
            ),
            array('%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%d', '%d', '%d')
        );

        echo "<div class='updated'><p>"
            . sprintf(__('Glossary %s created.', 'myl-glossary'), "<em>" . esc_sql($_POST['name']) . "</em>")
            . "</p></div>";
    }

    $directories = $wpdb->get_results("SELECT * FROM $name_directory_table_directory");
    $num_directories = $wpdb->num_rows;
    $plural = ($num_directories==1)?__('name directory', 'myl-glossary'):__('name directories', 'myl-glossary');

    echo "<p>"
        . sprintf(__('You currently have %d %s.', 'myl-glossary'), $num_directories, $plural)
        . "</p>";
    ?>

    <table class="wp-list-table widefat fixed myl-glossary" cellspacing="0">
        <thead><?php name_directory_render_admin_overview_table_headerfooter(); ?></thead>

        <tbody>
            <?php
            foreach ( $directories as $directory )
            {
                $entries = $wpdb->get_var(sprintf("SELECT COUNT(`id`) FROM %s WHERE directory=%d", $name_directory_table_directory_name, $directory->id));
                $unpublished = $wpdb->get_var(sprintf("SELECT COUNT(`id`) FROM %s WHERE directory=%d AND `published` = 0", $name_directory_table_directory_name, $directory->id));
                echo sprintf("
                <tr class='type-page status-publish hentry alternate iedit author-self' valign='top'>
                    <th scope='col'>&nbsp;</th>
                    <td class='post-title page-title column-title' style='padding-left: 0;'>
                        <strong><a class='row-title' href='" . $wp_url_path . "&sub=manage-directory&dir=%d' title='%s'>%s</a>
                        <span style='font-weight: normal;'>&nbsp;%s</span></strong>
                        <div class='locked-info'>&nbsp;</div>
                        <div class='row-actions'>
                               <span class='manage'><a href='" . $wp_url_path . "&sub=manage-directory&dir=%d' title='%s'>%s</a>
                             | </span><span><a href='" . $wp_url_path . "&sub=manage-directory&dir=%d#anchor_add_name' title='%s'>%s</a>
                             | </span><span><a href='" . $wp_url_path . "&sub=edit-directory&dir=%d' title='%s'>%s</a>
                             | </span><span><a href='" . $wp_url_path . "&sub=import&dir=%d' title='%s'>%s</a>
                             | </span><span><a href='" . $wp_url_path . "&sub=export&dir=%d' title='%s'>%s</a>
                             | </span><span class='view'><a class='toggle-info' data-id='%s' href='" . $wp_url_path . "&sub=manage-directory&dir=%d#shortcode' title='%s'>%s</a></span>
                             | </span><span class='trash'><a class='namedirectory_confirmdelete submitdelete' href='" . $wp_url_path . "&delete_dir=%d' title=%s'>%s</a>
                        </div>
                    </td>
                    <td>
                        &nbsp; <strong title='%s'>%d</strong>
                        <br /><br />&nbsp;
                    </td>
                    <td>%d</td>
                    <td>%d</td>
                    </tr>",

                    $directory->id, $directory->name, $directory->name,
                    substr($directory->description, 0, 70),
                    $directory->id, __('Add, edit and remove terms', 'myl-glossary'), __('Manage terms', 'myl-glossary'),
                    $directory->id, __('Go to the add-name-form on the Manage page', 'myl-glossary'), __('Add term', 'myl-glossary'),
                    $directory->id, __('Edit name, description and appearance settings', 'myl-glossary'), __('Settings', 'myl-glossary'),
                    $directory->id, __('Import entries for this Glossary by uploading a .csv file', 'myl-glossary'), __('Import', 'myl-glossary'),
                    $directory->id, __('Download the contents of this Glossary as a .csv file', 'myl-glossary'), __('Export', 'myl-glossary'),
                    $directory->id, $directory->id, __('Show the copy-paste shortcode for this Glossary', 'myl-glossary'), __('Shortcode', 'myl-glossary'),
                    $directory->id, __('Permanently remove this Glossary', 'myl-glossary'), __('Delete', 'myl-glossary'),

                    __('Number of terms in this directory', 'myl-glossary'),
                    $entries,
                    ($entries - $unpublished),
                    $unpublished
                    );
                    echo sprintf("
                    <tr id='embed_code_%s' style='display: none;'>
                        <td>&nbsp;</td>
                        <td align='right'>%s</td>
                        <td colspan='5'>
                            <input value='[namedirectory dir=\"%s\"]' type='text' size='25' id='title'
                                style='text-align: center; padding: 8px 5px;' />
                        </td>
                    </tr>
                    <tr style='display: none;'><td colspan='7'>&nbsp;</td></tr>",
                    $directory->id,
                    __('To show your Glossary on your website, use the shortcode on the right.', 'myl-glossary') . '<br />' .
                    __('Copy the code and paste it in a post or in a page.', 'myl-glossary') . '<br /><small>' .
                    __('If you want to start with a specific character, like "J", use [namedirectory dir="X" start_with="j"].', 'myl-glossary') . '</small>',
                    $directory->id);
            }
            ?>
        </tbody>

        <tfoot><?php name_directory_render_admin_overview_table_headerfooter(); ?></tfoot>
    </table>

    <script type='text/javascript'>
        jQuery(document).ready(function()
        {
            jQuery('.toggle-info').on('click', function(event)
            {
                event.preventDefault();
                var toggle_id = jQuery(this).attr('data-id');
                jQuery('#embed_code_' + toggle_id).toggle();
                return false;
            });

            jQuery('.namedirectory_confirmdelete').click(function(){
                delete_directory = confirm('<?php echo __('Are you sure you want to delete this Glossary?', 'myl-glossary') ?>');
                if(delete_directory == false)
                {
                    return false;
                }
            });

        });
    </script>
<?php
}


/**
 * A double purpose function for editing a myl-glossary and
 * creating a new directory.
 * @param string $mode
 */
function name_directory_edit($mode = 'edit')
{
    if (!current_user_can('manage_options'))
    {
        wp_die( __('You do not have sufficient permissions to access this page.', 'myl-glossary') );
    }

    global $wpdb;
    global $name_directory_table_directory;

    $wp_file = admin_url('admin.php');
    $wp_page = $_GET['page'];
    $wp_sub  = $_GET['sub'];
    $overview_url = sprintf("%s?page=%s", $wp_file, $wp_page, $wp_sub);
    $wp_url_path = sprintf("%s?page=%s", $wp_file, $wp_page);

    $directory_id = 0;
    if(! empty($_GET['dir']))
    {
        $directory_id = intval($_GET['dir']);
    }
    $directory = $wpdb->get_row("SELECT * FROM " . $name_directory_table_directory . " WHERE `id` = " . $directory_id, ARRAY_A);

    echo '<div class="wrap">';
    if($mode == "new")
    {
        $table_heading  = __('Create new Glossary', 'myl-glossary');
        $button_text    = __('Create', 'myl-glossary');
        echo "<h2>" . __('Create new Glossary', 'myl-glossary') . "</h2>";
        echo "<p>" . __('Complete the form below to create a new Glossary.', 'myl-glossary');
    }
    else
    {
        $table_heading  = __('Edit this Glossary', 'myl-glossary');
        $button_text    = __('Save Changes', 'myl-glossary');
        echo "<h2>" . __('Edit Glossary', 'myl-glossary') . "</h2>";
        echo "<p>"
            . sprintf(__('You are editing the term, description and settings of Glossary %s', 'myl-glossary'),
                $directory['name']);
    }
    echo " <a style='float: right;' href='" . $overview_url . "'>" . __('Back to the Glossary overview', 'myl-glossary') . "</a></p>";
    ?>

    <form name="add_name" method="post" action="<?php echo $wp_url_path; ?>">
        <table class="wp-list-table widefat" cellpadding="0">
            <thead>
            <tr>
                <th colspan="2">
                    <?php echo $table_heading; ?>
                    <input type="hidden" name="dir_id" value="<?php echo $directory_id; ?>">
                    <input type="hidden" name="mode" value="<?php echo $mode; ?>">
                </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td width="29%"><?php echo __('Title', 'myl-glossary'); ?></td>
                <td width="70%"><input type="text" name="name" value="<?php echo $directory['name']; ?>" size="20" style="width: 100%;"></td>
            </tr>
            <tr>
                <td><?php echo __('Description', 'myl-glossary'); ?></td>
                <td><textarea name="description" rows="5" style="width: 100%;"><?php echo $directory['description']; ?></textarea></td>
            </tr>

            <?php
            $dir_boolean_settings = array(
                'show_title' => array(
                    'friendly_name' => __('Show title', 'myl-glossary'),
                    'description' => false,
                ),
                'show_description' => array(
                    'friendly_name' => __('Show description', 'myl-glossary'),
                    'description' => false,
                ),
                'show_submit_form' => array(
                    'friendly_name' => __('Submit form', 'myl-glossary'),
                    'description' => __('Visitors can submit suggestions', 'myl-glossary'),
                ),
                'show_submitter_name' => array(
                    'friendly_name' => __('Submitter name', 'myl-glossary'),
                    'description' => __('Show the name of the submitter', 'myl-glossary'),
                ),
                'show_search_form' => array(
                    'friendly_name' => __('Show search form', 'myl-glossary'),
                    'description' => false,
                ),
                'show_line_between_names' => array(
                    'friendly_name' => __('Show line between names', 'myl-glossary'),
                    'description' => false,
                ),
                'show_all_names_on_index' => array(
                    'friendly_name' => __('Show all names by default', 'myl-glossary'),
                    'description' => __('If no, user HAS to use the index before entries are shown', 'myl-glossary'),
                ),
                'show_all_index_letters' => array(
                    'friendly_name' => __('Show all letters on index', 'myl-glossary'),
                    'description' => __('If no, just A B D E are shown if there are no entries starting with C', 'myl-glossary'),
                ),
                'jump_to_search_results' => array(
                    'friendly_name' => __('Jump to Glossary when searching', 'myl-glossary'),
                    'description' => __('On the front-end, jump to the Glossary search box. Particularly useful if you have Glossary on a long page or onepage websites', 'myl-glossary'),
                ),
            );

            $dir_options_settings = array(
                'nr_most_recent' => array(
                    'friendly_name' => __('Show most recent terms', 'myl-glossary'),
                    'description' => __('If No, frontend will not show \'Latest\' option.', 'myl-glossary'),
                    'options' => array(0 => __('No', 'myl-glossary'), 3 => 3, 5 => 5, 10 => 10, 25 => 25, 50 => 50, 100 => 100)
                ),
                'nr_words_description' => array(
                    'friendly_name' => __('Limit amount of words in description', 'myl-glossary'),
                    'description' => __('Display a "read-more" link on the website if the description exceeds X characters.', 'myl-glossary'),
                    'options' => array(0 => __('No', 'myl-glossary'), 10 => 10, 20 => 20, 25 => 25, 50 => 50, 100 => 100)
                ),
                'nr_columns' => array(
                    'friendly_name' => __('Number of columns', 'myl-glossary'),
                    'description' => __('The number of (vertical) columns to display the names in', 'myl-glossary'),
                    'options' => array(1 => 1, 2 => 2, 3 => 3, 4 => 4)
                ),
            );


            foreach($dir_boolean_settings as $setting_name => $setting_props)
            {
                name_directory_render_admin_setting_boolean($directory, $setting_name, $setting_props['friendly_name'], $setting_props['description']);
            }

            foreach($dir_options_settings as $setting_name => $setting_props)
            {
                name_directory_render_admin_setting_options($directory, $setting_name, $setting_props['friendly_name'], $setting_props['description'], $setting_props['options']);
            }
            ?>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" name="submit" class="button button-primary button-large"
                           value="<?php echo $button_text; ?>" />

                    <a class='button button-large' href='<?php echo $overview_url; ?>'>
                        <?php echo __('Cancel', 'myl-glossary'); ?>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
    </form>

<?php

}


/**
 * Handle the names in the name directory
 *  - Display all names
 *  - Edit names (ajax and 'oldskool' view)
 *  - Create new names
 */
function name_directory_names()
{
    if (!current_user_can('manage_options'))
    {
        wp_die( __('You do not have sufficient permissions to access this page.', 'myl-glossary') );
    }

    global $wpdb;
    global $name_directory_table_directory;
    global $name_directory_table_directory_name;

    if(! empty($_GET['delete_name']) && is_numeric($_GET['delete_name']))
    {
        $name = $wpdb->get_var(sprintf("SELECT `name` FROM %s WHERE id=%d", $name_directory_table_directory_name, $_GET['delete_name']));
        $wpdb->delete($name_directory_table_directory_name, array('id' => $_GET['delete_name']), array('%d'));
        echo "<div class='updated'><p>"
            . sprintf(__('Term %s deleted', 'myl-glossary'), "<em>" . $name . "</em>")
            . "</p></div>";
    }
    else if(! empty($_POST['name_id']))
    {
        $wpdb->update(
            $name_directory_table_directory_name,
            array(
                'name'          => stripslashes_deep($_POST['name']),
                'letter'        => name_directory_get_first_char($_POST['name']),
                'description'   => stripslashes_deep($_POST['description']),
                'published'     => $_POST['published'],
                'submitted_by'  => $_POST['submitted_by'],
            ),
            array('id' => intval($_POST['name_id']))
        );

        if($_POST['action'] == "name_directory_ajax_names")
        {
            echo '<p>';
            echo sprintf(__('Term %s updated', 'myl-glossary'), "<em>" . esc_sql($_POST['name']) . "</em>");
            echo '. <small><em>' . __('Will be visible when the page is refreshed.', 'myl-glossary') . '</em> ';
            echo ' <a href="">' . __('Refresh now', 'myl-glossary') . '</a></small>';
            echo '</p>';
            exit;
        }

        echo "<div class='updated'><p>"
            . sprintf(__('Term %s updated', 'myl-glossary'), "<em>" . esc_sql($_POST['name']) . "</em>")
            . "</p></div>";

        unset($_GET['edit_name']);
    }
    else if(! empty($_POST['name']))
    {
        $name_exists = name_directory_name_exists_in_directory($_POST['name'], $_POST['directory']);
        if($name_exists && $_POST['action'] == "name_directory_ajax_names")
        {
            echo '<p>';
            echo sprintf(__('Term %s was already on the list, so it was not added', 'myl-glossary'),
                                '<em>' . esc_sql($_POST['name']) . '</em>');
            echo '</p>';
            exit;
        }

        $wpdb->insert(
            $name_directory_table_directory_name,
            array(
                'directory'     => $_POST['directory'],
                'name'          => stripslashes_deep($_POST['name']),
                'letter'        => name_directory_get_first_char($_POST['name']),
                'description'   => stripslashes_deep($_POST['description']),
                'published'     => $_POST['published'],
                'submitted_by'  => $_POST['submitted_by'],
            ),
            array('%d', '%s', '%s', '%s', '%d', '%s')
        );

        if($_POST['action'] == "name_directory_ajax_names")
        {
            echo '<p>';
            printf(__('New term %s added', 'myl-glossary'), '<i>' . esc_sql($_POST['name']) . '</i> ');
            echo '. <small><em>' . __('Will be visible when the page is refreshed.', 'myl-glossary') . '</em> ';
            echo ' <a href="">' . __('Refresh now', 'myl-glossary') . '</a></small>';
            echo '</p>';
            exit;
        }

        echo "<div class='updated'><p><strong>"
            . sprintf(__('New term %s added', 'myl-glossary'), "<em>" . esc_sql($_POST['name']) . "</em> ")
            . "</strong></p></div>";
    }
    else if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST['action'] == "name_directory_ajax_names")
        {
            echo '<p>' . __('Please fill in at least a name', 'myl-glossary') . '</p>';
            exit;
        }

        echo "<div class='error'><p><strong>"
            . __('Please fill in at least a name', 'myl-glossary')
            . "</strong></p></div>";
    }

    $directory_id = intval($_GET['dir']);

    $wp_file = admin_url('admin.php');
    $wp_page = $_GET['page'];
    $wp_sub  = $_GET['sub'];
    $overview_url = sprintf("%s?page=%s", $wp_file, $wp_page);
    $wp_url_path = sprintf("%s?page=%s&sub=%s&dir=%d", $wp_file, $wp_page, $wp_sub, $directory_id);

    $published_status = '0,1';
    $emphasis_class = 's_all';
    if(! empty($_GET['status']) && $_GET['status'] == 'published')
    {
        $published_status = '1';
        $emphasis_class = 's_published';
    }
    else if(! empty($_GET['status']) && $_GET['status'] == 'unpublished')
    {
        $published_status = '0';
        $emphasis_class = 's_unpublished';
    }

    $directory = $wpdb->get_row("SELECT * FROM " . $name_directory_table_directory . " WHERE `id` = " . $directory_id, ARRAY_A);
    $names = $wpdb->get_results(sprintf("SELECT * FROM %s WHERE `directory` = %d AND `published` IN (%s) ORDER BY `name` ASC",
        $name_directory_table_directory_name, $directory_id, $published_status));

    echo '<div class="wrap">';
    echo "<h2>" . sprintf(__('Manage terms for %s', 'myl-glossary'), $directory['name']) . "</h2>";
    ?>

    <p>
        View:
        <a class='s_all' href='<?php echo $wp_url_path; ?>&status=all'><?php _e('all', 'myl-glossary'); ?></a> |
        <a class='s_published' href='<?php echo $wp_url_path; ?>&status=published'><?php _e('published', 'myl-glossary'); ?></a> |
        <a class='s_unpublished' href='<?php echo $wp_url_path; ?>&status=unpublished'><?php _e('unpublished', 'myl-glossary'); ?></a>

        <span style='float: right';>
            <a href='<?php echo $overview_url; ?>'><?php _e('Back to the glossary overview', 'myl-glossary'); ?></a>
        </span>
    </p>

    <table class="wp-list-table widefat name_directory_names fixed" cellpadding="0">
        <thead>
        <tr>
            <th width="18%"><?php echo __('Name', 'myl-glossary'); ?></th>
            <th width="54%"><?php echo __('Description', 'myl-glossary'); ?></th>
            <th width="12%"><?php echo __('Submitter', 'myl-glossary'); ?></th>
            <th width="9%"><?php echo __('Published', 'myl-glossary'); ?></th>
            <th width="15%"><?php echo __('Manage', 'myl-glossary'); ?></th>
        </tr>
        </thead>
        <tbody>
        <?php
        if(empty($names))
        {
            echo sprintf("<tr class='empty-directory'><td colspan='5'>%s</td></tr>",
                __('Currently, there are no terms in this glossary..', 'myl-glossary'));
        }
        foreach($names as $name)
        {
            echo sprintf("
                <tr>
                    <td>%s</td><td>%s</td><td>%s</td><td><span title='%s' class='toggle_published' id='nid_%d' data-nameid='%d'>%s</span></td>
                    <td><a class='button button-primary button-small' href='" . $wp_url_path . "&edit_name=%d#anchor_add_form'>%s</a>
                        <a class='button button-small' href='" . $wp_url_path . "&delete_name=%d'>%s</a>
                    </td>
                </tr>",
                $name->name, html_entity_decode(stripslashes($name->description)), $name->submitted_by,
                __('Toggle published status', 'myl-glossary'), $name->id,
                $name->id, name_directory_yesno($name->published),
                $name->id, __('Edit', 'myl-glossary'),
                $name->id, __('Delete', 'myl-glossary'));
        }
        ?>
        </tbody>
    </table>

    <p>&nbsp;</p>

    <?php
    if(! empty($_GET['edit_name']))
    {
        $name = $wpdb->get_row(sprintf("SELECT * FROM `%s` WHERE `id` = %d",
            $name_directory_table_directory_name, $_GET['edit_name']), ARRAY_A);
        $table_heading = __('Edit a term', 'myl-glossary');
        $save_button_txt = __('Save term', 'myl-glossary');
    }
    else
    {
        $table_heading = __('Add a new term', 'myl-glossary');
        $save_button_txt = __('Add term', 'myl-glossary');
        $name = array('name' => null, 'description' => null, 'submitted_by' => null);
    }

    ?>
    <span style='float: right';>
        <a href='<?php echo $overview_url; ?>'><?php _e('Back to the glossary overview', 'myl-glossary'); ?></a>
    </span>

    <p>&nbsp;</p>

    <div class="hidden" id="add_result"></div>

    <a name="anchor_add_form"></a>
    <form name="add_name" id="add_name_ajax" method="post" action="<?php echo $wp_url_path; ?>">
    <table class="wp-list-table widefat" cellpadding="0">
        <thead>
            <tr>
                <th width="18%"><?php echo $table_heading; ?>
                    <input type="hidden" name="directory" value="<?php echo $directory_id; ?>">
                    <?php
                    if(! empty($_GET['edit_name']))
                    {
                        echo '<input type="hidden" name="name_id" id="edit_name_id" value="' . intval($_GET['edit_name']) . '">';
                    }
                    ?>
                    <input type="hidden" name="action" value="0" id="add_form_ajax_submit" />
                </th>
                <th align="right">

                    <label id="input_compact" title="<?php echo __('Show the compact form, showing only the term, always published)', 'myl-glossary'); ?>">
                        <input type="radio" name="input_mode" />
                        <?php echo __('Quick add view', 'myl-glossary'); ?>
                    </label>
                    <label id="input_extensive" title="<?php echo __('Show the full form, which allows you to enter a description and submitter', 'myl-glossary'); ?>">
                        <input type="radio" name="input_mode" />
                        <?php echo __('Full add view', 'myl-glossary'); ?>
                    </label>

                </th>
            </tr>
        </thead>
        <tbody>
            <tr id="add_name">
                <td width="18%"><?php echo __('Term', 'myl-glossary'); ?></td>
                <td width="82%"><input type="text" name="name" value="<?php echo $name['name']; ?>" size="20" style="width: 100%;"></td>
            </tr>
            <tr id="add_description">
                <td><?php echo __('Description', 'myl-glossary'); ?></td>
                <td><textarea name="description" rows="5" style="width: 100%;"><?php echo stripslashes($name['description']); ?></textarea>
                    <small><strong><?php echo __('Please be careful!', 'myl-glossary'); ?></strong>
                        <?php echo __('HTML markup is allowed and will we printed on your website and in the WordPress admin.', 'myl-glossary'); ?></small></td>
            </tr>
            <tr id="add_published">
                <td><?php echo __('Published', 'myl-glossary'); ?></td>
                <td>
                    <input type="radio" name="published" id="published_yes" value="1" checked="checked">
                    <label for="published_yes"><?php echo __('Yes', 'myl-glossary') ?></label>

                    <input type="radio" name="published" id="published_no" value="0"
                        <?php
                        if(isset($name['published']) && empty($name['published']))
                        {
                            echo 'checked="checked"';
                        }?>>
                    <label for="published_no"><?php echo __('No', 'myl-glossary') ?></label>
                </td>
            </tr>
            <tr id="add_submitter">
                <td><?php echo __('Submitted by', 'myl-glossary'); ?></td>
                <td><input type="text" name="submitted_by" value="<?php echo $name['submitted_by']; ?>" size="20" style="width: 100%;"></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" id="add_button" name="Submit" class="button button-primary button-large"
                           value="<?php echo $save_button_txt; ?>" />
                </td>
            </tr>
        </tbody>
    </table>
    </form>

    <?php
    name_directory_print_javascript($emphasis_class);
    name_directory_print_style();
}

/**
 * Import names from a csv file into directory
 */
function name_directory_import()
{
    if (!current_user_can('manage_options'))
    {
        wp_die( __('You do not have sufficient permissions to access this page.', 'myl-glossary') );
    }

    global $wpdb;
    global $name_directory_table_directory;
    global $name_directory_table_directory_name;

    $directory_id = intval($_GET['dir']);
    $import_success = false;

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $file = wp_import_handle_upload();

        if( isset($file['error']))
        {
            echo $file['error'];
            return;
        }

        $csv = array_map('str_getcsv', file($file['file']));

        wp_import_cleanup($file['id']);
        array_shift($csv);

        $names_error = 0;
        $names_imported = 0;
        $names_duplicate = 0;
        foreach($csv as $entry)
        {
            if(! $prepared_row = name_directory_prepared_import_row($entry))
            {
                continue;
            }

            if(name_directory_name_exists_in_directory($prepared_row['name'], $directory_id))
            {
                $names_duplicate++;
                continue;
            }

            $db_res = $wpdb->insert(
                $name_directory_table_directory_name,
                array(
                    'directory'     => $directory_id,
                    'name'          => stripslashes_deep($prepared_row['name']),
                    'letter'        => name_directory_get_first_char($prepared_row['name']),
                    'description'   => stripslashes_deep($prepared_row['description']),
                    'published'     => $prepared_row['published'],
                    'submitted_by'  => !empty($prepared_row['submitted_by']) ? $prepared_row['submitted_by'] : '',
                ),
                array('%d', '%s', '%s', '%s', '%d', '%s')
            );

            if($db_res === false)
            {
                $names_error++;
            }
            else
            {
                $names_imported++;
            }
        }

        $notice_class = 'updated';
        $import_success = true;
        $import_message = sprintf(__('Imported %d entries in this glossary', 'myl-glossary'), $names_imported);

        if($names_imported === 0)
        {
            $notice_class = 'error';
            $import_success = false;
            $import_message = __('Could not import any names into Glossary', 'myl-glossary');
        }

        if($names_error > 0)
        {
            $notice_class = 'error';
            $import_success = false;
            if($names_imported === 0)
            {
                $import_message .= "! ";
            }
            $import_message .= sprintf(__('There were %d terms that produces errors with the WordPress database on import', 'myl-glossary'), $names_error);
        }

        if($names_duplicate > 0)
        {
            $ignored = (count($csv)==$names_duplicate)?__('all', 'myl-glossary'):$names_duplicate;
            echo '<div class="error" style="border-left: 4px solid #ffba00;"><p>'
                . sprintf(__('Ignored %s terms, because they were duplicate (already in the glossary)', 'myl-glossary'), $ignored)
                . '</p></div>';
        }
        elseif($names_imported === 0)
        {
            $import_message .= ', ' . __('please check your .csv-file', 'myl-glossary');
        }

        echo '<div class="' . $notice_class . '"><p>' . $import_message . '</p></div>';
    }

    $wp_file = admin_url('admin.php');
    $wp_page = $_GET['page'];
    $wp_sub  = $_GET['sub'];
    $overview_url = sprintf("%s?page=%s", $wp_file, $wp_page);
    $wp_url_path = sprintf("%s?page=%s&sub=%s&dir=%d", $wp_file, $wp_page, $wp_sub, $directory_id);
    $wp_ndir_path = sprintf("%s?page=%s&sub=%s&dir=%d", $wp_file, $wp_page, 'manage-directory', $directory_id);

    $directory = $wpdb->get_row("SELECT * FROM " . $name_directory_table_directory . " WHERE `id` = " . $directory_id, ARRAY_A);

    echo '<div class="wrap">';
    echo '<h2>' . sprintf(__('Import terms for %s', 'myl-glossary'), $directory['name']) . '</h2>';
    echo '<div class="narrow"><p>';
    if(! $import_success && empty($names_duplicate))
    {
        echo __('Use the upload form below to upload a .csv-file containing all of your terms (in the first column), description and submitter are optional.', 'myl-glossary') . ' ';
        echo '<h4>' . __('If you saved it from Excel or OpenOffice, please ensure that:', 'myl-glossary') . '</h4> ';
        echo '<ol><li>' . __('There is a header row (this contains the column names, the first row will NOT be imported)', 'myl-glossary');
        echo '</li><li>' . __('Fields are encapsulated by double quotes', 'myl-glossary');
        echo '</li><li>' . __('Fields are comma-separated', 'myl-glossary');
        echo '</li></ol>';
        echo '<h4>' . __('If uploading or importing fails, these are your options', 'myl-glossary') . ':</h4><ol><li>';
        echo sprintf(__('Please check out %s first and ensure your file is formatted the same.', 'myl-glossary'),
                '<a href="http://plugins.svn.wordpress.org/myl-glossary/assets/myl-glossary-import-example.csv" target="_blank">' .
                __('the example import file', 'myl-glossary') . '</a>') . '</li>';
        echo '<li>
                <a href="https://wiki.openoffice.org/wiki/Documentation/OOo3_User_Guides/Calc_Guide/Saving_spreadsheets#Saving_as_a_CSV_file">OpenOffice csv-export help</a>
              </li>
              <li>
                <a href="https://support.office.com/en-us/article/Import-or-export-text-txt-or-csv-files-e8ab9ff3-be8d-43f1-9d52-b5e8a008ba5c?CorrelationId=fa46399d-2d7a-40bd-b0a5-27b99e96cf68&ui=en-US&rs=en-US&ad=US#bmexport">Excel csv-export help</a>
              </li>
              <li>
                <a href="http://www.freefileconvert.com" target="_blank">' .
                __('Use an online File Convertor', 'myl-glossary') . '</a>
              </li><li>';
        echo sprintf(__('If everything else fails, you can always ask a question at the %s.', 'myl-glossary'),
                '<a href="https://wordpress.org/support/plugin/myl-glossary" target="_blank">' .
                __('plugin support forums', 'myl-glossary') . '</a>') . ' ';
        echo '</li></ol></p>';

        if(! function_exists('str_getcsv'))
        {
            echo '<div class="error"><p>';
            echo __('Glossary Import requires PHP 5.3, you seem to have in older version. Importing terms will not work for your website.', 'myl-glossary');
            echo '</p></div>';
        }

        echo '<h3>' . __('Upload your .csv-file', 'myl-glossary') . '</h3>';
        wp_import_upload_form($wp_url_path);
    }
    echo '</div></div>';
    echo '<a href="' . $wp_ndir_path . '">' . sprintf(__('Back to %s', 'myl-glossary'), '<i>' . $directory['name'] . '</i>') . '</a>';
    echo ' | ';
    echo '<a href="' . $overview_url . '">' . __('Go to Glossary Overview', 'myl-glossary') . '</a>';
}


/**
 * Page to export names from a directory file as a .csv-file
 */
function name_directory_export()
{
    if (!current_user_can('manage_options'))
    {
        wp_die( __('You do not have sufficient permissions to access this page.', 'myl-glossary') );
    }

    global $wpdb;
    global $name_directory_table_directory;

    $directory = $wpdb->get_row("SELECT * FROM " . $name_directory_table_directory . " WHERE `id` = " . intval($_GET['dir']), ARRAY_A);

    $names = name_directory_get_directory_names($directory);

    echo '<table id="export_names" class="hidden"><thead><tr><th>name</th><th>description</th><th>submitter</th></tr></thead><tbody>';
    foreach($names as $entry)
    {
        echo '<tr><td>' . $entry['name'] . '</td><td>' . html_entity_decode(stripslashes($entry['description'])) . '</td><td>' . $entry['submitted_by'] . '</td></tr>';
    }
    echo '</tbody></table>';

    /* Notify the user of possible not-working export functionality */
    if(stripos($_SERVER['HTTP_USER_AGENT'], 'Chrome') === false && stripos($_SERVER['HTTP_USER_AGENT'], 'Firefox') === false)
    {
        echo '<div class="notice notice-warning"><p>';
        echo __('Glossary Export works best in Mozilla Firefox, Google Chrome and Internet Explorer 10+.', 'myl-glossary') . ' ';
        echo __('If you encounter problems (or it does not export) in Internet Explorer or Microsoft Edge, please try another browser.', 'myl-glossary');
        echo '</div>';
    }

    echo '<div class="wrap">';
    echo '<h2>' . sprintf(__('Export directory %s', 'myl-glossary'), $directory['name']) . '</h2>';
    echo '<div class="narrow"><p>';
    echo __('Click the Export button to download a .csv file with the contents of your glossary.', 'myl-glossary');
    echo '</p><p><a href="#" id="export_name_directory_names_button" style="text-decoration:none;color:#000;background-color:#ddd;border:1px solid #ccc;padding:8px;">' . __('Export', 'myl-glossary') . '</a></p>';
    echo '<a href="' . admin_url('admin.php') . '?page=myl-glossary">' . __('Go to Glossary Overview', 'myl-glossary') . '</a>';

    name_directory_print_export_javascript();
}


/**
 * Proxy for the AJAX request to switch published-statusses
 * No params, assumes POST
 */
function name_directory_ajax_switch_name_published_status()
{
    $name_id = intval($_POST['name_id']);
    if(! empty($name_id))
    {
        echo name_directory_switch_name_published_status($name_id);
        exit;
    }

    echo 'Error!';
    exit;
}


/**
 * Print the Style rules by this plugin
 */
function name_directory_print_style()
{
    $style = '

    <style>
    table.name_directory_names td
    {
        border-bottom: 1px solid #F0F0F0;
    }
    .toggle_published:hover {
        cursor: pointer;
    }
    </style>';

    echo $style;
}


/**
 * Print the Javascripts needed by this plugin
 * @param string $emphasis_class
 */
function name_directory_print_javascript($emphasis_class = '')
{
    $js = '

    <script type="text/javascript">
        /* Save a named preference to a cookie */
        function savePreference(name, value)
        {
            var expires = "";
            document.cookie = name+"="+value+expires+"; path=/";
        }

        /* Read the named preference from cookie */
        function readPreference(name)
        {
            var nameEQ = name + "=";
            var ca = document.cookie.split(";");
            for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0)==" ") c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
            }
            return null;
        }

        jQuery(document).ready(function()
        {
            jQuery("#input_compact").on("click", function(e)
            {
                jQuery("#published_yes").attr("checked", "checked");
                jQuery("#add_description, #add_published, #add_submitter").hide();
                savePreference("wp-plugin-nd-add_form", "compact");
            });

            jQuery("#input_extensive").on("click", function(e)
            {
                jQuery("#add_description, #add_published, #add_submitter").show();
                savePreference("wp-plugin-nd-add_form", "extensive");
            });

            var pref = readPreference("wp-plugin-nd-add_form");
            if(pref != null)
            {
                jQuery("#input_" + pref).trigger("click");
                if(! window.location.hash)
                {
                    jQuery("html, body").animate({scrollTop:0}, 1);
                }
            }

            jQuery("#add_form_ajax_submit").val("name_directory_ajax_names");

            jQuery("#add_name_ajax").on("submit", function(e)
            {
                var form_data = jQuery(this).serialize();

                e.preventDefault();

                jQuery("#add_button").attr("disabled", "disabled");

                jQuery.ajax({
                    url: "admin-ajax.php",
                    type: "POST",
                    data: form_data,
                    success: function(data)
                    {
                        jQuery("#add_result").addClass("updated").slideDown().html(data);
                        jQuery("#add_name_ajax input[type=text], #add_name_ajax textarea, #edit_name_id").val("");
                    },
                    error: function(data)
                    {
                        window.location.reload();
                    },
                    complete: function(data)
                    {
                        jQuery("#add_button").removeAttr("disabled");
                    }
                });

                return false;
            });

            jQuery(".toggle_published").on("click", function(e)
            {
                name_id = jQuery(this).attr("data-nameid");
                update_ref = jQuery(this).attr("id");

                jQuery(this).html("<div class=\'spinner\' style=\'display:block;float:left;\'></div>");

                jQuery.ajax({
                    url: "admin-ajax.php",
                    type: "POST",
                    data: { action: "name_directory_switch_name_published_status", name_id: name_id }
                }).done(function(status)
                {
                    jQuery("#" + update_ref).html(status);
                });
            });
        });
    </script>';

    if(! empty($emphasis_class))
    {
        $js .= "<script>jQuery('." . $emphasis_class . "').css('font-weight', 'bold');</script>";
    }

    if(! empty($_GET['edit_name']))
    {
        $js .= "<script>jQuery(document).ready(function(){
                    jQuery('#input_extensive').trigger('click');
                });</script>";
    }

    print $js;
}


/**
 * Print some Javascript which helps on exporting CSV files
 * From: https://jsfiddle.net/mnsinger/65hqxygo/
 * TODO: I really should get around to use .js files :-)
 */
function name_directory_print_export_javascript() {
    echo <<<JS
    <script type="text/javascript">
        function exportTableToCSV(table, filename) {
        
            var rows = table.find('tr:has(td),tr:has(th)');
        
            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character
    
            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\\r\\n"',
    
            // Grab text from table into CSV formatted string
            csv = '"' + rows.map(function (i, row) {
                var row = jQuery(row), cols = row.find('td,th');
    
                return cols.map(function (j, col) {
                    var col = jQuery(col), text = col.text();
                    
                    return text.replace(/"/g, '""'); // escape double quotes
    
                }).get().join(tmpColDelim);
    
            }).get().join(tmpRowDelim).split(tmpRowDelim).join(rowDelim).split(tmpColDelim).join(colDelim) + '"';

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);
    
            if (window.navigator.msSaveBlob) { // IE 10+
                window.navigator.msSaveOrOpenBlob(new Blob([csv], {type: "text/plain;charset=utf-8;"}), "csvname.csv")
            } 
            else {
                jQuery(this).attr({ 'download': filename, 'href': csvData, 'target': '_blank' }); 
            }
        }
    
        jQuery(document).ready(function()
        {
            // This must be an a-element hyperlink, so it can download 'data:'-uri's
            jQuery("#export_name_directory_names_button").on('click', function (event)
            {
                exportTableToCSV.apply(this, [jQuery('#export_names'), 'name_directory_export.csv']);
            });
        });
    </script>
JS;

}
