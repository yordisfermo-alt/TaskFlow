<x-app-layout>

    <div class="min-h-screen bg-gray-100 p-8">

        {{-- HEADER --}}
        <div class="flex items-center justify-between mb-10">

            <div>

                <h1 class="text-4xl font-bold text-gray-800">
                    Mis Proyectos
                </h1>

                <p class="text-gray-500 mt-2">
                    Gestiona tus proyectos y tareas.
                </p>

            </div>

            {{-- BOTON AGREGAR PROYECTO --}}
            <a
                href="{{ route('projects.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-xl shadow-lg transition"
            >
                + Agregar Proyecto
            </a>

        </div>

        {{-- GRID DE PROYECTOS --}}
        <div class="grid md:grid-cols-2 xl:grid-cols-3 gap-6">

            @foreach ($projects as $project)

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    {{-- TITULO --}}
                    <div class="mb-5">

                        <div class="flex items-center justify-between">

                            <h2 class="text-2xl font-bold text-gray-800">
                                {{ $project->name }}
                            </h2>

                            <span class="bg-blue-100 text-blue-700 text-sm px-3 py-1 rounded-full">
                                {{ $project->tasks->count() }} tareas
                            </span>

                        </div>

                        {{-- DESCRIPCION --}}
                        <p class="text-gray-500 mt-3">
                            {{ $project->description }}
                        </p>

                    </div>

                    {{-- TAREAS --}}
                    <div class="space-y-3 mb-5">

                        @forelse ($project->tasks as $task)

                            <div class="bg-gray-100 rounded-xl p-3 flex items-center justify-between">

                                <span>
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

                    {{-- BOTONES --}}
                    <div class="flex flex-wrap gap-2 mt-4">

                        {{-- VER PROYECTO --}}
<a
    href="{{ route('projects.show', $project) }}"
    class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-xl transition"
>
    Ver proyecto
</a>

                        {{-- EDITAR --}}
                        <a
                            href="{{ route('projects.edit', $project) }}"
                            class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-xl transition"
                        >
                            Editar
                        </a>

                        {{-- ELIMINAR --}}
                        <form
                            action="{{ route('projects.destroy', $project) }}"
                            method="POST"
                        >

                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-xl transition"
                            >
                                Eliminar
                            </button>

                        </form>

                    </div>

                </div>

            @endforeach

        </div>

    </div>

</x-app-layout>