<?phpfunction add_new_taxonomies(){    register_taxonomy(        'news_tags',        array('news'),        array(            'hierarchical' => false,            'labels' => array(                'name' => 'Ключевые слова',                'singular_name' => 'Ключевое слово',                'search_items' => 'Найти ключевые слово',                'popular_items' => 'Популярные ключевые слово',                'all_items' => 'Все ключевые слова',                'parent_item' => null,                'parent_item_colon' => null,                'edit_item' => 'Редактировать ключевое слово',                'update_item' => 'Обновить ключевое слово',                'add_new_item' => 'Добавить ключевое слово',                'new_item_name' => 'Название ключевого слова',                'separate_items_with_commas' => 'Разделяйте ключевые слова запятыми',                'add_or_remove_items' => 'Добавить или удалить ключевое слово',                'choose_from_most_used' => 'Выбрать из наиболее часто используемых ключевых слов',                'menu_name' => 'Ключевые слова'            ),            'public' => true,            'show_in_nav_menus' => true,            'show_ui' => true,            'show_tagcloud' => true,            'update_count_callback' => '_update_post_term_count',            'query_var' => true,            'rewrite' => array(                'slug' => 'news_tags',                'hierarchical' => false            ),        )    );    register_taxonomy(        'interview_tags',        array('interview'),        array(            'hierarchical' => false,            'labels' => array(                'name' => 'Ключевые слова',                'singular_name' => 'Ключевое слово',                'search_items' => 'Найти ключевые слово',                'popular_items' => 'Популярные ключевые слово',                'all_items' => 'Все ключевые слова',                'parent_item' => null,                'parent_item_colon' => null,                'edit_item' => 'Редактировать ключевое слово',                'update_item' => 'Обновить ключевое слово',                'add_new_item' => 'Добавить ключевое слово',                'new_item_name' => 'Название ключевого слова',                'separate_items_with_commas' => 'Разделяйте ключевые слова запятыми',                'add_or_remove_items' => 'Добавить или удалить ключевое слово',                'choose_from_most_used' => 'Выбрать из наиболее часто используемых ключевых слов',                'menu_name' => 'Ключевые слова'            ),            'public' => true,            'show_in_nav_menus' => true,            'show_ui' => true,            'show_tagcloud' => true,            'update_count_callback' => '_update_post_term_count',            'query_var' => true,            'rewrite' => array(                'slug' => 'interview_tags',                'hierarchical' => false            ),        )    );}add_action('init', 'add_new_taxonomies', 0);function declare_new_taxonomies(){    register_taxonomy_for_object_type('news_tags', 'news');    register_taxonomy_for_object_type('interview_tags', 'interview');}add_action('init', 'declare_new_taxonomies');function custom_post_our_services(){    $labels = array(        'name' => 'Наши услуги',        'singular_name' => 'Наши услуга',        'add_new' => 'Добавить услугу',        'add_new_item' => 'Добавить новую услугу',        'edit_item' => 'Редактировать услугу',        'new_item' => 'Новая услуга',        'all_items' => 'Все наши услуги',        'view_item' => 'Просмотр услуги на сайте',        'search_items' => 'Искать услугу',        'not_found' => 'Услуг не найдено.',        'not_found_in_trash' => 'В корзине нет услуг.',        'menu_name' => 'Наши услуги'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/our_services.png',        'menu_position' => 21,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('our_services', $args);}add_action('init', 'custom_post_our_services');function custom_post_lab_team(){    $labels = array(        'name' => 'Наши подразделения',        'singular_name' => 'Подразделение',        'add_new' => 'Добавить подразделение',        'add_new_item' => 'Добавить новое подразделение',        'edit_item' => 'Редактировать подразделение',        'new_item' => 'Новое подразделение',        'all_items' => 'Все наши подразделения',        'view_item' => 'Просмотр подразделения на сайте',        'search_items' => 'Искать подразделение',        'not_found' => 'Подразделений не найдено.',        'not_found_in_trash' => 'В корзине нет подразделений.',        'menu_name' => 'Наши подразделения'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/our_services.png',        'menu_position' => 21,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('lab_team', $args);}add_action('init', 'custom_post_lab_team');function custom_post_banners(){    $labels = array(        'name' => 'Баннеры',        'singular_name' => 'Баннер',        'add_new' => 'Добавить баннер',        'add_new_item' => 'Добавить новый баннер',        'edit_item' => 'Редактировать баннер',        'new_item' => 'Новый баннер',        'all_items' => 'Все баннеры',        'view_item' => 'Просмотр баннера на сайте',        'search_items' => 'Искать баннер',        'not_found' => 'Баннеров не найдено.',        'not_found_in_trash' => 'В корзине нет баннеров.',        'menu_name' => 'Баннеры'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/banners.png',        'menu_position' => 22,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('banners', $args);}add_action('init', 'custom_post_banners');function custom_post_news(){    $labels = array(        'name' => 'Новости',        'singular_name' => 'Новость',        'add_new' => 'Добавить новость',        'add_new_item' => 'Добавить новую новость',        'edit_item' => 'Редактировать новость',        'new_item' => 'Новость',        'all_items' => 'Все новости',        'view_item' => 'Просмотр новостей на сайте',        'search_items' => 'Искать новость',        'not_found' => 'Новостей не найдено.',        'not_found_in_trash' => 'В корзине нет новостей.',        'menu_name' => 'Новости'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/news.png',        'menu_position' => 23,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('news', $args);}add_action('init', 'custom_post_news');function custom_post_interview(){    $labels = array(        'name' => 'Интервью',        'singular_name' => 'Интервью',        'add_new' => 'Добавить Интервью',        'add_new_item' => 'Добавить новое интервью',        'edit_item' => 'Редактировать интервью',        'new_item' => 'Интервью',        'all_items' => 'Все интервью',        'view_item' => 'Просмотр интервью на сайте',        'search_items' => 'Искать интервью',        'not_found' => 'Интервью не найдено.',        'not_found_in_trash' => 'В корзине нет интервью.',        'menu_name' => 'Интервью'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/interview.png',        'menu_position' => 24,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('interview', $args);}add_action('init', 'custom_post_interview');function custom_post_research(){    $labels = array(        'name' => 'Исследования',        'singular_name' => 'Исследование',        'add_new' => 'Добавить исследование',        'add_new_item' => 'Добавить новое исследование',        'edit_item' => 'Редактировать исследование',        'new_item' => 'Исследования',        'all_items' => 'Все исследования',        'view_item' => 'Просмотр исследования на сайте',        'search_items' => 'Искать исследование',        'not_found' => 'Исследований не найдено.',        'not_found_in_trash' => 'В корзине нет исследований.',        'menu_name' => 'Доклинические исследования'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/prrs.png',        'menu_position' => 25,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('prrs', $args);    $labels = array(        'name' => 'Видео',        'singular_name' => 'Видео',        'add_new' => 'Добавить видео',        'add_new_item' => 'Добавить новое видео',        'edit_item' => 'Редактировать видео',        'new_item' => 'Видео',        'all_items' => 'Все видео',        'view_item' => 'Просмотр видео',        'search_items' => 'Искать видео',        'not_found' => 'Видео не найдено.',        'not_found_in_trash' => 'В корзине нет видео.',        'menu_name' => 'Доклинические Видео'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/video.png',        'menu_position' => 26,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('prrs_video', $args);    $labels = array(        'name' => 'Регламент',        'singular_name' => 'Регламент',        'add_new' => 'Добавить регламент',        'add_new_item' => 'Добавить новый регламент',        'edit_item' => 'Редактировать регламент',        'new_item' => 'Регламент',        'all_items' => 'Все регламенты',        'view_item' => 'Просмотр регламента',        'search_items' => 'Искать регламент',        'not_found' => 'Регламент не найден.',        'not_found_in_trash' => 'В корзине нет регламента.',        'menu_name' => 'Доклинический регламент',        'parent_item'       => 'Родит. раздел вопроса',		'parent_item_colon' => 'Родит. раздел вопроса:',        'parent' => 'Родитель'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/order.png',        'menu_position' => 27,        'hierarchical' => true,        'supports' => array('title','page-attributes')    );    register_post_type('prrs_order', $args);    $labels = array(        'name' => 'Исследования',        'singular_name' => 'Исследование',        'add_new' => 'Добавить исследование',        'add_new_item' => 'Добавить новое исследование',        'edit_item' => 'Редактировать исследование',        'new_item' => 'Исследования',        'all_items' => 'Все исследования',        'view_item' => 'Просмотр исследования на сайте',        'search_items' => 'Искать исследование',        'not_found' => 'Исследований не найдено.',        'not_found_in_trash' => 'В корзине нет исследований.',        'menu_name' => 'Клинические исследования'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/clrs.png',        'menu_position' => 28,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('clrs', $args);    $labels = array(        'name' => 'Видео',        'singular_name' => 'Видео',        'add_new' => 'Добавить видео',        'add_new_item' => 'Добавить новое видео',        'edit_item' => 'Редактировать видео',        'new_item' => 'Видео',        'all_items' => 'Все видео',        'view_item' => 'Просмотр видео',        'search_items' => 'Искать видео',        'not_found' => 'Видео не найдено.',        'not_found_in_trash' => 'В корзине нет видео.',        'menu_name' => 'Клинические Видео'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/video.png',        'menu_position' => 29,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('clrs_video', $args);    $labels = array(        'name' => 'Регламент',        'singular_name' => 'Регламент',        'add_new' => 'Добавить регламент',        'add_new_item' => 'Добавить новый регламент',        'edit_item' => 'Редактировать регламент',        'new_item' => 'Регламент',        'parent_item'       => 'Родит. раздел вопроса',		'parent_item_colon' => 'Родит. раздел вопроса:',		'all_items' => 'Все регламенты',        'view_item' => 'Просмотр регламента',        'search_items' => 'Искать регламент',        'not_found' => 'Регламент не найден.',        'not_found_in_trash' => 'В корзине нет регламента.',        'menu_name' => 'Клинический регламент',        'parent' => 'Родитель'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/order.png',        'menu_position' => 29,        'hierarchical' => true,        'supports' => array('title','page-attributes')    );    register_post_type('clrs_order', $args);    $labels = array(        'name' => 'Словарь',        'singular_name' => 'Слово',        'add_new' => 'Добавить слово',        'add_new_item' => 'Добавить новое слово',        'edit_item' => 'Редактировать слово',        'new_item' => 'Слово',        'all_items' => 'Все слова',        'view_item' => 'Просмотр слов',        'search_items' => 'Искать слова',        'not_found' => 'Слов не найдено.',        'not_found_in_trash' => 'В корзине нет слов.',        'menu_name' => 'Словарь'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 30,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('wiki', $args);    $labels = array(        'name' => 'Препараты',        'singular_name' => 'Препарат',        'add_new' => 'Добавить препарат',        'add_new_item' => 'Добавить новый препарат',        'edit_item' => 'Редактировать препарат',        'new_item' => 'Препарат',        'all_items' => 'Все препараты',        'view_item' => 'Просмотр препарата',        'search_items' => 'Искать препарат',        'not_found' => 'Препаратов не найдено.',        'not_found_in_trash' => 'В корзине нет препаратов.',        'menu_name' => 'Оригинальные препараты'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 31,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('drugs', $args);    $labels = array(        'name' => 'МНН',        'singular_name' => 'МНН',        'add_new' => 'Добавить МНН',        'add_new_item' => 'Добавить МНН',        'edit_item' => 'Редактировать МНН',        'new_item' => 'МНН',        'all_items' => 'Все МНН',        'view_item' => 'Просмотр МНН',        'search_items' => 'Искать МНН',        'not_found' => 'МНН не найдено.',        'not_found_in_trash' => 'В корзине нет МНН.',        'menu_name' => 'МНН'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 32,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('mhh', $args);    $labels = array(        'name' => 'Вакансии',        'singular_name' => 'Вакансия',        'add_new' => 'Добавить вакансию',        'add_new_item' => 'Добавить новую вакансию',        'edit_item' => 'Редактировать вакансию',        'new_item' => 'Вакансия',        'all_items' => 'Все вакансии',        'view_item' => 'Просмотр вакансии',        'search_items' => 'Искать вакансию',        'not_found' => 'Вакансий не найдено.',        'not_found_in_trash' => 'В корзине нет вакансий.',        'menu_name' => 'Вакансии'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 33,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('vacancies', $args);    $labels = array(        'name' => 'Отделы',        'singular_name' => 'Отдел',        'add_new' => 'Добавить отдел',        'add_new_item' => 'Добавить новый отдел',        'edit_item' => 'Редактировать отдел',        'new_item' => 'Отделы',        'all_items' => 'Все отделы',        'view_item' => 'Просмотр отдела',        'search_items' => 'Искать отдел',        'not_found' => 'Отделов не найдено.',        'not_found_in_trash' => 'В корзине нет отделов.',        'menu_name' => 'Отделы'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 34,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('org_info', $args);    $labels = array(        'name' => 'Логотипы партнеров',        'singular_name' => 'Логотип',        'add_new' => 'Добавить логотип',        'add_new_item' => 'Добавить новый логотип',        'edit_item' => 'Редактировать логотип',        'new_item' => 'Логотипы',        'all_items' => 'Все логотипы',        'view_item' => 'Просмотр логотипа',        'search_items' => 'Искать логотип',        'not_found' => 'Логотипов не найдено.',        'not_found_in_trash' => 'В корзине нет логотипов.',        'menu_name' => 'Логотипы партнеров'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 35,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('part_logo', $args);    $labels = array(        'name' => 'Исследования',        'singular_name' => 'Исследование',        'add_new' => 'Добавить исследование',        'add_new_item' => 'Добавить новое исследование',        'edit_item' => 'Редактировать исследование',        'new_item' => 'Исследование',        'all_items' => 'Все исследования',        'view_item' => 'Просмотр исследования',        'search_items' => 'Искать исследование',        'not_found' => 'Исследований не найдено.',        'not_found_in_trash' => 'В корзине нет исследований.',        'menu_name' => 'Планируемые исследования'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 36,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('studies', $args);    $labels = array(        'name' => 'Добровольцы',        'singular_name' => 'Доброволец',        'add_new' => 'Добавить добровольца',        'add_new_item' => 'Добавить нового добровольца',        'edit_item' => 'Редактировать добровольца',        'new_item' => 'Доброволец',        'all_items' => 'Все добровольцы',        'view_item' => 'Просмотр добровольца',        'search_items' => 'Искать добровольца',        'not_found' => 'Добровольцев не найдено.',        'not_found_in_trash' => 'В корзине нет добровольцев.',        'menu_name' => 'Добровольцы'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 37,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('volunteers', $args);    $labels = array(        'name' => 'Набор пациентов',        'singular_name' => 'Набор пациентов',        'add_new' => 'Добавить набор пациентов',        'add_new_item' => 'Добавить нового набор пациента',        'edit_item' => 'Редактировать набор пациента',        'new_item' => 'Набор пациента',        'all_items' => 'Все наборы пациентов',        'view_item' => 'Просмотр набора пациента',        'search_items' => 'Искать набор пациентов',        'not_found' => 'Наборов пациентов не найдено.',        'not_found_in_trash' => 'В корзине нет наборов пациентов.',        'menu_name' => 'Набор пациентов'    );    $args = array(        'labels' => $labels,        'public' => true,        'show_ui' => true,        'has_archive' => true,        'menu_icon' => get_stylesheet_directory_uri() . '/img/menu/wiki.png',        'menu_position' => 38,        'hierarchical' => false,        'supports' => array('title')    );    register_post_type('patients', $args);}add_action('init', 'custom_post_research');