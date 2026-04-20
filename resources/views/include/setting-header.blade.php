<div class="w-64 h-screen bg-white border-r border-slate-200 shadow-sm flex flex-col">

    <div class="flex flex-col py-4">

        <a href="#"
            class="flex items-center gap-3 px-6 py-3 border-r-4 border-cyan-500 bg-cyan-50/50 group transition-all">
            <i class="las la-user text-cyan-600 text-xl"></i>
            <span class="text-sm font-bold text-cyan-600 tracking-tight">My Account</span>
        </a>

        <a href="#" class="flex items-center justify-between px-6 py-3 group hover:bg-slate-50 transition-all">
            <div class="flex items-center gap-3">
                <i class="las la-city text-slate-400 group-hover:text-slate-600 text-xl"></i>
                <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800">Company Settings</span>
            </div>
            <i class="las la-angle-down text-[10px] text-slate-400 group-hover:text-slate-600"></i>
        </a>

        <a href="#" class="flex items-center justify-between px-6 py-3 group hover:bg-slate-50 transition-all">
            <div class="flex items-center gap-3">
                <i class="las la-calendar text-slate-400 group-hover:text-slate-600 text-xl"></i>
                <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800">Leave Settings</span>
            </div>
            <i class="las la-angle-down text-[10px] text-slate-400 group-hover:text-slate-600"></i>
        </a>

        <a href="{{ route('user.setting.index') }}"
            class="flex items-center justify-between px-6 py-3 group hover:bg-slate-50 transition-all">
            <div class="flex items-center gap-3">
                <i class="las la-money-bill-wave text-cyan-600 text-xl"></i>
                <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800">Payroll Settings</span>
            </div>
            <i class="las la-angle-down text-[10px] text-cyan-600"></i>
        </a>

        <a href="#" class="flex items-center justify-between px-6 py-3 group hover:bg-slate-50 transition-all">
            <div class="flex items-center gap-3">
                <i class="las la-hand-holding-usd text-slate-400 group-hover:text-slate-600 text-xl"></i>
                <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800">Claims Settings</span>
            </div>
            <i class="las la-angle-down text-[10px] text-slate-400 group-hover:text-slate-600"></i>
        </a>

        <a href="#" class="flex items-center justify-between px-6 py-3 group hover:bg-slate-50 transition-all">
            <div class="flex items-center gap-3">
                <i class="las la-briefcase text-slate-400 group-hover:text-slate-600 text-xl"></i>
                <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800">Hadir Settings</span>
            </div>
            <i class="las la-angle-down text-[10px] text-slate-400 group-hover:text-slate-600"></i>
        </a>

        <a href="#" class="flex items-center gap-3 px-6 py-3 group hover:bg-slate-50 transition-all">
            <i class="las la-users text-slate-400 group-hover:text-slate-600 text-xl"></i>
            <span class="text-sm font-medium text-slate-600 group-hover:text-slate-800">Manage Admins</span>
        </a>

    </div>
</div>
