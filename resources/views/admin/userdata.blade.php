<x-app-layout>
    <div class="col-span-6 max-w-7xl sm:px-6 lg:px-8">
        <div class="py-4">
            @if(session('message'))
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100 items-center">
                        <span class="text-center"> {{ session('message') }} </span>
                    </div>
                </div>
                <br><br>
            @endif
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="border-collapse border border-slate-500 w-full">
                        <thead>
                        <tr>
                                <th class="border border-slate-600">username</th>
                                <th class="border border-slate-600">role</th>
                                <th class="border border-slate-600">status</th>
                                <th class="border border-slate-600">password</th>
                                <th class="border border-slate-600">save</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <form method="post" action="{{ route('userdata.update') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')
                                <tr>
                                    <td class="border border-slate-700">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="$user->username" required autofocus />
                                    </td>
                                    <td class="border border-slate-700">
                                        <select name="role" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                            <option :value="{{$user->role}}" selected>{{$user->role}}</option>
                                            @foreach($roles as $role)
                                                @if($user->role != $role->role)
                                                    <option :value="{{$role->role}}">{{ $role->role }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-slate-700">
                                        <select name="status" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                                            <option :value="{{$user->status}}" selected>{{$user->status}}</option>
                                            @foreach($statuses as $status)
                                                @if($user->status != $status->status)
                                                    <option :value="{{$status->status}}">{{ $status->status }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </td>
                                    <td class="border border-slate-700">
                                        <x-text-input  class="block mt-1 w-full" type="password" name="password" />
                                    </td>
                                    <td class="border border-slate-700 text-center">
                                        <x-primary-button class="ms-4">
                                            {{ __('Save') }}
                                        </x-primary-button>
                                        @if (session('status') === 'profile-updated')
                                            <p
                                                x-data="{ show: true }"
                                                x-show="show"
                                                x-transition
                                                x-init="setTimeout(() => show = false, 2000)"
                                                class="text-sm text-gray-600 dark:text-gray-400"
                                            >{{ __('Saved.') }}</p>
                                        @endif
                                    </td>
                                </tr>
                            </form>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
