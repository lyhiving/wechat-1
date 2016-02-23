@extends('admin.layout')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">粉丝管理</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<div class="col-xs-6">全部粉丝</div>
                	<div class="col-xs-6"></div>
                	<div class="clearfix"></div>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th class="text-center">用户ID</th>
                                    <th class="text-center">头像</th>
                                    <th class="text-center">昵称</th>
                                    <th class="text-center">性别</th>
                                    <th class="text-center">分组ID</th>
                                    <th class="text-center">关注时间</th>
                                    <th class="text-center">操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                	<tr class="gradeU">
                                	    <td class="text-center">{{ $user->id }}</td>
                                	    <td class="text-center"><img width="32px" height="32px" src="{{ $user->headimgurl }}" /></td>
                                	    <td class="text-center">{{ $user->nickname }}</td>
                                	    <td class="text-center">{{ $user->sex }}</td>
                                	    <td class="text-center">{{ $user->groupid }}</td>
                                	    <td class="text-center">{{ $user->subscribe_time }}</td>
                                	    <td class="text-center">
                                	    	<button class="btn btn-primary btn-xs">分组</button>
                                	    	<button class="btn btn-primary btn-xs">备注</button>
                                	    </td>
                                	</tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>    

    <div class="row">
    	<div class="col-xs-6">
    		
    	</div>
    	<div class="col-xs-6">
    		{{ $users->render() }}
    	</div>
    </div>                                
</div>
@stop