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
