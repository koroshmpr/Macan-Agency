<?phpadd_action('rest_api_init', 'register_new_search');function register_new_search(){    register_rest_route('search/v1', 'search', array(        'methods' => WP_REST_Server::READABLE,        'callback' => 'GoldSearchResults'    ));}function GoldSearchResults($data) {    $mainQuery = new WP_Query(array(        'post_type' => array('page','post', 'services' , 'portfolio'),        's' => sanitize_text_field($data['term'])    ));    $mainResults = array(        'page' => array(),        'post' => array(),        'services' => array(),        'portfolio' => array()    );    while ($mainQuery->have_posts()) {        $mainQuery->the_post();        $content = get_the_content();        $content = wp_strip_all_tags($content);        $content = wp_trim_words($content, 24, '...'); // limit content to 24 words        if (get_post_type() == 'post') {            $mainResults['post'][] = array(                'title' => get_the_title(),                'url' => get_the_permalink(),                'img' => get_the_post_thumbnail_url(),                'category' => get_the_category()[0]->name,                'content' => $content            );        } if (get_post_type() == 'page') {            $mainResults['page'][] = array(                'title' => get_the_title(),                'url' => get_the_permalink(),                'img' => get_the_post_thumbnail_url(),            );        }if (get_post_type() == 'portfolio') {            $mainResults['portfolio'][] = array(                'title' => get_the_title(),                'url' => get_the_permalink(),                'img' => get_the_post_thumbnail_url(),                'content' => $content // Use the content specific to pages            );        } if (get_post_type() == 'services') {            $mainResults['services'][] = array(                'title' => get_the_title(),                'url' => get_the_permalink(),                'img' => get_the_post_thumbnail_url(),                'content' => $content // Use the content specific to pages            );        }    }    wp_reset_postdata();    return $mainResults;}