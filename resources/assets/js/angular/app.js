angular.module('thesaurus', ['ui.bootstrap']);

angular.module('thesaurus').config(function ($httpProvider)
                                   {
                                       $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
                                   });