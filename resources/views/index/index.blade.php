<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
    <link href='./css/fullcalendar.css' rel='stylesheet' />
    <link href='./css/fullcalendar.print.css' rel='stylesheet' media='print' />
    <link href="./css/bootstrap.css" rel="stylesheet" />
    <link href="./css/font-awesome.css" rel="stylesheet" />
    <link href="./css/start-page.css" rel="stylesheet" />

    <script src='./lib/moment.min.js'></script>
    <script src='./lib/jquery.min.js'></script>
    <script src='./lib/fullcalendar.min.js'></script>
    <script src="./lang/uk.js"></script>
    <script src="./lib/bootstrap.js"></script>
    <script src="./lib/myJs.js"></script>

<script>
	$(document).ready(function() {
        var date = new Date();
        lang: 'es'
		$('#calendar').fullCalendar({
			defaultDate: date,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			events: [
                {
                    title: 'Тест',
                    url: '#',
                    start: date,
                    end: date
                },
                {
                    title: 'Тест',
                    url: '#',
                    start: '2015-10-07',
                    end: '2015-10-07'
                }
			]
		});
		
	});

</script>
</head>
<body>
    
    <div class="header navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="http://www.oe.if.ua/"><img  src="./img/OE_logo.bmp"></a>
                </div>
                    <div class="collapse navbar-collapse" id="responsive-menu">
                        <ul class="nav navbar-nav">
                            <li class="header-href"><a href="{{ route('admin') }}">admin page</a></li>
                            <li class="dropdown header-href">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">place2 <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">place1</a></li>
                                    <li><a href="#">place2</a></li>
                                    <li><a href="#">place3</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">place4</a></li>
                                </ul>
                            </li>
                            <li class="header-href"><a href="#">place3</a></li>
                            <li class="header-href"><a href="#">place4</a></li>
                        </ul>
                    </div>
            </div>
          </div>
    
  
    
        <div id="carousel" class="carousel slide">
          <!--Індикатори слайдів-->
        <ol class="carousel-indicators">
            <li class="active" data-target="#carousel" data-slide-to="0"></li>  
            <li data-target="#carousel" data-slide-to="1"></li>  
            <li data-target="#carousel" data-slide-to="2"></li>  
        </ol>
          <!--Слайди-->
        <div class="carousel-inner">
            <div class="item active">
                <img src="./img/time-management-why-its-important-and-tools-that-can-help-1920x800.jpg" alt="">
                <div class="carousel-caption carousel-caption-for-text">
                    <h3>Збережи свій час</h3>
                    <p>зареєструйся через онлайн чергу!</p>
                </div>
            </div>
            <div class="item">
                <img src="./img/kids4.jpg" alt="">
                <div class="carousel-caption carousel-caption-for-text">
                    <h3>Прикарпаттяобленерго</h3>
                    <p>ми працюємо поки ви відпочиваєте</p>
                </div>
            </div> 
            <div class="item">
                <img src=".//img/screenshot_0.jpg" alt="">
                <div class="carousel-caption">
                    <h3>Є питання??? </h3>
                    <p>Прийди та отримай відповідь!!!</p>
                </div>
            </div>
        </div>
        
          
          <!--Стрілки переключення слайдів-->
        <a href="#carousel" class="left carousel-control" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a href="#carousel" class="right carousel-control" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>  
        </a>
        
      </div>
        
  
    
    <div class="container main-content">
        <div class="row content">
            <div class="col-xs-7">
                <div class="calendar" id='calendar'></div>
            </div>
            <div class="col-xs-5">
            <div id="accordion" class="panel-group">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#collapse-1" data-parent="#accordion" data-toggle="collapse">Період з 9 до 13:00</a>
                            </h4>
                        </div>
                        <div id="collapse-1" class="panel-collapse collapse in">
                            <div class="panel-body">
                                @foreach($cur_settings as $cur_set)
                                @if($cur_set->period_end_time <= '13:01')
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">{{$cur_set->period_start_time}} - {{$cur_set->period_end_time}}</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes reg_but" type="button" data-toggle="modal" data-target="#modal-1" start-time="{{$cur_set->period_start_time}}" end-time="{{$cur_set->period_end_time}}">Замовити</a>
                                </div>
                                @endif
                                @endforeach
                                <!--
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">9:20 - 9:40</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">9:40 - 10:00</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">10:00 - 10:20</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">10:20 - 10:40</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">10:40 - 11:00</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">11:20 - 11:40</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">11:40 - 12:00</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div>
                                   <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">12:20 - 12:40</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">12:40 - 13:00</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div> -->
                            </div>
                        </div>
                    </div>        
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a href="#collapse-2" data-parent="#accordion" data-toggle="collapse">Період з 13:00</a>
                            </h4>
                        </div>
                        <div id="collapse-2" class="panel-collapse collapse">
                            <div class="panel-body">
                                @foreach($cur_settings as $cur_set)
                                @if($cur_set->period_end_time >= '13:01')
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">{{$cur_set->period_start_time}} - {{$cur_set->period_end_time}}</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes reg_but" type="button" data-toggle="modal" data-target="#modal-1" start-time="{{$cur_set->period_start_time}}" end-time="{{$cur_set->period_end_time}}">Замовити</a>
                                </div>
                                @endif
                                @endforeach
                                <!--
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">9:20 - 9:40</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">9:40 - 10:00</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">10:00 - 10:20</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">10:20 - 10:40</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">10:40 - 11:00</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">11:20 - 11:40</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">11:40 - 12:00</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div>
                                   <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">12:20 - 12:40</a>
                                    <a href="#" class="btn btn-warning second disabled">Вільно</a>
                                    <a href="#" class="btn btn-warning btn-threes" type="button" data-toggle="modal" data-target="#modal-1">Замовити</a>
                                </div>
                                <div class="btn-group btn-group-md btn-in-accordion">
                    <a href="" class="btn btn-default top disabled">12:40 - 13:00</a>
                    <a href="#" class="btn btn-danger second disabled">Зайнято</a>
                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                </div> -->
                            </div>
                        </div>
                    </div>        
                </div>
        </div>  
    </div>
    </div>
    
    <div class="container footer">
        <div class="row footer-content">
            <div class="col-xs-3 footer-emblem">
                <a href="http://www.oe.if.ua/"><img class="footer-img" src="./img/OE_logo.bmp"></a>
            </div>
            <div class="col-xs-6 obl-info">
                <p class="obl-info-first">© ПАТ "Прикарпаттяобленерго" - 2015</p>
                <p class="obl-info-second">Сайт ПАТ "Прикарпаттяобленерго" працює з 13.07.2001 року.</p>
            </div>
            <div class="col-xs-6"></div>
        </div>
    </div>
    
	<div class="modal fade" id="modal-1">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title">Підтвердження замовлення</h4>
                </div>
                <div class="modal-body">
                    <div role="form">
                      <div class="form_group">
                          <p>Введіть своє прізвище, ім*я, по батькові та свій особовий рахунок(по бажанню) та натисніть кнопку підтвердити, <strong>після чого ви отримаєте чотирьохзначний код, який і буде вашим ідентифікатором при прийомі</strong></p>
<p id="demo"></p>
                      </div>
                      <div class="form-group">
                        <label for="user_name">ПІП</label>
                        <input type="email" class="form-control" id="user_name" placeholder="Прізвище Ім'я По батькові">
                      </div>
                      <div class="form-group">
                        <label for="personal_key">Особовий рахунок</label>
                        <input type="text" class="form-control" id="personal_key" placeholder="Ваш особовий рахунок">
                      </div>
                        <input type="hidden" id="start_time">
                        <input type="hidden" id="end_time">
                      <button type="button" class="btn btn-success btn-lg btn-sbt" onclick="myFunction()">Підтвердити <i class="fa fa-check"></i></button>
                    </div>
                </div>
                <div class="modal-footer"> 
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити замовлення</button>
                </div>
            </div>  
        </div>
      </div>   
</body>
</html>
<script>
    $(document).ready(function(){
        $('.reg_but').click(function(){
            $("#start_time").val($(this).attr('start-time'));
            $("#end_time").val($(this).attr('end-time'));
        });
        $('.btn-sbt').click(function(){
            $.ajax({
                method:"POST",
                url: '{{ route('queue_create') }}',
                data:{
                    start_time : $("#start_time").val(),
                    end_time : $("#end_time").val(),
                    name: $('#user_name').val(),
                    personal_key: $('#personal_key').val()
                }
            }).done(function(msg){
                alert(msg);
            });
        });
    });
    function myFunction() {
        var x = document.getElementById("demo");
        x.innerHTML = Math.floor((Math.random() * 8999) + 1000);
    }
</script>
