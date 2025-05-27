<x-app-layout>
    <div class="max-w-6xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">Daftar Tiket</h1>

        <table class="w-full border">
            <thead class="bg-gray-200">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Judul</th>
                    <th>Jenis</th>
                    <th>Proyek</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $ticket)
                    <tr class="border-t">
                        <td>{{ $ticket->name }}</td>
                        <td>{{ $ticket->email }}</td>
                        <td>{{ $ticket->title }}</td>
                        <td>{{ $ticket->ticketType->name }}</td>
                        <td>{{ $ticket->project->name }}</td>
                        <td>{{ $ticket->status }}</td>
                        <td>{{ $ticket->assign_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
