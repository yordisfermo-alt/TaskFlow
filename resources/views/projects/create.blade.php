<x-app-layout>

    <div class="min-h-screen bg-gray-100 p-8">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

            <h1 class="text-3xl font-bold text-gray-800 mb-6">
                Nuevo Proyecto
            </h1>

            <form action="{{ route('projects.store') }}" method="POST">

                @csrf

                <div class="space-y-4">

                    <input
                        type="text"
                        name="name"
                        placeholder="Nombre del proyecto"
                        class="w-full border border-gray-300 rounded-xl p-3"
                    >

                    <textarea
                        name="description"
                        rows="5"
                        placeholder="Descripción del proyecto..."
                        class="w-full border border-gray-300 rounded-xl p-3"
                    ></textarea>

                    <button
                        type="submit"
                        class="bg-green-500 hover:bg-green-600 text-white px-6 py-3 rounded-xl"
                    >
                        Guardar Proyecto
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>