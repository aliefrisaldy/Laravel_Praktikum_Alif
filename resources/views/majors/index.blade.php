<x-default-layout title="Majors" section_title="Majors">
    @if (session('success'))
    <div class="bg-green-50 border border-green-500 text-green-500 px-3 py-2 inline-block w-fit">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex">
        <a href="{{ route('majors.create') }}"
            class="bg-green-50 text-green-500 border border-green-500 px-3 py-2 flex items-center gap-2">
            <i class="ph ph-plus block text-green-500"></i>
            <div>Add Major</div>
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow">
            <thead>
                <tr class="border-b border-zinc-200 text-sm leading-normal">
                    <th class="py-3 px-6 text-left">#</th>
                    <th class="py-3 px-6 text-left">Name</th>
                    <th class="py-3 px-6 text-center">Code</th>
                    <th class="py-3 px-6 text-center">Description</th>
                    <th class="py-3 px-6 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="text-zinc-700 text-sm font-light">
                @forelse ($majors as $major)
                    <tr class="border-b border-zinc-200 hover:bg-zinc-100">
                        <td class="py-3 px-6 text-left">{{ $loop->iteration }}</td>
                        <td class="py-3 px-6 text-left">{{ $major->name }}</td>
                        <td class="py-3 px-6 text-center">{{ $major->code }}</td>
                        <td class="py-3 px-6 text-center">{{ $major->description }}</td>
                        <td class="py-3 px-6 flex justify-center gap-1">
                            <a href="{{ route('majors.show', $major->id) }}"
                                class="bg-blue-50 border border-blue-500 p-2 inline-block">
                                <i class="ph ph-eye block text-blue-500"></i>
                            </a>
                            <a href="{{ route('majors.edit', $major->id) }}"
                                class="bg-yellow-50 border border-yellow-500 p-2 inline-block">
                                <i class="ph ph-note-pencil block text-yellow-500"></i>
                            </a>
                            <form onsubmit="return confirm('Are you sure?')" method="POST"
                                action="{{ route('majors.destroy', $major->id) }}">
                                @method("DELETE")
                                @csrf
                                <button type="submit" class="bg-red-50 border border-red-500 p-2">
                                    <i class="ph ph-trash-simple block text-red-500"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-zinc-500">No majors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</x-default-layout>
