<li class="{{ Request::is('devices*') ? 'active' : '' }}">
    <a href="{{ route('devices.index') }}"><i class="fa fa-edit"></i><span>Devices</span></a>
</li>

<li class="{{ Request::is('deviceData*') ? 'active' : '' }}">
    <a href="{{ route('deviceData.index') }}"><i class="fa fa-edit"></i><span>Device Data</span></a>
</li>

<li class="{{ Request::is('deviceDataCategories*') ? 'active' : '' }}">
    <a href="{{ route('deviceDataCategories.index') }}"><i class="fa fa-edit"></i><span>Device Data Categories</span></a>
</li>

<li class="{{ Request::is('deviceCommands*') ? 'active' : '' }}">
    <a href="{{ route('deviceCommands.index') }}"><i class="fa fa-edit"></i><span>Device Commands</span></a>
</li>

<li class="{{ Request::is('botUsers*') ? 'active' : '' }}">
    <a href="{{ route('botUsers.index') }}"><i class="fa fa-edit"></i><span>Bot Users</span></a>
</li>

<li class="{{ Request::is('botUsersPairDevices*') ? 'active' : '' }}">
    <a href="{{ route('botUsersPairDevices.index') }}"><i class="fa fa-edit"></i><span>Bot Users Pair Devices</span></a>
</li>

<li class="{{ Request::is('accountTypes*') ? 'active' : '' }}">
    <a href="{{ route('accountTypes.index') }}"><i class="fa fa-edit"></i><span>Account Types</span></a>
</li>

