<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Lista de Contatos
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-white">Contatos</h1>
                <a href="{{ route('contacts.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                    Novo Contato
                </a>
            </div>

            @if($contacts->count())
                <div class="overflow-x-auto bg-gray-800 shadow-sm rounded-lg">
                    <table class="min-w-full divide-y divide-gray-700">
                        <thead class="bg-gray-700 text-gray-300 text-xs uppercase">
                            <tr>
                                <th class="px-6 py-3 text-left">ID</th>
                                <th class="px-6 py-3 text-left">Nome</th>
                                <th class="px-6 py-3 text-left">Contato</th>
                                <th class="px-6 py-3 text-left">Email</th>
                                <th class="px-6 py-3 text-left">Ações</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-900 divide-y divide-gray-700 text-white">
                            @foreach($contacts as $contact)
                                <tr>
                                    <td class="px-6 py-4">{{ $contact->id }}</td>
                                    <td class="px-6 py-4">{{ $contact->name }}</td>
                                    <td class="px-6 py-4">{{ $contact->contact }}</td>
                                    <td class="px-6 py-4">{{ $contact->email }}</td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('contacts.show', $contact) }}" class="text-blue-400 hover:underline">Ver  </a>
                                            <a href="{{ route('contacts.edit', $contact) }}" class="text-yellow-400 hover:underline">Editar  </a>
                                            <form action="{{ route('contacts.destroy', $contact) }}" method="POST" onsubmit="return confirm('Tem certeza?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:underline">Apagar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-gray-400">Nenhum contato encontrado.</p>
            @endif
        </div>
    </div>
</x-app-layout>
