<?php
add_action('wp_enqueue_scripts', 'name_directory_add_stylesheet');

/**
 * Add the CSS file to output
 */
function name_directory_add_stylesheet()
{
    wp_register_style('myl-glossary-style', plugins_url('name_directory.css', __FILE__));
    wp_enqueue_style('myl-glossary-style');
}

/**
 * Show and handle the submission form
 * @param $directory
 * @param $overview_url
 * @return string
 */
function name_directory_show_submit_form($directory, $overview_url)
{
    global $wpdb;
    global $name_directory_table_directory_name;

    $name = __('Name', 'myl-glossary');
    $required = __('Required', 'myl-glossary');
    $description = __('Description', 'myl-glossary');
    $your_name = __('Your name', 'myl-glossary');
    $submit = __('Submit', 'myl-glossary');
    $back_txt = __('Back to name directory', 'myl-glossary');

    $result_class = '';
    $form_result = null;

    if(! empty($_POST['name_directory_name']))
    {
        $wpdb->get_results(
            sprintf("SELECT `id` FROM `%s` WHERE `name` = '%s'",
            $name_directory_table_directory_name,
            esc_sql($_POST['name_directory_name']))
        );

        if($wpdb->num_rows == 1)
        {
            $result_class = 'form-result-error';
            $form_result = sprintf(__('Sorry, %s was already on the list so your submission was not sent.', 'myl-glossary'),
                '<em>' . esc_sql($_POST['name_directory_name']) . '</em>');
        }
        else
        {
            $db_success = $wpdb->insert(
                $name_directory_table_directory_name,
                array(
                    'directory'     => intval($directory),
                    'name'          => esc_sql($_POST['name_directory_name']),
                    'letter'        => name_directory_get_first_char($_POST['name_directory_name']),
                    'description'   => esc_sql($_POST['name_directory_description']),
                    'published'     => 0,
                    'submitted_by'  => esc_sql($_POST['name_directory_submitter']),
                ),
                array('%d', '%s', '%s', '%s', '%d', '%s')
            );

            if(! empty($db_success))
            {
                $result_class = 'form-result-success';
                $form_result = __('Thank you for your submission! It will be reviewed shortly.', 'myl-glossary');

                name_directory_notify_admin_of_new_submission($directory, $_POST);
            }
            else
            {
                $result_class = 'form-result-error';
                $form_result = __('Something must have gone terribly wrong. Would you please try it again?', 'myl-glossary');
            }
        }
    }
    else if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $result_class = 'form-result-error';
        $form_result = __('Please fill in at least a name', 'myl-glossary');;
    }

    $form = <<<HTML
        <form method='post' name='name_directory_submit'>

            <div class='myl-glossary-form-result {$result_class}'>{$form_result}</div>

            <p><a href="{$overview_url}">{$back_txt}</a></p>

            <div class='name_directory_forminput'>
                <label for='name_directory_name'>{$name} <small>{$required}</small></label>
                <br />
                <input id='name_directory_name' type='text' name='name_directory_name' />
            </div>

            <div class='name_directory_forminput'>
                <label for='name_directory_description'>{$description}</label>
                <br />
                <textarea id='name_directory_description' name='name_directory_description'></textarea>
            </div>

            <div class='name_directory_forminput'>
                <label for='name_directory_submitter'>{$your_name}</label>
                <br />
                <input id='name_directory_submitter' type='text' name='name_directory_submitter' />
            </div>

            <div class='name_directory_forminput'>
                <br />
                <button type='submit'>{$submit}</button>
            </div>

        </form>
HTML;

    return $form;
}





/**
 * Function that takes care of displaying.. stuff
 * @param $attributes
 * @return mixed
 */
function name_directory_show_directory($attributes)
{
    $dir = null;
    $show_all_link = '';
    $show_latest_link = '';
    extract(shortcode_atts(
        array('dir' => '1'),
        $attributes
    ));

    $name_filter = array();
    if(! empty($_GET['glossary-item']) && $_GET['glossary-item'] == "latest")
    {
        $name_filter['character'] = "latest";
    }
    else if(isset($_GET['glossary-item']))
    {
        $name_filter['character'] = mb_strtoupper(mb_substr($_GET['glossary-item'], 0, 1));
    }
    else if(! empty($attributes['start_with']) && empty($_GET['myl-glossary-search-value']))
    {
        $name_filter['character'] = $attributes['start_with'];
    }

    $str_all = __('All', 'myl-glossary');
    //$str_alls = __('All', 'myl-glossary');
    $str_latest = __('Latest', 'myl-glossary');
    $search_value = '';
    if(! empty($_GET['myl-glossary-search-value']))
    {
        $search_value = htmlspecialchars($_GET['myl-glossary-search-value']);
        $name_filter['containing'] = $search_value;
    }

    $letter_url = name_directory_make_plugin_url('glossary-item', 'myl-glossary-search-value');
    $directory = name_directory_get_directory_properties($dir);
    $names = name_directory_get_directory_names($directory, $name_filter);
    $num_names = count($names);

    if(isset($_GET['show_submitform']))
    {
        return name_directory_show_submit_form($dir, name_directory_make_plugin_url('glossary-item','show_submitform'));
    }

    ob_start();

    // <select class='fancy-select' name="Choose">
    //     <option value="value1">Value 1</option> 
    //     <option value="value2" selected>Value 2</option>
    //     <option value="value3">Value 3</option>
    // </select>

    //echo "<a name='myl_glossary_position'></a>";

    if(! empty($directory['show_title']))
    {
        echo "<h3 class='glossary-list-title'>" . $directory['name'] . "</h3>";
    }

    echo "<a name='myl_glossary_position'></a>";

    echo '<div class="glossary-header">';

    echo '<h4 class="glossary-list-label">Filter By:</h4>';

    if(! empty($directory['show_all_names_on_index']))
    {
        // $show_all_link = '<a class="glossary-search" href="' . $letter_url . '">' . $str_all . '</a> |';
        $show_all_link = '<li><a class="glossary-list--item" href="' . get_permalink() . '">' . $str_all . '</a></li>';
    }

    // if(! empty($directory['show_all_names_on_index']))
    // {
    //     $show_all_link = '<option value="$letter_url">' . $str_all . '</option>';
    // }

    if(! empty($directory['nr_most_recent']))
    {
        $show_latest_link = ' <a class="glossary-list--item" href="' . $letter_url . 'latest">' . $str_latest . '</a> |';
    }

    /* Prepare and print the index-letters */
    echo '<ul class="glossary-list inline-list">';

    //echo '<div class="fancy-select fancy-select-sm">';
    //echo '<select class="" name="Choose">';

    echo $show_all_link;
    echo $show_latest_link;

    $index_letters = range('A', 'Z');
    array_unshift($index_letters, '#');
    $starting_letters = name_directory_get_directory_start_characters($dir);

    /* User does not want to show all the index characters */
    if(empty($directory['show_all_index_letters']))
    {
        $index_letters = $starting_letters;
    }

    foreach($index_letters as $index_letter)
    {
        $extra_classes = '';
        if(! empty($name_filter['character']) && $name_filter['character'] == $index_letter)
        {
            $extra_classes .= ' glossary-list--is-active';
        }

        if(! in_array($index_letter, $starting_letters))
        {
            $extra_classes .= ' myl_glossary_empty';
        }

        //echo ' <a class="name_directory_startswith ' . $extra_classes . '" href="' . $letter_url . urlencode($index_letter) . '">' . strtoupper($index_letter) . '</a> ';

        echo ' <li><a class="glossary-list--item ' . $extra_classes . '" href="' . $letter_url . urlencode($index_letter) . '">' . strtoupper($index_letter) . '</a> </li>';
        //echo ' <option value="' . $letter_url . urlencode($index_letter) . '">' . strtoupper($index_letter) . '</option>';
    }

    echo '</ul>';
    //echo '</select>';
    //echo '</div>';

    if(! empty($directory['show_submit_form']))
    {
        echo " | <a href='" . $letter_url . "&show_submitform=true'>" . __('Submit a name', 'myl-glossary') . "</a>";
    }

    if(! empty($directory['show_search_form']))
    {
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);
        $search_get_url = array();
        if(! empty($parsed_url['query']))
        {

            parse_str($parsed_url['query'], $search_get_url);
        }
        unset($search_get_url['myl-glossary-search-value']);

        //echo "<br />";
        //echo "<form method='get' action='";
        echo "<form class='search-form-general cf' role='search' method='get' action='"; 

        if(! empty($directory['jump_to_search_results']))
        {
            echo "#name_directory_position";
        }
        echo "'>";
        foreach($search_get_url as $key_name=>$value)
        {
            if($key_name == 'glossary-item')
            {
                continue;
            }
            echo "<input type='hidden' name='" . htmlspecialchars($key_name) . "' value='" . htmlspecialchars($value) . "' />";
        }
        // echo "<input type='text' name='myl-glossary-search-value' id='myl-glossary-search-input-box' placeholder='" . __('Search for...', 'myl-glossary') . "' />";
        // echo "<input type='submit' id='myl-glossary-search-input-button' value='" . __('Search', 'myl-glossary') . "' />";
        // echo "</form>";

        echo "<label class='hide-text' for='myl-glossary-search-input-box'>Search Glossary</label>";
        echo "<input class='text-field' type='text' name='myl-glossary-search-value' id='myl-glossary-search-input-box' placeholder='" . __('Search Glossary', 'myl-glossary') . "'>";
        echo "<input class='search-submit ico i-m i--search' type='submit' id='myl-glossary-search-input-button' value='" . __('Search', 'myl-glossary') . "'>";
        echo "</form>";
    }
    echo '</div>';

    //echo '<div class="name_directory_total">';

    echo '<p><em>';

    if(empty($name_filter['character']) && empty($search_value))
    {
        echo sprintf(__('There are currently %d names in this directory', 'myl-glossary'), $num_names);
    }
    else if(empty($name_filter['character']) && ! empty($search_value))
    {
        echo sprintf(__('There are %d names in this directory containing the search term %s.', 'myl-glossary'), $num_names, "<em>" . $search_value . "</em>");
        echo " <a href='" . get_permalink() . "'><small class='small-text'>" . __('Clear results', 'myl-glossary') . "</small></a>.";
    }
    else if($name_filter['character'] == 'latest')
    {
        echo sprintf(__('Showing %d most recent names in this directory', 'myl-glossary'), $num_names);
    }
    else
    {
        echo sprintf(__('There are %d names in this directory beginning with the letter %s.', 'myl-glossary'), $num_names, $name_filter['character']);
    }
    //echo  '</div>';
    echo  '</em></p>';

    echo '<div class="name_directory_names">';
    if($num_names === 0 && empty($search_value))
    {
        echo '<p>' . __('There are no names in this directory at the moment', 'myl-glossary') . '</p>';
    }
    else if(isset($directory['show_all_names_on_index']) && $directory['show_all_names_on_index'] != 1 && empty($name_filter))
    {
        echo '<p>' . __('Please select a letter from the index (above) to see entries', 'myl-glossary') . '</p>';
    }
    else
    {
        $split_at = null;
        if(! empty($directory['nr_columns']) && $directory['nr_columns'] > 1)
        {
            $split_at = round($num_names/$directory['nr_columns'])+1;
        }

        echo '<div class="name_directory_column name_directory_nr' . (int)$directory['nr_columns'] . '">';

        $i = 1;
        $split_i = 1;
        foreach($names as $entry)
        {
            // echo '<div class="name_directory_name_box">';
            // echo '<a name="namedirectory_' . sanitize_html_class($entry['name']) . '"></a>';
            // echo '<strong>' . htmlspecialchars($entry['name']) . '</strong>';

            echo '<article class="item--glosaary" id="namedirectory_' . sanitize_html_class($entry['name']) . '">';
            echo '<h4>' . htmlspecialchars($entry['name']) . '</h4>';

            if(! empty($directory['show_description']) && ! empty($entry['description']))
            {
                $print_description = html_entity_decode(stripslashes($entry['description']));

                /* This toggles the read more/less indicators, these need extra html */
                if(! empty($directory['nr_words_description']))
                {
                    $num_words = intval($directory['nr_words_description']);
                    $short_desc = name_directory_get_words($print_description, $num_words);
                    $print_description = str_replace($short_desc, "", $print_description);
                    if(! empty($print_description))
                    {
                        //echo '<br /><div>
                        echo '<p>
                          <input type="checkbox" class="myl-glossary-readmore-state" id="name-' . htmlspecialchars($entry['id']) . '" />
                          <span class="myl-glossary-readmore-wrap">' . $short_desc . ' <span class="myl-glossary-readmore-target">' . $print_description .'</span></span>
                          <label for="name-' . htmlspecialchars($entry['id']) . '" class="myl-glossary-readmore-trigger"></label>
                        </div>';
                    }
                    else
                    {
                        //echo '<br /><div>' . $short_desc . '</div>';
                        echo '<p>' . $short_desc . '</p>';
                    }

                }
                else {
                    //echo '<br /><div>' . $print_description . '</div>';
                    echo '<p>' . $print_description . '</p>';
                }
            }
			if(! empty($directory['show_submitter_name']) && ! empty($entry['submitted_by']))
			{
				//echo "<small>" . __('Submitted by:', 'myl-glossary') . " " . $entry['submitted_by'] . "</small>";
                echo "<p class=small-text'>" . __('Submitted by:', 'myl-glossary') . " " . $entry['submitted_by'] . "</p>";
			}
            //echo '</div>';
            echo '</article>';

            if(! empty($directory['show_line_between_names']) && $num_names != $i)
            {
                echo '<hr />';
            }

            $split_i++;
            $i++;

            if($split_at == $split_i)
            {
                echo '</div><div class="name_directory_column name_directory_nr' . (int)$directory['nr_columns'] . '">';
                $split_i = 0;
            }
        }
        echo '</div>';
    }
    echo '</div>';

    if(! empty($directory['nr_columns']) && $directory['nr_columns'] > 1)
    {
        echo '<div class="name_directory_column_clear"></div>';
    }

    if(! empty($directory['show_submit_form']))
    {
        //echo "<br /><br /><a href='" . $letter_url . "&show_submitform=true' class='name_directory_submit_bottom_link'>" . __('Submit a name', 'myl-glossary') . "</a>";
        echo "<p><a href='" . $letter_url . "&show_submitform=true' class='name_directory_submit_bottom_link'>" . __('Submit a name', 'myl-glossary') . "</a></p>";
    }

    /** Sad to print it like this, but this is needed for translating the show more/less buttons 
    echo "<style>
        .myl-glossary-readmore-state ~ .myl-glossary-readmore-trigger:before {
            content: '… " . __('Show more', 'myl-glossary') . "';
        }
        
        .myl-glossary-readmore-state:checked ~ .myl-glossary-read-more-trigger:before {
            content: '" . __('Show less', 'myl-glossary') . "';
        }
        </style>";*/

	return ob_get_clean();
}

add_shortcode('namedirectory', 'name_directory_show_directory');
