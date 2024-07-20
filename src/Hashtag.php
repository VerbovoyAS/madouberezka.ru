<?php

namespace HashtagCore;

class Hashtag {

    /**
     * Возвращает массив категорий WP
     *
     * @return array
     */
    public static function getPostCategories(): array
    {
        $categoriesList = [];
        $categories = get_categories();

        if (empty($categories)){
            return $categoriesList;
        }

        foreach ($categories as $category) {
            $categoriesList[$category->slug] = $category->name;
        }

        return $categoriesList;
    }

    /**
     * Получение изображения по умолчанию
     *
     * @return string
     */
    public static function getDefaultImg(): string
    {
        $getImageList = static::getImageList();
        $randomNum = rand(0, count($getImageList));

        return $getImageList[$randomNum] ?? get_template_directory_uri() . '/assets/img/site/post-default-img/post-default-img.png';
    }

    /**
     * Получение списка изображений. Временное решение
     *
     * @return string[]
     */
    public static function getImageList(): array
    {
        $path = get_template_directory_uri(). '/assets/img/site/post-default-img/';
        return [
            $path . 'post-default-img.png',
        ];
    }

    public static function breadcrumbs(): void
    {
        $separator = ' / ';

        echo '<a href="' . site_url() . '">Главная</a>' . $separator;
        global $post;
        // если у текущей страницы существует родительская
        if ($post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = [];

            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id = $page->post_parent;
            }

            echo join($separator, array_reverse($breadcrumbs)) . $separator;
            echo the_title();
        } elseif (is_single()) { // записи

            the_category(', ');
            echo $separator;
            the_title();
        } elseif (is_page()) { // страницы WordPress

            the_title();
        } elseif (is_category()) {
            single_cat_title();
        } elseif (is_tag()) {
            single_tag_title();
        } elseif (is_day()) { // архивы (по дням)

            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time(
                    'F'
                ) . '</a>' . $separator;
            echo get_the_time('d');
        } elseif (is_month()) { // архивы (по месяцам)

            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a>' . $separator;
            echo get_the_time('F');
        } elseif (is_year()) { // архивы (по годам)

            echo get_the_time('Y');
        }
    }
}