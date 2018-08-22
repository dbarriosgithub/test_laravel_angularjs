angular.module('mainCtrl',[])
	.controller('mainController',function($scope,$http,Person){

		$scope.personData = {};
		$scope.loading = true;
		$scope.errors = []; //variable para manejar los errores generados en las validaciones 

		
		//obtener o  listar todas  las personas llamando al servicio get()
		//--------------------------------------------------------------
		Person.get()
		 	  .success(function(data){
		 	  	$scope.person = data;
		 	  	$scope.loading =  false;
		 	   }
		 	 )
		 	  .error(function(error){
		 	  	$scope.recordErrors(error);
		 	  });	

       //guardar una persona
       //-----------------------------------------------------------
	    $scope.submitPerson =  function(){
	    	$scope.loading = true;

	    	Person.save($scope.personData)
	    		   .success(function(getData){
	    		   	Person.get() // si es exitoso se actualiza el listado de personas
	    		   		.success(function(getData){
	    		   			$scope.person = getData;
	    		   	        $scope.loading = false;
   							$('#modalEditNew').modal('hide');

	    		   		});	
	    		   	  
	    		   })
	    		   .error(function(data){
	    		   	 console.log(data);
	    		   });
	    };

	    //delete una persona
	    //-------------------------------------------------
	    $scope.deletePerson =  function(id){
	    	$scope.loading =  true;
	    	Person.destroy(id)
	    		  .success(function (data){
		    		  	Person.get() // si es exitoso se actualiza el listado de personas
		    		  	.success(function(getData){
		    		  		$scope.person = getData;
		    		  	    $scope.loading = false;
		    		  	});
	    		  	
	    		  });	

	    };

	    $scope.addPerson =  function(){
	    	$scope.errors = [];
	    	$('#modalEditNew').modal('show');
	    	$scope.isCreate=true;
	    };

	    $scope.editPerson = function(id){
	    	$scope.errors = [];
	    	Person.show(id)
	    	  .success(function(data){
	    	   $scope.personData = data.person;
	    	   $scope.isCreate=false;
	    	  $('#modalEditNew').modal('show');
	    	});	
	    };

	    $scope.updatePerson = function (){
	    	$scope.loading = true;

	    	console.log($scope.personData);

	    	Person.update($scope.personData)
	    		   .success(function(getData){
	    		   	Person.get() // si es exitoso se actualiza el listado de personas
	    		   		.success(function(getData){
	    		   			$scope.person = getData;
	    		   	        $scope.loading = false;
   							$('#modalEditNew').modal('hide');
	    		   		});	
	    		   	  
	    		   })
	    		   .error(function(error){
	    		   	// en caso de error se registra
	    		   	$scope.recordErrors(error);
	    		   });
	    };

	   $scope.recordErrors = function (error) {
         if(!error.exception){
        	angular.forEach(error.errors, function(value, key) {
 				 $scope.errors.push(value[0]);
			});
		 }
       };

	});	