<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-white leading-tight">
            Visualizar Contato
        </h2>
    </x-slot>
    
    <div class="py-8">
        <br>
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <h3 class="text-2xl font-bold text-white mb-2">{{ $contact->name }}</h3>
                    <p class="text-white"><strong>Contato:</strong> {{ $contact->contact }}</p>
                    <p class="text-white"><strong>Email:</strong> {{ $contact->email }}</p>
                </div>

                <div class="flex space-x-4 mt-6">
                    <a href="{{ route('contacts.edit', $contact) }}"
                       class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                        Editar
                    </a>

                    <form action="{{ route('contacts.destroy', $contact) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                onclick="return confirm('Tem certeza que deseja apagar?')"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            Apagar
                        </button>
                    </form>

                    <a href="{{ route('contacts.index') }}"
                       class="ml-auto bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 transition">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
