@extends('layouts.master')

@section('title','Task List')


@section('content')

  <div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Task List</h4>
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
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Notification Before</th>
                                    <th>Teacher</th>
                                    <th>Created By</th>
                                    <th>Updated By</th>
                                </tr>
                            </thead>
                             <?php $count = 1; ?>
                            @foreach($tasks as $task)
                            <tbody>
                                <tr>
                         
                                    <td>{{ $count++}}</td>
                                    <td>{{ $task->title}}</td>
                                    <td>{{ $task->description}}</td>
                                    <td>{{ $task->start_time}}</td>
                                    <td>{{ $task->end_time}}</td>
                                    <td>{{ $task->notify_before}}</td>
                                    <td>{{ $task->teacher->name}}</td>
                                    <td>{{ $task->createdBy->name}}</td>
                                    <td>{{ $task->updatedBy->name}}</td>

                                        <td class="text-center">
                                <ul class="icons-list">
                                    <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="icon-menu9"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right">
                                            
                                            <li><a href="{{ route('edit_task', ['id' => $task->id]) }}"><i class="icon-compose"></i> Edit</a></li>
                                               <li><a href="{{ route('delete_task', ['id' => $task->id]) }}"><i class="icon-compose"></i>Delete</a></li>
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