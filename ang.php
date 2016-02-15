<!doctype html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
</head>
<body>

<?php

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


if ($output) {
    echo '<div id="content">';
    echo '<h1>' . $title[0] . '</h1>';

    $links = array();
    foreach ($output as $event) {
        foreach ($event->rounds as $round) {
            $links['name'][] = $event->name . ' - ' . $round->name;
            $links['link'][] = $basePage . '/' . $round->event_id . '/rounds/' . $round->id . '/results';
        }
    }

    $flag = false;
    for ($i = 0; $i < count($links['link']); $i++) {
        curl_setopt($ch, CURLOPT_URL, $links['link'][$i] . '.json');
        $output = json_decode(curl_exec($ch));

        if ($output) {
            $name = '';
            $l = 0;
            $nr = 1;
            foreach ($output as $result) {
                foreach ($result as $resKey => $res) {
                    if ($resKey == 'mean_record') {
                        $result->average_record = $res;
                    }
                    if ($resKey == 'mean') {
                        $result->average = $res;
                    }
                }

                switch ($_GET['mode']) {
                    case 'top1':
                        $condition = $nr <= 1;
                        break;

                    case 'top3':
                        $condition = $nr <= 3;
                        break;

                    case 'top10':
                        $condition = $nr <= 10;
                        break;

                    case 'all':
                        $condition = true;
                        break;

                    case 'records':
                        $condition = true;
                        if (empty($result->average_record) && empty($result->best_record)) {
                            $condition = false;
                        } elseif (!$showNR) {
                            if ($result->country != 'Poland' && ($result->best_record == 'NR' || $result->average_record == 'NR')) {
                                $condition = false;
                            } else {
                                $condition = true;
                            }
                        }
                        break;

                    default:
                        echo '<p class="error">Zły tryb!</p>';
                        die();
                        break;
                }

                if (!$condition) {
                    continue;
                }

                $times = array();
                foreach ($result as $key => $time) {
                    if (($key[0] == 't') && ($key != 'top_position')) {
                        $times[] = $time;
                    }
                }

                if (strlen($times[0]) <= 2) { // -tymczasowe
                    continue;
                }

                if ($name != $links['name'][$i]) {
                    if ($flag) {
                        echo '</table>';
                    }
                    $flag = true;

                    $name = $links['name'][$i];
                    echo '<div class="event">' . $links['name'][$i] . '</div>';
                    echo '<table>';
                    echo '<tr><th class="col_nr">#</th><th class="col_name">name</th><th class="col_country">country</th>';

                    for ($k = 0; $k < count($times); $k++) {
                        echo '<th class="col_time">t' . ($k + 1) . '</th>';
                    }

                    if (!empty($result->average)) {
                        if (isset($result->mean) && !empty($result->mean)) {
                            echo '<th class="col_average">mean</th>';
                        } else {
                            echo '<th class="col_average">average</th>';
                        }
                    }
                    echo '<th class="col_best">best</th></tr>';
                }

                echo '<tr class="row' . ($l++ % 2) . '"><td class="col_nr"><strong>' . $result->position . '</strong></td><td class="col_name"><strong>' . $result->name . '</strong></td><td class="col_country">' . $result->country . '</td>';
                $nr++;
                for ($k = 0; $k < count($times); $k++) {
                    echo '<td class="col_time">' . $times[$k] . '</td>';
                }
                if (!empty($result->average)) {
                    echo '<td class="col_average">';
                    if (!empty($result->average_record)) {
                        echo '<span class="' . strtolower($result->average_record) . '">' . $result->average_record . '</span>';
                    }
                    echo '<strong>' . $result->average . '</strong></td>';
                }
                echo '<td class="col_best">';
                if (!empty($result->best_record)) {
                    echo '<span class="' . strtolower($result->best_record) . '">' . $result->best_record . '</span>';
                }
                echo $result->best . '</td></tr>';
            }
        }
    }
    echo '</table></div>';
}

function pr($t) {
    echo '<pre>';
    print_r($t);
    echo '</pre>';
}
?>

</body>
</html>