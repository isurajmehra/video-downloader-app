$(window).on("load", function () {
    if (jQuery('#step2 div').length != '0') {
        $('html,body').animate({ scrollTop: $("#step2").offset().top }, 'slow');
    }
});

var app = angular.module('app', []);

app.controller('homeCtrl', function ($scope, $rootScope, $window, $timeout) {
    $scope.findWebsite = function (url) {
        $scope.webUrl = url;
        var subUrl = '';
        var subAction = '';
        var web = url.replace('http://','').replace('https://','').replace('www.','').split(/[/?#]/)[0];
        if (web ==='facebook.com') {
            subUrl = url;
            subAction = 'action.php';
        } else if (web ==='youtube.com') {
            subUrl = url;
            subAction = 'youtube-function.php'
        } else if (web ==='instagram.com') {
            getInstaVideo(url);
        }

        if (subAction != '') {
            var f = document.createElement('form');
            f.action = 'system/'+subAction;
            f.method = 'POST';
            var i = document.createElement('input');
            i.type = 'hidden';
            i.name = 'url';
            i.value = url;
            f.appendChild(i);
            document.body.appendChild(f);
            f.submit();
        }
    };
});

app.controller('youtubeCtrl', function ($scope, $http, $window, $timeout) {
  addToHomescreen();
    $scope.downloadVideo = function (key) {
        window.location.href = 'system/functions.php?fname=downloadYoutubeVid&key=' + key;
        $timeout(function () { window.location.href = 'thankyou.php'; }, 3000);
    };

});

app.controller('fbCtrl', function ($scope, $http, $window, $timeout) {
    $scope.downloadFbVideo = function (format) {
        window.location.href = 'system/youtube-function.php?fname=downloadYoutubeVid&format=' + format;
        $timeout(function () { window.location.href = 'thankyou.php'; }, 3000);
    };
});

app.controller('instaCtrl', function ($scope, $http, $window, $timeout, $rootScope  ) {
    $scope.downloadInstaVideo = function (format) {
        window.location.href = 'system/functions.php?fname=downloadYoutubeVid&format=' + format;
        $timeout(function () { window.location.href = 'thankyou.php'; }, 3000);
    };
});

function getInstaVideo(url) {
    var instaDta = [];
    if (url) {
        fetch(url).
            then(r => r.text()).
            then(r => {
                var title = r.match(/<title>(.*)<\/title>/is);
                instaDta['title'] = title[1].replace(/[^a-zA-Z ]/g, "");
                if (instaDta['title'].match(/Page Not Found/gi) ) {
                    window.location.href = 'error.php';
                }
                var url = r.match(/property="og:video" content="(.*?)"/is);
                instaDta['videourl'] = url[1];
                var type = r.match(/property="og:video:type" content="(.*?)"/is);
                instaDta['mime'] = type[1];
                instaDta['ext'] = 'mp4';

                var f = document.createElement('form');
                f.action = 'system/insta-function.php';
                f.method = 'POST';

                for(key in instaDta) {
                    i = document.createElement('input');
                    i.type = 'hidden';
                    i.name = key;
                    i.value = instaDta[key];
                    f.appendChild(i);
                }
                document.body.appendChild(f);
                f.submit();
            }).catch(function() {
                window.location.href = 'error.php';
            });
    }
}
