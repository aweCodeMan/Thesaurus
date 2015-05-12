<?php namespace Betoo\Thesaurus\Http\Controllers;

use Betoo\Thesaurus\Http\Requests;
use Betoo\Thesaurus\Word;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;
use Watson\Sitemap\Facades\Sitemap;

class SitemapController extends Controller
{

    /**
     * Generate sitemapIndex.
     *
     * @return Response
     */
    public function index(App $app)
    {
        Sitemap::addSitemap(URL::to('/sitemap/1'));
        Sitemap::addSitemap(URL::to('/sitemap/2'));
        Sitemap::addSitemap(URL::to('/sitemap/3'));
        Sitemap::addSitemap(URL::to('/sitemap/4'));
        Sitemap::addSitemap(URL::to('/sitemap/5'));
        Sitemap::addSitemap(URL::to('/sitemap/6'));
        Sitemap::addSitemap(URL::to('/sitemap/7'));
        Sitemap::addSitemap(URL::to('/sitemap/8'));
        Sitemap::addSitemap(URL::to('/sitemap/9'));
        Sitemap::addSitemap(URL::to('/sitemap/10'));

        return Sitemap::renderSitemapIndex();
    }

    /**
     * Generate sitemap.
     *
     * @return Response
     */
    public function show($id)
    {
        if ($id == 1)
        {
            Sitemap::addTag(URL::to('/'), Carbon::now('CET')->subHour(2)->toDateTimeString(), 'daily', '1.0');
            Sitemap::addTag(URL::to('/pomoc'), '2015-05-12T20:10:00+02:00', 'monthly', '0.8');
        }

        $chunk = 92954 / 10;
        $words = Word::take($chunk)->skip(($id - 1) * $chunk)->get();

        foreach ($words as $word)
        {
            Sitemap::addTag(route('show', $word->word), Carbon::now('CET')->subHour(4)->toDateTimeString(), 'daily', '0.8');
        }

        return Sitemap::renderSitemap();
    }
}
