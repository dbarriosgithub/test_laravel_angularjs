@extends('layouts.app')
@section('content')
    <div class="container" ng-app="personApp" ng-controller= "mainController">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary btn-xs pull-right" data-target="modalEditNew" ng-click="addPerson()">Add Person</button>
                    </div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table table-bordered table-striped">
                            <tr>
                                <th>No.</th>
                                <th>Firstname</th>
                                <th>Secondname</th>
                                <th>Action</th>
                            </tr>
                            <tr ng-repeat="(index,itemperson) in person.person">
                                <td>
                                    @{{ index+1 }}
                                </td>
                                <td>@{{ itemperson.firstName }}</td>
                                <td>@{{ itemperson.lastName }}</td>
                              
                                <td>
                                    <button class="btn btn-success btn-xs" ng-click="editPerson(itemperson.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs" ng-click="deletePerson(itemperson.id)">Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="modalEditNew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">@{{isCreate?'New Person':'Edit Person'}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form ng-submit = "isCreate?submitPerson():updatePerson()">

                        <div class="alert alert-danger" ng-if="errors.length > 0">
                            <ul>
                                <li ng-repeat="error in errors">@{{error}}</li>
                            </ul>
                        </div>

                        <div class="form-group">
                            <label for="firstName">Firstname</label>
                            <input type="text" id="firstName" name="firstName "class="form-control" ng-model="personData.firstName"></input>
                        </div>
                        <div class="form-group">
                            <label for="lastName">lastName</label>
                            <input type="text" id="lastName" name="lastName" class="form-control" ng-model="personData.lastName"></input>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" name="btnEnviar" id="btnEnviar" value="Guardar">
                        </div>
                      </form>  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection