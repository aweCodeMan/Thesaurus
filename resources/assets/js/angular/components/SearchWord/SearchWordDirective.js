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
                         $scope.selectModel = function (model)
                         {
                             window.location.href = model.link;
                         };

                         $scope.getWords = function (word)
                         {
                             return Words.getWords(word, $scope.url);
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
