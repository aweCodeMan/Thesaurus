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
