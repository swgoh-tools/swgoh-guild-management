<?php
/**
 * Load gear pages from swgoh.gg into DOM and extract data.
 */

$dom = new DOMDocument;
// @ => suppress error messages for invalid html
@$dom->loadHTMLFile('data/html/gear/index.html');

$divs = $dom->getElementsByTagName('div');

$data = array();
$index = 0;
$id = '';

echo '<pre>', PHP_EOL;

foreach ($divs as $div) {
    $class = $div->getAttribute('class');
    //echo $class, stripos($class, 'media-body'), PHP_EOL;
    if (stripos($class, 'gear') !== false) {
        $index++;
        $id = $index; //fallback if no title found
        $as = $div->getElementsByTagName('a');
        foreach ($as as $a) {
            $id = getId($a->getAttribute('href'));
            $data[$id] = array(
                'url' => $a->getAttribute('href'),
                'gg.stats' => $a->getAttribute('data-content'),
                'name' => $a->getAttribute('title'),
                'slug' =>getSlug($a->getAttribute('title')),
                'gg.id' => getId($a->getAttribute('href'))
            );
            //echo $a->getAttribute('href'), PHP_EOL;
            //echo $a->getAttribute('data-content'), PHP_EOL;
            //echo $a->getAttribute('title'), PHP_EOL;
        }
        //echo $class, PHP_EOL;
        //echo $div->nodeValue, PHP_EOL;
    } elseif ($class == 'media-body') {
        $data[$id]['gg.slug'] = $div->getAttribute('id');
        //echo $div->getAttribute('id'), PHP_EOL;
        //echo '<hr />';
    }
}
//echo $dom->saveHTML();
//echo json_encode($data);
//var_dump($data);

//$dom_printer = new DOMDocument;

/**
 * Warning: There are two materials ingame with identical names.
 * Gear: Mk 10 Neuro-Saav Electrobinoculars
 * Salvage: Mk 10 Neuro-Saav Electrobinoculars
 * 
 * This renders slugs derived from names unusable as array/database keys.
 * Fallback is directory and image names as used by swgoh.gg
 */

while (!is_null(key($data))) {
    $key = key($data);
    $gear = current($data);
    echo "Info: Processing $key.", PHP_EOL;
    $dom = null;
    $dom = new DOMDocument;
    $file = str_replace('/db/gear/', 'data/html/gear/', $gear['url']) . 'index.html';
    if (file_exists($file)) {
        @$dom->loadHTMLFile($file);
        $divs = $dom->getElementsByTagName('div');
        foreach ($divs as $div) {
            $class = $div->getAttribute('class');
            // Material information
            if ($class == 'content-container-primary') {
                //echo 'found primary container', PHP_EOL;
                $li_head_counter = 0;
                $li_media_counter = 0;
                $lis = $div->getElementsByTagName('li');
                foreach ($lis as $li) {
                    //echo 'li stepping', PHP_EOL;
                    $li_class = $li->getAttribute('class');
                    // Top right page corner. Data on level and costs
                    if ($li_class == 'media list-group-item p-a') {
                        $li_media_counter++;
                        switch ($li_media_counter) {
                        case 1:
                            //echo 'found costs and level', PHP_EOL;
                            // Current material stats, level and costs
                            $statsarray = preg_split(
                                '/(\n|Required )/',
                                $li->nodeValue,
                                -1,
                                PREG_SPLIT_NO_EMPTY
                            );
                            foreach ($statsarray as $stat) {
                                $stat = trim($stat);
                                switch (substr($stat, 0, 3)) {
                                case 'Cos':
                                    //Cost
                                    $data[$key]['cost'] = getInteger($stat);
                                    break;
                                case 'Lev':
                                    //Level
                                    $data[$key]['level'] = getInteger($stat);
                                    break;
                                case 'Mk ':
                                    //Mk XX
                                    $data[$key]['mark'] = $stat;
                                    break;
                                case 'Sta':
                                    //Stats
                                    //ignore
                                    break;
                                default:
                                    //Ability bonuses
                                    $data[$key]['stats'][] = $stat;
                                    break;
                                }
                            }
                            break;
                        case 2:
                            // Found in XX Locations
                            break;
                        default:
                            // won't happen
                            break;
                        }
                    }
                    if ($li_class == 'list-group-item p-a') {
                        $li_head_counter++;
                        if ($li_head_counter > 2) {
                            //stop here
                            //1 = Current material << ok
                            //2 = Needed material << ok
                            //3 = Used for material >> break
                            //we don't want to get those material information
                            break;
                        }
                    }
                    if ($li_class == 'media list-group-item p-0') {
                        //echo 'found media p0 li', PHP_EOL;
                        $li_as = $li->getElementsByTagName('a');
                        if ($li_as->length > 0) {
                            //echo 'found link', PHP_EOL;
                            //$li_id = getSlug($li_as->item(0)->getAttribute('title'));
                            $li_id = getId($li_as->item(0)->getAttribute('href'));
                            if (array_key_exists($li_id, $data)) {
                                //material already known
                                //check for differences (corrupt data)
                                if ($data[$li_id]['url'] <> $li_as[0]->getAttribute('href')) {
                                    echo "Warning for $li_id (url):", PHP_EOL;
                                    echo "existing: ", $data[$li_id]['url'], PHP_EOL;
                                    echo "new: ", $li_as[0]->getAttribute('href'), PHP_EOL;
                                }
                                if ($data[$li_id]['gg.stats'] <> $li_as[0]->getAttribute('data-content')) {
                                    echo "Warning for $li_id (stats):", PHP_EOL;
                                    echo "existing: ", $data[$li_id]['gg.stats'], PHP_EOL;
                                    echo "new: ", $li_as[0]->getAttribute('data-content'), PHP_EOL;
                                }
                                if ($data[$li_id]['name'] <> $li_as[0]->getAttribute('title')) {
                                    echo "Warning for $li_id (name):", PHP_EOL;
                                    echo "existing: ", $data[$li_id]['name'], PHP_EOL;
                                    echo "new: ", $li_as[0]->getAttribute('title'), PHP_EOL;
                                }
                            } else {
                                //new material found
                                //add to array
                                echo "Info: New material $li_id found.", PHP_EOL;
                                $data[$li_id] = array(
                                    'url' => $li_as[0]->getAttribute('href'),
                                    'gg.stats' => $li_as[0]->getAttribute('data-content'),
                                    'name' => $li_as[0]->getAttribute('title'),
                                    'id' => getId($li_as[0]->getAttribute('href')),
                                    'slug' => getSlug($li_as[0]->getAttribute('title'))
                                );
                            }
                            $amountmaterialarray = preg_split('/\n/', $li->nodeValue, -1, PREG_SPLIT_NO_EMPTY);
                            //var_dump($amountmaterialarray);
                            if (isset($data[$key]['needs'][$li_id])) {
                                //should not happen
                                //means there are duplicate entries for needed material
                                echo "Warning for $li_id on $key: Duplicate needed material.", PHP_EOL;
                            }
                            $data[$key]['needs'][$li_id] = getInteger($amountmaterialarray[0]);
                        }
                    }
                }
                //we don't care about remaining divs
                break;
            }
        }
    } else {
        echo "Da ist etwas schiefgelaufen. Die Datei $file konnte nicht gefunden werden.", PHP_EOL;
    }
    next($data);
}

var_dump($data['001']);
//var_dump($data['mk-6-nubian-design-tech']);
var_dump($data);
echo '</pre>', PHP_EOL;

/**
 * Converts any text to slug version.
 *
 * @param [string] $text //any text
 * 
 * @return string
 */
function getSlug($text)
{
    return preg_replace(
        '/[^-\w]/', '',
        str_replace(
            ' ', '-',
            strtolower($text)
        )
    );
}

function getInteger($text)
{
    return preg_replace(
        '/[^\d]/',
        '',
        $text
    );
}

function getId($a_href)
{
    return getPathItem($a_href, 2, true);
}

function getImage($img_src)
{
    return getPathItem($img_src, 1, true);
}

function getPathItem($path, $position, $reverse = true)
{
    $parts = preg_split(
        '$/$',
        $path,
        -1,
        PREG_SPLIT_NO_EMPTY
    );
    
    if ($reverse) {
        $index = count($parts) - $position; //no additional -1 needed
    } else {
        $index = $position - 1;
    }

    if (array_key_exists($index, $parts)) {
        return $parts[$index];
    }

    return '';
}