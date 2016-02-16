<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;

class ToolsController extends AppController
{
    public function getCategories()
    {
        set_time_limit(0);
        $this->autoRender = false;

        $http = new Client();
        $response = $http->get('http://www.ang.pl/slownictwo/tematyczne/');
        preg_match_all('/<h2><a href="([a-z0-9\/-]+)">([a-żA-Ż0-9\(\),\- ]*)<\/a><\/h2>/', $response->body(), $result);

        $categoriesTable = TableRegistry::get('Categories');
        foreach ($result[1] as $key => $item) {
            $category = $categoriesTable->newEntity();
            $category->name = $result[2][$key];
            $category->url = $result[1][$key];
            $categoriesTable->save($category);
        }
    }

    public function getWords()
    {
        set_time_limit(0);
        $this->autoRender = false;

        $http = new Client();
        $mainUrl = 'http://www.ang.pl';


        $levelsTable = TableRegistry::get('Levels');
        $levels = $levelsTable->find('all');

        $levelsData = array();
        foreach ($levels as $level) {
            $levelsData[$level->name] = $level->id;
        }

        $categoriesTable = TableRegistry::get('Categories');
        $categories = $categoriesTable->find('all');

        $wordsTable = TableRegistry::get('Words');

        foreach ($categories as $category) {
            $response = $http->get($mainUrl . $category->url);
            preg_match_all('/<li><a href="\/slownictwo\/(.*)">([0-9]+)<\/a><\/li>/', $response->body(), $pagination);

            $pages = 1;
            if (!empty($pagination[2])) {
                $pages = end($pagination[2]);
            }

            for ($i = 1; $i <= $pages; $i++) {
                $url = $mainUrl . $category->url . '/page/' . $i;
                $response = $http->get($url);
                preg_match_all('/<div class="large-4 columns"><p class="big (a1|a2|b1|b2|c1|c2)?">\s*<a href="(.*)" class="sm2_button">(.*)<\/a>\s*(.*)<\/p><\/div>\s*<div class="large-4 columns end"><p><em>(.*)<\/em><\/p><\/div>\s*<\/div>/', $response->body(), $wordsData);

                foreach ($wordsData[4] as $key => $item) {
                    if ($item && $wordsData[5][$key]) {
                        $levelId = ($wordsData[1][$key]) ? $levelsData[$wordsData[1][$key]]: null;
                        $polish = $wordsData[5][$key];

                        $count = $wordsTable->find('all')
                            ->where(array(
                                'category_id' => $category->id,
                                'polish' => $polish,
                                'english' => $item
                            ))
                            ->count();

                        if (!$count) {
                            $word = $wordsTable->newEntity();
                            $word->category_id = $category->id;
                            $word->level_id = $levelId;
                            $word->polish = $polish;
                            $word->english = $item;
                            $wordsTable->save($word);
                        }
                    }
                }
            }
        }
    }
}
