<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="admin/theloai/danhsach">TRANG QUẢN TRỊ</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
<<<<<<< HEAD
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
=======
                        @if(Auth::check())
                        <li><i class="fa fa-user fa-fw"></i>{{Auth::user()->name}}</a>
                        </li>
                          <li><a href="admin/user/sua/{{Auth::user()->id}}"<i class="fa fa-cog fa-fw"></i>Setting</a></li>
                        <li class="divider"></li>
                        <li><a href="admin/dangnhap"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                        @endif
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            @include('admin.layout.menu')
            <!-- /.navbar-static-side -->
<<<<<<< HEAD
        </nav>
=======
        </nav>
>>>>>>> 0a82c6974f5b148d275ffc72d019c916d8837b93
