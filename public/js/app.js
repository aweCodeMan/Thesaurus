angular.module('thesaurus', []);
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
    .directive('SearchWord', function () {
        return {
            restrict: 'E',
            controller: function($scope)
            {

            },
            link: function (scope, elem, attr) {

            }
        };
});

//# sourceMappingURL=app.js.map