<x-app-layout>

    <div class="min-h-screen bg-gray-100 p-8">

        <div class="max-w-4xl mx-auto">

            {{-- HEADER --}}
            <div class="bg-white rounded-2xl shadow-lg p-8 mb-8">

                <div class="flex items-center justify-between">

                    <div>

                        <h1 class="text-4xl font-bold text-gray-800">
                            {{ $project->name }}
                        </h1>

                        <p class="text-gray-500 mt-3">
                            {{ $project->description }}
                        </p>

                    </div>

                    <span class="bg-blue-100 text-blue-700 px-4 py-2 rounded-full">
                        {{ $project->tasks->count() }} tareas
                    </span>

                </div>

            </div>

            {{-- AGREGAR TAREA --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">

                <h2 class="text-2xl font-bold mb-4">
                    Nueva tarea
                </h2>

                <form
                    action="{{ route('tasks.store', $project) }}"
                    method="POST"
                >

                    @csrf

                    <div class="flex gap-2">

                        <input
                            type="text"
                            name="title"
                            placeholder="Nombre de la tarea..."
                            class="w-full border border-gray-300 rounded-xl p-3"
                        >

                        <button
                            type="submit"
                            class="bg-green-500 hover:bg-green-600 text-white px-6 rounded-xl"
                        >
                            Guardar
                        </button>

                    </div>

                </form>

            </div>

            {{-- LISTA DE TAREAS --}}
            <div class="bg-white rounded-2xl shadow-lg p-6">

                <h2 class="text-2xl font-bold mb-6">
                    Tareas
                </h2>

                <div class="space-y-4">

                    @forelse ($project->tasks as $task)

                        <div class="bg-gray-100 rounded-xl p-4 flex items-center justify-between">

                            <span class="text-lg">
                                {{ $task->title }}
                            </span>

                            <div class="w-3 h-3 rounded-full bg-green-500"></div>

                        </div>

                    @empty

                        <div class="text-gray-400 italic">
                            No hay tareas todavía.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>

    </div>

</x-app-layout>