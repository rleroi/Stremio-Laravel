<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class addonController
 * @package App\Http\Controllers
 */
class addonController extends Controller
{
    /**
     * Summarized collection of meta items. Catalogs are displayed on the Stremio's Board, Discover and Search.
     * @param $type
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function catalog($type, $id, $extra = null) {
        return response()->json([
            "metas" => [
                [
                    "id" => "BigBuckBunny",
                    "name" => "Big Buck Bunny",
                    "year" => 2008,
                    "poster" => "https://image.tmdb.org/t/p/w600_and_h900_bestv2/uVEFQvFMMsg4e6yb03xOfVsDz4o.jpg",
                    "posterShape" => "regular",
                    "banner" => "https://image.tmdb.org/t/p/original/aHLST0g8sOE1ixCxRDgM35SKwwp.jpg",
                    "isFree" => true,
                    "type" => "movie"
                ]
            ]
        ]);
    }

    /**
     * Detailed description of meta item. This description is displayed when the user selects an item form the catalog.
     * @param $type
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function meta($type, $id, $extra = null) {
        return response()->json([
            "meta" => [
                "id" => "BigBuckBunny",
                "name" => "Big Buck Bunny",
                "year" => 2008,
                "poster" => "https://image.tmdb.org/t/p/w600_and_h900_bestv2/uVEFQvFMMsg4e6yb03xOfVsDz4o.jpg",
                "posterShape" => "regular",
                "logo" => "https://fanart.tv/fanart/movies/10378/hdmovielogo/big-buck-bunny-5054df8a36bfa.png",
                "background" => "https://image.tmdb.org/t/p/original/aHLST0g8sOE1ixCxRDgM35SKwwp.jpg",
                "isFree" => true,
                "type" => "movie"
            ]
        ]);
    }

    /**
     * Tells Stremio how to obtain the media content. It may be torrent info hash, HTTP URL, etc
     * @param $type
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function stream($type, $id, $extra = null) {
        return response()->json([
            "streams" => [
                [
                    "availability" => 1,
                    "url" => "http://distribution.bbb3d.renderfarming.net/video/mp4/bbb_sunflower_1080p_30fps_normal.mp4"
                ]
            ]
        ]);
    }

    /**
     * Subtitles resource for the chosen media.
     * @param $type
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function subtitles($type, $id, $extra = null) {
        return response()->json([]);
    }

    /**
     * Generate a manifest.json file
     * @return \Illuminate\Http\JsonResponse
     */
    public function manifest() {
        return response()->json([
            "id" => "org.stremio.laravel",
            "version" => "0.0.1",
            "description" => "Laravel Stremio Add-on",
            "name" => "Laravel Add-on",
            "resources" => [
                "catalog",
                "meta",
                "stream"
            ],
            "types" => [
                "movie",
                "series"
            ],
            "catalogs" => [
                [
                    "type" => "movie",
                    "id" => "moviecatalog"
                ]
            ],
            "idPrefixes" => ["tt"]
        ]);
    }
}
