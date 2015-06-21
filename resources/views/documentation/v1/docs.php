<!DOCTYPE html><html><head><meta charset="utf-8"><title>Thesaurus v1 API</title><link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/3.1.1/slate/bootstrap.min.css"><link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"><link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,700|Inconsolata|Raleway:200"><style>/* Highlight.js Theme Tomorrow Night Eighties */
pre{color:#fff;background:#272b30;border:1px solid rgba(255, 255, 255, 0.2)}
pre code{display:block;padding:.5em;background:#272b30}
.hljs-comment,.hljs-title{color:#999}.hljs-variable,.hljs-attribute,.hljs-tag,.hljs-regexp,.ruby .hljs-constant,.xml .hljs-tag .hljs-title,.xml .hljs-pi,.xml .hljs-doctype,.html .hljs-doctype,.css .hljs-id,.css .hljs-class,.css .hljs-pseudo{color:#f2777a}.hljs-number,.hljs-preprocessor,.hljs-pragma,.hljs-built_in,.hljs-literal,.hljs-params,.hljs-constant{color:#f99157}.ruby .hljs-class .hljs-title,.css .hljs-rules .hljs-attribute{color:#fc6}.hljs-string,.hljs-value,.hljs-inheritance,.hljs-header,.ruby .hljs-symbol,.xml .hljs-cdata{color:#9c9}.css .hljs-hexcolor{color:#6cc}.hljs-function,.python .hljs-decorator,.python .hljs-title,.ruby .hljs-function .hljs-title,.ruby .hljs-title .hljs-keyword,.perl .hljs-sub,.javascript .hljs-title,.coffeescript .hljs-title{color:#69c}.hljs-keyword,.javascript .hljs-function{color:#c9c}.hljs{display:block;background:#2d2d2d;color:#ccc;padding:.5em}.coffeescript .javascript,.javascript .xml,.tex .hljs-formula,.xml .javascript,.xml .vbscript,.xml .css,.xml .hljs-cdata{opacity:.5}</style><style>body,
h4,
h5 {
  font-family: 'Roboto' sans-serif !important;
}
h1,
h2,
h3,
.aglio {
  font-family: 'Raleway' sans-serif !important;
}
h1 a,
h2 a,
h3 a,
h4 a,
h5 a {
  display: none;
}
h1:hover a,
h2:hover a,
h3:hover a,
h4:hover a,
h5:hover a {
  display: inline;
}
code {
  color: #222;
  background-color: #aaa;
  font-family: 'Inconsolata' monospace !important;
}
a[data-target] {
  cursor: pointer;
}
h4 {
  font-size: 100%;
  font-weight: bold;
  text-transform: uppercase;
}
.back-to-top {
  position: fixed;
  z-index: 1;
  bottom: 0px;
  right: 24px;
  padding: 4px 8px;
  color: #aaa;
  background-color: #171b20;
  text-decoration: none !important;
  border-top: 1px solid rgba(0,0,0,0.1);
  border-left: 1px solid rgba(0,0,0,0.1);
  border-right: 1px solid rgba(0,0,0,0.1);
  border-top-left-radius: 3px;
  border-top-right-radius: 3px;
}
.panel {
  overflow: hidden;
}
.panel-heading code {
  margin-left: 3px;
  color: #000;
  background-color: rgba(255,255,255,0.7);
  white-space: pre-wrap;
  white-space: -moz-pre-wrap;
  white-space: -pre-wrap;
  white-space: -o-pre-wrap;
  word-wrap: break-word;
}
.panel-heading h3 {
  margin-top: 10px;
  margin-bottom: 10px;
}
a.list-group-item:hover {
  background-color: #f8f8f8;
  border-left: 2px solid #555;
  padding-left: 15px;
}
.indent {
  display: block;
  text-indent: 16px;
}
.list-group-item {
  padding-left: 16px;
}
.list-group-item .toggle .open {
  display: block;
}
.list-group-item .toggle .closed {
  display: none;
}
.list-group-item.collapsed .toggle .open {
  display: none;
}
.list-group-item.collapsed .toggle .closed {
  display: block;
}
a.list-group-item:hover {
  background-color: #4b5159;
  border-left-color: #c8c8c8;
}
a.list-group-item {
  font-size: 13px;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}
a.list-group-item.heading {
  font-size: 15px;
  background-color: #3e444c;
}
a.list-group-item.heading:hover {
  background-color: #4b5159;
}
.list-group-item.collapse {
  display: none;
}
.list-group-item.collapse.in {
  display: block;
}
.list-group-item a span.closed {
  display: none;
}
.list-group-item a span.open {
  display: block;
}
.list-group-item a.collapsed span.closed {
  display: block;
}
.list-group-item a.collapsed span.open {
  display: none;
}
#nav {
  width: inherit;
  margin-top: 38px;
  max-width: 255px;
  top: 0;
  bottom: 0;
  padding-right: 12px;
  padding-bottom: 12px;
  overflow-y: auto;
}
@media (max-width: 1199px) {
  #nav {
    max-width: 212px;
  }
}
</style></head><body><a href="#top" class="text-muted back-to-top"><i class="fa fa-toggle-up"></i>&nbsp;Back to top</a><div class="container"><div class="row"><div class="col-md-3"><nav id="nav" class="hidden-sm hidden-xs affix nav"><div class="list-group"><a data-toggle="" data-target="#words-menu" href="#words" class="list-group-item heading collapsed">Words</a><div id="words-menu"><a href="#words-" style="border-top-left-radius: 0; border-top-right-radius: 0" class="list-group-item"><span class="badge alert-info"><i class="fa fa-arrow-down"></i></span>Get words list</a><a href="#words-" style="border-top-left-radius: 0; border-top-right-radius: 0" class="list-group-item"><span class="badge alert-info"><i class="fa fa-arrow-down"></i></span>Get word</a></div></div><div class="list-group"><a data-toggle="" data-target="#synonyms-menu" href="#synonyms" class="list-group-item heading collapsed">Synonyms</a><div id="synonyms-menu"><a href="#synonyms-" style="border-top-left-radius: 0; border-top-right-radius: 0" class="list-group-item"><span class="badge alert-info"><i class="fa fa-arrow-down"></i></span>Get synonyms list</a></div></div><div class="list-group"><a data-toggle="" data-target="#antonyms-menu" href="#antonyms" class="list-group-item heading collapsed">Antonyms</a><div id="antonyms-menu"><a href="#antonyms-" style="border-top-left-radius: 0; border-top-right-radius: 0" class="list-group-item"><span class="badge alert-info"><i class="fa fa-arrow-down"></i></span>Get antonyms list</a></div></div><div class="list-group"><a data-toggle="" data-target="#word-relationships-menu" href="#word-relationships" class="list-group-item heading collapsed">Word relationships</a><div id="word-relationships-menu"><a href="#word-relationships-" style="border-top-left-radius: 0; border-top-right-radius: 0" class="list-group-item"><span class="badge alert-success"><i class="fa fa-plus"></i></span>Store a relationship</a><a href="#word-relationships-" style="border-top-left-radius: 0; border-top-right-radius: 0" class="list-group-item"><span class="badge alert-success"><i class="fa fa-plus"></i></span>Delete a relationship</a></div></div><div class="list-group"><a data-toggle="" data-target="#statistics-menu" href="#statistics" class="list-group-item heading collapsed">Statistics</a><div id="statistics-menu"><a href="#statistics-" style="border-top-left-radius: 0; border-top-right-radius: 0" class="list-group-item"><span class="badge alert-info"><i class="fa fa-arrow-down"></i></span>Get stats</a></div></div></nav></div><div class="col-md-8"><div><header><div class="page-header"><h1 id="top">Thesaurus v1 API</h1></div></header><div class="description"><p>Simple API for accessing and modifying word relationships for the thesaurus found at <a href="http://tezaver.betoo.si">http://tezaver.betoo.si</a>.</p>
</div></div><div><div class="panel panel-default"><div class="panel-heading"><h3 id="words">Words&nbsp;<a href="#words"><i class="fa fa-link"></i></a></h3></div><div class="panel-body"><p>Resources for words.</p>
<h4 id="words-">Resources&nbsp;<a href="#words-"><i class="fa fa-link"></i></a></h4><section id="words--get" class="panel panel-info"><div class="panel-heading"><div style="float:right"><span style="text-transform: lowercase">Get words list</span></div><div style="float:left"><a href="#words--get" class="btn btn-xs btn-info">GET</a></div><div style="overflow:hidden"><code>/api/v1/words{?query}</code></div></div><div class="panel-body"><ul>
<li>query (string, optional) - filter results by word</li>
</ul>
<p>You will always receive a paginated result. All the words are kept inside the data property.</p>
</div><ul class="list-group"><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>200</code></strong><a data-toggle="collapse" data-target="#614dbd1e7151a99cce62d5360d9ad75b" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="614dbd1e7151a99cce62d5360d9ad75b" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code><span class="hljs-collection">{
    per_page: <span class="hljs-number">50</span>,
    current_page: <span class="hljs-number">1</span>,
    next_page_url: null,
    prev_page_url: null,
    from: <span class="hljs-number">1</span>,
    to: <span class="hljs-number">46</span>,
    data: <span class="hljs-collection">[
        <span class="hljs-collection">{
            id: <span class="hljs-number">83725</span>,
            word: <span class="hljs-string">"velik"</span>,
            pronunciation: <span class="hljs-string">"vêlik"</span>,
            tags: <span class="hljs-string">"pridevnik, pridevniška raba: samoški spol, narečno"</span>,
            definitions: <span class="hljs-string">"ki dosega visoko stopnjo glede na razsežnost, majhen: glede na merljivo količino: glede na število sestavnih enot: glede na dolžino: glede na trajanje: glede na možni razpon: glede na čas življenja: glede na svojo glavno, bistveno značilnost: glede na intenzivnost, učinek: glede na razsežnost in delovanje ali dejavnost: glede na pomembnost: ki izraža razsežnost: véliki:"</span>,
            link: <span class="hljs-string">"http://tezaver.dev/beseda/velik"</span>,
            synonyms: <span class="hljs-collection">[]</span>,
            antonyms: <span class="hljs-collection">[
                <span class="hljs-collection">{
                    id: <span class="hljs-number">33055</span>,
                    word: <span class="hljs-string">"majhen"</span>,
                    pronunciation: <span class="hljs-string">"májhen"</span>,
                    tags: <span class="hljs-string">"pridevnik, pridevniška raba: prislov, prislovna raba, narečno: samoški spol, narečno"</span>,
                    definitions: <span class="hljs-string">"ki dosega nizko stopnjo glede na razsežnost, velik: glede na merljivo količino: glede na število sestavnih enot: glede na dolžino: glede na trajanje: glede na možni razpon: glede na čas življenja: glede na svojo glavno, bistveno značilnost: glede na intenzivnost, učinek: glede na razsežnost in delovanje ali dejavnost: glede na pomembnost: malo pomemben, nepomemben: slab, grd, ničvreden: malo: mali:"</span>,
                    link: <span class="hljs-string">"http://tezaver.dev/beseda/majhen"</span>
                }</span>
            ]</span>
        }</span>,
        <span class="hljs-collection">{
            id: <span class="hljs-number">83726</span>,
            word: <span class="hljs-string">"velikan"</span>,
            pronunciation: <span class="hljs-string">"velikán"</span>,
            tags: <span class="hljs-string">"samostalnik moškega spola"</span>,
            definitions: <span class="hljs-string">"nenavadno veliko in močno, človeku podobno bitje: nenavadno velik in močen človek: kdor ima nadpovprečne uspehe pri svojem delu: zelo velik, gospodarsko pomemben objekt: kar je veliko sploh:"</span>,
            link: <span class="hljs-string">"http://tezaver.dev/beseda/velikan"</span>,
            synonyms: <span class="hljs-collection">[]</span>,
            antonyms: <span class="hljs-collection">[]</span>
        }</span>
    ]</span>
}</span>
</code></pre></li></ul></section><h4 id="words-">Resources&nbsp;<a href="#words-"><i class="fa fa-link"></i></a></h4><section id="words--get" class="panel panel-info"><div class="panel-heading"><div style="float:right"><span style="text-transform: lowercase">Get word</span></div><div style="float:left"><a href="#words--get" class="btn btn-xs btn-info">GET</a></div><div style="overflow:hidden"><code>/api/v1/words/{id/word}</code></div></div><div class="panel-body"><ul>
<li>id/word (numeric/string) - id of the word, or the actual word string</li>
</ul>
<p>You will always receive an array of results. That’s because the slovenian language can have multiple words/meanings for each word string.</p>
</div><ul class="list-group"><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>200</code></strong><a data-toggle="collapse" data-target="#5fa4118c462428163452d32cbf31af30" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="5fa4118c462428163452d32cbf31af30" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>[
    {
        id: <span class="hljs-number">4223</span>,
        word: <span class="hljs-string">"bliščava"</span>,
        pronunciation: <span class="hljs-string">"bliščáva"</span>,
        tags: <span class="hljs-string">"samostalnik ženskega spola"</span>,
        definitions: <span class="hljs-string">"bleščava:"</span>,
        <span class="hljs-keyword">link</span>: <span class="hljs-string">"http://tezaver.dev/beseda/bli<span class="hljs-variable">%C5</span><span class="hljs-variable">%A1</span><span class="hljs-variable">%C4</span><span class="hljs-variable">%8Dava</span>"</span>,
        synonyms: [],
        antonyms: []
    }
] 
</code></pre></li></ul></section></div></div></div><div><div class="panel panel-default"><div class="panel-heading"><h3 id="synonyms">Synonyms&nbsp;<a href="#synonyms"><i class="fa fa-link"></i></a></h3></div><div class="panel-body"><p>Resources for synonyms.</p>
<h4 id="synonyms-">Resources&nbsp;<a href="#synonyms-"><i class="fa fa-link"></i></a></h4><section id="synonyms--get" class="panel panel-info"><div class="panel-heading"><div style="float:right"><span style="text-transform: lowercase">Get synonyms list</span></div><div style="float:left"><a href="#synonyms--get" class="btn btn-xs btn-info">GET</a></div><div style="overflow:hidden"><code>/api/v1/synonyms</code></div></div><div class="panel-body"><p>You will always receive a paginated result. All the linked words are kept inside the data property. All the word links are doubled, meaning that for every synonym there is going to be two entries.</p>
</div><ul class="list-group"><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>200</code></strong><a data-toggle="collapse" data-target="#098a674286d85cd97b9ad294522600ad" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="098a674286d85cd97b9ad294522600ad" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    per_page: <span class="hljs-number">50</span>,
    current_page: <span class="hljs-number">1</span>,
    next_page_url: null,
    prev_page_url: null,
    <span class="hljs-keyword">from</span>: <span class="hljs-number">1</span>,
    <span class="hljs-keyword">to</span>: <span class="hljs-number">46</span>,
    data: [
        {
           relationship_type: <span class="hljs-string">"synonym"</span>,
           created_at: <span class="hljs-string">"2015-05-12 10:00:00"</span>,
           updated_at: <span class="hljs-string">"2015-05-12 10:00:00"</span>,
           <span class="hljs-property">word</span>: {
               <span class="hljs-property">id</span>: <span class="hljs-number">12</span>,
               <span class="hljs-property">word</span>: <span class="hljs-string">"abc"</span>,
               pronunciation: <span class="hljs-string">"abc"</span>,
               tags: <span class="hljs-string">""</span>,
               definitions: <span class="hljs-string">"ustaljeno zaporedje črk v kaki pisavi, zlasti v latinici; abeceda: začetno, osnovno znanje:"</span>,
               link: <span class="hljs-string">"http://tezaver.dev/beseda/abc"</span>
           },
           linked_word: {
               <span class="hljs-property">id</span>: <span class="hljs-number">22</span>,
               <span class="hljs-property">word</span>: <span class="hljs-string">"abece"</span>,
               pronunciation: <span class="hljs-string">"abece"</span>,
               tags: <span class="hljs-string">"sopomenka"</span>,
               definitions: <span class="hljs-string">""</span>,
               link: <span class="hljs-string">"http://tezaver.dev/beseda/abece"</span>
           }
        }
    ]
}
</code></pre></li></ul></section></div></div></div><div><div class="panel panel-default"><div class="panel-heading"><h3 id="antonyms">Antonyms&nbsp;<a href="#antonyms"><i class="fa fa-link"></i></a></h3></div><div class="panel-body"><p>Resources for antonyms.</p>
<h4 id="antonyms-">Resources&nbsp;<a href="#antonyms-"><i class="fa fa-link"></i></a></h4><section id="antonyms--get" class="panel panel-info"><div class="panel-heading"><div style="float:right"><span style="text-transform: lowercase">Get antonyms list</span></div><div style="float:left"><a href="#antonyms--get" class="btn btn-xs btn-info">GET</a></div><div style="overflow:hidden"><code>/api/v1/antonyms</code></div></div><div class="panel-body"><p>You will always receive a paginated result. All the linked words are kept inside the data property. All the word links are doubled, meaning that for every antonym there is going to be two entries.</p>
</div><ul class="list-group"><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>200</code></strong><a data-toggle="collapse" data-target="#003e9394d6609219c3693aba52897ed6" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="003e9394d6609219c3693aba52897ed6" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    per_page: <span class="hljs-number">50</span>,
    current_page: <span class="hljs-number">1</span>,
    next_page_url: null,
    prev_page_url: null,
    <span class="hljs-keyword">from</span>: <span class="hljs-number">1</span>,
    <span class="hljs-keyword">to</span>: <span class="hljs-number">46</span>,
    data: [
        {
           relationship_type: <span class="hljs-string">"antonym"</span>,
           created_at: <span class="hljs-string">"2015-05-23 10:13:59"</span>,
           updated_at: <span class="hljs-string">"2015-05-23 10:13:59"</span>,
           <span class="hljs-property">word</span>: {
               <span class="hljs-property">id</span>: <span class="hljs-number">916</span>,
               <span class="hljs-property">word</span>: <span class="hljs-string">"altruističen"</span>,
               pronunciation: <span class="hljs-string">"altruístičen"</span>,
               tags: <span class="hljs-string">"pridevnik, pridevniška raba"</span>,
               definitions: <span class="hljs-string">"poln altruizma, nesebičen:"</span>,
               link: <span class="hljs-string">"http://tezaver.dev/beseda/altruisti%C4%8Den"</span>
           },
               linked_word: {
               <span class="hljs-property">id</span>: <span class="hljs-number">13645</span>,
               <span class="hljs-property">word</span>: <span class="hljs-string">"egoističen"</span>,
               pronunciation: <span class="hljs-string">"egoístičen"</span>,
               tags: <span class="hljs-string">"pridevnik, pridevniška raba: prislov, prislovna raba"</span>,
               definitions: <span class="hljs-string">"ki upošteva samo svoje koristi, sebičen:"</span>,
               link: <span class="hljs-string">"http://tezaver.dev/beseda/egoisti%C4%8Den"</span>
           }
        }
    ]
} 
</code></pre></li></ul></section></div></div></div><div><div class="panel panel-default"><div class="panel-heading"><h3 id="word-relationships">Word relationships&nbsp;<a href="#word-relationships"><i class="fa fa-link"></i></a></h3></div><div class="panel-body"><p>Resources for word relationships (synonyms, antonyms).</p>
<h4 id="word-relationships-">Resources&nbsp;<a href="#word-relationships-"><i class="fa fa-link"></i></a></h4><section id="word-relationships--post" class="panel panel-success"><div class="panel-heading"><div style="float:right"><span style="text-transform: lowercase">Store a relationship</span></div><div style="float:left"><a href="#word-relationships--post" class="btn btn-xs btn-success">POST</a></div><div style="overflow:hidden"><code>/api/v1/word-relationships</code></div></div><div class="panel-body"><p>When storing a relationship use <code>type = 1</code> for syonyms and <code>type = 2</code> for antonyms.</p>
</div><ul class="list-group"><li class="list-group-item"><strong>Request&nbsp;&nbsp;<code>JSON message</code></strong><a data-toggle="collapse" data-target="#def440985f34968564350b7cc146c857" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="def440985f34968564350b7cc146c857" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">wordId</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>, 
    "<span class="hljs-attribute">linkedWordId</span>": <span class="hljs-value"><span class="hljs-number">423</span></span>, 
    "<span class="hljs-attribute">type</span>":<span class="hljs-value"><span class="hljs-number">1</span>
</span>}

</code></pre></li><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>200</code></strong><a data-toggle="collapse" data-target="#fff3d27889be96e8d1635ed4c07785db" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="fff3d27889be96e8d1635ed4c07785db" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"success"</span>
</span>}
</code></pre></li><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>422</code></strong><a data-toggle="collapse" data-target="#14f5c4ef2d19bbe48931ab2939f59bc0" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="14f5c4ef2d19bbe48931ab2939f59bc0" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">wordId</span>": <span class="hljs-value">[
        <span class="hljs-string">"The word id field is required."</span>
    ]</span>,
    "<span class="hljs-attribute">linkedWordId</span>": <span class="hljs-value">[
        <span class="hljs-string">"The linked word id field is required."</span>
    ]</span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value">[
        <span class="hljs-string">"The type field is required."</span>
    ]
</span>}
</code></pre></li></ul></section><h4 id="word-relationships-">Resources&nbsp;<a href="#word-relationships-"><i class="fa fa-link"></i></a></h4><section id="word-relationships--post" class="panel panel-success"><div class="panel-heading"><div style="float:right"><span style="text-transform: lowercase">Delete a relationship</span></div><div style="float:left"><a href="#word-relationships--post" class="btn btn-xs btn-success">POST</a></div><div style="overflow:hidden"><code>/api/v1/word-relationships/delete</code></div></div><div class="panel-body"><p>When deleting a relationship use <code>type = 1</code> for syonyms and <code>type = 2</code> for antonyms.</p>
</div><ul class="list-group"><li class="list-group-item"><strong>Request&nbsp;&nbsp;<code>JSON message</code></strong><a data-toggle="collapse" data-target="#77228d05c5c3337c7a0d27b7ef281126" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="77228d05c5c3337c7a0d27b7ef281126" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">wordId</span>": <span class="hljs-value"><span class="hljs-number">5</span></span>, 
    "<span class="hljs-attribute">linkedWordId</span>": <span class="hljs-value"><span class="hljs-number">423</span></span>, 
    "<span class="hljs-attribute">type</span>":<span class="hljs-value"><span class="hljs-number">1</span>
</span>}

</code></pre></li><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>200</code></strong><a data-toggle="collapse" data-target="#e1c9cf0f07c78371c2ecfac48c6f28fc" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="e1c9cf0f07c78371c2ecfac48c6f28fc" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">status</span>": <span class="hljs-value"><span class="hljs-string">"success"</span>
</span>}
</code></pre></li><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>422</code></strong><a data-toggle="collapse" data-target="#ee08e10e01a41ea7c6ff40449f0eb56c" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="ee08e10e01a41ea7c6ff40449f0eb56c" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">wordId</span>": <span class="hljs-value">[
        <span class="hljs-string">"The word id field is required."</span>
    ]</span>,
    "<span class="hljs-attribute">linkedWordId</span>": <span class="hljs-value">[
        <span class="hljs-string">"The linked word id field is required."</span>
    ]</span>,
    "<span class="hljs-attribute">type</span>": <span class="hljs-value">[
        <span class="hljs-string">"The type field is required."</span>
    ]
</span>}
</code></pre></li></ul></section></div></div></div><div><div class="panel panel-default"><div class="panel-heading"><h3 id="statistics">Statistics&nbsp;<a href="#statistics"><i class="fa fa-link"></i></a></h3></div><div class="panel-body"><p>Resources for statistics about thesaurus.</p>
<h4 id="statistics-">Resources&nbsp;<a href="#statistics-"><i class="fa fa-link"></i></a></h4><section id="statistics--get" class="panel panel-info"><div class="panel-heading"><div style="float:right"><span style="text-transform: lowercase">Get stats</span></div><div style="float:left"><a href="#statistics--get" class="btn btn-xs btn-info">GET</a></div><div style="overflow:hidden"><code>/api/v1/stats</code></div></div><ul class="list-group"><li class="list-group-item"><strong>Response&nbsp;&nbsp;<code>200</code></strong><a data-toggle="collapse" data-target="#7612f67367400db564d5c0f1b3ecbf1e" class="pull-right collapsed"><span class="closed">Show</span><span class="open">Hide</span></a></li><li id="7612f67367400db564d5c0f1b3ecbf1e" class="list-group-item panel-collapse collapse"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br></code></pre><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">synonym_count</span>": <span class="hljs-value"><span class="hljs-number">1027</span></span>,
    "<span class="hljs-attribute">antonym_count</span>": <span class="hljs-value"><span class="hljs-number">67</span></span>,
    "<span class="hljs-attribute">last_synonyms</span>": <span class="hljs-value">[
        {
            "<span class="hljs-attribute">relationship_type</span>": <span class="hljs-value"><span class="hljs-string">"synonym"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2015-06-18 07:48:19"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2015-06-18 07:48:19"</span></span>,
            "<span class="hljs-attribute">word</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">83711</span></span>,
                "<span class="hljs-attribute">word</span>": <span class="hljs-value"><span class="hljs-string">"veličasten"</span></span>,
                "<span class="hljs-attribute">pronunciation</span>": <span class="hljs-value"><span class="hljs-string">"veličásten"</span></span>,
                "<span class="hljs-attribute">tags</span>": <span class="hljs-value"><span class="hljs-string">"pridevnik, pridevniška raba: prislov, prislovna raba"</span></span>,
                "<span class="hljs-attribute">definitions</span>": <span class="hljs-value"><span class="hljs-string">"ki vzbuja pozornost, občudovanje zaradi velike razsežnosti: velikega števila: slovesnosti, zanosa: velike pomembnosti: ki se nanaša na kaj, kar zaradi določenih lastnosti vzbuja pozornost, občudovanje:"</span></span>,
                "<span class="hljs-attribute">link</span>": <span class="hljs-value"><span class="hljs-string">"http://tezaver.dev/beseda/veli%C4%8Dasten"</span>
        </span>}</span>,
            "<span class="hljs-attribute">linked_word</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">69213</span></span>,
                "<span class="hljs-attribute">word</span>": <span class="hljs-value"><span class="hljs-string">"sijajen"</span></span>,
                "<span class="hljs-attribute">pronunciation</span>": <span class="hljs-value"><span class="hljs-string">"sijájen"</span></span>,
                "<span class="hljs-attribute">tags</span>": <span class="hljs-value"><span class="hljs-string">"pridevnik, pridevniška raba: v povedni rabi"</span></span>,
                "<span class="hljs-attribute">definitions</span>": <span class="hljs-value"><span class="hljs-string">"ki ima sijaj: ki ima zaželeno lastnost, kakovost v zelo veliki meri: glede na določene zahteve zelo uspešen, učinkovit: ki ima veliko dobrih, pozitivnih lastnosti: ki v veliki meri izpolnjuje dolžnosti ali delovne zahteve: prislov od sijajen: izraža veliko navdušenje nad čim:"</span></span>,
                "<span class="hljs-attribute">link</span>": <span class="hljs-value"><span class="hljs-string">"http://tezaver.dev/beseda/sijajen"</span>
        </span>}
    ]
    <span class="hljs-string">"last_antonyms"</span>: [
        {
            "<span class="hljs-attribute">relationship_type</span>": <span class="hljs-value"><span class="hljs-string">"antonym"</span></span>,
            "<span class="hljs-attribute">created_at</span>": <span class="hljs-value"><span class="hljs-string">"2015-06-19 21:33:07"</span></span>,
            "<span class="hljs-attribute">updated_at</span>": <span class="hljs-value"><span class="hljs-string">"2015-06-19 21:33:07"</span></span>,
            "<span class="hljs-attribute">word</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">3</span></span>,
                "<span class="hljs-attribute">word</span>": <span class="hljs-value"><span class="hljs-string">"a"</span></span>,
                "<span class="hljs-attribute">pronunciation</span>": <span class="hljs-value"><span class="hljs-string">"à"</span></span>,
                "<span class="hljs-attribute">tags</span>": <span class="hljs-value"><span class="hljs-string">""</span></span>,
                "<span class="hljs-attribute">definitions</span>": <span class="hljs-value"><span class="hljs-string">"za izražanje prodajne cene, po:"</span></span>,
                "<span class="hljs-attribute">link</span>": <span class="hljs-value"><span class="hljs-string">"http://tezaver.dev/beseda/a"</span>
            </span>}</span>,
            "<span class="hljs-attribute">linked_word</span>": <span class="hljs-value">{
                "<span class="hljs-attribute">id</span>": <span class="hljs-value"><span class="hljs-number">1</span></span>,
                "<span class="hljs-attribute">word</span>": <span class="hljs-value"><span class="hljs-string">"a"</span></span>,
                "<span class="hljs-attribute">pronunciation</span>": <span class="hljs-value"><span class="hljs-string">"á"</span></span>,
                "<span class="hljs-attribute">tags</span>": <span class="hljs-value"><span class="hljs-string">"m nesklonljiv(o): nesklonljivi prilastek"</span></span>,
                "<span class="hljs-attribute">definitions</span>": <span class="hljs-value"><span class="hljs-string">"prva črka slovenske abecede: samoglasnik, ki ga ta črka zaznamuje: prvi po vrsti:"</span></span>,
                "<span class="hljs-attribute">link</span>": <span class="hljs-value"><span class="hljs-string">"http://tezaver.dev/beseda/a"</span>
            </span>}
        </span>}
    ]
</span>}</span></code></pre></li></ul></section></div></div></div></div></div></div><p style="text-align: center;" class="text-muted">Generated by&nbsp;<a href="https://github.com/danielgtaylor/aglio" class="aglio">aglio</a>&nbsp;on 21 Jun 2015</p><div id="localFile" style="display: none; position: absolute; top: 0; left: 0; width: 100%; color: white; background: red; font-size: 150%; text-align: center; padding: 1em;">This page may not display correctly when opened as a local file. Instead, view it from a web server.

</div></body><script src="//code.jquery.com/jquery-1.11.0.min.js"></script><script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script><script>(function() {
  if (location.protocol === 'file:') {
    document.getElementById('localFile').style.display = 'block';
  }

}).call(this);
</script><script>(function() {
  $('table').addClass('table');

}).call(this);
</script></html>