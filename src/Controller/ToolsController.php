<?php
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;

class ToolsController extends AppController
{
    public function index()
    {
        $words = array();

        $page = 'http://www.ang.pl/slownictwo/slownictwo-angielskie-poziom-a1';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $page);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
        $result = curl_exec($ch);


        preg_match_all('/<li><a href="\/slownictwo\/(.*)">([0-9]+)<\/a><\/li>/', $result, $pagination);
        $pages = end($pagination[2]);

        for ($i = 1; $i <= $pages; $i++) {
            $url = $page . '/page/' . $i;

            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 1);
            $result = curl_exec($ch);

            preg_match_all('/<div class="large-4 columns"><p class="big (a1|a2|b1|b2|c1|c2)">\s*<a href="(.*)" class="sm2_button">(.*)<\/a>\s*(.*)<\/p><\/div>\s*<div class="large-4 columns end"><p><em>(.*)<\/em><\/p><\/div>\s*<\/div>/', $result, $wordsResult);

            foreach ($wordsResult[4] as $key => $word) {
                if ($word && $wordsResult[5][$key]) {
                    $words[] = $word . ' - ' . $wordsResult[5][$key];
                }
            }


        }

        pr($words);
        die();

        curl_close($ch);
        die();

//preg_match_all('/<div class="large-4 columns end"><p><em>(.*)<\/em><\/p><\/div>/', $titlePage, $title);
//preg_match_all('/class="sm2_button">(.*)<\/a>/', $titlePage, $title);
//preg_match_all('/<div class="large-4 columns"><p class="big (.*)"><a href="(.*)" class="(.*)">(.*)<\/a>(.*)<\/p><\/div><div class="large-4 columns end"><p><em>(.*)<\/em><\/p><\/div><\/div>/', $titlePage, $title);
        preg_match_all('/<div class="large-4 columns"><p class="big (a1|a2|b1|b2|c1|c2)">\s*<a href="(.*)" class="sm2_button">(.*)<\/a>\s*(.*)<\/p><\/div>\s*<div class="large-4 columns end"><p><em>(.*)<\/em><\/p><\/div>\s*<\/div>/', $titlePage, $title);


        pr($title);
        die();
    }

    public function getCategories() {
        $this->autoRender = false;

        $http = new Client();
        $response = $http->get('http://www.ang.pl/slownictwo/tematyczne');
        preg_match_all('/<h2><a href="([a-z0-9\/-]+)">([a-żA-Ż0-9\(\),\- ]*)<\/a><\/h2>/', $response->body(), $result);

        $categoriesTable = TableRegistry::get('Categories');
        foreach ($result[1] as $key => $item) {
            $category = $categoriesTable->newEntity();
            $category->name = $result[2][$key];
            $category->url = $result[1][$key];
            $categoriesTable->save($category);
        }
    }
}
