<div class="col-lg-3">
    <div class="sidebar-area">
        <div class="sidebar-top-content text-center">
            <div class="user-img">
                <img src="{{ url('https://ui-avatars.com/api/?background=random&name='.Auth::user()->name) }}" alt="">
            </div>
            <div class="user-name">
                <h3>{{ Auth::user()->name }}</h3>
            </div>
        </div>
        <div class="slidebar-nav-area">
            <nav>
                <ul>
                    <li class="nav-item {{ Request::is('user/dashboard') ? 'active' : '' }}"><a href="{{ route('user.dashboard') }}" class="active"><span class="iconify" data-icon="feather:home" data-inline="false"></span> {{ __('Dashboard') }}</a></li>
                    <li class="nav-item submenu {{ Request::is('user/transfer*') ? 'show active' : '' }}">
                        <a href="javascript:void(0)">
                            <span class="iconify" data-icon="bx:bx-transfer-alt" data-inline="false"></span> {{ __('Transfer') }}
                            <span class="pull-right-container"><span class="iconify" data-icon="dashicons:arrow-right-alt2" data-inline="false"></span></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.transfer.ownbank') }}">{{ __('Own Bank Transfer') }}</a></li>
                            <li><a href="{{ route('user.transfer.otherbank') }}">{{ __('Other Bank Transfer') }}</a></li>
                            <li><a href="{{ route('user.transfer.ecurrency') }}">{{ __('E-currency Transfer') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item submenu {{ Request::is('user/fixed-deposit-*') ? 'show active' : '' }}">
                        <a href="javascript:void(0)">
                            <span class="iconify" data-icon="cil:money" data-inline="false"></span> {{ __('Fixed Deposit') }} 
                            <span class="pull-right-container"><span class="iconify" data-icon="dashicons:arrow-right-alt2" data-inline="false"></span></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.fixed.deposit.package') }}">{{ __('Fixed deposit package') }}</a></li>
                            <li><a href="{{ route('user.fixed.deposit.history') }}">{{ __('Fixed deposit History') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item submenu {{ Request::is('user/loan-*') ? 'show active' : '' }}">
                        <a href="javascript:void(0)">
                            <span class="iconify" data-icon="bx:bxs-package" data-inline="false"></span> {{ __('Loan') }} 
                            <span class="pull-right-container"><span class="iconify" data-icon="dashicons:arrow-right-alt2" data-inline="false"></span></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.loan.package') }}">{{ __('Loan Package') }}</a></li>
                            <li><a href="{{ route('user.loan.history') }}">{{ __('Loan History') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item submenu  {{ Request::is('user/edeposit*') ? 'show active' : '' }}">
                        <a href="javascript:void(0)">
                            <span class="iconify" data-icon="ic:twotone-attach-money" data-inline="false"></span> {{ __('E-Deposit') }} 
                            <span class="pull-right-container"><span class="iconify" data-icon="dashicons:arrow-right-alt2" data-inline="false"></span></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.edeposit.index') }}">{{ __('E-Deposit') }}</a></li>
                            <li><a href="{{ route('user.edeposit.history') }}">{{ __('Deposit History') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item submenu {{ Request::is('user/bill*') ? 'show active' : '' }}">
                        <a href="javascript:void(0)">
                            <span class="iconify" data-icon="whh:boxbilling" data-inline="false"></span> {{ __('Bill') }}
                            <span class="pull-right-container"><span class="iconify" data-icon="dashicons:arrow-right-alt2" data-inline="false"></span></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.bill.create') }}">{{ __('Create Bill') }}</a></li>
                            <li><a href="{{ route('user.bill.index') }}">{{ __('Bill History') }}</a></li>
                            <li><a href="{{ route('user.bill.request') }}">{{ __('Bill Requests') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item submenu {{ Request::is('user/account*') ? 'show active' : (Request::is('user/transaction/history') ? 'show active' : '') }}">
                        <a href="javascript:void(0)">
                            <span class="iconify" data-icon="ant-design:user-outlined" data-inline="false"></span> {{ __('Account') }}
                            <span class="pull-right-container"><span class="iconify" data-icon="dashicons:arrow-right-alt2" data-inline="false"></span></span>
                        </a>
                        <ul class="submenu">
                            <li><a href="{{ route('user.account.statement') }}">{{ __('Account Statement') }}</a></li>
                            <li><a href="{{ route('user.transaction.history') }}">{{ __('Transaction History') }}</a></li>
                            <li><a href="{{ route('user.account.setting') }}">{{ __('Account Settings') }}</a></li>
                        </ul>
                    </li>
                    <li class="nav-item {{ Request::is('user/support*') ? 'active' : '' }}"><a href="{{ route('user.support.index') }}"><span class="iconify" data-icon="feather:mail" data-inline="false"></span> {{ __('Support') }}</a></li>
                    <li class="nav-item"><a href="{{ route('logout') }}"><span class="iconify" data-icon="ant-design:logout-outlined" data-inline="false"></span> {{ __('Logout') }}</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>