<?php namespace Betoo\Thesaurus\Http\Controllers;

use Betoo\Thesaurus\Http\Requests;
use Betoo\Thesaurus\Http\Controllers\Controller;

use Betoo\Thesaurus\Http\Requests\DeleteRelationshipRequest;
use Betoo\Thesaurus\Http\Requests\StoreRelationshipRequest;
use Betoo\Thesaurus\Word;
use Betoo\Thesaurus\WordRelationship;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SitemapController extends Controller
{

    /**
     * Generate sitemapIndex.
     *
     * @return Response
     */
    public function index(App $app)
    {
        // create sitemap
        $sitemap = $app::make("sitemap");

        // set cache
        $sitemap->setCache('laravel.sitemap-index', 20160);

        // add sitemaps (loc, lastmod (optional))
        $sitemap->addSitemap(URL::to('sitemap/1'));
        $sitemap->addSitemap(URL::to('sitemap/2'));
        $sitemap->addSitemap(URL::to('sitemap/3'));

        // show sitemap
        return $sitemap->render('sitemapindex');
    }

    /**
     * Generate sitemap.
     *
     * @return Response
     */
    public function show(App $app, $id)
    {
        $sitemap = $app::make("sitemap");
        $sitemap->setCache('laravel.sitemap' .$id, 20160);


        if (!$sitemap->isCached())
        {
            if ($id == 1)
            {
                $sitemap->add(URL::to('/'), '2015-05-06T20:10:00+02:00', '1.0', 'daily');
                $sitemap->add(URL::to('/pomoc'), '2015-05-06T10:30:00+02:00', '0.9', 'monthly');
            }

            $words = Word::all();

            $words = $words->chunk(count($words) / 3);

            foreach ($words[$id - 1] as $word)
            {
                $sitemap->add(route('show', $word->word), Carbon::now()->subHour(3), '0.7', 'daily');
            }

        }

        return $sitemap->render('xml');

    }
}
