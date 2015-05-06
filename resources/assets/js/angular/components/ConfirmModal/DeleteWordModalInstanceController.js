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
