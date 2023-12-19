<nav class="side-menu">
    <ul class="nav">
        <li class="{{ Request::is('/dashboard') ? 'active' : '' }}"><a href="{{ route('dashboard') }}"><span class="fa fa-user"></span> Profile</a></li>
        <li class="{{ Request::is('user/profile') ? 'active' : '' }}"><a href="{{ route('user.profile') }}"><span class="fa fa-cog"></span> Settings</a></li>
        <li class="{{ Request::is('user/change/password') ? 'active' : '' }}"><a href="{{ route('user.change.password') }}"><span class="fa fa-cog"></span> Change Password</a></li>
        {{-- <li class="{{ Request::is('user/billing') ? 'active' : '' }}"><a href="{{ route('user.billing') }}"><span class="fa fa-credit-card"></span> Billing</a></li>
        <li class="{{ Request::is('user/messages') ? 'active' : '' }}"><a href="{{ route('user.messages') }}"><span class="fa fa-envelope"></span> Messages</a></li>
        <li class="{{ Request::is('user/user-drive') ? 'active' : '' }}"><a href="{{ route('user.user-drive') }}"><span class="fa fa-th"></span> Drive</a></li>
        <li class="{{ Request::is('user/reminders') ? 'active' : '' }}"><a href="{{ route('user.reminders') }}"><span class="fa fa-clock-o"></span> Reminders</a></li> --}}
        <li class="{{ Request::is('/logout') ? 'active' : '' }}"><a href="{{ route('user.logout') }}"><span class="fa fa-chevron-circle-up" ></span> Logout </a></li>
    </ul>
</nav>
