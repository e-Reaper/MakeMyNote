function listMyTask($scope, $http,$timeout) {
	
	$http.get('http://127.0.0.1/todo/index.php/Cards/FetchCards').success(function(data) {  // fetch all cards 
		$scope.response = data;
		$scope.cards = data;
		if(data.length==0){
			$scope.noresults = true;
		}else{
			$scope.noresults = false;
		}
		$scope.msg = '';
	});
	
	$scope.done = function(id) {
		if(id) {
			$http.delete('http://127.0.0.1/todo/index.php/Cards/DeleteCard/'+id).success(function(data) {
			$scope.response = data;
			$scope.cards = data;
			if(data.length==0){
				$scope.noresults = true;
			}else{
				$scope.noresults = false;
			}
			});
			$scope.msg = 'Your task has been deleted';
			$timeout(function() {
				$scope.msg = '';
			},1000);

		}
		
	}
	
	$scope.create = function() {
		var content = document.getElementById('note').value;
		if(content.trim() !== '') {
			$http.post('http://127.0.0.1/todo/index.php/Cards/CreateCard/',$scope.card).success(function(data) {
				$scope.response = data;
				$scope.card = '';
				$scope.cards = data;
				if (data.length==0) {
					$scope.noresults = true;
				}
				else {
					$scope.noresults = false;
				}
				$scope.msg = 'You have created a new task';
				$timeout(function(){ 
					$scope.msg = '';
				}, 1000);
			});
		}
	}
}

