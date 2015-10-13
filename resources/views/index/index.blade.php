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
    <script src="./lib/moment.js"></script>
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
                            <div class="panel-body am_time">
                                @foreach($cur_settings as $key=>$cur_set)
                                @if($cur_set->period_end_time <= '13:01')
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">{{substr($cur_set->period_start_time, 0, -3)}} - {{substr($cur_set->period_end_time, 0, -3)}}</a>
                                    <a href="#" class="btn second disabled @if ($check_array[$key] == 1) btn-warning"> Вільно @else btn-danger">Зайнято @endif</a>
                                    @if ($check_array[$key] == 1)
                                    <a href="#" class="btn btn-warning btn-threes reg_but" type="button" data-toggle="modal" data-target="#modal-1" start-time="{{$cur_set->period_start_time}}" end-time="{{$cur_set->period_end_time}}">Замовити</a>
                                    @else
                                    <a href="#" class="btn btn-danger disabled">Замовити</a>
                                    @endif
                                </div>
                                @endif
                                @endforeach
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
                            <div class="panel-body pm_time">
                                @foreach($cur_settings as $key => $cur_set)
                                @if($cur_set->period_end_time >= '13:01')
                                <div class="btn-group btn-group-md btn-in-accordion">
                                    <a href="" class="btn btn-default top">{{substr($cur_set->period_start_time, 0, -3)}} - {{substr($cur_set->period_end_time, 0, -3)}}</a>
                                    <a href="#" class="btn btn-warning second disabled">@if ($check_array[$key] == 1) Вільно @else Зайнято @endif </a>
                                    <a href="#" class="btn btn-warning btn-threes reg_but" type="button" data-toggle="modal" data-target="#modal-1" start-time="{{$cur_set->period_start_time}}" end-time="{{$cur_set->period_end_time}}">Замовити</a>
                                </div>
                                @endif
                                @endforeach
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
                        <input type="hidden" id="date">
                      <button type="button" class="btn btn-success btn-lg btn-sbt">Підтвердити <i class="fa fa-check"></i></button>
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

        $(document).on('click', '.fc-today-button', function() {
            alert('ss');
            $('#date').val(today);
            getTimePeriod(cur_date);
            //alert(today);
        });

        var today = moment().format("YYYY-MM-DD");
        var next_day = moment().add(5,'d').format("YYYY-MM-DD");
        var cur_date = moment().format("YYYY-MM-DD");
        $('#date').val(cur_date);
        lang: 'es';
        var tempVar = "";
        /**
         *
         */
        $('#calendar').fullCalendar({
            defaultDate: date,
            header: {
                left:'title',
                center:'',
                right:  'prev,next'
            },
            //editable: true,
            eventLimit: true, // allow "more" link when too many events
            dayClick: function(date, allDay, jsEvent, view) {//todo функції для роботи з івентами(дивись документацію)
                // change the day's background color just for fun
                if(date.format() >= today && date.format() <= next_day){
                    if (tempVar == "")
                    {
                        $(this).css('background-color', '#00F1FF');
                        tempVar = this;
                    }
                    else
                    {
                        $(tempVar).css('background-color', 'grey');
                        $(this).css('background-color', '#00F1FF');

                        tempVar = this;

                    }
                    cur_date = date.format();
                    $('#date').val(cur_date);
                    getTimePeriod();
                }
            }
        });

        /**
         *
         * @param current_date
         */
        function getTimePeriod(){//todo функція перемалювання розкладу сторінок
            $.ajax({
                dataType: 'json',
                method:"POST", //Todo Перевести на метод пост
                url: '{{ route('queue_day_status') }}',
                data:{
                    date: $('#date').val(),
                    _token: '{{csrf_token()}}'
                }
            }).done(function(data){//Провірити правильність роботи нового скріпта
                $('.am_time').children().remove();
                $('.pm_time').children().remove();
                $.each(data.cur_settings, function(key, val){
                    var but1_val ='';
                    var but2_val ='';
                    if(data.res_array[key] == 1){
                         but1_val = ' btn-warning">Вільно';
                         but2_val = '<a href="#" class="btn btn-warning btn-threes reg_but" type="button" data-toggle="modal" data-target="#modal-1" start-time="'+val.period_start_time+ '" end-time="'+val.period_end_time+'">Замовити</a>';
                    }else{
                         but1_val = ' btn-danger">Зайнято';
                         but2_val = '<a href="#" class="btn btn-danger disabled">Замовити</a>';
                    }
            var template =  ' <div class="btn-group btn-group-md btn-in-accordion">'+
                            '<a href="" class="btn btn-default top">'+val.period_start_time.slice(0,-3)+' - '+val.period_end_time.slice(0,-3)+'</a>'+
                            '<a href="#" class="btn second disabled'+ but1_val+'</a>'+
                            but2_val+
                            '</div>' ;
                    if(val.period_end_time < "13:01"){
                        $('.am_time').append(template);
                    }
                    if(val.period_end_time > "13:01"){
                        $('.pm_time').append(template);
                    }
                });
            });
        }

        /**
         *
         */
        $(document).on('click', '.reg_but', function(){
            $("#start_time").val($(this).attr('start-time'));
            $("#end_time").val($(this).attr('end-time'));
        });
        $('.btn-sbt').click(function(){
            $.ajax({
                method:"POST", //Todo Перевести на метод пост
                url: '{{ route('queue_create') }}',
                data:{
                    start_time : $("#start_time").val(),
                    end_time : $("#end_time").val(),
                    name: $('#user_name').val(),
                    personal_key: $('#personal_key').val(),
                    date: $('#date').val(),
                    _token: '{{csrf_token()}}'//todo вичитати про токени (повинні бути в кожному ajax запиті
                }
            }).done(function(msg){
                alert(msg);
                getTimePeriod();
                $('#modal-1').modal('hide');
            });
        });

    });
    /**
     *
     */
    function myFunction() {
        var x = document.getElementById("demo");
        x.innerHTML = Math.floor((Math.random() * 8999) + 1000);
    }
</script>
