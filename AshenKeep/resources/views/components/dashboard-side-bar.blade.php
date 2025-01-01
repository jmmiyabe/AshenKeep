<div class="bg-[#C28E21] text-[#102A45] flex flex-col justify-center items-center py-4 px-2 rounded-r-[70px] max-w-32">

    @hasrole('Admin')
    <a href="{{ url('/dashboard') }}"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
        <div class="h-10 w-10">
            <x-requirements />
        </div>
        <div class="text-sm text-center">
            Review Requirements
        </div>
    </a>
    <!-- Apply for Vault -->
    <a href="{{ url('/dashboard') }}"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
        <div class="h-10 w-10">
            <x-vault />
        </div>
        <div class="text-sm text-center">
            Vaults
        </div>
    </a>
    @endhasrole

    @hasrole('Office Staff')
    <!-- Logout -->
    <a href="{{ url('/dashboard') }}"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
        <div class="h-10 w-10">
            <x-application />
        </div>
        <div class="text-sm text-center">
            Manage Applications
        </div>
    </a>

    <a href="{{ url('/dashboard') }}"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
        <div class="h-10 w-10">
            <x-requirements />
        </div>
        <div class="text-sm text-center">
            Manage Requirements
        </div>
    </a>
    @endhasrole

    @hasrole('Finance Staff')
    <!-- Logout -->
    <a href="{{ url('/dashboard') }}"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
        <div class="h-10 w-10">
            <x-donation />
        </div>
        <div class="text-sm text-center">
            Manage Donations
        </div>
    </a>
    @endhasrole

    @hasrole('Applicant')
    <!-- Logout -->
    <a href="{{ url('/dashboard') }}"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
        <div class="h-10 w-10">
            <x-application />
        </div>
        <div class="text-sm text-center">
            Apply
        </div>
    </a>

    <a href="{{ url('/dashboard') }}"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
        <div class="h-10 w-10">
            <x-vault />
        </div>
        <div class="text-sm text-center">
            View Vaults
        </div>
    </a>
    @endhasrole

    <!-- Logout -->
    <form method="POST" action="{{ route('logout') }}" x-data>
        @csrf

        <a href="{{ route('logout') }}" @click.prevent="$root.submit();"  class="mb-6 flex flex-col items-center rounded-lg hover:bg-white">
            <div class="h-10 w-10">
                <x-logout />
            </div>
            <div class="text-sm text-center">
                Log Out
            </div>
        </a>
    </form>
</div>
