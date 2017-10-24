@extends('admin.admin-master')
 @section('content')
    <div class="content-wrapper">
	    <!-- Content Header (Page header) -->
	    <section class="content-header">
	      <h1>
	        Calendar
	        <small>Control panel</small>
	      </h1>
	      <ol class="breadcrumb">
	        <li><a href="{{url('admin')}}"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li>Calendar</li>
	      </ol>
	    </section>
	    <!-- Main content -->
	    <section class="content">
	      <div class="row">
	        <!-- /.col -->
	        <div class="col-md-12">
	          <div class="box box-primary">
	            <div class="box-body no-padding">
	              <!-- THE CALENDAR -->
	              <div id="calendar"></div>
	            </div>
	            <!-- /.box-body -->
	          </div>
	          <!-- /. box -->
	        </div>
	        <!-- /.col -->
	      </div>
	      <!-- /.row -->
	    </section>
	    <!-- /.content -->
  	</div>
 @stop
 @section('script')
     <script>
	    var date = new Date()
	    var d    = date.getDate(),
	        m    = date.getMonth(),
	        y    = date.getFullYear(),
	        i    =0
	    $('#calendar').fullCalendar({
	      header    : {
	        left  : 'prev,next today',
	        center: 'title',
	        right : 'month,agendaWeek,agendaDay'
	      },
	      buttonText: {
	        today: 'today',
	        month: 'month',
	        week : 'week',
	        day  : 'day'
	      },
	      //Random default events
	      events    : [
	      <?php
	      if(isset($result_calendar)){
		      for($i=1;$i<count($result_calendar);$i=$i+1){
		      	if($result_calendar[$i] != $result_calendar[$i-1]){
		        echo("{
		          title          : 'Order',
		          start          : new Date(y, m, $result_calendar[$i]),
		          allDay         : true,
		          url            : 'calendar_detail/$result_calendar[$i]',
		          backgroundColor: '#f56954', //red
		          borderColor    : '#f56954' //red
		        },");
		        } 
		    }
	        }
	        ?>        
	      ]   
    })
    </script>
 @stop