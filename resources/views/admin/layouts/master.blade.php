<!doctype html>
<html class="no-js" lang="en">

<head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Jai News Controller</title>
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="icon" href="favicon.ico" type="image/x-icon" />

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <link rel="stylesheet" href="{{ asset('assets/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/@fortawesome/fontawesome-free/css/all.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/icon-kit/dist/css/iconkit.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/ionicons/dist/css/ionicons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/jvectormap/jquery-jvectormap.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/weather-icons/css/weather-icons.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/c3/c3.min.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/perfect-scrollbar/css/perfect-scrollbar.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/owl.carousel/dist/assets/owl.carousel.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/node_modules/owl.carousel/dist/assets/owl.theme.default.css') }}">
      <link rel="stylesheet" href="{{ asset('assets/dist/css/theme.min.css') }}">
      <script src="{{ asset('assets/src/js/vendor/modernizr-2.8.3.min.js') }}"></script>
      <link rel="stylesheet" href="{{ asset('assets/node_modules/summernote/dist/summernote-bs4.css') }}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
      @yield('custom-css')
</head>

<body>
      <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

      <div class="wrapper">
            @include('admin.layouts.navbar')

            <div class="page-wrap">

                  @include('admin.layouts.sidebar')

                  @yield('content')

                  <aside class="right-sidebar">
                        <div class="sidebar-chat" data-plugin="chat-sidebar">
                              <div class="sidebar-chat-info">
                                    <h6>Chat List</h6>
                                    <form class="mr-t-10">
                                          <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Search for friends ...">
                                                <i class="ik ik-search"></i>
                                          </div>
                                    </form>
                              </div>
                              <div class="chat-list">
                                    <div class="list-group row">
                                          <a href="javascript:void(0)" class="list-group-item" data-chat-user="Gene Newman">
                                                <figure class="user--online">
                                                      <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                                </figure><span><span class="name">Gene Newman</span> <span class="username">@gene_newman</span> </span>
                                          </a>
                                          <a href="javascript:void(0)" class="list-group-item" data-chat-user="Billy Black">
                                                <figure class="user--online">
                                                      <img src="img/users/2.jpg" class="rounded-circle" alt="">
                                                </figure><span><span class="name">Billy Black</span> <span class="username">@billyblack</span> </span>
                                          </a>
                                          <a href="javascript:void(0)" class="list-group-item" data-chat-user="Herbert Diaz">
                                                <figure class="user--online">
                                                      <img src="img/users/3.jpg" class="rounded-circle" alt="">
                                                </figure><span><span class="name">Herbert Diaz</span> <span class="username">@herbert</span> </span>
                                          </a>
                                          <a href="javascript:void(0)" class="list-group-item" data-chat-user="Sylvia Harvey">
                                                <figure class="user--busy">
                                                      <img src="img/users/4.jpg" class="rounded-circle" alt="">
                                                </figure><span><span class="name">Sylvia Harvey</span> <span class="username">@sylvia</span> </span>
                                          </a>
                                          <a href="javascript:void(0)" class="list-group-item active" data-chat-user="Marsha Hoffman">
                                                <figure class="user--busy">
                                                      <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                                </figure><span><span class="name">Marsha Hoffman</span> <span class="username">@m_hoffman</span> </span>
                                          </a>
                                          <a href="javascript:void(0)" class="list-group-item" data-chat-user="Mason Grant">
                                                <figure class="user--offline">
                                                      <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                                </figure><span><span class="name">Mason Grant</span> <span class="username">@masongrant</span> </span>
                                          </a>
                                          <a href="javascript:void(0)" class="list-group-item" data-chat-user="Shelly Sullivan">
                                                <figure class="user--offline">
                                                      <img src="img/users/2.jpg" class="rounded-circle" alt="">
                                                </figure><span><span class="name">Shelly Sullivan</span> <span class="username">@shelly</span></span>
                                          </a>
                                    </div>
                              </div>
                        </div>
                  </aside>

                  <div class="chat-panel" hidden>
                        <div class="card">
                              <div class="card-header d-flex justify-content-between">
                                    <a href="javascript:void(0);"><i class="ik ik-message-square text-success"></i></a>
                                    <span class="user-name">John Doe</span>
                                    <button type="button" class="close" aria-label="Close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="card-body">
                                    <div class="widget-chat-activity flex-1">
                                          <div class="messages">
                                                <div class="message media reply">
                                                      <figure class="user--online">
                                                            <a href="#">
                                                                  <img src="img/users/3.jpg" class="rounded-circle" alt="">
                                                            </a>
                                                      </figure>
                                                      <div class="message-body media-body">
                                                            <p>Epic Cheeseburgers come in all kind of styles.</p>
                                                      </div>
                                                </div>
                                                <div class="message media">
                                                      <figure class="user--online">
                                                            <a href="#">
                                                                  <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                                            </a>
                                                      </figure>
                                                      <div class="message-body media-body">
                                                            <p>Cheeseburgers make your knees weak.</p>
                                                      </div>
                                                </div>
                                                <div class="message media reply">
                                                      <figure class="user--offline">
                                                            <a href="#">
                                                                  <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                                            </a>
                                                      </figure>
                                                      <div class="message-body media-body">
                                                            <p>Cheeseburgers will never let you down.</p>
                                                            <p>They'll also never run around or desert you.</p>
                                                      </div>
                                                </div>
                                                <div class="message media">
                                                      <figure class="user--online">
                                                            <a href="#">
                                                                  <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                                            </a>
                                                      </figure>
                                                      <div class="message-body media-body">
                                                            <p>A great cheeseburger is a gastronomical event.</p>
                                                      </div>
                                                </div>
                                                <div class="message media reply">
                                                      <figure class="user--busy">
                                                            <a href="#">
                                                                  <img src="img/users/5.jpg" class="rounded-circle" alt="">
                                                            </a>
                                                      </figure>
                                                      <div class="message-body media-body">
                                                            <p>There's a cheesy incarnation waiting for you no matter what you palete preferences are.</p>
                                                      </div>
                                                </div>
                                                <div class="message media">
                                                      <figure class="user--online">
                                                            <a href="#">
                                                                  <img src="img/users/1.jpg" class="rounded-circle" alt="">
                                                            </a>
                                                      </figure>
                                                      <div class="message-body media-body">
                                                            <p>If you are a vegan, we are sorry for you loss.</p>
                                                      </div>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                              <form action="javascript:void(0)" class="card-footer" method="post">
                                    <div class="d-flex justify-content-end">
                                          <textarea class="border-0 flex-1" rows="1" placeholder="Type your message here"></textarea>
                                          <button class="btn btn-icon" type="submit"><i class="ik ik-arrow-right text-success"></i></button>
                                    </div>
                              </form>
                        </div>
                  </div>
            </div>

      </div>




      <div class="modal fade apps-modal" id="appsModal" tabindex="-1" role="dialog" aria-labelledby="appsModalLabel" aria-hidden="true" data-backdrop="false">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><i class="ik ik-x-circle"></i></button>
            <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                        <div class="quick-search">
                              <div class="container">
                                    <div class="row">
                                          <div class="col-md-4 ml-auto mr-auto">
                                                <div class="input-wrap">
                                                      <input type="text" id="quick-search" class="form-control" placeholder="Search..." />
                                                      <i class="ik ik-search"></i>
                                                </div>
                                          </div>
                                    </div>
                              </div>
                        </div>

                        <div class="modal-body d-flex align-items-center">
                              <div class="container">
                                    <div class="apps-wrap">
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                                          </div>
                                          <div class="app-item dropdown">
                                                <a href="#" class="dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-command"></i><span>Ui</span></a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                      <a class="dropdown-item" href="#">Action</a>
                                                      <a class="dropdown-item" href="#">Another action</a>
                                                      <a class="dropdown-item" href="#">Something else here</a>
                                                </div>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-mail"></i><span>Message</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-users"></i><span>Accounts</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-shopping-cart"></i><span>Sales</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-briefcase"></i><span>Purchase</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-server"></i><span>Menus</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-clipboard"></i><span>Pages</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-message-square"></i><span>Chats</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-map-pin"></i><span>Contacts</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-box"></i><span>Blocks</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-calendar"></i><span>Events</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-bell"></i><span>Notifications</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-pie-chart"></i><span>Reports</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-layers"></i><span>Tasks</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-edit"></i><span>Blogs</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-settings"></i><span>Settings</span></a>
                                          </div>
                                          <div class="app-item">
                                                <a href="#"><i class="ik ik-more-horizontal"></i><span>More</span></a>
                                          </div>
                                    </div>
                              </div>
                        </div>

                  </div>
            </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
      <script>
            window.jQuery || document.write('<script src="src/js/vendor/jquery-3.3.1.min.js"><\/script>')
      </script>
      <script src="{{ asset('assets/node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/screenfull/dist/screenfull.js') }}"></script>
      <script src="{{ asset('assets/node_modules/datatables.net/js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/jvectormap/jquery-jvectormap.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js') }}"></script>
      <script src="{{ asset('assets/node_modules/moment/moment.js') }}"></script>
      <script src="{{ asset('assets/node_modules/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/d3/dist/d3.min.js') }}"></script>
      <script src="{{ asset('assets/node_modules/c3/c3.min.js') }}"></script>
      <script src="{{ asset('assets/js/tables.js') }}"></script>
      <script src="{{ asset('assets/js/widgets.js') }}"></script>
      <script src="{{ asset('assets/js/charts.js') }}"></script>
      <script src="{{ asset('assets/dist/js/theme.min.js') }}"></script>
      <script src="{{ asset('assets/js/forms.js') }}"></script>
      <script src="{{ asset('assets/node_modules/summernote/dist/summernote-bs4.min.js') }}"></script>
      <script src="{{ asset('assets/js/functions.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
            (function(b, o, i, l, e, r) {
                  b.GoogleAnalyticsObject = l;
                  b[l] || (b[l] =
                        function() {
                              (b[l].q = b[l].q || []).push(arguments)
                        });
                  b[l].l = +new Date;
                  e = o.createElement(i);
                  r = o.getElementsByTagName(i)[0];
                  e.src = 'https://www.google-analytics.com/analytics.js';
                  r.parentNode.insertBefore(e, r)
            }(window, document, 'script', 'ga'));
            ga('create', 'UA-XXXXX-X', 'auto');
            ga('send', 'pageview');
      </script>
      @yield('custom-js')

</body>

</html>