<!DOCTYPE html>
<html lang="uk">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Адміністративна панель</title>

    <!-- Bootstrap -->
      <link href="./css/bootstrap.css" rel="stylesheet">
      <link href=".//css/font-awesome.css" rel="stylesheet">
      <link href=".//css/admin-page.css" rel="stylesheet">
      <link href=".//css/hint.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
          <div class="header navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="http://www.oe.if.ua/"><img  src="./img/OE_logo.bmp"></a>
                </div>
                    <div class="collapse navbar-collapse" id="responsive-menu">
                        <ul class="nav navbar-nav">
                            <li class="header-href"><a href="{{ route('index') }}">Calendar</a></li>
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
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <h1 class="text-center">Натисність <strong>лівою</strong> кнопкою миші на поле вводу та виберіть дату</h1>
            <div class="col-xs-5"></div>
            <div class="col-xs-3">
                <input type="date" id="dataToday" class="input-date">
                    <script>
                        document.getElementById('dataToday').valueAsDate = new Date();
                    </script>
            </div>
            <div class="col-xs-4"></div> 
            </div>
        </div>

        <div class="row">
            <div class="col-xs-5 formAddFromLive">
                <h4 class="formCaption">Форма для додавання споживачів з живої черги</h4>
                <div class="form-horizontal" role="form">
                    <div class="form-group">
                        <label for="real_queue_form_name" class="col-sm-5 control-label">ПІП</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="real_queue_form_name" placeholder="ПІП">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="real_queue_form_per_num" class="col-sm-5 control-label">Особовий рахунок</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="real_queue_form_per_num" placeholder="Особовий">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-5 control-label">Період</label>
                        <div class="col-sm-7">
                            <select id="real_queue_form_time" class="form-control">
                                <option value="">Виберіть період</option>
                                @foreach ($cur_settings as $key => $cur_set)
                                <option value="{{substr($cur_set->period_start_time, 0, -3)}}">{{substr($cur_set->period_start_time, 0, -3)}} - {{substr($cur_set->period_end_time, 0, -3)}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-5">
                            <button  id="real_queue_form_sub_but" class="btn btn-warning">Підтвердити</button>
                        </div>
                        <div class="col-sm-5">
                            <label id="labelClear">Заповніть будь-ласка обов*язкові поля</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-7">
                <table id="main_queue_table" class="table table-striped table-hover mainTable">
                    <caption>Гібридна таблиця</caption>
                    <tr>
                        <th>Період</th>
                        <th>ПІП</th>
                        <th>Код</th>
                        <th>Особовий</th>
                        <th>Додати</th>
                    </tr>
                    @foreach ($periods as $key=>$period)

                            <tr class="rowInTable1 queue_period" data-value="{{substr($period['period_start_time'] ,0, -3)}}">
                                <td rowspan="{{$period['count']}}" class="contentInTable1" id="periodOnTable1">{{substr($period['period_start_time'] ,0, -3)}} - {{substr($period['period_end_time'], 0, -3)}}</td>

                          @foreach ($period['queue'] as $k => $que)
                                @if ($k != 0)
                                    <tr class="rowInTable1 queue_period" data-value="{{substr($period['period_start_time'] ,0, -3)}}">
                                @endif
                                        <td class="contentInTable1">{{$que->user_name}}</td>
                                        <td class="contentInTable1">{{substr($que->register_key,-4)}}</td>
                                        <td class="contentInTable1">{{$que->user_personal_key}}</td>
                                @if($que->is_real_queue)
                                        <td class="contentInTable1 btnConfirm"><a href="#" data-id="{{$que->id}}" class="btn btn-warning reg_confirm_but" @if($que->is_present) disabled >Присутній @else>Відмітити(жива черга) @endif</a></td>
                                @else
                                        <td class="contentInTable1 btnConfirm"><a href="#" data-id="{{$que->id}}" class="btn btn-warning reg_confirm_but" @if($que->is_present) disabled >Присутній @else >Відмітити @endif</a></td>
                                @endif
                                    </tr>
                          @endforeach
                    @endforeach

                </table>
            </div>
        </div>

        <!--<div class="row">-->
            <!--<div class="col-xs-5 col-xs-offset-7">-->
                <!--<div id="accordion" class="panel-group">-->
                    <!--<div class="panel panel-default">-->
                        <!--<div class="panel-heading">-->
                            <!--<h4 class="panel-title">-->
                                <!--<a href="#collapse-1" data-parent="#accordion" data-toggle="collapse">Період з 9 до 13:00</a>-->
                            <!--</h4>-->
                        <!--</div>-->
                        <!--<div id="collapse-1" class="panel-collapse collapse in">-->
                            <!--<div class="panel-body am_time">-->
                                <!--<div class="btn-group btn-group-md">-->
                                        <!--<a href="" class="btn btn-default periodOnAdminPage first">10:00 - 10:20</a>-->
                                        <!--<div class="btn-group">-->
                                            <!--<a href="#" class="btn btn-warning periodOnAdminPage btnRegister" data-toggle="dropdown">Вільно <i class="fa fa-angle-right"></i></a>-->
                                            <!--<ul class="dropdown-menu dropdownMenuForAdmin" role="menu">-->
                                                <!--<li><a href="#">Вася Пупкін 3356</a></li>-->
                                                <!--<li><a href="#">Тест Тест 4567</a></li>-->
                                                <!--<li><a href="#">Тест Пупкін 4567</a></li>-->
                                                <!--<li class="divider"></li>-->
                                                <!--<li><a href="#" data-toggle="modal" data-target="#modal-4">Зареєструвати з живої черги</a></li>-->
                                            <!--</ul>-->
                                        <!--</div>-->
                                <!--</div><br>-->
                                <!--<div class="btn-group btn-group-md">-->
                                    <!--<a href="" class="btn btn-default periodOnAdminPage first">10:00 - 10:20</a>-->
                                    <!--<div class="btn-group">-->
                                        <!--<a href="#" class="btn btn-warning periodOnAdminPage btnRegister" data-toggle="dropdown">Вільно <i class="fa fa-angle-right"></i></a>-->
                                        <!--<ul class="dropdown-menu dropdownMenuForAdmin" role="menu">-->
                                            <!--<li><a href="#">Вася Пупкін 3356</a></li>-->
                                            <!--<li><a href="#">Тест Тест 4567</a></li>-->
                                            <!--<li><a href="#">Тест Пупкін 4567</a></li>-->
                                            <!--<li class="divider"></li>-->
                                            <!--<li><a href="#" data-toggle="modal" data-target="#modal-4">Зареєструвати з живої черги</a></li>-->
                                        <!--</ul>-->
                                    <!--</div>-->
                                <!--</div><br>-->
                                <!--<div class="btn-group btn-group-md">-->
                                    <!--<a href="" class="btn btn-default periodOnAdminPage first">10:00 - 10:20</a>-->
                                    <!--<div class="btn-group">-->
                                        <!--<a href="#" class="btn btn-warning periodOnAdminPage btnRegister" data-toggle="dropdown">Вільно <i class="fa fa-angle-right"></i></a>-->
                                        <!--<ul class="dropdown-menu dropdownMenuForAdmin" role="menu">-->
                                            <!--<li><a href="#">Вася Пупкін 3356</a></li>-->
                                            <!--<li><a href="#">Тест Тест 4567</a></li>-->
                                            <!--<li><a href="#">Тест Пупкін 4567</a></li>-->
                                            <!--<li class="divider"></li>-->
                                            <!--<li><a href="#" data-toggle="modal" data-target="#modal-4">Зареєструвати з живої черги</a></li>-->
                                        <!--</ul>-->
                                    <!--</div>-->
                                <!--</div><br>-->
                                <!--<div class="btn-group btn-group-md">-->
                                    <!--<a href="" class="btn btn-default periodOnAdminPage first">10:00 - 10:20</a>-->
                                    <!--<div class="btn-group">-->
                                        <!--<a href="#" class="btn btn-warning periodOnAdminPage btnRegister" data-toggle="dropdown">Вільно <i class="fa fa-angle-right"></i></a>-->
                                        <!--<ul class="dropdown-menu dropdownMenuForAdmin" role="menu">-->
                                            <!--<li><a href="#">Вася Пупкін 3356</a></li>-->
                                            <!--<li><a href="#">Тест Тест 4567</a></li>-->
                                            <!--<li><a href="#">Тест Пупкін 4567</a></li>-->
                                            <!--<li class="divider"></li>-->
                                            <!--<li><a href="#" data-toggle="modal" data-target="#modal-4">Зареєструвати з живої черги</a></li>-->
                                        <!--</ul>-->
                                    <!--</div>-->
                                <!--</div><br>-->
                                <!--<div class="btn-group btn-group-md">-->
                                    <!--<a href="" class="btn btn-default periodOnAdminPage first">10:00 - 10:20</a>-->
                                    <!--<div class="btn-group">-->
                                        <!--<a href="#" class="btn btn-warning periodOnAdminPage btnRegister btnEmployed" data-toggle="dropdown">Зайнято <i class="fa fa-angle-right"></i></a>-->
                                        <!--<ul class="dropdown-menu dropdownMenuForAdmin" role="menu">-->
                                            <!--<li>на даний момент всі диспетчера</li>-->
                                            <!--<li>зайняті, список зареєстрованих:</li>-->
                                            <!--<li class="divider"></li>-->
                                            <!--<li><a href="#">Вася Пупкін 3356</a></li>-->
                                            <!--<li><a href="#">Тест Тест 4567</a></li>-->
                                            <!--<li><a href="#">Тест Пупкін 4567</a></li>-->
                                            <!--<li class="divider"></li>-->
                                            <!--<li><a href="#" data-toggle="modal" data-target="#modal-4">Зареєструвати з живої черги</a></li>-->
                                        <!--</ul>-->
                                    <!--</div>-->
                                <!--</div><br>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<div class="panel panel-default">-->
                        <!--<div class="panel-heading">-->
                            <!--<h4 class="panel-title">-->
                                <!--<a href="#collapse-2" data-parent="#accordion" data-toggle="collapse">Період з 13:00</a>-->
                            <!--</h4>-->
                        <!--</div>-->
                        <!--<div id="collapse-2" class="panel-collapse collapse">-->
                            <!--<div class="panel-body pm_time">-->
                                <!--<div class="btn-group btn-group-md">-->
                                    <!--<a href="" class="btn btn-default periodOnAdminPage">8:00</a>-->
                                    <!--<a href="#" class="btn btn-warning periodOnAdminPage">Вільно</a>-->
                                <!--</div>-->
                                <!--<div class="btn-group btn-group-md">-->
                                    <!--<a href="" class="btn btn-default periodOnAdminPage">8:00</a>-->
                                    <!--<a href="#" class="btn btn-warning periodOnAdminPage">Вільно</a>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                <!--</div>-->
            <!--</div>-->
        <!--</div>-->

        <!--<div class="row">
            <div class="col-xs-12">
                <table class="table table-striped table-hover mainTable">
                    <tr>
                        <th>година-диспетчер</th>
                        <th>Диспетчер1</th>
                        <th>Диспетчер2</th>
                        <th>Диспетчер3</th>
                        <th>Диспетчер4</th>
                        <th>Диспетчер5</th>
                        <th>Диспетчер6</th>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">8:00 - 8:20</p></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">8:20 - 8:40</p></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">8:40 - 9:00</p></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">9:00 - 9:20</p> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">9:20 - 9:40</p></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх" >Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">9:40 - 10:00</p></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">10:00 - 10:20</p></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">10:20 - 10:40</p></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a> <a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                    </tr>
                    <tr>
                        <td class="hourInTable1"><p class="viewHour">10-40 - 11:00</p></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a> </td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="free"><a href="" class="button btnInTable1 btnAdd" data-toggle="modal" data-target="#modal-4">Додати</a></td>
                        <td class="employed"><a href="" class="button btnInTable1" hint="На даний період зареєстрований Василь Петров з кодом хххх">Підтвердити\відмінити</a><a href="" class="incrementOnOnePeriod fa fa-user-plus" data-toggle="modal" data-target="#modal-4"> додати на період</a></td>
                    </tr>
                </table>
            </div>
        </div> -->
        <br>
        <div class="row">
            <div class="col-lg-6">
                <table class="table table-striped table-hover">
                    <caption>Моніторинг</caption>
                    <tr>
                        <th>№</th>
                        <th>ПІП</th>
                        <th>Особовий рахунок</th>
                        <th>Код для консультації</th>
                        <th>Фактичний час прийому(майже)</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Пупкін Валєра Феодотович</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:20</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Тест Тест Тест</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:20</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Пупкін Валєра Феодотович</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:20</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Тест Тест Тест</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:20</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Пупкін Валєра Феодотович</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:20</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Тест Тест Тест</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:20</td>
                    </tr>
                </table>
                
                <div class="col-lg-12">
                     <div class="btn-group btn-group-md">
                        <a href="#" class="btn btn-warning button-first" type="button" data-toggle="modal" data-target="#modal-1">Додати споживача з <strong>живої</strong> черги</a>
                        <a href="#" class="btn btn-warning button-second" data-toggle="modal" data-target="#modal-2">Додати споживача з <strong>онлайн</strong> черги</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <table class="table table-striped table-hover">
                    <caption>Інтернет черга</caption>
                    <tr>
                        <th>№</th>
                        <th>ПІП</th>
                        <th>Особовий рахунок</th>
                        <th>Код для консультації</th>
                        <th>Година на яку зареєстрований</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Тест Тест Тест(І1)</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td class="hour">9:00</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Тест Тест Тест(І2)</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:20</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Тест Тест Тест(І3)</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>9:40</td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>Тест Тест Тест(І4)</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>10:00</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>Тест Тест Тест(І5)</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>10:20</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>Тест Тест Тест(І6)</td>
                        <td>123455978</td>
                        <td>1234</td>
                        <td>10:40</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <div class="col-xs-3"></div>
                <a href="#spoiler-1" data-toggle="collapse" class="btn btn-warning spoiler collapsed btn-lg btn-setting-for-admin">налаштування для адміністратора</a>
                    <div class="collapse" id="spoiler-1">
                        <div class="well">
                            <p><strong>На даній формі адміністратор змінює налаштування, якщо ті відрізняються від тих, що по замовчуванню!</strong></p> 
                            <form role="form">
                                 <div class="row">
                                    <div class="col-xs-6">
                                         <h5>Виберіть дату та виберіть налаштування для даної дати</h5> 
                                         <input type="date" id="dataToday-2" class="input-date-on-spoiler">
                                            <script>
                                                document.getElementById('dataToday-2').valueAsDate = new Date();
                                            </script>
                                        <br>
                                        <div class="btn btn-success btn-xs btn-non-standart-settings" data-toggle="modal" data-target="#modal-3">Редагувати налаштування для даної дати</div>
                                    </div>
                                    <div class="col-xs-6">
                                        <h5>Ви можете вибрати налаштування зі списку стандартних</h5> 
                                        <select class="form-control" id="default_setting_list">
                                            <option value="">не вибрано</option>
                                            @foreach($def_set_name as $key => $val)
                                              <option value="{{$val->id}}">{{$val->day_name}}</option>
                                        @endforeach
                                        </select>
                                        <br>
                                        <div class="btn btn-success btn-xs" id="set_default_settings">Зберегти стандартні налаштування для даної дати</div>
                                    </div>
                                    <div class="col-xs-6 col-xs-offset-6 btnAddTypeSettings">
                                        <div class="btn btn-success" data-target="#modal-6" data-toggle="modal">Додати типові налаштування</div>
                                    </div>
                                 </div>
                            </form>
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


    </div>

          <!--<div class="modal fade add-new" id="modal-4">-->
              <!--<div class="modal-dialog  modal-lg">-->
                  <!--<div class="modal-content">-->
                      <!--<div class="modal-header">-->
                          <!--<button class="close" type="button" data-dismiss="modal">-->
                              <!--<i class="fa fa-close"></i>-->
                          <!--</button>-->
                          <!--<h4 class="modal-title">Введіть дані споживача</h4>-->
                      <!--</div>-->
                      <!--<div class="modal-body">-->
                          <!--<form role="form">-->
                              <!--<div class="form_group">-->
                                  <!--<p>Введіть прізвище, ім*я, по батькові та особовий рахунок та натисніть кнопку підтвердит</p>-->
                              <!--</div>-->
                              <!--<div class="form-group">-->
                                  <!--<label for="exampleInputEmail1">ПІП</label>-->
                                  <!--<input type="email" class="form-control"  placeholder="Прізвище Ім'я По батькові">-->
                              <!--</div>-->
                              <!--<div class="form-group">-->
                                  <!--<label for="exampleInputPassword1">Особовий рахунок</label>-->
                                  <!--<input type="text" class="form-control"  placeholder="Особовий рахунок споживача(за бажанням)">-->
                              <!--</div>-->
                              <!--<div class="form-group">-->
                                  <!--<label for="exampleInputPassword1">Чотирьохзначний код(рандомний)</label>-->
                                  <!--<input type="text" class="form-control" placeholder="Адміністратор сам надає чотирьохзначний код споживачу, який не реєструвався через інтернет">-->
                              <!--</div>-->
                              <!--<button type="button" class="btn btn-success btn-lg">Підтвердити <i class="fa fa-check"></i></button>-->
                          <!--</form>-->
                      <!--</div>-->
                      <!--<div class="modal-footer">-->
                          <!--<button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити</button>-->
                      <!--</div>-->
                  <!--</div>-->
              <!--</div>-->
          <!--</div>-->

      <div class="modal fade add-new" id="modal-1">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title">Занести нового споживача?</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-lg add_real_client" id="real_queue_submit">Підтвердити <i class="fa fa-check"></i></button>

                    <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити</button>
                </div>
            </div>  
        </div>
      </div>

          <div class="modal fade add-new" id="modal-5">
              <div class="modal-dialog  modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button class="close" type="button" data-dismiss="modal">
                              <i class="fa fa-close"></i>
                          </button>
                          <h4 class="modal-title">Ви впевнені, що бажаєте підтвердити дані типові налаштування для вибраної дати?</h4>
                      </div>
                      <div class="modal-body">

                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-success btn-lg add_real_client" id="successSettingBySelectDate">Підтвердити <i class="fa fa-check"></i></button>

                          <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити</button>
                      </div>
                  </div>
              </div>
          </div>
      
      <!--<div class="modal fade add-new-from-online" id="modal-2">-->
        <!--<div class="modal-dialog  modal-lg">-->
            <!--<div class="modal-content">-->
                <!--<div class="modal-header">-->
                    <!--<button class="close" type="button" data-dismiss="modal">-->
                        <!--<i class="fa fa-close"></i>-->
                    <!--</button>-->
                    <!--<h4 class="modal-title">Виберіть споживача зі списку або скористайтесь пошуком</h4>-->
                <!--</div>-->
                <!--<div class="modal-body">-->
                    <!--<div class="container-fluid search">-->
                        <!--<div class="row">-->
                            <!--<div class="col-lg-6">-->
                                <!--<p>Пошук за номером</p>-->
                                <!--<div class="search-content">-->
                                    <!--<input type="text" class="form-control"  placeholder="Введіть номер користувача">-->
                                    <!--<button class="btn btn-warning btn-search-in-modal">Пошук</button>-->
                                <!--</div>-->
                            <!--</div>-->
                            <!--<div class="col-lg-6">-->
                                <!--<p>Пошук за прізвищем</p>-->
                                <!--<div class="search-content">-->
                                    <!--<input type="text" class="form-control" id="" placeholder="Введіть ПІП користувача">-->
                                    <!--<button class="btn btn-warning btn-search-in-modal">Пошук</button>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--<table class="table table-striped table-hover">-->
                        <!--<caption>Інтернет черга</caption>-->
                        <!--<tr>-->
                            <!--<th>№</th>-->
                            <!--<th>ПІП</th>-->
                            <!--<th>Особовий рахунок</th>-->
                            <!--<th>Код для консультації</th>-->
                            <!--<th>Година на яку зареєстрований</th>-->
                            <!--<th>Enabled</th>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>1</td>-->
                            <!--<td>Тест Тест Тест(І1)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>9:00</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>2</td>-->
                            <!--<td>Тест Тест Тест(І2)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>9:20</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>3</td>-->
                            <!--<td>Тест Тест Тест(І3)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>9:40</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>4</td>-->
                            <!--<td>Тест Тест Тест(І4)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:00</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>5</td>-->
                            <!--<td>Тест Тест Тест(І5)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:20</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>6</td>-->
                            <!--<td>Тест Тест Тест(І6)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:40</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>7</td>-->
                            <!--<td>Тест Тест Тест(І7)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:20</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>8</td>-->
                            <!--<td>Тест Тест Тест(І8)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:40</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>9</td>-->
                            <!--<td>Тест Тест Тест(І9)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:40</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>10</td>-->
                            <!--<td>Тест Тест Тест(І10)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:20</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                        <!--<tr>-->
                            <!--<td>11</td>-->
                            <!--<td>Тест Тест Тест(І11)</td>-->
                            <!--<td>123455978</td>-->
                            <!--<td>1234</td>-->
                            <!--<td>10:40</td>-->
                            <!--<td class="enabled"><input type="checkbox"></td>-->
                        <!--</tr>-->
                    <!--</table>-->
                    <!-- -->
                    <!--<button type="button" class="btn btn-success btn-lg">Підтвердити <i class="fa fa-check"></i></button>-->
                    <!-- -->
                <!--</div>-->
                <!--<div class="modal-footer"> -->
                    <!--<button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити</button>-->
                <!--</div>-->
            <!--</div>  -->
        <!--</div>-->
      <!--</div>-->
      <div class="modal fade" id="modal-3">
        <div class="modal-dialog  modal-lg modalAddPeriod">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title">Редагування налаштувань прийому громадян для вказної дати</h4>
                </div>
                <div class="modal-body">
                    <div role="form">
                      <div class="form-group timeOnModal-3">
                          <label for="timeFrom">Час початку робочого дня</label>
                          <h3 id="timeFrom">8:00</h3>
                      </div>
                        <br>
                      <div class="form-group timeOnModal-3">
                          <label for="timeTo">Час закінчення робочого дня</label>
                          <h3 id="timeTo">17:00</h3>
                      </div>
                      <hr>
                        <div class="row append">
                            <div class="col-xs-4 col-xs-offset-8">
                                <button id="addButton" type="button" class="btn btn-success btn-lg btnAddPeriod">Додати період <i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id= "edit_cur_set" class="btn btn-success btn-lg btn-successOnModal-3">Підтвердити <i class="fa fa-check"></i></button>

                    <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити редагування</button>
                </div>
            </div>  
        </div>
      </div>


          <div class="modal fade" id="modal-6">
              <div class="modal-dialog  modal-lg modalAddPeriod">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button class="close" type="button" data-dismiss="modal">
                              <i class="fa fa-close"></i>
                          </button>
                          <h4 class="modal-title">Редагування налаштувань прийому громадян для вказної дати</h4>
                      </div>
                      <div class="modal-body">
                          <div role="form">
                              <div class="form-group">
                                  <label for="def_set_name">Назва налаштування</label>
                                  <input type="text" class="time-from form-control" id="def_set_name" placeholder="Назва типового налаштування">
                              </div>
                              <hr>
                              <div class="row appendSec">
                                  <div class="col-xs-4 col-xs-offset-8">
                                      <button id="addButtonSec" type="button" class="btn btn-success btn-lg btnAddPeriod">Додати період <i class="fa fa-plus"></i></button>
                                  </div>
                              </div>
                              <div id="" class="form-group period cloneIdSec">
                                  <label id="periodSec">Період з    </label>
                                  <input type="text" class="time-from form-control periodOnModal-3 textOnPeriod" placeholder="">
                                  <label id="period2Sec">по</label>
                                  <input type="text" class="time-from form-control periodOnModal-3" placeholder="">
                                  <label for="countOperator">Кількість операторів</label>
                                  <input type="text" class="form-control countOperatorOnModal-3" placeholder="">
                                  <button type="button" class="btn btn-success btn-md btnSaveOnModal6">Видалити</button>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" id="create_def_setting" class="btn btn-success btn-lg btn-successOnModal-3">Підтвердити <i class="fa fa-check"></i></button>
                          <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити редагування</button>
                      </div>
                  </div>
              </div>
          </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="./lib/bootstrap.js"></script>
          <script src='./lib/moment.min.js'></script>
          <script>
              /**
               *
               */
          $(function(){
              var today = $('#dataToday').val();//today default date
              //hide extra periods
              hidePeriods();
              /**
               *
               */
              $(document).on('click', '#real_queue_form_sub_but', function(){//is any input empty
                  if( $("#real_queue_form_time").val() != '' &&  $("#real_queue_form_name").val() != ''){
                      $('#modal-1').modal('show');
                  }
                  else{
                      $("#labelClear").show();
                  }
              });

              /**
               *
               *
               */
              $(document).on('click', '#real_queue_submit', function(){
                  var end_period = moment();
                  end_period = end_period.hour($("#real_queue_form_time").val().slice(0,2));
                  end_period = end_period.minutes($("#real_queue_form_time").val().slice(3));
                  end_period = end_period.add($("#real_queue_form_time").val().slice(3), 'minutes');

                  $.ajax({//send data
                      method:"POST", //Todo Перевести на метод пост
                      url: '{{ route('real_queue_create') }}',
                      data:{
                          start_time : $("#real_queue_form_time").val(),
                          end_time : end_period.format('HH:mm'),
                          user_name: $('#real_queue_form_name').val(),
                          user_personal_key: $('#real_queue_form_per_num').val(),
                          date: today,
                          _token: '{{csrf_token()}}'//todo вичитати про токени (повинні бути в кожному ajax запиті
                      }//get response
                  }).done(function(data){
                      $('#modal-1').modal('hide');
                      location.reload();


                  });
              });

              /**
               *
               */
              $(document).on('click', '.reg_confirm_but', function(){ //confirm present
                  var $this = $(this);//save selector
                  $.ajax({//send data
                          method:"POST", //Todo Перевести на метод пост
                          url: '{{ route('queue_confirm') }}',
                          data:{
                              id : $(this).attr('data-id'),
                              _token: '{{csrf_token()}}'//todo вичитати про токени (повинні бути в кожному ajax запиті
                          }
                      }).done(function(data){//change labels and disable button
                      $this.text("Присутній");
                          $this.attr('disabled', true);
                      });

              });
              /**
               *
               */
              $('#dataToday').change(function(){//confirm present
                  $.ajax({//send data
                          dataType: 'json',
                          method:"POST", //Todo Перевести на метод пост
                          url: '{{ route('admin_queue_day_status') }}',
                          data:{
                              date : $(this).val(),
                              _token: '{{csrf_token()}}'//todo вичитати про токени (повинні бути в кожному ajax запиті
                          }
                      }).done(function(data){//change labels and disable button
                      console.log(data);
                      var period_res = '';
                     var res = '<caption>Гібридна таблиця</caption>'+
                         '<tr>'+
                              '<th>Період</th>'+
                              '<th>ПІП</th>'+
                              '<th>Код</th>'+
                              '<th>Особовий</th>'+
                              '<th>Додати</th>'+
                          '</tr> ';
                       $.each(data, function( key, period){
                      period_res = period_res +'<option value="'+ period.period_start_time.slice(0,-3)+'">'+period.period_start_time.slice(0,-3)+ '-'+ period.period_end_time.slice(0,-3)+'</option>';
                             res =  res + '<tr class="rowInTable1">'+
                              '<td rowspan="'+period.count+'" class="contentInTable1" id="periodOnTable1">'+period.period_start_time.slice(0,-3)+ '-'+ period.period_end_time.slice(0,-3)+'</td>';
                           if(period.queue.length == 0){
                                   res= res+ '</tr>';

                            }else{
                                $.each(period.queue, function(k, que){

                                      if (k != 0){
                                          res = res +  '<tr class="rowInTable1">';
                                      }
                                         res = res + '<td class="contentInTable1">'+que.user_name+'</td>'+
                                              '<td class="contentInTable1">'+que.register_key.slice(4)+'</td>'+
                                              '<td class="contentInTable1">'+que.user_personal_key+'</td>';
                                      if(que.is_real_queue){
                                             res = res + '<td class="contentInTable1 btnConfirm"><a href="#" data-id="'+que.id+'" class="btn btn-warning reg_confirm_but">Відмітити(жива черга)</a></td>';
                                      }else{
                                              res = res + '<td class="contentInTable1 btnConfirm"><a href="#" data-id="'+que.id+'" class="btn btn-warning reg_confirm_but"';
                                               if(que.is_present){ res = res + ' disabled >Присутній'; }else{res = res + '>Відмітити'; }
                                      res = res + '</a></td>';
                                      }
                                      res = res + '</tr>';
                                });
                            }
                       });

                            $('#main_queue_table').children().remove();
                            $('#real_queue_form_time').children().remove();
                            $('#main_queue_table').append(res);
                            $('#real_queue_form_time').append(period_res);
                            hidePeriods();
                      });
              });
            /**
             *
             */
              $(document).on('click', '#set_default_settings', function(){
                  if( $("#default_setting_list").val() != ''){
                      $('#modal-5').modal('show');
                  }
                  else{
                      alert('Виберіть налаштування зі списку');
                  }
              });
              /**
               *
               */
              $(document).on('click', '#successSettingBySelectDate', function(){
                  $.ajax({//send data
                      method:"POST",
                      url: '{{ route('admin_queue_set_default_setting') }}',
                      data:{
                          id : $("#default_setting_list").val(),
                          date:$("#dataToday-2").val(),
                          _token: '{{csrf_token()}}'
                      }
                  }).done(function(data){//change labels and disable button
                      $('#modal-5').modal('hide');
                  });
              });

              /**
               *
               */
            $("#addButton").click(function(){
                var res = $(".cloneId:last").clone();
                res.appendTo(".append");
            });
              /**
               *
               */
              $("#addButtonSec").click(function(){
                var res = $(".cloneIdSec:last").clone();
                res.appendTo(".appendSec");
            });
              /**
               *
               */
              $(document).on('click', '.btnSaveOnModal6', function(){
                 $(this).parent().remove();
              });

              /**
               *Обробник для збереження стандартних налаштувань
               */
              $('#create_def_setting').click(function(){
                  $('.cloneIdSec :input').each(function(){
                      if($(this).val() == '' && !$(this).is('button')){//todo зробити функціонал збору даних з рядкыв в один масив
                          alert('заповніть всі періоди'+$(this));
                      }
                  });
                  $('.cloneIdSec').each(function(){
                      //console.log($(this).children().eq(1).val()+ $(this).children().eq(3).val()+ $(this).children().eq(5).val());
                      getPeriods($(this).children().eq(1).val(), $(this).children().eq(3).val(), $(this).children().eq(5).val(), 0);
                  });

              });

              $('#edit_cur_set').click(function(){

                  $('.cloneId').each(function(){
                      //console.log($(this).children().eq(1).val()+ $(this).children().eq(3).val()+ $(this).children().eq(5).val());
                      getPeriods($(this).children().eq(1).val(), $(this).children().eq(3).val(), $(this).children().eq(5).val(), 1);
                  });
              });

              /**
               *
               */
              $('.btn-non-standart-settings').click(function(){
                  getDefDaySettings();
              });
              /**
               *
               */
              setInterval(function(){
                  hidePeriods();
              }, 300000);
              /**
               *
               */
              function hidePeriods(){
                  var cur_time = moment();
                  cur_time = cur_time.add('-20','minutes');

                  $('#real_queue_form_time').children().each(function(){
                      if($(this).val() < cur_time.format('HH:mm')){
                          $(this).hide();
                      }
                  });
                  $('.queue_period').each(function(){
                      if($(this).attr('data-value') < cur_time.format('HH:mm')){
                          $(this).hide();
                      }
                  });
              }
            /**
             *
             */
              function getDefDaySettings(){
                  var date = $('#dataToday-2').val();
                  $.ajax({//send data
                      method:"POST",
                      url: '{{ route('admin_get_current_settings') }}',
                      data:{
                          date: date,
                          _token: '{{csrf_token()}}'
                      }
                  }).done(function(data){//change labels and disable button
                      console.log(date);
                      $('#timeFrom').text(data.day_start.slice(0,-3));
                      $('#timeTo').text(data.day_end.slice(0,-3));
                      var res = '';
                      $(".cloneId").remove();
                      $.each(data.periods, function(k, per){
                     res = '<div class="form-group period cloneId">'+
                               '<label id="period">Період з    </label>'+
                                '<input type="text" class="time-from form-control periodOnModal-3 textOnPeriod" value="'+per.start_time.slice(0,-3)+'">'+
                               '<label id="period2">по</label>'+
                                '<input type="text" class="time-from form-control periodOnModal-3" value="'+per.end_time.slice(0,-3)+'">'+
                               '<label for="countOperator">Кількість операторів</label>'+
                                '<input type="text" class="form-control countOperatorOnModal-3" value="'+per.workers_number+'">'+
                               '<button type="button" class="btn btn-success btn-md btnSaveOnModal3">Вилучити</button>'+
                               '</div>';
                          $(".append").after(res);
                      });

                  });
              }

              /**
               *
               * @param p_start
               * @param p_end
               */
              function getPeriods(p_start, p_end, p_workers, route){
                  //date temp variables
                  var start_period = moment();
                  var temp_start_period = moment();
                  var end_period = moment();
                  var count_workers = p_workers;
                  end_period = end_period.hour(p_end.slice(0,2));
                  end_period = end_period.minutes(p_end.slice(3));
                  start_period = start_period.hour(p_start.slice(0,2));
                  start_period = start_period.minutes(p_start.slice(3));
                  //trigerr
                  var end_of_period = false;
                  //result array with periods
                  var period_array = [];
                  var temp = {};
                  while(!end_of_period){

                      temp = {
                          'workers_number' : count_workers,
                          'start_time' : start_period.format('HH:mm'),
                          'end_time' : start_period.add('20', 'minutes').format('HH:mm'),
                          'period_time' : 20
                      };
                      period_array.push(temp);

                      if(start_period >= end_period){
                          end_of_period = true;
                      }
                  }
                  console.log(period_array);
                  switch(route){
                      case 0:
                      $.ajax({//send data
                      method:"POST",
                      url: '{{ route('admin_create_default_settings') }}',
                      data:{
                          day_name : $("#def_set_name").val(),
                          p_array: period_array,
                          _token: '{{csrf_token()}}'
                      }
                  }).done(function(data){//change labels and disable button
                      console.log(data);
                  });
                          break;
                      case 1:
                          $.ajax({//send data
                              method:"POST",
                              url: '{{ route('admin_edit_current_settings') }}',
                              data:{
                                  day_name : $("#def_set_name").val(),
                                  p_array: period_array,
                                  _token: '{{csrf_token()}}'
                              }
                          }).done(function(data){//change labels and disable button
                              console.log(data);
                          });
                          break;
                  }
              }

          });
          </script>
  </body>
</html>

