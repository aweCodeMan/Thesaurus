/**
 * @ngdoc directive
 * @name SearchWord
 *
 * @description
 * An autocomplete search bar.
 *
 * @restrict A
 * */
angular.module('thesaurus')
  .directive('searchWord', function ()
             {
                 return {
                     restrict:    'E',
                     scope:       {
                         url:         '@',
                         size:        '@',
                         placeholder: '@'
                     },
                     controller:  function ($scope, $http, Words)
                     {
                         var words = [];

                         $scope.selectModel = function (model)
                         {
                             window.location.href = model.link;
                         };

                         $scope.getWords = function (word)
                         {
                             words = [];
                             return Words.getWords(word, $scope.url).then(function (success)
                                                                          {
                                                                              words = success;
                                                                              return success;
                                                                          }, function (error)
                                                                          {
                                                                              return error;
                                                                          });
                         };

                         $scope.onEnter = function (query, event)
                         {
                             if (event.keyCode == 13 && !$scope.loadingWords)
                             {
                                 words.forEach(function (item)
                                               {
                                                   if (item.word.toLowerCase() == query.toLowerCase())
                                                   {
                                                       window.location.href = item.link;
                                                   }
                                               });
                             }
                         };
                     },
                     link:        function (scope, elem, attr)
                     {

                         if (scope.size && scope.size.toLowerCase() == 'large')
                         {
                             elem.addClass('search-large');
                         }
                     },
                     templateUrl: '/templates/SearchWord.html'
                 };
             });
