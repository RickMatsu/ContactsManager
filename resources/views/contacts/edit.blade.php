<x-app-layout>
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8 text-gray-300">
        <h1 class="text-2xl font-bold mb-6">Editar Contato</h1>

        <form action="{{ route('contacts.update', $contact) }}" method="POST" class="bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block font-medium">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name', $contact->name) }}" required class="w-full px-4 py-2 rounded bg-gray-700 text-dark border border-gray-600">
                @error('name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="contact" class="block font-medium">Contato</label>
                <input type="text" name="contact" id="contact" value="{{ old('contact', $contact->contact) }}" required class="w-full px-4 py-2 rounded bg-gray-700 text-dark border border-gray-600">
                @error('contact')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-medium">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $contact->email) }}" required class="w-full px-4 py-2 rounded bg-gray-700 text-dark border border-gray-600">
                @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between mt-6">
                <a href="{{ route('contacts.index') }}" class="text-white hover:underline">← Voltar</a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg">Atualizar</button>
            </div>
        </form>
    </div>
</x-app-layout>
