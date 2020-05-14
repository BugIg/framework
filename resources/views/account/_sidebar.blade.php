<nav class="">
    <a href="{{ route('avored.account.profile.show') }}" class="flex items-center px-2 py-2 text-base leading-6">
        Dashboard
    </a>
    
    <a href="{{ route('avored.account.profile.edit') }}" class="flex items-center px-2 py-2 text-base leading-6">
        Edit Profile
    </a>

    <a href="{{ route('avored.account.profile.order') }}" class="flex items-center px-2 py-2 text-base leading-6">
        Your Orders
    </a>
    <a href="{{ route('avored.account.profile.address') }}" class="flex items-center px-2 py-2 text-base leading-6">
        Your Address
    </a>
    <a onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            href="{{ route('avored.logout') }}"
            class="flex items-center px-2 py-2 text-base leading-6"
    >
        Logout
    </a>
    <form id="logout-form" action="{{ route('avored.logout') }}" method="POST"  class="hidden">
        @csrf
    </form>

    
    
</nav>