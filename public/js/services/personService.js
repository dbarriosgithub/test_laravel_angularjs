angular.module('personService',[])
	   .factory('Person',function($http){
	   	return{
	   		get:function(){
	   		  return $http.get('/api/person/index');
	   		},
	   		save: function(personData){
	   		  return $http({
	   		  	 method:'POST',
	   		  	 url:'/api/person/store',
	   		  	 headers:{'Content-Type':'application/x-www-form-urlencoded'},
	   		  	 data:$.param(personData)
	   		  });	
	   		},
	   		destroy:function(id){
	   			return $http.delete('/api/person/destroy/'+id);
	   		},
	   		show:function(id){
	   		   return $http.get('/api/person/show/'+id);
	   		},
	   		update: function(personData){
	   		  return $http({
	   		  	 method:'PUT',
	   		  	 url:'/api/person/update/'+personData.id,
	   		  	 headers:{'Content-Type':'application/x-www-form-urlencoded'},
	   		  	 data:$.param(personData)
	   		  });	
	   		},

	   	}
});	