
<div class="sidebar-user">
    <div class="category-content">
        <div class="media">
            <a href="{{'/home'}}" class="media-left"><img src="/assets/images/placeholder.jpg" class="img-circle img-sm" alt=""></a>
            <div class="media-body">
                <span class="media-heading text-semibold">{{Auth::User()->name}}</span>
                <div class="text-size-mini text-muted">
                    <i class="icon-pin text-size-small"></i> &nbsp;Dhaka, Bangladesh
                </div>
            </div>

            <div class="media-right media-middle">
                <ul class="icons-list">
                    <li>
                        <a href="#"><i class="icon-cog3"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /user menu -->


<!-- Main navigation -->

<div class="sidebar-category sidebar-category-visible">
    <div class="category-content no-padding">
        <ul class="navigation navigation-main navigation-accordion">

            <!-- Main -->
            <li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main pages"></i></li>
            <li class="">
                <a href="{{'/home'}}"><i class="icon-home4"></i> <span>Dashboard</span></a>
            </li>
            <li>
                <a href="#"><i class="icon-stack3"></i> <span>Settings</span></a>
                <ul>
                    <li class="@yield('blog-settings')"><a href="{{'/admin/1/settings'}}">Logo Change</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-spinner3 spinner"></i> <span>Category & Menu</span></a>
                <ul>
                    <li class="@yield('active')"><a href="{{'/admin/add-category'}}">Add Category</a></li>
                    <li class="@yield('activemenu')"><a href="{{'/admin/select-menu'}}">Active Menu</a></li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="icon-stack2"></i> <span>Blog or Post</span></a>
                <ul>
                    <li class="@yield('blog-active')"><a href="{{'/admin/new-post'}}">Add New Post</a></li>
                    <li class="@yield('blog-view-active')"><a href="{{'/admin/All-News'}}">View or Edit Post</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>