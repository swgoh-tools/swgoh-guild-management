<?php

namespace App\Http\Controllers\Dev;

use App\Helper\SyncClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class AssetController extends Controller
{
    private $line_sep = "<br />".PHP_EOL;
    private $texture_prefix = "game-asset/";
    private $texture_extension = ".png";

    public function checkTexturesGear()
    {
        return $this->checkTextures(SyncClient::getGgGear(), 'base_id', 'image', 'gear', 'Gear');
    }
    public function checkTexturesUnit()
    {
        return $this->checkTextures(SyncClient::getGgChars(), 'base_id', 'image', 'characters', 'Chars');
    }
    public function checkTexturesShip()
    {
        return $this->checkTextures(SyncClient::getGgShips(), 'base_id', 'image', 'ships', 'Ships');
    }
    public function checkTexturesAbility()
    {
        return $this->checkTextures(SyncClient::getGgAbilities(), 'base_id', 'image', 'abilities', 'Abilities');
    }
    protected function checkTextures($items, string $key_id, string $key_image, string $folder, string $name)
    {
        $header = [];
        $content = [];

        if (! $items) {
            abort(512, 'missing texture items');
        }

        $header[] = 'Check local availability of '. $name .' Textures';

        $content[] = 'Starting Check of ' . $name . ' Textures';


        $time = \now();
        $cnt_now = 0;
        $cnt_max = count($items);
        foreach ($items as $item) {
            $cnt_now++;
            $content[] = implode('', ["$name: ", $item['base_id'] , " - " , $this->findOrFixAsset($item['image'], $this->texture_prefix . $folder)]);
            if ($time->diffInSeconds(now()) > 25) {
                $content[] = "<hr />";
                $content[] = "Time's up...";
                break;
            }
        }
        $header[] = "Status ($cnt_now of $cnt_max)";
        $header[] = "<hr />";

        return Response::make(implode($this->line_sep, $header) . implode($this->line_sep, array_reverse($content)));
    }

    protected function findOrFixAsset(string $url, string $folder)
    {
        // $filename = trim($url, '/\\') . ".png";
        $filename = $folder . '/' . array_reverse(preg_split('~/~', $url, null, PREG_SPLIT_NO_EMPTY))[0] . $this->texture_extension;
        $source = "https://swgoh.gg$url";
        if (Storage::disk('public')->exists($filename)) {
            return Storage::disk('public')->size($filename);
        }
        $data_stream = fopen($source, 'r', false);
        if (false !== $data_stream) {
            // always save original response for debugging api errors
            Storage::disk('public')->putStream($filename, $data_stream);
            if (is_resource($data_stream)) {
                fclose($data_stream);
            }
            if (Storage::disk('public')->exists($filename)) {
                return '<span style="color:green;font-weight:bold;">NEW: ' . Storage::disk('public')->size($filename) . '</span>';
            } else {
                return '<span style="color:red;font-weight:bold;">OOPS: Saving file failed.</span>';
            }
        } else {
            return '<span style="color:red;font-weight:bold;">source not found.</span>';
        }
    }
}
