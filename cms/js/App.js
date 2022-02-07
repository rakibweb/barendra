var ecomApp = angular.module('ecomApp',[]);

ecomApp.controller('OrderController', function($scope, $http) {
	$scope.cancelorder = function (orderId) {
        //alert(orderId);
		var json = { "orderId": orderId }

		$http.post("http://www.shop.barendro.com/cms/Model/CancelOrder.php", json).success(function(response, status) 
        {
            $scope.result = response;
            alert(response);
            window.location.href="http://www.shop.barendro.com/cms/pendingorder.php";
        });
    };
    
    $scope.publish = function(ProductId, SectionId)
    {
        var json = { "ProductId": ProductId, "SectionId": SectionId }
        
        $http.post("Model/PublishProductSectionWise.php", json).success(function(response, status) 
        {
            $scope.message = response;
        });
    };
    
    $scope.deliverorder = function (orderId) {
		var json = { "orderId": orderId }

		$http.post("Model/deliverOrder.php", json).success(function(response, status) 
        {
            $scope.result = response;
            alert(response);
            window.location.reload(true);
        });
    };
    
    $scope.returnorder = function (orderId) {
		var json = { "orderId": orderId }

		$http.post("Model/returnOrder.php", json).success(function(response, status) 
        {
            $scope.result = response;
            alert(response);
            window.location.reload(true);
        });
    };
    
});

ecomApp.controller('ProductController', function($scope, $http) {
	$scope.myfunction = function (catId, subCatId) {
        //alert(catId + "---" + subCatId);
		var json = { "catId": catId, "subCatId": subCatId }

		$http.post("Model/GetProductCatWise.php", json).success(function(response, status) 
        {
            $scope.products = response;
        });
    };
    
    $scope.publish = function(ProductId, SectionId)
    {
        var json = { "ProductId": ProductId, "SectionId": SectionId }
        
        $http.post("Model/PublishProductSectionWise.php", json).success(function(response, status) 
        {
            $scope.message = response;
        });
    };
});

//function ProductController($scope) {
//	alert("fuck");
//	$scope.greeting = 'Hola!';
//}
//app.controller("hitMovieCtrl", function ($scope, $http, $location) {
 

    //var json = { "portalCode": "1000L0-Cont", "categoryCode": "1005L1-Hit", "contentType": "PK" }

    //$http.post("http://www.shop.barendro.com/portal/Home/GetPackageJson", json).then(function (response) {

        //$scope.hitmovies = response.data.pkList;
    //});

//});

