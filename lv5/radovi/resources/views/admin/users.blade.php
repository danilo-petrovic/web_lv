<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Upravljanje korisnicima
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm rounded-lg">

                <table class="w-full border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left py-2">Email</th>
                            <th class="text-left py-2">Uloga</th>
                            <th class="text-left py-2">Akcija</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="border-b">
                                <td class="py-2">{{ $user->email }}</td>
                                <td class="py-2">{{ $user->role }}</td>
                                <td class="py-2">
                                    @if($user->id !== auth()->id())
                                        <form method="POST" action="{{ url('/users/'.$user->id.'/role') }}">
                                            @csrf
                                            <select name="role" class="border rounded px-2 py-1">
                                                <option value="student">student</option>
                                                <option value="nastavnik">nastavnik</option>
                                            </select>
                                            <button type="submit" class="ml-2 px-3 py-1 bg-blue-600 text-white rounded">
                                                Update
                                            </button>
                                        </form>
                                    @else
                                        —
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
