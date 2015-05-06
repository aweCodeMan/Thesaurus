angular.module('thesaurus', ['ui.bootstrap']);

angular.module('thesaurus').config(function ($httpProvider)
                                   {
                                       $httpProvider.defaults.headers.common["X-Requested-With"] = 'XMLHttpRequest';
                                   });
angular.module('thesaurus')
  .directive('addLinkedWord', function ()
             {
                 return {
                     restrict:    'E',
                     scope:       {
                         url:             '@',
                         type:            '@',
                         word:            '=',
                         urlAutocomplete: '@'
                     },
                     controller:  function ($scope, $http, Words)
                     {
                         $scope.showForm = false;
                         $scope.toggleForm = function () {$scope.showForm = !$scope.showForm;};

                         $scope.getWords = function (word) {return Words.getWords(word, $scope.urlAutocomplete);};

                         $scope.sendLinkedWord = function (model)
                         {
                             if (model)
                             {
                                 $scope.disable = true;
                                 $scope.loading = true;
                                 $scope.error = undefined;

                                 $http.post($scope.url, {
                                     wordId:       $scope.word.id,
                                     linkedWordId: model.id,
                                     type:         $scope.type
                                 }).then(function (success)
                                         {
                                             window.location.reload();
                                         }, function (error)
                                         {
                                             $scope.disable = false;
                                             $scope.loading = false;
                                             $scope.error = getError($scope.word, model, $scope.type);
                                         });
                             }
                         };

                         function getError(word, linkedWord, type)
                         {
                             if (word.id == linkedWord.id)
                             {
                                 if (type == 1)
                                 {
                                     return 'Beseda ne more biti sopomenka sama sebi.';
                                 }
                                 else
                                 {
                                     return 'Beseda ne more biti protipomenka sama sebi.';
                                 }
                             }

                             return 'Prišlo je do napake pri pošiljanju podatkov. Prosim poskusite znova.';
                         }
                     },
                     templateUrl: '/templates/AddLinkedWord.html'
                 };
             });
angular.module('thesaurus')
  .directive('removeLinkedWord', function ()
             {
                 return {
                     restrict:   'E',
                     scope:      {
                         word:       '=',
                         linkedWord: '=',
                         type:       '@',
                         url:        '@'
                     },
                     controller: function ($scope, DeleteWordModal)
                     {
                         $scope.remove = function ()
                         {
                             DeleteWordModal.openModal($scope.word, $scope.linkedWord, $scope.type, $scope.url).then(function (success)
                                                                                                                     {
                                                                                                                         window.location.reload();
                                                                                                                     });
                         }
                     },
                     template:   '<span class="glyphicon glyphicon-trash remove-linked-word" ng-click="remove()"></span>'
                 };
             })
;

angular.module('thesaurus')
  .factory('DeleteWordModal', function ($modal)
           {
               var modal = {
                   openModal: function (word, linkedWord, type, url)
                   {
                       var instance = $modal.open({
                                                      templateUrl: '/templates/DeleteWordModal.html',
                                                      controller:  'DeleteWordModalInstanceController',
                                                      resolve:     {
                                                          word:       function () {return word;},
                                                          linkedWord: function () {return linkedWord;},
                                                          type:       function () {return type},
                                                          url:        function () {return url}
                                                      }
                                                  });

                       return instance.result;
                   }

               };

               return modal;
           });

angular.module('thesaurus')
  .controller('DeleteWordModalInstanceController', function ($scope, $modalInstance, $http, word, linkedWord, type, url)
              {

                  $scope.word = word;
                  $scope.linkedWord = linkedWord;
                  $scope.type = type;

                  $scope.ok = function ()
                  {
                      $scope.disabled = true;
                      $scope.error = undefined;

                      $http.post(url, {
                          _method:      'DELETE',
                          confirmation: $scope.confirm,
                          linkedWordId: linkedWord.id,
                          wordId:       word.id,
                          type:         type
                      }).then(function (success)
                              {
                                  $modalInstance.close();
                              },
                              function (error)
                              {
                                  $scope.disabled = false;
                                  $scope.error = 'Prišlo je do napake pri pošiljanju podatkov. Prosim poskusite znova.'
                              });
                  };

                  $scope.cancel = function ()
                  {
                      $modalInstance.dismiss();
                  };
              });

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

angular.module('thesaurus')
  .factory('Words', function ($http)
           {

               return {
                   getWords: function (word, url) {return getWords(word, url)}
               };

               function getWords(word, url)
               {
                   return $http.get(url, {
                       params: {
                           query: word
                       }
                   }).then(function (response)
                           {

                               if (response.data.length == 0)
                               {
                                   response.data.push({empty: true});
                                   return response.data;
                               }

                               return response.data.map(function (item)
                                                        {
                                                            item.typeaheadDefinition = getFirstDefinition(item.definitions);

                                                            return item;
                                                        });
                           });
               }

               function getFirstDefinition(definitions)
               {
                   if (!definitions)
                   {
                       return '';
                   }

                   var definition = definitions.split(/:/);

                   if (definition && definition[0])
                   {
                       return definition[0];
                   }

                   return '';
               }
           });


//# sourceMappingURL=app.js.map