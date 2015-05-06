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