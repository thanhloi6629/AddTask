    @extends('layouts.app')
   
    @section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
               
                <div class="panel-heading">
                    New Task
                </div>

                <div class="panel-body">
                    <!-- New Task Form -->
                    <div class="form-group ">
                        <form action="{{url('task')}}" method="POST" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label"  >Task</label>
                                <div class="col-sm-6">

                                    <input type="text" name="name" id="task-name" class="form-control" placeholder="Nhập tên"
                                        aria-describedby="helpId">
                                </div>

                            </div>
                            <div class="form-group">   
                                <label for="task-email" class="col-sm-3 control-label" >Email</label>
                                <div class="col-sm-6">

                                    <input type="email" name="email" id="task-name" class="form-control" placeholder="Nhập Email"
                                        aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="form-group">   
                                <label for="task-phone" class="col-sm-3 control-label">Phone</label>
                                <div class="col-sm-6">

                                    <input type="text" name="phone" id="task-name" class="form-control"  placeholder="Nhập số điện thoại" required
                                        aria-describedby="helpId">
                                </div>
                            </div>
                            <div class="form-group">   
                                <label for="task-adress" class="col-sm-3  control-label"  >Address</label>
                                <div class="col-sm-6">

                                    <input type="text" name="address" id="task-name" class="form-control" placeholder="Nhập địa chỉ"
                                        aria-describedby="helpId">
                                </div>
                            </div>
                           

                            <!-- Add Task Button -->
                            <div class="form-group">
                                <div class="col-sm-offset-5 col-sm-6 ">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fa fa-btn fa-plus"></i> Add Task
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
            <!-- Curent task -->
            @if(count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">Current Task</div>
                <div class="panel-body">
                    <table class="table table-striped table-responsive">
                        <thead class="thead-inverse">
                            <tr>
                                <th>Task</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td class="table-text col-2">
                                    <div>{{$task -> name}}</div>
                                </td>
                                <td class="table-text col-2">
                                    <div>{{$task -> email}}</div>
                                </td>
                                <td class="table-text col-2">
                                    <div>{{$task -> phone}}</div>
                                </td>
                                <td class="table-text col-2">
                                    <div>{{$task -> address}}</div>
                                </td>
                         
                                <td class="col-4">
                                    <form action="{{url('task/'.$task->id)}}" method="post">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i> Delete
                                            </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endsection