var app = angular.module('barendro', []);
app.constant('domain', 'http://clickplay.com/');

app.controller('cartaction', function($scope, $http){
    $scope.qty=1;
});

app.filter('startFrom', function () {
    return function (input, start) {
        start = +start; //parse to int
        return input.slice(start);
    }
});

//User reg/login
app.controller('userCtrl', function ($scope, $http) {

    $scope.sublink = "Signin";

    $http.post("http://clickplay.games/web/Home/GetSubscriptionStatus", "").then(function (response) {
        $scope.Status = response.data.DownloadList;
        //alert($scope.Status);
        $scope.sub = "block";
        $scope.unsub = "none";
        $scope.sub1 = "block";
        $scope.unsub1 = "none";

        //$scope.login = true;
        $scope.intabs = true;
        //$scope.outtabs = false;

        if ($scope.Status == "MSISDN not found") {
            $scope.sub = "none";
            $scope.unsub = "none";
            $scope.sub1 = "none";
            $scope.unsub1 = "none";
            $scope.sub2 = "none";
            $scope.unsub2 = "none";
            $scope.sub3 = "none";
            $scope.unsub3 = "none";

           
            $scope.msisdnnotfound = "/web/home/signin";
            //$scope.intabs = true;
            //$scope.outtabs = false;

        }
        else if ($scope.Status == "both unsubscribed") {
            $scope.sub = "block";
            $scope.unsub = "none";
            $scope.sub1 = "block";
            $scope.unsub1 = "none";

            $scope.login = false;
            $scope.intabs = false;
            $scope.outtabs = true;

            $scope.sublink = "#";
        }
        else {
            var param = $scope.Status.split("/");
            var status = param[0];
            var status1 = param[1];
            //alert(status +"/"+status1);
            if (status == "225") {
                $scope.sub = "none";
                $scope.unsub = "block";
                $scope.sublink = "#";
            }
            
            if (status1 == "226") {
                $scope.sub1 = "none";
                $scope.unsub1 = "block";
                $scope.sublink = "#";
            }
        }
    });

    $scope.signup = function (regmob, regpass) {
        
        var json = { "mobile": regmob, "password": regpass }
        $http.post("http://clickplay.games/web/Home/signup", json).then(function (response) {
            var status = response.data.DownloadList[0].Status;
            //alert(status);
            if (status == "air") {

            }
            else if (status == "Already Registered")
            {
                window.location.href = "http://clickplay.games/web/Home/Verify";
            }
            else {
                window.location.href = "http://clickplay.games/web/Home/Verify";
            }
            $scope.act = true;
            $scope.sup = false;
            $scope.Regiact = true;
            $scope.SignUp = false;
        });
    }

    $scope.activate = function (activecode) {
        var jsonact = { "activecode": activecode }
        $http.post("http://clickplay.games/web/Home/Activation", jsonact).then(function (response) {
            $scope.status = response.data.DownloadList;
            if ($scope.status == "True") {
                $scope.Message = "Activation successful. Please login";
                    $scope.color = "green";
                window.location.href = "http://clickplay.games/web/Home/Index";
            }
            else {
                $scope.Message = "Activation Failed";
                $scope.color = "#f00";
            }
            $scope.act = true;
            $scope.sup = false;
        });
    }

    $scope.signin = function (logmobileno, logpassword) {
        //alert(logmobileno + logpassword);
        var json = { "mobile": logmobileno, "password": logpassword }
        //http://clickplay.games/web
        $http.post("http://clickplay.games/web/Home/Signin", json).then(function (response) {
            $scope.User = response.data.UserList;
            if ($scope.User == "Login Failed") {
                $scope.Message = "Login Failed";
                $scope.color = "#f00";
            }
            else if ($scope.User == "air") {
                $scope.Message = "Please login with banglalink naumber.";
                $scope.color = "#f00";
                //window.location.href = "http://clickplay.games/web/";
            }
            else {
                $scope.Message = "Login Successful";
                $scope.color = "green";
                window.location.href = "http://clickplay.games/web/Home/Index"
            }
        });
    }

    $scope.reset = function (resmobileno) {
        var json = { "mobile": resmobileno }
        $http.post("http://clickplay.games/web/Home/Reset", json).then(function (response) {
            window.location.href = "http://clickplay.games/web/Home/ResetVerify";
        });
    }

    $scope.validate = function (activationcode) {
        var json = { "activationcode": activationcode }
        $http.post("http://clickplay.games/web/Home/ValidateResetCode", json).then(function (response) {
            console.log(response.data.UserList);
            var status = response.data.UserList;
            //alert(status);
            if (status == "False") {
                $scope.Message = "Invalid activationcode.";
                $scope.color = "#f00";
            }
            else {
                window.location.href = "http://clickplay.games/web/Home/UpdateResetPassword";
            }
        });
    }

    $scope.updatePassword = function (updatePassword) {
        var json = { "Password": updatePassword }
        $http.post("http://clickplay.games/web/Home/UpdateResetPassword", json).then(function (response) {
            //var result = response.data.UserList;
            window.location.href = "http://clickplay.games/web/Home/Index";
        });
        window.location.href = "http://clickplay.games/web/Home/Index";
    }

    $scope.signout = function () {
        $http.post("http://clickplay.games/web/Home/Signout", "").then(function (response) {
            $scope.resact = false;
            $scope.reset = false;
            $scope.login = true;
            $scope.intabs = true;
            $scope.outtabs = false;

            window.location.href = "http://clickplay.games/web/Home/Index";
        });
    }

    $scope.subscription = function (serviceid, request) {
        //alert("hit");
        var json = { "serviceid": serviceid, "request": request }
        var type = "";
        if (request == "0") {
            type = "unsubscribe";
        }
        else {
            type = "subscribe";
        }
        var subs = "";
        var msg = "";
        $http.post("http://clickplay.games/web/Home/GetSubscriptionStatus", "").then(function (response) {
            $scope.Status = response.data.DownloadList;
            var param = $scope.Status.split("/");
            var status = param[0];
            var status1 = param[1];

            if (serviceid == "225") {
                msg = "You have requested for " + type + " ClickPlay downloadable game daily plan (Auto Renewal).";
                bootbox.confirm({
                    size: "small",
                    message: msg,
                    callback: function (answer) { /* your callback code */
                        if (answer) {
                            $http.post("http://clickplay.games/web/Home/Subscribe", json).then(function (response) {
                                window.location.href = "http://clickplay.games/web/Home/Index";
                            });
                        }
                        else {
                            window.location.href = "http://clickplay.games/web/Home/Subscription";
                        }
                    }
                });
            }
            else if (serviceid == "226") {
                msg = "You have requested for " + type + " ClickPlay online game weekly plan (Auto Renewal).";
                bootbox.confirm({
                    size: "small",
                    message: msg,
                    callback: function (answer) { /* your callback code */
                        if (answer) {
                            $http.post("http://clickplay.games/web/Home/Subscribe", json).then(function (response) {
                                window.location.href = "http://clickplay.games/web/Home/Index";
                            });
                        }
                        else {
                            window.location.href = "http://clickplay.games/web/Home/Subscription";
                        }
                    }
                });
            }
        });

    }

    $scope.resend = function () {
        $http.post("http://clickplay.games/web/Home/Resend", "").then(function (response) {
            $scope.Message = "Activation Code Sent. Please Check Your Mobile.";
            $scope.color = "green";
        });
    }
});

//singing/signout show
app.controller('loginCtrl', function ($scope, $http) {
    $http.post("http://clickplay.games/web/Home/GetLoginStatus", "").then(function (response) {
        var status = response.data.DownloadList;
        //alert(status);
        if (status == "True") {
            $scope.sublink = "Signout";
            $scope.subText = "Signout";
        }
        else {
            $scope.sublink = "Signin";
            $scope.subText = "Signin";
        }
    });

});

app.controller('dhistoryCtrl', function ($scope, $http) {
    $http.post("http://clickplay.games/web/Home/DownloadHistory", "").then(function (response) {
        $scope.dwhistory = response.data.DownloadList;
        //console.log($scope.dwhistory);
    });
});

//topBanner
app.controller('topBannerCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/TopBanner").then(function (response) {
        $scope.topbanneraction = response.data.contentList[0].previwUrl;
        $scope.topbanneractioncode = response.data.contentList[0].contentCode;

        $scope.topbannerArcade = response.data.contentList[1].previwUrl;
        $scope.topbannerArcadecode = response.data.contentList[1].contentCode;

        $scope.topbannerAdventure = response.data.contentList[2].previwUrl;
        $scope.topbannerAdventurecode = response.data.contentList[2].contentCode;

        $scope.topbannerracing = response.data.contentList[3].previwUrl;
        $scope.topbannerracingcode = response.data.contentList[3].contentCode;

        $scope.topbannerPuzzle = response.data.contentList[4].previwUrl;
        $scope.topbannerPuzzlecode = response.data.contentList[4].contentCode;

        $scope.topbannerstrategy = response.data.contentList[5].previwUrl;
        $scope.topbannerstrategycode = response.data.contentList[5].contentCode;

        $scope.topbannerSports = response.data.contentList[6].previwUrl;
        $scope.topbannerSportscode = response.data.contentList[6].contentCode;

    });
});

app.controller('topOnlineBannerCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/TopOnlineBanner").then(function (response) {
        console.log(response.data.BillbroadList);

        $scope.topbanneractioncode0 = response.data.BillbroadList[0].ContentId;
        $scope.topbanneractiontitle0 = response.data.BillbroadList[0].ContentName;
        $scope.topbanneractionprev0 = response.data.BillbroadList[0].BannerURl;

        $scope.topbannerArcadecode = response.data.BillbroadList[1].ContentId;
        $scope.topbannerArcadetitle = response.data.BillbroadList[1].ContentName;
        $scope.topbannerArcadeprev = response.data.BillbroadList[1].BannerURl;

        $scope.topbannerRacingcode = response.data.BillbroadList[2].ContentId;
        $scope.topbannerRacingtitle = response.data.BillbroadList[2].ContentName;
        $scope.topbannerRacingprev = response.data.BillbroadList[2].BannerURl;

        $scope.topbannerPuzzlecode = response.data.BillbroadList[3].ContentId;
        $scope.topbannerPuzzletitle = response.data.BillbroadList[3].ContentName;
        $scope.topbannerPuzzleprev = response.data.BillbroadList[3].BannerURl;

        $scope.topbannerStrategycode = response.data.BillbroadList[4].ContentId;
        $scope.topbannerStrategytitle = response.data.BillbroadList[4].ContentName;
        $scope.topbannerStrategyprev = response.data.BillbroadList[4].BannerURl;

        $scope.topbannerSportscode = response.data.BillbroadList[5].ContentId;
        $scope.topbannerSportstitle = response.data.BillbroadList[5].ContentName;
        $scope.topbannerSportsprev = response.data.BillbroadList[5].BannerURl;

    });
});

//Billboard
app.controller('BillboardCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/BillboardWeb").then(function (response) {
        //$scope.games = response.data.BillbroadList;
        console.log(response.data.BillbroadList);

        $scope.code0 = response.data.BillbroadList[0].ContentId;
        $scope.title0 = response.data.BillbroadList[0].ContentName;
        $scope.prev0 = response.data.BillbroadList[0].BannerURl;

        $scope.code1 = response.data.BillbroadList[1].ContentId;
        $scope.title1 = response.data.BillbroadList[1].ContentName;
        $scope.prev1 = response.data.BillbroadList[1].BannerURl;

        $scope.code2 = response.data.BillbroadList[2].ContentId;
        $scope.title2 = response.data.BillbroadList[2].ContentName;
        $scope.prev2 = response.data.BillbroadList[2].BannerURl;

        $scope.code3 = response.data.BillbroadList[3].ContentId;
        $scope.title3 = response.data.BillbroadList[3].ContentName;
        $scope.prev3 = response.data.BillbroadList[3].BannerURl;

        $scope.code4 = response.data.BillbroadList[4].ContentId;
        $scope.title4 = response.data.BillbroadList[4].ContentName;
        $scope.prev4 = response.data.BillbroadList[4].BannerURl;

        $scope.code5 = response.data.BillbroadList[5].ContentId;
        $scope.title5 = response.data.BillbroadList[5].ContentName;
        $scope.prev5 = response.data.BillbroadList[5].BannerURl;
    });
});

app.controller('BillboardOnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/BillboardOnline").then(function (response) {
        //$scope.games = response.data.BillbroadList;
        console.log(response.data.BillbroadList);

        $scope.code0 = response.data.BillbroadList[0].ContentId;
        $scope.title0 = response.data.BillbroadList[0].ContentName;
        $scope.prev0 = response.data.BillbroadList[0].BannerURl;

        $scope.code1 = response.data.BillbroadList[1].ContentId;
        $scope.title1 = response.data.BillbroadList[1].ContentName;
        $scope.prev1 = response.data.BillbroadList[1].BannerURl;

        $scope.code2 = response.data.BillbroadList[2].ContentId;
        $scope.title2 = response.data.BillbroadList[2].ContentName;
        $scope.prev2 = response.data.BillbroadList[2].BannerURl;

        $scope.code3 = response.data.BillbroadList[3].ContentId;
        $scope.title3 = response.data.BillbroadList[3].ContentName;
        $scope.prev3 = response.data.BillbroadList[3].BannerURl;

        $scope.code4 = response.data.BillbroadList[4].ContentId;
        $scope.title4 = response.data.BillbroadList[4].ContentName;
        $scope.prev4 = response.data.BillbroadList[4].BannerURl;

    });
});

//Action
app.controller('ActionCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/type?id=10&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
        console.log($scope.games);
    });

    $scope.download = function (Name, type, physicalfile) {
        //alert(value + "," + Name + "," + type);
        var json = { "code": value, "name": Name, "physicalfile": physicalfile }

        $http.post("/Home/GetDownload", json).then(function (response) {
            var Status = response.data.DownloadList;
            //alert(Status);
            if (Status == "Unsubscribed") {
                http://clickplay.games/web
                    window.location.href = "http://clickplay.games/web/Home/Index";
            }
            else if (Status == "MSISDN Not Found") {
                //http://clickplay.games/web
                window.location.href = "http://clickplay.games/web/Home/Index";
            }
            else {
                window.location.href = Status;
            }
        });
    }

});

app.controller('ActionOnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/OnlineGame/10").then(function (response) {
        $scope.games = response.data.gameList;
    });
});

//Racing
app.controller('RacingCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/type?id=13&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });
});

app.controller('RacingOnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/OnlineGame/13").then(function (response) {
        $scope.games = response.data.gameList;
    });
});

//PremiumRacing
app.controller('PremiumRacingCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=30&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });
});

//Adventure
app.controller('AdventureCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/type?id=12&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
        console.log($scope.games);
    });
});

//Sports
app.controller('SportsCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/type?id=17&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
        console.log($scope.games);
    });
});

app.controller('SportsOnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/OnlineGame/17").then(function (response) {
        $scope.games = response.data.gameList;
    });
});

//Arcade
app.controller('ArcadeCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/type?id=11&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });
});

app.controller('ArcadeOnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/OnlineGame/11").then(function (response) {
        $scope.games = response.data.gameList;
    });
});

app.controller('puzzleCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/type?id=14&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });
});

app.controller('PuzzleOnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/OnlineGame/14").then(function (response) {
        $scope.games = response.data.gameList;
    });
});

app.controller('strategyCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/type?id=15&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });
});

app.controller('StrategyOnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/OnlineGame/15").then(function (response) {
        $scope.games = response.data.gameList;
    });
});

app.controller('DetailsCtrl', function ($scope, $http, $location) {

    var param = $location.absUrl().split("/");
    //local
    //var value = param[5];
    //live
    var value = param[6];

    var url = "http://api.mobileplay.co/detail/?id=" + value + "&portal=3";
    $http.get(url).then(function (response) {
        $scope.screen = response.data.screenShots;
        $scope.screen1 = response.data.screenShots[0].screenUrl;
        $scope.screen2 = response.data.screenShots[1].screenUrl;
        $scope.screen3 = response.data.screenShots[2].screenUrl;
    });

});

//search
app.controller('searchctrl', function ($scope, $http, $location) {
    var url = window.location.href;
    var param = $location.absUrl().split("/");
    //local
    //var value = param[5];
//live
var value = param[6];
    //alert(value);
    
    var apiurl = "http://api.mobileplay.co/Search?text=" + value + "&portal=3";

    $http.get(apiurl).then(function (response) {
        $scope.games = response.data.contentList;
        console.log($scope.games);
    });

    $scope.search = function (searchtext) {
        redurl = "http://clickplay.games/web/Home/Search/" + searchtext;
        window.location.href = redurl
    }

    $scope.download = function (code, Name, physicalfile) {
        //alert(code + "," + Name + "," + physicalfile);
        var json = { "code": code, "name": Name, "physicalfile": physicalfile }

        $http.post("http://clickplay.games/web/Home/GetDownload", json).then(function (response) {
            var Status = response.data.DownloadList;
            //alert(Status);
            if (Status == "Unsubscribed") {
                window.location.href = "http://clickplay.games/web/Home/Subscription";
            }
            else if (Status == "MSISDN Not Found") {
                window.location.href = "http://clickplay.games/web/Home/Signin";
            }
            else {
                window.location.href = Status;
            }
        });
    }
});

//Category
app.controller('CatCtrl', function ($scope, $http, $location) {
    var param = $location.absUrl().split("/");
    //live
    var value = param[6];
    //var value = param[5];
    var url = "http://api.mobileplay.co/type?id=" + value + "&portal=3";

    $http.get(url).then(function (response) {
        $scope.games = response.data.contentList;
        $scope.type = response.data.contentList[0].type;
        //console.log($scope.games);
    });

    $scope.download = function (Name, type, physicalfile) {
        //alert(value + "," + Name + "," + type);
        var json = { "code": value, "name": Name, "physicalfile": physicalfile }

        $http.post("/Home/GetDownload", json).then(function (response) {
            var Status = response.data.DownloadList;
            //alert(Status);
            if (Status == "Unsubscribed") {
                http://clickplay.games/web
                    window.location.href = "http://clickplay.games/web/Home/Index";
            }
            else if (Status == "MSISDN Not Found") {
                //http://clickplay.games/web
                window.location.href = "http://clickplay.games/web/Home/Index";
            }
            else {
                window.location.href = Status;
            }
        });
    }
});

//Similar
app.controller('SimilarCtrl', function ($scope, $http) {
    
    $http.get("http://api.mobileplay.co/type?id=11&portal=3").then(function (response) {
        
        $scope.simcode0 = response.data.contentList[0].contentCode;
        $scope.simprev0 = response.data.contentList[0].previwUrl;

        $scope.simcode1 = response.data.contentList[1].contentCode;
        $scope.simprev1 = response.data.contentList[1].previwUrl;

        $scope.simcode2 = response.data.contentList[2].contentCode;
        $scope.simprev2 = response.data.contentList[2].previwUrl;

        $scope.simcode3 = response.data.contentList[3].contentCode;
        $scope.simprev3 = response.data.contentList[3].previwUrl;

        $scope.simcode4 = response.data.contentList[4].contentCode;
        $scope.simprev4 = response.data.contentList[4].previwUrl;
    });
});

//Discover
//Discover
app.controller('DiscoverCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Discover?id=44&portal=3").then(function (response) {
        $scope.games = response.data.discoverList;
console.log($scope.games);
    });
});


//TopFree
app.controller('Top10Ctrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=45&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (Name, type, physicalfile) {
        //alert(value + "," + Name + "," + type);
        var json = { "code": value, "name": Name, "physicalfile": physicalfile }

        $http.post("/Home/GetDownload", json).then(function (response) {
            var Status = response.data.DownloadList;
            alert(Status);
            if (Status == "Unsubscribed") {
                window.location.href = "/Home/Index";
            }
            else if (Status == "MSISDN Not Found") {
                window.location.href = "/Home/Index";
            }
            else {
                window.location.href = Status;
            }
        });
    }
});

//Popular
app.controller('PopularCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=47&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        alert(contentCode + "," + contentName + "," + price);
    }
});

//TREND
app.controller('TrendCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=46&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        alert(contentCode + "," + contentName + "," + price);
    }
});

//WeeklyLatest
app.controller('WeeklyCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=48&portal=3").then(function (response) {
        $scope.games = response.data.contentList;

        $scope.wecode = response.data.contentList[0].contentCode;
        $scope.wepreviw = response.data.contentList[0].previwUrl;
        $scope.wename = response.data.contentList[0].contentName;

        $scope.wecode1 = response.data.contentList[1].contentCode;
        $scope.wepreviw1 = response.data.contentList[1].previwUrl;
        $scope.wename1 = response.data.contentList[1].contentName;

        $scope.wecode2 = response.data.contentList[2].contentCode;
        $scope.wepreviw2 = response.data.contentList[2].previwUrl;
        $scope.wename2 = response.data.contentList[2].contentName;

        $scope.wecode3 = response.data.contentList[3].contentCode;
        $scope.wepreviw3 = response.data.contentList[3].previwUrl;
        $scope.wename3 = response.data.contentList[3].contentName;
    });
});

//Developer choice
app.controller('devCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=49&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
        $scope.devcode = response.data.contentList[0].contentCode;
        $scope.devpreviw = response.data.contentList[0].previwUrl;
        $scope.devname = response.data.contentList[0].contentName;

        $scope.devcode1 = response.data.contentList[1].contentCode;
        $scope.devpreviw1 = response.data.contentList[1].previwUrl;
        $scope.devname1 = response.data.contentList[1].contentName;

        $scope.devcode2 = response.data.contentList[2].contentCode;
        $scope.devpreviw2 = response.data.contentList[2].previwUrl;
        $scope.devname2 = response.data.contentList[2].contentName;

        $scope.devcode3 = response.data.contentList[3].contentCode;
        $scope.devpreviw3 = response.data.contentList[3].previwUrl;
        $scope.devname3 = response.data.contentList[3].contentName;

    });
});

//Online
app.controller('OnlineCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/OnlineGame/10").then(function (response) {
        $scope.games = response.data.gameList;
    });
});

//Free
app.controller('FreeCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=41&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

});

//rating
app.controller('ratingCtrl', function ($scope, $http, $location) {
    var param = $location.absUrl().split("/");
    var value = param[6];
    var json = { "gamecode": value }
    $http.post("GetRating", json).then(function (response) {
        $scope.Status = response.data.DownloadList;
    });

    //$scope.firstRate = 0;
    //$scope.secondRate = 3;
    //$scope.readOnly = true;
    //$scope.onItemRating = function (rating) {
    //    alert('On Rating: ' + rating);
    //};
});

//New Relese
app.controller('NewReleaseCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=51&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        //alert(contentCode + "," + contentName + "," + price);
    }
});

app.controller('MostSellingCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=48&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        //alert(contentCode + "," + contentName + "," + price);
    }
});

app.controller('KidsGameCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=52&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        //alert(contentCode + "," + contentName + "," + price);
    }
});

app.controller('PremiumGameCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=53&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        //alert(contentCode + "," + contentName + "," + price);
    }
});

app.controller('TrendingCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=55&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        //alert(contentCode + "," + contentName + "," + price);
    }
});

app.controller('RecommendedCtrl', function ($scope, $http) {
    $http.get("http://api.mobileplay.co/Category?id=43&portal=3").then(function (response) {
        $scope.games = response.data.contentList;
    });

    $scope.download = function (contentCode, contentName, price) {
        //alert(contentCode + "," + contentName + "," + price);
    }
});

