<div class="side-menu sidebar-inverse">
    <nav class="navbar navbar-default" role="navigation">
        <div class="side-menu-container">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('voyager.dashboard') }}" style="text-align: center">
                    <div class="title">{{Voyager::setting('admin.title', 'Digital Dog Direct')}}</div>
                </a>
            </div><!-- .navbar-header -->
        </div>
        <div id="adminmenu">
            <admin-menu :items="{{ menu('admin', '_json') }}"></admin-menu>
        </div>
    </nav>
</div>
