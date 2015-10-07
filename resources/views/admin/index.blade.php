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
        </div>
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
                                        <select class="form-control">
                                              <option value="">не вибрано</option>
                                              <option>Понеділок</option>
                                              <option>Вівторок</option>
                                              <option>Середа</option>
                                              <option>Четвер</option>
                                              <option>П*ятниця</option>
                                              <option>Субота</option>
                                              <option>нестандартне налаштування 1()</option>
                                        </select>
                                        <br>
                                        <div class="btn btn-success btn-xs">Зберегти стандартні налаштування для даної дати</div>
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

          <div class="modal fade add-new" id="modal-4">
              <div class="modal-dialog  modal-lg">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button class="close" type="button" data-dismiss="modal">
                              <i class="fa fa-close"></i>
                          </button>
                          <h4 class="modal-title">Введіть дані споживача</h4>
                      </div>
                      <div class="modal-body">
                          <form role="form">
                              <div class="form_group">
                                  <p>Введіть прізвище, ім*я, по батькові та особовий рахунок та натисніть кнопку підтвердит</p>
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputEmail1">ПІП</label>
                                  <input type="email" class="form-control"  placeholder="Прізвище Ім'я По батькові">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Особовий рахунок</label>
                                  <input type="text" class="form-control"  placeholder="Особовий рахунок споживача(за бажанням)">
                              </div>
                              <div class="form-group">
                                  <label for="exampleInputPassword1">Чотирьохзначний код(рандомний)</label>
                                  <input type="text" class="form-control" placeholder="Адміністратор сам надає чотирьохзначний код споживачу, який не реєструвався через інтернет">
                              </div>
                              <button type="button" class="btn btn-success btn-lg">Підтвердити <i class="fa fa-check"></i></button>
                          </form>
                      </div>
                      <div class="modal-footer">
                          <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити</button>
                      </div>
                  </div>
              </div>
          </div>

      <div class="modal fade add-new" id="modal-1">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title">Введіть дані споживача</h4>
                </div>
                <div class="modal-body">
                    <form role="form">
                      <div class="form_group">
                          <p>Введіть прізвище, ім*я, по батькові та особовий рахунок та натисніть кнопку підтвердит</p>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">ПІП</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Прізвище Ім'я По батькові">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Особовий рахунок</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Особовий рахунок споживача(за бажанням)">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Час прийому(період)</label>
                        <input type="text" class="form-control" id="exampleInputPassword2" placeholder="Час прийому(вказувати початок періоду)">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Чотирьохзначний код(рандомний)</label>
                        <input type="text" class="form-control" id="exampleInputPassword3" placeholder="Адміністратор сам надає чотирьохзначний код споживачу, який не реєструвався через інтернет">
                      </div>
                      <button type="button" class="btn btn-success btn-lg">Підтвердити <i class="fa fa-check"></i></button>
                    </form>
                </div>
                <div class="modal-footer"> 
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити</button>
                </div>
            </div>  
        </div>
      </div>
      
      <div class="modal fade add-new-from-online" id="modal-2">
        <div class="modal-dialog  modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal">
                        <i class="fa fa-close"></i>
                    </button>
                    <h4 class="modal-title">Виберіть споживача зі списку або скористайтесь пошуком</h4>
                </div>
                <div class="modal-body">
                    <div class="container-fluid search">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Пошук за номером</p>
                                <div class="search-content">
                                    <input type="text" class="form-control"  placeholder="Введіть номер користувача">
                                    <button class="btn btn-warning btn-search-in-modal">Пошук</button>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <p>Пошук за прізвищем</p>
                                <div class="search-content">
                                    <input type="text" class="form-control" id="" placeholder="Введіть ПІП користувача">
                                    <button class="btn btn-warning btn-search-in-modal">Пошук</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <caption>Інтернет черга</caption>
                        <tr>
                            <th>№</th>
                            <th>ПІП</th>
                            <th>Особовий рахунок</th>
                            <th>Код для консультації</th>
                            <th>Година на яку зареєстрований</th>
                            <th>Enabled</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Тест Тест Тест(І1)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>9:00</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Тест Тест Тест(І2)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>9:20</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Тест Тест Тест(І3)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>9:40</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Тест Тест Тест(І4)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:00</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Тест Тест Тест(І5)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:20</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Тест Тест Тест(І6)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:40</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Тест Тест Тест(І7)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:20</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Тест Тест Тест(І8)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:40</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Тест Тест Тест(І9)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:40</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Тест Тест Тест(І10)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:20</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Тест Тест Тест(І11)</td>
                            <td>123455978</td>
                            <td>1234</td>
                            <td>10:40</td>
                            <td class="enabled"><input type="checkbox"></td>
                        </tr>
                    </table>
                    
                    <button type="button" class="btn btn-success btn-lg">Підтвердити <i class="fa fa-check"></i></button>
                    
                </div>
                <div class="modal-footer"> 
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити</button>
                </div>
            </div>  
        </div>
      </div>
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
                    <form role="form">
                      <div class="form-group">
                          <label for="timeFrom">Час початку робочого дня</label>
                          <input type="text" class="time-from form-control timeOnModal-3" id="timeFrom" placeholder="Час початку робочого дня">               
                      </div>
                        <br>
                      <div class="form-group">
                          <label for="timeTo">Час закінчення робочого дня</label>
                          <input type="text" class="time-to form-control timeOnModal-3" id="timeTo" placeholder="Час закінчення робочого дня">
                      </div>
                      <div class="row append">
                          <div class="col-xs-4">
                            <button id="addButton" type="button" class="btn btn-success btn-lg btnAddPeriod">Додати період <i class="fa fa-plus"></i></button>
                           </div>
                          <div class="col-xs-6">
                            
                          </div>
                      </div>
                      <hr>  
                        
                      <div id="cloneId" class="form-group period"> 
                          <label id="period">Період з    </label>
                          <input type="text" class="time-from form-control periodOnModal-3 textOnPeriod" id="periodFrom" placeholder="">
                          <label id="period2">по</label>
                          <input type="text" class="time-from form-control periodOnModal-3" id="periodTo" placeholder="">
                          <label for="countOperator">Кількість операторів</label>
                          <input type="text" class="form-control countOperatorOnModal-3" id="countOperator" placeholder="">
                      </div>
                    </form>
                </div>
                    <button type="button" class="btn btn-success btn-lg btn-successOnModal-3">Підтвердити <i class="fa fa-check"></i></button>
                <div class="modal-footer"> 
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Відмінити редагування</button>
                </div>
            </div>  
        </div>
      </div>   
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
          <script src="./lib/bootstrap.js"></script>
          <script>
          $(function(){
            $("#addButton").click(function(){
                var res = $("#cloneId").clone();
                res.appendTo(".append");
            });
          });
          </script>
  </body>
</html>