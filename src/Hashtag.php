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

        return $getImageList[$randomNum] ?? get_template_directory_uri() . '/assets/img/site/post-default-img/post-default-img.jpeg';
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
            $path . 'post-default-img.jpeg',
        ];
    }
}