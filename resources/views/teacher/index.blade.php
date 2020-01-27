@extends('layouts.master')

@section('title','Teacher List')


@section('content')

  <div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Teacher List</h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                   
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Designation</th>
                                    <th>Email</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                             <?php $count = 1; ?>
                            @foreach($teachers as $teacher)
                            <tbody>
                                <tr>
                         
                                    <td>{{ $count++}}</td>
                                    <td>{{ $teacher->name}}</td>
                                    <td>{{ $teacher->designation}}</td>
                                    <td>{{ $teacher->email}}</td>
                                    <td>{{ $teacher->createdBy->name}}</td>
                                    <td>{{ $teacher->updatedBy->name}}</td>

                                    <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            
                                            <li><a href="{{ route('edit_teacher', ['id' => $teacher->id]) }}"><i class="icon-compose"></i> Edit</a></li>
                                               <li><a href="{{ route('delete_teacher', ['id' => $teacher->id]) }}"><i class="icon-compose"></i>Delete</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </td>
                                </tr>
                       
                            </tbody>
                            @endforeach
                        </table>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</div>


@endsection