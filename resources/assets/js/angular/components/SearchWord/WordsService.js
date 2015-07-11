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
                                   response.data.push({word: '', link: 'beseda/' + word, empty: true});
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

