<x-app-layout>

    <div class="min-h-screen bg-gray-100 p-8">

        <div class="max-w-3xl mx-auto bg-white rounded-2xl shadow-lg p-8">

            <h1 class="text-3xl font-bold mb-6">
                Editar Proyecto
            </h1>

            <form
                action="{{ route('projects.update', $project) }}"
                method="POST"
            >

                @csrf
                @method('PUT')

                <div class="space-y-4">

                    <input
                        type="text"
                        name="name"
                        value="{{ $project->name }}"
                        class="w-full border border-gray-300 rounded-xl p-3"
                    >

                    <textarea
                        name="description"
                        rows="5"
                        class="w-full border border-gray-300 rounded-xl p-3"
                    >{{ $project->description }}</textarea>

                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-xl"
                    >
                        Actualizar Proyecto
                    </button>

                </div>

            </form>

        </div>

    </div>

</x-app-layout>